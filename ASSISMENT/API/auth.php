<?php
//	Add Passport to config/auth.php:

'guards' => [
    'api' => [
        'driver' => 'passport',
        'provider' => 'users',
    ],
],
?>