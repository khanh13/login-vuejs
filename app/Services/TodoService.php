<?php

namespace App\Services;

use App\Repositories\Todo\TodoRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class TodoService
{
    protected $todoRepository;

    public function __construct(TodoRepositoryInterface $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    public function createTodo(array $data)
    {
        $userId = Auth::user()->id;

        $newData = [
            'user_id' => $userId,
            'name' => $data['name'],
            'description' => $data['description'],
            'completed' => false
        ];

        return $this->todoRepository->createTodo($newData);
    }
}
