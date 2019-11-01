## CODING TEST PROJECT
This project was created to show Symfony coding skills according to given technical requirements.
### Installation:
Make sure that you have installed last Docker version (https://docs.docker.com/install/).  Clone current "CODING TEST" repository and execute next steps:
Copy `.env.dist` to `.env` into project root directory.
```sh
$ docker-compose build
$ docker-compose up
$ docker-compose exec php bash
```
Inside PHP container update DataBase scheme with following command:
```sh
$ bin/console doc:sch:upd --force
```
Fill DataBase with dummy data
```sh
$ bin/console doc:fix:load
```