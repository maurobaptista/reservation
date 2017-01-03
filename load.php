<?php
/*
    Load vendor autoload
 */
require_once 'vendor/autoload.php';

/*
    Load sensitive info
 */
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();
/*
    Load all config on one var
 */
$config = require_once 'config/app.php';
$config['db'] = require_once 'config/db.php';

/*
    Start Slim
 */
$app = new \Slim\App(["settings" => $config]);

/*
    CSRF - cross-site request forgery
 */
//$app->add(new \Slim\Csrf\Guard);

/*
    Start Container
 */
$container = $app->getContainer();
require_once 'container/db.php';
require_once 'container/view.php';