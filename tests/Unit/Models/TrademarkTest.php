<?php

namespace Tests\Unit\Models;

use App\Models\Trademark;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\TestCase;

class TrademarkTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    public function test_contains_valid_fillable_properties()
    {
        $trademark = new Trademark();
        $this->assertEquals([
            'name',
        ], $trademark->getFillable());
    }

    public function test_product_relation()
    {
        $trademark = new Trademark();
        $relation = $trademark->products();
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('trademark_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getLocalKeyName());
    }

    public function test_table_name()
    {
        $trademark = new Trademark();
        $this->assertEquals('trademarks', $trademark->getTable());
    }
}
