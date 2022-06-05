<?php
    require_once ("../timeago.php");
    $timeago = new timeAgoClass("Yıl", "Ay", "Hafta","Gün", "Saat", "Dakika", "Saniye"); // Yıl, Ay, Gün, Saat, Dakika, Saniye isimlerini belirliyoruz.
    var_dump($timeago->timeAgo("2022-05-18", "2022-05-19")); // 2 tane tarih arasında geçen süre hesaplanıyor.
    var_dump($timeago->timeAgo("2022-05-18")); // Şuanki tarih ile geçen tarih süresi hesaplanıyor.
?>
