<?php

namespace Core;

class Container
{
    protected $bindings = [];

    // binda funkciju u polje po kljucu
    public function bind($key, $resolver)
    {
        $this->bindings[$key] = $resolver;
    }

    // trazi funkciju u polju po kljucu, ako postoji poziva je
    public function resolve($key)
    {
        if (!array_key_exists($key, $this->bindings)) {
            throw new \Exception("No matching binding found for key $key");
        }

        $resolver = $this->bindings[$key];
        return call_user_func($resolver);

    }
}