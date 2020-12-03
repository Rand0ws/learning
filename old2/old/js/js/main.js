let x = 3

while (x > 0) {
    if (x > 2) {
        document.write('a')
    }
    
    x--
    document.write("-")
    
    if (x == 1) {
        document.write('d')
        x--
    }
    
    if (x == 2) {
        document.write('b c')
    }
}

document.write('<hr>')

let y = 0

while (y < 4) {
    document.write("a");
    
    if (y < 1) {
        document.write("1");
    }
    
    document.write("an");
    
    if (y < 0) {
        document.write("2");
    }
    
    if (y == 1) {
        document.write("3");
    }
    
    if (y > 0) {
        document.writeln("<br>");
    }
    
    document.writeln("<br>");
    y++;
}