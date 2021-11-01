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
if (!defined('DC_RC_PATH')) {
    return;
}

$this->registerModule(
    'Google Tools',                                       // Name
    'Handles Google tools (Analytics & Webmaster Tools)', // Description
    'xave',                                               // Author
    '0.8',                                                // Version
    [
        'requires'    => [['core', '2.17']],                           // Dependencies
        'permissions' => 'contentadmin',                               // Permissions
        'type'        => 'plugin',                                     // Type
        'settings'    => [
            'blog' => '#params.google-tools'
        ],

        'details'    => 'https://open-time.net/?q=googleTools',       // Details URL
        'support'    => 'https://github.com/franck-paul/googleTools', // Support URL
        'repository' => 'https://raw.githubusercontent.com/franck-paul/googleTools/master/dcstore.xml'
    ]
);
