# Topapp
A small app build on Symfony, Vue.js and using a MySQL Docker container.

### Install packages
```
npm install
yarn install
composer install
```

### MySQL Database Setup

Start container, run migrations and seed database
```
docker-compose up
php bin/console doctrine:migrations:migrate
php bin/console app:seed-database
```

### Running the Project
```
// If not already running, Start MySQL server
docker-compose up

// Start Symfony server
symfony server:start

// Start Vue server
yarn encore dev-server --hot
```

Visit local website on
```
http://localhost:8000
```