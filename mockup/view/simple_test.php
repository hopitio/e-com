<?php

$view = new View;
$view->set_title('title')
        ->set_breadcrums(array('home' => '#', 'category' => '#'))
        ->set_layout('custom')
        ->render('bbc');
