<?php

define('CACHE_TIME', 3600 * 24 * 30);
define('DEFAULT_THUMB_WIDTH', 150);
$seconds_to_cache = 3600 * 24 * 365;

function make_thumb($src, $dest, $desired_width)
{
    $source_image = imagecreatefromstring(file_get_contents($src));

    /* read the source image */
    $width = imagesx($source_image);
    $height = imagesy($source_image);

    /* find the "desired height" of this thumbnail, relative to the desired width  */
    $desired_height = floor($height * ($desired_width / $width));

    /* create a new, "virtual" image */
    $virtual_image = imagecreatetruecolor($desired_width, $desired_height);

    /* copy source image at a resized size */
    imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);

    /* convert to progressive */
    imageinterlace($virtual_image, true);

    /* create the physical thumbnail image to its destination */
    imagejpeg($virtual_image, $dest, 95);
}

function not_found()
{
    header("HTTP/1.0 404 Not Found");
    die;
}

if (DIRECTORY_SEPARATOR == "\\")
{
    $upload_root = __DIR__ . '/uploads/';
}
else
{
    $upload_root = '/var/www/uploads/';
}

$uri = $_SERVER['REQUEST_URI'];
$uri_parts = explode('/w=', $uri);

$orgil_img = isset($uri_parts[0]) ? $upload_root . '/' . str_replace('thumbnail.php/', '', $uri_parts[0]) : '';
$desired_width = isset($uri_parts[1]) ? (int) $uri_parts[1] : null;
//check if file exists
if (!$orgil_img)
{
    not_found();
}

header("Content-Type: image/JPEG");
$ts = gmdate("D, d M Y H:i:s", time() + $seconds_to_cache) . " GMT";
header("Expires: $ts");
header("Pragma: cache");
header("Cache-Control: max-age=$seconds_to_cache");

if (!$desired_width)
{
    readfile($orgil_img);
}

if (DIRECTORY_SEPARATOR == "\\")
{
    $cacheDir = __DIR__ . '/cache/thumb/';
}
else
{
    $cacheDir = '/var/www/thumbnails/';
}
$cached_img = $cacheDir . md5($uri);
if (!file_exists($cached_img) || filemtime($cached_img) < time() - CACHE_TIME)
{
    if (!getimagesize($orgil_img))
    {
        not_found();
    }
    $dir = dirname($cached_img);
    if (!is_dir($dir))
    {
        mkdir($dir, 0777, true);
    }
    make_thumb($orgil_img, $cached_img, $desired_width);
}
readfile($cached_img);
