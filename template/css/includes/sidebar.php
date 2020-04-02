<?php

if(isset($_GET['page']) && (($_GET['page'] == 'category' && $category_exists) || $_GET['page'] == 'servers')) {
	include 'widgets/servers_filter.php';
	include 'widgets/categories.php';
}


include 'widgets/latest_servers.php';


if(!empty($settings->side_ads)) echo $settings->side_ads;
