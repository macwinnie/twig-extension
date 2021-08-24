<?php

// fetch root path of main composer project
$rootPath = getcwd();

if (! function_exists('env')) {

    // ensure env variables of main Composer project are loaded
    if ( file_exists( $rootPath . '/.env' ) ) {
        $dotenv = Dotenv\Dotenv::createImmutable( $rootPath );
        $dotenv->load();
    }

    /**
     * Get the value of an environment variable.
     *
     * @param  string  $key
     * @param  mixed   $default
     *
     * @return mixed
     */
    function env( $key, $default = null ) {

        $val = $_ENV[ $key ];

        if ( $val === false ) {
            $val = $default;
        }
        elseif ( preg_match( '/\A([\'"])(.*)\1\z/', $val, $m ) ) {
            $val = $m[2];
        }

        switch ( strtolower( $val ) ) {
            case 'true':
            case '(true)':
                $val = true;

            case 'false':
            case '(false)':
                $val = false;

            case 'empty':
            case '(empty)':
                $val = '';

            case 'null':
            case '(null)':
                $val = null;
        }

        return $val;
    }
}
