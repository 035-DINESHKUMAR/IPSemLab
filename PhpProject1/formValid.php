<!doctype html>
<html>
    <?php 
        $message = "";
        $name = $email = $comments = "";
        $nameerr = $emailerr = $commenterr = "";

        if (htmlspecialchars($_SERVER["REQUEST_METHOD"]) == "POST") {
            $dupName = htmlspecialchars($_POST["name"]);
            $dupEmail = htmlspecialchars($_POST["email"]);

            if (!empty($dupName)) {
                $pattern = "/^\d/";
                if (!preg_match($pattern, $dupName)) {
                    $name = $dupName;
                } else {
                    $nameerr = "Name should not contain any digits";
                }
            } else {
                $nameerr = "Name is required";
            }

            if (!empty($dupEmail)) {
                $pattern = "/^[a-z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
                if (preg_match($pattern, $dupEmail)) {
                    $email = $dupEmail;
                } else {
                    $emailerr = "Email is not correct";
                }
            } else {
                $emailerr = "Email is required";
            }

            if (!empty($_POST["comments"])) {
                $comments = htmlspecialchars($_POST["comments"]);
            } else {
                $commenterr = "Message is required";
            }

            if (empty($nameerr) && empty($emailerr) && empty($commenterr)) {
                $host = 'localhost';
                $userName = 'root';
                $pass = '';
                $dbName = 'use';
                $con = new mysqli($host, $userName, $pass, $dbName);

                if ($con->connect_errno) {
                    die('Connection Error: ' . $con->connect_errno);
                }

                $sql = "INSERT INTO details (name, email, message) VALUES (?, ?, ?)";
                $st = $con->prepare($sql);
                $st->bind_param("sss", $name, $email, $comments);

                if ($st->execute()) {
                    $message = "Comments are inserted";
                } else {
                    $message = "Execution Error: " . $con->error;
                }

                $st->close();
                $con->close();
            }
        }
    ?>
    <head>
        <style>
            #nameerr, #emailerr, #commenterr {
                color: red;
            }
            #message{
                color: green;
            }
        </style>
    </head>
    <body>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            Name: <input type="text" name="name" value="<?php echo $name; ?>" /><br/><br/>
            <span id="nameerr"><?php echo $nameerr; ?></span><br/>
            Email: <input type="email" name="email" value="<?php echo $email; ?>" /><br/><br/>
            <span id="emailerr"><?php echo $emailerr; ?></span><br/>
            Message: <textarea rows="5" cols="30" name="comments"><?php echo $comments; ?></textarea><br/><br/>
            <span id="commenterr"><?php echo $commenterr; ?></span><br/>
            <button type="submit">Store</button><br/><br/>
            <span id="message"><?php echo $message; ?></span>
        </form>
    </body>
</html>
