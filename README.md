# Tugas 1 IF3110 Pengembangan Aplikasi Berbasis Web

## Deskripsi Aplikasi Web

<div align="center">
<img src="https://i.imgur.com/0NI6Mkf.png" alt=""/>
</div>

Anda mungkin sudah tahu mengenai pabrik coklat terbesar seantero dunia, Willy Wangky.
Akan tetapi, produsen terbaik tidak akan sukses tanpa konsumen dan distributor terbaik.
Sebab coklat dari Willy Wangky sangat disenangi konsumen, maka Willy Wangky membutuhkan distributor yang handal dalam menangani penjualan coklat.
Untungnya, Willy Wangky mengenal Jan.
Jan sudah sangat pengalaman dengan distribusi makanan dan minuman ringan.
Bahkan, Jan sudah memiliki usaha sendiri bernama Jan’s Cook.

Willy Wangky pun meminta Jan untuk memberikan saran bagaimana cara menjual coklat-coklat miliknya pada konsumen.
Apalagi di tengah pandemi seperti ini, beberapa toko penjualan sepi dikunjungi pengunjung.
Jan tanpa pikir panjang, memberikan saran mengenai penjualan daring menggunakan aplikasi berbasis web.
Willy Wangky sangat senang dengan hal ini, dan segera mengutus Jan untuk mencari programmer terbaik untuk pengembangannya.

Willy Wangky menginginkan web tersebut agar penggunanya dapat melakukan pendaftaran akun, login, logout, pencarian produk, mendapatkan penjelasan produk secara detail, pembelian produk dan dapat melihat riwayat pembelian produk, dan pekerjanya dapat dengan mudah menambahkan jenis coklat baru yang ingin dijual serta menambah ketersediaan coklat.

Jan telah membuat desain user interface dengan low fidelity.
Sekarang, dia merekrut kalian untuk membuat sebuah aplikasi web yang membantu penjualan coklat milik Willy Wangky.
Disebabkan Jan sangat percaya dengan kalian, maka web yang kalian kembangkan dapat kalian hias dengan sebaik mungkin.
Perlu diingat bahwa tata letak komponen harus mengikuti desain dari Jan.

## Daftar Halaman

### Login Page

### Register Page

### Dashboard page

### Search Result page

### Chocolate Detail page

### Transaction History Page
1. Halaman Transaction History<br>
<img src="assets/transaction_history_5.png" width="98%" title=""/><br>
2. Halaman Transaction History dengan pengaturan transaksi per halaman yang berbeda<br>
<img src="assets/transaction_history_10.png" width="98%" /><br>
3. Halaman Transaction History di perangkat dengan layar kecil<br>
<img src="assets/transaction_history_5_mobile.png" width="32%" />
<img src="assets/transaction_history_5_mobile_scrolled.png" width="32%" />
<img src="assets/transaction_history_10_mobile.png" width="32%" /><br>

### Add New Chocolate Page

1. Halaman Add New Chocolate<br>
<img src="assets/add_new_chocolate.png" width="98%" /><br>
2. Halaman Add New Chocolate setelah menekan tombol Add Chocolate<br>
<img src="assets/add_new_chocolate_success.png" width="98%" /><br>
3. Halaman Add New Chocolate di perangkat dengan layar kecil<br>
<img src="assets/add_new_chocolate_mobile.png" width="49%" />
<img src="assets/add_new_chocolate_success_mobile.png" width="49%" /><br>

### Access Token Expiry Time

### Real-Time Stock Update

### Responsive View

## Daftar Requirement

## Instalasi

## Cara Menjalankan

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

## Anggota Kelompok

1. Yonatan Viody (13518148)
2. Naufal Dean Anugrah (13518123)
3. Muhammad Rizky Ismail Faizal (13518148)

## Pembagian Tugas

### Frontend
1. Login: 13518120
2. Register: 13518120
3. Dashboard: 13518120
4. Search Result: 13518123
5. Chocolate Detail: 13518123
6. Transaction History: 13518148
7. Add New Chocolate: 13518148
8. Access Token Expiration (bonus): 13518120
9. Real-Time Stock Update (bonus): 13518123
10. Responsive View (bonus): 13518120, 13518123, 13518148

### Backend
1. Login: 13518120
2. Register: 13518120
3. Dashboard: 13518120
4. Search Result: 13518123
5. Chocolate Detail: 13518123
6. Transaction History: 13518148
7. Add New Chocolate: 13518148
8. Access Token Expiration (bonus): 13518120
9. Real-Time Stock Update (bonus): 13518123
10. Responsive View (bonus): 13518120, 13518123, 13518148
