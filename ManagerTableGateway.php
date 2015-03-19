<?php
class ManagerTableGateway {

    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }
    public function getManagers() {
        // execute a query to get all programmers
        $sqlQuery = "SELECT * FROM managers";
        
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();
        
        if (!$status) {
            die("Could not retrieve Managers");
        }
        
        return $statement;
    }
    
    public function getManagerById($managerID) {
        // execute a query to get the user with the specified id
        $sqlQuery = "SELECT * FROM managers WHERE managerID = :managerID";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "managerID" => $managerID
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not retrieve Managers");
        }
        
        return $statement;
    }
    
 
    //hhhhhhhhhhhhh
    public function deleteManager($managerID) {
        $sqlQuery = "DELETE FROM managers WHERE managerID = :managerID";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "managerID" => $managerID
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not delete Manager");
        }

        return ($statement->rowCount() == 1);
    }
    //test commit
    public function updateManager($managerID, $mn, $me) {
        $sqlQuery =
                "UPDATE managers SET " .
                "name = :name, " .
                "managerEmail = :managerEmail " ."WHERE managerID = :managerID"; 
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "managerID" => $managerID,
            "name" => $mn,
            "managerEmail" => $me
        );
        echo '<pre>';
        print_r($sqlQuery);
        print_r($params);
        print_r($_POST);
        echo '</pre>';
        
        $status = $statement->execute($params);
        return ($statement->rowCount() == 1);
    }

    public function insertManager(/*$mID,*/ $mn, $me) {
        $sqlQuery = "INSERT INTO managers " .
                "(name, managerEmail) " .
                "VALUES (:name, :managerEmail)";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "name" => $mn,
            "managerEmail" => $me
                
        );
        
        echo '<pre>';
        print_r($sqlQuery);
        print_r($params);
        print_r($_POST);
        echo '</pre>';
        
        $status = $statement->execute($params);
   
        if (!$status) {
            die("Could not insert Manager");
        } 
        $id = $this->connection->lastInsertId();
        
        return $id;
    }
}

