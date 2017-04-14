<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'anupam',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
       
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
			'who-we-are' => 'cms/whoweare',
            		'mission-vision' => 'cms/missionvision',
            		'organizational-structure' => 'cms/organizationalstructure',
            		'members' => 'cms/members',
            		'cold-storage-unit' => 'cms/coldstorageunit',
            		'sales-centre' => 'cms/salescentre',
            		'md' => 'cms/md',
			'financial'  => 'cms/financial',
			'future-plan'  => 'cms/futureplan',
			'branch-office'  => 'cms/branchoffice',
			'storage'  => 'cms/storage',
			'marketing-procurement' => 'cms/marketingprocurement',
			'fertilizer' => 'cms/fertilizer',
			'input' => 'cms/input',
			'engineering' => 'cms/engineering',
			'planning-development' => 'cms/planningdevelopment',
			'general-reports-publication' => 'cms/generalreportspublication',
			'bye-law' => 'cms/byelaw',
			'financial-report' => 'cms/financialreport',
			'other-report' => 'cms/otherreport',
			'society-corner'  => 'cms/societycorner',
			'event'  => 'cms/event',
			'notice'  => 'cms/notice',
			'tender'  => 'cms/tender',
            ],
        ],
        
    ],
	'defaultRoute' => 'index/index',
    'params' => $params,
	'modules' => [
		'admin' => [
				'class' => 'app\modules\admin\Module',
			],
		],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
