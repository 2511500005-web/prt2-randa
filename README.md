# prt2_randa - REST API Mahasiswa

## Cara menjalankan (Laragon)

1. Extract folder ini ke `C:\laragon\www\prt2_randa`
2. Buka phpMyAdmin (`http://localhost/phpmyadmin`), buat database baru bernama `pertemuan_2`
3. Import file `database.sql` ke database tersebut (tab Import di phpMyAdmin)
4. Buka Laragon, klik **Start All**
5. Klik kanan ikon Laragon → **www** → klik `prt2_randa`, browser akan membuka:
   `http://prt2-randa.test/`
6. Test endpoint di Thunder Client atau browser:
   `http://prt2-randa.test/api/mahasiswa.php`
   (harus muncul JSON dengan status 200 OK)

## Struktur folder
```
prt2_randa/
├── api/
│   └── mahasiswa.php
├── config.php
├── helpers/
│   └── response.php
└── database.sql
```

## Commit & Push ke GitHub
```bash
git init
git add .
git commit -m "Pertemuan 2: REST API mahasiswa"
git remote add origin <url-repo-kamu>
git push -u origin main
```
