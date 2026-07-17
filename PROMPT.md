Halo AI, saya memiliki proyek web statis dengan struktur folder sebagai berikut:

```bash
designs:.
+---app
|       create.html
|       detail.html
|       home.html
|       profile.html
|       search.html
|       settings.html
|       style.css
|       view_user.html
|       
\---view
        about.html
        landing.html
        login.html
        signup.html
        style.css
```

Tantangan saat ini: 
Saat ini terdapat dua berkas 'style.css' di masing-masing folder (app/ dan view/). Masalahnya, kedua file CSS ini berisi aturan global yang bercampur, dan beberapa halaman memanggil kedua file tersebut sekaligus. Hal ini menyebabkan banyak sekali selektor/atribut CSS yang tidak terpakai (dead code/unused CSS) di halaman-halaman tertentu.

Tugas Anda:
Lakukan refactoring, pembersihan, dan pemisahan file CSS agar lebih modular, efisien, dan bersih. Ikuti instruksi berikut secara ketat:

1. Buat Berkas CSS Global/Shared (Core CSS):
   Ekstrak semua utility class bersama, reset dasar, variabel tema/warna gelap, dan gaya komponen global yang dipakai di KEDUA folder (misalnya gaya navbar blur, grid-border, tipografi dasar, .form-control-vercel, dll.) ke dalam satu berkas CSS khusus. Berikan rekomendasi nama dan lokasi folder barunya (misal: root/assets/css/global.css atau root/css/base.css).

2. Pisahkan CSS Modular Spesifik (Scoped CSS):
   Bagi sisa aturan CSS yang hanya spesifik digunakan oleh halaman tertentu. 
   - Kumpulkan utility/style khusus fitur dashboard (seperti layout sidebar aplikasi, list-group-vercel, area danger zone, dll.) untuk file-file di dalam folder /app.
   - Kumpulkan utility/style khusus fitur auth/informasi (seperti form login/signup, landing page, text-gradient, dll.) untuk file-file di dalam folder /view.

3. Bersihkan Atribut yang Tidak Terpakai (Purge Unused CSS):
   Pastikan tidak ada selektor CSS mati yang terbawa ke dalam berkas baru jika selektor tersebut sama sekali tidak diimplementasikan di kode HTML berkas manapun.

4. Berikan Panduan Pemanggilan Tag <link> Baru:
   Tunjukkan bagaimana pembaruan tag <link href="..."> pada setiap file HTML (baik di folder /app maupun /view) agar memanggil berkas CSS global baru dan berkas CSS spesifiknya secara benar dengan jalur relatif yang tepat.

Sebagai langkah awal, tolong analisis arsitektur pemisahan CSS ini terlebih dahulu dan berikan struktur folder CSS baru yang ideal beserta skema pembagian kelasnya. Setelah saya setuju, saya akan memberikan isi kode dari file HTML dan file CSS saat ini secara bertahap untuk Anda bersihkan.