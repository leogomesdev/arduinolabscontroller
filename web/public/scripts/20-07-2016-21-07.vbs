Dim objShellUbuntu4
Dim objShellWindows4
Set objShellWindows4 = WScript.CreateObject("WScript.Shell")
objShellWindows4.Run("""C:\Program Files (x86)\PSTools\psshutdown.exe"" -u aluno -p *iff1234 \\192.168.0.102""")
Set objShellUbuntu4 = WScript.CreateObject("WScript.Shell")
objShellUbuntu4.Run ("""C:\Program Files (x86)\puTTY\plink.exe"" -ssh aluno@192.168.0.102 -pw *iff1234 sudo poweroff""")
