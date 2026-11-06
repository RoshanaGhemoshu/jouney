# Journey Begins Car Rental

Car rental website for Nepal built with Laravel 13, Livewire 4, Tailwind CSS 4 and Vite.

Customers can browse the fleet, check availability, get tiered pricing (daily / weekly / bi-weekly / monthly), book a car and follow up on WhatsApp. Admins manage cars, bookings, inquiries and testimonials from `/admin`.

## Requirements

- PHP 8.4+ (the locked Symfony packages require it)
- Composer
- Node.js 20+ with pnpm (or npm)
- SQLite (default) or MySQL

## Setup

```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate --seed
php artisan storage:link
pnpm install
pnpm build        # or `pnpm dev` while developing
php artisan serve
```

Set `ADMIN_PASSWORD` in `.env` before seeding to choose the password for `admin@journeybegins.com` (a random one is generated otherwise).

## Configuration

| Variable | Purpose |
| --- | --- |
| `WHATSAPP_NUMBER` | Number used for every WhatsApp link and booking message (digits only, with country code). |
| `ADMIN_PASSWORD` | Password for the seeded admin account. |
| `SOCIAL_FACEBOOK_URL`, `SOCIAL_INSTAGRAM_URL`, `SOCIAL_TIKTOK_URL` | Footer social links. |
| `FACEBOOK_*`, `INSTAGRAM_*`, `TIKTOK_*` | Optional social feed integrations shown on the home page. |

Car photos are resolved from `storage/app/public/cars` (admin uploads) or `public/images`. Cars without a photo show `public/images/cars/placeholder.svg`.

## Tests

```bash
php artisan test
```
