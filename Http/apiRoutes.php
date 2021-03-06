<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->group(['prefix' => 'v1/localization', 'middleware'=>['bindings','api.token']], function (Router $router) {
    $router->bind('countryBind', function ($id) {
        return app(\Modules\Localization\Repositories\CountryRepository::class)->find($id);
    });
    $router->get('countries', [
        'as'         => 'api.localization.countries',
        'uses'       => 'V1\PublicController@countries',
        'middleware' => 'token-can:localization.countries.index',
    ]);
    $router->get('cities', [
        'as'         => 'api.localization.cities',
        'uses'       => 'V1\PublicController@cities',
        'middleware' => 'token-can:localization.cities.index',
    ]);
});
