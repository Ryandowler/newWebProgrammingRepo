<?php
//creating a class for manager, this is like an ingrediants list for a cake, i use this to make managers (cake)
//updated 
//sort out the ID !!!!!!!!!!!!!
class Manager {
    private $managerID;
    private $name;
    private $managerEmail;
    
    
    //creating the constructor, needed as my above variables are private, so this is how i access them
    public function __construct($mn, $mID, $me) {
        $this->name = $mn;
        $this->managerID = $mID;
        $this->managerEmail = $me;
        
    }
    //creating the gets 
    public function getManagerID() { return $this->managerID; }
    public function getName() { return $this->name; }
    public function getManagerEmail() { return $this->managerEmail; }
    
    
}
