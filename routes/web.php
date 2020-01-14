<?php




Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');





Route::get('/', 'JobsController@index');






Route::group(['middleware' => 'auth'], function () {
    
    
    
    
     
       Route::get('separation', 'SeparationController@separation')->name('separation.followers');
  
       Route::get('move', 'UsersController@move')->name('move.get');
      
    
    
    
    
    
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    Route::resource('jobs', 'JobsController', ['only' => ['store', 'destroy', 'edit']]);



    
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('follow', 'UserFollowController@store')->name('user.follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
        Route::get('followings', 'UsersController@followings')->name('users.followings');
        Route::get('followers', 'UsersController@followers')->name('users.followers');
    });
    
    
    
    
    
    
    
    
    Route::group(['prefix' => 'favorites/{micropost_id}'], function () {
        Route::post('favorites', 'FavoritesController@store')->name('user.favorites');
        Route::delete('unfavorites', 'FavoritesController@destroy')->name('user.unfavorites');
        Route::get('favoriting', 'UsersController@favoriting')->name('users.favoriting');
        Route::get('favoreted', 'MicropostsController@favorited')->name('user.favorited');
    });
    
    Route::get('/profile', 'ProfileController@index');
    Route::post('/profile', 'ProfileController@store');
});
    
    
    
    