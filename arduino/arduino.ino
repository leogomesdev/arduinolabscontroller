#include <SPI.h>
#include <Ethernet.h>
#include <EthernetUdp.h>

//https://gist.github.com/fairchild/94327
//http://forum.arduino.cc/index.php?topic=95527.0

int valorConvertidoInteiro;
String valorOriginalString;
String comandorecebido;
int contador;
byte remote_MAC_ADD[6];

int rele_1 = 2;
int rele_2 = 3;
int rele_3 = 4;
int rele_4 = 5;

byte arduino_MAC[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };
byte arduino_IP[] = { 192, 168, 0, 7 };
byte gateway[] = { 192, 168, 0, 1 };
byte subnet[] = { 255, 255, 255, 0 };
//Porta UDP locale
int portaLocale = 7;

//Indirizzo broadcast della rete locale
byte broadCastIp[] = { 192, 168, 0, 255 };
//Porta UDP WOL
int wolPort = 9;

//Criando um objeto EthernetUDP
EthernetUDP Udp;

EthernetServer server(80);

void setup() {
  Serial.begin(9600);
  contador = 0;
  Ethernet.begin(arduino_MAC, arduino_IP, gateway, subnet);
  server.begin();
  pinMode(rele_1, OUTPUT); 
  pinMode(rele_2, OUTPUT); 
  pinMode(rele_3, OUTPUT); 
  pinMode(rele_4, OUTPUT);

  //Iniciando objeto EthernetUDP
    Udp.begin(portaLocale);
}
void loop () {
  if(Serial.available()) {
    Serial.print("Recebi uma string: ");
     while (Serial.available()>0){
        comandorecebido = Serial.readString();
        Serial.println(comandorecebido);
        if(comandorecebido == "1_on")
        {
            digitalWrite(rele_1, LOW);
        }
        else
          if(comandorecebido == "1_off")
          {
            digitalWrite(rele_1, HIGH);
          }
          else
            if(comandorecebido == "2_on")
            {
                digitalWrite(rele_2, LOW);
            }
            else
              if(comandorecebido == "2_off")
              {
                digitalWrite(rele_2, HIGH);
              }
              else
                if(comandorecebido == "3_on")
                {
                    digitalWrite(rele_3, LOW);
                }
                else
                  if(comandorecebido == "3_off")
                  {
                    digitalWrite(rele_3, HIGH);
                  }
                  else
                    if(comandorecebido == "4_on")
                    {
                        digitalWrite(rele_4, LOW);
                    }
                    else
                      if(comandorecebido == "4_off")
                      {
                        digitalWrite(rele_4, HIGH);
                        }
                      else
                      {        
                        valorOriginalString = comandorecebido;
                        valorConvertidoInteiro = valorOriginalString.toInt();
                        Serial.print("Converti para inteiro: ");
                        Serial.print(valorConvertidoInteiro);
                        remote_MAC_ADD[contador] = valorConvertidoInteiro;
                        Serial.println("Armazenei na posicao ");
                        Serial.print(contador);
                        Serial.print(" do array o valor: ");
                        Serial.println(remote_MAC_ADD[contador]);
                        contador++;
                      }
    }          
    Serial.println();
    Serial.print("Imprimindo todo o array: ");
    for(int y = 0; y < contador; y++)
    {
      Serial.print(" P");
      Serial.print(y);
      Serial.print(": ");
      Serial.print(remote_MAC_ADD[y]);
    }
    Serial.println("");

    if(contador==6){
      Serial.println("O contador chegou passou de 5, li todas as 6 posicoes do MAC. Agora vou enviar o Pacote WOL e zerar o contador.");
      sendMagicPacket();
      contador = 0;
    }
    Serial.println();
  }
  //delay(1000);  
}

//funcao para criar e enviar o magic packet
void sendMagicPacket()
{
//definisco un array da 102 byte
byte magicPacket[102];
//variabili per i cicli
int Ciclo = 0, CicloMacAdd = 0, IndiceArray = 0;

for( Ciclo = 0; Ciclo < 6; Ciclo++)
{
//i primi 6 byte dell’array sono settati al valore 0xFF
magicPacket[IndiceArray] = 0xFF;
//incremento l’indice dell’array
IndiceArray++;
}

//eseguo 16 cicli per memorizzare il mac address del pc
//da avviare
for( Ciclo = 0; Ciclo < 16; Ciclo++ )
{
//eseguo un ciclo per memorizzare i 6 byte del
//mac address
for( CicloMacAdd = 0; CicloMacAdd < 6; CicloMacAdd++)
{
magicPacket[IndiceArray] = remote_MAC_ADD[CicloMacAdd];
//incremento l’indice dell’array
IndiceArray++;
}
}

//spedisco il magic packet in brodcast sulla porta prescelta
Udp.beginPacket(broadCastIp, wolPort);
Udp.write(magicPacket, sizeof magicPacket);
Udp.endPacket();
}
