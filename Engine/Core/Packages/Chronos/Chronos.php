<?php
namespace Argila\Engine\Chronos;

use Argila\Engine\Chronos\Lib;

class Chronos
{
    public $body;
    public $dc_body;
    public $errors;

    public function __construct($body)
    {
        $this->body = $body;
    }

    public function transform(){
        if($this->validate()){
            $this->dc_body = json_decode($this->body);
            return $this->gear($this->dc_body, 0)['middle'] . chr(13).chr(13).'<!--' . $this->errors . '-->';
        }else{
            return 'Argila Error: Please enter a valid json format';
        }
    }

    private function gear($obj, $beautify){
        $attr = '';
        $middle = '';
        if(gettype($obj) == 'object' || gettype($obj) == 'array'){
            foreach ($obj as $key => $item){
                if(substr($key, 0, 1) == '@'){
                    if(gettype($item) == 'object' || gettype($item) == 'array') {
                        $attr = $attr . ' ' . substr($key, 1) . '=""';
                        $this->error('Invalid value in attribute: ' . $key . chr(13));
                    }else{
                        $attr = $attr . ' ' . substr($key, 1) . '="' . $item . '"';
                    }
                }else{
                    $res = $this->gear($item, ($beautify + 1));
                    $middle = $middle . chr(13) .str_repeat(chr(9), $beautify) .'<' . $key . $res['attr'] . '>' . $res['middle'] .
                        chr(13) .str_repeat(chr(9), $beautify) . '</' . $key . '>';
                }
            }
        }else{
            $attr = '';
            $middle = $obj;
        }
        return [
            'attr' => $attr,
            'middle' => isset($middle) ? $middle : ''
        ];
    }

    private function error($message){
        $this->errors = $this->errors . $message;
    }

    private function validate(){
        return(json_decode($this->body,true) == NULL) ? false : true;
    }

}