<?php

namespace Tests\Unit\Models;

use App\Models\Memory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\TestCase;

class MemoryTest extends TestCase
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
        $memory = new Memory();
        $this->assertEquals([
            'name',
        ], $memory->getFillable());
    }

    public function test_product_relation()
    {
        $memory = new Memory();
        $relation = $memory->products();
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('memory_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getLocalKeyName());
    }

    public function test_table_name()
    {
        $memory = new Memory();
        $this->assertEquals('memories', $memory->getTable());
    }
}
