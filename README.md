<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
<h1><strong>Ranking athletes performance API </strong></h1>
<p align="center">
    
</p>

## About The API 
The Athlete Performance Tracking API is a RESTful service built with Laravel to manage and track athletes' performance records in various movements. The API allows CRUD operations for athletes, movements, and personal records, providing an efficient way to record and retrieve performance data. Additionally, <strong>it includes endpoints with a ranking system, retrieving ranking of athletes based on their performance in specific movements.</strong> It was built as a test case. 




## Technologies and Tools
This api was built using Docker compose running a nginx image and a mysql image for development enviroment and <strong>Laravel sail</strong>, a command-line interface for interacting with laravel's default docker development environment. Postman was used for testing the endpoint.
<br>
Read more about Laravel Sail here: 
https://laravel.com/docs/11.x/sail

<img src= "https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white"></img>
<img src="https://img.shields.io/badge/docker-%230db7ed.svg?style=for-the-badge&logo=docker&logoColor=white"></img>
<img src="https://img.shields.io/badge/nginx-%23009639.svg?style=for-the-badge&logo=nginx&logoColor=white"></img>
<img src="https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white"></img>
<img src="https://img.shields.io/badge/mysql-4479A1.svg?style=for-the-badge&logo=mysql&logoColor=white"></img>
<img src="https://img.shields.io/badge/Postman-FF6C37?style=for-the-badge&logo=postman&logoColor=white"></img>




## API complete Documentation: Wiki
Access <a href="https://github.com/juliazschwartz/ranking-api/wiki">Here the complete documentation</a> on Wiki
<br>
For detailed information about how to use the <strong>Endpoints</strong>, access <a href="https://github.com/juliazschwartz/ranking-api/wiki/Endpoints">this page of the project wiki</a>
<br>
For  <strong>examples of use</strong>, access <a href="https://github.com/juliazschwartz/ranking-api/wiki/Examples">here</a>


## Steps to use
You can simply run the project on your machine, if you have docker environment:
<br>

    
1- <strong>Installation</strong> :
    Clone this repository:
    <br>
```
git clone https://github.com/juliazschwartz/ranking-api.git
```

    
```
cd ranking-api
``` 

 2 - <strong>Setup</strong>:
     <br>
<span> If you are in Linux OS, and docker compose is already installed, execute this command: </span>
```
docker context use default
```
<br>

Since none of the application's Composer dependencies, including Sail, will be installed after you clone the application's repository to your local computer, 
run the following command to install application's dependencies. <br> This command uses a small Docker container containing PHP and Composer to install the application's dependencies:
<br>

```
docker run --rm \
-u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```
<br>

Now, <strong>Paste the content of .env.example file, present in the root directory to .env</strong> to have the correct database configuration (command for Linux OS, replace with equivalent if you are using another OS).
```
cp .env.example .env
``` 

3 - <strong>Run it</strong>:
 
<span>Now, lets execute the container with sail up command (equivalent to compose up)</span>
 ```
./vendor/bin/sail up -d
 ```

it should look like this: <br>
<img src="https://github.com/juliazschwartz/ranking-api/blob/main/images_read_me/1.jpeg" width="700">
</img>
<br>

 4 - <strong>Migrations and Seeders</strong>:
<br>
Laravel sail already manages volumes to store data, but there are stored in local machine, and are not presented here in this repository, so you should run the migration and seeders presented in this repository to populate the database.
<br>
For that, just execute:
<br>
<br>
```
./vendor/bin/sail artisan migrate

./vendor/bin/sail artisan db:seed --class=AthleteSeeder
./vendor/bin/sail artisan db:seed --class=MovementSeeder
./vendor/bin/sail artisan db:seed --class=PersonalRecordSeeder
```
<br>


should look like this:
<br><img src="https://github.com/juliazschwartz/ranking-api/blob/main/images_read_me/executando_migrations.png" width="700"></img>
<br>
<img src="https://github.com/juliazschwartz/ranking-api/blob/main/images_read_me/seeders_executadas.png" width="700"></img>
<br>

      
5 - <strong>Test it</strong>

To test it, you can just run :
```
./vendor/bin/sail artisan test
```
should appear like this (all tests passing):
<br>
<br>
<img src="https://github.com/juliazschwartz/ranking-api/blob/main/images_read_me/tests.jpeg" width="600"></img>

<br>


6- <strong>Use it</strong>
<br>
For detailed information about how to use the <strong>endpoints</strong> of this project, access <a href="https://github.com/juliazschwartz/ranking-api/wiki/Endpoints">here</a>
<br>

<span>Now you are ready to make the CRUD operations in API. I recommend using <strong>Postman</strong> for it (link for download in the references section).
<br>
<br>
For that, type "http://localhost/api/" in the URL field ("localhost" can be replaced by your local IP ), followed by the URL parameters for your request.<br> It will look like this: 
<br>
<br>
<img src= "https://github.com/juliazschwartz/ranking-api/blob/main/images_read_me/postman-example.png" width="700"></img> 


7- <strong>External References</strong> <br>
<ul>
    <li><a href="https://www.postman.com/">Postman</a> <br></li>
    <li><a href="https://www.postman.com/downloads/">Laravel Sail</a><br></li>
</ul>







