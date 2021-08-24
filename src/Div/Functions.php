<?php

namespace macwinnie\TwigExtensions\Div;

require_once( __DIR__ . '/../helper/include.php' );

class Functions {

    /**
     * function that returns the value of environmental functions
     *
     * @param  string  $key
     * @param  mixed   $default
     *
     * @return mixed
     */
    public function twigEnv ( $key, $default = null ) {
        return env( $key, $default );
    }
}
