# AlleywayMuse CoffeeShop
## Introduction (English)

Welcome to the AlleywayMuse CoffeeShop website, a project created by Triple Trouble for the Back End Programming final exam. This website serves as an online coffee and pastry ordering website.

## Our Developers
- Jafier Andreas (535220013)
- Timothy Wahyudi Pakpahan (535220043)
- Richard Christian (535220018)

## Project Guide
### Steps if you are not using laragon:
1. Clone the repository ([Repository Link](https://github.com/Kaezel/AlleywayMuse)) and open it on Code Editor (example: Visual Studio Code).
2. Open terminal and type "composer install" to install COMPOSER depedencies, "npm install" to install NPM Depedencies.
3. Open pgAdmin and create a new Database server and inside that server, create new database named "alleywaymuseDB" and right click -> restore, choose the sql backup file that exist in the repository folder named "DATABASEBACKUP/alleywaymuseDBbackup.sql" and press Restore (remember to change the password in .env to match the postgresql password that was created during the initial postgresql installation).
4. Open terminal again and type "npm run dev" to compile front-end assets, after running this, just let the window open.
5. Open new terminal and type "php artisan serve" to run the server, and then u can access the website through the link given in the terminal after running the server.

### Steps if you are using laragon:
1. Clone the repository ([Repository Link](https://github.com/Kaezel/AlleywayMuse)) to Laragon "www" folder in your devices (default path like this "C:\laragon\www") and open it on Code Editor (example: Visual Studio Code).
2. Open Laragon and run the laragon by pressing "Start All" button.
3. Open Laragon terminal, make sure you are on the right path (if you are not on the right path, u can do cd "folder_name") and type "composer install" to install COMPOSER depedencies, "npm install" to install NPM Depedencies.
4. Open pgAdmin and create a new Database server and inside that server, create new database named "alleywaymuseDB" and right click -> restore, choose the sql backup file that exist in the repository folder named "DATABASEBACKUP/alleywaymuseDBbackup.sql" and press Restore (remember to change the password in .env to match the postgresql password that was created during the initial postgresql installation).
5. Open Laragon terminal again and type "npm run dev" to compile front-end assets, after running this, just let the window open.
6. Now you can access the website using "folder_name.test".

## Link Demo Program Video
link: [Demo Program(Youtube)](https://youtu.be/MdscTHEzynw)


## Pengenalan (Bahasa Indonesia)

Selamat datang di situs web AlleywayMuse CoffeeShop, sebuah proyek yang dibuat oleh Triple Trouble untuk ujian akhir Pemrograman Back End. Website ini berfungsi sebagai website pemesanan kopi dan pastry secara online.

## Pengembang Kami
- Jafier Andreas (535220013)
- Timothy Wahyudi Pakpahan (535220043)
- Richard Christian (535220018)

## Panduan Proyek
### Langkah-langkah jika Anda tidak menggunakan Laragon:
1. Clone repositori ([Tautan Repository](https://github.com/Kaezel/AlleywayMuse)) dan buka di Code Editor (contoh: Visual Studio Code).
2. Buka terminal dan ketik "composer install" untuk menginstal dependensi COMPOSER, "npm install" untuk menginstal dependensi NPM.
3. Buka pgAdmin dan buat server Database baru, di dalam server tersebut, buat database baru bernama "alleywaymuseDB" dan klik kanan -> restore, pilih file backup sql yang ada di folder repositori bernama "DATABASEBACKUP/alleywaymuseDBbackup.sql" dan tekan Restore (ingat untuk mengganti password di .env menyesuaikan dengan password postgresql yang telah dibuat saat awal instalasi postgresql).
4. Buka terminal lagi dan ketik "npm run dev" untuk mengompilasi aset front-end, setelah menjalankan ini, biarkan jendela tetap terbuka.
5. Buka terminal baru dan ketik "php artisan serve" untuk menjalankan server, kemudian Anda dapat mengakses situs web melalui tautan yang diberikan di terminal setelah menjalankan server.

### Langkah-langkah jika Anda menggunakan Laragon:
1. Clone repositori ([Tautan Repository](https://github.com/Kaezel/AlleywayMuse)) ke folder "www" Laragon di perangkat Anda (path default seperti ini "C:\laragon\www") dan buka di Code Editor (contoh: Visual Studio Code).
2. Buka Laragon dan jalankan Laragon dengan menekan tombol "Start All".
3. Buka terminal Laragon, pastikan Anda berada di path yang benar (jika Anda tidak berada di path yang benar, Anda dapat melakukan cd "nama_folder") dan ketik "composer install" untuk menginstal dependensi COMPOSER, "npm install" untuk menginstal dependensi NPM
4. Buka pgAdmin dan buat server Database baru, di dalam server tersebut, buat database baru bernama "alleywaymuseDB" dan klik kanan -> restore, pilih file backup sql yang ada di folder repositori bernama "DATABASEBACKUP/alleywaymuseDBbackup.sql" dan tekan Restore (ingat untuk mengganti password di .env menyesuaikan dengan password postgresql yang telah dibuat saat awal instalasi postgresql).
5. Buka terminal Laragon lagi dan ketik "npm run dev" untuk mengompilasi aset front-end, setelah menjalankan ini, biarkan jendela tetap terbuka
6. Sekarang Anda dapat mengakses situs web menggunakan "nama_folder.test"

## Tautan Video Demo Program
Tautan: [Demo Program(Youtube)](https://youtu.be/MdscTHEzynw)