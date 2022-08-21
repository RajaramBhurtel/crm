<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class ViewController extends Controller
{

    public function index()
    {
        $data = Customer::latest()->paginate(5);
        return view('customer', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    // public function getCustomers()
    // {

    //     // $customers = Customer::orderby('id', 'asc')->select('*')->get();

    //     // // Fetch all records
    //     // $response['data'] = $customers;

    //     // return response()->json($response);
    // }
}
