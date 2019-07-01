# Environnement LAMP basé sur Docker Compose

## Logiciels

* PHP 7.2
* Apache 2.4
* MariaDB 10.4
* phpMyAdmin 4.9

## Usage

Pour démarrer l’environnement, exécutez simplement:

```
$ docker-compose up -d
```

La première exécution, l’image du serveur doit être construite. Cela peut prendre un bon moment.

Le serveur apache est alors disponible sur le port `80` et sert le dossier  `www`.

phpMyAdmin est disponible sur le port `9000`.

MariaDB est disponible sur le port `3306`. L’utilisateur `root` a le mot de passe `digital2019` par défaut.

## Modules PHP installés

* curl
* gd
* intl
* json
* mbstring
* mcrypt
* pdo
* pdo-mysql
* pdo-sqlite
* tokernizer
* xdebug
* zip
