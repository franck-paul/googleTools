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
$this->registerModule(
    'Google Tools',
    'Handles Google tools (Analytics & Webmaster Tools)',
    'xave',
    '2.0.1',
    [
        'requires'    => [['core', '2.26']],
        'permissions' => dcCore::app()->auth->makePermissions([
            dcAuth::PERMISSION_CONTENT_ADMIN,
        ]),
        'type'     => 'plugin',
        'settings' => [
            'blog' => '#params.google-tools',
        ],

        'details'    => 'https://open-time.net/?q=googleTools',
        'support'    => 'https://github.com/franck-paul/googleTools',
        'repository' => 'https://raw.githubusercontent.com/franck-paul/googleTools/master/dcstore.xml',
    ]
);
