<?php namespace Foothing\Uniform;

use Illuminate\Http\JsonResponse;

trait WrapsResponses {

    protected function success($result = null, $message = null) {
        $response = new JsonResponse($result, 200);
        if ($message) {
            $response = $response->header('X-Status-Message', $message);
        }
        return $response;
    }

    protected function fail($message = null, $code = 500) {
        $response = new JsonResponse(null, $code);
        if ($message) {
            $response = $response->header('X-Status-Message', $message);
        }
        return $response;
    }

    protected function wrap(\Closure $function) {
        try {
            return $this->success(call_user_func($function));
        } catch (\Exception $ex) {
            return $this->fail();
        }
    }

}