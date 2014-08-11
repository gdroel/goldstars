##Gold Stars, for the Modern Age
This repo enbales educators to give to students gold stars. Gold star charts, redone for the modern age. This is a fun way to keep track of students progress, online, all for free.

##Installation
To download the repo, `cd ` into the directory where you want the project to exist. Then type:
`git clone https://github.com/gdroel/goldstars.git`

Then, using Composer, install the dependencies. (aka, the vendor folder)

If you haven't installed composer, run this command:

    cd goldstars
    curl -s http://getcomposer.org/installer | php
    php composer.phar install --dev

if you have installed composer, run this command:

    cd laravel
    composer install --dev
    
##Configure Databases

Edit the **app/config/database.php** to connect to your database. At this time run `php artisan migrate` to create all the tables.

###That's it!


