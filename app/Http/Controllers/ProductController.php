<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::with('category')->get();

        if(Auth::user()->roles == 'ADMIN')
        {
            return view('pages.admin.product.index', [
                'product' => $data,
            ]);   
        }else if(Auth::user()->roles == 'MANAGER')
        {
            return view('pages.manager.product.index', [
                'product' => $data,
            ]);   
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Category::all();

        if(Auth::user()->roles == 'ADMIN')
        {
            return view('pages.admin.product.add', [
                'category' => $data,
            ]);
        }else if(Auth::user()->roles == 'MANAGER')
        {
            return view('pages.manager.product.add', [
                'category' => $data,
            ]);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $data['image'] = $request->file('image')->store('assets/products', 'public');

        Product::create($data);

        if(Auth::user()->roles == 'ADMIN')
        {
            return redirect()->route('data-product');
        }else if(Auth::user()->roles == 'MANAGER')
        {
            return redirect()->route('manager-data-product');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Product::findOrFail($id);
        $category = Category::all();

        if(Auth::user()->roles == 'ADMIN')
        {
            return view('pages.admin.product.edit',[
                'product' => $data,
                'category' => $category,
            ]);
        }else if(Auth::user()->roles == 'MANAGER')
        {
            return view('pages.manager.product.edit',[
                'product' => $data,
                'category' => $category,
            ]);
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store('assets/products', 'public');
        $item = Product::findOrFail($id);
        $item->update($data);
        
        if(Auth::user()->roles == 'ADMIN')
        {
            return redirect()->route('data-product');
        }else if(Auth::user()->roles == 'MANAGER')
        {
            return redirect()->route('manager-data-product');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Product::findOrFail($id);
        $item->delete();

        if(Auth::user()->roles == 'ADMIN')
        {
            return redirect()->route('data-product');
        }else if(Auth::user()->roles == 'MANAGER')
        {
            return redirect()->route('manager-data-product');
        }
        
    }
}
