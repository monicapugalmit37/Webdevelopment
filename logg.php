<html>
    <head>
        <style>
            body{
                background-image:url("fd2.jpg");
                background-size:100% 100%;
                background-attachment:fixed;
                background-repeat:no-repeat;
            }
            h1{
                font-family:Fantasy;
                color:purple;
            }
        </style>
    </head>
    <body><center>
        <form method="POST">
            <br>
            <br>
            Phone Number:<input type="Number" name="ph"><br><br>
            Password:<input type="text" name="pass"><br><br>
            <input type="submit" name="submit">
        </form>
        <?php
        error_reporting(E_ERROR | E_PARSE);
        error_reporting(0);
        $ph=$_POST['ph'];
        $pas=$_POST['pass'];
        
        $link=mysqli_connect("localhost","root","","project");
        if ($link==FALSE){die("Error:could not connect the Database".mysqli_connect_error());}
        else{
        $sql= "SELECT password FROM menus WHERE PhoneNumber= '$ph'";
        $result = mysqli_query($link,$sql);
        $check = mysqli_fetch_array($result);
        $checks=implode(" ",$check);
        $pass=str_replace("'","",$pas);
        $p=$pass." ".$pass;
        echo $checks;
        echo $p;
        if($checks!=$p){echo "<p style='color:red;'>Invalid password or phone Number: Try giving correct credinessitials</p>";}
        else{header("Location:http://localhost/recipes.php");
        exit();}
    
}

