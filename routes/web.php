<?php
require 'define.php';
//use \Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::get('/403', function () {
    return view('errors.403');
})->name('unauthorised');

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect'],
    //'middleware' => ['localize'] // Route translate middleware
], function () {

    Auth::routes();

    Route::get('/','IndexController@index')->name('getHome');
    Route::get('/home','IndexController@index')->name('getIndex');
    Route::get('pdfview',array('as'=>'pdfview','uses'=>'IndexController@pdfview'));
    Route::get('pdfview2',array('as'=>'pdfview2','uses'=>'IndexController@pdfview2'));

    Route::get('/member/login', function () {
        return view('front.auth.login');
    })->name('customLogin');
    Route::get('/member/register', function () {
        return view('front.auth.register');
    })->name('customRegister');
    Route::post('/member/register', ['uses' => 'Auth\LoginController@customRegister']);
    Route::get('/', 'IndexController@index')->name('getHome');


    Route::group(['middleware' => ['web', 'auth', 'access']], function () {
        Route::get('/study-view/{studyID}', 'StudiesController@studyView')->name('getStudyView');
        Route::get('/get-pdf/{studyID}', 'StudiesController@genreatePdf')->name('genreatePdf');


        Route::get('/get-id', ['uses' => 'StudiesController@getUserId', 'as' => 'getAl']);

        Route::get('/profile/{userId}',['uses'=>'StudiesController@getUserStudies','as'=>'getUserStudies']);
        Route::group(['prefix' => 'steps'], function () {
            Route::get('/', function () {
                return view('front.layouts.front_layout');
            });
            Route::get('one', function () {
                return view('front.steps.step_one');
            })->name('step_one');
            /*Route::get('two', function () {
                return view('front.steps.step_two');
            })->name('step_two');
            Route::get('three', function () {
                return view('front.steps.step_three');
            })->name('step_three');
            Route::get('four', function () {
                return view('front.steps.step_four');
            })->name('step_four');
            Route::get('five', function () {
                return view('front.steps.step_five');
            })->name('step_five');
            Route::get('six', function () {
                return view('front.steps.step_six');
            })->name('step_six');
            Route::get('seven', function () {
                return view('front.steps.step_seven');
            })->name('step_seven');
            Route::get('eight', function () {
                return view('front.steps.step_eight');
            })->name('step_eight');*/
        });
        Route::group(['prefix' => 'super'], function () {
            Route::get('/home', 'HomeController@index')->name('getBackendHome');
            Route::group(['prefix' => 'users'], function () {
                //Users
                Route::get('/', ['uses' => 'UserController@index', 'as' => 'getAllUsers']);
                Route::get('/add-user', ['uses' => 'UserController@create', 'as' => 'getAddUser']);
                Route::post('/add-user', ['uses' => 'UserController@store', 'as' => 'postAddUser']);
                Route::get('/user/{userId}', ['uses' => 'UserController@edit', 'as' => 'getUserById']);
                Route::put('/user/{userId}', ['uses' => 'UserController@update', 'as' => 'updateUserById']);
                Route::post('/user/{userId}', ['uses' => 'UserController@delete', 'as' => 'deleteUserById']);
            });
            Route::group(['prefix' => 'deprecations'], function () {
                //Deprecations
                Route::get('/', ['uses' => 'DeprecationController@index', 'as' => 'getAllDeprecations']);
                Route::get('/add-deprecation', ['uses' => 'DeprecationController@create', 'as' => 'getAddDeprecation']);
                Route::post('/add-deprecation', ['uses' => 'DeprecationController@store', 'as' => 'postAddDeprecation']);
                Route::get('/deprecation/{deprecationId}', ['uses' => 'DeprecationController@edit', 'as' => 'getDeprecationById']);
                Route::put('/deprecation/{deprecationId}', ['uses' => 'DeprecationController@update', 'as' => 'updateDeprecationById']);
                Route::post('/deprecation/{deprecationId}', ['uses' => 'DeprecationController@delete', 'as' => 'deleteDeprecationById']);
            });
            Route::group(['prefix' => 'studies'], function () {
                //Studies
                Route::get('/', ['uses' => 'StudiesController@index', 'as' => 'getAllStudies']);
                Route::get('/add-study', ['uses' => 'StudiesController@create', 'as' => 'getAddStudy']);
                Route::post('/add-study', ['uses' => 'StudiesController@store', 'as' => 'postAddStudy']);
                Route::get('/study/{studyId}', ['uses' => 'StudiesController@edit', 'as' => 'getStudyById']);
                Route::put('/study/{studyId}', ['uses' => 'StudiesController@update', 'as' => 'updateStudyById']);
                Route::post('/study/{studyId}', ['uses' => 'StudiesController@delete', 'as' => 'deleteStudyById']);
            });
            Route::group(['prefix' => 'sectors'], function () {
                //Sectors
                Route::get('/', ['uses' => 'SectorController@index', 'as' => 'getAllSectors']);
                Route::get('/add-sector', ['uses' => 'SectorController@create', 'as' => 'getAddSector']);
                Route::post('/add-sector', ['uses' => 'SectorController@store', 'as' => 'postAddSector']);
                Route::get('/sector/{sectorId}', ['uses' => 'SectorController@edit', 'as' => 'getSectorById']);
                Route::put('/sector/{sectorId}', ['uses' => 'SectorController@update', 'as' => 'updateSectorById']);
                Route::post('/sector/{sectorId}', ['uses' => 'SectorController@delete', 'as' => 'deleteSectorById']);
            });
            Route::group(['prefix' => 'ajax'], function () {
                //Ajax
                Route::post('/getCities', ['uses' => 'AjaxController@getCities', 'as' => 'getCities']);
            });
            Route::group(['prefix' => 'currencies'], function () {
                //Currencies
                Route::get('/', ['uses' => 'CurrencyController@index', 'as' => 'getAllCurrencies']);
                Route::get('/add-currency', ['uses' => 'CurrencyController@create', 'as' => 'getAddCurrency']);
                Route::post('/add-currency', ['uses' => 'CurrencyController@store', 'as' => 'postAddCurrency']);
                Route::get('/currency/{currencyId}', ['uses' => 'CurrencyController@edit', 'as' => 'getCurrencyById']);
                Route::put('/currency/{currencyId}', ['uses' => 'CurrencyController@update', 'as' => 'updateCurrencyById']);
                Route::post('/currency/{currencyId}', ['uses' => 'CurrencyController@delete', 'as' => 'deleteCurrencyById']);
            });
            Route::group(['prefix' => 'units'], function () {
                //Unites
                Route::get('/', ['uses' => 'UnitController@index', 'as' => 'getAllUnites']);
                Route::get('/add-unit', ['uses' => 'UnitController@create', 'as' => 'getAddUnit']);
                Route::post('/add-unit', ['uses' => 'UnitController@store', 'as' => 'postAddUnit']);
                Route::get('/unit/{unitId}', ['uses' => 'UnitController@edit', 'as' => 'getUnitById']);
                Route::put('/unit/{unitId}', ['uses' => 'UnitController@update', 'as' => 'updateUnitById']);
                Route::post('/unit/{unitId}', ['uses' => 'UnitController@delete', 'as' => 'deleteUnitById']);
            });
            Route::group(['prefix' => 'countries'], function () {
                //Sectors
                Route::get('/', ['uses' => 'CountryController@index', 'as' => 'getAllCountries']);
                Route::get('/add-country', ['uses' => 'CountryController@create', 'as' => 'getAddCountry']);
                Route::post('/add-country', ['uses' => 'CountryController@store', 'as' => 'postAddCountry']);
                Route::get('/country/{countryId}', ['uses' => 'CountryController@edit', 'as' => 'getCountryById']);
                Route::put('/country/{countryId}', ['uses' => 'CountryController@update', 'as' => 'updateCountryById']);
                Route::post('/country/{countryId}', ['uses' => 'CountryController@delete', 'as' => 'deleteCountryById']);
            });
            Route::group(['prefix' => 'cities/{country_id}'], function () {
                //Sectors
                Route::get('/', ['uses' => 'CityController@index', 'as' => 'getAllCities']);
                Route::get('/add-city', ['uses' => 'CityController@create', 'as' => 'getAddCity']);
                Route::post('/add-city', ['uses' => 'CityController@store', 'as' => 'postAddCity']);
                Route::get('/city/{cityId}', ['uses' => 'CityController@edit', 'as' => 'getCityById']);
                Route::put('/city/{cityId}', ['uses' => 'CityController@update', 'as' => 'updateCityById']);
                Route::post('/city/{cityId}', ['uses' => 'CityController@delete', 'as' => 'deleteCityById']);
            });
            //Studies Routes
            Route::group(['prefix' => 'study-assets'], function () {
                Route::get('/index/{study_id}', ['uses' => 'AssetController@index', 'as' => 'getAllAssetsByStudy']);
                Route::get('/', ['uses' => 'AssetController@index', 'as' => 'getAllAssets']);
                Route::get('/add-study-assets', ['uses' => 'AssetController@create', 'as' => 'getAddAsset']);
                Route::post('/add-study-assets', ['uses' => 'AssetController@store', 'as' => 'postAddAsset']);
                Route::get('/asset/{studyAssetsId}', ['uses' => 'AssetController@edit', 'as' => 'getAssetById']);
                Route::put('/asset/{studyAssetsId}', ['uses' => 'AssetController@update', 'as' => 'updateAssetById']);
                Route::post('/asset/{studyAssetsId}', ['uses' => 'AssetController@delete', 'as' => 'deleteAssetById']);
            });
            //Study Sectors
            Route::group(['prefix' => 'study-sectors'], function () {
                Route::get('/index/{study_id}', ['uses' => 'StudiesSectorController@index', 'as' => 'getAllStudiesSectorsByStudy']);
                Route::get('/', ['uses' => 'StudiesSectorController@index', 'as' => 'getAllStudiesSectors']);
                Route::get('/add-sector', ['uses' => 'StudiesSectorController@create', 'as' => 'getAddStudiesSector']);
                Route::post('/add-sector', ['uses' => 'StudiesSectorController@store', 'as' => 'postAddStudiesSector']);
                Route::get('/sector/{sectorId}', ['uses' => 'StudiesSectorController@edit', 'as' => 'getStudiesSectorById']);
                Route::put('/sector/{sectorId}', ['uses' => 'StudiesSectorController@update', 'as' => 'updateStudiesSectorById']);
                Route::post('/sector/{sectorId}', ['uses' => 'StudiesSectorController@delete', 'as' => 'deleteStudiesSectorById']);
            });
            //Marketing
            Route::group(['prefix' => 'marketing'], function () {
                Route::get('/index/{study_id}', ['uses' => 'MarketingController@index', 'as' => 'getAllMarketingsByStudy']);
                Route::get('/', ['uses' => 'MarketingController@index', 'as' => 'getAllMarketings']);
                Route::get('/add-marketing', ['uses' => 'MarketingController@create', 'as' => 'getAddMarketing']);
                Route::post('/add-marketing', ['uses' => 'MarketingController@store', 'as' => 'postAddMarketing']);
                Route::get('/marketing/{marketingId}', ['uses' => 'MarketingController@edit', 'as' => 'getMarketingById']);
                Route::put('/marketing/{marketingId}', ['uses' => 'MarketingController@update', 'as' => 'updateMarketingById']);
                Route::post('/marketing/{marketingId}', ['uses' => 'MarketingController@delete', 'as' => 'deleteMarketingById']);
            });
            //FourAnalyzes
            Route::group(['prefix' => 'four-analyze'], function () {
                Route::get('/index/{study_id}', ['uses' => 'FourAnalyzeController@index', 'as' => 'getAllFourAnalyzesByStudy']);
                Route::get('/', ['uses' => 'FourAnalyzeController@index', 'as' => 'getAllFourAnalyzes']);
                Route::get('/add-four-analyze', ['uses' => 'FourAnalyzeController@create', 'as' => 'getAddFourAnalyze']);
                Route::post('/add-four-analyze', ['uses' => 'FourAnalyzeController@store', 'as' => 'postAddFourAnalyze']);
                Route::get('/four-analyze/{fourAnalyzeId}', ['uses' => 'FourAnalyzeController@edit', 'as' => 'getFourAnalyzeById']);
                Route::put('/four-analyze/{fourAnalyzeId}', ['uses' => 'FourAnalyzeController@update', 'as' => 'updateFourAnalyzeById']);
                Route::post('/four-analyze/{fourAnalyzeId}', ['uses' => 'FourAnalyzeController@delete', 'as' => 'deleteFourAnalyzeById']);
            });
            //Products
            Route::group(['prefix' => 'products'], function () {
                Route::get('/index/{study_id}', ['uses' => 'ProductController@index', 'as' => 'getAllProductsByStudy']);
                Route::get('/', ['uses' => 'ProductController@index', 'as' => 'getAllProducts']);
                Route::get('/add-product', ['uses' => 'ProductController@create', 'as' => 'getAddProduct']);
                Route::post('/add-product', ['uses' => 'ProductController@store', 'as' => 'postAddProduct']);
                Route::get('/product/{productId}', ['uses' => 'ProductController@edit', 'as' => 'getProductById']);
                Route::put('/product/{productId}', ['uses' => 'ProductController@update', 'as' => 'updateProductById']);
                Route::post('/product/{productId}', ['uses' => 'ProductController@delete', 'as' => 'deleteProductById']);
            });
            Route::group(['prefix' => 'study-competitors'], function () {
                //
                Route::get('/index/{study_id}', ['uses' => 'CompetitorController@index', 'as' => 'getAllCompetitorsByStudy']);
                Route::get('/', ['uses' => 'CompetitorController@index', 'as' => 'getAllCompetitors']);
                Route::get('/add-competitor', ['uses' => 'CompetitorController@create', 'as' => 'getAddCompetitor']);
                Route::post('/add-competitor', ['uses' => 'CompetitorController@store', 'as' => 'postAddCompetitor']);
                Route::get('/competitor/{competitorId}', ['uses' => 'CompetitorController@edit', 'as' => 'getCompetitorById']);
                Route::put('/competitor/{competitorId}', ['uses' => 'CompetitorController@update', 'as' => 'updateCompetitorById']);
                Route::post('/competitor/{competitorId}', ['uses' => 'CompetitorController@delete', 'as' => 'deleteCompetitorById']);
            });
            Route::group(['prefix' => 'study-raw-material'], function () {
                //
                Route::get('/index/{study_id}', ['uses' => 'RawMaterialController@index', 'as' => 'getAllRawMaterialsByStudy']);
                Route::get('/', ['uses' => 'RawMaterialController@index', 'as' => 'getAllRawMaterials']);
                Route::get('/add-raw-material', ['uses' => 'RawMaterialController@create', 'as' => 'getAddRawMaterial']);
                Route::post('/add-raw-material', ['uses' => 'RawMaterialController@store', 'as' => 'postAddRawMaterial']);
                Route::get('/raw-material/{rawMaterialId}', ['uses' => 'RawMaterialController@edit', 'as' => 'getRawMaterialById']);
                Route::put('/raw-material/{rawMaterialId}', ['uses' => 'RawMaterialController@update', 'as' => 'updateRawMaterialById']);
                Route::post('/raw-material/{rawMaterialId}', ['uses' => 'RawMaterialController@delete', 'as' => 'deleteRawMaterialById']);
            });
            Route::group(['prefix' => 'study-finance-investments'], function () {
                //
                Route::get('/index/{study_id}', ['uses' => 'FinanceInvestmentsController@index', 'as' => 'getAllFinanceInvestmentsByStudy']);
                Route::get('/', ['uses' => 'FinanceInvestmentsController@index', 'as' => 'getAllFinanceInvestments']);
                Route::get('/add-finance-investment', ['uses' => 'FinanceInvestmentsController@create', 'as' => 'getAddFinanceInvestment']);
                Route::post('/add-finance-investment', ['uses' => 'FinanceInvestmentsController@store', 'as' => 'postAddFinanceInvestment']);
                Route::get('/finance-investment/{FinInvId}', ['uses' => 'FinanceInvestmentsController@edit', 'as' => 'getFinanceInvestmentById']);
                Route::put('/finance-investment/{FinInvId}', ['uses' => 'FinanceInvestmentsController@update', 'as' => 'updateFinanceInvestmentById']);
                Route::post('/finance-investment/{FinInvId}', ['uses' => 'FinanceInvestmentsController@delete', 'as' => 'deleteFinanceInvestmentById']);
            });
            //Expense Categories
            Route::group(['prefix' => 'expense_categories'], function () {
                Route::get('/', ['uses' => 'ExpenseCategoriesController@index', 'as' => 'getAllExpenseCategories']);
                Route::get('/add-category', ['uses' => 'ExpenseCategoriesController@create', 'as' => 'getAddExpenseCategories']);
                Route::post('/add-category', ['uses' => 'ExpenseCategoriesController@store', 'as' => 'postAddExpenseCategories']);
                Route::get('/category/{expenseCategoryId}', ['uses' => 'ExpenseCategoriesController@edit', 'as' => 'getExpenseCategoriesById']);
                Route::put('/category/{expenseCategoryId}', ['uses' => 'ExpenseCategoriesController@update', 'as' => 'updateExpenseCategoriesById']);
                Route::post('/category/{expenseCategoryId}', ['uses' => 'ExpenseCategoriesController@delete', 'as' => 'deleteExpenseCategoriesById']);
            });
            //Expenses
            Route::group(['prefix' => 'expenses'], function () {
                Route::get('/index/{study_id}', ['uses' => 'ExpenseController@index', 'as' => 'getAllExpensesByStudy']);
                Route::get('/', ['uses' => 'ExpenseController@index', 'as' => 'getAllExpenses']);
                Route::get('/add-expense', ['uses' => 'ExpenseController@create', 'as' => 'getAddExpense']);
                Route::post('/add-expense', ['uses' => 'ExpenseController@store', 'as' => 'postAddExpense']);
                Route::get('/expense/{expenseId}', ['uses' => 'ExpenseController@edit', 'as' => 'getExpenseById']);
                Route::put('/expense/{expenseId}', ['uses' => 'ExpenseController@update', 'as' => 'updateExpenseById']);
                Route::post('/expense/{expenseId}', ['uses' => 'ExpenseController@delete', 'as' => 'deleteExpenseById']);
            });
            //Increase Rate
            Route::group(['prefix' => 'increases_rate'], function () {
                Route::get('/index/{study_id}', ['uses' => 'IncreaseRateController@index', 'as' => 'getAllIncreaseRatesByStudy']);
                Route::get('/', ['uses' => 'IncreaseRateController@index', 'as' => 'getAllIncreaseRates']);
                Route::get('/add-increase-rate', ['uses' => 'IncreaseRateController@create', 'as' => 'getAddIncreaseRate']);
                Route::post('/add-increase-rate', ['uses' => 'IncreaseRateController@store', 'as' => 'postAddIncreaseRate']);
                Route::get('/rate/{increaseRateId}', ['uses' => 'IncreaseRateController@edit', 'as' => 'getIncreaseRateById']);
                Route::put('/rate/{increaseRateId}', ['uses' => 'IncreaseRateController@update', 'as' => 'updateIncreaseRateById']);
                Route::post('/rate/{increaseRateId}', ['uses' => 'IncreaseRateController@delete', 'as' => 'deleteIncreaseRateById']);
            });
            //Contents
            Route::group(['prefix' => 'contents'], function () {
                //Route::get('/index/{content_id}', ['uses' => 'IncreaseRateController@index', 'as' => 'getAllIncreaseRatesByStudy']);
                Route::get('/', ['uses' => 'ContentController@index', 'as' => 'getAllContents']);
                Route::get('/add-content', ['uses' => 'ContentController@create', 'as' => 'getAddContent']);
                Route::post('/add-content', ['uses' => 'ContentController@store', 'as' => 'postAddContent']);
                Route::get('/content/{contentId}', ['uses' => 'ContentController@edit', 'as' => 'getContentById']);
                Route::put('/content/{contentId}', ['uses' => 'ContentController@update', 'as' => 'updateContentById']);
                Route::post('/content/{contentId}', ['uses' => 'ContentController@delete', 'as' => 'deleteContentById']);
            });
        });

    });
});