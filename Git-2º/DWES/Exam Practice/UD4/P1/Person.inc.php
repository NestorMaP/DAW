<?php
class Person {
    public static $quantityOfCharacters = 0;
    private int $id, $age;
    private ?self $father, $mother, $spouse;
    private string $name, $surname, $gender, $house; // Indicates that can return null or an instance of the class Person
    private array $children = [], $siblings = [];
    private $picture;

    public function __construct($name, $surname, $age, $gender, $house) {
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
        $this->gender = $gender;
        $this->house = $house;
        $this->father = null;
        $this->mother = null;
        $this->spouse = null;
        $this->picture = strtolower($this->name).'.jpg';
        self::$quantityOfCharacters++;
        $this->id = self::$quantityOfCharacters;
    }

    //GENERIC SETTER AND GETTER
    public function __set($property, $value) {
        if(property_exists($this,$property)) {
            $this->$property = $value;
        }
    }

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
        return null;
    }
    
    public function getId():int {
        return $this->id;
    }
    public function getName():string {
        return $this->name;
    }
    public function getSurname():string {
        return $this->surname;
    }
    public function getAge():int {
        return $this->age;
    }
    public function getHouse():string {
        return $this->house;
    }
    public function getGender():string {
        return $this->gender;
    }
    public function getFather() {
        if ($this->father != null) {
            return $this->father->name.' '.$this->father->surname;
        } else {
            return '';
        }
    }
    public function setFather($person) {
        $this->father = $person;
    }
    public function getMother() {
        if($this->mother != null) {
            return $this->mother->name.' '.$this->mother->surname;
        } else {
            return '';
        }
    }
    public function setMother($person) {
        $this->mother = $person;
    }
    public function getSpouse() {
        if ($this->spouse != null) {
            return $this->spouse->name.' '.$this->spouse->surnamej;
        } else {
            return '';
        }
    }
    public function setSpouse($person) {
        $this->spouse = $person;
    }
    public function addChild($person) {
        // Setting siblings for the childs
        foreach($this->children as $sibling) {
            $sibling->addSibling($person);
            $person->addSibling($sibling);
        }
        // Setting mother or father for the child
        if(strtolower($this->gender) == 'male') {
            $person->setFather($this);
        } elseif(strtolower($this->gender) == 'female') {
            $person->setMother($this);
        }
        // Adding the child only if not already exists
        if(!in_array($person, $this->children, true)) {
            $this->children[] = $person;
        }
    }
    public function getChildren():string {
        $children_string = '';
        for ($i=0; $i<count($this->children); $i++) {
            $children_string .= $this->children[$i]->name.' '.$this->children[$i]->surname;
            // Add a ', ' if it's not the last one
            if ($i != count($this->children)-1) {
                $children_string .= ', ';
            }
        }
        return $children_string;
    }
    public function addSiblings($person):void {
        if (!in_array($person, $this->siblings, true)) {
            $this->siblings[] = $person;
        }
    }
    public function getSiblings():string {
        $siblings_string = '';
        for ($i=0; $i<count($this->siblings); $i++) {
            $siblings_string .= $this->siblings[$i]->name.' '.$this->siblings[$i]->surname;
            // Add a ', ' if it's not the last one
            if ($i != count($this->siblings)-1) {
                $siblings_string .= ', ';
            }
        }
        return $siblings_string;
    }
    public function getPicture():string {
        return $this->picture;
    }
    
}