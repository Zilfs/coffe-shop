<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        $employee = User::where('roles', 'EMPLOYEE')->get();

        if(Auth::user()->roles == 'ADMIN')
        {
            return view('pages.admin.user.index',[
                'user' => $data,
            ]);
        }else if(Auth::user()->roles == 'MANAGER')
        {
            return view('pages.manager.user.index',[
                'user' => $employee,
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
            return view('pages.admin.user.add');
        }else if(Auth::user()->roles == 'MANAGER')
        {
            return view('pages.manager.user.add');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        User::create($data);
        if(Auth::user()->roles == 'ADMIN')
        {
            return redirect()->route('data-user');
        }else if(Auth::user()->roles == 'MANAGER')
        {
            return redirect()->route('manager-data-user');
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
        $data = User::findOrFail($id);

        if(Auth::user()->roles == 'ADMIN')
        {
            return view('pages.admin.user.edit',[
                'user' => $data,
            ]);
        }else if(Auth::user()->roles == 'MANAGER')
        {
            return view('pages.manager.user.edit',[
                'user' => $data,
            ]);
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $item = User::findOrFail($id);
        $item->update($data);

        if(Auth::user()->roles == 'ADMIN')
        {
            return redirect()->route('data-user');
        }else if(Auth::user()->roles == 'MANAGER')
        {
            return redirect()->route('manager-data-user');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = User::findOrFail($id);
        $item->delete();

        if(Auth::user()->roles == 'ADMIN')
        {
            return redirect()->route('data-user');
        }else if(Auth::user()->roles == 'MANAGER')
        {
            return redirect()->route('manager-data-user');
        }
        
    }
}
