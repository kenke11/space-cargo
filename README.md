# Space Cargo Test

## Installation

### Clone repository

```bash
git clone https://github.com/kenke11/space-cargo.git
```

### Go to project folder

```bash
cd space-cargo
```

### Create local env file

```bash
cp .env.example .env
```

### change .env

#### Enter your database information

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=spacecargo
DB_USERNAME=root
DB_PASSWORD=password
```

### Install dependencies

```bash
composer install
```

### Generate Application key

```php
php artisan key:generate
```

### Start local server

```make
php artisan serve
```

### Endpoints:

#### Login:
```
http://127.0.0.1:8000/api/login
```
#### validators
```text
email    - required, email
password - required, min 8 letters
```

#### Add new parcel
```
http://127.0.0.1:8000/api/parcels
```
#### validators
```text
code            - required, numeric, unique
price           - required, numeric
address         - required
number_of_items - required, numeric
comments        - none
```

#### Update parcel
```
http://127.0.0.1:8000/api/parcels/id
```
#### validators
```text
code            - required, numeric, unique
price           - required, numeric
address         - required
number_of_items - required, numeric
comments        - none
```
