<?php
class WineryTableGateway {
    private $connection;
    public function __construct($c) {
        $this->connection = $c;
    }
    public function gets() {
        // execute a query to get all managers
        $sqlQuery = "SELECT * FROM managers";
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();
        if (!$status) {
            die("Could not retrieve managers");
        }
        return $statement;
    }
    public function getManagerById($id) {
        // execute a query to get the manager with the specified id
        $sqlQuery = "SELECT * FROM managers WHERE id = :id";
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );
        $status = $statement->execute($params);
        if (!$status) {
            die("Could not retrieve manager");
        }
        return $statement;
    }
    public function insertManager($n, $o, $n) {
        $sqlQuery = "INSERT INTO managers " .
                "(name, office, extension) " .
                "VALUES (:name, :office, :extension)";
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "name" => $n,
            "office" => $e,
            "extension" => $m
        );
        $status = $statement->execute($params);
        if (!$status) {
            die("Could not insert manager");
        }
        $id = $this->connection->lastInsertId();
        return $id;
    }
    public function deleteManager($id) {
        $sqlQuery = "DELETE FROM managers WHERE id = :id";
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );
        $status = $statement->execute($params);
        if (!$status) {
            die("Could not delete manager");
        }
        return ($statement->rowCount() == 1);
    }
    public function updateManager($id, $n, $o, $e) {
        $sqlQuery =
                "UPDATE managers SET " .
                "name = :name, " .
                "office = :office, " .
                "extension = :extension " .
                "WHERE id = :id";
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id,
            "name" => $n,
            "office" => $o,
            "extension" => $e
        );
        $status = $statement->execute($params);
        return ($statement->rowCount() == 1);
    }
}