# OCTAVE Allegro
System for Critical Asset Risk Scoring
##
A Security Risk Management Final Project
##
How to Install?

1. You need Composer, install it in your device. You can see https://getcomposer.org/download/ for information on how to download it, or perhaps you could simply google it.
2. If you already have it, open the application Octave_SRM folder, then open cmd in there.
3. Type:> composer install
4. Done? Now let's create the database. You only need to create a new one. You are free to name the database, but remember to change the .env file later, the default name is octave_srm.
5. Speaking of .env, you need that file. You could have the default one by renaming the .env.example file into .env, Default one has:
- Mysql as database connection.
- octave_srm as the database name
6. Remember to generate the key by running:> php artisan key:generate in the Octave_SRM cmd.
7. Now, to put the tables in the database, run in the cmd:> php artisan migrate:fresh
8. To run, as usual for a laravel project:> php artisan serve
9. First thing you need to know when opening this application is:
- The first account you sign up in this app (the very first user) will be considered as admin
- Because of that, you need to sign up as admin
<br>Username: Administrator (Recommended)
<br>Email: admin@mail.com (anything goes, as long as you remember)
<br>Password: administrator (anything goes, as long as you remember)
<br>Department: IT (Recommended)

- Actually, you are free to sign up as anything, the above requirements are only for formalities, since it would be weird if a username called Guest has an administrator authorities.
- These stuff could be handled better with seeder, which I have not learnt yet, sorry.
