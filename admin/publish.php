<?php

//stop page load timing out on big moves
set_time_limit(0);

$doc_root = dirname(dirname(__FILE__));

include "$doc_root/app/core/loader.php";

if(!isset($_GET["slug"])) {
	echo 'Must supply a draft slug in GET.';
	exit;
}

$slug = $Lando->publish_draft($_GET["slug"]);

if(!$slug) {
	echo 'Could not move folder from Drafts to Posts. Either it does not exist in Drafts or there was a naming conflict with Posts.';
	exit;
}

header("Location: $site_root/posts/$slug");