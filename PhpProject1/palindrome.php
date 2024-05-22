<!doctype html>
<html>
    <head>
        <style>
            #message{
                display: block;
            }
        </style>
        <script>
            setTimeout(function() {
                document.getElementById('message').style.display = 'none';
            }, 2000);
        </script>
    </head>
    <?php 
        $message = $string = "";
        if(htmlspecialchars($_SERVER["REQUEST_METHOD"]) == "POST"){
            $string = htmlspecialchars($_POST["string"]);
            $len = strlen($string);
            $j = 0;
            $flag = true;
            for($i = $len - 1; $i >= 0;$i--){
                if($string[$i] != $strnig[$j++]){
                    $flag = false;
                    break;
                }
            }
            if($flag){
                $message = $string." is a palindrome";
            }else{
                $message = $string." is not a palindrome";
            }
        }
    ?>
    <body>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            String : <input type="text" name="string" required /><br/><br/>
            <button>Check</button>
            <span id="message"><?php $message; ?></span>
        </form>
    </body>
</html>
