<?php

namespace Tests\Unit\Models;

use App\Models\Image;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tests\TestCase;

class ImageTest extends TestCase
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
        $image = new Image();
        $this->assertEquals([
            'image',
            'product_id',
        ],$image->getFillable());
    }

    public function test_product_relation()
    {
        $image = new Image();
        $relation = $image->product();
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('product_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getOwnerKeyName());
    }

    public function test_table_name()
    {
        $image = new Image();
        $this->assertEquals('images', $image->getTable());
    }
}
