<?php

function getHours($date) {
    $due_date = strtotime($date);
    $current_time = time();
    $difference = $due_date - $current_time;
    return floor($difference / (60*60));

}