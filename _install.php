<?php
/**
 * @brief googleTools, a plugin for Dotclear 2
 *
 * @package Dotclear
 * @subpackage Plugins
 *
 * @author xave and contributors
 *
 * @copyright xave
 * @copyright GPL-2.0 https://www.gnu.org/licenses/gpl-2.0.html
 */
if (!defined('DC_CONTEXT_ADMIN')) {
    return;
}

if (!dcCore::app()->newVersion(basename(__DIR__), dcCore::app()->plugins->moduleInfo(basename(__DIR__), 'version'))) {
    return;
}

dcCore::app()->blog->settings->googlestuff->put('googlestuff_uacct', '', 'string', 'Google Analytics PageTracker ID', true, true);
dcCore::app()->blog->settings->googlestuff->put('googlestuff_verify', '', 'string', 'Google Webmaster Tools Verify code', true, true);

return true;
