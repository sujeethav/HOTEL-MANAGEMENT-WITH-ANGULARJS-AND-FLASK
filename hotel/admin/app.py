from flask import Flask, render_template,request
import mysql.connector
from flask_mysqldb import MySQL
from flask import jsonify
from flask_cors import CORS,cross_origin
import requests
import json
app = Flask(__name__)
cors=CORS(app)

@app.route('/wt2/reservations/list',methods=['GET','OPTIONS'])
@cross_origin()
def lis():
	mydb = mysql.connector.connect(host="localhost",user="root",passwd="root",database="hotel")
	cur=mydb.cursor()
	cur.execute("select fname,guest_id,room_no,checkout_date,ph_no,checkin_date from customer,reservation,room where guest_id=gst_id and gst_id=customer_id and hall_number is NULL")
	rv = cur.fetchall()
	payload = []
	content = {}
	for result in rv:
		content = {'FNAME': result[0], 'GUEST_ID': result[1], 'ROOM_NO': result[2], 'CHECKOUT_DATE':result[3], 'PH_NO':result[4], 'CHECKIN_DATE':result[5]}
		payload.append(content)
		content = {}
	return jsonify(payload),200

@app.route('/wt2/employees/view',methods=['GET','OPTIONS'])
@cross_origin()
def view_emps():
	mydb = mysql.connector.connect(host="localhost",user="root",passwd="root",database="hotel")
	cur=mydb.cursor()
	cur.execute("SELECT * FROM `employee` WHERE 1")
	rv = cur.fetchall()
	payload = []
	content = {}
	for result in rv:
		content = {'SALARY': result[0], 'FNAME': result[1], 'MINIT': result[2], 'LNAME':result[3], 'JOIN_DATE':result[4], 'DOB':result[5], 'EMP_ID':result[6], 'PHONE':result[7], 'GENDER':result[8]}
		payload.append(content)
		content = {}
	return jsonify(payload),200

@app.route('/wt2/employees/add_emp',methods=['POST','OPTIONS'])
@cross_origin()
def view_emp():
	data=request.get_json()
	t=(int(data['salary']),data['fname'],data['mname'],data['lname'],data['join_date'],data['dob'],int(data['phno']),data['gender'])
	print(t)
	try:
		mydb = mysql.connector.connect(host="localhost",user="root",passwd="root",database="hotel")
		cur=mydb.cursor()
		cur.execute('INSERT INTO `employee`(`SALARY`, `FNAME`, `MINIT`, `LNAME`, `JOIN_DATE`, `DOB`, `PHONE`, `gender`) VALUES' + str(t))
	except(MySQL.Error,MySQL.Warning) as e:
		cur.close()
		return "FAIL",400
	mydb.commit()
	cur.close()
	return "SUCCCESS",200

@app.route('/wt2/employees/get_emp',methods=['POST','OPTIONS'])
@cross_origin()
def get_emp():
	data=request.get_json()
	data['emp_id']
	mydb = mysql.connector.connect(host="localhost",user="root",passwd="root",database="hotel")
	cur=mydb.cursor()
	cur.execute("SELECT * FROM `employee` WHERE `EMP_ID`="+str(data['emp_id']))
	rv = cur.fetchall()
	payload = []
	content = {}
	for result in rv:
		content = {'SALARY': result[0], 'FNAME': result[1], 'MINIT': result[2], 'LNAME':result[3], 'JOIN_DATE':result[4], 'DOB':result[5], 'EMP_ID':result[6], 'PHONE':result[7], 'GENDER':result[8]}
		payload.append(content)
		content = {}
	return jsonify(payload),200

@app.route('/wt2/employees/del_emp',methods=['POST','OPTIONS'])
@cross_origin()
def del_emp():
	data=request.get_json()
	try:
		mydb = mysql.connector.connect(host="localhost",user="root",passwd="root",database="hotel")
		cur=mydb.cursor()
		cur.execute("DELETE FROM `employee` WHERE `EMP_ID`="+str(data['emp_id']))
	except(MySQL.Error,MySQL.Warning) as e:
		cur.close()
		return "FAIL",400
	mydb.commit()
	cur.close()
	return "SUCCCESS",200

if __name__ == '__main__':
    app.run(debug=True)

