import codecs
import sys
import urllib.request
try:
    from urllib.request import urlopen
except ImportError:
    from urllib2 import urlopen
from bs4 import BeautifulSoup
import os
import hashlib
import sqlite3
connection=sqlite3.connect(r'''C:\wamp64\www\Project\Database.db''')
crsr=connection.cursor()
dropTableStatement = "DROP TABLE IF EXISTS AliExpress1"
link2=sys.argv[1]


crsr.execute(dropTableStatement)
sql_command="""CREATE TABLE AliExpress1(
            id INTEGER PRIMARY KEY, name VARCHAR(100), price VARCHAR(100),orders VARCHAR(100),condition VARCHAR(100));"""
if(len(sys.argv[1])>0):
    crsr.execute(sql_command)
#crsr.execute("DELETE from AliExpress1")
#crsr.execute(sql_command)


#print('script started')
my_url = 'https://www.aliexpress.com/wholesale?catId=0&initiative_id=SB_20181019133223&SearchText='+link2+'_mobile'

html=urllib.request.urlopen(my_url).read()
soup = BeautifulSoup(html, 'html.parser')
p1=1
for post in soup.findAll('div', {'class': 'info'}):
    sql_command = "INSERT INTO AliExpress1 (id,name,price)VALUES(?,?,?)"
    val = (p1, post.find('a').text, "s")
    crsr.execute(sql_command, val)
    p1 = p1 + 1
    #h=post.find('div',{'class':'info'}).findAll('a')
        #print(post.find('a').text)
    #print(post.text)
p2=1
for post in soup.findAll('div', {'class': 'info'}):
    #h = post.findAll("span", {"class": "value notranslate"})[0]
    sql_command = "UPDATE AliExpress1 SET price=? where id=?"
    val1 = (post.find('span',{'class':'price price-m'}).text ,p2)
    crsr.execute(sql_command, val1)
    p2 = p2 + 1
p3=1
for i in soup.findAll("a", {"class": "order-num-a"}):
    sql_command = "UPDATE AliExpress1 SET orders=? where id=?"
    val1 = (i.text, p3)
    crsr.execute(sql_command, val1)
    p3 = p3 + 1
p4=1;
for i in soup.findAll("div", {"class": "item-condition"}):
    sql_command = "UPDATE AliExpress1 SET condition=? where id=?"
    val1 = (i.text, p4)
    crsr.execute(sql_command, val1)
    p4 = p4 + 1
    #print(post.find('span',{'class':'price price-m'}).text)
crsr.execute("SELECT name,price,orders,condition FROM AliExpress1")
ans=crsr.fetchall()

connection.commit()
connection.close()
for i in ans:
    print(i)
    print("?")