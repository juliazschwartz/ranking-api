<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
<h1><strong>Ranking athletes performance API </strong></h1>
<p align="center">
    
</p>

## About The API 
The Athlete Performance Tracking API is a RESTful service built with Laravel to manage and track athletes' performance records in various movements. The API allows CRUD operations for athletes, movements, and personal records, providing an efficient way to record and retrieve performance data. Additionally, it includes endpoints to rank athletes based on their performance in specific movements.It was built as a test case.


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




## API complete Documentation
<a href="https://github.com/juliazschwartz/ranking-api/wiki">Here the complete documentation</a>



## Steps to use
You can simply run the project on your machine, if you have docker environment:
<br>

    
1- <strong>Instalation</strong> :
    Clone this repository:
    <br>
```
git clone https://github.com/juliazschwartz/ranking-api.git
```

    
```
cd ranking-api
``` 

 2- - <strong>Migrations and Seeders</strong>:
     <br>
     Laravel sail already manages volumes, so the database presented here should be already populated.

 3 - <strong>Run it</strong>:
     <br>
<span> If you are in Linux OS, and docker compose is already installed, execute this command: </span>
```
docker context use default
```

<span>Now, lets execute the container with sail up command (equivalent to compose up)</span>
 ```
./vendor/bin/sail up
 ```
it should look like this: <br>
<img src="https://github.com/juliazschwartz/ranking-api/blob/main/1.jpeg" width="700">
</img>

<span>Now you are ready to make the CRUD operations in API. I recommend using Postman for it. It will look like this:
<br>
<img src= "https://github.com/juliazschwartz/ranking-api/blob/main/postman-example.png" width="700"></img> 

For detailed information about the api, and how to use it, access <a href="https://github.com/juliazschwartz/ranking-api/wiki">here</a>
      
 








