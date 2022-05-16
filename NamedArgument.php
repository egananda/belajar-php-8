<?php



function sayHello(string $first, string $middle = "", string $last): void
{
    echo "Hello $first, $middle, $last" . PHP_EOL;
}


sayHello("Ega", "Nanda", "Brilian");
sayHello(last: "Brilian", first: "Ega", middle: "Nanda");


// sayHello("Ega", "Duanda"); // error
sayHello(first: "Ega", last: "Brilian");
