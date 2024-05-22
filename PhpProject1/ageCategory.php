<!doctype html>
<html>
    <?php
        $message = "";
        if(htmlspecialchars($_SERVER["REQUEST_METHOD"]) == "POST"){
            $age = htmlspecialchars($_POST["age"]);
            if($age > 0 && $age < 13){
                $message = "Child";
            }else if($age > 13 && $age <= 19){
                $message = "Teenager";
            }else if($age > 19 && $age <= 30){
                $message = "Adult";
            }else{
                $message = "Senior";
            }
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
            Age : <input type="text" name="age" required /><br/><br/>
            <button>Show Category</button><br/><br/>
            <span id="message"><?php echo $message; ?></span>
        </form>
    </body>
</html>