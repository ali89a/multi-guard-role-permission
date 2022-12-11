<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class AccessControlsTableSeeder extends Seeder
{


    public function run()
    {

        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        $dev = \App\Models\Admin::where('email', 'admin@gmail.com')->first();

        if (empty($dev)) {

            $data = [
                [
                    'id' => '1',
                    'name' => 'Admin',
                    'email' => 'admin@gmail.com',
                    'password' => bcrypt('12345678'),
                ],
                [
                    'id' => '2',
                    'name' => 'Accounts',
                    'email' => 'accounts@gmail.com',
                    'password' => bcrypt('12345678'),
                ],

            ];

            DB::table('admins')->insert($data);
        }

        $dev = \App\Models\Admin::where('email', 'admin@gmail.com')->first();

        //data for roles table
        $data = [
            ['name' => 'Admin', 'guard_name' => 'admin', 'company_id' => 1,'is_default'=>1],
            ['name' => 'Accounts', 'guard_name' => 'web', 'company_id' => Null,'is_default'=>0],
        ];
        DB::table('roles')->insert($data);

        //data for permissions table
        $data = [
            ['name' => 'dashboard', 'guard_name' => 'web', 'group_name' => 'dashboard'],

            ['name' => 'admin-list', 'guard_name' => 'admin', 'group_name' => 'admin'],
            ['name' => 'admin-create', 'guard_name' => 'admin', 'group_name' => 'admin'],
            ['name' => 'admin-show', 'guard_name' => 'admin', 'group_name' => 'admin'],
            ['name' => 'admin-edit', 'guard_name' => 'admin', 'group_name' => 'admin'],
            ['name' => 'admin-delete', 'guard_name' => 'admin', 'group_name' => 'admin'],

            ['name' => 'role-list', 'guard_name' => 'admin', 'group_name' => 'role'],
            ['name' => 'role-create', 'guard_name' => 'admin', 'group_name' => 'role'],
            ['name' => 'role-show', 'guard_name' => 'admin', 'group_name' => 'role'],
            ['name' => 'role-edit', 'guard_name' => 'admin', 'group_name' => 'role'],
            ['name' => 'role-delete', 'guard_name' => 'admin', 'group_name' => 'role'],

            ['name' => 'permission-list', 'guard_name' => 'admin', 'group_name' => 'permission'],
            ['name' => 'permission-create', 'guard_name' => 'admin', 'group_name' => 'permission'],
            ['name' => 'permission-show', 'guard_name' => 'admin', 'group_name' => 'permission'],
            ['name' => 'permission-edit', 'guard_name' => 'admin', 'group_name' => 'permission'],
            ['name' => 'permission-delete', 'guard_name' => 'admin', 'group_name' => 'permission'],

            ['name' => 'division-list', 'guard_name' => 'admin', 'group_name' => 'division'],
            ['name' => 'division-create', 'guard_name' => 'admin', 'group_name' => 'division'],
            ['name' => 'division-show', 'guard_name' => 'admin', 'group_name' => 'division'],
            ['name' => 'division-edit', 'guard_name' => 'admin', 'group_name' => 'division'],
            ['name' => 'division-delete', 'guard_name' => 'admin', 'group_name' => 'division'],

            ['name' => 'district-list', 'guard_name' => 'admin', 'group_name' => 'district'],
            ['name' => 'district-create', 'guard_name' => 'admin', 'group_name' => 'district'],
            ['name' => 'district-show', 'guard_name' => 'admin', 'group_name' => 'district'],
            ['name' => 'district-edit', 'guard_name' => 'admin', 'group_name' => 'district'],
            ['name' => 'district-delete', 'guard_name' => 'admin', 'group_name' => 'district'],

            ['name' => 'upazila-list', 'guard_name' => 'admin', 'group_name' => 'upazila'],
            ['name' => 'upazila-create', 'guard_name' => 'admin', 'group_name' => 'upazila'],
            ['name' => 'upazila-show', 'guard_name' => 'admin', 'group_name' => 'upazila'],
            ['name' => 'upazila-edit', 'guard_name' => 'admin', 'group_name' => 'upazila'],
            ['name' => 'upazila-delete', 'guard_name' => 'admin', 'group_name' => 'upazila'],

            ['name' => 'plan-list', 'guard_name' => 'admin', 'group_name' => 'plan'],
            ['name' => 'plan-create', 'guard_name' => 'admin', 'group_name' => 'plan'],
            ['name' => 'plan-show', 'guard_name' => 'admin', 'group_name' => 'plan'],
            ['name' => 'plan-edit', 'guard_name' => 'admin', 'group_name' => 'plan'],
            ['name' => 'plan-delete', 'guard_name' => 'admin', 'group_name' => 'plan'],

            ['name' => 'category-list', 'guard_name' => 'web', 'group_name' => 'category'],
            ['name' => 'category-create', 'guard_name' => 'web', 'group_name' => 'category'],
            ['name' => 'category-show', 'guard_name' => 'web', 'group_name' => 'category'],
            ['name' => 'category-edit', 'guard_name' => 'web', 'group_name' => 'category'],
            ['name' => 'category-delete', 'guard_name' => 'web', 'group_name' => 'category'],

        ];

        DB::table('permissions')->insert($data);
        //Data for role user pivot
        $data = [
            ['role_id' => 1, 'model_type' => 'App\Models\Admin', 'model_id' => $dev->id],
            ['role_id' => 2, 'model_type' => 'App\Models\Admin', 'model_id' => 2],
        ];
        DB::table('model_has_roles')->insert($data);
        //Data for role permission pivot
        $permissions = Permission::all();
        foreach ($permissions as $key => $value) {
            $data = [
                ['permission_id' => $value->id, 'role_id' => 1],
            ];

            DB::table('role_has_permissions')->insert($data);
        }


        // $count_permission = DB::table('permissions')->count();
        // $count_role = DB::table('roles')->count();

        // for ($i = 1; $i <= $count_role; $i++) {
        //     $data = [];
        //     for ($j = 1; $j <= $count_permission; $j++) {
        //         $data[$j]['permission_id'] = $j;
        //         $data[$j]['role_id'] = $i;
        //     }
        //     DB::table('role_has_permissions')->insert($data);
        //}
    }
}
