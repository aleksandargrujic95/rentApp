<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Imports\CustomersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::paginate(20);
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'opstina' => ['required', 'min:3'],
            'name' => ['required', 'min:3'],
            'number_of_rent' => [],
            'phone_number' => ['required', 'min:9'],
            'address' => ['required', 'min:3'],
            'money_spent' => ['required'],
            'comment' => ['required', 'min:3']
        ]);

        Customer::create($attributes);

        return redirect('/customers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $customer->update(request(['name','opstina','phone_number','address','comment','number_of_rent','money_spent']));

        return redirect('/customers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect('/customers');
    }
    public function search(Request $request)
    {
        $search = $request->get('search');
        $customers = DB::table('customers')->where('phone_number','like', '%'.$search.'%')->paginate(20);
        return view('customers.index', ['customers' => $customers]);
    }
    public function searchNumber(Request $request)
    {
        $search = $request->get('searchNumber');
        $customers = DB::table('customers')->where('phone_number','like', '%'.$search.'%')->paginate(20);
        return view('sonies.edit', ['customers' => $customers]);
    }
    public function searchJbk(Request $request)
    {
        $search = $request->get('searchJbk');
        $customers = DB::table('customers')->where('jbk','like', '%'.$search.'%')->paginate(20);
        return view('customers.index', ['customers' => $customers]);
    }
    public function import() 
    {
        Excel::import(new CustomersImport, 'customers.xlsx');
        
        return redirect('/')->with('success', 'All good!');
    }
    
}
