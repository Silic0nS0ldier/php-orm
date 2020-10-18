<?php declare(strict_types=1);

namespace SiliconSoldier\DB\Record;

use Attribute;

/**
 * Adds column meta data that cannot be inferred using native PHP constructs (or isn't close enough).
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
class Column
{
    public function __construct(
        public ?string $name = null
    ) {}
}
