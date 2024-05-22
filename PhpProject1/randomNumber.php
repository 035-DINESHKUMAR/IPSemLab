<!doctype html>
<html>
    <?php 
        $message = "";
        if(htmlspecialchars($_SERVER["REQUEST_METHOD"] == "POST")){
            $num = htmlspecialchars($_POST["number"]);
            $randNum = randomNum();
            if($randNum == $num){
                $message = "Your guess is Correct";
            }else if($randNum > $num){
                $message = "Your guess is Higher";
            }else{
                $message = "Your guess is Lesser";
            }
        }
        function randomNum(){
            return rand(1, 100);
        }
    ?>
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
    <body>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            Guess Number(1 - 100) : <input type="text" name="number" required /><br/><br/>
            <button>Check</button>
            <span id="message"><?php echo $message; ?></span>
        </form>
    </body>
</html>
