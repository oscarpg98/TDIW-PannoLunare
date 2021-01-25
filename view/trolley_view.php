<?php
if($_SESSION['trolley']['num_items'] === 1) echo "1 producto - ".$_SESSION['trolley']['total_price']." €";
else echo $_SESSION['trolley']['num_items']." productos - ".number_format($_SESSION['trolley']['total_price'], 2, '.', '')." €";