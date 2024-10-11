<?php

namespace tests;

use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    private function testRequest($uri, $payload = null, $method = 'GET'): TestResponse
    {
        $_SERVER['REQUEST_URI'] = $uri;
        $_SERVER['REQUEST_METHOD'] = $method;

        if ($payload != null && $method == 'POST') {
            $_POST = $payload;
        }

        ob_start();
        require __DIR__ . '/../public/index.php';
        $out = ob_get_contents();
        ob_end_clean();
        $http = http_response_code() ?: 200;
        return new TestResponse($out, $http);
    }

    protected function get($uri):TestResponse
    {
        return $this->testRequest(uri: $uri, method: 'GET');
    }

    protected function post($uri, $payload = null): TestResponse
    {
        return $this->testRequest(uri: $uri, method: 'POST', payload: $payload);
    }
}
