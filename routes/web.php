<?php

use App\Models\Message;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function() {
    return view('welcome');
});

Route::get('/test/echo', function() {
    echo 'welcome';
});

Route::get('/test/esp', function() {
    $str = 'welcome<br>welcome';
    echo htmlspecialchars($str);
});

Route::get('/test/esp', function() {
    $str = 'welcome<br>welcome';
    echo $str;
});

Route::get('/test/json', function() {
    $any = ['one', 'two', 'three'];
    return $any;
});

Route::get('/test/jsonmulti', function() {
    $any = [
        [
            'id' => 1,
            'title' => 'one'
        ],
        [
            'id' => 2,
            'title' => 'two'
        ],
    ];
    return $any;
});

Route::get('/test/param/{id}', function($id) {
    echo "id={$id}";
});

Route::get('/test/anyparam/{id?}', function($id=0) {
    echo "id={$id}";
});

Route::get('test/name', function() {
    echo 'routename';
})->name('routename');

Route::get('/test/redirect', function() {
    return redirect()->route('routename');
});

Route::get('/test/modeldump', function() {
    $message = new Message;
    var_dump($message);
});

Route::get('/test/modelinsert', function() {
    $message = new Message;
    $message->title = 'title_101';
    $message->body = 'body_101';
    $message->save();
    $id = $message->id;
    var_dump($id);
});

Route::get('/test/modelreuse', function() {
    $message = new Message;
    $message->title = 'title_102';
    $message->body = 'body_102';
    $message->save();
    $id = $message->id;
    var_dump($id);
    sleep(3);
    $message->title = 'title_102_reuse';
    $message->body = 'body_102_reuse';
    $message->save();
    $id_reuse = $message->id;
    var_dump($id_reuse);
});

Route::get('/test/all', function() {
    $messages = Message::all();
    foreach ($messages as $message) {
        echo "id:{$message->id},title:{$message->title},body:{$message->title}<br>";
    };
});

