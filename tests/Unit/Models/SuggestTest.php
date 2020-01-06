<?php

namespace Tests\Unit\Models;

use App\Models\Suggest;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tests\TestCase;

class SuggestTest extends TestCase
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
        $suggest = new Suggest();
        $this->assertEquals([
            'name',
            'description',
            'price',
            'user_id',
            'status',
        ], $suggest->getFillable());
    }

    public function test_user_relation()
    {
        $suggest = new Suggest();
        $relation = $suggest->user();
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('user_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getOwnerKeyName());
    }

    public function test_table_name()
    {
        $suggest = new Suggest();
        $this->assertEquals('suggests', $suggest->getTable());
    }
}
