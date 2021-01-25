<div class="trolley-container">
    <?php if(isset($_SESSION['id_user'])) { ?>
        <a href="/index.php?action=trolley"><img id="trolley-icon" src="/img/trolley.png" alt="Cesta"></a>
    <?php }
    else { ?>
        <a href="/index.php?action=login"><img id="trolley-icon" src="/img/trolley.png" alt="Cesta"></a>
    <?php } ?>
    <div id="items-trolley-container"><span id="items-trolley"><?php
            if(isset($_SESSION['trolley']))
                echo $_SESSION['trolley']['num_items']." productos - ".number_format($_SESSION['trolley']['total_price'], 2, '.', '')." €";
            else echo "0 productos - 0.00 €" ?></span></div>
</div>