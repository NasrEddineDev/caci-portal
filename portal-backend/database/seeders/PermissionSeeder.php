<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('permissions')->insert([
            // user permissions
            [
                'name' => 'create-user',
                'description' => '',
                'group' => 'user',
            ], [
                'name' => 'view-user',
                'description' => '',
                'group' => 'user',
            ], [
                'name' => 'list-users',
                'description' => '',
                'group' => 'user',
            ], [
                'name' => 'update-user',
                'description' => '',
                'group' => 'user',
            ], [
                'name' => 'delete-user',
                'description' => '',
                'group' => 'user',
            ],
            // role permissions
            [
                'name' => 'create-role',
                'description' => '',
                'group' => 'role',
            ], [
                'name' => 'view-role',
                'description' => '',
                'group' => 'role',
            ], [
                'name' => 'list-roles',
                'description' => '',
                'group' => 'role',
            ], [
                'name' => 'update-role',
                'description' => '',
                'group' => 'role',
            ], [
                'name' => 'delete-role',
                'description' => '',
                'group' => 'role',
            ],
            // permission permissions
            [
                'name' => 'create-permission',
                'description' => '',
                'group' => 'permission',
            ], [
                'name' => 'view-permission',
                'description' => '',
                'group' => 'permission',
            ], [
                'name' => 'list-permissions',
                'description' => '',
                'group' => 'permission',
            ], [
                'name' => 'update-permission',
                'description' => '',
                'group' => 'permission',
            ], [
                'name' => 'delete-permission',
                'description' => '',
                'group' => 'permission',
            ],
            // product permissions
            [
                'name' => 'create-product',
                'description' => '',
                'group' => 'product',
            ], [
                'name' => 'view-product',
                'description' => '',
                'group' => 'product',
            ], [
                'name' => 'list-products',
                'description' => '',
                'group' => 'product',
            ], [
                'name' => 'update-product',
                'description' => '',
                'group' => 'product',
            ], [
                'name' => 'delete-product',
                'description' => '',
                'group' => 'product',
            ], [
                'name' => 'organization-product',
                'description' => '',
                'group' => 'product',
            ],
            // organization permissions
            [
                'name' => 'create-organization',
                'description' => '',
                'group' => 'organization',
            ], [
                'name' => 'view-organization',
                'description' => '',
                'group' => 'organization',
            ], [
                'name' => 'list-organizations',
                'description' => '',
                'group' => 'organization',
            ], [
                'name' => 'update-organization',
                'description' => '',
                'group' => 'organization',
            ], [
                'name' => 'delete-organization',
                'description' => '',
                'group' => 'organization',
            ], [
                'name' => 'filter-type-organization',
                'description' => '',
                'group' => 'organization',
            ], [
                'name' => 'change-status-organization',
                'description' => '',
                'group' => 'organization',
            ],
            // manager permissions
            [
                'name' => 'create-manager',
                'description' => '',
                'group' => 'manager',
            ], [
                'name' => 'view-manager',
                'description' => '',
                'group' => 'manager',
            ], [
                'name' => 'list-managers',
                'description' => '',
                'group' => 'manager',
            ], [
                'name' => 'update-manager',
                'description' => '',
                'group' => 'manager',
            ], [
                'name' => 'delete-manager',
                'description' => '',
                'group' => 'manager',
            ],
            // conversation permissions
            [
                'name' => 'create-conversation',
                'description' => '',
                'group' => 'conversation',
            ], [
                'name' => 'view-conversation',
                'description' => '',
                'group' => 'conversation',
            ], [
                'name' => 'list-conversations',
                'description' => '',
                'group' => 'conversation',
            ], [
                'name' => 'update-conversation',
                'description' => '',
                'group' => 'conversation',
            ], [
                'name' => 'delete-conversation',
                'description' => '',
                'group' => 'conversation',
            ],
            // message permissions
            [
                'name' => 'create-message',
                'description' => '',
                'group' => 'message',
            ], [
                'name' => 'view-message',
                'description' => '',
                'group' => 'message',
            ], [
                'name' => 'list-messages',
                'description' => '',
                'group' => 'message',
            ], [
                'name' => 'update-message',
                'description' => '',
                'group' => 'message',
            ], [
                'name' => 'delete-message',
                'description' => '',
                'group' => 'message',
            ],
            // request permissions
            [
                'name' => 'create-request',
                'description' => '',
                'group' => 'request',
            ], [
                'name' => 'view-request',
                'description' => '',
                'group' => 'request',
            ], [
                'name' => 'list-requests',
                'description' => '',
                'group' => 'request',
            ], [
                'name' => 'update-request',
                'description' => '',
                'group' => 'request',
            ], [
                'name' => 'delete-request',
                'description' => '',
                'group' => 'request',
            ],
            // payment permissions
            [
                'name' => 'create-payment',
                'description' => '',
                'group' => 'payment',
            ], [
                'name' => 'dhahabia-payment',
                'description' => '',
                'group' => 'payment',
            ], [
                'name' => 'view-payment',
                'description' => '',
                'group' => 'payment',
            ], [
                'name' => 'balance-payment',
                'description' => '',
                'group' => 'payment',
            ], [
                'name' => 'list-payments',
                'description' => '',
                'group' => 'payment',
            ], [
                'name' => 'organization-in-all-payments',
                'description' => '',
                'group' => 'payment',
            ], [
                'name' => 'update-payment',
                'description' => '',
                'group' => 'payment',
            ], [
                'name' => 'delete-payment',
                'description' => '',
                'group' => 'payment',
            ], [
                'name' => 'organization-in-add-payment',
                'description' => '',
                'group' => 'payment',
            ],
            // setting permissions
            [
                'name' => 'create-setting',
                'description' => '',
                'group' => 'setting',
            ], [
                'name' => 'view-setting',
                'description' => '',
                'group' => 'setting',
            ], [
                'name' => 'list-settings',
                'description' => '',
                'group' => 'setting',
            ], [
                'name' => 'update-setting',
                'description' => '',
                'group' => 'setting',
            ], [
                'name' => 'delete-setting',
                'description' => '',
                'group' => 'setting',
            ],
            // document permissions
            [
                'name' => 'create-document',
                'description' => '',
                'group' => 'document',
            ], [
                'name' => 'view-document',
                'description' => '',
                'group' => 'document',
            ], [
                'name' => 'list-documents',
                'description' => '',
                'group' => 'document',
            ], [
                'name' => 'update-document',
                'description' => '',
                'group' => 'document',
            ], [
                'name' => 'delete-document',
                'description' => '',
                'group' => 'document',
            ],
            // country permissions
            [
                'name' => 'create-country',
                'description' => '',
                'group' => 'country',
            ], [
                'name' => 'view-country',
                'description' => '',
                'group' => 'country',
            ], [
                'name' => 'list-countries',
                'description' => '',
                'group' => 'country',
            ], [
                'name' => 'update-country',
                'description' => '',
                'group' => 'country',
            ], [
                'name' => 'delete-country',
                'description' => '',
                'group' => 'country',
            ],
            // state permissions
            [
                'name' => 'create-state',
                'description' => '',
                'group' => 'state',
            ], [
                'name' => 'view-state',
                'description' => '',
                'group' => 'state',
            ], [
                'name' => 'list-states',
                'description' => '',
                'group' => 'state',
            ], [
                'name' => 'update-state',
                'description' => '',
                'group' => 'state',
            ], [
                'name' => 'delete-state',
                'description' => '',
                'group' => 'state',
            ],
            // city permissions
            [
                'name' => 'create-city',
                'description' => '',
                'group' => 'city',
            ], [
                'name' => 'view-city',
                'description' => '',
                'group' => 'city',
            ], [
                'name' => 'list-cities',
                'description' => '',
                'group' => 'city',
            ], [
                'name' => 'update-city',
                'description' => '',
                'group' => 'city',
            ], [
                'name' => 'delete-city',
                'description' => '',
                'group' => 'city',
            ],
            // logger permissions
            [
                'name' => 'create-logger',
                'description' => '',
                'group' => 'logger',
            ], [
                'name' => 'view-logger',
                'description' => '',
                'group' => 'logger',
            ], [
                'name' => 'list-loggers',
                'description' => '',
                'group' => 'logger',
            ], [
                'name' => 'update-logger',
                'description' => '',
                'group' => 'logger',
            ], [
                'name' => 'delete-logger',
                'description' => '',
                'group' => 'logger',
            ],
            // dashboard permissions
            [
                'name' => 'create-dashboard',
                'description' => '',
                'group' => 'dashboard',
            ], [
                'name' => 'view-dashboard',
                'description' => '',
                'group' => 'dashboard',
            ], [
                'name' => 'list-dashboards',
                'description' => '',
                'group' => 'dashboard',
            ], [
                'name' => 'update-dashboard',
                'description' => '',
                'group' => 'dashboard',
            ], [
                'name' => 'delete-dashboard',
                'description' => '',
                'group' => 'dashboard',
            ]

        ]);

        // Admin Permissions
        $role = Role::where('name', '=', "admin")->first();
        $permissions = Permission::all();
        foreach ($permissions as $permission) {
            if($permission) $role->givePermissionTo($permission);
        }

        // CACI DRI Permissions
        $role = Role::where('name', '=', "algerian_chamber_employee")->first();
        $role->givePermissionTo(Permission::where('name', '=', "view-dashboard")->first());
        $role->givePermissionTo(Permission::where('name', '=', "list-dashboards")->first());
        $role->givePermissionTo(Permission::where('name', '=', "update-dashboard")->first());
        $role->givePermissionTo(Permission::where('name', '=', "delete-dashboard")->first());
        $role->givePermissionTo(Permission::where('name', '=', "view-product")->first());
        $role->givePermissionTo(Permission::where('name', '=', "list-products")->first());
        $role->givePermissionTo(Permission::where('name', '=', "update-product")->first());
        $role->givePermissionTo(Permission::where('name', '=', "delete-product")->first());
        $role->givePermissionTo(Permission::where('name', '=', "create-organization")->first());
        $role->givePermissionTo(Permission::where('name', '=', "view-organization")->first());
        $role->givePermissionTo(Permission::where('name', '=', "list-organizations")->first());
        $role->givePermissionTo(Permission::where('name', '=', "view-payment")->first());
        $role->givePermissionTo(Permission::where('name', '=', "list-payments")->first());
        $role->givePermissionTo(Permission::where('name', '=', "create-conversation")->first());
        $role->givePermissionTo(Permission::where('name', '=', "view-conversation")->first());
        $role->givePermissionTo(Permission::where('name', '=', "list-conversations")->first());
        $role->givePermissionTo(Permission::where('name', '=', "update-conversation")->first());
        $role->givePermissionTo(Permission::where('name', '=', "delete-conversation")->first());

        // User Permissions
        $role = Role::where('name', '=', "user")->first();
        $role->givePermissionTo(Permission::where('name', '=', "view-dashboard")->first());
        $role->givePermissionTo(Permission::where('name', '=', "list-dashboards")->first());
        $role->givePermissionTo(Permission::where('name', '=', "update-dashboard")->first());
        $role->givePermissionTo(Permission::where('name', '=', "delete-dashboard")->first());
        $role->givePermissionTo(Permission::where('name', '=', "create-product")->first());
        $role->givePermissionTo(Permission::where('name', '=', "view-product")->first());
        $role->givePermissionTo(Permission::where('name', '=', "list-products")->first());
        $role->givePermissionTo(Permission::where('name', '=', "update-product")->first());
        $role->givePermissionTo(Permission::where('name', '=', "delete-product")->first());
        $role->givePermissionTo(Permission::where('name', '=', "view-manager")->first());
        $role->givePermissionTo(Permission::where('name', '=', "update-manager")->first());
        $role->givePermissionTo(Permission::where('name', '=', "create-payment")->first());
        $role->givePermissionTo(Permission::where('name', '=', "view-payment")->first());
        $role->givePermissionTo(Permission::where('name', '=', "list-payments")->first());
        $role->givePermissionTo(Permission::where('name', '=', "dhahabia-payment")->first());
        $role->givePermissionTo(Permission::where('name', '=', "balance-payment")->first());
        $role->givePermissionTo(Permission::where('name', '=', "create-conversation")->first());
        $role->givePermissionTo(Permission::where('name', '=', "view-conversation")->first());
        $role->givePermissionTo(Permission::where('name', '=', "list-conversations")->first());
        $role->givePermissionTo(Permission::where('name', '=', "update-conversation")->first());
        $role->givePermissionTo(Permission::where('name', '=', "delete-conversation")->first());

        // DRI Permissions
        $role = Role::where('name', '=', "chamber_employee")->first();
        $role->givePermissionTo(Permission::where('name', '=', "view-dashboard")->first());
        $role->givePermissionTo(Permission::where('name', '=', "list-dashboards")->first());
        $role->givePermissionTo(Permission::where('name', '=', "update-dashboard")->first());
        $role->givePermissionTo(Permission::where('name', '=', "delete-dashboard")->first());
        $role->givePermissionTo(Permission::where('name', '=', "view-product")->first());
        $role->givePermissionTo(Permission::where('name', '=', "list-products")->first());
        $role->givePermissionTo(Permission::where('name', '=', "update-product")->first());
        $role->givePermissionTo(Permission::where('name', '=', "delete-product")->first());
        $role->givePermissionTo(Permission::where('name', '=', "create-organization")->first());
        $role->givePermissionTo(Permission::where('name', '=', "view-organization")->first());
        $role->givePermissionTo(Permission::where('name', '=', "list-organizations")->first());
        $role->givePermissionTo(Permission::where('name', '=', "update-organization")->first());
        $role->givePermissionTo(Permission::where('name', '=', "delete-organization")->first());
        // $role->givePermissionTo(Permission::where('name', '=', "view-manager")->first());
        // $role->givePermissionTo(Permission::where('name', '=', "list-managers")->first());
        // $role->givePermissionTo(Permission::where('name', '=', "update-manager")->first());
        // $role->givePermissionTo(Permission::where('name', '=', "delete-manager")->first());
        $role->givePermissionTo(Permission::where('name', '=', "view-payment")->first());
        $role->givePermissionTo(Permission::where('name', '=', "list-payments")->first());
        $role->givePermissionTo(Permission::where('name', '=', "create-conversation")->first());
        $role->givePermissionTo(Permission::where('name', '=', "view-conversation")->first());
        $role->givePermissionTo(Permission::where('name', '=', "list-conversations")->first());
        $role->givePermissionTo(Permission::where('name', '=', "update-conversation")->first());
        $role->givePermissionTo(Permission::where('name', '=', "delete-conversation")->first());
    }
}
