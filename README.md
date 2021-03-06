# Asylum Journey

Symfony API and admin backend for the Asylum Journey project.

The admin backend uses the Sonata admin bundle.

The API is JSON using HAL for HATEOS type stuff.

## API Documentation

API documentation can be found at http://docs.asylumjourney.apiary.io/#

### Editing the API Documentation

Changes to the API should be updated in the `apiary.apib` file. The editor at https://app.apiary.io/asylumjourney/editor
can be used to edit it. Apiary has not been connected to Github so the file will need to be manually copied into the editor
and copied back (or the integration between Github and Apiary set up)

### Testing the API Documentation

Dredd (https://github.com/apiaryio/dredd) can be used to test that the API matches the documentation.
This needs to be installed with npm:

```
npm install
```

and then run with

```
./node_modules/.bin/dredd
```

It runs the `AppBundle\Command\FixturesCommand` to set up the test data, so any additional data can be added there.

## Getting Started

Needs composer for package management, see installation instructions at https://getcomposer.org/doc/00-intro.md

There is no developer environment (e.g. Vagrant) at the moment, requires PHP 5.6+ and Mysql. There's half-hearted `Dockerfile` which sort-of works to get the right PHP version - but you're on your own for the database.

```sh
docker build -t asylumjourney .
docker run -it -p 8000:8000 -v $(pwd):/srv/asylumjourney asylumjourney
```

The Mysql username, password and database can be set in the `app/config/parameters.yml` file
(this file is not kept in version control so local parameters can be
 safely added to it)

```
git clone https://github.com/Sheffugees/asylumjourney

php composer.phar install

php app/console doctrine:schema:create

php app/console fos:user:create --super-admin
```

The JWT based authentication requires keys generating for encryption purposes.

This can be doe by running the following from the project root:

```
mkdir -p var/jwt 
openssl genrsa -out var/jwt/private.pem -aes256 4096
openssl rsa -pubout -in var/jwt/private.pem -out var/jwt/public.pem
```

If you set a passphrase then this need to be updates in `app/config/parameters.yml`:

```
    jwt_key_pass_phrase: "the pass phrase"
```

## Running locally

```
php app/console server:run
```

Admin section can be found at `/admin`, log in with the details provided when running `fos:user:create`

## Trello Import

Data can be imported from the Trello CSV export. This is intended for switching over from using Trello
to enter data to using the admin panel rather than as an ongoing process. **The import deletes the existing
data.**

The CSV export needs to be in the root directory, named `trello.csv` and have the header line removed.
Then run:

```
php app/console app:csv-import
```

## Heroku

Deploying code to Heroku can be done by pushing to the relevant git repo.
The one of job of importing data from Trello is probably best done by doing it locally
and using mysqldump and importing that on Heroku. **This will also replace any user for the admin
section with the local ones**

## Task list

https://trello.com/b/HCxgrmFQ/asylum-journey-task-list

