<?php declare(strict_types=1);

namespace PHP\ORM;

use PHP\ORM\Record;

/**
 * @template T of Record
 */
abstract class Query
{
    /**
     * @return Query<T>
     */
    public function where(
        string $attribute,
        string $operator,
        bool|int|float|null|string $value,
    ) : self {

    }
}
