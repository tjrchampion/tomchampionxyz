# tomchampion.xyz setup

This repo is for my personal website https://www.tomchampion.xyz. I have publically shared the build of this code for anyone who might find its build interesting. 

I've used :whale: Docker, Slim4 and Vue.js to build this website. Please feel free to check it out.

* `docker-compose build`
* `docker-compose run web composer install`
* `docker-compose run web npm install`

Want to run dev?

* `docker-compse run web npm run dev`

**That's it, you should be good**

You can migrate & seed the db with the following commands:

* `docker-compose exec web php artisan migrate`








