<?php

namespace App\Imports;

use App\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

class CustomersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Customer([
            'opstina' => is_null($row[0]) ? 'No Opstina' : $row[0],
            'address' => is_null($row[1]) ? 'No Address' : $row[1], 
            'name' => is_null($row[2]) ? 'No Name' : $row[2],
            'phone_number' => is_null($row[3]) ? '000000000' : $row[3],
            'number_of_rent' => is_null($row[4]) ? '0' : $row[4], 
            'money_spent' => is_null($row[5]) ? '0' : $row[5],
            'comment' => is_null($row[6]) ? 'No comment' : $row[6],
        ]);
    }
}
