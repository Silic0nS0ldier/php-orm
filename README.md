# Silicon Soldier DB

> This is a work in progress.

This project aims to make a database interaction layer which is consistent, logical, and is easier to validate in a static fashion with tools like PHPStan.

A common trend with these kinds of abstractions is to integrate business logic directly into record models, **don't**. While it can be done with this, doing so is a code smell and increases coupling with the database implementation. A nasty issue that tends to crop up when having a high degree of integration throughout a codebase is that bugs (and data corruptions) are more common. Instead build your own abstractions that wrap around the database interaction layer.

## Features

* Start of every database interaction states intent (e.g. `query`, `create`, `update` and `delete`).
* Immutable data structures to reduce risk of state related corruptions.
* Guarantee that all record instances are accurate within the scope of the current database transaction.
* Support for multi-database scenarios.
* Raw SQL unsupported to reduce risk in inadvertent SQL injection vulnerabilities.
* Automatic serialisation and deserialisation.

## Notes

* PHPStan generic comment syntax is used. https://phpstan.org/blog/generics-in-php-using-phpdocs Would be nice to there was a standard syntax, would offer some hope of better tooling support.
* PHP native type information is leaned on to reduce verbosity of code.
* `Record` abstract class provides basis for data modelling, a query builder will build off this for each of use.
* PHP 8 attributes are used to convey additional information about records, including things like primary key (and composite key), collections, and JSOn serialisation.
* Target for MVP is an SQL-like database (probably MySQL/MariaDB), intent is to keep interactions basic for the MVP so that scope can be properly reviewed later on (and to avoid killing the project early with excessive complexity).

* How can we maintain data integrity? A commit lets us either do all or none of the changes, but what about the data we have already read? Once we commit, it cannot be trusted. Feels like the only "safe" approach is to switch impacted record instances into "stale" mode and disallow usage from then on. That however would lead to complications unless some thought is put into the overall design. Perhaps a PHPCS rule could help?

```php
// Common functions used to enable on-the-spot configuration overrides
use SiliconSoldier\DB\Record;
use SiliconSoldier\DB\Record\Column;
use SiliconSoldier\DB\Record\PrimaryKey;
/**
 * @property-read int $id
 * @property-read string $firstName
 * @property-read string $surname
 */
class User extends Record
{
    protected static string $tableName = 'users';

    // TODO Figure out API surface, is this a string or reference to a class?
    protected static $defaultConnection;

    #[Column]
    #[Identifier]
    protected int $id;

    #[Column('first_name')]
    protected string $firstName;

    #[Column]
    protected string $surname;
}

// Record-first, records as source of truth and immutable where possible
User::query()
    // __callStatic returns valid input for column, or throws if not found
    // What about type info? Can we infer static method definitions from defined props for PHPStan?
    // @method static SomeClass firstName() but inferred
    // Could work around with an extension, would be nice to use __getStatic if it becomes available
    ->where(User::firstName())->equal('Bill')
    ->get(); // User[]
User::query()
    ->where(User::firstName())->equal('Bill')
    ->select([
        'firstName' => User::firstName(),
        'surname' => User::surname(),
    ]); // stdClass{ firstName: string, surname: string }[]
// Insert, retrieves id as appropriate
// Same pattern as query() to keep things consistent
User::create()
    ->with([
        // Technically invalid if keys aren't primitives once computed
        // __toString() plus some extra logic should handle this however
        User::firstName() => 'Bill',
        User::surname() => 'Badger',
    ]); // User, will need some special handling for complex compound keys
// Batch insert
User::create()
    // User[], and any PHP iterable (including generator functions/classes) that provides User
    // instances in their unsaved form. Can absolutely perform its own queries (recursion could
    // however occur).
    ->withIterable($userIterable); // User, will need some special handling for complex compound keys
                                   // This can work because (for MySQL at least) keys are consistent
                                   // at a connection level irrespective of transaction activity and
                                   // interactions from other clients.
User::create()
    // Not in MVP, should probably support transformation logic somehow
    ->withQuery(OldUsers::query()); // void, we have no reliable way to get keys
// Update, builds off batch update
User::update()
    ->record($user, [ User::firstName() => 'Jill' ]); // void
// Batch update
User::update()
    ->where(User::id())->equal(22)
    // Pairs get validated before query generation
    ->set([ User::firstName() => 'Jill' ]); // void
// Delete
User::delete()
    ->record($user); // void
// Delete batch
User::delete()
    ->where(User::id())->equal(22)
    ->do(); // void, a little inconsistent compared to previous examples
```
