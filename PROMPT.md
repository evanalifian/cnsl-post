### 📝 Prompt untuk AI Check-Up OpenAPI

**Aturan Evaluasi:**
Tolong bertindak sebagai Senior API Architect dan review file OpenAPI 3.0.3 berikut (`cnsl-post-openapi.json`).


Evaluasi dan koreksi spesifikasi OpenAPI ini dengan mengacu pada **prinsip RESTful API Best Practices & Standard OpenAPI 3.0**:


1. **Resource Naming & HTTP Methods (Fokus Utama):**

* Pastikan URL menggunakan **kata benda (plural)**, bukan kata kerja (misal: ubah `/users/signup` atau `/users/login` agar sesuai standar atau pindahkan ke resource/action style yang benar).


* Pastikan HTTP Method digunakan secara semantik dan tepat untuk setiap tindakan CRUD.


* Pada endpoint update user (`/users`), periksa mengapa menggunakan `PUT` tanpa ID di path (`/users/{userID}`). Evaluasi perbedaan penggunaan `PUT` vs `PATCH` untuk pembaruan sebagian (partial update).




2. **Struktur Resource & Hierarchy:**

* Konsistensi penggunaan Path Parameter (misal: ID user harus spesifik pada path untuk tindakan individual seperti GET, PUT, PATCH, DELETE).


* Gunakan *Query Parameter* untuk pencarian/filtering (seperti `?identity=...`).




3. **Kelengkapan Dokumen OpenAPI:**

* Isi bagian `responses` untuk tiap operation yang saat ini masih kosong (`responses: {}`). Berikan contoh status code HTTP yang sesuai (seperti 200, 201, 400, 401, 404, 500).


* Refactor schema yang digunakan berulang ke dalam bagian `components/schemas` serta gunakan `$ref` agar dokumen RAPI dan modular.


* Tambahkan `tags` untuk mengelompokkan endpoint.






**Output yang diharapkan:**
1. **Daftar Masalah/Catatan Reviu:** Jelaskan poin-poin yang kurang sesuai beserta alasannya berdasarkan standar RESTful API.


2. **File JSON Hasil Perbaikan:** Berikan file JSON OpenAPI lengkap yang sudah diperbaiki.




**Berikut adalah file JSON yang perlu direview:**
```json
<PASTE_ISI_FILE_CNSL_POST_OPENAPI_JSON_DI_SINI
```



---

### 💡 Catatan / Ringkasan Poin Kunci Sebelum Kamu Kirim Prompt:

Berdasarkan referensi standar RESTful API dan OpenAPI, berikut beberapa poin utama pada file JSON-mu yang akan disesuaikan oleh AI:

* **Resource Naming (`/users/signup` & `/users/login`)**:
RESTful API disarankan menggunakan kata benda. Kata kerja seperti `signup` / `login` pada RESTful API biasa ditangani dengan:


* `/users` (POST) untuk pendaftaran/membuat user baru.


* `/sessions` atau `/auth/login` (POST) untuk proses otentikasi/login.




* **Penggunaan `PUT` pada `/users**`:
Endpoint untuk pembaruan data user spesifik idealnya adalah `PUT /users/{userID}` atau `PATCH /users/{userID}` (bukan `PUT /users` tanpa ID di URI).


* **Lengkapi `responses**`:
Saat ini objek `"responses": {}` masih kosong pada seluruh endpoint-mu. Mengacu pada OpenAPI, setiap operation wajib memiliki minimal satu response status code (misal `200 OK`, `201 Created`, `400 Bad Request`).