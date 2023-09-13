<?php

if (!defined('ABSPATH')) {
      die('You cannot be here');
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('after_setup_theme', 'load_carbon_fields');
add_action('carbon_fields_register_fields', 'create_options_page');

function load_carbon_fields()
{
      \Carbon_Fields\Carbon_Fields::boot();
}

function create_options_page()
{
      Container::make('theme_options', __('Simple Contact Settings'))

            ->set_page_menu_position(82)
            ->set_icon('dashicons-email')
            ->add_fields(array(

                  Field::make('checkbox', 'simple_contact_active', __('Plugin Active')),
                  Field::make('color', 'simple_contact_colour', __('Theme Colour'))->set_help_text('Select the primary colour theme for your contact form.')->set_alpha_enabled(true),
                  Field::make('checkbox', 'simple_contact_darkmode', __('Enable Dark Mode?'))->set_help_text('Enable dark colour scheme on your contact form.'),
                  Field::make('text', 'simple_contact_title', __('Form Title'))->set_attribute('placeholder', 'Get in Touch')->set_help_text('Give your contact form a title.'),
                  Field::make('text', 'simple_contact_recipients', __('Recipient Email'))->set_attribute('placeholder', 'address@email.com')->set_help_text('This is the email address that your form submissions will be sent to.'),
                  Field::make('checkbox', 'simple_contact_disable_phone', __('Disable Phone Number Field?'))->set_help_text('Disable the phone number field in your contact form if you don\'t need it.'),
                  Field::make('textarea', 'simple_contact_message', __('Confirmation Message'))->set_attribute('placeholder', 'Add a message')->set_help_text('Add a confirmation message for successful submissions.'),


            ));
}
