<?php

namespace App\Imports;

use App\Models\Legit;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;


class LegitImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {


        return new Legit([
            'first_name'     => $row['firstname'],
            'last_name'    => $row['last_name'], 
            'email' => $row['email'],
            'mobile_number' => $row['mobile_name'],
        ]);
    }


    public function rules(): array
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',

             // Above is alias for as it always validates in batches
             '*.firstname' => 'required',
             '*.last_name' => 'required',
        ];
    }


}
