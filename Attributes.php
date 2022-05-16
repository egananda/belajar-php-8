<?php



#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_PARAMETER)]
class NotBlank
{
}



#[Attribute(Attribute::TARGET_PROPERTY)]
class Length
{
    public int $min;
    public int $max;


    public function __construct(int $min, int $max)
    {
        $this->min = $min;
        $this->max = $max;
    }
}





class LoginRequest
{
    #[NotBlank]
    #[Length(min: 4, max: 8)]
    public string $username;

    #[Length(min: 8, max: 100)]
    #[NotBlank]
    public string $password;
}


function validate(object $object): void
{
    $class = new ReflectionClass($object);
    $properties = $class->getProperties();
    foreach ($properties as $property) {
        validateNotBlank($property, $object);
        validateLength($property, $object);
    }
}



function validateNotBlank(ReflectionProperty $property, object $object): void
{
    $attributes = $property->getAttributes(NotBlank::class);
    if (count($attributes)) {
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






$request = new LoginRequest();
$request->username = "egananda";
$request->password = "321egananda";


validate($request);
