<?php declare(strict_types=1);

namespace SiliconSoldier\DBTest\Record;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Assert;
use SiliconSoldier\DB\Record\Column;
use ReflectionClass;

class ColumnTest extends TestCase
{
    #[Column('dummyName')]
    protected $dummyProperty = 'dummyValue';

    public function testAttribute()
    {
        $reflectionClass = new ReflectionClass(self::class);
        $testProperty = $reflectionClass->getProperty('dummyProperty');
        $attributes = $testProperty->getAttributes(Column::class);
        $attribute = $attributes[0]->newInstance();
        Assert::assertInstanceOf(Column::class, $attribute);
        Assert::assertSame('dummyName', $attribute->name);
    }
}
