<?php require 'vendor/autoload.php';

use \App\App;

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$app = new App();
$app->payment($_POST);

?>