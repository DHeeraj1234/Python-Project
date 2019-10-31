import urllib.request
import sys
from bs4 import  BeautifulSoup as b
import sqlite3
connection=sqlite3.connect(r'''C:\wamp64\www\Project\Database.db''')
crsr=connection.cursor()
dropTableStatement = "DROP TABLE IF EXISTS ebay"
link2=sys.argv[1]
crsr.execute(dropTableStatement)
sql_command="""CREATE TABLE ebay(
            id INTEGER PRIMARY KEY, name VARCHAR(100),subtitle VARCHAR(100), rating VARCHAR(100), price VARCHAR(100));"""
#crsr.execute()
if(len(sys.argv[1])>0):
    crsr.execute(sql_command)
base_url="http://www.ebay.ca/sch/i.html?_from=R40&_nkw="
request="s9"
url_seperator="&_sacat=0&_pgn="
page_num="1"

url=base_url+request+url_seperator+page_num
#link2=sys.argv[1]

url1="https://www.ebay.com/sch/i.html?_from=R40&_trksid=p2380057.m570.l1313.TR11.TRC2.A0.H0.Xs9.TRS1&_nkw="+link2+"&_sacat=0"
html=urllib.request.urlopen(url1).read()
soup=b(html,"html.parser")
#for post in soup.findAll("li", {"class": "s-item"}):
#    print(post.text)
p1=1
data=[]
for post in soup.findAll("li",{"class":"s-item"}):
    h=post.findAll("a",{"class":"s-item__link"})[0]
    title = h.text
    data.append(title)
    sql_command = "INSERT INTO ebay (id,name,rating,price)VALUES(?,?,?,?)"
    val = (p1, title, "null","null")
    crsr.execute(sql_command, val)
    p1 = p1 + 1

p0=1;
for i in soup.findAll("div", {"class": "s-item__subtitle"}):
    sql_command = "UPDATE ebay SET subtitle=? where id=?"
    val1 = (i.text, p0)
    crsr.execute(sql_command, val1)
    p0 = p0 + 1
   #print(title)
p=1
data1=[]
for i in soup.findAll("div", {"class": "b-starrating"}):
    sql_command = "UPDATE ebay SET rating=? where id=?"
    val1=(i.text,p)
    crsr.execute(sql_command, val1)
    p=p+1

p2=1
for price in soup.findAll("span", {"class": "s-item__price"}):
    sql_command = "UPDATE ebay SET price=? where id=?"
    val1 = (price.text, p2)
    data1.append(price.text)
    crsr.execute(sql_command, val1)
    p2 = p2 + 1
#print(data[3]+" "+data1[3])    #print(price.text)
crsr.execute("SELECT name,subtitle,rating,price FROM ebay")
ans=crsr.fetchall()
connection.commit()
connection.close()
for i in ans:
    print(i)
    print("?")