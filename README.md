# Installing the App

First, clone the repository

```bash
git clone https://github.com/syauqiyasman/evoting-backend.git
```

Install the dependency with composer

```bash
composer install --no-dev
```

Rename the `env` file to `.env` and set up to your database configurations

```
database.default.hostname = your database hostname
database.default.database = your database name
database.default.username = your database username
database.default.password = your database password
database.default.DBDriver = your database driver
```

Create the database table with:

```bash
php spark migrate
```

Open http://yourdomain.com/admin to login into the Admin dashboard.

# Running the App at Development

Change the environment to development at `.env` file

```
CI_ENVIRONMENT = development
```

Run the development server

```bash
php spark serve
```

Open http://localhost:8080 with your browser.
