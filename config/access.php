<?php

return [
    'login' => [
        'validation_rules' => [
            'userName' => 'required',
            'password' => 'required'
        ],
        'validation_messages' => [
            'userName.required' => 'Vui lòng nhập tên đăng nhập',
            'password.required' => 'Vui lòng nhập mật khẩu'
        ]
    ]
];