# Gestion Etudiant

Laravel API

## Setup

```
bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
```

## Docker

```
bash
docker-compose up -d
```

## API

- `GET /api/etudiants`
- `POST /api/etudiants`
- `GET /api/classes`
