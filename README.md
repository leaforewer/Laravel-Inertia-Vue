<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Laravel + Breeze + Inertia + VueJS

This repository is a starting point for assessments.

### Quick Start

- Download [Docker Desktop](https://www.docker.com/products/docker-desktop/). 
- Clone this repository: `git clone git@gitlab.com:deal-assessments/laravel-breeze-inertia-vuejs.git`
- Go to the directory: `cd laravel-breeze-inertia-vuejs`
- Run `composer install` to install dependencies
- Run `cp .env.example .env` to copy the example `.env` file
- Run `./vendor/bin/sail up -d` to start the docker container
- Run `./vendor/bin/sail artisan key:generate` to populate the `.env` file with an application key
- Run `./vendor/bin/sail artisan migrate` to create the database
- Run `./vendor/bin/sail npm install` to install NPM dependencies
- Run `./vendor/bin/sail npm run dev` to start the Vite dev server
- Visit [http://localhost:8084/register](http://localhost:8084/register) to make sure the set-up is working
