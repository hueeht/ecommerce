<?php

namespace Tests\Unit\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\TestCase;

class ProductTest extends TestCase
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
        $product = new Product();
        $this->assertEquals([
            'name',
            'quantity',
            'price',
            'price_sale',
            'description',
            'category_id',
            'trademark_id',
            'memory_id',
        ], $product->getFillable());
    }

    public function test_memory_relation()
    {
        $product = new Product();
        $relation = $product->memory();
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('memory_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getOwnerKeyName());
    }

    public function test_image_relation()
    {
        $product = new Product();
        $relation = $product->images();
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('product_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getLocalKeyName());
    }

    public function test_order_detail_relation()
    {
        $product = new Product();
        $relation = $product->orderDetails();
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('product_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getLocalKeyName());
    }

    public function test_trademark_relation()
    {
        $product = new Product();
        $relation = $product->trademark();
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('trademark_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getOwnerKeyName());
    }

    public function test_category_relation()
    {
        $product = new Product();
        $relation = $product->category();
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('category_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getOwnerKeyName());
    }

    public function test_rate_relation()
    {
        $product = new Product();
        $relation = $product->rates();
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('product_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getLocalKeyName());
    }

    public function test_user_relation()
    {
        $product = new Product();
        $relation = $product->users();
        $this->assertInstanceOf(BelongsToMany::class, $relation);
        $this->assertEquals('product_user.product_id', $relation->getQualifiedForeignPivotKeyName());
        $this->assertEquals('product_user.user_id', $relation->getQualifiedRelatedPivotKeyName());
    }

    public function test_table_name()
    {
        $product = new Product();
        $this->assertEquals('products', $product->getTable());
    }
}
