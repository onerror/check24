<?php

namespace Controllers;

class LogoutController
{
    public function __invoke()
    {
        $_SESSION = [];
        
        session_destroy();
        
        header("location: index.php");
        exit;
    }
}