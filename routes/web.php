<?php

use Illuminate\Support\Facades\Route;

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

;
Route::middleware(['auth:sanctum', 'userauthority'])->namespace("App\Http\Controllers\User")->prefix("users")->as("users.")->group(function (){
        Route::get("/","HomeController@index")->name("index");

        Route::prefix("sinav")->as("exam.")->group(function (){
            Route::get("","ExamController@index")->name("index");
            Route::get("/{slug}","ExamController@question")->name("question");
            Route::post("save/{slug}","ExamController@post")->name("post");
        });
    Route::prefix("sonuclar")->as("result.")->group(function (){
        Route::get("","ExamResultController@index")->name("index");

        Route::get("/{id}","ExamResultController@detail")->name("detail");
        Route::post("/post","ExamResultController@post")->name("post");

    });

    });


Route::get('createcaptcha', 'App\Http\Controllers\CaptchaController@create');
Route::post('captcha', 'App\Http\Controllers\CaptchaController@captchaValidate');
Route::get('refreshcaptcha', 'App\Http\Controllers\CaptchaController@refreshCaptcha');




Route::namespace("App\Http\Controllers\Front")->group(function (){
    Route::get('/', 'HomeController@index')->name('index');
    Route::post('/', 'HomeController@save')->name('savemail');
    Route::get('emaildelete/{slug}', 'HomeController@delete')->name('delete');
/*-----------------------------------Service Front------------------------------------------------------------*/
    Route::prefix("hizmetler")->as("service.")->group(function (){
        Route::get('/{slug}', 'ServiceController@index')->name('index');
        Route::get('/detay/{slug}', 'ServiceController@detail')->name('detail');
    });
    /*-----------------------------------Service Front------------------------------------------------------------*/

    /*-----------------------------------Language Front------------------------------------------------------------*/
    Route::prefix("diller")->as("language.")->group(function (){
        Route::get('/', 'LanguageController@index')->name('index');
        Route::get('/detay/{slug}', 'LanguageController@detail')->name('detail');
    });
    /*-----------------------------------Language Front------------------------------------------------------------*/

    /*-----------------------------------Campiaing Front------------------------------------------------------------*/
    Route::prefix("kampanyalarımız")->as("campaing.")->group(function (){
        Route::get('/', 'CampingController@index')->name('index');
        Route::get('/detay/{slug}', 'CampingController@detail')->name('detail');
    });
    /*-----------------------------------Campaing Front------------------------------------------------------------*/

    /*-----------------------------------Contact Front------------------------------------------------------------*/
    Route::prefix("iletisim")->as("contact.")->group(function (){
        Route::get('/', 'ContactController@index')->name('index');
        Route::post('/', 'ContactController@post')->name('post');
    });
    /*-----------------------------------Contact Front------------------------------------------------------------*/

    /*-----------------------------------About Front------------------------------------------------------------*/
    Route::prefix("hakkımızda")->as("about.")->group(function (){
        Route::get('/', 'AboutController@index')->name('index');

    });
    /*-----------------------------------About Front------------------------------------------------------------*/
    /*-----------------------------------Whyuse Front------------------------------------------------------------*/
    Route::prefix("nedenbiz")->as("whyus.")->group(function (){
        Route::get('/', 'WhyusController@index')->name('index');

    });
    /*-----------------------------------Whyuse Front------------------------------------------------------------*/
    /*-----------------------------------Foto Galery Front------------------------------------------------------------*/
    Route::prefix("galeri")->as("image.")->group(function (){
        Route::get('/', 'ImageController@index')->name('index');

    });
    /*-----------------------------------Foto Galery Front------------------------------------------------------------*/

    /*-----------------------------------Referans Front------------------------------------------------------------*/
    Route::prefix("referanslarımız")->as("refrans.")->group(function (){
        Route::get('/', 'RefransController@index')->name('index');

    });
    /*-----------------------------------Referans Front------------------------------------------------------------*/

    /*-----------------------------------Whyuse Front------------------------------------------------------------*/
    Route::prefix("video")->as("video.")->group(function (){
        Route::get('/', 'VideoController@index')->name('index');

    });
    /*-----------------------------------Whyuse Front------------------------------------------------------------*/


    /*-----------------------------------Whyuse Front------------------------------------------------------------*/
    Route::prefix("onkayit")->as("registration.")->group(function (){
        Route::get('/', 'RegistrationController@index')->name('index');
        Route::post('/', 'RegistrationController@post')->name('post');

    });
    Route::prefix("placementtest")->as("placement.")->group(function (){
        Route::get('/', 'PlacementController@index')->name('index');
        Route::post('/', 'PlacementController@post')->name('post');

    });
    /*-----------------------------------Whyuse Front------------------------------------------------------------*/
});


Route::middleware(['auth:sanctum', 'authority'])->namespace("App\Http\Controllers\Back")->prefix("admin")->as("admin.")->group(function ()
{Route::get("/dashboard",'HomeController@index')->name('dashboard');


        /* Egitim rotue --------------------------------------------------------------------------------*/
    Route::prefix("egitim")->as("egitim.")->group(function (){
        Route::get('', 'CategoryController@index')->name('index');
        Route::get('/add', 'CategoryController@add')->name('add');
        Route::get('/delete/{id}', 'CategoryController@delete')->name('delete');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('edit');
        Route::post('/post', 'CategoryController@post')->name('post');
        Route::post('/put/{id}', 'CategoryController@put')->name('put');
        Route::post('/deletall', 'CategoryController@deleteall')->name('deleteall');
    });
    /* Egitim rotue------------------------------------------------------------------------------------ */

    /* Silider rotue------------------------------------------------------------------------------------ */
        Route::prefix("slider")->as("slider.")->group(function (){
            Route::get('/', 'sliderController@index')->name('index');
            Route::get('/add', 'sliderController@add')->name('add');
            Route::get('/delete/{id}', 'sliderController@delete')->name('delete');
            Route::get('/change/{id}', 'sliderController@change')->name('change');
            Route::get('/edit/{id}', 'sliderController@edit')->name('edit');
            Route::post('/post', 'sliderController@post')->name('post');
            Route::post('/put/{id}', 'sliderController@put')->name('put');
            Route::post('/deletall', 'sliderController@deleteall')->name('deleteall');
        } );
    /* Silider rotue------------------------------------------------------------------------------------ */
    /* image Galery---------------------------------------------------------------------------------------- */
        Route::prefix("image")->as("image.")->group(function (){
            Route::get('/', 'ImageController@index')->name('index');
            Route::get('/add', 'ImageController@add')->name('add');
            Route::get('/delete/{id}', 'ImageController@delete')->name('delete');
            Route::get('/change/{id}', 'ImageController@change')->name('change');
            Route::get('/edit/{id}', 'ImageController@edit')->name('edit');
            Route::post('/post', 'ImageController@post')->name('post');
            Route::post('/put/{id}', 'ImageController@put')->name('put');
            Route::post('/deletall', 'ImageController@deleteall')->name('deleteall');
        } );
    /* image Galery---------------------------------------------------------------------------------------- */
        /* Video Galery---------------------------------------------------------------------------------------- */
        Route::prefix("video")->as("video.")->group(function (){
            Route::get('/', 'VideoController@index')->name('index');
            Route::get('/add', 'VideoController@add')->name('add');
            Route::get('/delete/{id}', 'VideoController@delete')->name('delete');
            Route::get('/change/{id}', 'VideoController@change')->name('change');
            Route::get('/edit/{id}', 'VideoController@edit')->name('edit');
            Route::post('/post', 'VideoController@post')->name('post');
            Route::post('/put/{id}', 'VideoController@put')->name('put');
            Route::post('/deletall', 'VideoController@deleteall')->name('deleteall');
        } );
        /* Video Galery---------------------------------------------------------------------------------------- */
        /* Refarans ---------------------------------------------------------------------------------------- */
        Route::prefix("refrans")->as("refrans.")->group(function (){
            Route::get('/', 'RefaransController@index')->name('index');
            Route::get('/add', 'RefaransController@add')->name('add');
            Route::get('/delete/{id}', 'RefaransController@delete')->name('delete');
            Route::get('/change/{id}', 'RefaransController@change')->name('change');
            Route::get('/edit/{id}', 'RefaransController@edit')->name('edit');
            Route::post('/post', 'RefaransController@post')->name('post');
            Route::post('/put/{id}', 'RefaransController@put')->name('put');
            Route::post('/deletall', 'RefaransController@deleteall')->name('deleteall');
        } );
        /* Refarans ---------------------------------------------------------------------------------------- */
        /* About ---------------------------------------------------------------------------------------- */
        Route::prefix("hakkımda")->as("hakkımda.")->group(function (){
            Route::get('/', 'AboutController@index')->name('index');
            Route::get('/delete/{id}', 'AboutController@delete')->name('delete');
            Route::post('/put/{id}', 'AboutController@put')->name('put');
        } );
        /* About ---------------------------------------------------------------------------------------- */
        /* Refarans ---------------------------------------------------------------------------------------- */
        Route::prefix("whyus")->as("whyus.")->group(function (){
            Route::get('/', 'WhyusController@index')->name('index');
            Route::get('/delete/{id}', 'WhyusController@delete')->name('delete');
            Route::post('/post', 'WhyusController@post')->name('post');
            Route::post('/put/', 'WhyusController@put')->name('put');
            Route::post('/deletall', 'WhyusController@deleteall')->name('deleteall');
        } );
        /* Refarans ---------------------------------------------------------------------------------------- */
        /* Campaing rotue --------------------------------------------------------------------------------*/
        Route::prefix("campaing")->as("campaing.")->group(function (){
            Route::get('', 'CampaingController@index')->name('index');
            Route::get('/add', 'CampaingController@add')->name('add');
            Route::get('/delete/{id}', 'CampaingController@delete')->name('delete');
            Route::get('/edit/{id}', 'CampaingController@edit')->name('edit');
            Route::post('/post', 'CampaingController@post')->name('post');
            Route::post('/put/{id}', 'CampaingController@put')->name('put');
            Route::post('/deletall', 'CampaingController@deleteall')->name('deleteall');
        });
        /* Campaing rotue------------------------------------------------------------------------------------ */
        /* Contact rotue --------------------------------------------------------------------------------*/
        Route::prefix("contact")->as("contact.")->group(function (){
            Route::get('', 'ContactController@index')->name('index');
            Route::get('/delete/{id}', 'ContactController@delete')->name('delete');
            Route::post('/getmesage', 'ContactController@getmessage')->name('getmessage');
            Route::post('/deletall', 'ContactController@deleteall')->name('deleteall');
        });
        /* Contact rotue------------------------------------------------------------------------------------ */

        /* language rotue --------------------------------------------------------------------------------*/
        Route::prefix("language")->as("language.")->group(function (){
            Route::get('/', 'LanguegeController@index')->name('index');
            Route::get('/add', 'LanguegeController@add')->name('add');
            Route::get('/delete/{id}', 'LanguegeController@delete')->name('delete');
            Route::get('/edit/{id}', 'LanguegeController@edit')->name('edit');
            Route::post('/post', 'LanguegeController@post')->name('post');
            Route::post('/put/{id}', 'LanguegeController@put')->name('put');
            Route::post('/deletall', 'LanguegeController@deleteall')->name('deleteall');
        });
        /* language rotue------------------------------------------------------------------------------------ */
        /* Popup ---------------------------------------------------------------------------------------- */
        Route::prefix("popup")->as("popup.")->group(function (){
            Route::get('/', 'PopupController@index')->name('index');
            Route::get('/delete/{id}', 'PopupController@delete')->name('delete');
            Route::post('/put/{id}', 'PopupController@put')->name('put');
        } );
        /* Popup ---------------------------------------------------------------------------------------- */
        /* Contact rotue --------------------------------------------------------------------------------*/
        Route::prefix("abone")->as("abone.")->group(function (){
            Route::get('/abone', 'AboneController@index')->name('index');
            Route::post('/abone/mail', 'AboneController@post')->name('post');

        });
        /* Contact rotue------------------------------------------------------------------------------------ */

        /* Ön Kayıt rotue --------------------------------------------------------------------------------*/
        Route::prefix("onkayit")->as("onkayit.")->group(function (){
            Route::get('/', 'RegistrationController@index')->name('index');
            Route::get('/add', 'RegistrationController@add')->name('detail');
            Route::get('/delete/{id}', 'RegistrationController@delete')->name('delete');
            Route::get('/detail/{id}', 'RegistrationController@detail')->name('detail');
            Route::post('/post', 'RegistrationController@post')->name('post');
            Route::post('/put/{id}', 'RegistrationController@put')->name('put');
            Route::post('/deletall', 'RegistrationController@deleteall')->name('deleteall');
        });
        /* Ön Kayıt rotue------------------------------------------------------------------------------------ */
        /* Seviye Sınavı rotue --------------------------------------------------------------------------------*/
        Route::prefix("seviyesinav")->as("seviyesinav.")->group(function (){
            Route::get('/', 'PlacementController@index')->name('index');
            Route::get('/add', 'PlacementController@add')->name('add');
            Route::get('/delete/{id}', 'PlacementController@delete')->name('delete');
            Route::get('/edit/{id}', 'PlacementController@edit')->name('edit');
            Route::post('/post', 'PlacementController@post')->name('post');
            Route::post('/put/{id}', 'PlacementController@put')->name('put');
            Route::post('/deletall', 'PlacementController@deleteall')->name('deleteall');
        });
        /* Seviye Sınavı rotue------------------------------------------------------------------------------------ */
        /* Seviye Sınavı sonuc  rotue --------------------------------------------------------------------------------*/
        Route::prefix("seviyesinavsonuc")->as("resultplacement.")->group(function (){
            Route::get('/', 'ResultPlacementController@index')->name('index');
            Route::get('detail/{id}', 'ResultPlacementController@detail')->name('detail');
            Route::get('/add', 'ResultPlacementController@add')->name('add');
            Route::get('/delete/{id}', 'ResultPlacementController@delete')->name('delete');
            Route::get('/edit/{id}', 'ResultPlacementController@edit')->name('edit');
            Route::post('/post', 'ResultPlacementController@post')->name('post');
            Route::post('/put/{id}', 'ResultPlacementController@put')->name('put');
            Route::post('/deletall', 'ResultPlacementController@deleteall')->name('deleteall');
        });
        /* Seviye Sınavı  sonuc rotue------------------------------------------------------------------------------------ */
        /* Privacy ---------------------------------------------------------------------------------------- */
        Route::prefix("sözlesme")->as("privacy.")->group(function (){
            Route::get('/', 'PrivacyController@index')->name('index');
            Route::get('/delete/{id}', 'PrivacyController@delete')->name('delete');
            Route::post('/put/{id}', 'PrivacyController@put')->name('put');
        } );
        /* Privacy ---------------------------------------------------------------------------------------- */
        /* Kullanıcı Ekleme  rotue --------------------------------------------------------------------------------*/
        Route::prefix("ogrenci")->as("users.")->group(function (){
            Route::get('/', 'UserController@index')->name('index');
            Route::get('edit/{id}', 'UserController@detail')->name('edit');
            Route::get('/add', 'UserController@add')->name('add');
            Route::get('/delete/{id}', 'UserController@delete')->name('delete');
            Route::get('/edit/{id}', 'UserController@edit')->name('edit');
            Route::post('/post', 'UserController@post')->name('post');
            Route::post('/put/{id}', 'UserController@put')->name('put');
            Route::post('/deletall', 'UserController@deleteall')->name('deleteall');
        });
        /* Kullanıcı Ekleme  rotue------------------------------------------------------------------------------------ */
        /* Sınav Ekleme  rotue --------------------------------------------------------------------------------*/
        Route::prefix("sinav")->as("exam.")->group(function (){
            Route::get('/', 'ExamController@index')->name('index');
            Route::get('edit/{id}', 'ExamController@detail')->name('edit');
            Route::get('/add', 'ExamController@add')->name('add');
            Route::get('/delete/{id}', 'ExamController@delete')->name('delete');
            Route::get('/edit/{id}', 'ExamController@edit')->name('edit');
            Route::post('/post', 'ExamController@post')->name('post');
            Route::post('/put/{id}', 'ExamController@put')->name('put');
            Route::post('/deletall', 'ExamController@deleteall')->name('deleteall');
            Route::post('/total', 'ExamController@total')->name('total');
        });
        /* Sınav Ekleme  rotue------------------------------------------------------------------------------------ */
        /* Sınav Ekleme  rotue --------------------------------------------------------------------------------*/
        Route::prefix("sinavsonuc")->as("examresult.")->group(function (){
            Route::get('/', 'ExamResultController@index')->name('index');
            Route::get('detail/{id}', 'ExamResultController@detail')->name('detail');
            Route::get('/add', 'ExamResultController@add')->name('add');
            Route::get('/update/{id}', 'ExamResultController@update')->name('update');
            Route::get('/delete/{id}', 'ExamResultController@delete')->name('delete');
            Route::get('/edit/{id}', 'ExamResultController@edit')->name('edit');
            Route::post('/post', 'ExamResultController@post')->name('post');
            Route::post('/put/{id}', 'ExamResultController@put')->name('put');
            Route::post('/deletall', 'ExamResultController@deleteall')->name('deleteall');
            Route::post('/total', 'ExamResultController@total')->name('total');
        });
        /* Sınav Ekleme  rotue------------------------------------------------------------------------------------ */

    /* Admin Ekleme  rotue --------------------------------------------------------------------------------*/
    Route::prefix("")->as("admin.")->group(function (){
        Route::get('/', 'AdminController@index')->name('index');
        Route::get('edit/{id}', 'AdminController@detail')->name('edit');
        Route::get('/add', 'AdminController@add')->name('add');
        Route::get('/delete/{id}', 'AdminController@delete')->name('delete');
        Route::get('/edit/{id}', 'AdminController@edit')->name('edit');
        Route::post('/post', 'AdminController@post')->name('post');
        Route::post('/put/{id}', 'AdminController@put')->name('put');
        Route::post('/deletall', 'AdminController@deleteall')->name('deleteall');
    });
    /* Admin Ekleme  rotue------------------------------------------------------------------------------------ */

});
