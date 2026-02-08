# Bengkel Las - Website Profile

Website profil untuk bengkel las dengan fitur portfolio, contact form, dan admin panel.

## Persyaratan Sistem

- PHP 8.1 atau lebih tinggi
- MySQL 5.7+ atau MariaDB
- Composer
- Node.js & NPM

## Setup Lokal

1. **Clone repository**
   ```bash
   git clone <repository-url>
   cd bengkel-las
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Setup environment**
   ```bash
   # Copy file .env.example
   cp .env.example .env
   
   # Generate application key
   php artisan key:generate
   ```

4. **Konfigurasi database dan WhatsApp**
   
   Buka file `.env` dan sesuaikan:
   ```env
   DB_DATABASE=bengkel_las
   DB_USERNAME=root
   DB_PASSWORD=your_password
   
   # PENTING: Ganti dengan nomor WhatsApp Anda (format: 628xxx)
   WHATSAPP_NUMBER=6285693378749
   ```

5. **Jalankan migration dan seeder**
   ```bash
   php artisan migrate --seed
   ```

6. **Link storage**
   ```bash
   php artisan storage:link
   ```

7. **Build assets**
   ```bash
   npm run build
   # atau untuk development:
   npm run dev
   ```

8. **Jalankan server**
   ```bash
   php artisan serve
   ```
   
   Website akan tersedia di: `http://localhost:8000`

## Login Admin

Default admin credentials:
- **Email:** admin@kanallasbaja.com
- **Password:** password123

⚠️ **PENTING:** Segera ubah password default setelah login pertama!

## Fitur

- ✅ Portfolio proyek dengan gallery gambar
- ✅ Harga portfolio (opsional)
- ✅ Contact form
- ✅ Admin panel untuk manage portfolio dan kontak
- ✅ Responsive design
- ✅ WhatsApp integration (floating button & CTA)
- ✅ Settings management via database

## Konfigurasi WhatsApp

Nomor WhatsApp dapat dikonfigurasi melalui:
1. File `.env` dengan key `WHATSAPP_NUMBER`
2. Admin panel > Settings (akan ditambahkan di update berikutnya)

Format: `628xxxxxxxxxx` (62 + nomor tanpa 0 di awal)

## PENTING: Sebelum Push ke GitHub

File-file berikut sudah otomatis di-ignore oleh `.gitignore`:
- `.env` - berisi konfigurasi sensitif (database, WhatsApp, dll)
- `/vendor` - dependencies PHP
- `/node_modules` - dependencies Node.js

Pastikan **TIDAK** commit file `.env` yang berisi data pribadi Anda!

File yang aman untuk di-commit:
- `.env.example` - template konfigurasi (sudah tanpa data sensitif)
- `.env.local.example` - contoh konfigurasi lokal

## Security

- Jangan commit file `.env` ke repository
- Gunakan password yang kuat untuk admin
- Update dependencies secara berkala
- Aktifkan HTTPS untuk production

## License

Proprietary - All rights reserved


In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
