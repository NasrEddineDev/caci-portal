<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\Profile;
use App\Models\Organization;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([[
                'name'  => 'admin',
                'email' => 'admin@caci.dz',
                'password' => Hash::make('password'),
                'email_verified_at'  => date('Y-m-d H:i:s'),
                'role_id' => Role::where('name', 'admin')->first()->id,
                'employee_id' => null,
                'organization_id' => '1',
            ],[
                'name'  => 'نصرالدين',
                'email' => 'n.guelfout@caci.dz',
                'password' => Hash::make('password'),
                'email_verified_at'  => date('Y-m-d H:i:s'),
                'role_id' => Role::where('name', 'admin')->first()->id,
                'employee_id' => null,
                'organization_id' => '1', // To do
            ],[
                'name'  => 'amani',
                'email' => 'a.amani@caci.dz',
                'password' => Hash::make('password'),
                'email_verified_at'  => date('Y-m-d H:i:s'),
                'role_id' => Role::where('name', 'admin')->first()->id,
                'employee_id' => null,
                'organization_id' => '1',
            ],[
                'name'  => 'Ministry',
                'email' => 'ministry@caci.dz',
                'password' => Hash::make('password'),
                'email_verified_at'  => date('Y-m-d H:i:s'),
                'role_id' => Role::where('name', 'ministry')->first()->id,
                'employee_id' => null,
                'organization_id' => '2',
            ],[
                'name'  => 'محاسب',
                'email' => 'financier@caci.dz',
                'password' => Hash::make('password'),
                'email_verified_at'  => date('Y-m-d H:i:s'),
                'role_id' => Role::where('name', 'ministry')->first()->id,
                'employee_id' => null,
                'organization_id' => '2',
            ],[
                'name'  => 'محمد 01',
                'email' => 'enterprise.01@caci.dz',
                'password' => Hash::make('password'),
                'email_verified_at'  => date('Y-m-d H:i:s'),
                'role_id' => Role::where('name', 'user')->first()->id,
                'employee_id' => null,
                'organization_id' => null,
        ]]);

        $organizations = Organization::where('id', '>=', '3')->get();
        $users =[];
        $i = 0;

        foreach($organizations as $organization){
            $users[$i] = [
                'name'  => strstr($organization->email, '@', true), //substr($response, strpos($organization->email '<?xml'), strlen($organization->email)),
                'email' => $organization->email,
                'password' => Hash::make('password'),
                'email_verified_at'  => date('Y-m-d H:i:s'),
                'role_id' => Role::where('name', 'chamber_employee')->first()->id,
                'employee_id' => null,
                'organization_id' => $organization->id
            ];
            $i++;
        }
        DB::table('users')->insert($users);
    }
}
