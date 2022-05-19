<?php
    require_once("../db.php");
    Select("users"); // Sadece users tablosunu çekiyor.
    Select("users", "Name"); // Sadece Name sütununu çekiyor.
    Select("users", "Name", ["ID" => 1]); // ID = 1 olan kullanıcının Name sütununu çekiyor.
    Select("users", join: "LEFT JOIN posts ON users.ID = posts.UserID"); // users tablosundan posts tablosuna bağlantı kuruyor.
    Select("users", join: "LEFT JOIN posts ON users.ID = posts.UserID", order: "posts.ID DESC"); // users tablosundan posts tablosuna bağlantı kuruyor ve posts tablosundaki ID sütunu sıralıyor.
    Select("users", limit: "5"); // 5 tane kullanıcıyı çekiyor.
    Select("users", limit: "1", fetch: 1); // 1 tane kullanıcıyı çekiyor. (fetch kullanılıyor)
?>