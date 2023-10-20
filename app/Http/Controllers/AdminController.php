<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $manager = User::where('roles', 'MANAGER')->count();
        $employee = User::where('roles', 'EMPLOYEE')->count();
        $category = Category::all()->count();
        $product = Product::all()->count();

        return view('pages.admin.index', [
            'managers' => $manager,
            'employees' => $employee,
            'categories' => $category,
            'products' => $product,
        ]);
    }

}
