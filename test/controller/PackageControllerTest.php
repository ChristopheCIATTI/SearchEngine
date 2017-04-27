<?php

namespace SearchEngine\Test\Controller;
use Reflection;
use SearchEngine\api\Controller\PackageController;
use SearchEngine\api\Controller\PackageControllerInterface;
use SearchEngine\api\Model\PackageModel;
use SearchEngine\api\View\PackageView;

class PackageControllerTest extends PackageControllerInterfaceTest
{
    public function getPackageControllerInterface(): PackageControllerInterface
    {
        return (new \ReflectionClass(PackageController::class))
        ->newInstanceArgs([
            (new \ReflectionClass(PackageModel::class))->newInstanceArgs([]),
            (new \ReflectionClass(PackageView::class))->newInstance([]),
        ]);
    }
}
