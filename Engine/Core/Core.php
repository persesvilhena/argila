<?php
namespace Argila\Engine;

use Argila\Engine\Http\Request;
use Argila\Engine\Chronos\Chronos;

class Core{

    public static function run(){
        require_once(__ROOT__.'Core/Packages/Autoload/Autoload.php');

        $request = new Request();
        $chronos = new Chronos($request->Body());
        echo $chronos->transform();
    }


}

?>


