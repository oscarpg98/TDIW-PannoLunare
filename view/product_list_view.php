<script>
    $(document).ready(function(){
        $("li .detail-link").click(function(){
            let link = $(this).attr("href");
            $("#detail-product-list").load(link);
            event.preventDefault();
        })
    });
</script>

<?php foreach($products as $product){ ?>
    <ul>
        <li class="product-container">
            <a class="detail-link" href="/index.php?action=product_detail&id_product=<?php echo $product['id_product'] ?>">
                <h2><?php echo $product['name_product']; ?></h2><br>
                <img class="prod-img" src="<?php echo "/img/".$product['image']; ?>" alt="Imagen Producto"><br>
            </a>
        </li>
        <div id="detail-product-list"></div>
    </ul>
<?php } ?>
