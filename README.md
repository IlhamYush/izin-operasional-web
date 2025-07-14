# Sistem Peminjaman Izin Operasional – PT Pos Indonesia

Website berbasis PHP untuk membantu proses peminjaman izin operasional di PT Pos Indonesia.

## 📌 CATATAN

Gunakan file `referensi.sql` yang tersedia di folder ini untuk mengimpor data ke dalam database **(setelah melakukan langkah migrasi database di Installation)**.  
Pastikan struktur kolom pada tabel `referensi` sesuai dengan berikut:

1. `id_kantor`
2. `Nama_kantor`
3. `jenis_kantor`
4. `pso_non_pso`
5. `NomorRegional`
6. `Regional`
7. `NomorKCU`
8. `KCU`
9. `KC`
10. `Provinsi`
11. `Kota`
12. `KodeKecamatan`
13. `Kecamatan`
14. `Kelurahan`
15. `Alamat`

## ✅ Requirements
- PHP version 8
- MySQL

## ⚙️ Setup & Installation
1. Clone repository:
   ```bash
   git clone https://github.com/IlhamYush/izin-operasional-web.git

2. Install dependencies

    ```bash
    composer install
    ```

    And javascript dependencies

    ```bash
    npm install && npm run dev
    ```

3. Set up Laravel configurations

    ```bash
    copy .env.example .env

    php artisan key:generate
    ```

4. Set your database in .env

5. Migrate database

    ```bash
    php artisan migrate:fresh --seed
    ```

6. Serve the application

    ```bash
    php artisan serve
    ```

7. Auth

    username: admin@gmail.com
    
    password: password

## Requirements
- Laravel (10.48.10)
- PHP (8.2.10)
- MySQL (8.0.30)
- Composer (2.7.1)

## Packages
- Breeze
- Spatie
- Socialite
- Php-Flasher
- Yajra Datatables