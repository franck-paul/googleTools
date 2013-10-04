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

$this->registerModule(
	/* Name */			"Google Tools",
	/* Description*/	"Handles Google tools (Analytics & Webmaster Tools)",
	/* Author */		"xave",
	/* Version */		'0.5',
	array(
		/* Permissions */	'permissions' =>	'contentadmin',
		/* Type */			'type' =>			'plugin'
	)
);
