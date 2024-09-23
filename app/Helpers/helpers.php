<?php
function check_image($user){
    if($user->image){
        return $user->image->path;
    }else{
        return 'images/default.png';
    }
}

function formatPrice($number) {
    if ($number >= 1000000) {
        return number_format($number / 1000000, 0) . 'M';
    } elseif ($number >= 1000) {
        return number_format($number / 1000, 0) . 'K';
    } else {
        return $number;
    }
}

/** Set Sidebar Item Active */
function setActive(array $route)
{
    if (is_array($route)) {
        foreach ($route as $r) {
            if (request()->routeIs($r)) {
                return 'active';    
            }
        }
    }
}
function setStatus($name)
{
    switch (strtolower($name)) {
        case 'accepted':
            return 'success';
        
        case 'rejected':
            return 'danger';
        
        case 'pending':
            return 'warning';

        default:
            return 'secondary';
    }
}
