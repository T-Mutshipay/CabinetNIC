# N.I.C & Associés — Site du cabinet

Site vitrine du cabinet d'avocats **N.I.C & Associés** (Barreau de Kinshasa / Gombe) :
présentation du cabinet et de son équipe, actualités juridiques, grille des honoraires et
formulaire de contact.

En ligne : <https://www.cabinetnic-et-associes.com>

## Stack

| Couche     | Outils                                                                 |
| ---------- | ---------------------------------------------------------------------- |
| Back-end   | PHP 8.2+, Laravel 12, MySQL                                            |
| Front-end  | Blade, Tailwind CSS 3, Vite, Flowbite (menu mobile)                    |
| Typographie | Inter et Playfair Display (auto-hébergées), Material Symbols (Google Fonts) |
| Design     | Template « Sovereign Juris » conçu sur Google Stitch                   |

## Pages

| URL                  | Contenu                                                                 |
| -------------------- | ----------------------------------------------------------------------- |
| `/`                  | Accueil : présentation, domaines, services, dernières actualités, contact |
| `/a-propos`          | Histoire, valeurs, équipe d'avocats et équipe de soutien                |
| `/domaines-d-intervention` | Les 12 domaines d'intervention et la méthode de travail du cabinet |
| `/actualites`        | Liste des actualités avec recherche                                     |
| `/articles/{id}`     | Article, commentaires validés et formulaire de commentaire              |
| `/honoraires`        | Ouvre le PDF de la grille des honoraires                                |
| `/sitemap.xml`, `/robots.txt` | Générés automatiquement à partir de `APP_URL`                  |

`/avocats` redirige vers `/a-propos#equipe` (ancienne URL conservée).

## Installation en local

Prérequis : PHP 8.2+, Composer, Node.js 18+, MySQL (WAMP fait l'affaire).

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

Lancer le site (deux terminaux) :

```bash
php artisan serve   # http://127.0.0.1:8000
npm run dev         # recompilation CSS/JS à chaud
```

## Modifier le contenu

**La plupart des textes du site se trouvent dans [`config/cabinet.php`](config/cabinet.php)** :
nom, coordonnées, adresse, réseaux sociaux, services, domaines d'intervention, valeurs, atouts,
devise, images de la page d'accueil et nom du PDF des honoraires.

Le reste est en base de données :

| Modèle          | Contenu                                         |
| --------------- | ----------------------------------------------- |
| `Avocat`        | Avocats (le premier est affiché comme fondateur) |
| `SocialLink`    | Réseaux sociaux de chaque avocat                |
| `Collaborateur` | Équipe de soutien                               |
| `Actualite`     | Articles de la section Actualités               |
| `Commentaire`   | Messages du formulaire de contact et commentaires d'articles |

### Messages et modération

Chaque message envoyé depuis le site est enregistré comme `Commentaire` et **envoyé par email**
à l'adresse du cabinet (`email` dans `config/cabinet.php`) :

- **Message de contact** (accueil, sans `actualite_id`) : jamais affiché sur le site. « Répondre »
  dans la messagerie répond directement au visiteur.
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
config/cabinet.php                  Données éditables du cabinet
routes/web.php                      Toutes les routes (pages, formulaire, sitemap, robots)
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

## Mise en production

```bash
composer install --no-dev --optimize-autoloader
npm ci && npm run build
php artisan migrate --force
php artisan config:cache && php artisan route:cache && php artisan view:cache
```

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
- S'il existe un ancien fichier `public/robots.txt` sur le serveur, le supprimer : il
  remplacerait celui généré par l'application.

Après la mise en ligne : soumettre `https://www.cabinetnic-et-associes.com/sitemap.xml` dans
Google Search Console.

## Workflow Git

- Travailler sur une branche (`feature/...`), jamais directement sur `main`.
- Ouvrir une Pull Request vers `main` sur GitHub, puis fusionner après relecture.
- Ne jamais versionner le fichier `.env` (il contient les mots de passe).
