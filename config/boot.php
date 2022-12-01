<?php

use RusinovArtem\Console\App;
use RusinovArtem\Console\DefaultDispatcher;


return (function () {
    $app = new App(include __DIR__ . "/regestry.php");

    $app->setEventDispatcher(DefaultDispatcher::build());

    return $app;
})();
