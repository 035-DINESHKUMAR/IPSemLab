<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Leap Year</title>
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
    </head>
    <body>
        <?php
            $message = $year = "";
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $year = $_POST["year"];
                if(($year % 4 == 0) && ($year % 100) != 0 || ($year % 400 == 0)){
                    $message = $year." is a leap year";
                }else{
                    $message = $year." is not a leap year";
                }
            }
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            Year : <input type="text" name="year" required /><br/><br/>
            <button>Check</button><br/><br/>
            <span id="message"><?php echo $message; ?></span>
        </form>
    </body>
</html>


