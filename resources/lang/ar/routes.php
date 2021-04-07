<?php

 
$static =  [

	
	'aboutUs'				=> 	getSlugByKeyWithLang('aboutUs', 'ar'),
	'policy'				=> 	getSlugByKeyWithLang('policy', 'ar'),
	'terms'					=> 	getSlugByKeyWithLang('terms', 'ar'),
	'contactus'				=> 	getSlugByKeyWithLang('contactus', 'ar'),
	
];

$slugs = [];
 

$urls = array_merge($static, $slugs);
// dd($urls);
return $urls;
 
?>