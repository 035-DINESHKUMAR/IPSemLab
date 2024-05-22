<!doctype html>
<html>
    <?php 
        $message = "";
        $product = $qty = $productid = "";
        $orderid = 0; $pen = 1; $pencil = 2; $scale = 3; $eraser = 4;
        if(htmlspecialchars($_SERVER["REQUEST_METHOD"] == "POST")){
            $product = htmlspecialchars($_POST["products"]);
            if($product == "pen"){
                $productid = $pen;
            }else if($product == "pencil"){
                $productid = $pencil;
            }else if($product == "scale"){
                $productid = $scale;
            }else{ 
                $productid = $eraser;
            }
            $orderid++;
            $locahhost = "localhost";
            $username = "root";
            $pass = "";
            $dbname = "use";
            $qty = htmlspecialchars($_POST["qty"]);
            $con = new mysqli($localhost, $username, $pass, $dbname);
            if($con->connect_errno){
                die("Connection failed : " . $con->connect_errno);
            }
            $sql = "INSERT INTO orders (orderid, productname, qty, productid) VALUES ('$orderid', '$product', '$qty', '$productid')";
            if($con->query($sql) == true){
                $message = "Your Order is placed";
            }else{
                $message = "Error Occured";
            }
            $con->close;
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
            Product : 
            <select name="products" required>
                <option value="">--Select an product--</option>
                <option value="pen">Pen</option>
                <option value="pencil">Pencil</option>
                <option value="scale">Scale</option>
                <option value="eraser">Eraser</option>
            </select><br/><br/>
            Quantity : <input type="text" name="qty" /><br/><br/>
            <button>Order</button><br/><br/>
            <span id="message"><?php echo $message; ?></span>
        </form>
    </body>
</html>

