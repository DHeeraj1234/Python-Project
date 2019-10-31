#!C:\Python37\python.exe
import cgi,sys
import sqlite3 as d
con=d.connect('ebay.db')
crsr=con.cursor()
con.row_factory=d.Row
crsr.execute("select * from mob")
rows=crsr.fetchall()
sys.stdout.write('Content-type:text.html\n\n')
sys.stdout.write("<html>")
sys.stdout.write("<body>")
sys.stdout.write("<p>")

for x in rows:
    sys.stdout.write("%d %s %s"%(x[0],x[1],x[2]))
    sys.stdout.write("<br/>")
sys.stdout.write("</p>")
sys.stdout.write("</body>")
sys.stdout.write("</html>")