use App\Http\Controllers\Admin\BlogController;

Route::resource('blogs', BlogController::class)
     ->names('back.pages.blogs'); 