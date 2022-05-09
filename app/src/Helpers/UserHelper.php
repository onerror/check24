<?php

namespace Helpers;

class UserHelper
{
    public static function loggedIn(){
        return !empty($_SESSION["user_id"]);
    }
}