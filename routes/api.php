<?php

use Illuminate\Http\Request;
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
//Studies
Route::group(['prefix' => 'studies'], function () {
    Route::get('/', ['uses' => '\App\Repositories\StudyRepository@getAllStudies', 'as' => 'apiGetAllStudies']);
    Route::get('/study/{studyId}', ['uses' => '\App\Repositories\StudyRepository@getStudyById', 'as' => 'apiGetStudyById']);
    Route::post('/add-study', ['uses' => '\App\Repositories\StudyRepository@postAddStudy', 'as' => 'apiPostAddStudy']);
    Route::patch('/study/{studyId}', ['uses' => '\App\Repositories\StudyRepository@updateStudy', 'as' => 'apiUpdateStudyById']);
    Route::delete('/study/{studyId}', ['uses' => 'StudiesController@delete', 'as' => 'apiDeleteStudyById']);
    Route::get('/study-by-user-id/{userId}', ['uses' => '\App\Repositories\StudyRepository@getStudyByUserId', 'as' => 'apiGetStudyByUserId']);
    //Study Status
    Route::get('/status/{study_id}', ['uses' => '\App\Repositories\StudyRepository@getStatusByStudyId', 'as' => 'apiGetStatusByStudyId']);
    Route::post('/status', ['uses' => '\App\Repositories\StudyRepository@postAddStudyStatus', 'as' => 'apiPostAddStudyStatus']);
});
//Products
Route::group(['prefix' => 'products'], function () {
    Route::get('/{study_id}', ['uses' => '\App\Repositories\ProductRepository@getAllProducts', 'as' => 'apiGetAllProducts']);
    Route::post('/add-product', ['uses' => '\App\Repositories\ProductRepository@postAddProduct', 'as' => 'apiPostAddProduct']);
    Route::get('/product/{productId}', ['uses' => '\App\Repositories\ProductRepository@getProductById', 'as' => 'apiGetProductById']);
    Route::patch('/study/{studyId}', ['uses' => '\App\Repositories\ProductRepository@updateProduct', 'as' => 'apiUpdateProductById']);
    Route::delete('/product/{productId}', ['uses' => '\App\Repositories\ProductRepository@deleteProductById', 'as' => 'apiDeleteProductById']);
});
//Competitors
Route::group(['prefix' => 'study-competitors'], function () {
    Route::get('/{study_id}', ['uses' => '\App\Repositories\CompetitorRepository@getAllCompetitors', 'as' => 'apiGetAllCompetitors']);
    Route::post('/add-competitor', ['uses' => '\App\Repositories\CompetitorRepository@postAddCompetitor', 'as' => 'apiPostAddCompetitor']);
    Route::get('/competitor/{competitorId}', ['uses' => '\App\Repositories\CompetitorRepository@getCompetitorById', 'as' => 'apiGetCompetitorById']);
    Route::patch('/competitor/{competitorId}', ['uses' => '\App\Repositories\CompetitorRepository@updateCompetitor', 'as' => 'apiUpdateCompetitorById']);
    Route::delete('/competitor/{competitorId}', ['uses' => '\App\Repositories\CompetitorRepository@deleteCompetitorById', 'as' => 'apiDeleteCompetitorById']);
});
//Raw Materials
Route::group(['prefix' => 'study-raw-material'], function () {
    Route::get('/', ['uses' => '\App\Repositories\RawMaterialRepository@getAllRawMaterials', 'as' => 'apiGetAllRawMaterials']);
    Route::post('/add-raw-material', ['uses' => '\App\Repositories\RawMaterialRepository@postAddRawMaterial', 'as' => 'apiPostAddRawMaterial']);
    Route::get('/raw-material/{rawMaterialId}', ['uses' => '\App\Repositories\RawMaterialRepository@getRawMaterialById', 'as' => 'apiGetRawMaterialById']);
    Route::patch('/raw-material/{rawMaterialId}', ['uses' => '\App\Repositories\RawMaterialRepository@updateRawMaterial', 'as' => 'apiUpdateRawMaterialById']);
    Route::delete('/raw-material/{rawMaterialId}', ['uses' => '\App\Repositories\RawMaterialRepository@deleteRawMaterialById', 'as' => 'apiDeleteRawMaterialById']);
});
//Countries
Route::group(['prefix' => 'countries'], function () {
    Route::get('/', ['uses' => '\App\Repositories\CountryRepository@getAllCountries', 'as' => 'apiGetAllCountries']);
});
//Currencies
Route::group(['prefix' => 'currencies'], function () {
    Route::get('/', ['uses' => '\App\Repositories\CurrencyRepository@getAllCurrencies', 'as' => 'apiGetAllCurrencies']);
});
//Sectors
Route::group(['prefix' => 'sectors'], function () {
    Route::get('/', ['uses' => '\App\Repositories\SectorRepository@getAllSectors', 'as' => 'apiGetAllSectors']);
});
//Units
Route::group(['prefix' => 'unites'], function () {
    Route::get('/', ['uses' => '\App\Repositories\UnitRepository@getAllUnites', 'as' => 'apiGetAllUnits']);
});
//Study Sectors
Route::group(['prefix' => 'study-sectors'], function () {Route::get('/', ['uses' => 'StudiesSectorController@index', 'as' => 'getAllStudiesSectors']);
    Route::get('/{study_id}', ['uses' => '\App\Repositories\StudiesSectorRepository@getAllStudiesSectors', 'as' => 'apiGetAllStudiesSectors']);
    Route::post('/add-study-sector', ['uses' => '\App\Repositories\StudiesSectorRepository@postAddStudiesSector', 'as' => 'apiPostAddStudySector']);
});

//Study Marketings
Route::group(['prefix' => 'study-marketing'], function () {
    Route::get('/{study_id}', ['uses' => '\App\Repositories\MarketingRepository@getAllMarketings', 'as' => 'apiGetAllMarketings']);
    Route::post('/add-study-marketing', ['uses' => '\App\Repositories\MarketingRepository@postAddMarketing', 'as' => 'apiPostAddMarketing']);
});

//Study FourAnalyzes
Route::group(['prefix' => 'study-four-analyzes'], function () {
    Route::get('/{study_id}', ['uses' => '\App\Repositories\FourAnalyzeRepository@getAllFourAnalyzes', 'as' => 'apiGetAllFourAnalyzes']);
    Route::post('/add-study-four-analyzes', ['uses' => '\App\Repositories\FourAnalyzeRepository@postAddFourAnalyze', 'as' => 'apiPostAddFourAnalyze']);
});
//Increase Rate
Route::group(['prefix' => 'increase_rates'], function () {
    Route::get('/{study_id}', ['uses' => '\App\Repositories\IncreaseRateRepository@getAllIncreaseRates', 'as' => 'apiGetAllIncreaseRates']);
    Route::post('/add-increase-rate', ['uses' => '\App\Repositories\IncreaseRateRepository@postAddIncreaseRate', 'as' => 'apiPostAddIncreaseRate']);
});
//Study-raw-material
Route::group(['prefix' => 'study-raw-materials'], function () {
    Route::get('/{study_id}', ['uses' => '\App\Repositories\RawMaterialRepository@getAllRawMaterials', 'as' => 'apiGetAllRawMaterialsByStudy']);
    Route::post('/add-raw-material', ['uses' => '\App\Repositories\RawMaterialRepository@postAddRawMaterial', 'as' => 'apiPostAddRawMaterial']);
});
//Expense Categories
Route::group(['prefix' => 'expense_categories'], function () {
    Route::get('/', ['uses' => '\App\Repositories\ExpenseCategoriesRepository@getAllExpenseCategories', 'as' => 'apiGetAllExpenseCategories']);
    Route::get('/working-capital/{study_id}', ['uses' => '\App\Repositories\ExpenseRepository@getWorkingCapital', 'as' => 'apiGetWorkingCapital']);
});
//Expenses
Route::get('/benefits_and_services_expenses', ['uses' => '\App\Repositories\ExpenseRepository@getBenefitsAndServicesExpenses', 'as' => 'apiGetBenefitsAndServicesExpenses']);
Route::group(['prefix' => 'expenses'], function () {
    Route::get('/{study_id}', ['uses' => '\App\Repositories\ExpenseRepository@getAllExpenses', 'as' => 'apiGetAllExpenses']);
    Route::post('/add-expense', ['uses' => '\App\Repositories\ExpenseRepository@postAddExpense', 'as' => 'apiPostAddExpense']);
    Route::delete('/expense/{expenseId}', ['uses' => '\App\Repositories\ExpenseRepository@deleteExpenseById', 'as' => 'apiDeleteExpenseById']);
});
//Assets
Route::group(['prefix' => 'study-assets'], function () {
    Route::get('/{study_id}', ['uses' => '\App\Repositories\AssetRepository@getAllAsset', 'as' => 'apiGetAllAsset']);
    Route::post('/add-asset', ['uses' => '\App\Repositories\AssetRepository@postAddAsset', 'as' => 'apiPostAddAsset']);
    Route::delete('/asset/{assetId}', ['uses' => '\App\Repositories\AssetRepository@deleteAssetById', 'as' => 'apiDeleteAssetById']);

});
//Deprecations
Route::group(['prefix' => 'deprecations'], function () {
    Route::get('/', ['uses' => '\App\Repositories\DeprecationRepository@getAllDeprecation', 'as' => 'apiGetAllDeprecation']);
});

//Finance Investments
Route::group(['prefix' => 'study-finance-investments'], function () {
    Route::get('/{study_id}', ['uses' => '\App\Repositories\FinanceInvestmentsRepository@getAllFinanceInvestments', 'as' => 'apiGetAllFinanceInvestments']);
    Route::post('/add', ['uses' => '\App\Repositories\FinanceInvestmentsRepository@postAddFinanceInvestments', 'as' => 'apiPostAddFinanceInvestments']);
});