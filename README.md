

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


## The library I used while developing the RESTfull API

I used Laravel's passport library. I took the member email and password information in JSON format and created a token. Then I gave access to other services with this token. Without this token, other services cannot be accessed.

## Project Setup

1) Install Composer

		composer install
2) Creating env file from sample env

		cp .env.example .env	
3) Create a new key

		php artisan key:generate
4) Establish the database connection in the env file. Then create a database based on your database name.

		DB_DATABASE=db_name

		DB_USERNAME=db_user

		DB_PASSWORD=db_password
	
5) Let's Migrate the Project. At the same time, seed and include sample data in our database.

		php artisan migrate --seed
6) Generate a sample token with Passport

		php  artisan  passport:install

7) Let's start the project

		php artisan serve


## ## Use of Services in the Project
####	
You can find the postman collection of all services in the project [here](https://lunar-meteor-375744.postman.co/workspace/Escape-Room~0d38aeeb-6118-4071-999e-897813b0aca8/collection/18685427-2f1bebec-735d-4c21-b706-d6b24a0d31ef?action=share&creator=18685427).
 If you run the seed build, your default login will be as follows.

	    Email: user@user.com
	    Password: password

## 1. POST /getToken
As a result of this service, authorization key is returned. In all other services, you should use the key returned from this service in the header as authorization. Otherwise, you will get an error in your requests.

Sample Result:

    {
    "status":  "success",
    "code":  200,
    "message":  "Transaction Successful!",
    "data":  "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiM2VhMTE5NDg2NDQ1MTM1ZDkwN2U1N2YxY2IzYWE3MDFlMzQ5MmRjZDIyZDRjMDMzM2VmZmY1ZmQ1MzYzYjNlZmViZmJkZjVkZDdlMjA2ZTEiLCJpYXQiOjE2ODI2MTE3ODQuMDEzODc5LCJuYmYiOjE2ODI2MTE3ODQuMDEzODgxLCJleHAiOjE3MTQyMzQxODMuNjI0ODgzLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.K82Mrb9cMcgKUzQPxTEi_GEf3Cph6rd_iZikYtILdqsxmmaa_8O1zxtUJdMiScHR1w0gVm07Rp1nEEhxqbRQ8YMqFi0z16w-PfEgoK6-vhiPuPQoQhPYsQ4V_ZYikI4Xl8peuo6s1LLexzKW20UETLh02bBzzWLeuxhrAugAF11uYU5e7a1AlM_C29qr5rzF2CtqHwqlvCDjJYIdeifOtTj9x8Ja_0IWcruuQ-9fyHkkDdSsQUnzu3es21E_8V7aEoq0E2l3Vc1h2QfwFAlCFp9h6To-OQBM0c2wRMbbHQ0EL8v-XZY5DCsmIoMCDU3IZ5HQ0F5yD_sqS4ZUdRLaTnGnZYtrDhtlAA618YB0xygvAV_bZ73_tBVf1Tx63LFv5Evwy8r660EHje9hK3EcZ3jXAxY8eQTbLgfBplIgpW-94ymNTgEcq0h7-OFCeKq29ctCaxIZbUqUJPtEGU8-V_fro5nmPzjghXmSxpm2_3Qa1edkdBaG_cvXETy2bc1p4KkNYNjxTEmC13DPfTi_t907-RxqRZSY7yJWdqDTTqBkgunlIWvQtB0-kSTa7LTmlbkB1miYRosPUx7vlW0WpKchOEyJJJBsOzt0h1qyJmdB08nPtxRftSnaqXDcAOxFtyCE9Jw3cr1OwFiwp7UKxJWUGwdaRJbcdL_OV5vFt0Q"
    }

## 2. GET /escape-rooms:
This service lists all escape rooms. In order to use this service, there must be an authorization key in the header.

Sample Result:

    {
        "status": "success",
        "code": 200,
        "message": "Transaction Successful!",
        "data": [
            {
                "id": 1,
                "name": "Ex ea impedit.",
                "theme": "labore",
                "max_participants": 1,
                "created_at": "2023-04-27T15:42:23.000000Z",
                "updated_at": "2023-04-27T15:42:23.000000Z"
            }
        ]
    }

## 3. GET /escape-rooms/{id}:
This service id gives the information of the escape room that was sent.  In order to use this service, there must be an authorization key in the header.

Sample Result:

    {
        "status": "success",
        "code": 200,
        "message": "Transaction Successful!",
        "data": [
            {
                "id": 1,
                "name": "Ex ea impedit.",
                "theme": "labore",
                "max_participants": 1,
                "created_at": "2023-04-27T15:42:23.000000Z",
                "updated_at": "2023-04-27T15:42:23.000000Z"
            }
        ]
    }
## 4. GET /escape-rooms/{id}/time-slots: 
This service lists the available time slots for a particular escape room. In order to use this service, there must be an authorization key in the header.
Sample Result:

    {
        "status": "success",
        "code": 200,
        "message": "Transaction Successful!",
        "data": {
            "id": 1,
            "name": "Ex ea impedit.",
            "theme": "labore",
            "max_participants": 1,
            "created_at": "2023-04-27T15:42:23.000000Z",
            "updated_at": "2023-04-27T15:42:23.000000Z"
        }
    }

## 5. POST /bookings: 
This service create a new booking for a specific escape room and time slot. If the booking is made on the user's birthday, apply a 10% discount automatically. In order to use this service, there must be an authorization key in the header.

Sample Result:

    {
        "escape_room_id": 1,
        "time_slot_id": 1,
        "num_participants": 1,
        "user_id": 1,
        "discount_applied": 0.1,
        "updated_at": "2023-04-27T16:33:41.000000Z",
        "created_at": "2023-04-27T16:33:41.000000Z",
        "id": 3
    }

## 6. GET /bookings: 
This service lists all reservations for the authenticated user and shows any discounts applied. In order to use this service, there must be an authorization key in the header.

Sample Result:

    {
        "status": "success",
        "code": 200,
        "message": "Transaction Successful!",
        "data": [
            {
                "id": 3,
                "user_id": 1,
                "time_slot_id": 1,
                "escape_room_id": 1,
                "num_participants": 1,
                "discount_applied": 0.1,
                "created_at": "2023-04-27T16:33:41.000000Z",
                "updated_at": "2023-04-27T16:33:41.000000Z"
            }
        ]
    }

## 7. DELETE /bookings/{id}:	
This service cancel a specific booking by its ID. In order to use this service, there must be an authorization key in the header.

Sample Result: 

    {
        "status": "success",
        "code": 200,
        "message": "Transaction Successful!"
    }

