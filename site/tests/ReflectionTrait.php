<?php

namespace App\Tests;

trait ReflectionTrait
{
    public function invokeMethod($object, string $methodName, array $parameters = [])
    {
        try {
            $method = new \ReflectionMethod($object, $methodName);
            $method->setAccessible(true);

            return $method->invokeArgs($object, $parameters);
        } catch (\ReflectionException $e) {
        }

        return false;
    }

    public function setPrivatePropertyValue($object, string $propertyName, $value): void
    {
        try {
            $property = new \ReflectionProperty($object, $propertyName);
            $property->setAccessible(true);

            $property->setValue($object, $value);
            $property->setAccessible(false);
        } catch (\ReflectionException $e) {
        }
    }

    public function getPrivatePropertyValue($object, $propertyName)
    {
        try {
            $property = new \ReflectionProperty($object, $propertyName);
            $property->setAccessible(true);

            return $property->getValue($object);
        } catch (\ReflectionException $e) {
        }
    }

    public function getPrivateConstant($object, string $constantName)
    {
        $class = new \ReflectionClass(\get_class($object));

        return $class->getConstant($constantName);
    }
}