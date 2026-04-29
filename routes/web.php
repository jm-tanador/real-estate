<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpaController;
use App\Http\Controllers\PropertyController;

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

Route::get('/{any?}', [SpaController::class, 'index'])->where('any', '.*');

Route::get('/add-property', [PropertyController::class, 'store']);
Route::get('/properties', [PropertyController::class, 'index']);

Route::get('/setup-data', function () {
    $database = \Kreait\Laravel\Firebase\Facades\Firebase::database();
    $database->getReference('properties')->push([
        'title' => 'Modern Apartment',
        'location' => 'Downtown Manila',
        'price' => 5000000
    ]);
    $database->getReference('properties')->push([
        'title' => 'Suburban House',
        'location' => 'Quezon City',
        'price' => 8500000
    ]);
    return "Data pushed to Firebase! Go back to your dashboard.";
});
