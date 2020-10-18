<?php declare(strict_types=1);

namespace SiliconSoldier\DB\Connection;

use SiliconSoldier\DB\Connection\Query;

/**
 * Debug class responsible to persisting details useful for debugging scenarios.
 * Not for use in production.
 */
class Debug
{
    /**
     * @return Query[]
     */
    public function getQueries() : array
    {

    }
}
