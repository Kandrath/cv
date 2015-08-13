<?php

// Configuration serveur local
define('HOST_DB', '192.168.1.1');

define('DB', serialize(array(
    'app_rw' => array(
        'host' => HOST_DB,
        'name' => 'cv',
        'login' => 'phpapp',
        'password' => 'uhSBBSFvGuPFCf3T'
    )
)));