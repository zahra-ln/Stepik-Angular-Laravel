<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Task;
use App\TagTask;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::where('completed', '!=', 1)->where('deleted', 0)->with('category')->with('tags')->get();
        return response()->json($tasks, 200);
    }

    public function completedTasks()
    {
        $tasks = Task::where('completed', '=', 1)->with('category')->with('tags')->get();
        return response()->json($tasks, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task();
        $task->title = $request->get('title');
        $task->categoryId = $request->get('categoryId');

        $task->save();


        $tags = explode(",", $request->get('tags'));
        foreach ($tags as $value) {


            $tag = Tag::where('title', '=', $value)->first();

            if (is_null($tag)) {
                $tag = new Tag();
                $tag->title = $value;
                $tag->save();
            }


            $tagTask = new TagTask();
            $tagTask->tag_id = $tag->id;
            $tagTask->task_id = $task->id;

            $tagTask->save();
        }

        return response()->json($task, 200);
    }

    public function doneTask(Request $request)
    {
        $task = Task::find($request->get('id'))->update([
            "completed" => 1
        ]);
        return response()->json($task, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id)->delete();
        return response()->json([], 200);
    }
}
