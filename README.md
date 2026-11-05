# N.I.C & Associés — Site du cabinet

Site vitrine du cabinet d'avocats **N.I.C & Associés** (Barreau de Kinshasa / Gombe) :
présentation du cabinet et de son équipe, actualités juridiques, grille des honoraires et
formulaire de contact. Le cabinet gère son contenu et ses messages depuis une administration
Filament.

En ligne : <https://www.cabinetnic-et-associes.com>

## Stack

| Couche     | Outils                                                                 |
| ---------- | ---------------------------------------------------------------------- |
| Back-end   | PHP 8.2+, Laravel 12, MySQL                                            |
| Administration | Filament 5 (panneau `/admin`)                                      |
| Front-end  | Blade, Tailwind CSS 3, Vite, Flowbite (menu mobile)                    |
| Typographie | Source Sans 3 et Source Serif 4 (auto-hébergées), Material Symbols (Google Fonts) |
| Design     | Template « Sovereign Juris » conçu sur Google Stitch                   |

## Pages

| URL                  | Contenu                                                                 |
| -------------------- | ----------------------------------------------------------------------- |
| `/`                  | Accueil : présentation, domaines, services, dernières actualités, contact |
| `/a-propos`          | Histoire, valeurs, équipe d'avocats et équipe de soutien                |
| `/domaines-d-intervention` | Les 12 domaines d'intervention et la méthode de travail du cabinet |
| `/actualites`        | Liste des actualités avec recherche                                     |
| `/articles/{id}`     | Article, partage, commentaires validés, formulaire de commentaire et « À lire aussi » |
| `/honoraires`        | Ouvre le PDF de la grille des honoraires                                |
| `/sitemap.xml`, `/robots.txt` | Générés automatiquement à partir de `APP_URL`                  |
| `/admin`             | Administration, réservée aux comptes autorisés                          |

`/avocats` redirige vers `/a-propos#equipe` (ancienne URL conservée).

## Installation en local

Prérequis : PHP 8.2+ avec l'extension `intl`, Composer, Node.js 18+, MySQL (WAMP fait l'affaire).

```bash
git clone https://github.com/T-Mutshipay/CabinetNIC.git
cd CabinetNIC

composer install
npm install

cp .env.example .env
php artisan key:generate
```

Dans `.env`, renseigner la base de données :

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nic_db
DB_USERNAME=root
DB_PASSWORD=
```

Puis créer les tables avec les données de démonstration (avocats, collaborateurs, actualités) :

```bash
php artisan migrate --seed
```

Créer ensuite un compte pour l'administration. La commande demande un nom, un email et un mot de
passe :

```bash
php artisan make:filament-user
```

Lancer le site (deux terminaux) :

```bash
php artisan serve   # http://127.0.0.1:8000
npm run dev         # recompilation CSS/JS à chaud
```

L'administration s'ouvre sur <http://127.0.0.1:8000/admin>. Avec WAMP, `http://localhost` (sans le
port 8000) passe par Apache et renvoie « Not Found » : utiliser l'adresse de `php artisan serve`.

## Modifier le contenu

**La plupart des textes du site se trouvent dans [`config/cabinet.php`](config/cabinet.php)** :
nom, coordonnées, adresse, réseaux sociaux, services, domaines d'intervention, valeurs, atouts,
devise, images de la page d'accueil et nom du PDF des honoraires.

Le reste est en base de données et se gère depuis l'administration :

| Modèle          | Contenu                                                      | Dans `/admin`                                     |
| --------------- | ------------------------------------------------------------ | ------------------------------------------------- |
| `Avocat`        | Avocats (le premier est affiché comme fondateur)             | Cabinet > Avocats                                 |
| `SocialLink`    | Réseaux sociaux de chaque avocat                             | Sur la fiche de l'avocat                          |
| `Collaborateur` | Équipe de soutien                                            | Cabinet > Collaborateurs                          |
| `Actualite`     | Articles de la section Actualités                            | Blog > Actualités                                 |
| `Commentaire`   | Messages du formulaire de contact et commentaires d'articles | Cabinet > Contacts (messages seulement)           |
| `User`          | Comptes d'administration et visiteurs ayant écrit au cabinet | Administration > Utilisateurs (comptes seulement) |

### Administration

L'administration se trouve sur `/admin`. Il n'y a pas d'inscription publique : un compte se crée
avec `php artisan make:filament-user` ou depuis la section **Utilisateurs**. Seuls les comptes
qui ont un mot de passe peuvent se connecter ; les visiteurs qui écrivent au cabinet n'en ont pas.

| Section        | Ce qu'on peut y faire                                                             |
| -------------- | --------------------------------------------------------------------------------- |
| Avocats        | Ajouter, modifier ou supprimer une fiche, avec sa photo et ses réseaux sociaux    |
| Collaborateurs | Ajouter, modifier ou supprimer une fiche, avec sa photo                           |
| Actualités     | Rédiger, modifier ou supprimer un article, avec son image                         |
| Contacts       | Lire les messages, y répondre par email, les marquer comme traités, les supprimer |
| Utilisateurs   | Créer un compte, changer son mot de passe ou lui retirer l'accès                  |

- Le nombre affiché à côté de **Contacts** dans le menu est celui des messages à traiter.
- **Retirer l'accès** empêche la personne de se connecter et conserve ses commentaires. Un compte
  ne peut pas se retirer l'accès à lui-même.
- Les commentaires d'articles ne se modèrent pas ici, mais depuis les liens reçus par email (voir
  [Messages et modération](#messages-et-modération)).

### Images et articles

Les images envoyées depuis l'administration (JPEG, PNG ou WebP, 2 Mo maximum) sont enregistrées
dans `public/img/uploads`. Elles sont supprimées du disque quand on les remplace ou qu'on supprime
la fiche.

Pour un article :

- Le contenu est du texte brut : une ligne vide crée un nouveau paragraphe.
- L'image est recadrée au centre, en carré sur grand écran et en 16:10 sur tablette, sur mobile et
  dans les cartes : éviter les textes et les logos près des bords.
- Si le fichier est absent, ou si l'image est le fond uni `img/fond.jpg`, le site affiche un visuel
  bleu marine à la place.

### Messages et modération

Chaque message envoyé depuis le site est enregistré comme `Commentaire` et **envoyé par email**
à l'adresse du cabinet (`email` dans `config/cabinet.php`) :

- **Message de contact** (accueil, sans `actualite_id`) : jamais affiché sur le site, consultable
  dans la section **Contacts** de l'administration. « Répondre » dans la messagerie répond
  directement au visiteur.
- **Commentaire d'article** : masqué jusqu'à validation. L'email contient deux liens signés,
  **Publier** et **Supprimer**, valables 30 jours ; ils ouvrent une page de confirmation avant
  toute action. Aucun compte n'est nécessaire, et un lien modifié est refusé (403).

En local, `MAIL_MAILER=log` écrit les emails dans `storage/logs/laravel.log`. En production, il
faut configurer un vrai serveur d'envoi dans le `.env`, sinon le cabinet ne reçoit rien :

```dotenv
MAIL_MAILER=smtp
MAIL_HOST=...           # fourni par l'hébergeur ou le service d'envoi
MAIL_PORT=587
MAIL_USERNAME=...
MAIL_PASSWORD=...
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="no-reply@cabinetnic-et-associes.com"
MAIL_FROM_NAME="N.I.C & Associés"
```

Le PDF des honoraires est `public/Honoraire.pdf` (attention à la majuscule : le serveur de
production est sensible à la casse).

## Organisation du code

```
app/Filament/Resources/             Sections de l'administration (formulaires, tableaux, pages)
app/Filament/Components/            Champ image commun aux fiches
app/Providers/Filament/             Configuration du panneau /admin
config/cabinet.php                  Données éditables du cabinet
routes/web.php                      Routes publiques (pages, formulaire, sitemap, robots)
resources/views/
├── components/layouts/app.blade.php  Layout : en-tête, pied de page, balises SEO
├── components/                       Composants réutilisables (cartes, formulaire, en-têtes de section)
├── welcome.blade.php                 Accueil
├── a-propos.blade.php
├── actualites.blade.php
└── articles.blade.php                Détail d'un article
resources/js/animations.js          Apparition au défilement, compteurs, en-tête
resources/css/app.css               Styles globaux et animations
tailwind.config.js                  Couleurs, typographies et espacements du design system
tests/Feature/                      Tests de l'administration et de la page article
```

### Animations

Ajoutées par attributs dans les vues, sans écrire de JavaScript :

| Attribut / classe       | Effet                                                       |
| ----------------------- | ----------------------------------------------------------- |
| `data-reveal`           | L'élément apparaît en fondu quand il entre à l'écran        |
| `data-reveal-stagger`   | Sur une grille : les enfants apparaissent l'un après l'autre |
| `data-count="12"`       | Le nombre défile de 0 à 12 quand il devient visible         |
| `carte-survol`          | La carte s'élève légèrement au survol                       |
| `fleche` (dans un `.group`) | L'icône avance au survol du lien                        |

Les animations sont désactivées si le visiteur a choisi « réduire les animations » dans son
système, et le contenu reste visible si le JavaScript ne se charge pas.

### Icônes

Les icônes Material Symbols sont chargées **à la demande** (seulement celles utilisées, ~12 Ko
au lieu de 4 Mo). Celles déclarées dans `config/cabinet.php` sont prises en compte
automatiquement ; une icône écrite directement dans une vue doit être ajoutée à la liste
`$icones` en haut du layout, sinon elle ne s'affiche pas.

## Tests

```bash
php vendor/bin/phpunit
```

Les tests utilisent une base SQLite en mémoire et ne touchent pas à `nic_db`. Ils affichent de
vraies pages : `npm run dev` doit être lancé, ou `npm run build` avoir été exécuté une fois.

## Mise en production

```bash
composer install --no-dev --optimize-autoloader
npm ci && npm run build
php artisan migrate --force
php artisan config:cache && php artisan route:cache && php artisan view:cache
```

Au premier déploiement, créer le compte d'administration avec `php artisan make:filament-user`.

Variables indispensables dans le `.env` du serveur :

```dotenv
APP_ENV=production
APP_DEBUG=false
APP_URL=https://www.cabinetnic-et-associes.com
APP_LOCALE=fr
```

- `APP_ENV=production` est nécessaire pour que Google indexe le site : dans tout autre
  environnement, les pages portent une balise `noindex` et `robots.txt` bloque les robots.
- `APP_URL` sert à construire les adresses canoniques, les aperçus de partage et le sitemap.
- `public/build` n'est pas versionné : il faut lancer `npm run build` sur le serveur (ou y
  envoyer le dossier généré en local).
- Les fichiers JS, CSS et polices de Filament sont versionnés dans `public/` ; `composer install`
  les remet à jour tout seul.
- `public/img/uploads` n'est pas versionné : le serveur web doit pouvoir y écrire, et ce dossier
  doit être inclus dans les sauvegardes et conservé à chaque déploiement.
- S'il existe un ancien fichier `public/robots.txt` sur le serveur, le supprimer : il
  remplacerait celui généré par l'application.

Après la mise en ligne : soumettre `https://www.cabinetnic-et-associes.com/sitemap.xml` dans
Google Search Console.

## Workflow Git

- Travailler sur une branche (`feature/...`), jamais directement sur `main`.
- Ouvrir une Pull Request vers `main` sur GitHub, puis fusionner après relecture.
- Ne jamais versionner le fichier `.env` (il contient les mots de passe).
