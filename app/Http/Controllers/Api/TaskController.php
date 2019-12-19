<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\TaskResource;
use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TaskResource::collection(auth()->user()->tasks()->with('user')->latest()->paginate(4));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return TaskResource
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255'
        ]);
        $input = $request->all();
        if($request->has('due')){
            $input['due'] = Carbon::parse($request->due)->toDateTimeString();
        }

        $task = auth()->user()->tasks()->create($input);
        return new TaskResource($task->load('user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return new TaskResource($task->load('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|max:255'
        ]);
        $input = $request->all();
        if($request->has('due')){
            $input['due'] = Carbon::parse($request->due)->toDateTimeString();
        }
        $task->update($input);
        return new TaskResource($task->load('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return response(['message' => 'task deleted']);
    }
}
