<?php




Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');


Route::get('/', 'JobsController@index');






Route::group(['middleware' => 'auth'], function () {
    
    
    
    
     
       Route::get('poster', 'SeparationController@goPosting')->name('separate.poster');
       Route::get('contracter', 'SeparationController@goContracting')->name('separate.contracter');
       Route::get('favorite', 'SeparationController@goFavoriting')->name('separate.favorite');
       
       Route::get('asking', 'SeparationController@goAsking')->name('user.asking');
       Route::get('editing/{id}', 'SeparationController@goEditing')->name('job.editing');
       Route::post('updating/{id}', 'SeparationController@goUpdating')->name('job.updating');
       
       Route::get('chating/{id}', 'SeparationController@goChating')->name('user.chating');
       Route::get('chating2/{id}', 'SeparationController@goChating2')->name('poster.chating');
       Route::post('talk/{id}', 'SeparationController@talktalk')->name('user.talk');
       Route::post('allowing/{id}', 'SeparationController@goAllowing')->name('user.Allowing');
  
  

  
  
  
       Route::get('country/{district}', 'CountryController@goCountry')->name('user.country');
       
      
    
    
    
    
    
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    Route::resource('jobs', 'JobsController', ['only' => ['store', 'destroy', 'edit']]);
    
    Route::delete('destroy/{id}', 'JobsController@destroyTalk')->name('jobs.destroydestroy');


    
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('follow', 'UserFollowController@store')->name('user.follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
        Route::get('followings', 'UsersController@followings')->name('users.followings');
        Route::get('followers', 'UsersController@followers')->name('users.followers');
    });
    
    
    Route::group(['prefix' => 'favorites/{favorite_id}'], function () {
        Route::post('favorites', 'FavoritesController@store')->name('user.favorites');
        Route::delete('unfavorites', 'FavoritesController@destroy')->name('user.unfavorites');
        Route::get('favoriting', 'UsersController@favoriting')->name('users.favoriting');
        Route::get('favoreted', 'FavoritesController@favorited')->name('user.favorited');
    });
 
   
    
    Route::get('profileIndex', 'ProfileController@index')->name('user.profile');
    Route::post('profileStore', 'ProfileController@store')->name('user.profilee');
});
    
    
    
    