<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $data = Transaction::with('order')->get();
        return view('pages.transaction.index', [
            'data' => $data,
        ]);
    }
}
