<?php

use App\Http\Controllers\MessagesController;
use App\Http\Controllers\SiteMap;
use App\Models\Message;
use App\Http\Controllers\TutorialController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/test/find', function() {
    $message = Message::find(2);
    echo "id:{$message->id},title:{$message->title},body:{$message->title}<br>";
});

Route::get('/test/count', function() {
    echo Message::count();
});

Route::get('/test/max', function() {
    echo Message::max('created_at');
});

Route::get('/test/min', function() {
    echo Message::min('created_at');
});

Route::get('/test/where', function() {
    $messages = Message::where('id', '>=', 10)->get();
    foreach ($messages as $message) {
        echo "id:{$message->id},title:{$message->title},body:{$message->title}<br>";
    };
});

Route::get('/test/tosql', function() {
    $sql = Message::where('id', '>=', 10)->toSql();
    echo $sql;
});

Route::get('/test/like', function () {
    $messages = Message::where('title', 'like', '%tle_1%')->get();
    foreach ($messages as $message) {
        echo "id:{$message->id},title:{$message->title},body:{$message->title}<br>";
    };
});

Route::get('/test/and', function () {
    $messages = Message::where([
        ['id', '>=', 135],
        ['title', 'like', '%_reuse']
    ])->get();
    foreach ($messages as $message) {
        echo "id:{$message->id},title:{$message->title},body:{$message->title}<br>";
    };
});

Route::get('/test/or', function () {
    $messages = Message::where([
        ['id', '>=', 135],
        ['title', 'like', '%_reuse']
    ])
    ->orWhere('title', '=', 'title_1')
    ->get();
    foreach ($messages as $message) {
        echo "id:{$message->id},title:{$message->title},body:{$message->title}<br>";
    };
});

Route::get('/test/limit', function () {
    $messages = Message::where('title', 'like', 'title_%')->offset(30)->limit(10)->get();
    foreach ($messages as $message) {
        echo "id:{$message->id},title:{$message->title},body:{$message->title}<br>";
    };
});

Route::get('/test/orderby', function () {
    $messages = Message::where('id', '>=', 1)->orderBy('id', 'desc')->get();
    foreach ($messages as $message) {
        echo "id:{$message->id},title:{$message->title},body:{$message->title}<br>";
    };
});

Route::get('/test/max', function () {
    $max = Message::where('title', 'like', 'title_3%')->max('created_at');
    echo $max;
});

Route::get('/test/modelupdate', function () {
    $message = Message::find(1);
    $message->title = 'title_1_update';
    $message->body = 'body_1_update';
    $message->save();
    var_dump($message);
});

Route::get('/test/modeldelete', function () {
    $message = new Message;
    $message->title = 'title_delete';
    $message->body = 'body_delete';
    $message->save();
    $id = $message->id;
    $message->delete();
    var_dump($id);
});

Route::get('/tutorial/index', function () {
    return view('tutorial.index', ['str' => 'tutorial index']);
});

Route::get('/tutorial/array', function () {
    $str = 'tutorial array';
    $ary = ['tutorial_1', 'tutorial_2', 'tutorial_3'];
    $data = ['str' => $str, 'ary' => $ary];
    return view('tutorial.array', $data);
});

Route::get('/tutorial/compact', function () {
    $str = 'tutorial array';
    $ary = ['tutorial_1', 'tutorial_2', 'tutorial_3'];
    return view('tutorial.compact', compact('str', 'ary')); 
});

Route::get('/tutorial/htmlescape', function () {
    $str = 'welcome<br>welcome';
    return view('tutorial.htmlescape', compact('str'));
});

Route::get('/tutorial/invalid', function () {
    $str = 'invalid<br>invalid';
    return view('tutorial.invalid', compact('str'));
});

Route::get('/tutorial/comment_true_false', function () {
    return view('tutorial.comment_true_false');
});

Route::get('/tutorial/blade_directive', function () {
    $messages = [
        ['id'=>1,'body'=>'??????1'],
        ['id'=>2,'body'=>'??????2'],
        ['id'=>3,'body'=>'??????3']
    ];
    $messages2 = [];
    return view('tutorial.blade_directive', compact('messages', 'messages2'));
});

Route::match(['get', 'post', 'patch'], '/tutorial/formtest', function (Request $request) {
    $title = $request->input('title');
    return view('tutorial.formtest', compact('title'));
});

Route::get('tutorial', [TutorialController::class, 'index']);
Route::get('tutorial/create', [TutorialController::class, 'create']);
Route::post('tutorial', [TutorialController::class, 'store']);
Route::get('sitemap', SiteMap::class);
Route::get('sitemap/{status}', SiteMap::class);
Route::resource('messages', MessagesController::class);

// Route::resource('messages', MessagesController::class)->only([
//     'index', 'show', 'create', 'store'
// ]);

// Route::resource('messages', MessagesController::class)->except([
//     'edit', 'update', 'destroy'
// ]);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
