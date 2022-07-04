<h1 align="center">Portfolio</h1>

<p align="center">
    <a href="#projet">Projet</a>
    <a href="#requirements">Pré-requis</a>
    <a href="#installations">Installations</I>
    <a href="#technologies">Technologies</a>
    <a href="#license">License</a>
</p>

***

![Badge](https://img.shields.io/badge/license-MIT-%237159c1?style=plastic) 
![Badge](https://img.shields.io/badge/Symfony-v5.3.9-%237159c1?style=plastic&color=brightgreen)


## 🖥 Projet

Un site me présentant, présentant mes projets accomplis et ceux encore à venir 😃 

***

### Pré-requis

* PHP 7.4
* Composer
* Symfony CLI
* nodejs et npm/yarn

Vous pouvez vérifier les pré-requis avec la commande suivante (CLI de Symfony) :

```
symfony check:requirements
```
***

### 🛠 Installations

- composer install
- yarn install
- yarn encore dev watch
- symfony serve -d

Le serveur va lancer le port 8000 - http://localhost:8000
***

### Ajouter des données de tests

```bash
symfony console doctrine:fixtures:load
```
***

### Lancer des tests

```
php bin/phpunit --testdox
```
***

## Tecnologies

- [Symfony](https://symfony.com)
- [StartBoostrap](https://startboostrap.com)

***

## Production

### Envoi des mails de Contacts

Les mails de prise de contact sont stockés en BDD, pour les envoyer par mail, il faut mettre en place un cron sur :

```
symfony console app:send-contact
``` 

## License

Released under the MIT license.