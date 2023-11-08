<?php

namespace App\Imports;

use App\Models\Legit;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;



class LegitImport implements ToModel,WithHeadingRow
{

    public function model(array $row)
    {

        if (!isset($row['firstname'])) {
            return null;
        }

        return new Legit([

            'first_name'     =>$row['firstname'],
            'last_name'    => $row['last_name'], 
            'email' => $row['email'],
            'mobile_number' => $row['mobile_name'],
            
        ]);

    }

}
