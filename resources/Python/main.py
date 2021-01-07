#!/usr/bin/python3

#import sys
#x=sys.argv[1]
#print(x)

import xlrd
import mysql.connector
import math

class   CaricaFattura:
    def __init__(self, file_name = None, op_id = None, metodo = 0):
        """
            Costruttore della classe Carica Fattura
            file_name = nome del file da cui leggere i dati
            operazione_id = nome dell' operazione a cui appartengono i dati da cui si ricavano il fornitore il destinatario ecc ....
        """
        self.FileName = file_name
        self.operazione_id = int(op_id)
        self.metodo = int(metodo)

        self.db_con = mysql.connector.connect(user='eric', password='fragola', host='127.0.0.1', database='container')
        self.cur = self.db_con.cursor()
        query = ("SELECT nome_fornitore FROM operazioni WHERE id = '%d'"%int(self.operazione_id))
        self.cur.execute(query)
        record = self.cur.fetchall()
        self.fornitore = record[0][0].strip()
        query = ("SELECT id FROM fornitori WHERE soprannome = '%s'"%self.fornitore)
        self.cur.execute(query)
        record = self.cur.fetchall()
        self.fornitore_id = int(record[0][0])


        #self.cur.close()
        #self.con.close()

    def load(self):
        """
            determina con quale convertitore caricare il file passato
        """
        #print('sono in load fornitore = %s'%self.fornitore)
        if self.fornitore == 'Paris':
            self.CaricaFatturaParis()
        elif self.fornitore == 'Matt':
            self.CaricaFatturaParis()





    def CaricaFatturaParis(self):
        """
            legge il file xls formato dal cliente Paris
        """
        fattura = xlrd.open_workbook(self.FileName)
        foglio1 = fattura.sheet_by_index(1)
        foglio2 = fattura.sheet_by_index(0)

        index = 0


        for index in range(12, foglio1.nrows):
            if foglio2.row_values(index)[0] == '' and foglio2.row_values(index)[1] == '':
                break

            try:
                articolo = str(foglio1.row_values(index)[0]).strip()
                if '.' in articolo:
                    articolo = articolo[:-2]
            except:
                continue

            codice_articolo = str(foglio1.row_values(index)[0])
            if '.' in codice_articolo:
                codice_articolo = codice_articolo[:-2]

            descrizione = foglio1.row_values(index)[1]

            cartoni = int(foglio1.row_values(index)[8])

            pezzi = int(foglio1.row_values(index)[5])

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


            if self.metodo == 1:
                query1 = ("SELECT * FROM elenco_articoli WHERE codice_articolo = '%s' AND fornitore_id = '%d'" %(articolo,self.fornitore_id))
                self.cur.execute(query1)
                record = self.cur.fetchone()

                if record:
                    query = ("INSERT INTO fattura_data(uk_descrizione, colli, pezzi, peso_lordo, peso_netto, prezzo_totale, prezzo_unitario,fornitore, operazione, unita_misura, codice_prodotto, fornitore_id, it_descrizione, voce_doganale, aliquota_iva, acciaio, acciaio_inox, plastica, legno, bambu, vetro, ceramica, carta, pietra, posateria, attrezzi_cucina, richiede_ce, richiede_age, richiede_cites)  VALUES ('%s', '%d', '%d', '%.2f', '%.2f', '%.2f', '%.2f', '%s', '%d', '%s', '%s', '%d', '%s', '%s', '%.1f', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d' )" %(descrizione, cartoni, pezzi, lordo, netto, valore, unitario, self.fornitore, int(self.operazione_id), unita_misura, codice_articolo, int(self.fornitore_id), record[2], str(record[3]), record[6], record[7], record[8], record[9], record[10], record[11], record[12], record[13], record[14], record[15], record[16], record[17], record[18], record[19], record[20]))
                    #file1.write("sono in record "+str(query))

                else :
                    query = ("INSERT INTO fattura_data(uk_descrizione, colli, pezzi, peso_lordo, peso_netto, prezzo_totale, prezzo_unitario,fornitore, operazione, unita_misura, codice_prodotto, fornitore_id )  VALUES ('%s', '%d', '%d', '%.2f', '%.2f', '%.2f', '%.2f', '%s', '%d', '%s', '%s', '%d' )" %(descrizione, cartoni, pezzi, lordo, netto, valore, unitario, self.fornitore, int(self.operazione_id), unita_misura, codice_articolo, int(self.fornitore_id)))
                    #file1.write("sono in else "+str(query))

                self.cur.execute(query)
                self.db_con.commit()


            else:
                query = ("INSERT INTO fattura_data(uk_descrizione, colli, pezzi, peso_lordo, peso_netto, prezzo_totale, prezzo_unitario,fornitore, operazione, unita_misura, codice_prodotto, fornitore_id )  VALUES ('%s', '%d', '%d', '%.2f', '%.2f', '%.2f', '%.2f', '%s', '%d', '%s', '%s', '%d' )" %(descrizione, cartoni, pezzi, lordo, netto, valore, unitario, self.fornitore, int(self.operazione_id), unita_misura, codice_articolo, int(self.fornitore_id)))

                self.cur.execute(query)
                self.db_con.commit()


def main(args):
    #print(args)
    file_name = args[1]
    id = args[2]
    modo = args[3]

    ''' file1 = open("/home/angelo/laravel/container/resources/Python/myfile.txt","w")
    file1.write("elenco vatiabili \n")
    file1.write(file_name)
    file1.write('\n')
    file1.write(id)
    file1.write('\n')
    file1.write(modo)
    file1.close() '''
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
    #file_name = '/home/angelo/Scrivania/fattura-tipo.xls'
    carica_fattura = CaricaFattura(file_name,int(id),int(modo))
    #carica_fattura = CaricaFattura(file_name,75,1)
    carica_fattura.load()


    return 0

if __name__ == '__main__':
	import sys
	sys.exit(main(sys.argv))



