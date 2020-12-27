<?php

use App\Http\Controllers\Guest\CreateEmptyGuestController;
use App\Http\Controllers\Guest\GuestController;
use App\Http\Controllers\Guest\TotalGuestController;
use App\Http\Controllers\Guest\UpdatingStatusGuestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::group(
//    [
//        'prefix'    => 'projects',
//        'namespace' => 'Project',
//    ],
//    function () {
//        Route::get(
//            'active',
//            'ShowActiveProjectController'
//        );
//
//        Route::match(
//            ['PUT', 'PATCH'],
//            '{project}/setting',
//            'UpdateProjectSettingController'
//        );
//    }
//);

Route::put(
    'guests/status',
    UpdatingStatusGuestController::class
);

Route::post(
    'guests/emptiest',
    CreateEmptyGuestController::class
);

Route::get(
    'guests/total',
    TotalGuestController::class
);

Route::apiResources(
    [
//        'projects'              => 'Project\ProjectController',
        'guests'                => GuestController::class,
//        'projects.events'       => 'Event\EventController',
//        'projects.invitations' => 'EInvitation\InvitationController',
    ]
);
