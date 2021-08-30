<?php
 use Illuminate\Http\Request;
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
    return view('welcome');
});


// Route::get('api/v1/info','ExampleController@greeting');


Route::post("api/v1/uploadss",function(Request $request){
    $filename = $request->file('avatar')->store('', 'google');
    $storage = Storage::disk("google");
    $details = $storage->getMetadata($filename);
    $url = $storage->url($filename);
    dd($url);
});


Route::prefix('api/v1')->group(function () {
    Route::get('/info','ExampleController@greeting');
    Route::post('/upload', 'FileController@uploadFile');
});


Route::get('/getFile',function () {
    $storage = Storage::disk("google");
     $files =  $storage->allFiles();
     $firstFileNmae=$files[0];
    //  dd($firstFileNmae);
     $details = $storage->getMetadata($firstFileNmae);
    //  dd($details);
     $url = $storage->url($firstFileNmae);
     dd($url);
});
