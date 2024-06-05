<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\CandidatureController;
use App\Http\Controllers\ChatController;
use App\Mail\HelloMail;
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

Route::get('/create',[LoginController::class,'create'])->name('create');

Route::post('/store',[LoginController::class,'store'])->name('store');

Route::post('/auth',[LoginController::class,'auth'])->name('auth');

Route::get('/dashboard',[LoginController::class,'dashboard'])->name('dashboard');

Route::get('/userpage',[LoginController::class,'userpage'])->name('userpage');

Route::get('/add_offer',[OfferController::class,'addOffer'])->name('add_offer');

Route::post('/insertOffer',[OfferController::class,'insertOffer'])->name('insertOffer');

Route::get('/display_offer',[OfferController::class,'display_offer'])->name('display_offer');

Route::post('/modO',[OfferController::class,'modO'])->name('modO');

Route::post('/updateOffer', [OfferController::class, 'updateOffer'])->name('updateOffer');

Route::post('/deleteO',[OfferController::class, 'deleteO'])->name('deleteO');

Route::get('displayApplication',[ApplicationController::class, 'displayApplication'])->name('displayApplication');

Route::get('logout',[LoginController::class, 'logout'])->name('logout');

Route::get('/post',[PostController::class, 'post'])->name('post');

Route::get('/display_application2',[ApplicationController::class,'displayApplication2'])->name('display_application2');

Route::post('/offerDetail',[PostController::class, 'offerDetail'])->name('offerDetail');

Route::post('/postComment',[CommentaireController::class, 'addCommentaire'])->name('postComment');

Route::get('/userPage',[CommentaireController::class, 'userPage'])->name('userPage');

Route::post('/saveCandidature',[CandidatureController::class, 'saveCandidature'])->name('saveCandidature');

Route::post('/displayCandidature',[CandidatureController::class,'displayCandidature'])->name('displayCandidature');

Route::post('/detailCandidature',[CandidatureController::class,'detailCandidature'])->name('detailCandidature');

Route::post('/accepterCandidature',[CandidatureController::class,'accepterCandidature'])->name('accepterCandidature');

// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', [LoginController::class, 'auth'])->name('auth');
// });


Route::post('/notifications/markAsRead', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
Route::get('/chat',[ChatController::class,'index'])->name('chat');

Route::post('/mail',function(Request $request){
    $mail = $request->input('email');
    Mail::to('moussatefmeryem818@gmail.com')
       ->send(new HelloMail($mail));
})->name('mail');
