<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class EmployeeController extends Controller
{
    public function index()
    {
        $recent_order = Transaction::with('order')->latest()->first();
        $transaction = Transaction::whereDate('date_time', Carbon::today())->count();

        return view('pages.employee.index', [
            'recent_order' => $recent_order,
            'transactions' => $transaction,
        ]);
    }
}
