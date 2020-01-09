<?php

namespace App\Repositories\Client;

interface ProductRepositoryInterface
{
    public function find($id);
    public function show();
    public function recent();
    public function checkAuth();
}
