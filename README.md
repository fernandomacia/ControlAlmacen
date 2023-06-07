# CONTROL DE ALMACEN

Proyecto fin de Ciclo DAW

# USUARIO
## LOGIN
    url: api/login
    metodo: get
    json: email, password

## LOGOUT
    url: api/logout
    metodo: get
    Authorization: Bearer token
## VER MI USUARIO
    url: api/user
    metodo: get
    Authorization: Bearer token
## HACER UN PRESTAMO
    url: api/prestamo
    metodo: post
    Authorization: Bearer token
    json: articuloId
## VER MIS PRESTAMOS
    url: api/misPrestamos
    metodo: get
    Authorization: Bearer token
# ADMINISTRADOR
## VER TODOS LOS USUARIOS
    url: api/getUsers
    metodo: get
    Authorization: Bearer token
 ## VER TODOS LOS DEPARTAMENTOS
    url: api/getDepartamentos
    metodo: get
    Authorization: Bearer token
## VER TODOS LOS ARTICULOS
    url: api/getArticulos
    metodo: get
    Authorization: Bearer token
## VER TODOS LOS PRESTAMOS
    url: api/getPrestamos
    metodo: get
    Authorization: Bearer token
## CREAR UN REGISTRO DE USUARIO
    url: api/register
    metodo: post
    Authorization: Bearer token
    json:   'dni' => 'required|string|max:9',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
## HACER LA DEVOLUCION DE UN PRESTAMO
    url: api/devolucion
    metodo: post
    Authorization: Bearer token
    json: articuloId
