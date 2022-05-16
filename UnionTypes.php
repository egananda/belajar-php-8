<?php


class Example
{
    public string|int|bool|array $data;
}




$example = new Example();
$example->data = "Ega";
$example->data = 123;
$example->data = true;
$example->data = ["Ega"];



function sampleFunction(string|array $data): string|array
{
    if (is_string($data)) {
        return "String" . PHP_EOL;
    } elseif (is_array($data)) {
        return "Array" . PHP_EOL;
    }
}



var_dump(sampleFunction("Ega"));
var_dump(sampleFunction(["Ega"]));
