<?php

class Database
{

    private $db_host; // Mysql host
    private $db_name; // Database name
    private $db_user; // Mysql username
    private $db_passwd; // Mysql password
    private $db_charset; // Charset
    private $db; // Database

    public function __construct()
    {

        // Setting development and production environment
        if ($_SERVER['SERVER_NAME'] === 'localhost') {
            // Development
            $this->db_host = "my_host";
            $this->db_name = "my_database_name";
            $this->db_user = "my_username";
            $this->db_passwd = "my_password";
            $this->db_charset = "my_charset";
        } else {
            // Production
            $this->db_host = "my_host";
            $this->db_name = "my_database_name";
            $this->db_user = "my_username";
            $this->db_passwd = "my_password";
            $this->db_charset = "my_charset";
        }

        // Instantiate database
        try {
            $this->db = new PDO('mysql:host=' . $this->db_host . ';dbname=' . $this->db_name . ';charset=' . $this->db_charset . '', $this->db_user, $this->db_passwd);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

    }

    /**
     * Get data from the database
     * @param string Mysql request (e.g : 'SELECT * FROM admin')
     * @return PDOStatement Request result
     */
    public function select($sql)
    {
        return $this->db->query($sql);
    }

    /**
     * Insert data into the database
     * @param string Table name (e.g : 'admin')
     * @param array  Associative array : column name beginning with ":" and the associate value (e.g : [':admin_name' => 'John', ':admin_age' => 42])
     * @return boolean True : Request did execute successfully | False : Request didn't excute successfully
     */
    public function insert($table, $values)
    {

        // Creating SQL Request
        $sql = "INSERT INTO $table (";
        foreach ($values as $column => $value) {
            $sql .= substr($column, 1) . ", ";
        }

        // Remove ", " for the last column
        $sql = substr($sql, 0, -2);

        $sql .= ") VALUES (";
        foreach ($values as $column => $value) {
            $sql .= "$column, ";
        }

        // Remove ", " for the last column and add ");" at the end of the sql request
        $sql = substr($sql, 0, -2);
        $sql .= ");";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute($values);

    }

    /**
     * Update data from the database
     * @param string Table name (e.g : 'admin')
     * @param string ID column name (e.g : "admin_id")
     * @param int Element's ID that you want to modify (e.g : 18)
     * @param array  Associative array of the column name and the associate value beginning with ":" (e.g : [':admin_name' => 'John', ':admin_age' => 42])
     * @return boolean True : Request did execute successfully | False : Request didn't excute successfully
     */
    public function update($table, $idColumnName, $id, $values)
    {

        // Creating SQL Request
        $sql = "UPDATE $table SET ";
        foreach ($values as $column => $value) {
            $sql .= substr($column, 1) . " = $column, ";
        }

        // Remove ", " for the last column
        $sql = substr($sql, 0, -2);

        // add WHERE condition to specify which element to modify
        $sql .= " WHERE $idColumnName = :$idColumnName";

        $stmt = $this->db->prepare($sql);

        // add ID value in the associative array
        $values[":$idColumnName"] = $id;

        return $stmt->execute($values);

    }

    /**
     * Delete data from the database
     * @param string table name (e.g : 'admin')
     * @param string string of the ID column name (e.g : "admin_id")
     * @param int element's ID that you want to modify (e.g : 18)
     * @return boolean True : Request did execute successfully | False : Request didn't excute successfully
     */
    public function delete($table, $idColumnName, $id)
    {

        // Creating SQL Request
        $sql = "DELETE FROM $table WHERE $idColumnName = :$idColumnName";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([":$idColumnName" => $id]);

    }

}
