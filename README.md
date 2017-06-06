# Symfony training at Mall-Connect #1

> _Sport calendar_ is a web application, which helps athletes to track their progress at the gym.
When athlete finishes an exercise, he came to the application to save the information. 
For example, he writes that he did leg press 8 times with weight 100kg. 
This data together with a timestamp is saved to database.
>
>Then, on a dashboard athlete sees:
>* what he did today,
>* what he did a week ago (on the same weekday),
>* what he did 2 weeks ago
>
>In current task we will create only dashboard. There will be fixtures that add data for testing purpose, so we do not need any form to add exercises.


### Task 1 // Create data model and fill it with fake data.


There is only one entity - **Exercise**. 

Fields are:

* short description of done exercise
* weight,
* number of repetitions,
* date
* time

#### Tip

Fill the data model with fake data for testing. 
Use Nelmio Alice bundle to create following the fixtures: 

* 3 types of exercises (short descriptions) 
* Weight is random between 20 and 200kg. 
* Repetitions are random between 5-15. 
* Total amount of exercises done in last 30 days should be about 300-400.


### Task 2 // Implement Front-end


Dashboard should be very simple – just some title and table with 3 columns, one for each date.
If this project is success, it will require a mobile application with the same dashboard. So, all data should be fetched via service layer, to be reused later.

#### Tip

Try to implement this functionality without writing custom query
It’s expected to have only one DB request for the whole page



### Task 3 // Write Unit test

Service class should have one public method to fetch all data needed for dashboard. 
This method should be covered with Unit test – all external calls from the service are replaced by mocks and service class is only one real object in the test, created via “new” operator.


### Task 4 // Add multi-lingual support of user interface

Translate user interface into 2 languages: Russian and English.
Locale should be defined by part of requested URL. For example, /en/calendar – is English dashboard, /ru/calendar – is Russian one.

#### Tip
Do not translate data, only interface.


## Installation
``` bash
# composer install

# php bin/console doctrine:database:create

# php bin/console doctrine:schema:update --force

# php bin/console server:run
```

## Create Fixtures

``` bash
 php bin/console doctrine:fixtures:load
```


## Tests

``` bash
 vendor/bin/phpunit
```

### Resources

* [Symfony Documentation - Entity](https://symfony.com/doc/current/bundles/SensioGeneratorBundle/commands/generate_doctrine_entity.html)
* [Symfony Documentation - DoctrineFixturesBundle](https://symfony.com/doc/current/bundles/DoctrineFixturesBundle/index.html)
* [Alice - Expressive fixtures generator](https://github.com/nelmio/alice/tree/2.x)
* [How to create a php service for symfony 2 & 3 with entity manager and service container](http://ourcodeworld.com/articles/read/42/how-to-create-a-php-service-for-symfony-2-3-with-entity-manager-and-service-container)
* [Multilingual website with Symfony](http://phpbeginnertoadvanced.blogspot.nl/2016/09/multilingual-website-with-symfony.html)
* [JMSI18nRoutingBundle](http://jmsyst.com/bundles/JMSI18nRoutingBundle/master/configuration)
* [Template from Nikhil Krishnan](https://codepen.io/nikhil8krishnan/pen/WvYPvv)
* but specially [my lovely husband](https://github.com/rodrigonbarreto)