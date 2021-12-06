<?php

namespace Models;

use PDO;

class Model
{
    protected $conn, $primary_key = "id", $table, $where, $skip, $join;
    public $querybuilder;

    public function __construct()
    {
        $dburl = "mysql:host=localhost;dbname=sampleproject;charset=utf8";
        $username = 'root';
        $password = '';
        $this->conn = new PDO($dburl, $username, $password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function all()
    {
        $ob = new static;
        $query = "SELECT * FROM $ob->table";
        $stmt = $ob->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function find($id)
    {
        $ob = new static;
        $query = "SELECT * FROM $ob->table WHERE $ob->primary_key = '$id'";
        $stmt = $ob->conn->prepare($query);
        $stmt->execute();
        $obj = $stmt->fetch(PDO::FETCH_OBJ);
        if ($obj) {
            foreach ($obj as $key => $value) {
                $ob->$key = $value;
            }
            return $ob;
        } else {
            return null;
        }
    }

    public static function destroy($id)
    {
        $ob = new static;
        if (is_array($id)) {
            $ids = implode(",", $id);
            $sql = "DELETE FROM $ob->table WHERE $ob->primary_key IN ($ids)";
        } else {
            $sql = "DELETE FROM $ob->table WHERE $ob->primary_key = '$id'";
        }
        $stmt = $ob->conn->prepare($sql);
        $stmt->execute();
    }


    public function __call($name, $arguments)
    {
        $columns = $arguments[0];
        $operator = $arguments[1];
        $value = $arguments[2];
        if ($this->where || $this->join) {
            $this->querybuilder .= " WHERE $columns $operator $value";
            $this->where = false;
        } else {
            $this->querybuilder .= " AND $columns $operator $value";
        }
        return $this;
    }

    public static function __callStatic($name, $arguments)
    {
        $ob = new static;
        $columns = $arguments[0];
        $operator = $arguments[1];
        $value = $arguments[2];
        $ob->querybuilder .= "SELECT * FROM $ob->table WHERE $columns $operator $value";
        $ob->where = false;
        return $ob;
    }


    public static function select()
    {
        $ob = new static;
        $columns_arr = func_get_args();
        if (count($columns_arr) > 0) {
            $columns = implode(", ", $columns_arr);
        }
        $ob->querybuilder = "SELECT $columns FROM $ob->table";
        return $ob;
    }

    public function orderBy($column, $order = "DESC")
    {
        if (is_array($column)) {
            $columns = implode(", ", $column);
            $this->querybuilder .= " ORDER BY $columns $order";
        } else {
            $this->querybuilder .= " ORDER BY $column $order";
        }
        return $this;
    }

    public function take($number)
    {
        if (!$this->skip) {
            $this->querybuilder .= " LIMIT 0, $number";
        } else {
            $this->querybuilder .= " LIMIT $this->skip, $number";
        }
        return $this;
    }

    public function skip($number)
    {
        $this->skip = $number;
        return $this;
    }

    public function join($table, $column1, $operator, $column2)
    {
        $this->querybuilder .= " JOIN $table ON $column1 $operator $column2";
        $this->join = true;
        return $this;
    }

    public function groupBy($column)
    {
        $columns_arr = func_get_args();
        $columns = implode(", ", $columns_arr);
        $this->querybuilder .= " GROUP BY $columns";
        return $this;
    }

    public function get()
    {
        //echo $this->querybuilder;
        $stmt = $this->conn->prepare($this->querybuilder);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
