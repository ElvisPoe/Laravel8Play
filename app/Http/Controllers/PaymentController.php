<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(){

        return view('payments.index', [
            'payments' => Payment::latest()->filter(request(['datefrom', 'dateto']))->get()
        ]);
    }

}
