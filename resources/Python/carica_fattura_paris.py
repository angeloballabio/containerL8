#!/usr/bin/python3

import xlrd
import mysql.connector
import math

def carica_fattura_paris(fname):
    """
    Gestione del caricamento delle fatture di paris
    """
    print(fname)
    fattura = xlrd.open_workbook(fname)
    foglio1 = fattura.sheet_by_index(0)
    foglio2 = fattura.sheet_by_index(1)

    index = 0
    con = mysql.connector.connect(user='eric', password='fragola', host='127.0.0.1', database='container')
    cur = con.cursor()

    for index in range(11, foglio1.nrows):
        if foglio1.row_values(index)[0] == 'TOTAL' and foglio1.row_values(index)[1] == '':
            break

        try:
            articolo = str(foglio1.row_values(index)[0])
            if '.' in articolo:
                articolo = articolo[:-2]
        except:
            continue

        descrizione = foglio1.row_values(index)[1]
        cartoni = foglio1.row_values(index)[2]
        if '.' in cartoni:
            cartoni = int(cartoni[:-2])
        pezzi = foglio1.row_values(index)[4]
        if '.' in pezzi:
            pezzi = int(pezzi[:-2])

        try:
            lordo = float('%.3f'%foglio1.row_values(index)[5])
        except:
            lordo = 0.0

        try:
            netto = float('%.3f'%(math.floor(lordo-(cartoni * 0.7))))
        except:
            netto = 0.000

        valore = float('%.2f'%foglio2.row_values(index)[3])
        query = ("INSERT INTO fattura_data(uk_descrizione, colli, pezzi, peso_lordo,peso_netto) VALUES(%s, %d, %d, %.3f, %.3f)%(descrizione, cartoni, pezzi, lordo, netto)")
        cur.execute(query)

    cur.close()
    con.close()
