<?php


function theme_url($uri) {
    $CI = & get_instance();
    return $CI->config->base_url($uri);
}

//to generate an image tag, set tag to true. you can also put a string in tag to generate the alt tag
function theme_img($uri, $tag = false) {
    if ($tag) {
        return '<img src="' . theme_url('assets/img/' . $uri) . '" alt="' . $tag . '">';
    } else {
        return theme_url('assets/img/' . $uri);
    }
}

function theme_js($uri, $tag = false) {
    if ($tag) {
        return '<script type="text/javascript" src="' . theme_url('assets/js/' . $uri) . '"></script>';
    } else {
        return theme_url('assets/js/' . $uri);
    }
}

//you can fill the tag field in to spit out a link tag, setting tag to a string will fill in the media attribute
function theme_css($uri, $tag = false) {
    if ($tag) {
        $media = false;
        if (is_string($tag)) {
            $media = 'media="' . $tag . '"';
        }
        return '<link href="' . theme_url('assets/css/' . $uri) . '" type="text/css" rel="stylesheet" ' . $media . '/>';
    }

    return theme_url('assets/css/' . $uri);
}

/* * ****krishna goes from here***** */

function admin_url($path = false) {
    return site_url(config_item('admin_path') . '/' . $path);
}

function employer_url($path = false) {
    return site_url(config_item('employer_path') . '/' . $path);
}

function debug($data) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

function get_remaining_days($reg_date) {
    $start = strtotime('now');
    $end = strtotime($reg_date) + 31104000;
    return $days_between = ceil(abs($end - $start) / 86400);
}

function get_exp_days($reg_date) {
    $end = strtotime($reg_date) + 31104000;
    return $end;
}

function timeAgo($time_ago) {
    $cur_time = time();
    $time_elapsed = $cur_time - $time_ago;
    $seconds = $time_elapsed;
    $minutes = round($time_elapsed / 60);
    $hours = round($time_elapsed / 3600);
    $days = round($time_elapsed / 86400);
    $weeks = round($time_elapsed / 604800);
    $months = round($time_elapsed / 2600640);
    $years = round($time_elapsed / 31207680);
// Seconds
    if ($seconds <= 60) {
        return "$seconds seconds ago";
    }
//Minutes
    else if ($minutes <= 60) {
        if ($minutes == 1) {
            return "one minute ago";
        } else {
            return "$minutes minutes ago";
        }
    }
//Hours
    else if ($hours <= 24) {
        if ($hours == 1) {
            return "an hour ago";
        } else {
            return "$hours hours ago";
        }
    }
//Days
    else if ($days <= 7) {
        if ($days == 1) {
            return "yesterday";
        } else {
            return "$days days ago";
        }
    }
//Weeks
    else if ($weeks <= 4.3) {
        if ($weeks == 1) {
            return "a week ago";
        } else {
            return "$weeks weeks ago";
        }
    }
//Months
    else if ($months <= 12) {
        if ($months == 1) {
            return "a month ago";
        } else {
            return "$months months ago";
        }
    }
//Years
    else {
        if ($years == 1) {
            return "one year ago";
        } else {
            return "$years years ago";
        }
    }
}
