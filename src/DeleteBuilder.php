<?php declare(strict_types=1);

namespace SiliconSoldier\DB;

use SiliconSoldier\DB\Record;
use SiliconSoldier\DB\WhereClause;

class DeleteBuilder
{
    /**
     * Filter delete range.
     */
    public function where() : WhereClause
    {
        throw new NotImplementedException();
    }

    /**
     * Deletes the specified record.
     */
    public function record(Record $record) : void
    {
        throw new NotImplementedException();
    }

    /**
     * Delete current range (everything if no filter specified).
     */
    public function do() : void
    {
        throw new NotImplementedException();
    }
}
