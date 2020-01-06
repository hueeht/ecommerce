<?php

namespace Tests\Browser\Client;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class HomeTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_home_and_click_to_category_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee(trans('shop.title'))
                ->click('.level-a')
                ->assertPathIs(config('test_view.link'))
                ->assertSee(config('test_view.see'));
        });
    }
}
