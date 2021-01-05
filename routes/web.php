<?php
use App\Category;
use App\BlogPost;
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

    $blogposts = DB::table('blog_posts')
    ->join('categories', 'blog_posts.category_id', '=', 'categories.id')
    ->join('users', 'blog_posts.user_id', '=', 'users.id')

    ->select('blog_posts.id',
    'blog_posts.title',
    'blog_posts.post_image_path',
    'blog_posts.post_description',
    'categories.category_name',
    'users.first_name',
    'users.last_name',
    'blog_posts.created_at',
    'blog_posts.updated_at')
    ->latest()
    ->limit(4)
    ->get();

    $categories = \DB::table('categories')
    ->select('id','category_name','created_at')
    ->latest()
    ->limit(3)
    ->get();

    // return json_encode($blogposts);
    // return json_encode($categories);
    return view('welcome')
    ->with('blogposts', $blogposts);
    });

// ROUTE FOR PROFILE PHOTO UPLOADS
Route::resource('/view-users/profile/photo/upload', 'ProfilePhotoUploads');
Route::post('/view-users/profile/photo/upload', 'ProfilePhotoUploads@store');


// AUTHENTICATION ROUTES
Route::get('login', [
	'as' => 'login',
	'uses' => 'Auth\LoginController@showLoginForm'
  ]);
  Route::post('login', [
	'as' => '',
	'uses' => 'Auth\LoginController@login'
  ]);
  Route::post('logout', [
	'as' => 'logout',
	'uses' => 'Auth\LoginController@logout'
  ]);

  // PASSWORD RESET ROUTES
  Route::post('password/email', [
	'as' => 'password.email',
	'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
  ]);

  // ROUTE FOR FORGOTPASSWORD CONTROLLER
  Route::get('password/reset', [
	'as' => 'password.request',
	'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
  ]);
  // ROUTE FOR RESETPASSWORD CONTROLLER
  Route::post('password/reset', [
	'as' => 'password.update',
	'uses' => 'Auth\ResetPasswordController@reset'
  ]);

  // ROUTE FOR RESETPASSWORD WITH TOKEN
  Route::get('password/reset/{token}', [
	'as' => 'password.reset',
	'uses' => 'Auth\ResetPasswordController@showResetForm'
  ]);

// ROUTE FOR NEW VIEW/BLADE USER CHANGE PASSWORD
Route::get('/change_password', function () {
    return view('auth.passwords.new_user_change_pwd');
});

// ROUTE FOR CHANGE PASSWORD
Route::post('/change_password', 'ChangePasswordController@updateNewuser');
Route::resource('/change-password', 'ChangePasswordController');
Route::post('/change-password', 'ChangePasswordController@update');

// ROUTE FOR CHECKUSERSTATUS MIDDLEWARE
Route::group(['middleware' => 'CheckUserStatus'], function () {

    // ROUTE FOR VALIDATE BUTTON HISTORY MIDDLEWARE
    Route::group(['middleware' => 'ValidateButtonHistory'], function () {

        // ROUTE FOR AUTH MIDDLEWARE
        Route::group(['middleware' => 'auth'], function () {

            // HOME ROUTE CONTROLLER
            Route::get('/home', 'HomeController@index')->name('home');

            //  VIEW USER ROUTE CONTROLLER
            Route::resource('/view-users', 'ViewUsersController');
            Route::post('/view-users', 'ViewUsersController@store');
            Route::get('/reset/{id}', 'ViewUsersController@resetpwd');
            Route::get('/view-users/profile', 'ViewUsersController@show');
            Route::get('/view/all/users', 'ViewUsersController@allSystemsUsers');

            // ROUTE FOR SUBSCRIBER CONTROLLER WITHIN A DASHBOARD FOR THE ADMIN
            Route::get('/subscriber-email/{id}','SubscriberController@show');
            Route::post('/subscriber-email/send','SubscriberController@subscriberReplyEmail');

            // ROUTE FOR SUBSCRIBER CONTROLLER WITHIN A DASHBOARD FOR THE ADMIN
            Route::resource('/subscriber-email','SubscriberController');
            Route::get('/subscriber-email','SubscriberController@index');

            // ROUTE FOR BLOGPOSTS CONTROLLER
            // Route::resource('/blog/post', 'BlogPostsController');
            Route::post('/blog/post', 'BlogPostsController@store');


            // ROUTE FOR CATEGORIES CONTROLLER
            Route::resource('/view/all/category', 'CategoriesController');
            Route::post('/view/all/category', 'CategoriesController@store');


            // ROUTE FOR PERMISSIONS
            Route::get('/settings/manage_users/permissions/entrust_user', 'PermissionsController@entrust_user');
            Route::get('/settings/manage_users/permissions/entrust', 'PermissionsController@entrust');
            Route::post('/settings/manage_users/permissions/entrust_usr', 'PermissionsController@entrust_user_permissions');
            Route::get('/settings/manage_users/permissions/entrustRole', 'PermissionsController@entrust_roles');
            Route::post('/settings/manage_users/permissions/entrust_role_permissions', 'PermissionsController@entrust_role_permissions');
            Route::get('/settings/manage_users/permissions/entrust_role', 'PermissionsController@entrust_role');
            Route::resource('/settings/manage_users/permissions/', 'PermissionsController');

            // ROUTES FOR ROLES
            Route::get('/settings/manage_users/roles/entrust', 'RolesController@get_roles');
            Route::post('/settings/manage_users/roles/entrust', 'RolesController@post_roles');
            Route::get('/settings/manage_users/roles/add', 'RolesController@add');
            Route::resource('/settings/manage_users/roles', 'RolesController');
        });
    });
});
            // ROUTE FOR SUBSCRIBER AT WELCOME PAGE
            Route::post('/subscriber-email','SubscriberController@store');

            // ROUTE FOR CONTACTINFOS CONTROLLER
            Route::resource('/contact/all/contacts', 'ContactInfosController');
            Route::get('/contact/all/contacts', 'ContactInfosController@index');
            Route::get('/contact', 'ContactInfosController@create');
            Route::post('/contact/all/contacts', 'ContactInfosController@store');


            // Route::get('/blog/post/{id}', 'BlogPostsController@show');
            Route::resource('/blog/post', 'BlogPostsController');
            Route::get('/view/all/posts', 'BlogPostsController@getAllPost');

            // ROUTE FOR ABOUTINFO CONTROLLER AT WELCOME PAGE
            Route::resource('/about', 'AboutsController');



