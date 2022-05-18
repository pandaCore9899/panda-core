<?php
return [
    'icons' => [
        'home'              => 'home',
        'user_management'   => 'people',
        'lesson_management' => 'menu_book'
    ],
    'menu' => [
        'home',
        'user_management' => [
            'admin_management',
            'account_management',
        ],
        'lesson_management' => [
            'lesson_schedule_management',
            'lesson_student_management',
            'material_management'
        ],
    ]
];
