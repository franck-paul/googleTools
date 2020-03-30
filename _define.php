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

if (!defined('DC_RC_PATH')) {return;}

$this->registerModule(
    "Google Tools",                                       // Name
    "Handles Google tools (Analytics & Webmaster Tools)", // Description
    "xave",                                               // Author
    '0.7',                                                // Version
    [
        'requires'    => [['core', '2.16']],                           // Dependencies
        'permissions' => 'contentadmin',                               // Permissions
        'type'        => 'plugin',                                     // Type
        'support'     => 'https://github.com/franck-paul/googleTools', // Support URL
        'settings'    => [
            'blog' => '#params.google-tools'
        ]
    ]
);
