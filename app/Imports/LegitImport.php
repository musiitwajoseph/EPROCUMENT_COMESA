<?php

namespace App\Imports;

use App\Models\Legit;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;


class LegitImport implements ToModel,WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {

        if (!isset($row['firstname'])) {
            return null;
        }


        if (!isset($row['last_name'])) {
            return null;
        }

        return new Legit([
            'first_name'     =>$row['firstname'],
            'last_name'    => $row['last_name'], 
            'email' => $row['email'],
            'mobile_number' => $row['mobile_name'],


            // 'first_name'     =>$row[0],
            // 'last_name'    => $row[1], 
            // 'email' => $row[2],
            // 'mobile_number' => $row[3],
        ]);

    }

    public function rules(): array
    {
        return [
            // 'firstname' => 'required',
            // 'last_name' => 'required',

             // Above is alias for as it always validates in batches
            //  '*.firstname' => 'required',
            //  '*.last_name' => 'required',
        ];
    }


}
