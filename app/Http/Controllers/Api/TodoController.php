<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Gate;
use SebastianBergmann\Environment\Console;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
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
    public function store(Request $request)
    {
        // return Task::create($request->all());
        $validateData = $request->validate([
            'name' => 'required|unique:todos|max:255',
            'description' => 'required|max:255'
        ]);

        $todo = new Todo;
        $todo->name = $request->name;
        $todo->description = $request->description;

        $todo->save();
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
