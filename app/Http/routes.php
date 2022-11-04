<?php
//use \Illuminate\Support\Facades\Request;
use App\Models\Task;
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
    //dd($tasks);
    return view('tasks.index',[
        'tasks'=> $tasks,
    ]);
})->name('task.index');         // name задаем имя маршрута

Route::get('/task/create',function (){

    return view('tasks.create');
})->name('task.create');

Route::post('/task',function(\Illuminate\Http\Request $request){
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
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
