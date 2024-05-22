<!doctype html>
<html>
    <?php 
        $message = "";
        if(htmlspecialchars($_SERVER["REQUEST_METHOD"]) == "POST"){
            $password = htmlspecialchars($_POST["password"]);
            $flag = checkStrength($password);
            if($flag){
                $message = "The Password is Strong";
            }else{
                $message = "The Password is Weak";
            }
        }
        function checkStrength($str){
            $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[_@#\-\$\.]])[a-zA-Z0-9_@#\-\$\.]{8, }$/";
            return preg_match($pattern, $str);
        }
    ?>
    <head>
        <style>
            #message{
                display: block;
            }
        </style>
        <script>
            setTimeout(function(){
                document.getElementById('message').style.display = 'none';
            }, 3000);
        </script>
    </head>
    <body>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            Password : <input type="password" name="password" required /><br/><br/>
            <button>Show Strength</button><br/><br/>
            <span id="message"><?php echo $message; ?></span>
        </form>
    </body>
</html>

