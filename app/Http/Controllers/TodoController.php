<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Todo::where("user_id", auth()->user()->id)->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            "title" => "required|string",
            "image" => "nullable|string",
            "task" => "required|string"
        ]);

        $todo= Todo::create([
            "user_id" => auth()->user()->id,
            "title" => $fields["title"],
            "task" => $fields["task"],
            "image" => $fields["image"],
            "status" => "Not Started"
        ]);

        return $todo;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $todo = Todo::where("user_id", auth()->user()->id)->where("id", $id)->first();

        if (!$todo) {
            return [
                "message" => "Todo Item not found"
            ];
        }

        return $todo;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $todo = Todo::where("user_id", auth()->user()->id)->where("id", $id)->first();
        
        if (!$todo) {
            return [
                "message" => "Todo Item not found"
            ];
        }

        $fields = $request->validate([
            "title" => "required|string",
            "task" => "required|string",
            "status" => "required|string"
        ]);

        $todo->update($fields);

        return $todo;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todo = Todo::where("user_id", auth()->user()->id)->where("id", $id)->first();

        if (!$todo) {
            return [
                "message" => "Todo Item not found"
            ];
        }

        $todo->delete();

        return [
            "message" => "Todo item deleted"
        ];
    }
}
