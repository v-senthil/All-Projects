input1 = input("Input the text to convert to morse: \n\n")
lngth = len(input1)
l = ""

print("You wrote: " + input1)
for x in range(0, lngth):
    c = input1[x]
    c = c.upper()
    if (c == "A"):
        print(".- | a\n")
    elif (c == "B"):
        print("-... | b\n")
    elif (c == "C"):
        print(" -.-. | c\n")
    elif (c == "D"):
        print("-.. | d\n")
    elif (c == "E"):
        print(". | e\n")
    elif (c == "F"):
        print("..-. | f\n")
    elif (c == "G"):
        print("--. | g\n")
    elif (c == "H"):
        print(".... | h\n")
    elif (c == "I"):
        print(".. | i\n")
    elif (c == "J"):
        print(".--- | j\n")
    elif (c == "K"):
        print("-.- | k\n")
    elif (c == "L"):
        print(".-.. | l\n")
    elif (c == "M"):
        print("-- | m\n")
    elif (c == "N"):
        print("-. | n\n")
    elif (c == "O"):
        print("--- | o\n")
    elif (c == "P"):
        print(".--. | p\n")
    elif (c == "Q"):
        print(" --.- | q\n")
    elif (c == "R"):
        print(".-. | r\n")
    elif (c == "S"):
        print("... | s\n")
    elif (c == "T"):
        print("- | t\n")
    elif (c == "U"):
        print("..- | u\n")
    elif (c == "V"):
        print("...- | v\n")
    elif (c == "W"):
        print(".-- | w\n")
    elif (c == "X"):
        print("-..- | x\n")
    elif (c == "Y"):
        print("-.-- | y\n")
    elif (c == "Z"):
        print("--.. | z\n")
    elif (c == " "):
        print("\n\n")
    elif (c == "!"):
        print("Not existing/translatable in morse code. | !\n")
    elif (c == "?"):
        print("..--.. | ?\n")
    elif (c == "@"):
        print(".--.-. | @\n")
    elif (c == "/"):
        print("-..-. | /\n")
    elif (c == "."):
        print(".-.-.- | .\n")
    elif (c == ","):
        print("--..-- | ,\n")
    elif (c == "1"):
        print(".---- | 1\n")
    elif (c == "2"):
        print("..--- | 2\n")
    elif (c == "3"):
        print("...-- | 3\n")
    elif (c == "4"):
        print("....- | 4\n")
    elif (c == "5"):
        print("..... | 5\n")
    elif (c == "6"):
        print("-.... | 6\n")
    elif (c == "7"):
        print("--... | 7\n")
    elif (c == "8"):
        print("---.. | 8\n")
    elif (c == "9"):
        print("----. | 9\n")
    elif (c == "0"):
        print("----- | 0\n")

