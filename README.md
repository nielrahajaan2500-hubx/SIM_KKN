# 🎓 SIM KKN — Sistem Informasi Manajemen KKN

<p align="center">
  <b>Sistem Informasi Manajemen Kuliah Kerja Nyata</b>
  <br>
  Aplikasi berbasis web untuk membantu pengelolaan kegiatan KKN secara terstruktur.
</p>

---

## 📌 Tentang Project

**SIM KKN** merupakan aplikasi berbasis web yang dibuat untuk membantu proses pengelolaan kegiatan Kuliah Kerja Nyata (KKN).

Sistem ini digunakan oleh tiga jenis pengguna, yaitu **Admin, Dosen Pembimbing Lapangan (DPL), dan Mahasiswa**. Setiap pengguna memiliki hak akses dan fitur yang berbeda sesuai dengan perannya.

SIM KKN membantu proses pengelolaan data mahasiswa, dosen, lokasi KKN, pembentukan kelompok, program kerja, hingga pengumpulan dan verifikasi laporan KKN.

---

## 👥 Role Pengguna

### 👨‍💼 Admin

Admin bertugas mengelola data utama dalam sistem.

Fitur Admin:

- Mengelola data mahasiswa
- Mengelola data dosen
- Mengelola data lokasi KKN
- Membuat kelompok KKN
- Menentukan Dosen Pembimbing Lapangan (DPL)
- Melakukan plotting mahasiswa ke kelompok
- Melihat detail kelompok
- Mengelola anggota kelompok

### 👨‍🏫 Dosen Pembimbing Lapangan

Dosen Pembimbing Lapangan dapat melakukan monitoring terhadap kelompok yang menjadi tanggung jawabnya.

Fitur Dosen:

- Melihat dashboard dosen
- Melihat kelompok bimbingan
- Melihat anggota kelompok
- Melihat program kerja
- Memverifikasi program kerja
- Memberikan revisi program kerja
- Melihat laporan KKN
- Memverifikasi laporan
- Memberikan catatan atau revisi laporan

### 👨‍🎓 Mahasiswa

Mahasiswa dapat mengelola kegiatan KKN yang dilakukan bersama kelompoknya.

Fitur Mahasiswa:

- Melihat informasi KKN
- Melihat kelompok dan anggota
- Mengelola program kerja
- Mengajukan program kerja
- Melihat status program kerja
- Mengunggah laporan KKN
- Mengunggah foto kegiatan
- Mengunggah file laporan
- Melihat catatan dari DPL
- Memperbaiki laporan yang mendapatkan revisi

---

## 🔄 Alur Sistem

```text
                         ADMIN
                           │
          ┌────────────────┼────────────────┐
          │                │                │
          ▼                ▼                ▼
      Mahasiswa          Dosen           Lokasi
          │                │                │
          └────────────────┼────────────────┘
                           │
                           ▼
                   PEMBENTUKAN KELOMPOK
                           │
                           ▼
                      MAHASISWA
                           │
                           ▼
                    PROGRAM KERJA
                           │
                           ▼
                         DPL
                           │
                  ┌────────┴────────┐
                  │                 │
                  ▼                 ▼
              Disetujui           Revisi
                  │                 │
                  │                 ▼
                  │             Perbaikan
                  │                 │
                  └────────┬────────┘
                           ▼
                    LAPORAN KKN
                           │
                           ▼
                         DPL
                           │
                  ┌────────┴────────┐
                  │                 │
                  ▼                 ▼
              Disetujui           Revisi
                  │                 │
                  ▼                 ▼
                Selesai         Perbaikan

⚙️ Teknologi yang Digunakan
Teknologi	Keterangan
PHP	Bahasa pemrograman
CodeIgniter 4	Framework aplikasi
MySQL	Database
Bootstrap	Framework tampilan
HTML	Struktur halaman
CSS	Tampilan halaman
JavaScript	Interaksi halaman
XAMPP	Web server dan database lokal
Visual Studio Code	Code editor
✨ Fitur Utama
🔐 Authentication

Sistem memiliki proses login untuk membedakan hak akses pengguna.

Role yang tersedia:

Admin
Dosen
Mahasiswa

Setiap pengguna akan diarahkan ke halaman sesuai dengan role masing-masing.

👥 Manajemen Kelompok

Admin dapat melakukan pengelolaan kelompok KKN, seperti:

Membuat kelompok
Menentukan nama kelompok
Menentukan DPL
Menentukan lokasi KKN
Menambahkan mahasiswa ke kelompok
Melihat anggota kelompok
Menghapus anggota dari kelompok
📝 Program Kerja

Mahasiswa dapat membuat program kerja yang akan dilaksanakan selama kegiatan KKN.

Program kerja kemudian diperiksa oleh DPL.

Status program kerja:

Menunggu
   │
   ├──► Revisi
   │       │
   │       └──► Perbaikan
   │
   └──► Disetujui
            │
            ▼
          Terkunci

Program kerja yang sudah disetujui akan terkunci sehingga mahasiswa tidak dapat mengubah atau menghapusnya.

📄 Laporan KKN

Mahasiswa dapat mengunggah laporan kegiatan KKN yang berkaitan dengan program kerja.

Data yang dapat diunggah meliputi:

Judul laporan
Deskripsi
Foto kegiatan
File laporan

Laporan kemudian diverifikasi oleh DPL.

Status laporan:

Menunggu
   │
   ├──► Revisi
   │       │
   │       └──► Perbaikan
   │
   └──► Disetujui
            │
            ▼
          Terkunci

Laporan yang sudah disetujui tidak dapat diedit atau dihapus oleh mahasiswa.

🗄️ Database

Beberapa tabel utama yang digunakan dalam sistem:

users
mahasiswa
dosen
lokasi
kelompok
proker
laporan

Relasi utama sistem:

Dosen
  │
  ▼
Kelompok
  │
  ├── Mahasiswa
  │
  └── Program Kerja
          │
          ▼
       Laporan
📁 Struktur Project
SIM_KKN/
│
├── app/
│   ├── Controllers/
│   ├── Models/
│   └── Views/
│
├── public/
│
├── system/
│
├── writable/
│
├── tests/
│
├── .gitignore
├── composer.json
├── env
└── spark
🚀 Cara Menjalankan Project
1. Clone Repository
git clone https://github.com/nielrahajaan2500-hubx/SIM_KKN.git
2. Masuk ke Folder Project
cd SIM_KKN
3. Install Dependency
composer install
4. Konfigurasi Environment

Salin file env menjadi .env.

Kemudian sesuaikan konfigurasi database dengan database lokal.

Contoh:

database.default.hostname = localhost
database.default.database = si_kkn
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306

File .env tidak disertakan dalam repository karena berisi konfigurasi environment.

5. Jalankan Aplikasi
php spark serve

Kemudian buka browser:

http://localhost:8080
🎯 Tujuan Project

SIM KKN dibuat untuk membantu proses administrasi dan pengelolaan kegiatan KKN agar menjadi lebih terstruktur.

Sistem ini diharapkan dapat mempermudah Admin dalam mengelola data, membantu DPL dalam melakukan monitoring dan verifikasi, serta memudahkan mahasiswa dalam mengelola program kerja dan laporan kegiatan KKN.
