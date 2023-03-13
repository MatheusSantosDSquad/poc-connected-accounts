# POC - Connected Accounts

## Installation
```shell
cp .env.example .env && composer install
php artisan key:generate
php artisan migrate 
npm install
```

Create an account on Stripe and enable connected account there.

Enable connected accounts on `Connected` tab
