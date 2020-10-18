<?php declare(strict_types=1);

namespace SiliconSoldier\DB;

use SiliconSoldier\DB\Record;
use SiliconSoldier\DB\WhereClause;
use SiliconSoldier\DB\NotImplementedException;

/**
 * Builds an update query, with support for more complex functionality such as batching.
 */
class UpdateBuilder
{
    /**
     * Filter update range.
     */
    public function where() : WhereClause
    {
        throw new NotImplementedException();
    }

    /**
     * Update provided record with provided values.
     */
    public function record(Record $record, array $changes) : void
    {
        throw new NotImplementedException();
    }

    /**
     * Update current range (everything if no filter specified) with provided values.
     */
    public function set(array $changes) : void
    {
        throw new NotImplementedException();
    }
}
