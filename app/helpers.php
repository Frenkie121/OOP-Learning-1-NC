<?php

// namespace App;

function flashMessage(string $name, string $value, string $type = null)
{
    $flash = $_SESSION[$name];
    if (isset($flash)) {
        unset($flash);
    } else {
        $type ?? $name;
        $flash = $value;
        return <<<TAG
        <div class="alert alert-$type text-center">$value</div>
TAG;
    }
}