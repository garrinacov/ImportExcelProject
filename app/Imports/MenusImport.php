<?php

namespace App\Imports;

use App\Menus;
use Maatwebsite\Excel\Concerns\ToModel;
// use Maatwebsite\Excel\Concerns\WithValidation;


class MenusImport implements ToModel    
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        $data = [
            'name_menu' => $row[0],
            'type' => $row[1],
            'price' => $row[2],
            'stock' => $row[3],
        ];
        return Menus::create($data);
    }

    // public function rules(): array 
    // {
    //     if($name_menu && $type && $price && $stock) {
    //         echo "data is correct";
    //     } else {
    //         echo "data is not correct";
    //     }
    // }
}