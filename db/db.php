<?php
    $host = "localhost";
    $db_Name = "test";
    $User = "root";
    $Pass = "";

    try
    {
        $db = new PDO("mysql:host=$host;dbname=$db_Name;charset=utf8", $User, $Pass);
    }
    catch ( PDOException $e ){
        print $e->getMessage();
    }

    function Select($table, $SelectedData = "*", $Where_array = null, $join = null, $order = null, $group = null, $limit = null, $fetch = 0)
    {
        global $db;
        $sql = "SELECT $SelectedData FROM $table $join";
        
        if ($Where_array != null)
        {
            $sql .= " WHERE ";
            foreach ($Where_array as $key => $value)
                $sql .= " $key = :$key AND";
            $sql = substr($sql, 0, -3);
        }

        if ($order != null)
            $sql .= " ORDER BY $order";
        if ($group != null)
            $sql .= " GROUP BY $group";
        if ($limit != null)
            $sql .= " LIMIT $limit";

        
        $query = $db->prepare($sql);
        if ($Where_array != null)
            foreach ($Where_array as $key => $value)
                $query->bindValue(":$key", $value);
        $query->execute();
        if ($fetch == 0)
            return $query->fetchAll(PDO::FETCH_ASSOC);
        else
            return $query->fetch(PDO::FETCH_ASSOC);  
    }

    function Update($table, $data_array, $Where_array = null)
    {
        global $db;
        $sql = "UPDATE $table SET ";
        foreach ($data_array as $key => $value)
            $sql .= "$key = :$key, ";
        $sql = substr($sql, 0, -2);
        if ($Where_array != null)
        {
            $sql .= " WHERE ";
            foreach ($Where_array as $key => $value)
                $sql .= " $key = :$key AND";
            $sql = substr($sql, 0, -3);
        }
        $query = $db->prepare($sql);
        foreach ($data_array as $key => $value)
            $query->bindValue(":$key", $value);
        if ($Where_array != null)
            foreach ($Where_array as $key => $value)
                $query->bindValue(":$key", $value);
        return $query->execute();
    }

    function Insert($table, $data_array)
    {
        global $db;
        $sql = "INSERT INTO $table (";
        foreach ($data_array as $key => $value)
            $sql .= "$key, ";
        $sql = substr($sql, 0, -2);
        $sql .= ") VALUES (";
        foreach ($data_array as $key => $value)
            $sql .= ":$key, ";
        $sql = substr($sql, 0, -2).")";
        $query = $db->prepare($sql);
        foreach ($data_array as $key => $value)
            $query->bindValue(":$key", $value);
        return $query->execute();
    }

    function Delete($table, $Where_array = null)
    {
        global $db;
        $sql = "DELETE FROM $table";
        if ($Where_array != null)
        {
            $sql .= " WHERE ";
            foreach ($Where_array as $key => $value)
                $sql .= " $key = :$key AND";
            $sql = substr($sql, 0, -3);
        }
        $query = $db->prepare($sql);
        if ($Where_array != null)
            foreach ($Where_array as $key => $value)
                $query->bindValue(":$key", $value);
        return $query->execute();
    }

?>