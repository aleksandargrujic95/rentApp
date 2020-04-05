<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;

class ImportExcelController extends Controller
{
    function index(){
    	$data = DB::table('customers')->orderBy('id', 'DESC')->get();
    	return view('excel/import', compact('data'));
    }
    function import(Request $request){
    	$this->validate($request, [
    		'select_file' => 'required|mimes:xls,xlsx'
    	]);
    	$path = $request->file('select_file')->getRealPath();
    	$data = Excel::load($path)->get();
    	if($data->count() > 0)
    	{
    		foreach ($data->toArray() as $key => $value) {
    			foreach ($value as $row) {
    				if($row['name'])
    				$insert_data[] = array(
						'jbk'  => row['jbk'],
						'konzola'  => row['Konzola'],
    					'opstina' => row['Opština'],
    					'address' => row['Adresa'],
    					'name' => row['Ime I prezime'],
    					'phone_number' => row['Telefon'],
    					'number_of_rent' => row['Br. iznajmlj.'],
    					'money_spent' => row['Prihod'],
    					'comment' => row['Napomena']
    				);
    			}
    		}
    		if(!empty($insert_data)){
    			DB::table('customers')->insert($insert_data);
    		}
    	}
    	return back()->with('success', 'Excel data importedd successfully.');
    }
}
