<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'post_event_create',
            ],
            [
                'id'    => 18,
                'title' => 'post_event_edit',
            ],
            [
                'id'    => 19,
                'title' => 'post_event_show',
            ],
            [
                'id'    => 20,
                'title' => 'post_event_delete',
            ],
            [
                'id'    => 21,
                'title' => 'post_event_access',
            ],
            [
                'id'    => 22,
                'title' => 'post_new_create',
            ],
            [
                'id'    => 23,
                'title' => 'post_new_edit',
            ],
            [
                'id'    => 24,
                'title' => 'post_new_show',
            ],
            [
                'id'    => 25,
                'title' => 'post_new_delete',
            ],
            [
                'id'    => 26,
                'title' => 'post_new_access',
            ],
            [
                'id'    => 27,
                'title' => 'page_access',
            ],
            [
                'id'    => 28,
                'title' => 'setting_general_edit',
            ],
            [
                'id'    => 29,
                'title' => 'setting_general_show',
            ],
            [
                'id'    => 30,
                'title' => 'setting_general_access',
            ],
            [
                'id'    => 31,
                'title' => 'setting_server_info_edit',
            ],
            [
                'id'    => 32,
                'title' => 'setting_server_info_show',
            ],
            [
                'id'    => 33,
                'title' => 'setting_server_info_access',
            ],
            [
                'id'    => 34,
                'title' => 'setting_top_rank_edit',
            ],
            [
                'id'    => 35,
                'title' => 'setting_top_rank_show',
            ],
            [
                'id'    => 36,
                'title' => 'setting_top_rank_access',
            ],
            [
                'id'    => 37,
                'title' => 'setting_chien_tich_edit',
            ],
            [
                'id'    => 38,
                'title' => 'setting_chien_tich_show',
            ],
            [
                'id'    => 39,
                'title' => 'setting_chien_tich_access',
            ],
            [
                'id'    => 40,
                'title' => 'setting_download_edit',
            ],
            [
                'id'    => 41,
                'title' => 'setting_download_show',
            ],
            [
                'id'    => 42,
                'title' => 'setting_download_access',
            ],
            [
                'id'    => 43,
                'title' => 'setting_nap_the_edit',
            ],
            [
                'id'    => 44,
                'title' => 'setting_nap_the_show',
            ],
            [
                'id'    => 45,
                'title' => 'setting_nap_the_access',
            ],
            [
                'id'    => 46,
                'title' => 'setting_huong_dan_edit',
            ],
            [
                'id'    => 47,
                'title' => 'setting_huong_dan_show',
            ],
            [
                'id'    => 48,
                'title' => 'setting_huong_dan_access',
            ],
            [
                'id'    => 49,
                'title' => 'setting_quy_dinh_edit',
            ],
            [
                'id'    => 50,
                'title' => 'setting_quy_dinh_show',
            ],
            [
                'id'    => 51,
                'title' => 'setting_quy_dinh_access',
            ],
            [
                'id'    => 52,
                'title' => 'profile_password_edit',
            ],
            [
                'id'    => 53,
                'title' => 'setting_home_edit',
            ],
            [
                'id'    => 54,
                'title' => 'setting_home_show',
            ],
            [
                'id'    => 55,
                'title' => 'setting_home_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
