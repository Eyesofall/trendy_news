<?php

// Custom functions -- helper functions

//--------------------------------------------------------------------------------------------------------------------

function add_meta_title($string){

    $CI =& get_instance();
    $CI->data['meta_title'] = e($string) . ' - ' . $CI->data['meta_title'];
}

//--------------------------------------------------------------------------------------------------------------------
function article_link($article){
    return 'article/' . intval($article->article_id) . '/' . e($article->slug);
}

//--------------------------------------------------------------------------------------------------------------------

function image_link($image_name) {
    return site_url('../uploads/image/' . $image_name);
}

//--------------------------------------------------------------------------------------------------------------------

function audio_link($slug) {
    return site_url('../uploads/audio/' . $slug);
}

//--------------------------------------------------------------------------------------------------------------------

function article_links($articles){
    $string = '<ul class="list-unstyled">';
    foreach ($articles as $article) {
        $url = article_link($article);
        $string .= '<li>';
        $string .= '<hr class="alert-success">';
        $string .= '<p>' . anchor($url, e($article->title)) .  ' ›› <i class="pubdate text-right">' . e($article->pubdate) . '</i></p>';
        $string .= '</li>';
    }
    $string .= '</ul>';
    return $string;
}

//--------------------------------------------------------------------------------------------------------------------

function get_excerpt($article, $numwords = 80){
    $string = '';
    $url = article_link($article);
    $image_url = image_link($article->image_name);
    $string .= '<h2>' . anchor($url, e($article->title)) .  '</h2>';
    $string .= '<p class="pubdate">' . e($article->pubdate) . '</p>';
    $string .= '<img class="img-thumbnail" src="' . $image_url .'">';
    $string .= '<p class="text-justify">' . e(limit_to_numwords(strip_tags($article->body), $numwords)) . '</p>';
    $string .= '<p>' . anchor($url, 'Read more ›', array('title' => e($article->title))) . '</p>';
    return $string;
}

//--------------------------------------------------------------------------------------------------------------------

function limit_to_numwords($string, $numwords){

    $excerpt = explode(' ', $string, $numwords + 1);
    if(count($excerpt) >= $numwords) {
        array_pop($excerpt);
    }

    $excerpt = implode(' ', $excerpt);
    return $excerpt;
}

//--------------------------------------------------------------------------------------------------------------------


//--------------------------------------------------------------------------------------------------------------------

function btn_edit($uri){
    return anchor($uri, '<i class="glyphicon glyphicon-edit"></i>');
}

//--------------------------------------------------------------------------------------------------------------------

function btn_delete($uri){
    return anchor($uri, '<i class="glyphicon glyphicon-remove"></i>', array(
        'onclick' => "return confirm('You are about to delete a record, This cannot be undone. Are you sure?');"
    ));
}

//--------------------------------------------------------------------------------------------------------------------
/**
 * Dump helper. Functions to dump variables to the screen, in a nicley formatted manner.
 * @author Joost van Veen
 * @version 1.0
 */
if (!function_exists('dump')) {
    function dump ($var, $label = 'Dump', $echo = TRUE)
    {
        // Store dump in variable 
        ob_start();
        var_dump($var);
        $output = ob_get_clean();

        // Add formatting
        $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
        $output = '<pre style="background: #FFFEEF; color: #000; border: 1px dotted #000; padding: 10px; margin: 10px 0; text-align: left;">' . $label . ' => ' . $output . '</pre>';

        // Output
        if ($echo == TRUE) {
            echo $output;
        }
        else {
            return $output;
        }
    }
}

/**
 * Dump helper. Functions to dump variables to the screen, in a nicley formatted manner.
 * @author Joost van Veen
 * @version 1.0
 */
if (!function_exists('dump_exit')) {
    function dump_exit($var, $label = 'Dump', $echo = TRUE) {
        dump ($var, $label, $echo);
        exit;
    }
}

//--------------------------------------------------------------------------------------------------------------------

function get_menu ($array, $child = FALSE)
{

    $CI =& get_instance();
    $str = '';

    if (count($array)) {
        $str .= $child == FALSE ? '<ul class="nav navbar-nav navbar-right">' . PHP_EOL : '<ul class="dropdown-menu">' . PHP_EOL;

        foreach ($array as $item) {

            $active = $CI->uri->segment(1) == $item['slug'] ? TRUE : FALSE;

            if (isset($item['children']) && count($item['children'])) {
                $str .= $active ? '<li class="dropdown active">' : '<li class="dropdown">';
                $str .= '<a class="dropdown-toggle" data-toggle="dropdown" href="' .site_url(e($item['slug'])). '">' . e($item['title']);
                $str .= '<b class="caret"></b></a>' . PHP_EOL;
                $str .= get_menu($item['children'], TRUE);
            } else {
                $str .= $active ? '<li class="active">' : '<li>';
                $str .= '<a  href="' .site_url(e($item['slug'])). '">' . e($item['title']) . '</a>';
            }

            $str .= '</li>' . PHP_EOL;
        }

        $str .= '</ul>' . PHP_EOL;
    }

    return $str;
}

//--------------------------------------------------------------------------------------------------------------------

function e($string) {
    return htmlentities($string);
}