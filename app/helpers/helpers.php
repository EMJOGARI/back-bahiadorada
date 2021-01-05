<?php
if (! function_exists('permissionsAmin')) {
    function permissionsAmin(){
        if(Auth::user()->hasRole('admin') || auth()->user()->hasRole('super-admin')){
            return true;
        }
        return false;
    }
}
