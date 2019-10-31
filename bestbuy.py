import urllib.request
from bs4 import  BeautifulSoup as b
import sqlite3
import sys
connection=sqlite3.connect(r'''C:\wamp64\www\Project\Database.db''')
crsr=connection.cursor()
dropTableStatement = "DROP TABLE IF EXISTS bestbuy"
link2=sys.argv[1]
crsr.execute(dropTableStatement)
sql_command="""CREATE    TABLE bestbuy(
            id INTEGER PRIMARY KEY, id1 VARCHAR(100), name VARCHAR(100), price VARCHAR(100), rating VARCHAR(100));"""
#crsr.execute("DELETE FROM bestbuy")
if(len(sys.argv[1])>0):
    crsr.execute(sql_command)

url1="https://www.bestbuy.com/site/searchpage.jsp?st="+link2+"&_dyncharset=UTF-8&id=pcat17071&type=page&sc=Global&cp=1&nrp=&sp=&qp=&list=n&af=true&iht=y&usc=All+Categories&ks=960&keys=keys"
html=urllib.request.urlopen(url1).read()
soup=b(html,"html.parser")
#firstBlockSoup = soup.find('span', attrs={'class': 'a-size-medium a-color-base a-text-normal'})
#print(firstBlockSoup)
p1=1
str1="string1"
for post in soup.findAll("div", {"class": "sku-title"}):
    #h=post.findAll("span",{ "class": "a-size-medium a-color-base a-text-normal"})[0]
    sql_command="INSERT INTO bestbuy (id,name,price,rating)VALUES(?,?,?,?)"
    val=(p1,post.text,"s","s")
    crsr.execute(sql_command,val)
    p1=p1+1
    #print(p1)
    #print(post.text)
p0=1
for i in soup.findAll("span", {"class": "sku-value"}):
    sql_command = "UPDATE bestbuy SET id1=? where id=?"
    val1 = (i.text, p0)
    crsr.execute(sql_command,val1)
    p0=p0+1

p2=1
for post1 in soup.findAll("div",{"class":"priceView-hero-price priceView-purchase-price"}):
    #print(post1.text)
    sql_command = "UPDATE bestbuy SET price=? where id=?"
    val1=(post1.text,p2)
    crsr.execute(sql_command,val1)
    p2=p2+1
p3=1;
for post in soup.findAll("span", {"class": "c-review-average"}):
    sql_command = "UPDATE bestbuy SET rating=? where id=?"
    val1 = (post.text, p3)
    crsr.execute(sql_command, val1)
    p3=p3+1
crsr.execute("SELECT id1,name,price,rating FROM bestbuy")
ans=crsr.fetchall()

connection.commit()
connection.close()
for i in ans:
    print(i)
    print("?")
