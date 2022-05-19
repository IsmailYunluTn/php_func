<?php
    require_once("../db.php");
    Delete("users"); // Tüm kullanıcılar siliniyor.
    Delete("users", ["ID" => 1]); // ID = 1 olan kullanıcı siliniyor.
?>