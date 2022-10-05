from flask import Flask, json, request
from pymongo import MongoClient

USER = "grupo72"
PASS = "grupo72"
DATABASE = "grupo72"
PORT = 27017

URL = f"mongodb://{USER}:{PASS}@gray.ing.puc.cl/{DATABASE}?authSource=admin"
client = MongoClient(URL, PORT)

db = client["grupo72"]

app = Flask(__name__) 

#######GET#######

#Implementamos una manera de visualizar los mensajes
@app.route('/messages')
def get_messages():
    mensajes = list(db.mensajes.find({},{"_id":0}))
    return json.jsonify(mensajes)

#Implementamos una manera de visualizar los mensajes pedidos segun su id
@app.route('/messages/<int:mid>')
def get_messages_id(mid):
    try:
        mensaje = list(db.mensajes.find({"mid":mid},{"_id":0}))
        if mensaje == []:
            return json.jsonify({"success": False, "razon":"Error. No existe un mensaje con ese id."})
        else:
            return json.jsonify(mensaje)
    except ValueError:
        return json.jsonify({"success": False, "razon": 'El id ingresado no es válido'})

#Implementamos una manera de visualizar los ususarios
@app.route('/users')
def get_users():
    usuarios = list(db.usuarios.find({},{"_id":0}))
    return json.jsonify(usuarios)

#Implementamos una manera de visualizar los ususarios pedidos segun su id y sus mensajes enviados
@app.route('/users/<int:uid>')
def get_user_id(uid):
    try:
        usuario = list(db.usuarios.find({"uid":uid},{"_id":0}))
        mensajes = list(db.mensajes.find({"sender":uid},{"_id":0}))
        if usuario == []:
           return json.jsonify({"success": False, "razon":"Error. No existe un usuario con ese id."})
        else:
            return json.jsonify(usuario + mensajes)
    except ValueError:
        return json.jsonify({"success": False, "razon":'El id ingresado no es válido'})
 
#Implementamos una manera en la que al ingresar dos ID en el URL de la siguiente manera 
#/messages/?id=145&id2=89 (los nombres de las variables no necesitan ser id especificamente)
#te entrega sus mensajes intercambiados
@app.route('/messages/')
def get_messages_exchanged():
    try:
        arg = request.args.to_dict()
        data =  list(arg.keys())
        mensajes1 = list(db.mensajes.find({"sender": int(arg[data[0]]), "receptant":int(arg[data[1]])}, {"_id":0}))
        mensajes2 = list(db.mensajes.find({"sender": int(arg[data[1]]), "receptant":int(arg[data[0]])}, {"_id":0}))
        if len(mensajes1 + mensajes2) != 0: 
            return json.jsonify(mensajes1 + mensajes2)
        else:
            return json.jsonify({"success": False, "razon":'No hay mensajes para estos id'})
    except ValueError:
        return json.jsonify({"success": False, "razon":'Un id ingresado no es válido'})

   
@app.route('/text-search') 
def text_search():
    db.mensajes.create_index([('message', 'text')])
    try:
        query = {key: request.json[key] for key in request.json.keys()}
    except:
        response = db.mensajes.find({},{"_id":0})
        return json.jsonify(list(response))
    
    
    desired, required, forbidden, userId = "", "", "", ""

    if 'desired' in query.keys():
        for item in query["desired"]:
            desired = desired + " " + str(item)
    if 'required' in query.keys():
        for item in query["required"]:
            required = required + " \"" + str(item) + "\""
    if 'forbidden' in query.keys():
        for item in query["forbidden"]:
            forbidden = forbidden + " -\"" + str(item) + "\""
    if 'userId' in query.keys():
        userId = query["userId"]

    forbidden_error = False
    if len(desired + required) == 0 and len(forbidden) != 0:
        forbidden = ""
        forbidden_error = True
        for item in query["forbidden"]:
            forbidden = forbidden + " \"" + str(item) + "\""

    req = desired + required + forbidden

    print(f"req:[{req}], uid[{userId}]")

    if len(req) == 0 and userId == "":
        response = db.mensajes.find({},{"_id":0})
    elif len(req) == 0 and userId != "":
        response = db.mensajes.find({"sender": userId},{"_id":0})
    elif len(req) != 0 and userId != "":
        response = db.mensajes.find({"$text": {"$search": req[1:]}, "sender": userId},{"_id":0})
    else:
        response = db.mensajes.find({"$text": {"$search": req[1:]}},{"_id":0})

    if forbidden_error:
        all = db.mensajes.find({},{"_id":0})
        response = set(list(all).values()) - set(list(response.values())) 
    
    return json.jsonify(list(response))

@app.route('/message/<int:mid>', methods=['DELETE'])
def delete_msg(mid):
    mensaje = list(db.mensajes.find({"mid":mid}))
    if mensaje == []:
        return json.jsonify({"success": False, "error": "id no existe"})

    else:
        db.mensajes.remove({'mid':mid})
        return json.jsonify({"success": True})

POST_KEYS = ['message', 'sender', 'receptant', 'lat', 'long', 'date']

@app.route('/messages', methods=['POST'])
def post_msg():
    mayor = 0
    mensajes = list(db.mensajes.find({},{"_id":0}))
    for i in mensajes:
        if i["mid"] > mayor:
            mayor = i["mid"]

    data = {key: request.json[key] for key in POST_KEYS}
    data['mid'] = mayor + 1
    if data['message'] == '' or data['message'] is None:
        return json.jsonify({"success": False})

    elif isinstance(data['sender'], int) == False or data['sender'] is None:
        return json.jsonify({"success": False})

    elif isinstance(data['receptant'], int) == False or data['receptant'] is None:
        return json.jsonify({"success": False})
    
    if isinstance(data['lat'], float) == False or data['lat'] is None:
        return json.jsonify({"success": False})
    
    if isinstance(data['long'], float) == False or data['long'] is None:
        return json.jsonify({"success": False})

    j = data['date']
    x = j.split('-')
    

    
    

    result = db.mensajes.insert_one(data)

    return json.jsonify({"success": True})
if __name__ == '__main__':
    app.run(debug=True)
