# OCTAVE Allegro
System for Critical Asset Risk Scoring
##
A Security Risk Management Final Project
##
How to Install?

1. You need Composer, install it in your device
2. If you already have it, open the application Octave_SRM folder, then open cmd in there
3. Type: composer install
4. Done? Now let's create the database. You only need to create a new one. You are free to name the database, but remember to change the .env file later, the default name is octave_srm
5. Speaking of .env, you need that file. You could have the default one by renaming the .env.example file into .env, Default one has:
- Mysql as database connection
- octave_srm as the database name
6. Remember to generate the key by running:> php artisan generate:key in the Octave_SRM cmd.