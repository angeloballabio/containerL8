#!/usr/bin/python3

#import sys
#x=sys.argv[1]
#print(x)

import xlrd
import mysql.connector
import math
#from MySQLdb import _mysql

#from .carica_fattura_paris import carica_fattura_paris

def carica_fattura_paris(fname,fornitore,id):
    """
    Gestione del caricamento delle fatture di paris
    """

    fattura = xlrd.open_workbook(fname)
    foglio1 = fattura.sheet_by_index(1)
    foglio2 = fattura.sheet_by_index(0)

    index = 0
    con = mysql.connector.connect(user='eric', password='fragola', host='127.0.0.1', database='container')
    cur = con.cursor()

    for index in range(12, foglio1.nrows):
        print(index)
        if foglio2.row_values(index)[0] == '' and foglio2.row_values(index)[1] == '':
            break

        try:
            articolo = str(foglio1.row_values(index)[0])
            if '.' in articolo:
                articolo = articolo[:-2]
        except:
            continue

        codice_articolo = str(foglio1.row_values(index)[0])
        if '.' in codice_articolo:
            codice_articolo = codice_articolo[:-2]

        descrizione = foglio1.row_values(index)[1]

        cartoni = int(foglio1.row_values(index)[8])
        ''' if '.' in cartoni:
            cartoni = int(cartoni[:-2]) '''

        pezzi = int(foglio1.row_values(index)[5])
        ''' if '.' in pezzi:
            pezzi = int(pezzi[:-2]) '''

        unita_misura = foglio1.row_values(index)[6]

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


        query = ("INSERT INTO fattura_data(uk_descrizione, colli, pezzi, peso_lordo, peso_netto, prezzo_totale, prezzo_unitario,fornitore, operazione, unita_misura, codice_prodotto )  VALUES ('%s', '%d', '%d', '%.2f', '%.2f', '%.2f', '%.2f', '%s', '%d', '%s', '%s' )" %(descrizione, cartoni, pezzi, lordo, netto, valore, unitario, fornitore, int(id), unita_misura, codice_articolo))
        print(query)
        cur.execute(query)
        con.commit()
    cur.close()
    con.close()

class   CaricaFattura:
    def __init__(self, file_name = None, op_id = None):
        """
            Costruttore della classe Carica Fattura
            file_name = nome del file da cui leggere i dati
            operazione_id = nome dell' operazione a cui appartengono i dati da cui si ricavano il fornitore il destinatario ecc ....
        """
        self.FileName = file_name
        self.operazione_id = op_id

        self.db_con = mysql.connector.connect(user='eric', password='fragola', host='127.0.0.1', database='container')
        self.cur = self.db_con.cursor()
        query = ("SELECT nome_fornitore FROM operazioni WHERE id = '%d'"%int(self.operazione_id))
        self.cur.execute(query)
        record = self.cur.fetchall()
        print(record)
        self.fornitore = record[0][0].strip()
        query = ("SELECT id FROM fornitori WHERE soprannome = '%s'"%self.fornitore)
        self.cur.execute(query)
        record = self.cur.fetchall()
        print(record)
        self.fornitore_id = int(record[0][0])

        """ if self.fornitore == 'Paris':
            CaricaFatturaParis(self, self.fornitore_id, self.operazione_id, self.FileName) """

        #self.cur.close()
        #self.con.close()

    def load(self):
        """
            determina con quale convertitore caricare il file passato
        """
        print('sono in load fornitore = %s'%self.fornitore)
        if self.fornitore == 'Paris':
            self.CaricaFatturaParis()



    #def CaricaFatturaParis(self, fid, op_id, fname):
    def CaricaFatturaParis(self):
        """
            legge il file xls formato dal cliente Paris
        """
        print('sono in carica Paris')
        fattura = xlrd.open_workbook(self.FileName)
        foglio1 = fattura.sheet_by_index(1)
        foglio2 = fattura.sheet_by_index(0)

        index = 0
        """ con = mysql.connector.connect(user='eric', password='fragola', host='127.0.0.1', database='container')
        cur = con.cursor() """

        for index in range(12, foglio1.nrows):
            print(index)
            if foglio2.row_values(index)[0] == '' and foglio2.row_values(index)[1] == '':
                break

            try:
                articolo = str(foglio1.row_values(index)[0])
                if '.' in articolo:
                    articolo = articolo[:-2]
            except:
                continue

            codice_articolo = str(foglio1.row_values(index)[0])
            if '.' in codice_articolo:
                codice_articolo = codice_articolo[:-2]

            descrizione = foglio1.row_values(index)[1]

            cartoni = int(foglio1.row_values(index)[8])
            ''' if '.' in cartoni:
                cartoni = int(cartoni[:-2]) '''

            pezzi = int(foglio1.row_values(index)[5])
            ''' if '.' in pezzi:
                pezzi = int(pezzi[:-2]) '''

            unita_misura = foglio1.row_values(index)[6]

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


            query = ("INSERT INTO fattura_data(uk_descrizione, colli, pezzi, peso_lordo, peso_netto, prezzo_totale, prezzo_unitario,fornitore, operazione, unita_misura, codice_prodotto, fornitore_id )  VALUES ('%s', '%d', '%d', '%.2f', '%.2f', '%.2f', '%.2f', '%s', '%d', '%s', '%s', '%d' )" %(descrizione, cartoni, pezzi, lordo, netto, valore, unitario, self.fornitore, int(self.operazione_id), unita_misura, codice_articolo, int(self.fornitore_id)))
            print(query)
            self.cur.execute(query)
            self.db_con.commit()


def main(args):
    #print(args)
    file_name = args[1]
    id = args[2]
    """ con = mysql.connector.connect(user='eric', password='fragola', host='127.0.0.1', database='container')
    cur = con.cursor()
    query = ("SELECT nome_fornitore FROM operazioni WHERE id = %d"%int(id) )
    #print(file_name,' ', id)
    cur.execute(query)
    record = cur.fetchall()
    fornitore = str(record[0][0].strip())

    if fornitore == 'Paris':
        carica_fattura_paris(file_name, fornitore, id)

    cur.close()
    con.close() """
    carica_fattura = CaricaFattura(file_name,id)
    carica_fattura.load()


    return 0

if __name__ == '__main__':
	import sys
	sys.exit(main(sys.argv))



