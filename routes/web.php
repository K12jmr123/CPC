<?php

use App\Http\Controllers\paymentcontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\account;
use App\Http\Controllers\announces;
use App\Http\Controllers\recordController;

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
Route::post('/create', [account::class, 'addstudents'])->name('addstudents');
Route::post('/login', [account::class, 'check'])->name('login');
Route::get('/displayaccount', [account::class, 'displayaccount'])->name('displayaccount');
Route::post('/edit', [account::class, 'edit'])->name('edit');
Route::post('/update', [account::class, 'updateinfo'])->name('update');
Route::post('/delete', [account::class, 'destroy'])->name('delete');
Route::post('/promote', [account::class, 'promoteUser'])->name('promote');
//<------------------------ANNOUNCEMENT--------------------------->
Route::get('/announcepage', [announces::class, 'index'])->name('announcepage');
Route::post('/announce', [announces::class, 'announceUser'])->name('announce');
Route::post('/individual', [announces::class, 'announceindividual'])->name('individual');
Route::post('/payments', [paymentcontroller::class, 'paymentpost'])->name('payments');
Route::get('/officers', [account::class, 'officerdashboard'])->name('officers');
//<---------------------------Mayors-------------------------------->
Route::post('/officers', [account::class, 'getloginUser'])->name('mayors');

Route::post('/paymentUser', [paymentcontroller::class, 'getPaymentUser'])->name('getPaymentUser');
Route::post('/paymentUsers', [paymentcontroller::class, 'getusertest'])->name('getusertest');
Route::post('/paymentTest', [recordController::class, 'individualpay'])->name('paymentTest');
Route::get('/paymentUsers/{Section}', [paymentcontroller::class, 'doPaymentUser'])->name('paymentUsers');
Route::get('/records/{Section}', [recordController::class, 'sectionRecord'])->name('records');
Route::get('/recordssection', [recordController::class, 'Displaysection'])->name('recordssection');
Route::post('/cpayment', [recordController::class, 'docreatepayment'])->name('cpayment');
Route::post('/updatenewpayment', [recordController::class, 'edit'])->name('updatenewpayment');
Route::post('/edtipayments', [recordController::class, 'updates'])->name('edtipayments');
Route::post('/deletepayment', [recordController::class, 'destroy'])->name('deletepayment');
Route::get('/paymentsection', [paymentcontroller::class, 'Displaysection'])->name('paymentsection');
Route::post('/announcepayment', [paymentcontroller::class, 'edit'])->name('announcepayment');
Route::post('/updatepayments', [paymentcontroller::class, 'updates'])->name('updatepayments');
Route::post('/deleteannounce', [paymentcontroller::class, 'destroy'])->name('deleteannounce');
Route::post('/listsection', [recordController::class, 'getusertest'])->name('listsection');
Route::get('/listsectionk/{section}', [recordController::class, 'DisplayBysection'])->name('listsectionk');
Route::post('/editrecordsUser', [recordController::class, 'edits'])->name('editrecordsUser');
Route::post('/updatepaymentTest', [recordController::class, 'paymentTest'])->name('updatepaymentTest');
Route::post('/originalpaymentTest', [recordController::class, 'paymentTest'])->name('orginalpaymentTest');
Route::post('/originalpayment', [paymentcontroller::class, 'OriginalTest'])->name('orginalpayment');
Route::post('/viewRecords', [paymentcontroller::class, 'editpayment'])->name('viewRecords');
Route::post('/viewevent', [announces::class, 'requestevent'])->name('viewevent');
Route::get('/viewevents/{section}', [announces::class, 'getevent'])->name('viewevents');