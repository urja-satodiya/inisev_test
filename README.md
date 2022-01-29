# inisev_test
User Subscription with Email queue

## Follow the Steps to initial setup in your local or remote machine
1. Run the command in your terminal ```git clone git@github.com:urja-satodiya/inisev_test.git```
2. Run command ```composer install``` to install Laravel 
3. Create database in your local or remote machine and configure it in your `.env` file.
4. Run ```Php artisan migrate``` command to generate database tables from the migration files.
5. Run ```Php artisan db:seed``` to seed data into the table.
6. Run ```php artisan config:cache``` to cache your config.
7. Run ```php artisan queue:work database --tries=1``` to listen for the queue jobs in the background.

#### Here I attached the postman collection link to get API sample:
- https://www.getpostman.com/collections/1639e62dd98119a154bc
