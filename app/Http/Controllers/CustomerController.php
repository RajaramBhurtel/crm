<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Customer::latest()->paginate(5);
        return view('admin.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_name'      =>  'required',
            'email'              =>  'required|email|unique:customers',
            'image'              =>  'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000'
        ]);

        $file_name = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $file_name);

        $customer = new Customer;

        $customer->customer_name = $request->customer_name;
        $customer->email = $request->email;
        $customer->gender = $request->gender;
        $customer->image = $file_name;

        $customer->save();
        return redirect()->route('index.index')->with('success', "Customers Added successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $admin)
    {
        return view('admin.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $admin)
    {
        return view('admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $admin)
    {
        $request->validate([
            'customer_name'     =>  'required',
            'email'             =>  'required|email',
            'image'             =>  'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
        ]);

        $image = $request->hidden_customer_image;

        if ($request->image != '') {
            $image = time() . '.' . request()->image->getClientOriginalExtension();

            request()->image->move(public_path('images'), $image);
        }

        $customer = Customer::find($request->hidden_id);

        $admin->customer_name = $request->customer_name;

        $admin->email = $request->email;

        $admin->gender = $request->gender;

        $admin->image = $image;

        $admin->save();

        return redirect()->route('admin.index')->with('success', 'customer Data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $admin)
    {
        $admin->delete();

        return redirect()->route('admin.index')->with('success', 'Customer Data deleted successfully');
    }
}
