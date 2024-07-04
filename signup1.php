<html>
    <head><style>
body{background-color: #e6ccff
;}
h1{ background-color: #ccb3ff;}
h3{color:#6600cc}
div{ width:300px;
  border: 15px groove  #8c1aff;
  margin:100px;
  padding:50px;}
  </style>
  </head>
  <body>
    <h1><center>SIGN UP PAGE</center></h1><br><br><br>
    <center><div>
        <form method="Post">
            Name:<input type="text" name="name"><br><br>
            Registor Number:<input type="number" name="regino"><br><br>
            Phone Number:<input type="text" name="phno"><br><br>
            password:<input type="text" name="password"><br><br>
            Date of Birth:<input type="Date" name="dob"><br><br>
            <input type="submit" value="Signup">
    </div>
    <?php
    error_reporting(E_ERROR | E_PARSE);
    error_reporting(0);
    $n="'".$_POST['name']."'";
    $rgn=$_POST['regino'];
    $ph=$_POST['phno'];
    $p="'".$_POST['password']."'";
    $db="'".$_POST['dob']."'";
    do{
    if (!(is_numeric($ph))){ 
        echo"Phone Number should be an integer";
        break;}
    elseif(strlen($ph)!=10){
        echo"Phone number shoould be 10 digit";
        break;}
    elseif(strlen($p)<6 or strlen($p)>12){
        echo "Password should be 6 to 12 digit";
        break;}
    elseif(!ctype_alpha($p) || ctype_alpha($p)){
        $arr = str_split($p);
                        $l = 0;
                        $u = 0;
                        $d = 0;
                        $s = 0;
                        foreach($arr as $i)
                        {
                        if (ctype_lower($i)){
                        
                        $l=$l+1;
                        }
                        else if (ctype_upper($i)){
                        $u = $u+1;
                        }
                        else if (is_numeric($i)){
                        $d = $d +1;
                        }
                        else {
                        $s = $s+1;
                        }
                        }

                        if (($l==0) || ($u==0) || ($d==0) || ($s==0))
                        {
                        $f=0;
                        echo "<p>Password must have atleast 1 upper ,lowercase ,number and special symbol.Enter a valid password.</p>";
                        break;
                        }
    }
    
    $link=mysqli_connect("localhost","root","","students");
    if ($link==FALSE){die("Error:could not connect the Database".myswli_connect_error());}
    else{
        $query="Insert into logindetails values($n,'$rgn','$ph',$p,$db)";
        if (mysqli_query($link,$query)){echo"<h3>ACCOUNT CREATED</h3>";
            }
        else{echo"<h3>Couldnot Create account try again!</h3>".mysqli_error($link);
           }
    }
}while(false);
    ?>
    </body>
    </html>
