

==Informasi Kelompok 7==

    Renaldi;
    khairudin;

==Tema Proyek== 
    Penggajian Karyawan

==Cara Install==

    Clone Projek;
    Install Composer dalam Projek (composer install);
    Rename File .enf.example menjadi .enf, lalu atur Konfigurasi Database dalam file .enf tersebut;
    Jalankan Perintah php artisan key:genarate;
    Jalankan Perintah composer dump-auto;
    Jalankan Perintah php artisan migrate --seed;
    tambahkan "FILESYSTEM_DRIVER=punlic" pada file .enf;
    jalankan perintah php artisan config:cache;
    jalankan perintah php artisan storage:link;

