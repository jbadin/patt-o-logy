<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('login', 'AuthController@login');
    $router->post('logout', 'AuthController@logout');
    $router->post('refresh', 'AuthController@refresh');
    $router->post('user-profile', 'AuthController@me');
    // //Appointments
    // $router->get('rendez-vous/{id}', ['uses' => 'AppointmentsController@getAppointmentDetails']);
    // $router->get('rendez-vous/{id_users}', ['uses' => 'AppointmentsController@getAppointmentsListByUser']);
    // $router->post('rendez-vous', ['uses' => 'AppointmentsController@createAppointment']);
    // $router->delete('rendez-vous/{id}', ['uses' => 'AppointmentsController@deleteAppointment']);
    // $router->put('rendez-vous/{id}', ['uses' => 'AppointmentsController@updateAppointment']);

    // //HeightHistory
    // $router->get('tailles/{id_pets}', ['uses' => 'HeightHistoryController@getHeightHistoryListByPet']);
    // $router->post('tailles', ['uses' => 'HeightHistoryController@createHeightHistory']);
    // $router->delete('tailles/{id}', ['uses' => 'HeightHistoryController@deleteHeightHistory']);
    // $router->put('tailles/{id}', ['uses' => 'HeightHistoryController@updateHeightHistory']);

    // //History
    // $router->get('historique/{id}', ['uses' => 'HistoryController@getHistoryDetails']);
    // $router->get('historique/{id_users}', ['uses' => 'HistoryController@getHistoryListByUser']);
    // $router->post('historique', ['uses' => 'HistoryController@createHistory']);
    // $router->delete('historique/{id}', ['uses' => 'HistoryController@deleteHistory']);
    // $router->put('historique/{id}', ['uses' => 'HistoryController@updateHistory']);

    // //Pets
    // $router->get('animaux',  ['uses' => 'PetsController@getPetsList']);
    // $router->get('animaux/{id}', ['uses' => 'PetsController@getPetsDetails']);
    // $router->get('animaux/{id_users}', ['uses' => 'PetsController@getPetsListByUser']);
    // $router->post('animaux', ['uses' => 'PetsController@createPet']);
    // $router->delete('animaux/{id}', ['uses' => 'PetsController@deletePet']);
    // $router->put('animaux/{id}', ['uses' => 'PetsController@updatePet']);

    //Users
    $router->get('users',  ['uses' => 'UserController@getUsersList']);
    $router->get('users/{id}', ['uses' => 'UserController@getUserDetails']);
    $router->post('users', ['uses' => 'UserController@createUser']);
    $router->put('users/profile/{id}', ['uses' => 'UserController@updateUser']);
    $router->put('users/password/{id}', ['uses' => 'UserController@updateUserPassword']);
    $router->delete('users/{id}', ['uses' => 'UserController@deleteUser']);

    // //WeightHistory
    // $router->get('poids/{id_pets}', ['uses' => 'WeightHistoryController@getWeightHistoryListByPet']);
    // $router->post('poids', ['uses' => 'WeightHistoryController@createWeightHistory']);
    // $router->delete('poids/{id}', ['uses' => 'WeightHistoryController@deleteWeightHistory']);
    // $router->put('poids/{id}', ['uses' => 'WeightHistoryController@updateWeightHistory']);
});
