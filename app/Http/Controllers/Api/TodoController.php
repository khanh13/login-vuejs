<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Todo\StoreTodoRequest;
use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Gate;
use SebastianBergmann\Environment\Console;
use App\Services\TodoService;

class TodoController extends Controller
{
    protected $todoService;

    public function __construct(TodoService $todoService) {
        $this->todoService = $todoService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todo = Todo::all();
        return response()->json($todo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTodoRequest $request)
    {
        $newTodo = $this->todoService->createTodo($request->all());

        return response()->json([
            'data' => [
                'status' => true,
                'message' => 'Created a new Todo',
                'data' => $newTodo 
            ]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = Todo::find($id);
        return response()->json($todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $todo = Todo::findOrFail($id);
        // $todo->update($request->all());

        // return $todo;

        $data = array();
        $data['name'] = $request->name;
        $data['description'] = $request->description;

        $todo = Todo::find($id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('delete-todo')) {
            $todo = Todo::find($id);
            $todo->delete();
            return response()->json([
                'status' => 'success'
            ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'You need authorize to delete!'
        ]);
    }
}
