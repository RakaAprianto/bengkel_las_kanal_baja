# ✅ Checklist Sebelum Push ke GitHub

Pastikan hal-hal berikut sudah dilakukan sebelum push ke repository:

## 🔒 File Sensitif

- [ ] File `.env` **TIDAK** ada di staging area git
  ```bash
  git status
  # Pastikan .env tidak muncul dalam daftar
  ```

- [ ] File `.env.example` sudah menggunakan placeholder/contoh, bukan data asli
  ```bash
  # Cek isi .env.example:
  cat .env.example | grep WHATSAPP
  # Harus: WHATSAPP_NUMBER=6285693378749 (contoh)
  # Jangan: WHATSAPP_NUMBER=6285693378749 (nomor asli Anda)
  ```

## 🔍 Verifikasi Data Pribadi

- [ ] Cek tidak ada nomor WA hardcoded di kode
  ```bash
  # Jalankan pencarian:
  grep -r "6285693378749" resources/
  # Seharusnya tidak ada hasil
  ```

- [ ] Cek tidak ada email pribadi hardcoded (kecuali di seeder untuk contoh)
  ```bash
  grep -r "benpri@gmail.com" app/
  # Seharusnya hanya ada di seeder
  ```

- [ ] Password admin di seeder menggunakan password contoh (bukan password asli)
  ```bash
  cat database/seeders/AdminSeeder.php | grep password
  # Harus: 'password123' atau password demo lainnya
  ```

## 📝 Files yang Aman untuk di-Commit

✅ **BOLEH** di-commit:
- `.env.example` (template tanpa data sensitif)
- `.env.local.example` (contoh konfigurasi lokal)
- `database/seeders/*.php` (dengan data contoh/dummy)
- Semua file di `/app`, `/resources`, `/config`
- `composer.json`, `package.json`
- `README.md`
- `.gitignore`

❌ **JANGAN** di-commit:
- `.env` (file konfigurasi dengan data asli)
- `/vendor` (sudah di .gitignore)
- `/node_modules` (sudah di .gitignore)
- `/storage/*.key` (sudah di .gitignore)
- File backup database (.sql)
- File dengan data customer asli

## 🚀 Langkah Push yang Aman

1. **Cek git status**
   ```bash
   git status
   ```

2. **Tambahkan file yang ingin di-commit**
   ```bash
   git add .
   # ATAU lebih selektif:
   git add app/ resources/ database/ config/ composer.json
   ```

3. **Cek perubahan sebelum commit**
   ```bash
   git diff --staged
   # Review semua perubahan, pastikan tidak ada data sensitif
   ```

4. **Commit dengan pesan yang jelas**
   ```bash
   git commit -m "Add portfolio price feature and secure configuration"
   ```

5. **Push ke GitHub**
   ```bash
   git push origin main
   # atau branch yang sesuai
   ```

## 🆘 Jika Tidak Sengaja Commit Data Sensitif

Jika sudah terlanjur commit file .env atau data sensitif:

1. **Jangan panic!** Jika belum di-push, masih bisa dibatalkan
2. **Batalkan commit terakhir** (jika belum push):
   ```bash
   git reset HEAD~1
   ```

3. **Jika sudah terlanjur push**, segera:
   - Hapus data sensitif dari file
   - Ganti password/credential yang ter-expose
   - Gunakan `git filter-branch` atau BFG Repo-Cleaner untuk hapus dari history
   - Force push (HATI-HATI!)

## 📚 Referensi

- [GitHub: Removing sensitive data](https://docs.github.com/en/authentication/keeping-your-account-and-data-secure/removing-sensitive-data-from-a-repository)
- [BFG Repo-Cleaner](https://rtyley.github.io/bfg-repo-cleaner/)

---
**INGAT:** Sekali ter-push ke GitHub, data akan ada di history. Lebih baik cek berkali-kali!
