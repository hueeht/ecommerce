<?php


namespace App\Repositories\Client;


interface ProfileRepositoryInterface
{
    public function update();
    public function find($id);
}