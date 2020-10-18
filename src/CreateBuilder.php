<?php declare(strict_types=1);

namespace SiliconSoldier\DB;

use SiliconSoldier\DB\SelectBuilder;

class CreateBuilder
{
    /**
     * Creates new record with provided data, and its accompanying row in the database.
     */
    public function with(array $data)
    {
        throw new NotImplementedException();
    }

    public function withIterable() : array
    {
        throw new NotImplementedException();
    }

    public function withQuery(SelectBuilder $query) : array
    {
        throw new NotImplementedException();
    }
}
