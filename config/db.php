<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host='.DB_SERVER.';dbname='.DB_NAME,
    'username' => DB_USER,
    'password' => DB_PASS,
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
