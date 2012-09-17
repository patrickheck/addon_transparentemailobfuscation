<?php   
defined('C5_EXECUTE') or die(_("Access Denied."));

class TransparentEmailObfuscationPackage extends Package {

	protected $pkgHandle = 'transparent_email_obfuscation';
	protected $appVersionRequired = '5.4.0';
	protected $pkgVersion = '1.0.2';
	
	public function getPackageDescription() {
		return t("Transparently obfuscates all email addresses in content blocks to protect them from spam harvesters");
	}
	
	public function getPackageName() {
		return t("Transparent Email Obfuscation");
	}
	
	public function install() {
		$pkg = parent::install();
	}
	
	
	static public function mb_strrev($str) {
		preg_match_all('/./us', $str, $ar);
		return join('',array_reverse($ar[0]));
	}

}