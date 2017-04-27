<?php 

namespace SearchEngine\Test\Model;
use Reflection;
use SearchEngine\api\Model\PackageModel;
use SearchEngine\api\Model\PackageModelInterface;

class PackageModelTest extends PackageModelInterfaceTest
{   
    public function getPackageModelInterface(): PackageModelInterface
    {
        return (new \ReflectionClass(PackageModel::class))->newInstanceArgs([]);
    }
}
