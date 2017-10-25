<?php
/**
 * Author: Etienne "Eethe" Orlhac
 * Date: 25-Oct-17
 */

namespace Smith\ORM;


class Connection {

    private $pdo;

    public function __construct(string $dbms, string $dbname, string $host, string $user, string $password) {
        $this->pdo = new \PDO($dbms.":dbname=".$dbname.";host=".$host, $user, $password);
    }
}
