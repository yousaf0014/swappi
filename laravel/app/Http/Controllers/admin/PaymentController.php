<?php

namespace App\Http\Controllers\admin;

use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
	/**
	 * Show Categories.
	 */
	public function index()
	{
		$transactions = Transaction::orderby('id', 'DESC')->paginate(15);
		return view('admin.transaction.index', ['transactions' => $transactions]);
	}
}
