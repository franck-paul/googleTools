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

use Dotclear\Helper\Html\Html;

class FrontendBehaviors
{
    public static function publicHeadContent(): string
    {
        $settings = My::settings();

        $res = '';

        if ($settings->verify != '') {
            $res .= '<meta name="google-site-verification" content="' . $settings->verify . '" />' . "\n";
        }

        if ($settings->uacct != '') {
            $uacct = $settings->uacct;

            $res .= Html::jsJson('googletools_ga', ['uacct' => $uacct]) .
                '<script async src="https://www.googletagmanager.com/gtag/js?id=' . $uacct . '"></script>' .
                My::jsLoad('ga.js');

            if ($settings->cnil_cookies) {
                // Includes French CNIL consent check if required
                $res .= Html::jsJson('googletools_cnil', [
                    'uacct'  => $uacct,
                    'query'  => __('This site use Google Analytics cookies in order to tracking visits. If you want to avoid this, click <a href="javascript:gaOptout()">here</a>.'),
                    'denied' => __('No Google Analytics cookies will be created for tracking your visits on this site.'),
                ]) .
                My::jsLoad('cnil.js');
            }
        }

        echo $res;

        return '';
    }
}
