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

if (!defined('DC_RC_PATH')) { return; }

$core->addBehavior('publicHeadContent',array('googlestuffPublicBehaviours','publicHeadContent'));
$core->addBehavior('publicFooterContent',array('googlestuffPublicBehaviours','publicFooterContent'));

class googlestuffPublicBehaviours
{
	public static function publicHeadContent($core)
	{
		$res = '';

		if ($core->blog->settings->googlestuff->googlestuff_verify != "") {
			$res .= '<meta name="google-site-verification" content="'.$core->blog->settings->googlestuff->googlestuff_verify.'" />'."\n";
		}

		if ($core->blog->settings->googlestuff->googlestuff_uacct != "") {
			$res .= '<script type="text/javascript">'."\n".
				'var _gaq = _gaq || [];'."\n".
				'_gaq.push([\'_setAccount\', \''.$core->blog->settings->googlestuff->googlestuff_uacct.'\']);'."\n".
				'_gaq.push([\'_trackPageview\']);'."\n".
				'</script>'."\n";
		}

		echo $res;
	}

	public static function publicFooterContent($core)
	{
		if ($core->blog->settings->googlestuff->googlestuff_uacct != "") {
			$res = '<script type="text/javascript">'."\n".
				'(function() {'."\n".
				'var ga = document.createElement(\'script\');'."\n".
				'ga.src = (\'https:\' == document.location.protocol ? \'https://ssl\' :'.
					'\'http://www\') + \'.google-analytics.com/ga.js\';'."\n".
				'ga.setAttribute(\'async\', \'true\');'."\n".
				'document.documentElement.firstChild.appendChild(ga);'."\n".
				'})();'."\n".
				'</script>';

			echo $res;
		}
	}
}
