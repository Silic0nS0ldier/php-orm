# PHP ORM

## Notes

* PHPStan generic comment syntax is used. https://phpstan.org/blog/generics-in-php-using-phpdocs Would be nice to there was a standard syntax, would offer some hope of better tooling support.
* PHP native type information is leaned on to reduce verbosity of code.
* `Record` abstract class provides basis for data modelling, a query builder will build off this for each of use.
* PHP 8 attributes are used to convey additional information about records, including things like primary key (and composite key), collections, and JSOn serialisation.
* Target for MVP is an SQL-like database (probably MySQL/MariaDB), intent is to keep interactions basic for the MVP so that scope can be properly reviewed later on (and to avoid killing the project early with excessive complexity).
