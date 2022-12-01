<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Redirect;

class todoController extends Controller
{
     
   public function index(){

     $todo_completed = Todo::where("iscompleted",true)->latest()->get();
     $todo_incompleted = Todo::where("iscompleted",false)->latest()->get();

     return view('index',compact('todo_completed','todo_incompleted'));

   }

   public function store(Request $request){
       $validated = $request->validate([
        'task'  => 'required',
       ]);

       $task = new Todo();
       $task->task = $request->task;
       $task->time = '12:00';
       $task->save();
       return Redirect::back()->with("message","task has been added");
   }

   public function update(Todo $todo){

   
     $task = new Todo();
     $task->iscompleted = $task->iscompleted == 1  ?  0 : 1 ;
     $task->save();
     return Redirect::back()->with("message","Task has been updated");

   }


   public function delete(Todo $todo)
   {
    $todo->delete();
    return Redirect::back()->with("message","task has been deleted");
   }



}
