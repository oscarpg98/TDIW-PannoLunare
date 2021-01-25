<div class="search-results">
    <h3>Resultados de la búsqueda: '<?php echo $search; ?>'</h3><br>
    <?php foreach($searchResults as $searchItem){ ?>
        <p><?php echo $searchItem['name_product']; ?></p>
        <p><?php echo $searchItem['description']; ?></p>
        <br><br>
    <?php } ?>
</div>