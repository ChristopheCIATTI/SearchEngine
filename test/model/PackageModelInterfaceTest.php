<?php

namespace SearchEngine\Test\Model;
use SearchEngine\api\Model\PackageInterface;
use SearchEngine\api\Model\PackageModel;
use SearchEngine\api\Model\PackageModelInterface;
use SearchEngine\api\View\ViewInterface;
use Formation\MVC\SubjectInterface;

abstract class PackageModelInterfaceTest extends \PHPUnit\Framework\TestCase
{
    abstract public function getPackageModelInterface(): PackageModelInterface;
    /**
     * 
     * @dataProvider attributesProvider
     */
    public function testAttribut($attribut)
    {
        $mock = $this->getPackageModelInterface($attribut);
        {
            $mock = $this->getPackageModelInterface();
            $this->assertTrue(property_exists($mock, $attribut));
        }
    }
    /**
     * 
     * attributeProvider
     */
    public final function attributesProvider()
    {
        return [
            ["distribuable"],
            ["testable"],
            ["langage"],
            ["vendor"],
            ["repository"],
            ["package"],
            ["description"],
            ["keywords"],
            ["type"],
            ["homepage"],
            ["dependencies"],
            ["devDependencies"],
            ["version"],
            ["license"],
            ["author"],
        ];
    }
    /**
     * 
     * @dataProvider methodsProvider
     */
    public function testMethod($method)
    {
        $mock = $this->getPackageModelInterface($method);
        $this->assertTrue(
            method_exists($mock, $method)
            );
    }
    /**
     *
     * methodsProvider
     */
    public final function methodsProvider()
    {
        return [
           ["get"]
        ];
    }
    /**
     * testInstanceOfSubjectInterface
     */
    public function testInstanceOfSubjectInterface()
    {
        $this->assertTrue(
            $this->getPackageModelInterface() instanceof SubjectInterface
            );   
    }
    /**
     * testInstanceOfPackageModelInterface
     */
    public function testInstanceOfPackageModelInterface()
    {
        $this->assertTrue(
            $this->getPackageModelInterface() instanceof PackageModelInterface
            );   
    }
//     /**
//      * @expectedException RuntimeException
//      */
//     public function testRunTimeException()
//     {
//         $this->getPackageModelInterface()->get();
//     }
}
