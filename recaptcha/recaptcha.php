<?php
/**
 * name: reCaptcha
 * description: Anti-spam captcha system 
 * version: 0.1
 * folder: recaptcha
 * type: captcha
 * class: ReCaptcha
 * hooks: install_plugin, admin_sidebar_plugin_settings, admin_plugin_settings, show_recaptcha, check_recaptcha
 * author: Nick Ramsay
 * authorurl: http://Baker CMS.org/member.php?1-Nick
 *
 * PHP version 5
 *
 * LICENSE: Baker CMS is free software: you can redistribute it and/or 
 * modify it under the terms of the GNU General Public License as 
 * published by the Free Software Foundation, either version 3 of 
 * the License, or (at your option) any later version. 
 *
 * Baker CMS is distributed in the hope that it will be useful, but WITHOUT 
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or 
 * FITNESS FOR A PARTICULAR PURPOSE. 
 *
 * You should have received a copy of the GNU General Public License along 
 * with Baker CMS. If not, see http://www.gnu.org/licenses/.
 * 
 * @category  Content Management System
 * @package   Baker CMS
 * @author    Nick Ramsay / Stuart Duff
 * @copyright Copyright (c) 2009, Baker CMS
 * @license   http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link      http://bakercms.com/
 */

class ReCaptcha
{
    /**
     * Install plugin
     */
    public function install_plugin($h)
    {

        // Plugin settings
        $recaptcha_settings = $h->getSerializedSettings();
        if (!isset($recaptcha_settings['pubkey'])) { $recaptcha_settings['pubkey'] = ""; }
        if (!isset($recaptcha_settings['privkey'])) { $recaptcha_settings['privkey'] = ""; }
        
        $h->updateSetting('recaptcha_settings', serialize($recaptcha_settings));
    }
    
    
     /**
     * show ReCaptcha
     */
    public function show_recaptcha($h)
    {
        $recaptcha_settings = $h->getSerializedSettings();
        $pubkey = $recaptcha_settings['pubkey'];
        $privkey = $recaptcha_settings['privkey'];
        
        require_once(PLUGINS . 'recaptcha/libs/recaptchalib.php');
        
        if ($pubkey && $privkey) { 
            echo recaptcha_get_html($pubkey);
        }
    }
    
    
     /**
     * check submitted ReCaptcha
     *
     * @return string 'success', 'error', or 'empty'
     */
    public function check_recaptcha($h)
    {
        require_once(PLUGINS . 'recaptcha/libs/recaptchalib.php');

        $recaptcha_settings = $h->getSerializedSettings();
        $pubkey = $recaptcha_settings['pubkey'];
        $privkey = $recaptcha_settings['privkey'];
        
        $rc_resp = null;
        $rc_error = null;
        
        // was there a reCAPTCHA response?
        if ($h->cage->post->keyExists('recaptcha_response_field')) {
                $rc_resp = recaptcha_check_answer($privkey,
                                                $h->cage->server->getRaw('REMOTE_ADDR'),
                                                $h->cage->post->getRaw('recaptcha_challenge_field'),
                                                $h->cage->post->getRaw('recaptcha_response_field'));
                                                
                if ($rc_resp->is_valid) {
                        // success
                        return 'success';
                } else {
                        # set the error code so that we can display it
                        $rc_error = $rc_resp->error;
                        return 'error';
                }
        } else {
            return 'empty';
        }
    }
}

?>
