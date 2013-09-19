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

global $core;

$this_version = $core->plugins->moduleInfo('googlestuff','version');
$installed_version = $core->getVersion('googlestuff');

if (version_compare($installed_version,$this_version,'>=')) {
	return;
}

$core->blog->settings->addNamespace('googlestuff');
$core->blog->settings->googlestuff->put('googlestuff_uacct','','string','Google Analytics PageTracker ID',true,true);
$core->blog->settings->googlestuff->put('googlestuff_verify','','string','Google Webmaster Tools Verify code',true,true);

$core->setVersion('googlestuff',$this_version);

return true;
?>