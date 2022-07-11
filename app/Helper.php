<?php

namespace App;

class Helper
{
    public static function flashMessage(string $name, string $type)
    {
        if (isset($_SESSION[$name])) {
            $value = $_SESSION[$name];
            echo "<div class=\"alert alert-$type text-center\">$value</div>";
        }
    }

    public static function unsetMessage($name)
    {
        if (isset($_SESSION[$name])){
            unset($_SESSION[$name]);            
        }
    }
}
