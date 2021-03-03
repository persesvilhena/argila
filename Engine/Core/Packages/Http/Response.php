<?php


namespace Argila\Engine\Http;


class Response
{
    protected $code;
    protected $content;
    public function __construct()
    {
        $this->code = 200;
        $this->content = ' ';
    }

    public function __invoke()
    {
        http_response_code($this->code);
        echo $this->content;
        return $this;
    }

    public function setStatusCode($code){
        $this->code = $code;
        return $this;
    }

    public function setContent($value){
        $this->content = $value;
        return $this;
    }

}