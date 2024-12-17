Nama: Riski Abdi Rahmawan

**Email dan Password**

1. admin@example.com => adminutama
2. supervisor@example.com => supervisor
3. manager@example.com => manageroperasional

**Database Version**

MySQL 8.0.30

**PHP Version**

PHP 8.3.12

**Framework**

1. Laravel 11
2. TailwindCSS

**Panduan Penggunaan**
1. Login dan Logout

1.1 Login: Pengguna memasukkan email dan password untuk mengakses sistem. Berdasarkan peran (admin atau manager), pengguna akan diarahkan ke dashboard masing-masing.

1.2 Logout: Pengguna dapat keluar dari sistem untuk mengamankan sesi.

2. Manajemen Kendaraan

2.1 Tambah Kendaraan: Formulir kendaraan dapat diakses melalui modal pop-up.

2.2 Edit Kendaraan: Data kendaraan yang sudah ada dapat diperbarui sesuai kebutuhan.

2.3 Hapus Kendaraan: kendaraan yang tidak diperlukan lagi dapat dihapus.

3. Manajemen Driver

3.1 Tambah Driver: Formulir driver dapat diakses melalui modal pop-up.

2.2 Edit Driver: Data driver yang sudah ada dapat diperbarui sesuai kebutuhan.

2.3 Hapus Driver: driver yang tidak diperlukan lagi dapat dihapus.

4. Manajemen User

4.1 Tambah User: Formulir user dapat diakses melalui modal pop-up.

4.2 Edit User: Data user yang sudah ada dapat diperbarui sesuai kebutuhan.

4.3 Hapus User: user yang tidak diperlukan lagi dapat dihapus.

5. Manajemen Pemesanan

5.1 Tambah Pemesanan: Formulir pemesanan dapat diakses melalui modal pop-up.

5.2 Edit Pemesanan: Data pemesanan yang sudah ada dapat diperbarui sesuai kebutuhan.

5.3 Hapus Pemesanan: pemesanan yang tidak diperlukan lagi dapat dihapus.

6. Persetujuan Pemesanan (Supervisor & Manager)

3.1 Supervisor (Manager 1) dan Manager Operasional (Manager 2) memiliki kewenangan untuk menyetujui atau menolak pemesanan kendaraan.

7. Riwayat Pemakaian Kendaraan

7.1 Menampilkan semua data kendaraan yang sudah digunakan, mencakup detail pemesan, kendaraan, driver, dan status.

8. Log Aktivitas Sistem

8.1 Semua perubahan pada data (menambah, mengubah, menghapus pemesanan, login, dan logout) dicatat secara otomatis dalam tabel log.

9. Export Data ke CSV

9.1 Data pemesanan kendaraan dapat diekspor dalam format CSV untuk pelaporan atau analisis lebih lanjut.

**Langkah Penggunaan Sistem**

1. Login ke Sistem

1.1 Masukkan Email dan Password Anda pada form login.
1.2 Setelah berhasil login:
    1.2.1 Admin: Akses dashboard admin.
    1.2.2 Manager: Akses dashboard manager.

2. Kelola Pemesanan

2.1 Tambah Pemesanan:

2.1.1 Klik tombol Create Pemesanan di dashboard.

2.1.2 Isi formulir yang muncul, termasuk user, driver, kendaraan, tanggal pemesanan, dan status.

2.1.3 Klik Save untuk menyimpan.

2.2 Edit Pemesanan:

2.2.1 Klik tombol Edit pada pemesanan yang ingin diubah.

2.2.2 Perbarui data di formulir yang muncul.

2.2.3 Klik Save.

2.3 Hapus Pemesanan:

2.3.1 Klik tombol Delete pada pemesanan yang ingin dihapus.
2.3.2 Konfirmasi penghapusan.
