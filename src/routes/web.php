<?php

Route::middleware(['web', 'auth', 'core'])
    ->namespace('LaravelEnso\Localisation\app\Http\Controllers')
    ->group(function () {
        Route::prefix('system/localisation')->as('system.localisation.')
            ->group(function () {
                Route::get('initTable', 'LocalisationController@initTable')
                    ->name('initTable');
                Route::get('getTableData', 'LocalisationController@getTableData')
                    ->name('getTableData');
                Route::get('exportExcel', 'LocalisationController@exportExcel')
                    ->name('exportExcel');

                Route::get('editTexts', 'LangFileController@editTexts')
                    ->name('editTexts');
                Route::get('getLangFile/{locale}', 'LangFileController@getLangFile')
                    ->name('getLangFile');
                Route::patch('saveLangFile', 'LangFileController@saveLangFile')
                    ->name('saveLangFile');
            });

        Route::prefix('system')->as('system.')
            ->group(function () {
                Route::resource('localisation', 'LocalisationController', ['except' => ['show']]);
            });
    });
