<?php

require_once('database.php');

class BaseModels
{
    public static function arrayToModel($result)
    {
        $class = get_called_class();
        $model = new $class;
        if (is_array($result) && count($result)) {
            foreach ($result as $key => $value) {
                $model->$key = $value;
            }
            return $model;
        } else {
            return null;
        }
    }

    public static function tableName()
    {
        if (isset(static::$table) && static::$table) {
            return static::$table;
        } else {
            return (strtolower(get_called_class()));
        }
    }

    public static function tableCols()
    {
        global $databaseConnect;
        $table = self::tableName();
        $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '" . DB_NAME . "' AND TABLE_NAME = '" . $table . "';";
        $results = $databaseConnect->fetch($sql);
        $output = [];
        foreach ($results as $key => $result) {
            $output[] = $result['COLUMN_NAME'];
        }
        return $output;
    }

    public static function createModel($results, $class = null)
    {
        $models = [];
        foreach ($results as $key => $result) {
            if ($class) {
                $models[] = $class::arrayToModel($result);
            } else {
                $models[] = self::arrayToModel($result);
            }
        }
        return $models;
    }

    public static function all($filters = [])
    {
        global $databaseConnect;
        $table = self::tableName();
        $sql = "SELECT * FROM `" . $table . "`";
        if (is_array($filters) && count($filters)) {
            foreach ($filters as $key => $filter) {
                $sql .= " WHERE " . $key . " = '" . $filter . "'";
            }
        }
        $sql .= " ORDER BY `id` DESC;";
        $results = $databaseConnect->fetch($sql);
        return self::createModel($results);
    }

    public static function store($data)
    {
        global $databaseConnect;
        $table = self::tableName();
        $attributes = self::tableCols();
        $sql = "INSERT INTO `" . $table . "` (";
        foreach ($attributes as $key => $attr) {
            $sql .= $attr;
            if ($key != count($attributes) - 1) {
                $sql .= ", ";
            }
        }
        $sql .= ") VALUES (";
        foreach ($attributes as $key => $attr) {
            $sql .= "'" . $databaseConnect->escape($data[$attr]) . "'";
            if ($key != count($attributes) - 1) {
                $sql .= ", ";
            }
        }
        $sql .= " );";
        $result = $databaseConnect->execute($sql);
        $id = $databaseConnect->insertId();
        return self::find($id);
    }

    public static function find($id)
    {
        global $databaseConnect;
        $table = self::tableName();
        $sql = "SELECT * FROM `" . $table . "` WHERE id = $id";
        $result = $databaseConnect->get($sql);
        $model = self::arrayToModel($result);
        return $model;
    }

    public static function where($array, $ignore = 0)
    {
        global $databaseConnect;
        $table = self::tableName();
        $sql = "SELECT * FROM `" . $table . "` WHERE ";
        foreach ($array as $key => $value) {
            $sql .= "$key = '$value' AND ";
        }
        $sql .= "1 AND id != $ignore ;";
        $result = $databaseConnect->get($sql);
        $model = self::arrayToModel($result);
        return $model;
    }

    public function update($data)
    {
        global $databaseConnect;
        $table = self::tableName();
        $attributes = self::tableCols();
        $sql = "UPDATE `" . $table . "` SET ";
        foreach ($attributes as $key => $attr) {
            if ($attr != "id" && $data[$attr] !== null) {
                $sql .= $attr . " = '" . $databaseConnect->escape($data[$attr]) . "', ";
            }
        }
        $sql = rtrim($sql, ", ");
        $sql .= " WHERE id = " . $this->id . ";";
        $update = $databaseConnect->execute($sql);
        return $update;
    }

    public function destroy()
    {
        global $databaseConnect;
        $table = self::tableName();
        $sql = "DELETE FROM `" . $table . "` Where id = $this->id";
        $destroy = $databaseConnect->execute($sql);
        return $destroy;
    }
}
