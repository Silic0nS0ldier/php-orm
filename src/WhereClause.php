<?php declare(strict_types=1);

namespace SiliconSoldier\DB;

/**
 * Represents an SQL where clause.
 * @template T
 */
class WhereClause
{
    /**
     * Compare a column to a value or another column.
     * @return T
     */
    public function equal(mixed $value)
    {
        throw new NotImplementedException();
    }
}
