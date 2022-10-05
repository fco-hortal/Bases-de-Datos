import psycopg2

try:
    conn = psycopg2.connect(
        database='exampleDB',
        user='user',
        host='localhost',
        port=5432,
        password=''
    )
    # Obtenemos un cursor
    cursor1 = conn.cursor()
    
    #Definimos los nuevos datos que vamos a ingresar
    peliculas = [
        ("El Padrino", 1972),
        ("Batman: El caballero de la noche", 2008),
        ("Pulp Fiction", 1994)
    ]

    #Definimos el cuerpo de la consulta
    query = "INSERT INTO Peliculas VALUES ('{nombre}', {estreno});"
    for nombre, estreno in peliculas:
        cursor1.execute(query.format(nombre=nombre, estreno=estreno))

    # Guardamos los cambios
    conn.commit()
    # Cerramos el cursor
    cursor1.close()
    
    #Obtenemos un cursor con el que ejecutamos las consultas
    cursor2 = conn.cursor()
    cursor2.execute("SELECT * FROM Peliculas")
    row = cursor2.fetchone()
    while row:
        print(row)
        row = cursor2.fetchone()

    cursor2.close()
    # MUY IMPORTANTE
    conn.close()

except Exception as e:
    print('Hubo un problema :c')
    print(e)