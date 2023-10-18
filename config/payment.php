<?php


return [
    'method' => [
        [
            'name'   => 'Chuyển khoản',
            'avatar' => '/images/payment-method.png',
            'code'   => 1
        ],
        [
            'name'   => 'Tiền mặt',
            'avatar' => 'https://cdn.pixabay.com/photo/2020/04/16/23/09/dollar-5052608_1280.png',
            'code'   => 2
        ],
        [
            'name'   => 'Thẻ ATM Internet Banking',
            'avatar' => 'images/bank-transfer.png',
         
            'code'   => 3
        ],
        [
            'name'   => 'MoMo',
            'avatar' => '/images/momo.png',
         
            'code'   => 4
        ],
    ],
    'type_price' => [
        1 => 2000,
        2 => 10000,
        3 => 20000,
        4 => 40000,
        5 => 80000
    ]
];
