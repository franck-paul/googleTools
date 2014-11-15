<?php
# -- BEGIN LICENSE BLOCK ----------------------------------
# This file is part of googleTools, a plugin for Dotclear 2.
#
# Copyright (c) xave and contributors
#
# Licensed under the GPL version 2.0 license.
# A copy of this license is available in LICENSE file or at
# http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
# -- END LICENSE BLOCK ------------------------------------

if (!defined('DC_CONTEXT_ADMIN')) { return; }

// dead but useful code, in order to have translations
__('Google Tools').__('Handles Google tools (Analytics & Webmaster Tools)');

$core->addBehavior('adminBlogPreferencesForm',array('googlestuffAdminBehaviours','adminBlogPreferencesForm'));
$core->addBehavior('adminBeforeBlogSettingsUpdate',array('googlestuffAdminBehaviours','adminBeforeBlogSettingsUpdate'));

class googlestuffAdminBehaviours
{
	public static function adminBlogPreferencesForm($core,$settings)
	{
		$settings->addNameSpace('googlestuff');
		echo
		'<div class="fieldset"><h4>Google Stuff</h4>'.
		'<div class="two-boxes odd">'.
		'<p><label>'.
		__('Google Analytics UACCT (ID):')." ".
		form::field('googlestuff_uacct',25,50,$settings->googlestuff->googlestuff_uacct,3).
		'</label></p>'.
		'</div><div class="two-boxes even">'.
		'<p><label>'.
		__('Google Webmaster Tools verification:')." ".
		form::field('googlestuff_verify',50,100,$settings->googlestuff->googlestuff_verify,3).
		'</label></p>'.
		'</div>'.
		'<p>'.form::checkbox('cnil_cookies', 1, $core->blog->settings->googlestuff->cnil_cookies).
		'<label class="classic" for="cnil_cookies">'.__('Includes CNIL consent for Google Analytics tracking cookies').'</label>'.'</p>'.
		'</div>';
	}
	public static function adminBeforeBlogSettingsUpdate($settings)
	{
		$settings->addNameSpace('googlestuff');
		$settings->googlestuff->put('googlestuff_uacct',empty($_POST['googlestuff_uacct'])?"":$_POST['googlestuff_uacct'],'string');
		$settings->googlestuff->put('googlestuff_verify',empty($_POST['googlestuff_verify'])?"":$_POST['googlestuff_verify'],'string');
		$settings->googlestuff->put('cnil_cookies',empty($_POST['cnil_cookies'])?"":$_POST['cnil_cookies'],'boolean');
	}
}
