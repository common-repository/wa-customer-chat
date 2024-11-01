<?php

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'WCC_Activation' ) ) : 

    class WCC_Activation {

        public static function activate() {

            // Appearance Setting
            self::register( 'wcc_pro_appearance_settings', array(
                'bg_color'    => '#0B1839',
                'text_color'  => '#ffffff',
            ) );

            // Support Setting
            self::register( 'wcc_pro_support_settings', array(
                'support_message'           => 'Our customer support team is here to answer your questions. Ask us anything!',
                'placeholder_text'          => 'Reply to {{person_name}}',
            ) );

            if ( ! get_option( 'wcc_pro_support_persons' ) ) {

                // Add Support Person
                self::register( 'wcc_pro_support_persons', array(

                    '0' => array(
                        'contact_number'  => '911234567890', 
                        'name'            => 'Georgie Gray', 
                        'title'           => 'Customer Support', 
                        'image'           => '', 
                    )

                ) );
            }

            // Basic Setting
            self::register( 'wcc_pro_basic_settings', array(
                'on_mobile_status'      => '1',
                'on_mobile_position'    => 'br',
                'on_desktop_status'     => '1',
                'on_desktop_position'   => 'br',
                'auto_popup'            => '1',
                'custom_css'            => '',
            ) );


            // GDPR Setting
            self::register( 'wcc_pro_gdpr_settings', array(
                'gdpr_status'       => '0',
                'gdpr_msg'          => 'I agree with the {{link}}.',
                'gdpr_privacy_page' => get_option( 'page_on_front' ),
            ) );

        }


        /**
         * array_merge_recursive does indeed merge arrays, but it converts values with duplicate
         * keys to arrays rather than overwriting the value in the first array with the duplicate
         * value in the second array, as array_merge does. I.e., with array_merge_recursive,
         * this happens (documented behavior):
         *
         * @param array $array1
         * @param array $array2
         *
         * @return array
         */
        protected static function array_merge_recursive_distinct( $array1 = array(), $array2 = array() ) {
            $merged = $array1;
            foreach ( $array2 as $key => &$value ) {
                if ( is_array( $value ) && isset( $merged[$key] ) && is_array( $merged[$key] ) ) {
                    $merged[$key] = self::array_merge_recursive_distinct( $merged[$key], $value );
                } else {
                    $merged[$key] = $value;
                }
            }
            return $merged;
        }
        

        /**
         * Method to register admin settings
         * @param  string $option_name
         * @param  array  $settings
         * @since 1.0
         */
        public static function register( $option_name, $settings = array() ) {

            // add plugin settings in wp_options table
            $db_setting    = get_option( $option_name, array() );
            $merge_setting = self::array_merge_recursive_distinct( (array)$settings, (array)$db_setting );
            update_option( $option_name, $merge_setting );

        }

    }


endif;