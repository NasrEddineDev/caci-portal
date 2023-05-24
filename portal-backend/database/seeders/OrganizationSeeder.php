<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Manager;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ChmabersImport;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('organizations')->insert([[
            'name_en' => 'Algerian Chamber of Commerce and Industry',
            'name_ar' => 'الغرفة الجزائرية للتجارة و الصناعة',
            'name_fr' => "Chambre Algerienne de commerce et d'industrie",
            // 'status' => '1',
            'balance' => '0',
            // 'activity_type' => '06',
            // 'activity_type_name' => '',
            'legal_form' => 'Other',
            'type' => 'Chamber',
            'address_en' => 'Consular Palace 6, Bd Amilcar Cabral, CP 16003, BP 100, 1 November, Place des Martyrs',
            'address_ar' => 'Route de l\'Aéroport . Dar El Beida.Bp 162 Alger',
            'address_fr' => 'Palais consulaire 6,Bd Amilcar Cabral. CP 16003 Alger. BP 100 Alger 1er novembre. Place des Martyrs.Alger',
            'email' => 'infos@caci.dz',
            'mobile' => '023160975',
            'tel' => '023160474',
            'fax'  => '023161489',
            'website' => 'http://www.caci.dz',
            'manager_id' => null,
            'city_id' => '31230',
        ],[
            'name_en' => 'Ministry of Trade and Export Promotion',
            'name_ar' => 'وزارة التجارة و ترقية الصادرات',
            'name_fr' => 'Ministère du Commerce et de la Promotion des Exportations',
            'balance' => '0',
            'legal_form' => 'Government Office',
            'type' => 'Trader',
            'address_en' => 'حي زرهوني مختار المحمدية (حي الموز سابقا) الجزائر',
            'address_ar' => '',
            'address_fr' => 'Cité Zerhouni Mokhtar El-Mohammadia. (Ex. les Bannaniers) - ALGER',
            'email' => 'contact@commerce.gov.dz',
            'mobile' => 'City Zerhouni Mokhtar El-Mohammadia. (Ex. Banana Trees) - ALGIERS',
            'tel' => '(+213) 021 89 00 74/85',
            'fax'  => '',
            'website' => '',
            'manager_id' => null,
            'city_id' => '31230',
        ]]);

        Excel::import(new ChmabersImport, database_path() . '/data/chambers/Annuaire des CCI.xlsx');

    }
}
