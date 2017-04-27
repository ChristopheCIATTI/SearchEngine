<?php

namespace SearchEngine\Test\View;

use SearchEngine\api\View;
use SearchEngine\api\View\ViewInterface;
use SearchEngine\api\Model\AbstractPackageModel;
use Formation\MVC\AbstractSubject;
use Formation\MVC\SubjectInterface;


abstract class ViewInterfaceTest extends \PHPUnit\Framework\TestCase
{
    abstract public function getViewInterface(): ViewInterface;

    /**
     * testInstanceofViewInterface
     */
    public function testInstanceOfViewInterface()
    {
        $this->assertTrue(
            $this->getViewInterface() instanceof ViewInterface
            );
    }
    /**
     * testMethods
     */
    public function testMethods()
    {
        $mock = $this->getViewInterface();
        $this->assertTrue(
            method_exists($mock, "render")
            && method_exists($mock, "update")
            );
    }
    /**
     *  @expectedException TypeError
     */
    public function testTypeError()
    {
        $this->getViewInterface()->update("Dummy");
    }
    /**
     * testRenderJsonOnly
     */
    public function testRenderJsonOnly()
    {
        $mock = $this->getViewInterface();
        $string = is_string($mock->render());
        json_decode($string); 
        $this->assertTrue(
            is_string($mock->render())
                && json_decode($mock->render()) instanceof \stdClass
                    );
    }
    public function testUpdate ()
    {
        $subjectMock = (new \ReflectionClass(DummyTest::class))
            ->newInstance([]);
        $mock = $this->getViewInterface();
        $mock->update($subjectMock);
        $obj = json_decode($mock->render());
        
        $this->assertTrue(
            property_exists($obj, "foo")
            && $obj->foo === "foo"
            );
    }
}

class DummyTest extends AbstractSubject implements SubjectInterface
{
    public $foo = "foo";
    public function __construct()
    {
        parent::__construct();
        
    }    
}
