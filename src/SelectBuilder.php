<?php declare(strict_types=1);

namespace SiliconSoldier\DB;

use SiliconSoldier\DB\WhereClause;
use SiliconSoldier\DB\NotImplementedException;

/**
 * Builds a select query.
 */
class SelectBuilder
{
    /**
     * Filter query with an SQL where clause.
     */
    public function where() : WhereClause
    {
        throw new NotImplementedException();
    }

    /**
     * Executes query with the specified fields returned.
     */
    public function select(array $columns) : array
    {
        throw new NotImplementedException();
    }

    /**
     * Executes query with Record instances returned.
     */
    public function get() : array
    {
        throw new NotImplementedException();
    }
}
