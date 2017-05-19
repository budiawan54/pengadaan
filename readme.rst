###################
Aplikasi Pengadaan Kabupaten Buleleng
###################

Aplikasi (Sistem) ini merupakan aplikasi berbasis web yang digunakan untuk melakukan pengajuan pengadaan di Kabupaten Buleleng.


*******************
Server Requirements
*******************

PHP version 5.6 or newer is recommended.

It should work on 5.3.7 as well, but we strongly advise you NOT to run
such old versions of PHP, because of potential security and performance
issues, as well as missing features.


*******************
Konfigurasi
*******************

Lakukan konfigurasi pada file ``application/config/config.php`` untuk konfigurasi secara general
1. Ganti ``value`` pada ``$config['base_url']`` sesuai tempat nama url yang akan digunakan

Konfigurasi database bisa dilakukan pada file ``application/config/database.php`` sesuaikan pada variabel konfigurasi mysql pada umumnya.



*******************
Advance
*******************

Untuk melakukan penanganan lebih lanjut, lihat pada dokumentasi ``codeigniter 3``