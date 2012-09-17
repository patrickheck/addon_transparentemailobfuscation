<?php 
	defined('C5_EXECUTE') or die("Access Denied.");
	$content = $controller->getContent();
	
	// Obfuscate email addresses in href links
	$content = preg_replace_callback('/(<a[^>]*href=")(mailto:)([^"]+)/',
		create_function('$matches','return $matches[1] . "#NOSPAM:" . TransparentEmailObfuscationPackage::mb_strrev(str_replace("&amp;","&",$matches[3]));'),
									$content);
	// Obfuscate email adresses in text
	// regex inspired by https://pureform.wordpress.com/2008/01/04/matching-a-word-characters-outside-of-html-tags/
	$content = preg_replace_callback('/\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]+\b(?!([^<]+)?>)/i', create_function('$matches','return "<span style=\"unicode-bidi:bidi-override; direction: rtl;\" class=\"transparent-email-obfuscation-unreverse\">" . strrev($matches[0]) . "</span>";'),$content);
	print $content;
?>