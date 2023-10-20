<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::all();
        
        if(Auth::user()->roles == 'ADMIN')
        {
            return view('pages.admin.category.index', [
                'category' => $data,
            ]);
        }else if(Auth::user()->roles == 'MANAGER')
        {
            return view('pages.manager.category.index', [
                'category' => $data,
            ]);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::user()->roles == 'ADMIN')
        {
            return view('pages.admin.category.add');
        }else if(Auth::user()->roles == 'MANAGER')
        {
            return view('pages.manager.category.add');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $data['image'] = $request->file('image')->store('assets/categories', 'public');

        Category::create($data);
      
        return redirect()->route('manager-data-categories');       

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
        $data = Category::findOrFail($id);
        
        return view('pages.manager.category.edit',[
            'category' => $data,
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store('assets/categories', 'public');
        $item = Category::findOrFail($id);
        $item->update($data);


        return redirect()->route('manager-data-categories');
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Category::findOrFail($id);
        $item->delete();


        return redirect()->route('manager-data-categories');       
        
    }
}
