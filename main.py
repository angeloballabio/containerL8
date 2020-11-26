#!/usr/bin/python3

#import sys
#x=sys.argv[1]
#print(x)

import xlrd
import mysql.connector
import math
from MySQLdb import _mysql
#from .carica_fattura_paris import carica_fattura_paris

def carica_fattura_paris(fname):
    """
    Gestione del caricamento delle fatture di paris
    """
    print('sono in fattura paris'+fname)
    fattura = xlrd.open_workbook(fname)
    foglio1 = fattura.sheet_by_index(1)
    foglio2 = fattura.sheet_by_index(0)

    index = 0
    con = mysql.connector.connect(user='eric', password='fragola', host='127.0.0.1', database='container')
    cur = con.cursor()

    for index in range(12, foglio1.nrows):
        if foglio2.row_values(index)[0] == '' and foglio2.row_values(index)[1] == '':
            break

        try:
            articolo = str(foglio1.row_values(index)[0])
            if '.' in articolo:
                articolo = articolo[:-2]
        except:
            continue

        descrizione = foglio1.row_values(index)[1]

        cartoni = int(foglio1.row_values(index)[8])
        ''' if '.' in cartoni:
            cartoni = int(cartoni[:-2]) '''

        pezzi = int(foglio1.row_values(index)[5])
        ''' if '.' in pezzi:
            pezzi = int(pezzi[:-2]) '''

        try:
            lordo = float('%.3f'%foglio1.row_values(index)[10])
        except:
            lordo = 0.0

        try:
            netto = float('%.3f'%(math.floor(lordo-(cartoni * 0.7))))
        except:
            netto = 0.000

        unitario = float('%.2f'%(foglio2.row_values(index)[7]))
        valore = float('%.2f'%(foglio2.row_values(index)[8]))
        #data = (descrizione, cartoni, pezzi, lordo, netto, valore, unitario)
        #print('dati %s, %d, %d, %.3f, %.3f, %.3f, %.3f'%data)

        query = ("INSERT INTO fattura_data(uk_descrizione, colli, pezzi, peso_lordo, peso_netto, prezzo_totale, prezzo_unitario )  VALUES ('%s', '%d', '%d', '%.2f', '%.2f', '%.2f', '%.2f' )" %(descrizione, cartoni, pezzi, lordo, netto, valore, unitario))

        cur.execute(query)
        con.commit()
    cur.close()
    con.close()

def main(args):
    print(args)
    file_name = args[1]
    id = args[2]
    con = mysql.connector.connect(user='eric', password='fragola', host='127.0.0.1', database='container')
    cur = con.cursor()
    query = ("SELECT nome_fornitore FROM operazioni WHERE id = %d"%int(id) )
    print(file_name,' ', id)
    cur.execute(query)
    record = cur.fetchall()

    print(record[0][0])
    if str(record[0][0].strip()) == 'Paris':
        carica_fattura_paris(file_name)

    cur.close()
    con.close()

    return 0

if __name__ == '__main__':
	import sys
	sys.exit(main(sys.argv))



