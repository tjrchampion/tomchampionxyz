# tomchampion.xyz

This repo is for my personal website https://www.tomchampion.xyz. I have publically shared the build of this code for anyone who might find its build interesting. 

I've used :whale: Docker(local), Slim4 and Vue.js to build this website. I'm following the fantasic ADR (Action, Domain, Reponder) pattern. I have a very simple example of an API built with this pattern which serves a flutter app.

If you're intested in checking out the project you can clone this project and run in root:

* `docker-compose build`
* `docker-compose run web composer install`

Make sure you rename `.env.example` to `.env`


## Client

* `docker-compose run web npm install`
* `docker-compse run web npm run dev`

## Database

For the time-being if you want to setup the database, you can either DM me and i'll give it to you, or check out the Models directory and built it yourself.

## what i'm working on

* Improved error handling
* Token based authentication
* Database migration with Phinx
* Cors
* CSRF Protection








