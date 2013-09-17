<?php
/***************************************************************\
 *  This is 'Google Stuff', a plugin for Dotclear 2            *
 *                                                             *
 *  Copyright (c) 2013                                         *
 *  xave and contributors.                                     *
 *                                                             *
 *  This is an open source software, distributed under the GNU *
 *  General Public License (version 2) terms and  conditions.  *
 *                                                             *
 *  You should have received a copy of the GNU General Public  *
 *  License along with 'My Favicon' (see COPYING.txt);         *
 *  if not, write to the Free Software Foundation, Inc.,       *
 *  59 Temple Place, Suite 330, Boston, MA  02111-1307  USA    *
\***************************************************************/

$core->addBehavior('adminBlogPreferencesForm',array('googlestuffAdminBehaviours','adminBlogPreferencesForm'));
$core->addBehavior('adminBeforeBlogSettingsUpdate',array('googlestuffAdminBehaviours','adminBeforeBlogSettingsUpdate'));

class googlestuffAdminBehaviours
{
	public static function adminBlogPreferencesForm($core,$settings)
	{
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
		'</div>';
	}
	public static function adminBeforeBlogSettingsUpdate($settings)
	{
		$settings->addNameSpace('googlestuff');
		$settings->googlestuff->put('googlestuff_uacct',empty($_POST['googlestuff_uacct'])?"":$_POST['googlestuff_uacct'],'string');
		$settings->googlestuff->put('googlestuff_verify',empty($_POST['googlestuff_verify'])?"":$_POST['googlestuff_verify'],'string');
	}
}
?>