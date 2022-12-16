import os
import time

"""
 mkdir $HOME/.termux/ ;echo "extra-keys = [['F1','F2','F3','F4','F5','F6','F7'],['ESC','/','-','HOME','UP','END','PGUP'],['TAB','CTRL','ALT','LEFT','DOWN','RIGHT','PGDN']]" >> $HOME/.termux/termux.properties && termux-reload-settings && sleep 1 && logout

"""
Dir = '$TERMUX/'
Tools = ['sqlmapproject/sqlmap','maurosoria/dirsearch','OJ/gobuster','sullo/nikto','projectdiscovery/katana','projectdiscovery/nuclei','projectdiscovery/httpx','projectdiscovery/naabu','projectdiscovery/dnsx','projectdiscovery/proxify']
GitHubUrl = 'https://github.com/'
PKG = ['curl','wget','git','java','ruby','php','bash','nano','python','python2','zip','unzip','nodejs','jq','grep','htop','httping','dnsutils','figlet','openssh','perl']
Command = ''
I = ''
I_1 = ''
class Color:
    BLACK = "\033[0;30m"
    RED = "\033[0;31m"
    GREEN = "\033[0;32m"
    BROWN = "\033[0;33m"
    BLUE = "\033[0;34m"
    PURPLE = "\033[0;35m"
    CYAN = "\033[0;36m"
    LIGHT_GRAY = "\033[0;37m"
    DARK_GRAY = "\033[1;30m"
    LIGHT_RED = "\033[1;31m"
    LIGHT_GREEN = "\033[1;32m"
    YELLOW = "\033[1;33m"
    LIGHT_BLUE = "\033[1;34m"
    LIGHT_PURPLE = "\033[1;35m"
    LIGHT_CYAN = "\033[1;36m"
    LIGHT_WHITE = "\033[1;37m"
    BOLD = "\033[1m"
    FAINT = "\033[2m"
    ITALIC = "\033[3m"
    UNDERLINE = "\033[4m"
    BLINK = "\033[5m"
    NEGATIVE = "\033[7m"
    CROSSED = "\033[9m"
    END = "\033[0m"
C = Color()

def Exit():
    print('Thanks for using this Script')
    exit()

def Github_Tools():
    global GitHubUrl
    print('{}{}Installing Website recon and Vulns scanner tools .{}'.format(C.LIGHT_GREEN,C.BOLD,C.END))
    time.sleep(1.5)
    for X in Tools:
        GitHubUrl += X
        Command = os.system("git clone {}".format(GitHubUrl))
        print(GitHubUrl)
        time.sleep(1)
        GitHubUrl = 'https://github.com/'
        os.system('cls || clear')
    print('All tools installed successfully')
    Exit()
    
def DirSetup():
    print('{}{}Directory Setting Up .{}'.format(C.RED,C.BOLD,C.END))
    os.system('mkdir WebTools')
    os.system('cd {}WebTools'.format(Dir))
    time.sleep(1)
    os.system('clear || cls')
    print('{}{}Success making Directory for Tools{}'.format(C.GREEN,C.BOLD,C.END))
    time.sleep(1.5)
    Github_Tools()
    
def Update():
    os.system('pkg update -y')
    os.system('pkg upgrade -y')
    time.sleep(1)
    print('{}{}All Package is UpToDate and has been Upgraded{}'.format(C.GREEN,C.BOLD,C.END))
    time.sleep(1.5)
    DirSetup()
    
def PKG_Installer():
    for X in PKG:
        Command = os.system("pkg install {} -y".format(X))
        print(Command)
        time.sleep(1)
    os.system('clear || cls')
    print('{}{}All Basic Package installed successfully{}'.format(C.GREEN,C.BOLD,C.END))
    time.sleep(1.5)
    Update()
        

def Start():
    I = str(input('Are you sure to Install Basic Package ?\t[Y/N] : '))
    I_1 = str(input('Installing Tools also ?\t[Y/N] : {}'.format(C.END)))

    if ((I == 'Y') or (I == 'y')) and ((I_1 == 'Y') or (I_1 == 'y')):
        PKG_Installer()


banner = '''{}
╔═══╦═══╦════╦╗─╔╦═══╗
║╔═╗║╔══╣╔╗╔╗║║─║║╔═╗║
║╚══╣╚══╬╝║║╚╣║─║║╚═╝║
╚══╗║╔══╝─║║─║║─║║╔══╝
║╚═╝║╚══╗─║║─║╚═╝║║
╚═══╩═══╝─╚╝─╚═══╩╝
{}Termux AutoSetup by Cyb3rX
'''.format(C.PURPLE,C.LIGHT_PURPLE)
os.system('clear || cls')
print(banner)
print('{}Ready atleast {}3GB{}{} before using this Script.{}'.format(C.RED,C.BOLD,C.END,C.RED,C.LIGHT_PURPLE))

Start()