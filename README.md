## Little Bokusen

This is a school project where the assignemnet was to build a small-scale application using Laravel.

The specification was that it should be possible to
    
    - search for books
    
    - add books to a shopping cart
    
    - clear the shopping cart
    
    - order the items in the shopping cart

Other constraints was
    
    - the routes should follow the REST standard
    
    - database queries should be made using query builder
    
    - databse access should be made from Models not in the Controllers
    
    - forms could be written in Laravel syntax or regular HTML

## Install

Clone the repository.

create a database called "bokus" in mysql

From the root folder, run: <pre>npm install</pre>

Run: php artisan migrate // to set upp the database tables

Edit .env file regarding databse info

    In my case it looks like:
    
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=bokus
    DB_USERNAME=homestead
    DB_PASSWORD=secret

Serve the application.

## License

No license required for use of any part of the code that I have written

For Laravel an MIT licens is applied.
