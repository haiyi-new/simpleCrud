<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class TaskController extends Controller
{
    // Show all tasks
    public function index() {
        return view('tasks.index', [
            'tasks' => Task::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    //Show single task
    public function show(Task $task) {
        return view('tasks.show', [
            'task' => $task
        ]);
    }

    // Show Create Form
    public function create() {
        return view('tasks.create');
    }

    // Store task Data
    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('tasks', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }



        Task::create($formFields);

        return redirect('/')->with('message', 'Task created successfully!');
    }

    // Show Edit Form
    public function edit(Task $task) {
        return view('tasks.edit', ['task' => $task]);
    }

    // Update Task Data
    public function update(Request $request, Task $task) {

        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $task->update($formFields);

        return redirect('/')->with('message', 'Task updated successfully!');
    }

    // Delete Task
    public function destroy(Task $task) {
        $task->delete();
        return redirect('/')->with('message', 'Task deleted successfully');
    }

}
