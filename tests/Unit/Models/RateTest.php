<?php

namespace Tests\Unit\Models;

use App\Models\Rate;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tests\TestCase;

class RateTest extends TestCase
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
        $rate = new Rate();
        $this->assertEquals([
            'product_id',
            'user_id',
            'rating',
        ], $rate->getFillable());
    }

    public function test_product_relation()
    {
        $rate = new Rate();
        $relation = $rate->product();
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('product_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getOwnerKeyName());
    }

    public function test_table_name()
    {
        $rate = new Rate();
        $this->assertEquals('rates', $rate->getTable());
    }
}
