<?php

require_once('config.php');

class Database
{
    private $connection;

    public function __construct()
    {
        $this->openConnection();
    }

    public function __destruct()
    {
        $this->closeConnection();
    }

    public function openConnection()
    {
        $this->connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
        if (!$this->connection) {
            die("Database connection failed ! " . mysqli_connect_error());
        }
        $database_select = mysqli_select_db($this->connection, DB_NAME);
        if (!$database_select) {
            die("Database selection failed ! " . mysqli_connect_error());
        }
    }

    public function execute($sql_query)
    {
        $result = mysqli_query($this->connection, $sql_query);
        if (!$result) {
            die("Database query failed !" . mysqli_connect_error());
        }
        return $result;
    }

    public function fetch($sql_query)
    {
        $result = $this->execute($sql_query);
        $records = [];
        if ($result->num_rows > 0) {
            while ($rows = $result->fetch_assoc()) {
                $records[] = $rows;
            }
        }
        return $records;
    }

    public function get($sql_query)
    {
        $result = $this->execute($sql_query);
        return $result->fetch_assoc();
    }

    public function closeConnection()
    {
        if (isset($this->connection)) {
            mysqli_close($this->connection);
            unset($this->connection);
        }
    }

    public function insertId()
    {
        return mysqli_insert_id($this->connection);
    }

    public function escape($text)
    {
        return mysqli_real_escape_string($this->connection, $text);
    }
}
$databaseConnect = new Database;
