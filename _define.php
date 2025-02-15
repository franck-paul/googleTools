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
    '4.3',
    [
        'date'        => '2025-02-14T08:35:40+0100',
        'requires'    => [['core', '2.28']],
        'permissions' => 'My',
        'type'        => 'plugin',
        'settings'    => [
            'blog' => '#params.google-tools',
        ],

        'details'    => 'https://open-time.net/?q=googleTools',
        'support'    => 'https://github.com/franck-paul/googleTools',
        'repository' => 'https://raw.githubusercontent.com/franck-paul/googleTools/main/dcstore.xml',
    ]
);
