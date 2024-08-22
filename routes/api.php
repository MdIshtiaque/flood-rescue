<?php

use App\Http\Controllers\DonationController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\RequestForHelpController;
use App\Http\Controllers\VolunteerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('organization', [OrganizationController::class, 'storeOrganization']);

Route::get('donation', [DonationController::class, 'getAllDonation']);
Route::post('donation', [DonationController::class, 'storeDonation']);
Route::put('donation/{donation}', [DonationController::class, 'updateDonation']);
Route::delete('donation/{donation}', [DonationController::class, 'deleteDonation']);


Route::get('request-for-help', [RequestForHelpController::class, 'getAllRequestForHelp']);
Route::post('request-for-help', [RequestForHelpController::class, 'storeRequestForHelp']);
Route::put('request-for-help/{requestForHelp}', [RequestForHelpController::class, 'updateRequestForHelp']);
Route::delete('request-for-help/{requestForHelp}', [RequestForHelpController::class, 'deleteRequestForHelp']);

Route::get('volunteer', [VolunteerController::class, 'getAllVolunteers']);
Route::post('volunteer', [VolunteerController::class, 'storeVolunteer']);
Route::put('volunteer/{volunteer}', [VolunteerController::class, 'updateVolunteer']);
Route::delete('volunteer/{volunteer}', [VolunteerController::class, 'deleteVolunteer']);

Route::get('payment', [PaymentMethodController::class, 'getAllPaymentMethods']);
Route::post('payment', [PaymentMethodController::class, 'storePaymentMethod']);
Route::put('payment/{paymentMethod}', [PaymentMethodController::class, 'updatePaymentMethod']);
Route::delete('payment/{paymentMethod}', [PaymentMethodController::class, 'deletePaymentMethod']);
