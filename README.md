# Project Web Tata Tertib Sistem

Selamat datang di repositori Project Web Tata Tertib Sistem! Sistem ini dirancang untuk mempermudah pengelolaan tata tertib di lingkungan kampus. Ikuti panduan di bawah untuk menginstal dan menjalankan aplikasi di lokal menggunakan **XAMPP**.

## Prasyarat

Sebelum memulai instalasi, pastikan bahwa kamu telah menginstal dan menjalankan **XAMPP** (terutama Apache dan MySQL). Jika belum, kamu bisa mengunduhnya [di sini](https://www.apachefriends.org/index.html).

## Langkah-langkah Instalasi

Ikuti langkah-langkah berikut untuk menjalankan sistem ini di komputer lokal kamu:

### 1. **Clone Repositori**

Buka terminal atau command prompt dan jalankan perintah berikut untuk mengunduh proyek ini:

```bash
git clone https://github.com/FandyHanz/ProjectWebTatibSystema.git
```

### 2. **Import Database**

Buka phpmyadmin di browser dengan memasukkan url
```bash
http://localhost/phpmyadmin/
```
Setelah itu buat database baru dengan nama pbl_tatib dan import menggunakan file sql yang tersedia di proyek yang telah diunduh

### 3. **Jalankan Program**

Buka terminal di vscode atau di cmd bawaan lalu arahkan ke folder Tata_Tertib di tempat anda mengunduh proyek. Setelah itu masukkan perintah
```bash
php -S localhost:8080
```
### 4. **Buka Program**

Buka program di url yang disediakan oleh cmd
