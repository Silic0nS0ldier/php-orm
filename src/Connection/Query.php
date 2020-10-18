<?php declare(strict_types=1);

namespace SiliconSoldier\DB\Connection;

/**
 * Data transfer object housing the query string and accompanying bound values (if any).
 */
class Query
{
    public string $query;

    /**
     * @var array<string, mixed>
     */
    public array $values;
}
