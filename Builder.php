//Реализация паттерна Строитель на PHP

<?php

// Компоненты автомобиля
class Engine {
    private $type;

    public function __construct($type) {
        $this->type = $type;
    }

    public function getType() {
        return $this->type;
    }
}

class Transmission {
    private $type;

    public function __construct($type) {
        $this->type = $type;
    }

    public function getType() {
        return $this->type;
    }
}

class Body {
    private $color;

    public function __construct($color) {
        $this->color = $color;
    }

    public function getColor() {
        return $this->color;
    }
}

// Класс автомобиля
class Car {
    private $engine;
    private $transmission;
    private $body;

    public function setEngine(Engine $engine) {
        $this->engine = $engine;
    }

    public function setTransmission(Transmission $transmission) {
        $this->transmission = $transmission;
    }

    public function setBody(Body $body) {
        $this->body = $body;
    }

    public function __toString() {
        return "Car with engine: " . $this->engine->getType() . 
               ", transmission: " . $this->transmission->getType() . 
               ", body color: " . $this->body->getColor();
    }
}

// Строитель автомобиля
abstract class CarBuilder {
    protected $car;

    public function __construct() {
        $this->car = new Car();
    }

    abstract public function buildEngine();
    abstract public function buildTransmission();
    abstract public function buildBody();

    public function getCar() {
        return $this->car;
    }
}

// Конкретные строители
class SedanBuilder extends CarBuilder {
    public function buildEngine() {
        $this->car->setEngine(new Engine("V6"));
    }

    public function buildTransmission() {
        $this->car->setTransmission(new Transmission("Automatic"));
    }

    public function buildBody() {
        $this->car->setBody(new Body("Red"));
    }
}

class SUVBuilder extends CarBuilder {
    public function buildEngine() {
        $this->car->setEngine(new Engine("V8"));
    }

    public function buildTransmission() {
        $this->car->setTransmission(new Transmission("Manual"));
    }

    public function buildBody() {
        $this->car->setBody(new Body("Blue"));
    }
}

// Директор
class CarDirector {
    private $builder;

    public function __construct(CarBuilder $builder) {
        $this->builder = $builder;
    }

    public function constructCar() {
        $this->builder->buildEngine();
        $this->builder->buildTransmission();
        $this->builder->buildBody();
        return $this->builder->getCar();
    }
}

// Клиентский код
$sedanBuilder = new SedanBuilder();
$director = new CarDirector($sedanBuilder);
$sedan = $director->constructCar();
echo "Создан седан: " . $sedan . "\n";

$suvBuilder = new SUVBuilder();
$director = new CarDirector($suvBuilder);
$suv = $director->constructCar();
echo "Создан внедорожник: " . $suv . "\n";

?>
