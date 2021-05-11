# Présentation

Application web de convocations sportives développée par 
  * Tom RENAUDIN
  * Adrien CALLICO _a.k.a_ [aiwendil-bot](https://github.com/aiwendil-bot)

en PHP et Javascript, fondée sur une architecture MVC.

_/!\ Merci de lire entièrement ce README pour bien comprendre toutes les fonctionnalités de cette application._

# Connexion

L'accès aux différentes parties (Secrétaire, Entraîneur, Visiteur) se fait en remplissant
le formulaire LOGIN avec les logs suivants : 

* secretaire / secretaire
* entraineur / entraineur
* visiteur / visiteur

BDD :
* utilisateur : root  
* mdp : ""  
* serveur : MySQL  
* port : 3308  

_/!\ le fichier sql permettant de générer notre base de données est dispobible dans le l'archive du projet_


**Chaque partie possède une petite barre de navigation permettant un accès plus rapide aux différentes sections, ainsi qu'un bouton de déconnection**

# Partie Secrétaire

## EFFECTIF

Il est possible d'ajouter de nouveaux joueurs dans l'effectif, on ne peut pas supprimer
un joueur de l'effectif car on ne prend pas en compte les départs (cf sujet) ; le formulaire
d'inscription empêche l'ajout d'un homonyme ou de prénom/nom comprenant des chiffres.

## ABSENCES

Il est possible de choisir l'état de n'importe quel joueur pour n'importe quelle date
(parmi Disponible, Absent, ...).

La table d'en dessous affiche ces états ainsi que l'état 'Convoqué' (lorsqu'un joueur 
a été sélectionné dans une convocation).

## RENCONTRE

Il est possible d'ajouter une nouvelle rencontre à l'aide du formulaire situé
en haut de page ; ce formulaire prend en compte :

* on ne peut choisir que des dimanches sur la période définie (dim 01/08/2021 au dim 31/07/2022)
* on ne peut nommer une équipe que par une lettre majuscule (cela peut facilement être modifié si l'on a besoin de choisir parmi plus de 26 équipes)
* on ne peut programmer une rencontre qu'entre 8h00 et 18h00.
    
/!\ Interprétation du sujet par rapport à l'ajout de rencontre par fichier CSV :
Le sujet laissait entendre qu'on pouvait ajouter une rencontre par formulaire OU BIEN 
par import de fichier CSV, nous avons choisi l'option du formulaire.

Il est possible de supprimer une rencontre, ainsi que de la modifier "à la volée"
(il suffit d'appuyer respectivement sur les boutons "supprimer" et "modifier")

/!\ Il faut bien évidemment rentrer des informations valides (cf points plus haut)
sinon vous devrez resaisir les informations jusqu'à ce qu'elles soient valides, il n'y 
a pas de message d'avertissement.

Les convocations et rencontres étant liées, supprimer une rencontre supprimera sa 
convocation associée (également si celle-ci est publiée)

## CONVOCATION 

Le secrétaire peut voir toutes les convocations mais ne peut pas les modifier (cf sujet).


# Partie Entraîneur

## EFFECTIF

L'entraineur peut voir l'effectif mais ne peut pas le modifier (cf sujet).

## ABSENCES

Même gestion que pour le secrétaire (cf sujet).

## RENCONTRE

L'entraineur ne peut pas ajouter ou modifier de rencontre. 
Toutefois, il peut générer une convocation liée à cette rencontre en cliquant
sur le bouton "ajouter" (il ne peut ajouter deux fois une convocation liée à une même rencontre).

## CONVOCATION

L'entraineur peut sélectionner 11 à 14 joueurs pour une convocation.
Une fois la convocation validée, donc les joueurs convoqués (cf tableau absences)
ils ne pourront être sélectionnés pour une autre rencontre à la même date.
    
/!\ TOUTEFOIS si une erreur a été commise pendant la sélection, il est possible
grâce à la table des absences, de remettre les joueurs à l'état "Disponible".
En effet, supprimer une convocation ne remet pas automatiquement les joueurs concernés
à l'état "Disponibe".
    
L'entraîneur peut également saisir une information complémentaire concernant la convocation.
L'entraîneur peut décider de publier une convocation.

/!\ Il est possible de publier une convocation sans avoir sélectionné des joueurs.
Toutefois, si des joueurs sont sélectionnés après coup, ils seront bien rajoutés à la convocation.

/!\ La gestion des exempts n'est pas pris en compte dans cette application car il est tout a fait possible de rentrer p=de noumbreuses equipes rendant ce triatement quasiment inutile .

De plus si l'entraineur décide de ne faire jouer qu'une équipe il a peu d'interêt de rendre les joueurs exempts ( si cette fonctionnalité devait être rajoutée il suffifrait de recupérer les joueurs convoqués à une date précise et de rendre les autres exempts via le switch de données du contrôleur CEntraineur.php)


## Partie Visiteur 

Un visiteur n'a accès qu'aux convocations publiées (cf sujet).


## Remarques

* Toutes les fonctionnalités mentionnées précédemment ont été testées et vérifiées.
* Ces tests ont été effectués sur le navigateur Chrome.
    
* /!\ Certaines fonctionnalités peuvent dysfonctionner sur le navigateur Firefox,
comme le refraîchissement avec le 'location.reload()'

* Des valeurs de test ont été pré-rentrées pour mettre en exergue les fonctionnalités
de l'application.
