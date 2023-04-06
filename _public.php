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
class googlestuffPublicBehaviours
{
    public static function publicHeadContent()
    {
        $res = '';

        if (dcCore::app()->blog->settings->googlestuff->googlestuff_verify != '') {
            $res .= '<meta name="google-site-verification" content="' . dcCore::app()->blog->settings->googlestuff->googlestuff_verify . '" />' . "\n";
        }

        if (dcCore::app()->blog->settings->googlestuff->googlestuff_uacct != '') {
            $uacct = dcCore::app()->blog->settings->googlestuff->googlestuff_uacct;

            $res .= dcUtils::jsJson('googletools_ga', ['uacct' => $uacct]) .
                '<script async src="https://www.googletagmanager.com/gtag/js?id=' . $uacct . '"></script>' .
                dcUtils::jsModuleLoad('googleTools/js/ga.js');

            if (dcCore::app()->blog->settings->googlestuff->cnil_cookies) {
                // Includes French CNIL consent check if required
                $res .= dcUtils::jsJson('googletools_cnil', [
                    'uacct'  => $uacct,
                    'query'  => __('This site use Google Analytics cookies in order to tracking visits. If you want to avoid this, click <a href="javascript:gaOptout()">here</a>.'),
                    'denied' => __('No Google Analytics cookies will be created for tracking your visits on this site.'),
                ]) .
                dcUtils::jsModuleLoad('googleTools/js/cnil.js');
            }
        }

        echo $res;
    }
}

dcCore::app()->addBehavior('publicHeadContent', [googlestuffPublicBehaviours::class, 'publicHeadContent']);
