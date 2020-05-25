# CV-AR

## Preparación del entorno de desarrollo

### Requisitos

Necesitas NodeJS para ESLint, un servidor HTTP y PHP

### Clonación del repositorio

Clona el repositorio

### Instalar las dependencias de ESLint

Dentro del repositorio ejecuta:

```
npm install
```

## Docker

Necesitas tener clonado el repositorio y estar ubicado en él.

### Normal

Se crea la imagen, este es un ejemplo:

```
docker build -t cv-ar:master .
```

Creamos el contendor Docker usando la imagen que creamos en el paso anterior, este es un ejemplo:

```
docker create \
    --name cv-ar-master \
    -p 443:443 \
    -v ruta de la configuración:/config \
    --restart unless-stopped \
    cv-ar:master
```


### Desarrollo

Se crea la imagen para el desarrollo indicando el argumento `develop="yes"`, entre sus características incluye xdebug, este es un ejemplo:

```
docker build -t cv-ar:develop . --build-arg develop="yes"
```

Creamos el contendor Docker usando la imagen que creamos en el paso anterior, este es un ejemplo:

```
docker create \
    --name cv-ar-develop \
    -p 443:443 \
    -v ruta de la configuración:/config \
    -v ruta del repositorio clonado:/var/www/html/ \
    --restart unless-stopped \
    cv-ar:develop
```

__NOTA:__ Antes de arrancar el contenedor, es necesario un certificado SSL con la clave llamada _ssl.key_ y el certificado llamado _ssl.crt_ dentro del volumen _config_, este es un ejemplo de creación de claves autofirmadas usando OpenSSL:

```
openssl req -new -x509 -days 365 -nodes -out /ruta de la configuración/ssl.crt -keyout /ruta de la configuración/ssl.key
```
