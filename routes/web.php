<?php

use App\Http\Controllers\Admins\AdminDashboardController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;
use App\Models\Projet;
use Inertia\Inertia;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/projets', 'App\Http\Controllers\ProjetController@index')->name('projets.index');    
Route::get('/projets/{id}', 'App\Http\Controllers\ProjetController@show')->name('projets.show');    
Route::get('/addProject', 'App\Http\Controllers\ProjetController@addProject')->name('projets.addProject');    
Route::post('/addProject/store', 'App\Http\Controllers\ProjetController@addProjectStore')->name('projets.addProjectStore');    
Route::post('/financements/store', 'App\Http\Controllers\ProjetController@addFinancementStore')->name('projets.addFinancementStore');    



Route::group([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
], function (){
    Route::get('/addProject/addProjectForm', 'App\Http\Controllers\ProjetController@addProjectForm')->name('projets.addProjectForm');    
    Route::get('/projets/{id}/addFinance', 'App\Http\Controllers\ProjetController@addFinance')->name('projets.addFinace');    

});


Route::prefix('admin')->middleware(['auth:sanctum','verified'])->name('admin.')->group
(function(){
    Route::get('dashboard',[App\Http\Controllers\Admins\AdminDashboardController::class,'index'])->name('dashboard');

    Route::prefix('roles')->name('roles.')->group(function(){
        Route::get('/',[App\Http\Controllers\Admins\RoleController::class,'index'])->name('index');
        Route::post('/store',[App\Http\Controllers\Admins\RoleController::class,'store'])->name('store');
        Route::get('/edit/{id}',[App\Http\Controllers\Admins\RoleController::class,'edit'])->name('edit'); 
        Route::put('/update/{id}',[App\Http\Controllers\Admins\RoleController::class,'update'])->name('update');
        Route::delete('/delete/{id}',[App\Http\Controllers\Admins\RoleController::class, 'destroy'])->name('destroy');
        Route::get('/role-edit/{id}',[App\Http\Controllers\Admins\RoleController::class,'registeredit'])->name('registeredit');
        Route::put('/role-register-update/{id}',[App\Http\Controllers\Admins\RoleController::class,'registerupdate'])->name('registerupdate');

            
    });
    Route::prefix('gestionnaires')->name('gestionnaires.')->group(function(){
        Route::get('/',[App\Http\Controllers\Admins\GestionnaireController::class,'index'])->name('index');
        Route::get('/create',[App\Http\Controllers\Admins\GestionnaireController::class,'create'])->name('create');
        Route::post('/addUser',[App\Http\Controllers\Admins\GestionnaireController::class,'adduser'])->name('adduser');
        Route::post('/store',[App\Http\Controllers\Admins\GestionnaireController::class,'store'])->name('store');
        Route::get('/edit/{id}',[App\Http\Controllers\Admins\GestionnaireController::class,'edit'])->name('edit');
        Route::put('/update',[App\Http\Controllers\Admins\GestionnaireController::class,'update'])->name('update');
        Route::get('/status-edit/{id}',[App\Http\Controllers\Admins\GestionnaireController::class,'editstatus'])->name('editstatus');
        Route::put('/status-update/{id}',[App\Http\Controllers\Admins\GestionnaireController::class,'updatestatus'])->name('updatestatus');
        Route::get('/gestionnaires-edit/{id}',[App\Http\Controllers\Admins\GestionnaireController::class,'gestionnairesedit'])->name('gestionnairesedit');
        Route::put('/gestionnaires-update/{id}',[App\Http\Controllers\Admins\GestionnaireController::class,'gestionnairesupdate'])->name('gestionnairesupdate');
        
        //Route::delete('/delete/{id}',[App\Http\Controllers\Admins\RoleController::class, 'delete'])->name('delete');
    });

    Route::prefix('projets')->name('projets.')->group(function(){
        Route::get('/',[App\Http\Controllers\Admins\AdminProjetController::class,'index'])->name('index');
        Route::get('/modif/{id}',[App\Http\Controllers\Admins\AdminProjetController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[App\Http\Controllers\Admins\AdminProjetController::class,'update'])->name('update');

    });

    Route::prefix('profils')->name('profils.')->group(function(){
        Route::get('/',[App\Http\Controllers\Admins\AdminProfilController::class,'index'])->name('index');
        Route::get('/modif/{id}',[App\Http\Controllers\Admins\AdminProjetController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[App\Http\Controllers\Admins\AdminProjetController::class,'update'])->name('update');

    });

    Route::prefix('financements')->name('financements')->group(function(){
        Route::get('/',[App\Http\Controllers\Admins\AdminFinancementController::class,'index'])->name('index');
        Route::get('/modif/{id}',[App\Http\Controllers\Admins\AdminFinancementController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[App\Http\Controllers\Admins\AdminFinancementController::class,'update'])->name('update');
        Route::post('/store',[App\Http\Controllers\Admins\AdminFinancementController::class,'store'])->name('store');
        Route::get('/edit/{id}',[App\Http\Controllers\Admins\GestionnaireController::class,'edit'])->name('edit');
        //Route::put('/update',[App\Http\Controllers\Admins\GestionnaireController::class,'update'])->name('update');
        Route::get('/status-edit/{id}',[App\Http\Controllers\Admins\GestionnaireController::class,'editstatus'])->name('editstatus');
        Route::put('/status-update/{id}',[App\Http\Controllers\Admins\GestionnaireController::class,'updatestatus'])->name('updatestatus');

    });


});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $projets = Projet::withCount('financement')->get();
        return Inertia::render('Dashboard',['projets' => $projets]);
    })->name('dashboard');
    
    Route::get("/redirectAuthenticatedUsers", [App\Http\Controllers\Auth\RedirectAuthenticatedUsersController::class, "home"]);

    Route::group(['middleware' => 'checkRole:1'], function() {
        return view('admin.dashboard')->name('adminDashboard');
    });
    Route::group(['middleware' => 'checkRole:0'], function() {
        Route::inertia('/Dashboard', 'Dashboard')->name('Dashboard');
    });
});





