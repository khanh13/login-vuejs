<?php

namespace App\Repositories\Todo;

use App\Repositories\Todo\TodoRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Models\Todo;

class TodoRepository implements TodoRepositoryInterface
{
    public function createTodo(array $newData)
    {
        try {
            $newTodo = new Todo();
            $newTodo->fill($newData);
            $newTodo->save();

            return $newTodo;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
