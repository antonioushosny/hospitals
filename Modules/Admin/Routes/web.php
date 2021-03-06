<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/auth/redirect/{provider}', 'front\SocialController@redirect');
Route::get('/callback/{provider}', 'front\SocialController@callback');

 
Route::prefix('admin')
->name('admin.')->namespace('Admin')
->group(function () {
	/**
	 * Auth Routes
	 */
    Route::get('login', 'AuthController@getLogin')->name('auth.getLogin')->middleware('guest:admin');
    Route::post('login', 'AuthController@postLogin')->name('auth.postLogin');

    Route::middleware(['auth:admin', 'check_permission'])->group(function() {

		/**
		 * Auth Routes
		 */
	    Route::get('logout', 'AuthController@logout')->name('auth.logout');

		/**
		 * Dashboard Routes
		 */
	    Route::get('/', 'DashboardController@home')->name('dashboard.home');

	    // this sort based on Website Menu in Navbar

	    /**
		 * Info Routes
		 */
	    Route::resource('infos', 'InfosController')->except([ 'create', 'store', 'destroy' ]);
 
	    /**
		 * Advertisements Routes
		 */
	    Route::resource('advertisements', 'AdvertisementsController');

	  	/**
		 * News Routes
		 */
	    Route::resource('news', 'NewsController');

	  	/**
		 * countries Routes
		 */
		Route::resource('countries', 'CountriesController');

		/**
		 * cities Routes
		 */
		Route::resource('cities', 'CitiesController');

		/**
		 * areas Routes
		 */
		Route::resource('areas', 'AreasController');
		
		/**
		 * Hospitals Routes
		 */
		Route::resource('hospitals', 'HospitalsController');	
		Route::post('hospitals/deleteHospitalImage', 'HospitalsController@deleteHospitalImage')->name('hospitals.deleteHospitalImage');

		
		/**
		 * Specialties Routes
		 */
	    Route::resource('specialties', 'SpecialtiesController');

		/**
		 * Departments Routes
		 */
	    Route::resource('departments', 'DepartmentsController');

		/**
		 * Diseases Routes
		 */
		Route::resource('diseases', 'DiseasesController');
		
		/**
		 * Blood Types Routes
		 */
		Route::resource('blood_types', 'BloodTypesController');
		

		/**
		 * Doctors Routes
		 */
	    Route::resource('doctors', 'DoctorsController');
		

		/**
		 * orders Routes
		 */
	    Route::resource('orders', 'OrdersController');
		
		/**
		 * clients Routes
		 */
	    Route::resource('clients', 'ClientsController')->except([ 'create', 'store' ]);
		
		/**
		 * hospitals_treatments Routes
		 */
	    Route::resource('hospitals_treatments', 'HospitalsTreatmentsController');
		

		
	    /**
		 * ContactUs Routes
		 */
	    Route::resource('contactus', 'ContactUsController');
	    Route::resource('contacts', 'ContactsController');

	    /**
		 * Admins Routes
		 */
	    Route::resource('admins', 'AdminsController');

	    /**
		 * Roles/Permissions Routes
		 */
	    Route::resource('roles', 'RolesController');
	    Route::get('permissions/update', 'RolesController@updatePermissions')->name('permissions.update');

	    /**
		 * MetaTags Routes
		 */
	    Route::resource('metatags', 'MetaTagsController')->except([ 'create', 'store', 'destroy' ]);


	    /**
		 * Settings Routes
		 */
	    Route::resource('settings', 'SettingsController')->except([ 'create', 'store', 'show', 'edit', 'update', 'destroy' ]);
	    Route::get('settings/edit', 'SettingsController@edit')->name('settings.edit');
	    Route::post('settings/update', 'SettingsController@update')->name('settings.update');
		
		

    });
});


