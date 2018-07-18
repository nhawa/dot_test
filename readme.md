# DOT TEST

## Langkah instalasi

untuk langkah penginstalan projek ini dapat `didownload langsung` atau dengan perintah 
```sh
$ git clone https://github.com/nhawa/dot_test.git
```

copy `.env.example` file dan rename menjadi `.env`

buka `.env` file dan lakukan settingan database sesuai dengan database yang anda pakai

silahkan buka terminal dan masuk ke folder project yg telah di download dan lanjutkan installasi dengan perintah

```sh
$ composer install
```

setelah selesai. lakukan migrasi database dengan perintah

```sh
$ php artisan migrate 
``` 

##Dokumentasi Pengerjaan test 1
Url untuk test satu dapat dilihat di 
```url
[GET] /test1 
```
##Dokumentasi Pengerjaan Sprint 1

fetching API data provinsi & kota dengan artisan command
```sh
$ php artisan get_data_ro
```
REST API untuk pencarian provinsi dan kota dengan endpoint berikut:
```url
[GET] /search/provinces?id={province_id}
[GET] /search/cities?id={city_id} 
```
## Dokumentasi pengerjaan sprint 2
Untuk swap source pencarian provinsi dan kota bisa di atur di
```path
 path: ./config/app.php
```
dengan variable `'RO'` untuk Rajaongkir 
```var
'area_source' => 'RO'
```
dan `'DB'` untuk database
```var
'area_source' => 'DB'
```

API Login bisa dengan endpoint 
```url
[POST] /login
```
dengan parameter

 Params | Desc 
 ------|------
 email | email user
 password| password user
 
user dapat di tambahkan dengan perintah
```sh
$ php artisan db:seed 
```

REST API untuk pencarian provinsi dan kota dengan endpoint berikut:
```url
[GET] /search/provinces?id={province_id}
[GET] /search/cities?id={city_id} 
```
dengan menyertakan `apikey` pada `headers` yang didapat dari API Login

untuk melakukan testing web service dilakukan dengan perintah
```sh
$ composer test 
```

## Jawaban Untuk pertanyaan 
untuk jawaban dari pertanyaan Knowledge and Experience dapat di lihat di file `jawaban.md`
