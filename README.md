# Donuts Maker

_Proyecto E-commerce para una tienda de donas_

## Comenzando 🚀

1. Clonar proyecto:

```bash
  git clone https://github.com/abranher/donuts.git
```

### Pre-requisitos 📋

- PHP v^8.2
- Node.js v^18
- MySQL o MariaDB

### Instalación 🔧

1. Instalar dependencias:

```bash
  composer install
```

```bash
  npm install
```

2. Compilar para producción:

```bash
  npm run build
```

3. Renombrar ".env.example" a ".env" y configurar conexión a la base de datos

```.env
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=laravel
  DB_USERNAME=root
  DB_PASSWORD=
```

4. Ejecutar migraciones:

```bash
  php artisan migrate --seed
```

5. Ejecutar servidor local:

```bash
  php artisan serve
```

## Despliegue 📦

_notas adicionales sobre como hacer deploy_

## Construido con 🛠️

- [Laravel](https://laravel.com/) - El Framework web usado
- [React](https://react.dev/) - La Librería de front-end usada
- [Alpine.js](https://alpinejs.dev/) - La Librería de front-end usada
- [Tailwind CSS](https://tailwindcss.com/) - El Framework de CSS usado
- [Composer](https://getcomposer.org/) - Manejador de dependencias para php
- [Npm](https://www.npmjs.com/) - Manejador de dependencias para JavaScript

## Autores ✒️

- **Abraham Hernández** - _Desarrollo del software_ - [abranher](https://github.com/abranher)

## Licencia 📄

Este proyecto está bajo la Licencia [MIT license](https://opensource.org/licenses/MIT) - mira el archivo [LICENSE](LICENSE) para más detalles.
