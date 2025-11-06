TEMPLATE IMPORT KARYAWAN
========================

Format file yang didukung: CSV, XLS, XLSX

KOLOM YANG WAJIB ADA (Header Excel):
------------------------------------
1. Nama Lengkap (atau: Nama, Name)
2. NIK (atau: Nomor Induk Karyawan)

KOLOM OPSIONAL:
--------------
3. Tanggal Lahir (format: YYYY-MM-DD atau DD-MM-YYYY)
4. Tempat Lahir
5. Jabatan
6. Umur (angka)
7. Alamat
8. Tanggal Masuk Kerja (format: YYYY-MM-DD atau DD-MM-YYYY)
9. Status Karyawan (contoh: Tetap, Kontrak)
10. Departemen (nama departemen yang sudah ada di sistem)
11. Plant (nama plant yang sudah ada di sistem)

CATATAN PENTING:
---------------
- Nama Lengkap dan NIK WAJIB diisi
- NIK harus UNIK (tidak boleh duplikat)
- Departemen dan Plant akan dicocokkan berdasarkan NAMA
- Jika departemen/plant tidak ditemukan, akan diabaikan
- Format tanggal bisa fleksibel (akan otomatis dikonversi)
- Baris kosong akan diabaikan

CONTOH FORMAT CSV:
-----------------
Nama Lengkap,NIK,Tanggal Lahir,Tempat Lahir,Jabatan,Umur,Alamat,Tanggal Masuk Kerja,Status Karyawan,Departemen,Plant
John Doe,1234567890,1990-01-15,Jakarta,Manager,33,Jl. Contoh No. 123,2020-01-01,Tetap,Information Technology,Plant Jakarta
Jane Smith,0987654321,1992-05-20,Bandung,Staff,31,Jl. Contoh No. 456,2021-06-15,Tetap,Marketing,Plant Bandung

