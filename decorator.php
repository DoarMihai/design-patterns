<?php

interface PizzaInterface {
    public function getCost();
}

class BasePizza implements PizzaInterface {
    public function getCost()
    {
        return 15;
    }
}

class CheeseTopping implements PizzaInterface {
    /** PizzaInterface */
    private $pizza;

    public function __construct(PizzaInterface $pizza)
    {
        $this->pizza = $pizza;
    }

    public function getCost()
    {
        return 5 + $this->pizza->getCost();
    }
}

class BaconTopping implements PizzaInterface {
    /** PizzaInterface */
    private $pizza;

    public function __construct(PizzaInterface $pizza)
    {
        $this->pizza = $pizza;
    }

    public function getCost()
    {
        return 7 + $this->pizza->getCost();
    }
}

$basePizza = new BasePizza;

$cheesePizza = new CheeseTopping($basePizza);
$baconTopping = new BaconTopping($cheesePizza);

echo $baconTopping->getCost();