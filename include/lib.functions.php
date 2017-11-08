<?php 

function post($key) {
    if(array_key_exists($key, $_POST)) {
        return $_POST[$key];
    }

    return false;
}

?>