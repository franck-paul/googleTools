<?php
/**
 * @brief googleTools, a plugin for Dotclear 2
 *
 * @package Dotclear
 * @subpackage Plugins
 *
 * @author Franck Paul and contributors
 *
 * @copyright Franck Paul carnet.franck.paul@gmail.com
 * @copyright GPL-2.0 https://www.gnu.org/licenses/gpl-2.0.html
 */
declare(strict_types=1);

namespace Dotclear\Plugin\googleTools;

use dcCore;
use dcNamespace;
use Dotclear\Core\Process;
use Exception;

class Install extends Process
{
    public static function init(): bool
    {
        return self::status(My::checkContext(My::INSTALL));
    }

    public static function process(): bool
    {
        if (!self::status()) {
            return false;
        }

        try {
            // Update
            $old_version = dcCore::app()->getVersion(My::id());
            if (version_compare((string) $old_version, '2.0', '<')) {
                // Rename settings namespace
                if (dcCore::app()->blog->settings->exists('googlestuff')) {
                    dcCore::app()->blog->settings->delNamespace(My::id());
                    dcCore::app()->blog->settings->renNamespace('googlestuff', My::id());
                }

                // Change settings names (remove googlestuff_ prefix in them)
                $rename = function (string $name, dcNamespace $settings): void {
                    if ($settings->settingExists('googlestuff_' . $name, true)) {
                        $settings->rename('googlestuff_' . $name, $name);
                    }
                };
                $settings = My::settings();
                foreach (['uacct', 'verify'] as $name) {
                    $rename($name, $settings);
                }
            }

            // Init
            $settings = My::settings();
            $settings->put('uacct', '', dcNamespace::NS_STRING, 'Google Analytics PageTracker ID', false, true);
            $settings->put('verify', '', dcNamespace::NS_STRING, 'Google Webmaster Tools Verify code', false, true);
            $settings->put('cnil_cookies', false, dcNamespace::NS_BOOL, 'Includes CNIL consent for Google Analytics tracking cookies', false, true);
        } catch (Exception $e) {
            dcCore::app()->error->add($e->getMessage());
        }

        return true;
    }
}
