<h1>SISTEM MANAJEMEN AKADEMIK</h1>

<p>
Sistem Manajemen Akademik adalah aplikasi berbasis web yang dibangun menggunakan Laravel dan Laravel Filament untuk mempermudah proses akademik, termasuk pelacakan absensi dan notifikasi keterlambatan otomatis bagi Administrator, Dosen, dan Mahasiswa.
</p>

<h2>Tentang Aplikasi</h2>
<p>
Sistem ini dirancang untuk menyederhanakan administrasi akademik dengan menyediakan platform yang mudah digunakan untuk mengelola jadwal perkuliahan, absensi mahasiswa, dan pengiriman notifikasi. Beberapa fitur utama yang tersedia antara lain:
</p>
<ul>
  <li><strong>Login Multi-Peran:</strong> Akses aman dengan izin berbasis peran untuk Admin, Dosen, dan Mahasiswa.</li>
  <li><strong>Manajemen Pengguna:</strong> Admin dapat membuat, memperbarui, dan menghapus data Dosen dan Mahasiswa.</li>
  <li><strong>Penjadwalan Perkuliahan:</strong> Admin mengatur jadwal perkuliahan agar proses akademik lebih terorganisir.</li>
  <li><strong>Pelacakan Absensi:</strong> Dosen membuat sesi absensi; Mahasiswa mengisi kehadiran dengan status Hadir, Izin, Sakit, atau Alpa.</li>
  <li><strong>Notifikasi Otomatis:</strong> Sistem mengirimkan peringatan kepada Mahasiswa yang terlambat mengisi absensi.</li>
  <li><strong>Dashboard Dinamis:</strong> Antarmuka responsif yang disesuaikan dengan peran pengguna, didukung oleh Laravel Filament.</li>
</ul>
<p>
Dibangun dengan teknologi Laravel, Livewire, Tailwind CSS, dan MySQL, sistem ini menawarkan keamanan, skalabilitas, dan kemudahan dalam pemeliharaan.
</p>

<h2>Cara Menjalankan Aplikasi</h2>
<p>Ikuti langkah-langkah berikut untuk menjalankan Sistem Manajemen Akademik secara lokal di editor kode Anda (seperti VS Code, PhpStorm):</p>

<h3>Prasyarat:</h3>
<ul>
  <li>PHP versi 8.1 atau lebih tinggi</li>
  <li>Composer</li>
  <li>MySQL</li>
  <li>Node.js dan npm</li>
  <li>Git</li>
</ul>

<h3>Clone Repository:</h3>
<pre>
git clone https://github.com/your-repo/academic-management-system.git
cd academic-management-system
</pre>

<h3>Install Dependencies:</h3>
<pre>
composer install
npm install
</pre>

<h3>Configure Environment:</h3>
<p>Salin file konfigurasi environment:</p>
<pre>
cp .env.example .env
</pre>
<p>Update file <code>.env</code> dengan kredensial database Anda (misalnya <code>DB_DATABASE</code>, <code>DB_USERNAME</code>, <code>DB_PASSWORD</code>).</p>
<p>Generate kunci aplikasi dengan perintah:</p>
<pre>
php artisan key:generate
</pre>

<h3>Set Up Database:</h3>
<ul>
  <li>Buat database MySQL baru, misalnya <code>academic_system</code>.</li>
  <li>Jalankan migrasi database untuk membuat skema:</li>
</ul>
<pre>
php artisan migrate
</pre>

<h3>Compile Assets:</h3>
<pre>
npm run dev
</pre>

<h3>Start Development Server:</h3>
<pre>
php artisan serve
</pre>

<h3>Akses Aplikasi:</h3>
<p>Buka browser dan akses alamat berikut:</p>
<p><a href="http://localhost:8000" target="_blank">http://localhost:8000</a></p>
<p>Gunakan kredensial default (misalnya <code>admin@domain.com</code> / <code>password</code>) untuk login sebagai Admin, Dosen, atau Mahasiswa.</p>


Preview
Below is a preview of the Academic Management System’s interface:
1. Login
    ![Image](https://github.com/user-attachments/assets/7dbb7692-1c8c-4d2b-99d5-24112b5b67a3)
2. Register

   ![WhatsApp Image 2025-05-21 at 21 00 42_f2d1dabc](https://github.com/user-attachments/assets/07a0835e-cc8e-4062-a51a-f326072b10b4)
3. Fitur Absensi Mahasiswa
   
    ![Image](https://github.com/user-attachments/assets/76459dab-84a7-402e-9dd8-1a4e9fb3faf4)
4. Input matakuliah dan Admin

   ![Image](https://github.com/user-attachments/assets/0e991dda-6f9c-4adc-8ae6-b86938352a7b)
4. Manajemen dan Role

   ![Image](https://github.com/user-attachments/assets/038920fa-8eb8-41bb-9bea-8c36216de33c)
5. Notifikasi

   ![Image](https://github.com/user-attachments/assets/ace95c34-f38f-4d46-b4d3-15eb2a8aaaba)


