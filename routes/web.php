<?php

use App\Events\ChatMessageEvent;
use BeyondCode\LaravelWebSockets\Facades\WebSocketsRouter;
use App\Websockets\SocketHandler\UpdatePostSocketHandler;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');

});

// Route::get('/playground', function (){
//     event(new ChatMessageEvent());
//     return null;
// });

Route::get('/ws', function (){
    return view('websocket');
});

Route::post('/chat-message', function (\Illuminate\Http\Request $request){
    event(new ChatMessageEvent($request->message, auth()->user()));
    return null;
});
