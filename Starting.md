#Starting the project

### Downloading the dependencies
> composer install

### Running the project
> php artisan serve

or

> composer runproj



##During development

#### Check code with php codesniffer
> .\vendor\bin\phpcs --standard=PSR12 .\app\

#### Autofix warnings identified in php codesniffer
> .\vendor\bin\phpcbf --standard=PSR12 .\app\

#### Check code with phan
> .\vendor\bin\phan --allow-polyfill-parse

<br>

***Simple command for each, respectivelly***

> composer phpcs

> composer autofix

> composer phan

<br>

## Others plugins for phan

> https://github.com/phan/phan/tree/v5/.phan/plugins

<br>

## Useful informations for laravel

### Create migration

> php artisan make:migration [migration_name] --create=[table_name]

This migration can be used to create new tables in database, the migration name can be something like create_table_users, and the name of the table can be user normally.

### Create seeders for autimatic insertions on database

> php artisan make:seeder [NameSeeder]

This seeder creates auto insertions on the database, the name o the seeder can be something like UserSeeder for example.

### Configure Sail

> php artisan sail:install

The sail command allow to execute the project using docker

### Other informations about php artisan

> php artisan list
