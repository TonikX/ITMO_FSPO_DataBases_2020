<?php
    if(isset($_POST['class']) && isset($_POST['name'])) 
    {
        $dbuser = 'postgres';
        $dbpass = '1234';
        $host = 'localhost';
        $dbname='12.03';
        $db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");

        $student_name = $_POST['name'];
        $student_class=$_POST['class'];

        $query = "INSERT INTO \"Student\" VALUES ('$student_name','$student_class')";


        if(pg_query($query) ){
            echo "Data have been recorded";
            unset($student_name,$student_class);
        }
        else{
            echo "Error";
        }
        pg_close($db);
    }
    else
    {   
        echo "Entered data incorrect.Re-enter data";
        unset($student_name,$student_class);
    }
?>