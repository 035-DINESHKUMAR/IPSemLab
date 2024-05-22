<!doctype html>
<html>
    <?php 
        $message = "";
        $name = $email = "";
        if(htmlspecialchars($_SERVER["REQUEST_METHOD"]) == "POST"){
            $name = htmlspecialchars($_POST["name"]);
            $email = htmlspecialchars($_POST["email"]);
            $host = 'localhost';
            $userName = 'root';
            $dbName = 'use';
            $con = new mysqli($host, $userName, '', $dbName);
            if($con->connect_errno){
                die("Connection Error : " . $con->connect_errno);
            }
            $sql = "SELECT message FROM details WHERE name = ? AND email = ?";
            $ptst = $con->prepare($sql);
            $ptst->bind_param("ss", $name, $email);
            if($ptst->execute()){
                $result = $ptst->get_result();
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $message = $row["message"];
                    }
                }else{
                    $message = "No Data Found for " . $name;
                }
            }else{
                $message = "Error occured during search " . $con->error;
            }
            $ptst->close();
            $con->close();
        }
    ?>
    <style>
        #message{
            display: block;
        }
    </style>
    <script>
        setTimeout(function() {
            document.getElementById('message').style.display = 'none';
        }, 3000);
    </script>
    <head>
        
    </head>
    <body>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            Name : <input type="text" name="name" required /><br/><br/>
            Email : <input type="email" name="email" required /><br/><br/>
            <button>Check</button><br/><br/>
            <span id="message"><?php echo $message; ?></span>
        </form>
    </body>
</html>

