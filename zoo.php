<?php

abstract class Animal{
    protected $name;
    protected $species;
    protected $sound;
    const MAX_ANIMALS = 15;

    public function scream(){
        return $this->sound;
    }

    public function getName(){
        return $this->name;
    }

    public static function compareSpecies($first, $second){
        if($first->species == $second->species){
            echo "Ce sont les mêmes espèces !";
        }
        else{
            echo "Ce ne sont pas les mêmes espèces !";
        }
    }

    public static function showAnimalsDetails($animal){
        print_r($animal);
    }
}

class Lion extends Animal{
    protected $sound = "ROAAAAR";

    public function __construct($n, $s){
        $this->name = $n;
        $this->species = $s;
    }
}

class Girafe extends Animal{
    protected $sound = "SILENCE";

    public function __construct($n, $s){
        $this->name = $n;
        $this->species = $s;
    }
}

class Zoo{
    static $tab_animaux = [];

    public static function addAnimals(...$animal){ // ... -> nombre de paramètres variables : 
        // création de tableau animals
        self::$tab_animaux = [...self::$tab_animaux, ...$animal];
        return self::$tab_animaux ;
    }

    public static function checkPlace(){
        echo count(self::$tab_animaux);
        if(count(self::$tab_animaux) >= Animal::MAX_ANIMALS)
        {
            echo " Le zoo est plein ! "; 
        }
        else{ 
            echo " J'ai besoin d'animaux ! "; 
        }
    }

    public static function showAllAnimalsDetails(){
        foreach(self::$tab_animaux as $animal){
            print_r($animal);
        }
    }

    public static function showAllAnimals(){
        foreach(self::$tab_animaux as $animal){
            print_r($animal->getName()."<br>");
        }
    }   
}
echo "<pre>";


$lion = new Lion("Simba", "Félin");
$lion2 = new Lion("Mufasa", "Félin");
print_r($lion)."<br>";

echo "Le cri du lion est : ".$lion->scream()."<br>";

$girafe = new Girafe("Clothilde", "Mamifère");
$girafe2 = new Girafe("Marguerite", "Long Cou");
print_r($girafe)."<br>";

echo "Le cri de la giraphe est : ".$girafe->scream()."<br>";

$zoo = new Zoo();
//print_r(Zoo::addAnimals($lion, $girafe))."<br>"."<br>";
print_r(Zoo::addAnimals($lion, $girafe, $lion2, $girafe2))."<br>"."<br>";
echo '<br>';

Zoo::checkPlace();
echo '<br>';

// fonction qui compare les espèces des animaux :
echo "Y a-t-il une égalité d'espèce entre ces animaux ? "."<br>";
print_r(Animal::compareSpecies($lion,$lion2));
echo '<br>';
print_r(Animal::compareSpecies($lion,$girafe));
echo '<br>'; echo '<br>';

Animal::showAnimalsDetails($lion);
echo '<br>';
echo "Voici tous les animaux du zoo : "."<br>";
Zoo::showAllAnimalsDetails();
echo '<br>'; echo '<br>';

Zoo::showAllAnimals();


