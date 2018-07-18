# DOT TEST

## Langkah instalasi

untuk langkah penginstalan projek ini dapat `didownload langsung` atau dengan perintah 
```sh
$ git clone https://github.com/nhawa/dot_test.git
```
silahkan buka terminal dan masuk ke folder project yg telah di download dan lanjutkan installasi dengan perintah

```sh
$ composer install
```
copy `.env.example` file dan rename menjadi `.env`

buka `.env` file dan lakukan settingan database sesuai dengan database yang anda pakai

setelah selesai. lakukan migrasi database dengan perintah

```sh
$ php artisan migrate 
``` 

## Security Vulnerabilities

If you discover a security vulnerability within Lumen, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
