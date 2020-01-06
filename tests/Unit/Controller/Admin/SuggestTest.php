<?php

namespace Tests\Unit\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SuggestController;
use App\Models\Suggest;
use App\Repositories\Suggest\SuggestRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Collection;
use phpDocumentor\Reflection\Types\Integer;
use Tests\TestCase;
use Mockery as m;

class SuggestTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    protected $suggestMock;

    public function setUp(): void
    {
        $this->suggestMock = m::mock(SuggestRepositoryInterface::class . '[getAll]');
        parent::setUp();
    }

    protected function tearDown(): void
    {
        m::close();
        try {
            parent::tearDown();
        } catch (\Throwable $e) {
        }
    }

    public function test_index_function()
    {
        $this->suggestMock->shouldReceive('getAll')->once()->andReturn(new Suggest());
        $suggestController = new SuggestController($this->suggestMock);
        $view = $suggestController->index();
        $this->assertEquals('admin.suggests.index', $view->getName());
        $this->assertArrayHasKey('suggests', $view->getData());
    }

    public function test_index_null_function()
    {
        $this->suggestMock->shouldReceive('getAll')->once()->andReturn(false);
        $suggestController = new SuggestController($this->suggestMock);
        $view = $suggestController->index();
        $this->assertEquals('admin.suggests.index', $view->getName());
        $this->assertArrayHasKey('suggests', $view->getData());
    }
}
