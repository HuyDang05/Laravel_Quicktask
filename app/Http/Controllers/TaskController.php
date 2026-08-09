<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = DB::table('tasks')
        ->join('users', 'tasks.user_id', '=', 'users.id')
        ->select('tasks.*', 'users.full_name as user_name')
        ->get();

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = DB::table('users')->select('id', 'full_name')->get();

        return view('tasks.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        DB::table('tasks')->insert([
        'user_id' => $request->user_id,
        'title' => $request->title,
        'description' => $request->description,
        'is_done' => $request->boolean('is_done'),
        'created_at' => now(),
        'updated_at' => now(),
    ]);

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($task)
    {
        $task = DB::table('tasks')
        ->join('users', 'tasks.user_id', '=', 'users.id')
        ->select('tasks.*', 'users.full_name as user_name')
        ->where('tasks.id', $task)
        ->first();

        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($task)
    {
        $task = DB::table('tasks')->where('id', $task)->first();
        $users = DB::table('users')->select('id', 'full_name')->get();

        return view('tasks.edit', compact('task', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest  $request, $task)
    {
        DB::table('tasks')->where('id', $task)->update([
        'user_id' => $request->user_id,
        'title' => $request->title,
        'description' => $request->description,
        'is_done' => $request->boolean('is_done'),
        'updated_at' => now(),
    ]);

        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($task)
    {
        DB::table('tasks')->where('id', $task)->delete();

        return redirect()->route('tasks.index');
    }
}
