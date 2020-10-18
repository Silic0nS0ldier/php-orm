<?php declare(strict_types=1);

namespace SiliconSoldier\DB\Record;

use Attribute;

/**
 * Indicates property serves as the primary key (or part of a composite key).
 */
@@Attribute(Attribute::TARGET_PROPERTY)
class Identifier
{
    public function __construct(
        public int $position = 0
    ) {}
}
