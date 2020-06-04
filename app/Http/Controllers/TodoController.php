<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todo = Todo::paginate();
        return response()->json($todo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TodoRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoRequest $request)
    {
        $todoData = $request->validated();
        $todo = Todo::create($todoData);

        return response()->json($todo, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return response()->json($todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TodoRequest  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(TodoRequest $request, Todo $todo)
    {
        $todoData = $request->validated();
        $todo = tap($todo)->update($todoData);

        return response()->json($todo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        //
    }
}
