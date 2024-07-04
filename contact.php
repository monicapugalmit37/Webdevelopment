<html>
    <head>
        <style>
            body{
                background-image:url("bg.webp");
                background-attachment:fixed;
                background-size:100% 100%;
                background-repeat:no-repeat;
            }
            div{
                border: 15px inset  purple;
                width:300px;
                margin:20px;
                padding:50px;
            }
            h1{
                color: #990073;
            }
            p{
                color:black;
            }
            input{
                background-color:pink;
            }
            button{
                background-color:purple;
                color:white;
            }
        </style>
        <body>
            <h1><center>CONTACT US</center></h1><br><br><br>
            <form>
            <center><div>
            <p>Your Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="name" required><br><br><br>
            Your Mail:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="email" id="em" required><br><br><br>
            Your Message:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="textarea" id="mes" required><br><br></p>
            <button type="button" onclick="ok()" >Send</button>
            <p id="ex"></p>
            </center></div>
            </form>
            <script>
                function ok(){
                    document.getElementById("ex").innerHTML="Message sent!!<br>Action will be taken asap!!";
                }
            </script>
        </body>
        </html>