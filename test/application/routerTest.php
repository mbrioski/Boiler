<?php

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2013-06-26 at 11:42:06.
 */
use ridesoft\Boiler\application\router;

class routerTest extends PHPUnit_Framework_TestCase {
    private $path='/var/www/Boiler/';
    /**
     * @var router
     */
    protected $object;
    public static function setUpBeforeClass()
    {
        self::$registry = new \ridesoft\Boiler\application\Registry;
        self::$registry->path=  $this->path;
    }
 
    public static function tearDownAfterClass()
    {
        self::$registry = NULL;
    }
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     * @group annotation
     */
    protected function setUp() {
        ;
        $this->object = new router(self::$registry);
        $this->assertInstanceOf('ridesoft\Boiler\application\router', $this->object);
        
    }

    /**
     * @covers router::loader
     * @dataProvider provider
     * @group annotation
     */
    public function testLoader($route, $expectedFile, $expectedController, $expectedAction) {
        $this->object->setPath($this->path.'controller/');
        $_GET = $route;
        $this->object->loader();
        $this->assertEquals($this->object->controller, $expectedController);
        $this->assertEquals($this->object->file, $expectedFile);
        $this->assertEquals($this->object->action, $expectedAction);
    }

    public function provider() {
        return array(
            array("", "http://localhost/Boiler/controller/indexController.php", "index", "index"),
            array("cms", "http://localhost/Boiler/cms/controller/indexController.php", "index", "index")
        );
    }

}
