#!/usr/bin/env python
# -*- coding: utf-8 -*-
import urllib.request
from bs4 import  BeautifulSoup as b
import sqlite3
connection=sqlite3.connect(r'''C:\wamp64\www\Project\Database.db''')

crsr=connection.cursor()

crsr.execute("SELECT id,name,price FROM ebay UNION ALL SELECT id1,name,price from bestbuy UNION ALL SELECT id,name,price from AliExpress1")
#names = [x[0] for x in crsr.description]

ans=crsr.fetchall()

for i in ans:
    print(i)
    print("?")