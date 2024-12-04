
Route::post('/learnathon-login', 'LearnathonController@existingLogin')->name('learnathon.login');
Route::post('/learnathon-validate', 'LearnathonController@mobileValidation')->name('learnathon.validate');
