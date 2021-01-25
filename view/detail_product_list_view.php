<ul class="detail-container">
    <li>
        <p><?php echo $detail['description']; ?></p>
        <p>Precio: <?php echo $detail['price_product']; ?> €</p>
        <button id="add-trolley" name="add-trolley">Añadir a la cesta</button>
    </li>
</ul>
<script>
    $(document).ready(function(){
        $('#add-trolley').click(function(){
            $('#items-trolley').load("index.php?action=add_trolley&id_product=<?php echo $detail['id_product'];?>");
        })
    });
</script>
