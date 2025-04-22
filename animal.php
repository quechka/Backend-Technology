<?php
abstract class Animal {
   
    protected $name;
  
    private $age;
    
    // Конструктор класса
    public function __construct(string $name, int $age) {
        $this->name = $name;
        $this->age = $age;
    }
    
   
    public function eat(string $food): void {
        echo $this->name . " ест " . $food . ".\n";
    }
    
    public function sleep(int $hours): void {
        echo $this->name . " спит " . $hours . " часов.\n";
    }
    

    abstract public function makeSound(): void;
    
  
    public function getAge(): int {
        return $this->age;
    }
    
   
    public function getName(): string {
        return $this->name;
    }
    
    
    public function setAge(int $age): void {
        if ($age > 0) {
            $this->age = $age;
        } else {
            echo "Возраст должен быть положительным числом.\n";
        }
    }
}


class Cat extends Animal {
    // Реализация абстрактного метода
    public function makeSound(): void {
        echo $this->getName() . " говорит: Мяу!\n";
    }
    
    
    public function purr(): void {
        echo $this->getName() . " мурлычет: Мрррр...\n";
    }
}


class Dog extends Animal {
    private $breed;
    
    public function __construct(string $name, int $age, string $breed) {
        parent::__construct($name, $age);
        $this->breed = $breed;
    }
    
    
    public function makeSound(): void {
        echo $this->getName() . " говорит: Гав-гав!\n";
    }
    
    
    public function fetch(string $item): void {
        echo $this->getName() . " приносит " . $item . ".\n";
    }
    
    
    public function getBreed(): string {
        return $this->breed;
    }
}


class Bird extends Animal {
    private $wingspan;
    
    public function __construct(string $name, int $age, float $wingspan) {
        parent::__construct($name, $age);
        $this->wingspan = $wingspan;
    }
    
    
    public function makeSound(): void {
        echo $this->getName() . " поет: Чик-чирик!\n";
    }
    
    
    public function fly(int $distance): void {
        echo $this->getName() . " летит на расстояние " . $distance . " метров.\n";
    }
    
    
    public function getWingspan(): float {
        return $this->wingspan;
    }
}

$animals = [
    new Cat("Барсик", 3),
    new Dog("Рекс", 5, "Овчарка"),
    new Bird("Кеша", 2, 0.25),
    new Cat("Мурка", 4),
    new Dog("Бобик", 7, "Дворняга")
];
foreach ($animals as $animal) {
    echo "--- " . $animal->getName() . " (" . get_class($animal) . ", возраст: " . $animal->getAge() . ") ---\n";
    $animal->eat("корм");
    $animal->sleep(8);
    $animal->makeSound(); 
    if ($animal instanceof Cat) {
        $animal->purr();
    } elseif ($animal instanceof Dog) {
        $animal->fetch("палку");
        echo "Порода: " . $animal->getBreed() . "\n";
    } elseif ($animal instanceof Bird) {
        $animal->fly(50);
        echo "Размах крыльев: " . $animal->getWingspan() . " м\n";
    }
    
    echo "\n";
}


$cat = new Cat("Васька", 2);
echo $cat->getName() . " сейчас имеет возраст " . $cat->getAge() . " года.\n";
$cat->setAge(3);
echo "Теперь " . $cat->getName() . " имеет возраст " . $cat->getAge() . " года.\n";


$cat->setAge(-1); 
?>