Dim objShellUbuntu1
Dim objShellWindows1
Set objShellWindows1 = WScript.CreateObject("WScript.Shell")
objShellWindows1.Run """C:\Program files (x86)\PSTools\psshutdown.exe"" -u aluno -p *iff1234 \\192.168.0.102""" , 2 
Set objShellUbuntu1 = WScript.CreateObject("WScript.Shell")
objShellUbuntu1.Run """C:\Program files (x86)\puTTY\plink.exe"" -ssh aluno@192.168.0.102 -pw *iff1234 sudo poweroff""" , 2 
Dim objShellUbuntu2
Dim objShellWindows2
Set objShellWindows2 = WScript.CreateObject("WScript.Shell")
objShellWindows2.Run """C:\Program files (x86)\PSTools\psshutdown.exe"" -u aluno -p *iff1234 \\192.168.0.93""" , 2 
Set objShellUbuntu2 = WScript.CreateObject("WScript.Shell")
objShellUbuntu2.Run """C:\Program files (x86)\puTTY\plink.exe"" -ssh aluno@192.168.0.93 -pw *iff1234 sudo poweroff""" , 2 
Dim objShellUbuntu3
Dim objShellWindows3
Set objShellWindows3 = WScript.CreateObject("WScript.Shell")
objShellWindows3.Run """C:\Program files (x86)\PSTools\psshutdown.exe"" -u aluno -p *iff1234 \\192.168.0.65""" , 2 
Set objShellUbuntu3 = WScript.CreateObject("WScript.Shell")
objShellUbuntu3.Run """C:\Program files (x86)\puTTY\plink.exe"" -ssh aluno@192.168.0.65 -pw *iff1234 sudo poweroff""" , 2 
Dim objShellUbuntu4
Dim objShellWindows4
Set objShellWindows4 = WScript.CreateObject("WScript.Shell")
objShellWindows4.Run """C:\Program files (x86)\PSTools\psshutdown.exe"" -u aluno -p *iff1234 \\192.168.0.67""" , 2 
Set objShellUbuntu4 = WScript.CreateObject("WScript.Shell")
objShellUbuntu4.Run """C:\Program files (x86)\puTTY\plink.exe"" -ssh aluno@192.168.0.67 -pw *iff1234 sudo poweroff""" , 2 
Dim objShellUbuntu5
Dim objShellWindows5
Set objShellWindows5 = WScript.CreateObject("WScript.Shell")
objShellWindows5.Run """C:\Program files (x86)\PSTools\psshutdown.exe"" -u aluno -p *iff1234 \\192.168.0.97""" , 2 
Set objShellUbuntu5 = WScript.CreateObject("WScript.Shell")
objShellUbuntu5.Run """C:\Program files (x86)\puTTY\plink.exe"" -ssh aluno@192.168.0.97 -pw *iff1234 sudo poweroff""" , 2 
