<?php
    require_once("../db.php");
    Update("users", ["Name" => "Ali", "Surname" => "Kılıç"]); // Kullanıcıların ismi ve soyadı değiştiriliyor.
    Update("users", ["Name" => "Ali", "Surname" => "Kılıç"], ["ID" => 1]); // ID = 1 olan kullanıcının ismi ve soyadı değiştiriliyor.
?>