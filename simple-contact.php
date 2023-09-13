<?php

/**
 * 
 * Plugin name: Simple Contact
 * Description: A simple, lightweight contact form with customisable colour scheme and native dark and light modes. Simply activate and add to your site with the shorcode [simple_contact].
 * Version: 1.0.5
 * Text Domain: simple-contact
 * 
 */

if (!defined('ABSPATH')) {
      die('You cannot be here');
}

if (!class_exists('SimpleContact')) {



      class SimpleContact
      {


            public function __construct()
            {

                  define('PATH_TO_PLUGIN', plugin_dir_path(__FILE__));

                  define('PLUGIN_URL', plugin_dir_url(__FILE__));

                  require_once(PATH_TO_PLUGIN . '/vendor/autoload.php');
            }

            public function initialize()
            {
                  include_once PATH_TO_PLUGIN . 'includes/utilities.php';

                  include_once PATH_TO_PLUGIN . 'includes/options-page.php';

                  include_once PATH_TO_PLUGIN . 'includes/simple-contact.php';
            }
      }

      $simpleContact = new SimpleContact;
      $simpleContact->initialize();
}
