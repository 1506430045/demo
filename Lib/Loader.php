<?php
namespace Lib;

class Loader {
    static function autoload($class) {
        require BASE_DIR . '/' . str_replace('\\', '/', $class) . '.class.php';
    }
}