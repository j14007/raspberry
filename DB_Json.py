#!usr/bin/env python
#-*- coding: utf-8 -*-

import MySQLdb
import json

if __name__=="__main__":
    connector = MySQLdb.connect(host="localhost", db="j14007", user="j14007", passwd="teikyo", charset="utf8")
    cursor = connector.cursor()

    f = open('test/test.json')
    data = json.load(f)
    f.close()
    for num in range(1, len(data)+1):
        new = data[str(num)]
        sql = "insert into sensors(Value) values("+new+")"
        cursor.execute(sql)
    connector.commit()
    cursor.close()
    connector.close()
