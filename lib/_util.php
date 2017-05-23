<?php

if ( !function_exists( 'wp_dump' ) ) :

function wp_dump()
{
    foreach( func_get_args() as $arg )
    {
        echo '<xmp style="margin:1em;padding:1em;border:1px solid #e9e9e9;background:#fff;color:#333;font:12px Monaco,Courier,monospace;">';
        var_dump( $arg );
        echo '</xmp>';
    }
}

endif; 