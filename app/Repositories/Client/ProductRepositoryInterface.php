<?php

namespace App\Repositories\Client;

interface ProductRepositoryInterface
{
    public function find($id);
    public function new();
    public function hot();
    public function recent();
    public function checkAuth();
}
