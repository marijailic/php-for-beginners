<?php

namespace tests;

class TestResponse
{
    public function __construct(public $body, public $status)
    {

    }

    public function isOK():bool
    {
        return $this->status == 200;
    }

    public function isRedirect():bool
    {
        return $this->status == 302;
    }
}