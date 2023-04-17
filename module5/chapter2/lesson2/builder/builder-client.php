<?php

// fake examples of builder design pattern
// @see https://github.com/DesignPatternsPHP/DesignPatternsPHP/tree/main/Creational/Builder

$car = (new CarBuilder)
    ->createVehicle()
    ->addDoors()
    ->addEngine()
    ->getVehicle();

$creditCard = (new CreditCardBuilder)
    ->createCreditCard()
    ->addNumber($number)
    ->addName($name)
    ->addInstallments(4)
    ->addExternalService($service)
    ->getCreditCard();
