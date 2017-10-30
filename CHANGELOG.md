# Change Log
AMU HAL

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/)
and this project adheres to [Semantic Versioning](http://semver.org/).



#7.3.8 - 2017-10-30

### Fixed
- ajout d'un parametre rows également sur les requetes par docids
- bouton 'pus de publications' non visible poue les recherches par docids

### Added
- affichage anéchronologique par défaut , sauf pour la méthode par docid

#7.3.7 - 2017-10-03

### Changed
- Inspection du code et conventions

#7.3.6 - 2017-09-21

### Fixed
- ajout d'un parametre rows=500 sur les requetes pour écarter la limitation par défaut de 30 piublications

#7.3.5 - 2017-09-07

### Changed
- ajout de compléments dans le texte d'aide du amu_hal.module
- ajout de compléments dans le texte du champ Affichage  --> Champs à afficher du amu_hal_forms.php

#7.3.5 - 2017-06-19

### Removed
- retrait des popup filters en dur dans amu_hal_forms.php

### Added
- Implémentation de function amu_hal_help(dans amu_hal.module pour alimenter le module d'aide
- Dépendance module help dans .info

#7.3.4 - 2017-06-19

### Added
- Champs conditionnels dans amu_hal_forms.php
- Popup filters dans amu_hal_forms.php
- Dépendance module popup_descriptions dans .info

#7.3.3 - 2017-06-07

### Fixed
- Affiche le titre français des publications sur version anglaise du site lorsque pas de titre anglais

##7.3.2 - 2017-05-03

### Fixed
- bug sur les max row

##7.3.1 - 2017-04-26
### Added
- css added for class name/skins isabelle-adjani, cyanure and orange

### Fixed
- bogue mulitinstances sur les blocs fancy


##7.3.0 - 2017-03-17
### Added
- blocs instanciable
- settings multiple  possible par block permettant:
   - Publications significatives pour un labo ou un utilisateur
   - Tri des publications
   - Filtres par docTypes
   - Filtres les champs affichés
   - Choix du mode d'affichage
- css intégré au module

### Changed
- Code entièrement remanié avec en ligne de mire : NTR / generalisation / extensibilité / lisibilité / usabilité / fonctions rendues dissociées  /consistance dans le nommage des variables et sa sémantique 
- un bloc unique
- une fonction unique de génération dynamique de l'url
- un objet $config unique

### Removed
- code répété

### Fixed
- bogue sur les formes auteurs




