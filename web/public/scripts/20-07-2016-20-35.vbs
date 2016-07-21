Dim objShellUbuntu3
Dim objShellWindows3
Set objShellWindows3 = WScript.CreateObject("WScript.Shell")
objShellWindows3.Run("""C:\Program Files (x86)\PSTools\psshutdown.exe"" -u ADM -p Delta1Ks@83 \\192.168.0.101""")
Set objShellUbuntu3 = WScript.CreateObject("WScript.Shell")
objShellUbuntu3.Run ("""C:\Program Files (x86)\puTTY\plink.exe"" -ssh aluno@192.168.0.101 -pw *iff1234 sudo poweroff""")
