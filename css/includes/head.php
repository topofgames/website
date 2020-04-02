<head>
	<title><?php echo $page_title; ?></title>
	<base href="<?php echo $settings->url; ?>">
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php
	if(!empty($settings->meta_description) && (!isset($_GET['page']) || (isset($_GET['page']) && $_GET['page'] != 'category')))
		echo '<meta name="description" content="' . $settings->meta_description . '" />';
	elseif(isset($_GET['page']) && $_GET['page'] == 'category' && !empty($category->description))
		echo '<meta name="description" content="' . $category->description . '" />';
	?>

	<link href="template/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="template/css/custom.css" rel="stylesheet" media="screen">
	<link href="template/css/font-awesome.min.css" rel="stylesheet" media="screen">

	<script src="template/js/jquery.js"></script>
	<script src="template/js/bootstrap.min.js"></script>
	<script src="template/js/timeago.js"></script>
	<script src="template/js/functions.js"></script>

	<link href="template/images/favicon.ico" rel="shortcut icon" />

	<?php if(!empty($settings->analytics_code)): ?>
	<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', '<?php echo $settings->analytics_code; ?>', 'auto');
	ga('send', 'pageview');

	</script>
	<?php endif; ?>

	<?php if(!empty($settings->sharethis_pub_id)): ?>
	<script>var switchTo5x=true;</script>
	<script id="st_insights_js" src="http<?php if($settings->is_secure) echo 's'; ?>://w<?php if($settings->is_secure) echo 's'; ?>.sharethis.com/button/buttons.js?publisher=<?php echo $settings->sharethis_pub_id; ?>"></script>
	<script>stLight.options({publisher: "<?php echo $settings->sharethis_pub_id; ?>", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
	<?php endif; ?>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
