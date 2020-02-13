<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Instalar Aplicación Mensakas

Para instalar la aplicación de gestión Mensakas, es necesario descargar la última release disponible en este repositorio y descomprimirla. La descompresión de la release debe hacerse en la ruta a la que apunta el servidor apache (u otro, si procede). Puede consultar las rutas que utiliza apache por defecto [en este enlace](https://httpd.apache.org/docs/2.4/urlmapping.html).

# Requisitos mínimos

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

# Requisitos recomendados

## Instalar Base de Datos MySQL

La base de datos de Mensakas está pensada para abarcar todas las necesidades de la cooperativa. Esto incluye algunas tablas para gestionar el personal, vehículos y otras tareas administrativas que pueda necesitar la empresa.

Para realizar la creación de tablas, debe estar el repositorio clonado, abrir una consola y situarse en la raíz del proyecto. **Es necesario tener una base de datos vacía ya creada en el sistema.** Debe modificarse el fichero .env y reemplazar las credenciales de conexión a la base de datos.

El fichero .env tendrá una lista con las crendenciales ya puestas por defecto. Se **recomienda encarecidamente, cambiar la contraseña y el usuario** en entorno de producción.
- **[DB_CONNECTION=mysql]**  Motor de la base de datos
- **[DB_HOST=127.0.0.1]**    Dirección IP del servidor en el que se encuentra la base de datos
- **[DB_PORT=3306]**         Puerto por el que acceder a la DB
- **[DB_DATABASE=mensakas]** Nombre de la DB
- **[DB_USERNAME=root]**     Nombre de usuario de la DB
- **[DB_PASSWORD=P@ssw0rd]** Contraseña de autenticación

Una vez realizado este paso, podemos ejecutar el comando [php artisan migrate](https://laravel.com/docs/5.8/migrations#running-migrations) para comenzar a crear todas las tablas. Puedes encontrar más información sobre las migraciones en [Laravel](https://laravel.com/docs/5.8/migrations) que te pueden ayudar a resolver algunas dudas o a modificar las migraciones de ser necesario. Si queremos tirar la base de datos para crear una nueva, debemos tirar la base de datos y crear una nueva con el mismo nombree (mensakas).

Cuando tengamos las migraciones realizadas, tendremos una base de datos totalmente funcional.

Para poder ejecutar laravel, necesitamos usar el comando php artisan serve en el directorio correspondiente, de esta manera podremos acceder a nuestra página.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[British Software Development](https://www.britishsoftware.co)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- [UserInsights](https://userinsights.com)
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)
- [Invoice Ninja](https://www.invoiceninja.com)
- [iMi digital](https://www.imi-digital.de/)
- [Earthlink](https://www.earthlink.ro/)
- [Steadfast Collective](https://steadfastcollective.com/)
- [We Are The Robots Inc.](https://watr.mx/)
- [Understand.io](https://www.understand.io/)
- [Abdel Elrafa](https://abdelelrafa.com)
- [Hyper Host](https://hyper.host)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
