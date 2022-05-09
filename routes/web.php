<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/* Route::get('/', function () {
    return view('pages.dashboard');
}); */

// dashboard
//route login
Auth::routes(['register' => false]);

// Frontemd
Route::get('/', 'Frontend\GradeController@flutter')->name('home');
Route::get('/leaderboard-flutter', 'Frontend\GradeController@flutter')->name('home');
Route::get('/leaderboard-flutter-all', 'Frontend\GradeController@flutterAll')->name('frontend.flutter.all');

Route::get('/leaderboard-kotlin', 'Frontend\GradeController@kotlin')->name('frontend.kotlin');
Route::get('/leaderboard-kotlin-all', 'Frontend\GradeController@kotlinAll')->name('frontend.kotlin.all');

Route::get('/leaderboard-UiDesign', 'Frontend\GradeController@uiDesign')->name('frontend.UiDesign');
Route::get('/leaderboard-UiDesign-all', 'Frontend\GradeController@uiDesignAll')->name('frontend.UiDesign.all');

Route::get('/leaderboard-web', 'Frontend\GradeController@web')->name('frontend.web');
Route::get('/leaderboard-web-all', 'Frontend\GradeController@webAll')->name('frontend.web.all');

//route dashboard
Route::prefix('/dashboard')->middleware('auth')->group(function () {
    Route::get('/', 'Pages\DashboardController@index')->name('dashboard');
    Route::get('/admin', 'Pages\DashboardController@admin')->name('dashboard.admin');
    Route::post('admin/change-password', 'Auth\ChangePasswordController@changepassword')->name('changepassword.update');
    Route::post('/uploud-picture', 'Pages\DashboardController@uploud_picture')->name('uploud_picture');
});

Route::prefix('/dashboard')->middleware('auth')->group(function () {
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', 'Pages\UserController@index')->name('user');
        Route::get('/edit/{id}', 'Pages\UserController@edit')->name('user.edit');
        Route::post('/update/{id}', 'Pages\UserController@update')->name('user.update');
        Route::post('/delete/{id}', 'Pages\UserController@delete')->name('user.delete');
        Route::post('/import', 'Pages\UserController@import')->name('user.import');
    });
});
Route::prefix('/dashboard')->middleware('auth')->group(function () {
    Route::group(['prefix' => 'setting'], function () {
        Route::group(['prefix' => 'slider'], function () {
            Route::get('/', 'Pages\SliderController@index')->name('slider');
            Route::post('/add', 'Pages\SliderController@store')->name('slider.add');
            Route::get('/add', 'Pages\SliderController@store')->name('slider.add');
            Route::get('/edit/{id}', 'Pages\SliderController@edit')->name('slider.edit');
            Route::post('/update/{id}', 'Pages\SliderController@update')->name('slider.update');
            Route::post('/delete/{id}', 'Pages\SliderController@delete')->name('slider.delete');
        });
    });
});
Route::prefix('/dashboard')->middleware('auth')->group(function () {
    Route::group(['prefix' => 'setting'], function () {
        Route::group(['prefix' => 'portofolio'], function () {
            Route::get('/', 'Pages\PortofolioController@index')->name('portofolio');
            Route::post('/add', 'Pages\PortofolioController@store')->name('portofolio.add');
            Route::get('/add', 'Pages\PortofolioController@store')->name('portofolio.add');
            Route::get('/edit/{id}', 'Pages\PortofolioController@edit')->name('portofolio.edit');
            Route::post('/update/{id}', 'Pages\PortofolioController@update')->name('portofolio.update');
            Route::post('/delete/{id}', 'Pages\PortofolioController@delete')->name('portofolio.delete');
        });
    });
});
Route::prefix('/dashboard')->middleware('auth')->group(function () {
    Route::group(['prefix' => 'setting'], function () {
        Route::group(['prefix' => 'testimoni'], function () {
            Route::get('/', 'Pages\TestimoniController@index')->name('testimoni');
            Route::get('/tambah', 'Pages\TestimoniController@add')->name('testimoni.store');
            Route::post('/autocomplete/fetch', 'Pages\TestimoniController@fetch')->name('autocomplete.fetch');
            Route::post('/tambah', 'Pages\TestimoniController@store')->name('testimoni.tambah');
            Route::get('/edit/{id}', 'Pages\TestimoniController@edit')->name('testimoni.edit');
            Route::post('/update/{id}', 'Pages\TestimoniController@update')->name('testimoni.update');
            Route::post('/delete/{id}', 'Pages\TestimoniController@delete')->name('testimoni.delete');
        });
    });
});

Route::prefix('/dashboard')->middleware('auth')->group(function () {
    Route::group(['prefix' => 'report'], function () {
        Route::get('/program-web', 'Pages\GradeController@web')->name('web');
        Route::get('/program-web/export', 'Pages\GradeController@webReport')->name('report.web');

        Route::get('/program-android', 'Pages\GradeController@android')->name('android');
        Route::get('/program-android/export', 'Pages\GradeController@androidReport')->name('report.android');

        Route::get('/program-ios', 'Pages\GradeController@ios')->name('ios');
        Route::get('/program-ios/export', 'Pages\GradeController@iosReport')->name('report.ios');

        Route::get('/program-flutter', 'Pages\GradeController@flutter')->name('flutter');
        Route::get('/program-flutter/export', 'Pages\GradeController@flutterReport')->name('report.flutter');

        Route::get('/program-kotlin', 'Pages\GradeController@kotlin')->name('kotlin');
        Route::get('/program-kotlin/export', 'Pages\GradeController@kotlinReport')->name('report.kotlin');

        Route::get('/program-ui_design', 'Pages\GradeController@ui_design')->name('ui_design');
        Route::get('/program-ui_design/export', 'Pages\GradeController@uiDesignReport')->name('report.uidesign');
    });
});
Route::prefix('/dashboard')->middleware('auth')->group(function () {
    Route::group(['prefix' => 'grade'], function () {
        Route::group(['prefix' => 'week1'], function () {
            Route::get('/', 'Pages\Week1Controller@index')->name('week1');
            Route::get('/tambah', 'Pages\Week1Controller@add')->name('week1.store');
            Route::post('/autocomplete/fetch', 'Pages\Week1Controller@fetch')->name('autocomplete.fetch');
            Route::post('/tambah', 'Pages\Week1Controller@store')->name('week1.tambah');
            Route::get('/edit/{id}', 'Pages\Week1Controller@edit')->name('week1.edit');
            Route::post('/update/{id}', 'Pages\Week1Controller@update')->name('week1.update');
            Route::post('/delete/{id}', 'Pages\Week1Controller@delete')->name('week1.delete');
        });
    });
});
Route::prefix('/dashboard')->middleware('auth')->group(function () {
    Route::group(['prefix' => 'grade'], function () {
        Route::group(['prefix' => 'week2'], function () {
            Route::get('/', 'Pages\Week2Controller@index')->name('week2');
            Route::post('/tambah', 'Pages\Week2Controller@store')->name('week2.tambah');
            Route::get('/edit/{id}', 'Pages\Week2Controller@edit')->name('week2.edit');
            Route::post('/update/{id}', 'Pages\Week2Controller@update')->name('week2.update');
            Route::post('/delete/{id}', 'Pages\Week2Controller@delete')->name('week2.delete');
        });
    });
});
Route::prefix('/dashboard')->middleware('auth')->group(function () {
    Route::group(['prefix' => 'grade'], function () {
        Route::group(['prefix' => 'week3'], function () {
            Route::get('/', 'Pages\Week3Controller@index')->name('week3');
            Route::post('/tambah', 'Pages\Week3Controller@store')->name('week3.tambah');
            Route::get('/edit/{id}', 'Pages\Week3Controller@edit')->name('week3.edit');
            Route::post('/update/{id}', 'Pages\Week3Controller@update')->name('week3.update');
            Route::post('/delete/{id}', 'Pages\Week3Controller@delete')->name('week3.delete');
        });
    });
});
Route::prefix('/dashboard')->middleware('auth')->group(function () {
    Route::group(['prefix' => 'grade'], function () {
        Route::group(['prefix' => 'week4'], function () {
            Route::get('/', 'Pages\Week4Controller@index')->name('week4');
            Route::post('/tambah', 'Pages\Week4Controller@store')->name('week4.tambah');
            Route::get('/edit/{id}', 'Pages\Week4Controller@edit')->name('week4.edit');
            Route::post('/update/{id}', 'Pages\Week4Controller@update')->name('week4.update');
            Route::post('/delete/{id}', 'Pages\Week4Controller@delete')->name('week4.delete');
        });
    });
});
Route::prefix('/dashboard')->middleware('auth')->group(function () {
    Route::group(['prefix' => 'grade'], function () {
        Route::group(['prefix' => 'week5'], function () {
            Route::get('/', 'Pages\Week5Controller@index')->name('week5');
            Route::post('/tambah', 'Pages\Week5Controller@store')->name('week5.tambah');
            Route::get('/edit/{id}', 'Pages\Week5Controller@edit')->name('week5.edit');
            Route::post('/update/{id}', 'Pages\Week5Controller@update')->name('week5.update');
            Route::post('/delete/{id}', 'Pages\Week5Controller@delete')->name('week5.delete');
        });
    });
});
Route::prefix('/dashboard')->middleware('auth')->group(function () {
    Route::group(['prefix' => 'grade'], function () {
        Route::group(['prefix' => 'week6'], function () {
            Route::get('/', 'Pages\Week6Controller@index')->name('week6');
            Route::post('/tambah', 'Pages\Week6Controller@store')->name('week6.tambah');
            Route::get('/edit/{id}', 'Pages\Week6Controller@edit')->name('week6.edit');
            Route::post('/update/{id}', 'Pages\Week6Controller@update')->name('week6.update');
            Route::post('/delete/{id}', 'Pages\Week6Controller@delete')->name('week6.delete');
        });
    });
});
Route::prefix('/dashboard')->middleware('auth')->group(function () {
    Route::group(['prefix' => 'grade'], function () {
        Route::group(['prefix' => 'week7'], function () {
            Route::get('/', 'Pages\Week7Controller@index')->name('week7');
            Route::post('/tambah', 'Pages\Week7Controller@store')->name('week7.tambah');
            Route::get('/edit/{id}', 'Pages\Week7Controller@edit')->name('week7.edit');
            Route::post('/update/{id}', 'Pages\Week7Controller@update')->name('week7.update');
            Route::post('/delete/{id}', 'Pages\Week7Controller@delete')->name('week7.delete');
        });
    });
});
Route::prefix('/dashboard')->middleware('auth')->group(function () {
    Route::group(['prefix' => 'grade'], function () {
        Route::group(['prefix' => 'week8'], function () {
            Route::get('/', 'Pages\Week8Controller@index')->name('week8');
            Route::post('/tambah', 'Pages\Week8Controller@store')->name('week8.tambah');
            Route::get('/edit/{id}', 'Pages\Week8Controller@edit')->name('week8.edit');
            Route::post('/update/{id}', 'Pages\Week8Controller@update')->name('week8.update');
            Route::post('/delete/{id}', 'Pages\Week8Controller@delete')->name('week8.delete');
        });
    });
});
Route::prefix('/dashboard')->middleware('auth')->group(function () {
    Route::group(['prefix' => 'grade'], function () {
        Route::group(['prefix' => 'week9'], function () {
            Route::get('/', 'Pages\Week9Controller@index')->name('week9');
            Route::post('/tambah', 'Pages\Week9Controller@store')->name('week9.tambah');
            Route::get('/edit/{id}', 'Pages\Week9Controller@edit')->name('week9.edit');
            Route::post('/update/{id}', 'Pages\Week9Controller@update')->name('week9.update');
            Route::post('/delete/{id}', 'Pages\Week9Controller@delete')->name('week9.delete');
        });
    });
});
Route::prefix('/dashboard')->middleware('auth')->group(function () {
    Route::group(['prefix' => 'grade'], function () {
        Route::group(['prefix' => 'week10'], function () {
            Route::get('/', 'Pages\Week10Controller@index')->name('week10');
            Route::post('/tambah', 'Pages\Week10Controller@store')->name('week10.tambah');
            Route::get('/edit/{id}', 'Pages\Week10Controller@edit')->name('week10.edit');
            Route::post('/update/{id}', 'Pages\Week10Controller@update')->name('week10.update');
            Route::post('/delete/{id}', 'Pages\Week10Controller@delete')->name('week10.delete');
        });
    });
});
Route::prefix('/dashboard')->middleware('auth')->group(function () {
    Route::group(['prefix' => 'grade'], function () {
        Route::group(['prefix' => 'week11'], function () {
            Route::get('/', 'Pages\Week11Controller@index')->name('week11');
            Route::post('/tambah', 'Pages\Week11Controller@store')->name('week11.tambah');
            Route::get('/edit/{id}', 'Pages\Week11Controller@edit')->name('week11.edit');
            Route::post('/update/{id}', 'Pages\Week11Controller@update')->name('week11.update');
            Route::post('/delete/{id}', 'Pages\Week11Controller@delete')->name('week11.delete');
        });
    });
});
Route::prefix('/dashboard')->middleware('auth')->group(function () {
    Route::group(['prefix' => 'grade'], function () {
        Route::group(['prefix' => 'week12'], function () {
            Route::get('/', 'Pages\Week12Controller@index')->name('week12');
            Route::post('/tambah', 'Pages\Week12Controller@store')->name('week12.tambah');
            Route::get('/edit/{id}', 'Pages\Week12Controller@edit')->name('week12.edit');
            Route::post('/update/{id}', 'Pages\Week12Controller@update')->name('week12.update');
            Route::post('/delete/{id}', 'Pages\Week12Controller@delete')->name('week12.delete');
        });
    });
});

//route program
Route::prefix('/dashboard')->middleware('auth')->group(function () {
    Route::group(['prefix' => 'program'], function () {
        Route::get('/', 'Pages\ProgramController@index')->name('program');
        Route::post('/tambah', 'Pages\ProgramController@store')->name('program.tambah');
        Route::get('/edit/{id}', 'Pages\ProgramController@edit')->name('program.edit');
        Route::post('/update/{id}', 'Pages\ProgramController@update')->name('program.update');
        Route::post('/delete/{id}', 'Pages\ProgramController@delete')->name('program.delete');
    });
});
Route::any('change-program-angkatan', 'Pages\GradeController@changeProgramAngkatan');
Route::any('change-peserta', 'Pages\GradeController@changePeserta');
Route::any('/getParticipant', 'Pages\ApiController@getParticipant');
//route peserta
Route::prefix('/dashboard')->middleware('auth')->group(function () {
    Route::group(['prefix' => 'participant'], function () {
        Route::get('/', 'Pages\ParticipantController@index')->name('participant');
        Route::post('/import/excel', 'Pages\ParticipantController@importExcel')->name('participants.import.excel');
        Route::get('/export/excel', 'Pages\ParticipantController@exportExcel')->name('participants.export.excel');
        Route::post('/tambah', 'Pages\ParticipantController@store')->name('participant.tambah');
        Route::get('/edit/{id}', 'Pages\ParticipantController@edit')->name('participant.edit');
        Route::post('/update/{id}', 'Pages\ParticipantController@update')->name('participant.update');
        Route::post('/delete/{id}', 'Pages\ParticipantController@delete')->name('participant.delete');
    });
});

//route angkatan
// Route::prefix('/')->middleware('auth')->group(function () {
//     Route::group(['prefix' => 'angkatan'], function () {
//         Route::get('/', 'Pages\AngkatanController@index')->name('angkatan');
//         Route::post('/', 'Pages\AngkatanController@store')->name('angkatan.tambah');
//         Route::get('/edit/{id}', 'Pages\AngkatanController@edit')->name('angkatan.edit');
//         Route::post('/update/{id}', 'Pages\AngkatanController@update')->name('angkatan.update');
//         Route::post('/delete/{id}', 'Pages\AngkatanController@delete')->name('angkatan.delete');
//     });
// });
