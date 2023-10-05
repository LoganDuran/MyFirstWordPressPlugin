<?php

/*
    Plugin Name: Lelemud Plugin
    Description: Vrlo masan plugin
    Version: 0.9.1
    Author: Logan
    Author URI: http://www.dudlaj.me/
*/

class LelemudPlugin {
    function __construct()
    {
        add_action('admin_menu', array($this, 'adminPage'));
        add_action('admin_init', array($this, 'settings'));
        add_filter('the_content', array($this, 'ladidadi'));
    }

    function settings() {
        register_settings("wordcountplugin", 'ladidadi_location', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));

    }
    function adminPage() {
        add_options_page('Lelemud Settings', 'Lelemud', 'manage_options', 'lelemud-settings-page', array($this, 'lelemudHTML'));
    }
    
    function lelemudHTML() { ?>
        <div class="wrap">
            <h1>Lelemud Settings</h1>
        </div>

    <?php }

    function ladidadi($content) {
    if (is_page() && is_main_query()) {
        return '<p>Привет, меня зовут Логан!</p>' . $content;
    }
    
    return $content;
}
}


$lelemudPlugin = new LelemudPlugin();


