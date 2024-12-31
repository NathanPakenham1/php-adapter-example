<?php

interface Coffee {
    public function getCost(): float;
    public function getDescription(): string;
}

class SimpleCoffee implements Coffee {
    public function getCost(): float {
        return 10;
    }

    public function getDescription(): string
    {
        return 'Simple Coffee';
    }
}

abstract class CoffeeDecorator implements Coffee {
    protected $coffee;

    public function __construct(Coffee $coffee) {
        $this->coffee = $coffee;
    }

    public function getCost(): float {
        return $this->coffee->getCost();
    }

    public function getDescription(): string {
        return $this->coffee->getDescription();
    }
}

class MilkCoffee extends CoffeeDecorator {
    public function getCost(): float
    {
        return $this->coffee->getCost();
    }

    public function getDescription(): string {
        return $this->coffee->getDescription() . ', milk';
    }
}

$coffee = new SimpleCoffee();
$MilkCoffee = new MilkCoffee($coffee);
echo $MilkCoffee->getCost();