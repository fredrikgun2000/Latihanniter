import os
import re
from flask import Flask,request
from flask import json,make_response,render_template
from flask.json import jsonify
from flask_cors import CORS,cross_origin
from flask_sqlalchemy import SQLAlchemy
from sqlalchemy import desc
from werkzeug.utils import secure_filename
from flask_marshmallow import Marshmallow

app = Flask(__name__)
CORS(app)
ENV='dev'
if ENV=='dev':
    app.debug=True
    app.config['SQLALCHEMY_DATABASE_URI'] = 'postgresql://postgres:admin@localhost/crudpython'
else:
    app.debug=False
    app.config['SQLALCHEMY_DATABASE_URI'] = ''

app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

db=SQLAlchemy(app)
ma=Marshmallow(app)

class Data(db.Model):
    __tablename__='data'
    id=db.Column(db.Integer, primary_key=True, autoincrement=True)
    nim=db.Column(db.String(255))
    nama=db.Column(db.String(255))
    email=db.Column(db.String(255))
    foto=db.Column(db.String(255))

    def __init__(self,nim,nama,email,foto):
        self.nim=nim
        self.nama=nama
        self.email=email
        self.foto=foto

class DataSchema(ma.Schema):
    class Meta:
        fields=('id','nim','nama','email','foto')

data_schema=DataSchema()
datas_schema=DataSchema(many=True)

@app.route('/Post', methods=['POST'])
@cross_origin(origin='*')

def PostData():
    newnim=request.form['nim']
    newnama=request.form['nama']
    newemail=request.form['email']
    newfoto=request.files['foto']

    app.config['UPLOAD_FILES']='D:\koding\python\crud\latihan\public\img'
    filename_edit=newfoto.filename
    filename=secure_filename(filename_edit.replace(' ',''))
    newfoto.save(os.path.join(app.config['UPLOAD_FILES'],filename))

    data=Data(nim=newnim,nama=newnama,email=newemail,foto=filename_edit.replace(' ',''))
    db.session.add(data)
    db.session.commit()
    return data_schema.jsonify(data)

@app.route('/Load', methods=['GET'])
@cross_origin(origin='*')
def LoadData():
    dataall=Data.query.order_by(desc(Data.id)).all()
    result=datas_schema.dump(dataall)
    return jsonify(result)

@app.route('/Edit', methods=['GET'])
@cross_origin(origin='*')
def EditData():
    newid=request.args['id']
    dataedit=Data.query.get(newid)
    return data_schema.jsonify(dataedit)

@app.route('/Update', methods=['POST'])
@cross_origin(origin='*')
def UpdateData():
    newfoto=request.files['editfoto'].filename.replace(' ','')
    newid=request.form['editid']
    dataedit=Data.query.get(newid)
    dataedit.nim=request.form['editnim']
    dataedit.nama=request.form['editnama']
    dataedit.email=request.form['editemail']
    dataedit.foto=newfoto

    app.config['UPLOAD_FILES']='D:\koding\python\crud\latihan\public\img'
    filename=secure_filename(newfoto)
    request.files['editfoto'].save(os.path.join(app.config['UPLOAD_FILES'],filename))
    db.session.commit()
    return data_schema.jsonify(dataedit)

@app.route('/Delete', methods=['GET'])
@cross_origin(origin='*')
def DeleteData():
    newid=request.args['id']
    datadelete=Data.query.get(newid)
    db.session.delete(datadelete)
    db.session.commit()
    return data_schema.jsonify(datadelete)

@app.route('/Search', methods=['GET'])
@cross_origin(origin='*')
def Search():
    newsearch=request.args['search']
    search = "%{}%".format(newsearch)
    data = Data.query.filter(Data.nama.like(search)).order_by(desc(Data.id)).all()
    result=datas_schema.dump(data)
    return jsonify(result)
   

if __name__ == "__main__":
    app.run()