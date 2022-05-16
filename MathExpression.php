<?php


// $value = "A";
// $result = "";


// switch ($value) {
//     case 'A':
//     case 'B':
//     case 'C':
//         $result = "Anda lulus!";
//         break;
//     case 'E':
//         $result = "Gak pernah belajar ya?";
//         break;
//     default:
//         $result = "Nilai apa itu?" . PHP_EOL;
//         break;
// }



// echo $result;



$value = "A";

$result = match ($value) {
    "A", "B", "C" => "Anda lulus!",
    "D" => "Anda tidak lulus!",
    "E" => "Gak pernah belajar ya?",
    default => "Nilai apa itu?"
};


echo $result . PHP_EOL;



$value = 65;

$result = match (true) {
    $value >= 80 => "A",
    $value >= 70 => "B",
    $value >= 60 => "C",
    $value >= 50 => "D",
    default => "E"
};


echo $result;



$name = "Mrs. Widiyaa";

$result = match (true) {
    str_contains($name, "Mr.") => "Hello Sir.",
    str_contains($name, "Mrs.") => "Hello Mam.",
    default => "Hello."
};


echo $result . PHP_EOL;
