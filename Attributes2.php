<?php

use Length as GlobalLength;
use LoginRequest as GlobalLoginRequest;

#[Attribute(Attribute::TARGET_PROPERTY)]
class NotBlank
{
}




#[Attribute(Attribute::TARGET_ALL)]
class Length
{
    public int $min;
    public int $max;


    public function __construct(int $min, int $max)
    {
        $this->min = $min;
        $this->$max = $max;
    }
}







class LoginRequest
{

    #[NotBlank]
    #[GlobalLength(min: 8, max: 12)]
    public string $username;

    #[NotBlank]
    #[GlobalLength(min: 8, max: 100)]
    public string $password;
}



function validate(object $object)
{
    $class = new ReflectionClass($object);
    $properties = $class->getProperties();
    foreach ($properties as $property) {
        validateNotBlank($property, $object);
        validateLength($property, $object);
    }
}





function validateNotBlank(ReflectionProperty $property, object $object)
{
    $attributes = $property->getAttributes(NotBlank::class);
    if (count($attributes) > 0) {
        if (!$property->isInitialized($object))
            throw new Exception("$property->name is not set!");
        if ($property->getValue($object) == null)
            throw new Exception("$property->name is null!");
    }
}



function validateLength(ReflectionProperty $property, object $object)
{
    if (!$property->isInitialized($object) || $property->getValue($object) == null) {
        return;
    }

    $value = $property->getValue($object);
    $attributes = $property->getAttributes(Length::class);
    foreach ($attributes as $attribute) {
        $length = $attribute->newInstance();
        $valueLength = strlen($value);
        if ($valueLength < $length->min)
            throw new Exception("$property->name is too short!");
        if ($valueLength > $length->max)
            throw new Exception("$property->name is too long!");
    }
}
















$request = new GlobalLoginRequest();
$request->username = "egananda";
$request->password = "1";


validate($request);
