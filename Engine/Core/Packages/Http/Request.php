<?php
namespace Argila\Engine\Http;
class Request{
    public function Post($par = null){
        if($par == null){
            return $_POST;
        }else{
            return $_POST[$par];
        }
    }

    public function Get($par = null){
        if($par == null){
            return $_GET;
        }else{
            return $_GET[$par];
        }
    }

    public function Files($par = null){
        if($par == null){
            return $_FILES;
        }else{
            return $_FILES[$par];
        }
    }

    public function Body(){
        return @file_get_contents('php://input');
    }
}