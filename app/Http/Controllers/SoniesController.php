<?php

namespace App\Http\Controllers;

use App\Sony;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SoniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sonies = Sony::all();
        return view('sonies.index', compact('sonies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sonies.create');
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
            'name' => ['required', 'min:3'],
            'date_of_rent' => ['required', 'min:3'],
            'date_of_giveback' => ['required', 'min:9'],
            'customer_id' => ['required'],
        ]);

        Sony::create($attributes);

        return redirect('/sonies');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sony  $sony
     * @return \Illuminate\Http\Response
     */
    public function show(Sony $sony)
    {
        return view('sonies.show', compact('sony'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sony  $sony
     * @return \Illuminate\Http\Response
     */
    public function edit(Sony $sony)
    {
        $customers = Customer::all();
        return view('sonies.edit', compact('sony','customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sony  $sony
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sony $sony, Customer $customer)
    {
        $c = DB::table('customers')->select('money_spent')->where('id', request(['customer_id']))->get();
        $old_money_spent = $c[0]->money_spent;
        $joystick_number = request(['joystick'][0]);
        $diff_days = request(['diff_days'][0]);
        if ($joystick_number == 2) {
            if ($diff_days == 1) {
                $price_count = 1800;
            }elseif ($diff_days == 2) {
                $price_count = 2800;
            }elseif ($diff_days == 3) {
                $price_count = 3000;
            }elseif ($diff_days == 4) {
                $price_count = 3600;
            }else{
                $price_count = 3600 + $diff_days * 600;
            }
        }elseif ($joystick_number == 4) {
            if ($diff_days == 1) {
                $price_count = 2000;
            }elseif ($diff_days == 2) {
                $price_count = 3000;
            }elseif ($diff_days == 3) {
                $price_count = 3600;
            }elseif ($diff_days == 4) {
                $price_count = 4000;
            }else {
                $price_count = ($diff_days * 600) + 4000;
            }
        }
        $price = (request(['price2'][0]) == null ? $price_count : request(['price2'][0]));
        $money_spent = $old_money_spent + $price;
        $sony->update(request(['rented','customer_id','date_of_rent','date_of_giveback']));
        $sony->customer->update(['money_spent' => $money_spent]);

         DB::table('customers')->where('id', 1)->update(['money_spent' => 0]);
         return redirect('/sonies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sony  $sony
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sony $sony)
    {
        //
    }

}
