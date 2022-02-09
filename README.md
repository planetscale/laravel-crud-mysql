## Overview

This is the final repo for the Laravel MySQL Mood Tracker project showing PlanetScale integration. You can find the [full tutorial on the PlanetScale blog](https://planetscale.com/blog/build-laravel-crud-mysql-app).

<img width="1178" alt="mood-tracker" src="https://user-images.githubusercontent.com/2941081/153310727-a4e8684c-d260-4543-969f-fca489a39a58.png">

## Run the application

1. Clone the repo:

```bash
git clone git@github.com:planetscale/laravel-crud-mysql.git
```

2. Install the dependencies (`npm install` for Tailwind):

```bash
cd laravel-crud-mysql
composer install
npm install
```

3. Create your PlanetScale database. For complete instructions, see [this section of the tutorial](https://planetscale.com/blog/build-laravel-crud-mysql-app#planetscale-setup).

4. Copy the `.env` file:

```bash
mv .env.example .env
```

5. Update the `.env` database section with your PlanetScale credentials. It should look similar to this:

```
DB_CONNECTION=mysql
DB_HOST=xxxxxxxxxx.us-east-3.psdb.cloud
DB_PORT=3306
DB_DATABASE=laravel-mood-tracker
DB_USERNAME=xxxxxxxxxxx
DB_PASSWORD=pscale_pw_xxxxxx-xx-xxxxxxxxxxxxxxxxxxxxxxxx
MYSQL_ATTR_SSL_CA=/etc/ssl/cert.pem
```

**Note**: The value for `MYSQL_ATTR_SSL_CA` will depend on your system. You can find more information on our [Secure Connections page](https://docs.planetscale.com/concepts/secure-connections).

6. Run the migrations:

```bash
php artisan migrate
```

7. Seed the database:

```bash
php artisan db:seed
```

8. Start the build process (for Tailwind):

```bash
npm run watch
```

9. Start the server:

```bash
php artisan serve
```

10. View the application at [http://localhost:8080](http://localhost:8080)
