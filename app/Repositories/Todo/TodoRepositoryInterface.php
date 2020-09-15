<?php

namespace App\Repositories\Todo;

interface TodoRepositoryInterface
{
    public function createTodo(array $newData);
}
