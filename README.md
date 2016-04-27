## CS631 - Final Project

To set up database connectivity:

### Set up configuration
 - Create a copy of `example.config.json` called `config.json`.
 - Alter values in `config.json` to the appropriate values per your database - this will be used by the CS50 helper class to establish a database connection.

### Migrate Tables
 - Go to `database/migrations`
 - Execute `php migrate.php` to create all tables.

### Seed Tables
 - Go to `database/seeds`
 - Execute `php seeds.php` to seed all tables.

