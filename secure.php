<?php
    function security($text)
    {
        if(isset($_POST[$text]))
        {
            $clean = trim($_POST[$text]);
            $clean = strip_tags($clean);
            $clean = htmlspecialchars($clean, ENT_QUOTES, 'UTF-8');
            $clean = str_replace("insert","",$clean);
            $clean = str_replace("INSERT","",$clean);
            $clean = str_replace("select","",$clean);
            $clean = str_replace("SELECT","",$clean);
            $clean = str_replace("exec","",$clean);
            $clean = str_replace("EXEC ","",$clean);
            $clean = str_replace("union","",$clean);
            $clean = str_replace("UNION","",$clean);
            $clean = str_replace("drop","",$clean);
            $clean = str_replace("DROP","",$clean);
            return $clean;
        }
    }
?>