<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Throwable;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     * @throws Throwable
     */

    public function test_login_fail()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(config('unit_test_admin.path_visit'))
                ->type('email', 'admin@admin2.com')
                ->type('password', 'password1')
                ->click('.btn-login')
                ->assertPathIs(config('unit_test_admin.path_fail'));
        });
    }

    public function test_login_success()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(config('unit_test_admin.path_visit'))
                ->type('email', 'admin@admin.com')
                ->type('password', 'password')
                ->click('.btn-login')
                ->assertPathIs(config('unit_test_admin.path_success'));
        });
    }
}
