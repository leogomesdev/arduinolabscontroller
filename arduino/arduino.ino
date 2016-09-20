#include <SPI.h>
#include <Ethernet.h>
#include <EthernetUdp.h>

//Declaração inicial das variáveis.
int valorConvertidoInteiro;
String valorOriginalString;
String comandorecebido;
int contador;
byte remote_MAC_ADD[6];
int saida_2 = 2;
int saida_3 = 3;
int saida_4 = 4;
int saida_5 = 5;
int saida_6 = 6;
int saida_7 = 7;
int saida_8 = 8;
int saida_9 = 9;
int saida_10 = 10;
int saida_11 = 11;
int saida_12 = 12;
int saida_13 = 13;
int saida_14 = 14;
int saida_15 = 15;
int saida_16 = 16;
int saida_17 = 17;
int saida_18 = 18;
int saida_19 = 19;

//Configurações da rede local.
byte arduino_MAC[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };
byte arduino_IP[] = { 192, 168, 0, 7 };
byte gateway[] = { 192, 168, 0, 1 };
byte subnet[] = { 255, 255, 255, 0 };
int portaLocale = 7;
byte broadCastIp[] = { 192, 168, 0, 255 };
int wolPort = 9;

//Criando um objeto EthernetUDP.
EthernetUDP Udp;
EthernetServer server(80);

void setup() {
  //Iniciar a leitura de dados via serial.
  Serial.begin(9600);
  contador = 0;
  Ethernet.begin(arduino_MAC, arduino_IP, gateway, subnet);
  server.begin();
  //Declaração dos pinos disponíveis.
  pinMode(saida_2, OUTPUT); 
  pinMode(saida_3, OUTPUT); 
  pinMode(saida_4, OUTPUT); 
  pinMode(saida_5, OUTPUT); 
  pinMode(saida_6, OUTPUT); 
  pinMode(saida_7, OUTPUT); 
  pinMode(saida_8, OUTPUT); 
  pinMode(saida_9, OUTPUT); 
  pinMode(saida_10, OUTPUT); 
  pinMode(saida_11, OUTPUT); 
  pinMode(saida_12, OUTPUT);
  pinMode(saida_13, OUTPUT);
  pinMode(saida_14, OUTPUT);
  pinMode(saida_15, OUTPUT);
  pinMode(saida_16, OUTPUT);
  pinMode(saida_17, OUTPUT);
  pinMode(saida_18, OUTPUT);
  pinMode(saida_19, OUTPUT); 

    //Iniciar objeto EthernetUDP.
    Udp.begin(portaLocale);
}
void loop () {
  if(Serial.available()) {
      //Receber comandos via serial, verificar qual pino será utilizado e executar a ação programada.
     while (Serial.available()>0){
        comandorecebido = Serial.readString();
        Serial.println(comandorecebido);
            if(comandorecebido == "2_on")
            {
                digitalWrite(saida_2, LOW);
            }
            else
              if(comandorecebido == "2_off")
              {
                digitalWrite(saida_2, HIGH);
              }
              else
                if(comandorecebido == "3_on")
                {
                    digitalWrite(saida_3, LOW);
                }
                else
                  if(comandorecebido == "3_off")
                  {
                    digitalWrite(saida_3, HIGH);
                  }
                  else
                    if(comandorecebido == "4_on")
                    {
                        digitalWrite(saida_4, LOW);
                    }
                    else
                      if(comandorecebido == "4_off")
                      {
                        digitalWrite(saida_4, HIGH);
                        }
                        else
                          if(comandorecebido == "5_on")
                          {
                            digitalWrite(saida_5, LOW);
                          }
                          else
                            if(comandorecebido == "5_off")
                            {
                            digitalWrite(saida_5, HIGH);
                            }
                            else
                              if(comandorecebido == "6_on")
                              {
                                digitalWrite(saida_6, LOW);
                              }
                              else
                                if(comandorecebido == "6_off")
                                {
                                digitalWrite(saida_6, HIGH);
                                }
                                else
                                  if(comandorecebido == "7_on")
                                  {
                                    digitalWrite(saida_7, LOW);
                                  }
                                  else
                                    if(comandorecebido == "7_off")
                                    {
                                    digitalWrite(saida_7, HIGH);
                                    }
                                    else
                                      if(comandorecebido == "8_on")
                                      {
                                        digitalWrite(saida_8, LOW);
                                      }
                                      else
                                        if(comandorecebido == "8_off")
                                        {
                                        digitalWrite(saida_8, HIGH);
                                        }
                                        else
                                          if(comandorecebido == "9_on")
                                          {
                                            digitalWrite(saida_9, LOW);
                                          }
                                          else
                                            if(comandorecebido == "9_off")
                                            {
                                            digitalWrite(saida_9, HIGH);
                                            }
                                            else
                                              if(comandorecebido == "10_on")
                                              {
                                                digitalWrite(saida_10, LOW);
                                              }
                                              else
                                                if(comandorecebido == "10_off")
                                                {
                                                digitalWrite(saida_10, HIGH);
                                                }
                                                else
                                                  if(comandorecebido == "11_on")
                                                  {
                                                    digitalWrite(saida_11, LOW);
                                                  }
                                                  else
                                                    if(comandorecebido == "11_off")
                                                    {
                                                    digitalWrite(saida_11, HIGH);
                                                    }
                                                    else
                                                      if(comandorecebido == "12_on")
                                                      {
                                                        digitalWrite(saida_12, LOW);
                                                      }
                                                      else
                                                        if(comandorecebido == "12_off")
                                                        {
                                                        digitalWrite(saida_12, HIGH);
                                                        }
                                                        else
                                                          if(comandorecebido == "13_on")
                                                          {
                                                            digitalWrite(saida_13, LOW);
                                                          }
                                                          else
                                                            if(comandorecebido == "13_off")
                                                            {
                                                            digitalWrite(saida_13, HIGH);
                                                            }
                                                            else
                                                              if(comandorecebido == "14_on")
                                                              {
                                                                digitalWrite(saida_14, LOW);
                                                              }
                                                              else
                                                                if(comandorecebido == "14_off")
                                                                {
                                                                digitalWrite(saida_14, HIGH);
                                                                }
                                                                else
                                                                  if(comandorecebido == "15_on")
                                                                  {
                                                                    digitalWrite(saida_15, LOW);
                                                                  }
                                                                  else
                                                                    if(comandorecebido == "15_off")
                                                                    {
                                                                    digitalWrite(saida_15, HIGH);
                                                                    }
                                                                    else
                                                                      if(comandorecebido == "16_on")
                                                                      {
                                                                        digitalWrite(saida_16, LOW);
                                                                      }
                                                                      else
                                                                        if(comandorecebido == "16_off")
                                                                        {
                                                                        digitalWrite(saida_16, HIGH);
                                                                        }
                                                                        else
                                                                          if(comandorecebido == "17_on")
                                                                          {
                                                                            digitalWrite(saida_17, LOW);
                                                                          }
                                                                          else
                                                                            if(comandorecebido == "17_off")
                                                                            {
                                                                            digitalWrite(saida_17, HIGH);
                                                                            }
                                                                            else
                                                                              if(comandorecebido == "18_on")
                                                                              {
                                                                                digitalWrite(saida_18, LOW);
                                                                              }
                                                                              else
                                                                                if(comandorecebido == "18_off")
                                                                                {
                                                                                digitalWrite(saida_18, HIGH);
                                                                                }
                                                                                else
                                                                                  if(comandorecebido == "19_on")
                                                                                  {
                                                                                    digitalWrite(saida_19, LOW);
                                                                                  }
                                                                                  else
                                                                                    if(comandorecebido == "19_off")
                                                                                    {
                                                                                    digitalWrite(saida_19, HIGH);
                                                                                    }
                                                                                    else    
                                                                                    {        
                                                                                      valorOriginalString = comandorecebido;
                                                                                      //Armazenar o valor original em uma String.     
                                                                                      valorOriginalString = comandorecebido;
                                                                                      //Converter o valor originalmente em String para inteiro.
                                                                                      valorConvertidoInteiro = valorOriginalString.toInt();
                                                                                      //Armazenar as partes do MAC em cada posição do vetor.
                                                                                      remote_MAC_ADD[contador] = valorConvertidoInteiro;
                                                                                      contador++;
                                                                                    }
    }          
    //Após armazenar as seis partes do endereço MAC, enviar o pacote WOL e zerar o contador.
    if(contador==6){
      sendMagicPacket();
      contador = 0;
    }
  }
}

//Função para criar e enviar o pacote WOL.
void sendMagicPacket()
{
  byte magicPacket[102];
  int Ciclo = 0, CicloMacAdd = 0, IndiceArray = 0;
  //Criar o início do pacote WOL.  
  for( Ciclo = 0; Ciclo < 6; Ciclo++)
  {
    magicPacket[IndiceArray] = 0xFF;
    IndiceArray++;
  }
  
  //Adicionar ao pacote WOL o endereço MAC de destino 16 vezes.
  for( Ciclo = 0; Ciclo < 16; Ciclo++ )
  {
    for( CicloMacAdd = 0; CicloMacAdd < 6; CicloMacAdd++)
    {
      magicPacket[IndiceArray] = remote_MAC_ADD[CicloMacAdd];
      IndiceArray++;
    }
  }
  
  //Enviar o pacote WOL através de broadcast.
  Udp.beginPacket(broadCastIp, wolPort);
  Udp.write(magicPacket, sizeof magicPacket);
  Udp.endPacket();
}
