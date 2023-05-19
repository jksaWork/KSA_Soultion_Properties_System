<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'super_admin' => [
            'roles' => 'c,r,u,d',
            'owners' => 'c,r,u,d',
            'realstates' => 'c,r,u,d',
            'supervisors' => 'c,r,u,d',
            'clients' => 'c,r,u,d',
            'reports' => 'c',
            'contracts' => 'c,r,u,d',
            'achievement' => 'c,r,u,d',
            'settings' => 'c',
            'users' => 'c',
            'realstatement_type' => 'c,r,u,d',
            'nationalities' => 'c,r,u,d',
            'province' => 'c,r,u,d',
            'units' => 'c,r,u,d',
            'maintenance' => 'c,r,u,d',
            'banks' => 'c,r,u,d',
            'areas' => 'c,r,u,d',
            'sub_areas' => 'c,r,u,d',
        ],
        'admin' => [],
        'user' => [],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ],
    'create_users' => true,
];
