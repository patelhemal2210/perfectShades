<?php

//$da = new DataAccess();
//$da->updateTable("glasses",array("data"=>"data1", "data2"=> "data3"),"");

include_once "database.php";

class DataAccess
{
    public function getAll($table_name)
    {
        $query = "SELECT * FROM " . $table_name;
        $statement = Database::getDB()->prepare($query);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_OBJ);
        $list = $statement->fetchAll();
        $statement->closeCursor();
        return $list;
    }

    public function getSelected($table_name, $constraint)
    {
        $query = "SELECT * FROM " . $table_name;
        $constraint_list = array();
        if(empty($table_name) || empty($constraint))
        {
            return false;
        }
        $c = 1;
        $constraint_str = " WHERE ";
        foreach ($constraint as $x) {
            if($c % 2 != 0)
            {
                $constraint_str .= "(" . $x[0] . " " .  $x[1] . " :" . $x[0] . "_c" . ")";
                $constraint_list[$x[0]] = $x[2];
            }
            else
            {
                $constraint_str .= " ". $x . " ";
            }
            $c++;
        }

        $query = $query . $constraint_str;
        $statement = Database::getDB()->prepare($query);

        foreach($constraint_list as $x => $x_value)
        {
            $statement->bindValue(':' . $x . '_c', $x_value);
        }

        //$statement->debugDumpParams();

        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_OBJ);
        $list = $statement->fetchAll();
        $statement->closeCursor();
        return $list;
    }

    public function update($table_name, $column_values, $constraint)
    {
        $table_str = "UPDATE " . $table_name . " ";
        $column_str = "SET ";
        $constraint_str = "";
        $constraint_list = array();
        $c = 1;
        if(empty($table_name) || empty($column_values) || empty($constraint))
        {
            return false;
        }

        foreach($column_values as $x => $x_value)
        {
            $column_str .= $x . " = :" . $x;
            $c++;
            if(count($column_values) < $c)
                $column_str .= " ";
            else
                $column_str .= " , ";
        }

        if(!empty($constraint))
        {
            $c = 1;
            $constraint_str = "WHERE ";
            foreach ($constraint as $x) {
                if($c % 2 != 0)
                {

                    $constraint_str .= "(" . $x[0] . " " .  $x[1] . " :" . $x[0] . "_c" . ")";
                    $constraint_list[$x[0]] = $x[2];
                }
                else
                {
                    $constraint_str .= " ". $x . " ";
                }
                $c++;
            }
        }

        $query = $table_str . $column_str . $constraint_str;
        $statement = Database::getDB()->prepare($query);

        foreach($column_values as $x => $x_value)
        {
            $statement->bindValue(':' . $x, $x_value);
        }

        foreach($constraint_list as $x => $x_value)
        {
            $statement->bindValue(':' . $x . '_c', $x_value);
        }

        //$statement->debugDumpParams();

        $statement->execute();
        $statement->closeCursor();
        return true;
    }

    public function insert($table_name, $column_values)
    {
        //INSERT INTO products  (categoryID, productCode, productName, listPrice)  VALUES  (:category_id, :code, :name, :price)

        if(empty($table_name) || empty($column_values))
        {
            return false;
        }

        $table_str = "INSERT INTO " . $table_name . " ";
        $column_list = " (";
        $c = 1;
        foreach($column_values as $x => $x_value) {
            $column_list .= $x;
            $c++;
            if(count($column_values) < $c)
                $column_list .= " ";
            else
                $column_list .= " , ";
        }

        $column_list .= ") ";

        $value_list = " VALUES (";
        $c = 1;
        foreach($column_values as $x => $x_value) {
            $value_list .= ":" . $x;
            $c++;
            if(count($column_values) < $c)
                $value_list .= " ";
            else
                $value_list .= " , ";
        }
        $value_list .= ") ";

        $query = $table_str . $column_list . $value_list;
        $statement = Database::getDB()->prepare($query);

        foreach($column_values as $x => $x_value) {
            $statement->bindValue(':' . $x, $x_value);
        }

        $statement->execute();
        $statement->closeCursor();

        return true;
    }

    public function delete($table_name, $constraint)
    {
        //DELETE FROM table_name WHERE cons1=clnstvalue1;
        if(empty($table_name) || empty($constraint))
        {
            return false;
        }
        $table_str = "DELETE FROM " . $table_name . " ";
        $c = 1;
        $constraint_str = "WHERE ";
        $constraint_list = array();
        foreach ($constraint as $x) {
            if($c % 2 != 0)
            {
                $constraint_str .= "(" . $x[0] . " " .  $x[1] . " :" . $x[0] . "_c" . ")";
                $constraint_list[$x[0]] = $x[2];
            }
            else
            {
                $constraint_str .= " ". $x . " ";
            }
            $c++;
        }

        $query = $table_str . $constraint_str;

        $statement = Database::getDB()->prepare($query);

        foreach($constraint_list as $x => $x_value) {
            $statement->bindValue(':' . $x . '_c', $x_value);
        }

        $statement->execute();
        $statement->closeCursor();
        return true;
    }

    public function executeQuery($query)
    {
        $statement = Database::getDB()->prepare($query);
        $statement->execute();
        $statement->closeCursor();
        return true;
    }

    public function executeSelectQuery($query)
    {
        $statement = Database::getDB()->prepare($query);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_OBJ);
        $list = $statement->fetchAll();
        $statement->closeCursor();
        return $list;
    }

}