# Tugas 1 IF3110 Pengembangan Aplikasi Berbasis Web

## Deskripsi Aplikasi Web
Aplikasi website digunakan sebagai website untuk menjual coklat. Pada aplikasi web ini, terdapat 2 jenis pengguna, yaitu superuser dan user. Kedua pengguna dapat melakukan akun, login, logout, pencarian produk, dan mendapatkan penjelasan produk secara detail. User dapat melakukan pembelian produk dan melihat riwayat pembelian produk. Superuser adalah admin yang dapat menambah jenis coklat baru yang ingin dijual dan menambah ketersediaan coklat, serta mengakses apa yang bisa diakses oleh user. Untuk seorang pengguna yang belum melakukan login, pengguna hanya dapat menampilkan halaman login & register, namun bisa menampilkan penjelasan produk secara langsung melalui backend (namun tidak dapat mengubah data).

Aplikasi website ini berjalan di atas PHP, bersamaan dengan penggunaan HTML, JS, dan CSS, dan tersedia dengan tampilan komputer/laptop dan mobile.

## Requirements
-

## Installation
### MySQL
#### Linux/Ubuntu
- Install MySQL dengan menjalankan `sudo apt install mysql-server` pada terminal
- Lakukan konfigurasi mysql dengan menjalankan `sudo mysql_secure_installation` pada terminal
- Masukkan password baru untuk user `root`
- Jalankan mysql dengan perintah `mysql -u root -p`
- Masukkan password untuk user `root`
- Buatlah user baru dengan menjalankan query `CREATE USER 'username'@'localhost' IDENTIFIED WITH authentication_plugin BY 'password';` dengan mengubah username dengan username anda dan password dengan password tertentu
- Jalankan query `GRANT ALL PRIVILEGES ON * . * TO 'username'@'localhost';` dengan mengubah username dengan username sebelumnya
#### Windows
- Install MySQL dari https://dev.mysql.com/downloads/windows/installer/8.0.html
- Lakukan konfigurasi mysql dengan menjalankan installer tersebut
- Masukkan password baru untuk user `root`
- Jalankan mysql dengan perintah `mysql -u root -p`
- Masukkan password untuk user `root`
- Buatlah user baru dengan menjalankan query `CREATE USER 'username'@'localhost' IDENTIFIED WITH authentication_plugin BY 'password';` dengan mengubah username dengan username anda dan password dengan password tertentu
- Jalankan query `GRANT ALL PRIVILEGES ON * . * TO 'username'@'localhost';` dengan mengubah username dengan username sebelumnya

### Setup Enviroment Variables
- Buatlah file `env.php` pada folder `src/bootstrap` dengan mengikuti format pada `env.example.php`
- Ubahlah `mysql_database_name` dengan nama tertentu, `mysql_username` dengan username user yang dibuat, dan `mysql_password` dengan password user yang dibuat

### Setup Database
Jalankan file `src/database/migrations/driver.php` melalui XAMPP atau dengan menjalankan `php src/database/migrations/driver.php`.

## How To Run
### PHP Server
Jalankan perintah `php -S 0.0.0.0:5000 -t src/public/` pada folder root git ini.

## Screenshots

## Pembagian Tugas

### Frontend
1. Login : 13518xxx, 13518xxx
2. Register : 13518xxx
3. (Lanjutkan …)

### Backend
1. Login : 13518xxx, 13518xxx
2. Register : 13518xxx
3. (Lanjutkan…)