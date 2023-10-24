<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $recent_order = Transaction::with('order')->latest()->first();
        $transaction = Transaction::all()->count();
        
        return view('pages.employee.index', [
            'recent_order' => $recent_order,
            'transactions' => $transaction,
        ]);
    }
}
