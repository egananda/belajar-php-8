<?php


trait SampleTrait
{
    public abstract function sampleFunction(string $name): string;
}



class sampleClass
{
    use SampleTrait;

    public function sampleFunction(int $name): string
    {
        return "VP";
    }
}
