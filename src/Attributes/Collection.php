<?php declare(strict_types=1);

namespace PHP\ORM\Attributes;

/**
 * Defines a model property as being a collection of the specified type.
 */
@@Attribute(Attribute::TARGET_PROPERTY)
class Collection
{
    public function __construct(
        public string $type
    ) {}
}
