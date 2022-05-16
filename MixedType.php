<?php

function testMixed(mixed $data): mixed
{
    if (is_array($data)) {
        return [];
    } elseif (is_string($data)) {
        return "string";
    } elseif (is_int($data)) {
        return 1;
    } else {
        return null;
    }
}



var_dump(testMixed(["anjing", "kucing", "kambing"]));
var_dump(testMixed("Kucing"));
var_dump(testMixed(1));
var_dump(testMixed(new stdClass()));
