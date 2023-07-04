<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return view('pages.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tasks = Task::all();
        return view('pages.create', compact('tasks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|min:3|max:255',
            'description' => 'required|min:3|max:255',
           
        ]);

        $task = new Task();
        $task->nom = $validatedData['nom'];
        $task->terminer =false;
        
        $task->description = $validatedData['description'];
        
 
        $task->save();
        return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $details = Task::find($id);
        return view('pages.details', compact('details'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tasks = Task::findOrFail($id);
        return view('pages.edit', compact('tasks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom'=>'required|min:3',
            'description'=>'required|min:6',
            'terminer'=> 'required|boolean',


        ]);


        $task = Task::find($id);
        $task->nom = $request->nom;
        $task->description = $request->description;
        $task->terminer=$request->has('terminer');




        $task->save();

        if ($task->terminer==1){
            Mail::to('ifiag@gmail.com')->send(new ContactMail('hindsadik@gmail.com' , 'la tache bien terminer ' , 'Fin'));
        }

        return back();
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Task::destroy($id);
        return redirect()->back();
    }
}
