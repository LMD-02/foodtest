<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\CheckLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

// use GuzzleHttp\Psr7\Request;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('viewlogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/', function ()
{
    $products = DB::table('products')->get();
    return view('index',[
        'products' => $products
    ]);
})->name('index');

Route::get('/detail/{id}', function ($id)
{
    $productDt = DB::table('products')->where('id',$id)->first();
    $products = DB::table('products')->where('id','!=',$id)->get();
    return view('food_detail',[
        'products' => $products,
        'productDt' => $productDt
    ]);
})->name('food_detail');
Route::middleware([CheckLogin::class])->group(function ()
{
    Route::get('/admin', function ()
    {
        return view('admin');
    })->name('admin');
    Route::get('/sanpham', function ()
    {
        $products = DB::table('products')->get();
        return view('sanpham', compact('products'));
    })->name('sanpham');


    Route::get('/api/sanpham', function (Request $request)
    {
        $keyword = $request->id;

        $products = DB::table('products')
            ->where('id', 'like', '%' . $keyword . '%')
            ->orWhere('name', 'like', '%' . $keyword . '%')
            ->get();
        return response()->json([
            'products' => $products
        ]);
    });



    Route::post('/add_products', [HomeController::class, 'add_products'])->name('add_products');
    Route::get('/delete_products/{id}', [HomeController::class, 'delete_products'])->name('delete_products');
    Route::get('/update/{id}', [HomeController::class, 'update_products'])->name('update_products');



});
