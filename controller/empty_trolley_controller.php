<?php
unset($_SESSION['trolley']['items']);
unset($_SESSION['trolley']['total_price']);
unset($_SESSION['trolley']['num_items']);
$_SESSION['trolley']['items'] = array();
$_SESSION['trolley']['total_price'] = 0.00;
$_SESSION['trolley']['num_items'] = 0;
header("Location: /index.php?action=trolley");