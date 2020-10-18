<?php declare(strict_types=1);

namespace SiliconSoldier\DB;

use SiliconSoldier\DB\CreateBuilder;
use SiliconSoldier\DB\SelectBuilder;
use SiliconSoldier\DB\UpdateBuilder;
use SiliconSoldier\DB\DeleteBuilder;
use SiliconSoldier\DB\NotImplementedException;

/**
 * An immutable representation of a table row.
 */
abstract class Record
{
    /**
     * Name of this record projects.
     */
    protected static abstract $tableName;

    /**
     * The default connection used by the record for database interactions.
     * Used when another connection is not explicitly specified.
     * @todo Figure out API surface, is this a string or something more complex?
     */
    protected static abstract $defaultConnection;

    /**
     * Find something in a database.
     */
    public static function query() : SelectBuilder
    {
        throw new NotImplementedException();
    }

    /**
     * Add something new to a database.
     */
    public static function create() : CreateBuilder
    {
        throw new NotImplementedException();
    }

    /**
     * Update something in a database.
     */
    public static function update() : UpdateBuilder
    {
        throw new NotImplementedException();
    }

    /**
     * Remove something from a database.
     */
    public static function delete() : DeleteBuilder
    {
        throw new NotImplementedException();
    }

    /**
     * Handles retrieval of column references.
     */
    public static function __callStatic(string $method, array $arguments)
    {
        throw new NotImplementedException();
    }
}
