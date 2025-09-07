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

use Dotclear\App;
use Dotclear\Helper\Process\TraitProcess;
use Dotclear\Interface\Core\BlogWorkspaceInterface;
use Exception;

class Install
{
    use TraitProcess;

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
            $old_version = App::version()->getVersion(My::id());
            if (version_compare((string) $old_version, '2.0', '<')) {
                // Rename settings namespace
                if (App::blog()->settings()->exists('googlestuff')) {
                    App::blog()->settings()->delWorkspace(My::id());
                    App::blog()->settings()->renWorkspace('googlestuff', My::id());
                }

                // Change settings names (remove googlestuff_ prefix in them)
                $rename = static function (string $name, BlogWorkspaceInterface $settings): void {
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
            $settings->put('uacct', '', App::blogWorkspace()::NS_STRING, 'Google Analytics PageTracker ID', false, true);
            $settings->put('verify', '', App::blogWorkspace()::NS_STRING, 'Google Webmaster Tools Verify code', false, true);
            $settings->put('cnil_cookies', false, App::blogWorkspace()::NS_BOOL, 'Includes CNIL consent for Google Analytics tracking cookies', false, true);
        } catch (Exception $exception) {
            App::error()->add($exception->getMessage());
        }

        return true;
    }
}
