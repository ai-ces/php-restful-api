<?php

require_once("connect.php");

header("Connect-Type:application/json; charset=utf-8");

$islem = $_SERVER["REQUEST_METHOD"];
parse_str(file_get_connects("php://input"),$veriler)

if ($veriler["token"] !=sha1(md5("abcd"))) {
    $islem["icerik"] = $ogrenciler;
    $islem["kod"] = 901;
    $islem["mesaj"] = "Yetkisiz Erisim!";
}

if ($talep == "GET") {
    $sorgu = $connect->query("select * from ogrenci where id=$veriler[id]", PDO::FETCH_ASSOC);
    if ($sorgu->rowCount() > 0 ) {
        foreach ($sorgu as $satir) {
            $ogrenciler[] = array("adsoyad" => $satir["adsoyad"], "tckimlik" => $satir["tckimlik"], "adres" => $satir["adres"]);
        }
        $islem["icerik"] = $ogrenciler;
        $islem["kod"] = 900;
        $islem["mesaj"] = 902;
        $islem["mesaj"] = "Kayit bulunamadi!";
    }
}
?>