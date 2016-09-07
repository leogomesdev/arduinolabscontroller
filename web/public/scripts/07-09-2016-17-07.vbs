Dim objShellUbuntu16
Dim objShellWindows16
Set objShellWindows16 = WScript.CreateObject("WScript.Shell")
objShellWindows16.Run """C:\Program files (x86)\PSTools\psshutdown.exe"" -u ADM -p Delta1Ks@83 \\192.168.0.101""" , 2 
Set objShellUbuntu16 = WScript.CreateObject("WScript.Shell")
objShellUbuntu16.Run """C:\Program files (x86)\puTTY\plink.exe"" -ssh aluno@192.168.0.101 -pw *iff1234 sudo poweroff""" , 2 
Dim objShellUbuntu17
Dim objShellWindows17
Set objShellWindows17 = WScript.CreateObject("WScript.Shell")
objShellWindows17.Run """C:\Program files (x86)\PSTools\psshutdown.exe"" -u ADM -p Delta1Ks@83 \\192.168.0.100""" , 2 
Set objShellUbuntu17 = WScript.CreateObject("WScript.Shell")
objShellUbuntu17.Run """C:\Program files (x86)\puTTY\plink.exe"" -ssh aluno@192.168.0.100 -pw *iff1234 sudo poweroff""" , 2 
