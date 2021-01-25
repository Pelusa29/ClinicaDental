<?php
if(!function_exists('active_class')){
    function active_class($url)
    {
        //dd($url);
        $current_url = url()->current();
        //dd($current_url);
        if($url == $current_url){
            return "active";
        }
    }
}
