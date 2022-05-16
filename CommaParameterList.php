<?php


function sayHello(string $first, string $last): void
{
    echo "$first $last" . PHP_EOL;
}



function sum(int ...$value)
{
    return $value;
}




sayHello(
    "Ridho",
    "Putra",
);




sum(
    1,
    1,
    1,
    1,
    1,
    1,
    1,
    1,
    1,
    1,
    1,
    1,
    1,
    1,
);




$array = [
    "first"  => "Ridho",
    "Middle" => "Putra",
    "Last"   => "Duanda",
];



foreach ($array as $key => $value) {
    # code...
    echo "$value ";
}
