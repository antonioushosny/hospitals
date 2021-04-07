<?php 

$static =  [

	//'home'				=>	getSlugByKeyWithLang('home', 'en'),
	'aboutUs'				=> 	getSlugByKeyWithLang('aboutUs', 'en'),
	'policy'				=> 	getSlugByKeyWithLang('policy', 'en'),
	'terms'					=> 	getSlugByKeyWithLang('terms', 'en'),
	'contactus'				=> 	getSlugByKeyWithLang('contactus', 'en'),
 
];
 
$slugs = [];
 
$urls = array_merge($static, $slugs);
// dd($urls);
return $urls;

?>