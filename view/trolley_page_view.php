<div class="trolley-page-container">
    <h2>Cesta de <?php echo $_SESSION['username']; ?></h2>
    <?php foreach($_SESSION['trolley']['items'] as $product){ ?>
        <div class="trolley-products"><br>
            <p><?php echo $product['name_product']; ?></p>
            <p><?php echo $product['price_product']." €"; ?></p>
            <div class="quantity-container">
                <div class="text-quantity"><?php
                    if($_SESSION['trolley'][$product['id_product']]['quantity'] === 1) {
                        echo "x".$_SESSION['trolley'][$product['id_product']]['quantity']." unidad";
                    } else {
                        echo "x".$_SESSION['trolley'][$product['id_product']]['quantity']." unidades";
                    } ?></div>
                <a href="/index.php?action=modify_trolley&id_product=<?php echo $product['id_product']; ?>&arrow=up"><div class="arrow"></div></a>
                <a href="/index.php?action=modify_trolley&id_product=<?php echo $product['id_product']; ?>&arrow=down"><div class="arrow down"></div></a>
                <a href="/index.php?action=delete_item_trolley&id_product=<?php echo $product['id_product']; ?>"><img src="/img/cancel.png" alt="Eliminar producto" class="del-prod"></a>
            </div>
        </div>
    <?php } ?>
    <div class="total-price"><br>
        <strong><?php echo "Precio Total: ".number_format($_SESSION['trolley']['total_price'], 2, '.', '')." €"; ?></strong><br>
        <form action="/index.php?action=confirmation" method="post">
            <button name="confirm-trolley" class="confirm-trolley">Finalizar compra</button>
        </form>
        <form action="/index.php?action=empty-trolley" method="post">
            <button name="empty-trolley" id="empty-trolley" class="confirm-trolley">Vaciar Cesta</button>
        </form>
    </div>
</div>