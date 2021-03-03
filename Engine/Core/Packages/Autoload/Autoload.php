<?php
spl_autoload_register(
    function($class){
        $autoloadFiles = array(
            'Argila\Engine\General\Factory' => __ROOT__.'Core/Packages/General/Factory.php',
            'Argila\Engine\Http\Request' => __ROOT__.'Core/Packages/Http/Request.php',
            'Argila\Engine\Http\Response' => __ROOT__.'Core/Packages/Http/Response.php',
            'Argila\Engine\Chronos\Chronos' => __ROOT__.'Core/Packages/Chronos/Chronos.php',
            'Argila\Engine\Chronos\Lib' => __ROOT__.'Core/Packages/Chronos/Lib.php',
        );
        require_once($autoloadFiles[$class]);
    }
);
?>