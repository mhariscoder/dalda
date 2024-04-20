<?php
if (!function_exists('getActiveClass')) {
    function getActiveClass($segment, $matchValue)
    {
        if ($res = array_intersect($matchValue,explode('-', $segment))) {
            if(count($res) > 0)
            {
                return "mm-active";
            }
        }
        return "";
    }
}

if (!function_exists('moveElements')) {
    function moveElements($array) {
        if (count($array) > 1) {
            $firstElement = array_shift($array);
            array_push($array, $firstElement);
        }
        return $array;
    }
}

if(!function_exists('getAbsolutePath'))
{
    function getAbsolutePath()
    {
//        if(env('APP_ENV') === 'production')
//        {
//            $path = base_path();
//        } else {
//            $path = public_path();
//        }
        return public_path();
    }
}
