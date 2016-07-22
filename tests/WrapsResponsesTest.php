<?php namespace Foothing\Services\Tests\Controllers;

use Tests\Foothing\Uniform\Mocks\MockController;

class AbstractControllerTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var MockController
     */
    protected $controller;

    public function setUp() {
        parent::setUp();
        $this->controller = new MockController();
    }

	public function testSuccess() {
        // Response is subclass of
        // http://api.symfony.com/2.7/Symfony/Component/HttpFoundation/JsonResponse.html
        $response = $this->controller->actionSuccess();
        $this->assertEquals(200, $response->status());
        $this->assertEquals("successful operation", $response->headers->get("X-Status-Message"));
	}

    public function testFail() {
        $response = $this->controller->actionFail500();
        $this->assertEquals(500, $response->status());
        $this->assertEquals("failure 500", $response->headers->get("X-Status-Message"));
        $response = $this->controller->actionFail400();
        $this->assertEquals(400, $response->status());
        $this->assertEquals("failure 400", $response->headers->get("X-Status-Message"));
    }

    public function testWrapsExceptions() {
        $response = $this->controller->wrapsException();
        $this->assertEquals(500, $response->status());
    }

    public function testWrapsSuccess() {
        $response = $this->controller->wrapsSuccess();
        $this->assertEquals(200, $response->status());
        $this->assertEquals('{"foo":"bar"}', $response->content());
    }
}