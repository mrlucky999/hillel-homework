<?php

function getHours($date) {
    $due_date = strtotime($date);
    $current_time = time();
    $difference = $due_date - $current_time;
    return floor($difference / (60*60));
}

function getTaskTimeText ($date) {
    $hours = getHours($date);
    $days = floor ($hours / 24);
    if ($hours > 24) {
        return $days . getNounPluralForm ($days, ' день', ' дня', ' дней');
    }
    return $hours . getNounPluralForm ($hours, ' час', ' часа', ' часов');
}

function getDbCon($config)
{
    $mysqli = mysqli_connect($config['host'], $config['user'], $config['pass'], $config['db']);
    if ($mysqli === false) {
        die('"Ошибка в подключении: %s<br />"');
    }
    return $mysqli;
}

function getProjects($mysqli)
{
    $sql_sup =
        "SELECT projects.id, projects.pname, count(t.id) AS num FROM projects
        LEFT JOIN tasks AS t ON (t.projects_id = projects.id)
        GROUP BY projects.id";
    $result = mysqli_query($mysqli, $sql_sup);
    if ($result === false) {
        die('Cant execute query: ' . mysqli_error($mysqli));
    }
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getTasks($mysqli)
{
    $sql_sut = "SELECT id, tname, tstatus, due_time, tdescribe FROM tasks";
    $result = mysqli_query($mysqli, $sql_sut);
    if ($result === false) {
        die('Cant execute query: ' . mysqli_error($mysqli));
    }
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}



