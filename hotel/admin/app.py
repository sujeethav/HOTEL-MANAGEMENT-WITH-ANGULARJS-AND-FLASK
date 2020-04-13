from flask import Flask, render_template
import mysql.connector

app = Flask(__name__)

@app.route('/wt2/graph')

def graph():
	mydb = mysql.connector.connect(host="localhost",user="root",passwd="root",database="hotel")
	cur=mydb.cursor()
	#out=[['Task','Hours per Day'],['Work',11],['Eat',2],['Commute',2],['Watch TV',2],['Sleep',7]]
	out=[['PAYMENT_METHODS','NUMBER_OF_PAYMENTS']]
	cur.execute("SELECT COUNT(GUEST_NUM), PAYMENT_METHODS FROM payment GROUP BY PAYMENT_METHODS")
	output=cur.fetchall()
	for row in output:
		ar=[]
		ar.append(row[1])
		ar.append(row[0])
		out.append(ar)
	cur.execute("SELECT COUNT(BILL_ID),SUM(AMOUNT), DATE FROM (SELECT * FROM bill ORDER BY DATE ASC ) AS sub GROUP BY sub.DATE")

	output2=cur.fetchall()
	out2=[["Date","total money"]]
	for row in output2:
		ar=[]
		ar.append(str(row[2]))
		ar.append(int(row[1]))
		#ar.append(int(row[0]))
		out2.append(ar)
	cur.execute("SELECT COUNT(EMP_ID), gender FROM employee GROUP BY gender")
	output3=cur.fetchall()
	out3=[["gender","count"]]
	for row in output3:
		ar=[]
		ar.append(row[1])
		ar.append(row[0])
		out3.append(ar)

	cur.execute("SELECT COUNT(GST_ID), CATEGORY FROM reservation GROUP BY CATEGORY")
	output4=cur.fetchall()
	out4=[["ROOM CATEGORY", "NO_OF_RESERVATONS"]]
	for row in output4:
		ar=[]
		ar.append(row[1])
		ar.append(row[0])
		out4.append(ar)


	return render_template('index.html',datum=out,dat=out2, dat3=out3,dat4=out4)

if __name__ == '__main__':
    app.run(debug=True)
