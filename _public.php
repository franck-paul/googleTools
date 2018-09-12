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

$core->addBehavior('publicHeadContent', ['googlestuffPublicBehaviours', 'publicHeadContent']);
$core->addBehavior('publicFooterContent', ['googlestuffPublicBehaviours', 'publicFooterContent']);

class googlestuffPublicBehaviours
{
    public static function publicHeadContent($core)
    {
        $res = '';

        if ($core->blog->settings->googlestuff->googlestuff_verify != "") {
            $res .= '<meta name="google-site-verification" content="' . $core->blog->settings->googlestuff->googlestuff_verify . '" />' . "\n";
        }

        if ($core->blog->settings->googlestuff->googlestuff_uacct != "") {
            $res .= '<script type="text/javascript">' . "\n" .
            'var _gaq = _gaq || [];' . "\n" .
            '_gaq.push([\'_setAccount\', \'' . $core->blog->settings->googlestuff->googlestuff_uacct . '\']);' . "\n" .
                '_gaq.push([\'_trackPageview\']);' . "\n" .
                '</script>' . "\n";

            if ($core->blog->settings->googlestuff->cnil_cookies) {
                // Includes French CNIL consent check if required
                $res .= '<script type="text/javascript">' . "\n" .
                'var gaProperty = \'' . $core->blog->settings->googlestuff->googlestuff_uacct . '\'' . "\n" .
                'var cnil_txt_query = \' ' . __('This site use Google Analytics cookies in order to tracking visits. If you want to avoid this, click <a href="javascript:gaOptout()">here</a>.') . ' \';' . "\n" .
                'var cnil_txt_denied = \' ' . __('No Google Analytics cookies will be created for tracking your visits on this site.') . ' \';' . "\n" .
                    '</script>' . "\n";
                $res .= dcUtils::jsLoad($core->blog->getPF('googleTools/js/cnil.js'));
            }
        }

        echo $res;
    }

    public static function publicFooterContent($core)
    {
        if ($core->blog->settings->googlestuff->googlestuff_uacct != "") {
            $res = '<script type="text/javascript">' . "\n" .
                '(function() {' . "\n" .
                'var ga = document.createElement(\'script\');' . "\n" .
                'ga.src = (\'https:\' == document.location.protocol ? \'https://ssl\' :' .
                '\'http://www\') + \'.google-analytics.com/ga.js\';' . "\n" .
                'ga.setAttribute(\'async\', \'true\');' . "\n" .
                'document.documentElement.firstChild.appendChild(ga);' . "\n" .
                '})();' . "\n" .
                '</script>';

            echo $res;
        }
    }
}
