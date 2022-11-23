+login

- admin(melakukan pemesanan kendaraan)
  username:admin@gmail.com
  pass : admin
- supervisor motor (melakukan verifikasi tingkat 1 untuk divisi motor)
  username:supervisormotor@gmail.com
  pass : supervisor
- supervisor mobil (melakukan verifikasi tingkat 1 untuk divisi mobil)
  username:supervisormobil@gmail.com
  pass : supervisor
- manager (melakukan verifikasi tingkat 2 setelah supervisor
  username:manager@gmail.com
  pass : manager

+database
phpmyadmin 5.1.1

+php
PHP 8.0.8

+framework
laravel 8.83.15

+panduan 

- install xampp v3.3.0
- run composer install in project 
- create database inventory in phpmyadmin
- run php artisan migrate:fresh --seed 
- run php artisan serve
- input url http://127.0.0.1:8000/login in browser
1. melakukan pemesanan kendaraan
  - login menggunakan akun admin
  - create new data kendaraan di fitur kendaraan management
    `input kode kendaraan
    `pilih jenis kendaraan
    `input merk kendaraan
    `input jumlah kendaraan
    `input kondisi kendaraan
    `klik submit
  - create new data driver di fitur driver management
    `input nama driver
    `input rating driver
    `klik submit
  - create new data pemesanan kendaraan di fitur pemesanan
    ` pilih driver 
    ` pilih jenis kendaraan yang akan dipesan
    ` pilih divisi supervisor yang akan memverifikasi (misal supervisor divisi motor maka untuk verifikasi menggunakan akun dari supervisor divisi motor)
    `input banyaknya kendaraan yang akan dipesan
    `input waktu
    `klik submit
  - logout di pojok kanan atas
2. verifikasi pemesanan oleh supervisor motor/mobil (sesuai divisi supervisor yang dipilih ketika create data pemesanan di halaman admin)
  - login menggunakan akun supervisor motor (sesuai divisi supervisor yang dipilih ketika create data pemesanan di halaman admin sebelumnya)
  - klik fitur info pengajuan di sidebar, pilih pengajuan kendaraan
  - cek pengajuan yang belum direspon, apabila ada klik detail (untuk melihat detail pemesanan)
  - beri respon "accepted" pada field status
  - klik tombol submit
  - pilih riwayat untuk melihat riwayat pengajuan yang udah diverifikasi
  - logout
3. verifikasi pemesanan oleh manager
   - login menggunakan akun manager
   - klik fitur info pengajuan di sidebar, pilih pengajuan kendaraan
   - cek pengajuan yang belum direspon, apabila ada klik detail (untuk melihat detail pemesanan)
   - beri respon "accepted" pada field status
   - pilih riwayat untuk melihat riwayat pengajuan yang udah diverifikasi
   - logout
4. cek status pemesanan di halaman admin (untuk melihat status pemesanan apakah sudah diverifikasi supervisor dan manager)
   - login menggunakan akun admin 
   - klik fitur pemesanan di sidebar cek status nya apabila
     `apabila belum diverifikasi oleh supervisor dan manager maka status "pending"
     ` apabila sudah diverifikasi oleh supervisor saja maka status "verifikasi supervisor"
     ` apabila sudah diverifikasi oleh supervisor dan manager maka status "verifikasi manager"
     ` apabila pemesanan ditolak maka status "declined"
5. export laporan
   - login menggunakan akun admin
   - pilih fitur laporan pada sidebar
   - pilih button "export excel"
+ rules 
  - login sesuai akun yang sudah ada 
  - create data kendaraan dan driver sebelum melakukan pemesanan kendaraan
  - driver yang sudah dipakai di pemesanan, maka driver tersebut tidak bisa dipesan lagi
  - jumlah kendaraan yang dipakai di pemesanan, maka jumlah kendaraan tersebut akan berkurang
  - apabila pengajuan pemesanan ditolak oleh supervisor/manager, maka driver dan jumlah kendaraan akan kembali lagi dan bisa dipesan kembali
  - verifikasi dilakukan bertahap, pertama verifikasi dari supervisor kemudian pengajuan dikirim ke manager untuk diverifikasi. apabila supervisor menolak pemesanan ("declined"), maka pengajuan akan berhenti dan tidak akan dikirimkan ke manager.
  - untuk verifikasi supervisor sesuai divisi supervisor yang dipilih di menu pemesanan.
  

