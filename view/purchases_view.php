<div class="purchases-container">
    <?php
    if($noPurchases === false){
        if($titlePrinted === false){
            echo "<h2>Compras de ".$_SESSION['username']."</h2><br>";
            $titlePrinted = true;
        }
        echo "<strong>".$trolley['creation_date']."</strong><br>";
        foreach($orderlines as $orderline){ ?>
            <div class="purchases-list">
                <?php
                echo $orderline['product_name_ol']."<br>";
                echo $orderline['unitary_price_ol']." € ";
                if($orderline['quantity_ol'] == 1) echo "x".$orderline['quantity_ol']." unidad"."<br>";
                else echo "x".$orderline['quantity_ol']." unidades"."<br>";
                echo "Subtotal - ".$orderline['total_price_ol']." €<br><br>";
                ?>
            </div>
        <?php } ?>
        <strong>Precio Total: <?php echo $trolley['total_price']." €"; ?></strong>
        <br><hr class="horizontal_bar"><br>
    <?php }
    else {
        echo "<h2>Compras de ".$_SESSION['username']."</h2><br>";
        echo "<p>No se ha realizado ninguna compra.</p>";
    } ?>

</div>