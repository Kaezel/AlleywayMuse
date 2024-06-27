# AlleywayMuse CoffeeShop
## Introduction (English)

Welcome to the AlleywayMuse CoffeeShop website, a project created by Triple Trouble for the Back End Programming final exam. This website serves as an online coffee and pastry ordering website.

## Our Developers
- Jafier Andreas (535220013)
- Timothy Wahyudi Pakpahan (535220043)
- Richard Christian (535220018)

## App Topic
Online CoffeeShop

## Task Description:
### Jafier Andreas:
- Set up the project, configure the database, create authentication views and functions (login/logout/register/reset password) using Laravel UI Auth Bootstrap.
- Develop the admin dashboard with CRUD functionality for products, users, categories, product inventory, user addresses (create action not available for admin, only users), and product category.
- Created a search filter function and its page.
- Design the checkout page and add CRUD functionality for user addresses for users.
- Develop the order summary page displaying the selected address, chosen courier, order details (prices and purchased products), and QRIS from the Alleywaymuse store.

### Timoty W Pakpahan:
- Design the home page.
- Create the product page with pagination, sort for price and date, category and price filter (minimum price - maximum price.
- Develop the shopping cart (page design, update and delete functions, calculate product subtotal price (with or without discount), tax price, and grand total price).
  
### Richard Christian:
- Create function for category and price filters (minimum price - maximum price).
- Create sort functions for price and date (ascending, descending, and newest products).
- Design the product detail page.

## Installation Guide
### Steps if you are not using laragon:
1. Clone the repository ([Repository Link](https://github.com/Kaezel/AlleywayMuse)) and open it on Code Editor (example: Visual Studio Code).
2. Open terminal and type "composer install" to install COMPOSER depedencies, "npm install" to install NPM Depedencies.
3. Open pgAdmin and create a new Database server and inside that server, create new database named "alleywaymuseDB" and right click -> restore, choose the sql backup file that exist in the repository folder named "DATABASEBACKUP/alleywaymuseDBbackup.sql" or "DATABASEBACKUP/alleywaymuseDBbackup1user.sql" and press Restore (remember to change the password in .env to match the postgresql password that was created during the initial postgresql installation).
4. Open terminal again and type "npm run dev" to compile front-end assets, after running this, just let the window open.
5. Open new terminal and type "php artisan serve" to run the server, and then u can access the website through the link given in the terminal after running the server.

### Steps if you are using laragon:
1. Clone the repository ([Repository Link](https://github.com/Kaezel/AlleywayMuse)) to Laragon "www" folder in your devices (default path like this "C:\laragon\www") and open it on Code Editor (example: Visual Studio Code).
2. Open Laragon, right click on elephant icon beside text "Menu" and enable the ‘pdo_pgsql’ and ‘pgsql’ extensions (PHP -> Extentions), and update Node.js (Node.js -> version) to the latest version (e.g., v20.11.1), If you don’t have it yet, download it first ([Node.js v20.11.1 windows-x64](https://nodejs.org/dist/v20.11.1/node-v20.11.1-win-x64.zip)) and extract the Node.js files to your Laragon nodejs directory (e.g., C:\laragon\bin\nodejs). Finally, start Laragon by clicking the ‘Start All’ button.
3. Open Laragon terminal, make sure you are on the right path (if you are not on the right path, u can do cd "folder_name") and type "composer install" to install COMPOSER depedencies, "npm install" to install NPM Depedencies.
4. Open pgAdmin and create a new Database server and inside that server, create new database named "alleywaymuseDB" and right click -> restore, choose the sql backup file that exist in the repository folder named "DATABASEBACKUP/alleywaymuseDBbackup.sql" or "DATABASEBACKUP/alleywaymuseDBbackup1user.sql" and press Restore (remember to change the password in .env to match the postgresql password that was created during the initial postgresql installation).
5. Open Laragon terminal again and type "npm run dev" to compile front-end assets, after running this, just let the window open.
6. Now you can access the website using "folder_name.test".

### Login Information for Testing: 
Using database file (alleywaymuseDBbackup.sql)
1. admin => email: admin@alleywaymuse.com | password: admin123
2. user => email: test@gmail.com | password: test12345

## Link Demo Program Video
link: [Demo Program(Youtube)](https://youtu.be/MdscTHEzynw)


## Pengenalan (Bahasa Indonesia)

Selamat datang di situs web AlleywayMuse CoffeeShop, sebuah proyek yang dibuat oleh Triple Trouble untuk ujian akhir Pemrograman Back End. Website ini berfungsi sebagai website pemesanan kopi dan pastry secara online.

## Pengembang Kami
- Jafier Andreas (535220013)
- Timothy Wahyudi Pakpahan (535220043)
- Richard Christian (535220018)

## Topik app
Online CoffeeShop

## Deskripsi Tugas:
### Jafier Andreas:
- Mengatur proyek, mengonfigurasi database, membuat tampilan dan fungsi otentikasi (login/logout/registrasi/reset password) menggunakan Laravel UI Auth Bootstrap.
- Mengembangkan dashboard admin dengan fungsi CRUD untuk produk, pengguna, kategori, inventaris produk, alamat pengguna (aksi create tidak tersedia untuk admin, hanya pengguna), dan kategori produk.
- Membuat fungsi filter pencarian dan halamannya.
- Mendesain halaman checkout dan menambahkan fungsi CRUD untuk alamat pengguna bagi pengguna.
- Mengembangkan halaman ringkasan pesanan yang menampilkan alamat yang dipilih, kurir yang dipilih, detail pesanan (harga dan produk yang dibeli), dan QRIS dari toko Alleywaymuse.

### Timoty W Pakpahan:
- Mendesain halaman utama.
- Membuat halaman produk dengan paginasi, pengurutan untuk harga dan tanggal, filter kategori dan harga (harga minimal - harga maksimal).
- Mengembangkan keranjang belanja (desain halaman, fungsi update dan delete, menghitung harga subtotal produk (dengan atau tanpa diskon), harga pajak, dan harga total keseluruhan).
  
### Richard Christian:
- Membuat fungsi untuk filter kategori dan harga (harga minimal - harga maksimal).
- Membuat fungsi pengurutan untuk harga dan tanggal (ascending, descending, dan produk terbaru).
- Mendesain halaman detail produk.

## Panduan Instalasi
### Langkah-langkah jika Anda tidak menggunakan Laragon:
1. Clone repositori ([Tautan Repository](https://github.com/Kaezel/AlleywayMuse)) dan buka di Code Editor (contoh: Visual Studio Code).
2. Buka terminal dan ketik "composer install" untuk menginstal dependensi COMPOSER, "npm install" untuk menginstal dependensi NPM.
3. Buka pgAdmin dan buat server Database baru, di dalam server tersebut, buat database baru bernama "alleywaymuseDB" dan klik kanan -> restore, pilih file backup sql yang ada di folder repositori bernama "DATABASEBACKUP/alleywaymuseDBbackup.sql" atau "DATABASEBACKUP/alleywaymuseDBbackup1user.sql" dan tekan Restore (ingat untuk mengganti password di .env menyesuaikan dengan password postgresql yang telah dibuat saat awal instalasi postgresql).
4. Buka terminal lagi dan ketik "npm run dev" untuk mengompilasi aset front-end, setelah menjalankan ini, biarkan jendela tetap terbuka.
5. Buka terminal baru dan ketik "php artisan serve" untuk menjalankan server, kemudian Anda dapat mengakses situs web melalui tautan yang diberikan di terminal setelah menjalankan server.

### Langkah-langkah jika Anda menggunakan Laragon:
1. Clone repositori ([Tautan Repository](https://github.com/Kaezel/AlleywayMuse)) ke folder "www" Laragon di perangkat Anda (path default seperti ini "C:\laragon\www") dan buka di Code Editor (contoh: Visual Studio Code).
2. Buka Laragon, klik kanan pada icon gajah di samping text "Menu" dan aktifkan ekstensi "pdo_pgsql" dan "pgsql" (PHP -> Extentions), dan ganti Node.js version (Node.js -> version) ke versi yang terbaru (contoh yang kami gunakan adalah v20.11.1) jika belum memiliki nya silahkan download terlebih dahulu ([Node.js v20.11.1 windows-x64](https://nodejs.org/dist/v20.11.1/node-v20.11.1-win-x64.zip)), setelah download ekstrak file di direktori nodejs laragon anda (contoh: C:\laragon\bin\nodejs), kemudian jalankan Laragon dengan menekan tombol "Start All".
3. Buka terminal Laragon, pastikan Anda berada di path yang benar (jika Anda tidak berada di path yang benar, Anda dapat melakukan cd "nama_folder") dan ketik "composer install" untuk menginstal dependensi COMPOSER, "npm install" untuk menginstal dependensi NPM
4. Buka pgAdmin dan buat server Database baru, di dalam server tersebut, buat database baru bernama "alleywaymuseDB" dan klik kanan -> restore, pilih file backup sql yang ada di folder repositori bernama "DATABASEBACKUP/alleywaymuseDBbackup.sql" atau "DATABASEBACKUP/alleywaymuseDBbackup1user.sql" dan tekan Restore (ingat untuk mengganti password di .env menyesuaikan dengan password postgresql yang telah dibuat saat awal instalasi postgresql).
5. Buka terminal Laragon lagi dan ketik "npm run dev" untuk mengompilasi aset front-end, setelah menjalankan ini, biarkan jendela tetap terbuka
6. Sekarang Anda dapat mengakses situs web menggunakan "nama_folder.test"

### Informasi Login untuk Pengujian: 
Menggunakan database file (alleywaymuseDBbackup.sql)
1. admin => email: admin@alleywaymuse.com | password: admin123
2. user => email: test@gmail.com | password: test12345

## Tautan Video Demo Program
Tautan: [Demo Program(Youtube)](https://youtu.be/MdscTHEzynw)
