<?php

namespace SearchEngine\Test\View;

use SearchEngine\api\View\ViewInterface;
use SearchEngine\api\Test\View;
use ReflectionClass;
use SearchEngine\api\View\PackageView;
use Formation\MVC;

class  PackageViewTest extends ViewInterfaceTest
{
    public function getViewInterface(): ViewInterface
    {
        return (new ReflectionClass(PackageView::class))
                ->newInstanceArgs([]);
    }
}
