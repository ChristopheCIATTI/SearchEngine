<?php

use SearchEngine\api\Controller\PackageController;
use SearchEngine\api\View\PackageView;
use SearchEngine\api\Model\PackageModel;

require "../vendor/autoload.php";

header("Content-Type : application/json; charset=utf8");

echo (
    new PackageController(
        new PackageModel, 
        new PackageView)
    )->execute();



 