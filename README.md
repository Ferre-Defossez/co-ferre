# 2223WMSS-CoWorking

## Getting started

To make it easy for you to get started with GitLab, here's a list of recommended next steps.

## Installation

- [ ] cd existing_repo
- [ ] git remote add origin https://gitlab.com/ikdoeict/arno.boenders/2223wmss-coworking.git
- [ ] git branch -M main
- [ ] git push -uf origin main
- [ ] launch docker and use <pre> docker compose up -d --build 
- [ ] get acces to de php-web container
    <pre> docker exec -it {'container id'} bash
- [ ] install dbal & twig 
    <pre>composer require doctrine/dbal 3.5.1
    composer require twig/twig 3.4.3 

- [ ] Now you should be able to use the application

## Install Xdebug

- [ ] file  [dockerfile](docker/Dockerfile)
        edit: (place/remove '#')
        <pre>
      #  RUN pecl install xdebug \
      #    && docker-php-ext-enable xdebug
      # COPY ./xdebug.ini "${PHP_INI_DIR}/conf.d"
- [ ] rebuild the container 
    <pre>  docker compose down
    docker compose up -d --build

## License

[MIT](https://choosealicense.com/licenses/mit/)
