<?php

interface Adapter
{
    public function request(string $url): Promise;
}

class AjaxAdapter implements Adapter
{
    public function request(string $url): Promise
    {
        // request and return promise
    }
}

class NodeAdapter implements Adapter
{
    public function request(string $url): Promise
    {
        // request and return promise
    }
}

class HttpRequester
{
    private $adapter;

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function fetch(string $url): Promise
    {
        return $this->adapter->request($url);
    }
}

class HttpRequesterWithAuth
{
    private HttpRequester $requester;

    public function __construct(HttpRequester $requester)
    {
        $this->requester = $requester;
    }

    public function fetch(string $url): Promise
    {
        if ($this->isAuth()) {
            return $this->requester->fetch($url);
        }
    }

    private function isAuth(): bool
    {
        // the rule to check the authentication
        return true;
    }
}








