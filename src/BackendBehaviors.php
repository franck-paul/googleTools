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
use Dotclear\Helper\Html\Form\Checkbox;
use Dotclear\Helper\Html\Form\Fieldset;
use Dotclear\Helper\Html\Form\Input;
use Dotclear\Helper\Html\Form\Label;
use Dotclear\Helper\Html\Form\Legend;
use Dotclear\Helper\Html\Form\Para;
use Dotclear\Helper\Html\Html;

class BackendBehaviors
{
    public static function adminBlogPreferencesForm(): string
    {
        $settings = My::settings();

        echo
        (new Fieldset('google-tools'))
        ->legend((new Legend(__('Google Stuff'))))
        ->fields([
            (new Para())->items([
                (new Input('googlestuff_uacct'))
                    ->size(25)
                    ->maxlength(50)
                    ->value(Html::escapeHTML($settings->uacct))
                    ->label((new Label(__('Google Analytics UACCT (ID):'), Label::INSIDE_TEXT_BEFORE))),
            ]),
            (new Para())->items([
                (new Input('googlestuff_verify'))
                    ->size(50)
                    ->maxlength(100)
                    ->value(Html::escapeHTML($settings->verify))
                    ->label((new Label(__('Google Webmaster Tools verification:'), Label::INSIDE_TEXT_BEFORE))),
            ]),
            (new Para())->items([
                (new Checkbox('cnil_cookies', (bool) $settings->cnil_cookies))
                    ->value(1)
                    ->label((new Label(__('Includes CNIL consent for Google Analytics tracking cookies'), Label::INSIDE_TEXT_AFTER))),
            ]),
        ])
        ->render();

        return '';
    }

    public static function adminBeforeBlogSettingsUpdate(): string
    {
        $settings = My::settings();

        $settings->put('uacct', empty($_POST['googlestuff_uacct']) ? '' : $_POST['googlestuff_uacct'], App::blogWorkspace()::NS_STRING);
        $settings->put('verify', empty($_POST['googlestuff_verify']) ? '' : $_POST['googlestuff_verify'], App::blogWorkspace()::NS_STRING);
        $settings->put('cnil_cookies', !empty($_POST['cnil_cookies']), App::blogWorkspace()::NS_BOOL);

        return '';
    }
}
