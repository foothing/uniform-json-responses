<?php namespace Tests\Foothing\Uniform\Mocks;

use Foothing\Uniform\WrapsResponses;

class MockController {

    use WrapsResponses;

    public function actionSuccess() {
        return $this->success(['foo' => 'bar'], "successful operation");
    }

    public function actionFail500() {
        return $this->fail("failure 500");
    }

    public function actionFail400() {
        return $this->fail("failure 400", 400);
    }

    public function throwsException() {
        throw new \Exception("ex");
    }

    public function wrapsException() {
        return $this->wrap(function(){
            throw new \Exception("wrapped");
        });
    }

    public function wrapsSuccess() {
        return $this->wrap(function(){
            return (object)["foo" => "bar"];
        });
    }
}
