<html>
    <body>
    <?php
        $custId=$_POST['custid'];
        echo $custId;

    ?>
    <h1>PAY HERE</h1>
    <form action="methods.php" method="POST">
            <input type="radio" name="payment_method" value="cash">Cash<br>
            <input type="radio" name="payment_method" value="card">Credit/Debit Card<br>
            <input type="radio" name="payment_method" value="netbanking">Net Banking<br>
            <input type="radio" name="payment_method" value="wallets">Payment Wallets<br>
    </form>

    </body>
</html>
