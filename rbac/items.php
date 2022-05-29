<?php

return [
    'user' => [
        'type' => 1,
    ],
    'manager' => [
        'type' => 1,
        'children' => [
            'Panelmanager',
        ],
    ],
    'admin' => [
        'type' => 1,
    ],
    'AdminPage' => [
        'type' => 2,
        'description' => 'Просмотор админки',
    ],
    'Panelmanager' => [
        'type' => 2,
        'description' => 'Панель менеджера ',
    ],
    'UserPanel' => [
        'type' => 2,
        'description' => 'Панель пользователя',
    ],
];
