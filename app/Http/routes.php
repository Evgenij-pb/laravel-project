<?php

use App\Models\Task;
use \Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/task',function (){
    $tasks = Task::all();
    return view('tasks.index',[
        'tasks'=> $tasks,
    ]);
})->name('task.index');         // name задаем имя маршрута


Route::get('/task/create',function (){
    return view('tasks.create');
})->name('task.create');


Route::post('/task',function(Request $request){
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:25',
    ]);

    if ($validator->fails()) {
        return redirect(route('task.create'))
            ->withErrors($validator)
            ->withInput();
    }
    $task = new Task();
    $task-> name = $request -> name;
    $task->save();
    return redirect(route('task.index'));
})->name('task.store');


Route::delete ('/task/{task}', function (Task $task){
    $task ->delete();
    return redirect(route('task.index'));
})->name('tasks.destroy');

//--------------------------------------------------------------------------------------

/*Route::post ('/task/{id}/edit', function ($id){
    $task = Task::findOrFail($id);
    return view('tasks.edit',[
        'task'=> $task,
    ]);
})->name('task.edit');


Route::put('task/{id}}', function (Request $request,$id){
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:25',
    ]);

    if ($validator->fails()) {
        return redirect(route('task.edit'))   //redirect(route('task.edit', $id))
            ->withErrors($validator)
            ->withInput();
    }

    $task = Task::findOrFail($id);
    $task ->name=$request -> name;
    $task->save();

    return redirect(route('task.index'));
})->name('task.update');
*/

//Route::match(['get', 'post'],'/task/{task}/edit', function (Task $task)
Route::get('/task/{task}/edit', function (Task $task){
     return view('tasks.edit',[
        'task'=> $task,
    ]);
})->name('task.edit');


Route::put('task/{task}', function (Request $request,Task $task){

    $validator = Validator::make($request->all(), [
        'name' => 'required|max:25',
    ]);

    if ($validator->fails()) {
        return redirect(route('task.edit', $task->id))
            ->withErrors($validator)
            ->withInput();
    }

    $task ->name=$request -> name;
    $task->save();

    return redirect(route('task.index'));
})->name('task.update');

