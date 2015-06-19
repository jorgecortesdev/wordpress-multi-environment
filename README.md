# Wordpress multi-environment template #

Este repositorio contiene una plantilla para generar una instalación de wordpress multi-ambiente.

Sirve para comenzar un repositorio rápido e independiente de wordpress y sus plugins ya que
esta enfocado más en el desarrollo del tema de la aplicación que al mantenimiento de wordpress.

Se utiliza composer para facilitar el manejo de versiones tanto para la versión de wordpress
como de los plugins.

### Instalación ###

```
$ mkdir /www/docroot/mynewproject.com
$ cd /www/docroot/mynewproject.com
$ git clone git@bitbucket.org:xorth/wordpress-multi-environment.git .
$ git config remote.origin.url git@bitbucket.org:[user]/mynewproject.com.git
$ git remote -v
$ git push -u origin --all
$ git push -u origin --tags
$ composer install
```

Agrega el nuevo sitio a tu archivo de hosts:

```
$ sudo -- sh -c "echo 127.0.0.1 dev.mynewproject.com >> /etc/hosts"
```

Edita el archivo de virtual hosts del apache y agrega:

```
<VirtualHost *:80>
    ServerAdmin admin@mail.com
    ServerName [dev.mynewproject.com]
    DocumentRoot [/www/docroot/mynewproject.com]

    <Directory [/www/docroot/mynewproject.com]>
        DirectoryIndex index.php
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

Edita el archivo config/wp-environment para agregar las URL's de tus ambientes:

```
switch ($hostname) {
    case 'dev.mynewproject.com':
        define('WP_ENV', 'development');
        break;
    default: 
        define('WP_ENV', 'production');
}
```

Crea la base de datos y el usuario:

```
$ mysql -uroot -p -e "CREATE DATABASE mynewproject_com;"
$ mysql -uroot -p -e "GRANT USAGE ON mynewproject_com.* TO dev_user@localhost IDENTIFIED BY 'clave';"
$ mysql -uroot -p -e "GRANT ALL PRIVILEGES ON mynewproject_com.* TO dev_user@localhost;"
$ mysql -uroot -p -e "FLUSH PRIVILEGES;"
```

Edita el archivo config/wp-environment.php para agregar los datos recien creados:

```
define('DB_NAME',     'mynewproject_com');
define('DB_USER',     'dev_user');
define('DB_PASSWORD', 'clave');
define('DB_HOST',     'localhost');
```

Ahora solo entra a tu navegador favorito para terminar la instalación por parte de wordpress, visita la url: http://dev.mynewproject.com/

### Archivos y directorios ###

* app/ - Contiene los directorios plugins, themes y uploads de wordpress.
* config/ - Contiene los archivos de configuración de la aplicación.
    * wp-default.php - Contiene configuración compartida entre ambientes.
    * wp-development.php - Contiene la configuración del area de desarollo (Base de datos).
    * wp-production.php - Contiene la configuración del area de desarollo (Base de datos).
    * wp-environment - Configura el ambiente a partir del hostname o la variable WP_ENV seteada.
* composer.json - Contiene la configuración de composer, aquí se agrega la dependencia de plugins.
* index.php - Archivo index.php copiado de una instalación de wordpress y alterado para usar wordpress del directorio wp/.
* wp-config.php - Archivo de configuración de wordpress modificado para que funcione multi ambiente.
