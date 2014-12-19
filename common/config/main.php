<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'vi-VN',
    //'language' => 'en-US',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\ApcCache',
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                ],
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'ruleTable'=>'{{%admin_auth_rule}}',
            'assignmentTable'=>'{{%admin_auth_assignment}}',
            'itemChildTable'=>'{{%admin_auth_item_child}}',
            'itemTable'=>'{{%admin_auth_item}}'
        ],
    ],
    'modules' => [
        'admin' => [
            'class' => 'harrytang\admin\AdminModule',
        ],
        'account' => [
            'class' => 'harrytang\account\AccountModule',
        ],
        'product' => [
            'class' => 'harrytang\product\ProductModule',
        ],
        'contact' => [
            'class' => 'harrytang\contact\ContactModule',
        ],
    ],


];
