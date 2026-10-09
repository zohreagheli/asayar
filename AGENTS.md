# Base44 Setup Notes — Asayar (Laravel 12 + Livewire)

## Stack
- PHP 8.3, Laravel 12, Livewire 3, Tailwind CSS, Vite 6
- SQLite (file-based, at `database/database.sqlite`)
- Session/cache/queue drivers: all `database`

## Running the app
```bash
docker compose -f docker-compose.base44.yml up -d --build
```
The container installs composer + npm deps, builds Vite assets, runs migrations + seeders, then starts `php artisan serve` on port 3000.

## Health check
`GET /up` returns 200 when the app is ready.

## Secrets
- `KAVENEGAR_API_KEY` — optional. Used by `app/Services/OtpService.php` for SMS OTP. App boots fine without it; OTP sending silently fails.
- `APP_KEY` — auto-generated on first boot via `php artisan key:generate`, stored in `.env`.

## Fixes applied for sandbox compatibility
1. **`database/migrations/2025_07_10_115819_modify_tickets_table.php`** — wrapped MySQL-specific `ALTER TABLE ... MODIFY ... ENUM` in a driver check (`if mysql`). SQLite stores enums as TEXT.
2. **`app/Models/Service.php`** — added `HasFactory` trait (needed by `DatabaseSeeder`).
3. **`app/Models/User.php`** — added `HasFactory` to the `use` declaration (was imported but not used).
4. **`package.json`** — added `jquery` and `perfect-scrollbar` to dependencies (imported in `resources/js/app.js` but missing from manifest).

## Seeded data
- 5 services (factory), 1 test user (`test@example.com`), 4 technicians (TechnicianSeeder).
- Admin user seeder exists at `database/seeders/AdminUserSeeder.php` but is not called by `DatabaseSeeder`.

## Notes
- Frontend assets are built with `npm run build` (production build, no HMR). PHP changes are live (artisan serve re-reads files each request). Blade views are recompiled on change.
- The `getPdo()` file in the repo root is a leftover from a `php artisan tinker` session — harmless.
