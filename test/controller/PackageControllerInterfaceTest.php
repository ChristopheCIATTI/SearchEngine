<?php

namespace SearchEngine\Test\Controller;

use SearchEngine\api\Controller\PackageControllerInterface;
use \PHPUnit\Framework\TestCase;
use SearchEngine\api\Controller\PackageController;

abstract class PackageControllerInterfaceTest extends TestCase
{
    /**
     * get PackageControllerInterface
     */
    abstract public function getPackageControllerInterface(
        ): PackageControllerInterface;

    /**
     * testMethods
     */
    public function testMethods()
    {
        $this->assertTrue(
            method_exists(
                $this->getPackageControllerInterface(), "execute")
            );
    }
    /**
     * testIntanceOfControllerInterface
     */
    public function testIntanceOfControllerInterface()
    {
        $this->assertTrue(
            $this->getPackageControllerInterface()
            instanceof PackageController
            );
    }
    /**
     * testExecute
     * @runInSeparateProcess
     */
    public function testExecute()
    {
        $mock = $this->getPackageControllerInterface();
        $output = $mock->execute();
        $this->assertTrue(
            is_string($output)
            && json_decode($output) 
            );
    }
//     public function testExecuteJson()
//     {
//         $mock = $this->getPackage
//     }
}
