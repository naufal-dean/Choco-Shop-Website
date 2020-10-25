# Tugas 1 IF3110 Pengembangan Aplikasi Berbasis Web

## Deskripsi Aplikasi Web

## Daftar Requirements

### Login Page

### Register Page

### Dashboard page

### Search Result page

### Chocolate Detail page

### Transaction History Page

### Add New Chocolate Page

### Access Token Expiry Time

### Real-Time Stock Update

### Responsive View

## Installation

## How To Run

### Memakai php built in server:
1. Jalankan command `php -S localhost:<port> -t <path/to/folder/public>` di cmd atau terminal. Sebagai contoh jika menggunakan port 8080 dan sekarang cmd atau terminal berada di folder src repository ini, commandnya adalah `php -S localhost:8080 -t public`.
2. Buka alamat `localhost:8080` di browser.
3. Website siap digunakan.

### Memakai XAMPP:
1. Buka file config `httpd.conf`.
2. Ubah path pada DocumentRoot menjadi `path/to/folder/public` (untuk set root folder).
3. Ubah path pada tag Directory menjadi `path/to/repository-folder` (untuk memberi akses ke file-file yang dibutuhkan).
4. Berikut adalah contoh `httpd.conf` bagian DocumentRoot dan tag Directory yang merupakan hasil pengubahan dari config bawaan XAMPP.
```
...
DocumentRoot "E:/KULIAH/SEMESTER 5/Pengembangan Aplikasi Berbasis Web/Tubes/1/tugas-besar-1-2020/src/public"
<Directory "E:/KULIAH/SEMESTER 5/Pengembangan Aplikasi Berbasis Web/Tubes/1/tugas-besar-1-2020/">
    #
    # Possible values for the Options directive are "None", "All",
    # or any combination of:
    #   Indexes Includes FollowSymLinks SymLinksifOwnerMatch ExecCGI MultiViews
    #
    # Note that "MultiViews" must be named *explicitly* --- "Options All"
    # doesn't give it to you.
    #
    # The Options directive is both complicated and important.  Please see
    # http://httpd.apache.org/docs/2.4/mod/core.html#options
    # for more information.
    #
    Options Indexes FollowSymLinks Includes ExecCGI

    #
    # AllowOverride controls what directives may be placed in .htaccess files.
    # It can be "All", "None", or any combination of the keywords:
    #   AllowOverride FileInfo AuthConfig Limit
    #
    AllowOverride All

    #
    # Controls who can get stuff from this server.
    #
    Require all granted
</Directory>
...
```
5. Jalankan Apache server dari Control Panel XAMPP.
6. Buka alamat `localhost` di browser. Atau `localhost:<port>` jika port default Apache server dari XAMPP telah diubah.
7. Website siap digunakan.

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
