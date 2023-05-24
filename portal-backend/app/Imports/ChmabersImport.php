<?php

namespace App\Imports;

use App\Models\City;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ChmabersImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        $group = '';
        // $cities = City::all()->where('country_code', '==', 'DZ');
        foreach ($rows as $row)
        {
            $city = null;
            $city = City::where('name_fr', 'like', '%'.$row[6].'%')->first();
            if ($city == null) $city = City::where('name_ar', 'like', '%'.$row[4])->first();

             if (is_numeric($row[5]))
             {
                    DB::table('organizations')->insert([
                        'name_en' => $row[7] ? $row[7] : '',
                        'name_ar' => $row[3] ? $row[3] : '',
                        'name_fr' => $row[7] ? $row[7] : '',
                        'balance' => '0',
                        'legal_form' => 'Other',
                        'type' => 'Chamber',
                        'address_en' => $city ? $city->name_en : '',
                        'address_ar' => $city ? $city->name_ar : '',
                        'address_fr' => $city ? $city->name_fr : '',
                        'email' => $row[0] ? $row[0] : '',
                        'mobile' => '023160975',
                        'tel' => $row[2] ,
                        'fax'  => $row[1] ,
                        'website' => '',
                        'manager_id' => null,
                        'city_id' => $city ? $city->id : '31230',
                    ]);
                }
        }
    }
}
