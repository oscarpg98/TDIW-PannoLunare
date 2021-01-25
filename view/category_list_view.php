<script>
    $(document).ready(function(){
        $("li .prod-link").click(function(){
            let link = $(this).attr("href");
            $("#product-list").load(link);
            event.preventDefault();
        })
    });
</script>

<ul class="menu">
    <?php foreach($categories as $category) { ?>
        <li>
            <a class="prod-link" href="/index.php?action=product_list&id_category=<?php echo $category['id_category'];?>">
            <?php $cat = $category['name_category'];
            echo htmlentities($cat, ENT_QUOTES | ENT_HTML5, 'UTF-8');?>
            </a>
        </li>
    <?php } ?>
</ul>
<div id="product-list"></div>