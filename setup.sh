# #!/bin/bash

# #clone the latest laravel into directory
# docker container rum -rm -v $(pwd):/app composer require slim/slim

# #move directory
# cd laravel

# #run composer install in container then dispose of it
# docker container run --rm -v $(pwd):/app composer install

# #create public directory
# mkdir public

# #move directory
# cd ../

# #run everything 
# docker-compose up