## HOW TO RUN
1. Install Dependencys
   ```
   composer i
   ```
2. Change env.example to .env (do adjustment to the database name)
3. do Migration
   ```
   php artisan migrate
   ```
   ```
   php artisan db:seed --class=UserSeeder
   php artisan db:seed --class=KandangSeeder
   php artisan db:seed --class=DataKandangSeeder
   php artisan db:seed --class=AmoniakSensorSeeder
   php artisan db:seed --class=SuhuKelembabanSensorsSeeder
   ```
4. run this project in port 8080
   ```
   php artisan serve --port=8080
   ```
3. run the frontend project from https://github.com/senaajibayumurti/BroMo
