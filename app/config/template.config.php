<?php

return array(
    'components' => array(
        'header'               => TEMPLATE_PATH . 'header.php',
        'nav'               => TEMPLATE_PATH . 'nav.php',
        ':view_temp'        => ':view_path',
    ),

    'head_resources' => array(
        'Js' => array(),
        'Css' => array(
            'bootstrap' => "https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css",
            'font_awesome' => "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css",
            'main' => CSS  . "main.css"
        )
    ),

    'footer_resources' => array(
        'Js' => array(
            'jQuery' => "https://code.jquery.com/jquery-3.5.1.slim.min.js",
            'bootstrap' => "https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js",
            'main' => JS . "main.js",
            'todo' => JS . "todo.js",
            'user' => JS . "user.js",
            'auth' => JS . "auth.js",
        ),
        'Css' => array()
    )
);