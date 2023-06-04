<?php
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\FooterLinkController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [WebController::class, 'index'])->name('web.home');
Route::get('/laman/{id_slug?}', [WebController::class, 'page'])->name('web.page');
Route::get('/berita/{id_slug?}', [WebController::class, 'news'])->name('web.news');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::group(['prefix' => 'admin-panel'], function() {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::get('dashboard', [AdminPanelController::class, 'index'])->name('admin-panel.dashboard');
        Route::post('/site-setting', [AdminPanelController::class, 'site_setting'])->name('admin-panel.site-setting');
        Route::post('news/uploadImage', [NewsController::class, 'uploadImage'])->name('news.upload-image');
        Route::post('news/urlImage', [NewsController::class, 'urlImage'])->name('news.url-image');
        Route::resource('news', NewsController::class, ['as' => 'admin-panel']);
        Route::resource('document', DocumentController::class, ['as' => 'admin-panel']);
        Route::resource('gallery', GalleryController::class, ['as' => 'admin-panel']);
        Route::resource('category', CategoryController::class, ['as' => 'admin-panel']);
        Route::post('page/uploadImage', [PageController::class, 'uploadImage'])->name('admin-panel.page.upload-image');
        Route::post('page/urlImage', [PageController::class, 'urlImage'])->name('admin-panel.page.url-image');
        Route::resource('page', PageController::class, ['as' => 'admin-panel']);
        Route::post('menu/misc/updateParentMenuOrder', [MenuController::class, 'updateParentMenuOrder'])->name('admin-panel.menu.updateParentMenuOrder');
        Route::resource('carousel', CarouselController::class, ['as' => 'admin-panel']);
        Route::resource('menu', MenuController::class, ['as' => 'admin-panel']);
        Route::resource('footer-link', FooterLinkController::class, ['as' => 'admin-panel']);
        Route::resource('announcement', AnnouncementController::class, ['as' => 'admin-panel']);
    });
});

require __DIR__.'/auth.php';
