<?php
namespace Gc\View\Helper;

use Zend\View\Helper\Url as UrlHelper;
use Zend\Mvc\Router\RouteMatch;
use Zend\Mvc\Router\SimpleRouteStack as Router;
use Zend\View\Renderer\PhpRenderer as View;
/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2012-10-17 at 20:40:08.
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class ModuleUrlTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ModuleUrl
     */
    protected $_object;

    /**
     * @var Router
     */
    protected $_router;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->_object = new ModuleUrl;
        $router = new Router();
        $router->addRoute('moduleEdit', array(
            'type' => 'Zend\Mvc\Router\Http\Segment',
            'options' => array(
                'route' => '/admin/module/:m[/:mc[/:ma]]',
                'defaults' => array(
                    'm' => '1'
                )
            )
        ));

        $this->_router = $router;
        $view = new View;
        $view->getHelperPluginManager();
        $this->_object->setView($view);
        $this->_object->getView()->plugin('url')->setRouter($router);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    public function testRoute()
    {
        $url = $this->_object->__invoke();
        $this->assertEquals('/admin/module/1', $url);
    }

    /**
     * @covers Gc\View\Helper\ModuleUrl::__invoke
     */
    public function testRouteWithControllerAndAction()
    {
        $this->assertEquals('/admin/module/1/index/index', $this->_object->__invoke('index', 'index'));
    }

    /**
     * @covers Gc\View\Helper\ModuleUrl::__invoke
     */
    public function testRouteWithParams()
    {
        $this->assertEquals('/admin/module/1/index/index?key=value', $this->_object->__invoke('index', 'index', array('key' => 'value')));
    }
}