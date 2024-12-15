<?php

$colors = [
    "\e[38;2;255;0;0m",  // Kırmızı
    "\e[38;2;255;127;0m", // Turuncu
    "\e[38;2;255;255;0m", // Sarı
    "\e[38;2;0;255;0m",   // Yeşil
    "\e[38;2;0;0;255m",   // Mavi
    "\e[38;2;75;0;130m",  // Mor
    "\e[38;2;238;130;238m", // Pembe
];

echo "                                                                                                                                                                                                                    
   ▄████████    ▄████████    ▄████████  ▄██████▄     ▄██████▄     ▄████████         ▄████████     ███     ███    █▄  ████████▄   ▄█   ▄██████▄  
  ███    ███   ███    ███   ███    ███ ███    ███   ███    ███   ███    ███        ███    ███ ▀█████████▄ ███    ███ ███   ▀███ ███  ███    ███ 
  ███    ███   ███    █▀    ███    ███ ███    ███   ███    █▀    ███    █▀         ███    █▀     ▀███▀▀██ ███    ███ ███    ███ ███▌ ███    ███ 
  ███    ███   ███         ▄███▄▄▄▄██▀ ███    ███  ▄███         ▄███▄▄▄            ███            ███   ▀ ███    ███ ███    ███ ███▌ ███    ███ 
▀███████████ ▀███████████ ▀▀███▀▀▀▀▀   ███    ███ ▀▀███ ████▄  ▀▀███▀▀▀          ▀███████████     ███     ███    ███ ███    ███ ███▌ ███    ███ 
  ███    ███          ███ ▀███████████ ███    ███   ███    ███   ███    █▄                ███     ███     ███    ███ ███    ███ ███  ███    ███ 
  ███    ███    ▄█    ███   ███    ███ ███    ███   ███    ███   ███    ███         ▄█    ███     ███     ███    ███ ███   ▄███ ███  ███    ███ 
  ███    █▀   ▄████████▀    ███    ███  ▀██████▀    ████████▀    ██████████       ▄████████▀     ▄████▀   ████████▀  ████████▀  █▀    ▀██████▀  
                            ███    ███                                                                                                                                              
";

foreach ($colors as $color) {
    echo "\e[38;2;$color" . 'burak' . "\e[0m\n";
}

$process = [
    "information" => [
        "0" => "Sistem Hakkında Bilgilendirme",
    ],
    "math" => [
        "1" => "Toplama",
        "2" => "Çıkartma",
        "3" => "Çarpma",
        "4" => "Bölme",
        "5" => "Mod Alma",
    ],
];

foreach ($process as $category => $operations) {
    echo "$category \n";  // Kategoriyi yazdır

    // İkinci seviyedeki elemanları yazdırma
    foreach ($operations as $key => $value) {
        echo "  $key => $value \n";  // Alt kategori ve işlemi yazdır
    }
}

$inp = readline("İşlem Seçiniz; ");
if (!array_key_exists($inp, $process)) {
    echo "Yapmaya Çalıştığınız İşlem Bulunamamıştır";
    exit;
} else if ($inp == 5) {
    $sayi1 = readline("Sayı 1 Giriniz. ");
} else {
    $sayi1 = readline("Sayı 1 Giriniz. ");
    $sayi2 = readline("Sayı 2 Giriniz. ");    
}

switch ($inp) {
    case "1";
        echo "Toplama Sonucu: " . $sayi1 + $sayi2;
        break;
    case "2";
        echo "Çıkartma Sonucu: " . $sayi1 - $sayi2;
        break;
    case "3";
        echo "Çarpmasının Sonucu: " . $sayi1 * $sayi2;
        break;
    case "4";
        echo "Bölme Sonucu: " . $sayi1 / $sayi2;
        break;
    case "5";
        echo "Mod Alma Sonucu: " . ($sayi1 % 2 == 0 ? "Çift" : "Tek");
        break;
    case "0";
        echo systemInformation();
        break;
    default;
        echo "Yapmaya Çalıştığınız İşlem Bulunamamıştır";
        break;
}

$cpu = shell_exec('wmic cpu get caption');
$gpu = shell_exec('wmic path win32_videocontroller get caption');

function byteToGigabyte($bytes){
    return $bytes / (1024 ** 3);
}
function systemInformation(){

$diskTotal = disk_total_space("/");
$diskFree = disk_free_space("/");

$diskTotalGB = byteToGigabyte($diskTotal);
$diskFreeGB = byteToGigabyte($diskFree);


echo "". $diskTotalGB ." free ". $diskFreeGB ."";

};