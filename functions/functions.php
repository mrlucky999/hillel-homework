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

function getProjects(mysqli $mysqli, int $userId): array
{
    $sql_sup =
        "SELECT projects.id, projects.user_id, projects.pname, count(t.id) AS num FROM projects
        LEFT JOIN tasks AS t ON (t.projects_id = projects.id)
        WHERE projects.user_id = ?                                                                 
        GROUP BY projects.id";

    $stmt = mysqli_prepare($mysqli, $sql_sup);
    if ($stmt === false) {
        die('Cant prepare query: ' . mysqli_error($mysqli));
    }

    if (!mysqli_stmt_bind_param($stmt, 'i', $userId)){
        die('Cant bind param' . mysqli_error($mysqli));
    }

    if (!mysqli_stmt_execute($stmt)) {
        die('Cant execute query: ' . mysqli_error($mysqli));
    }
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getTasks(mysqli $mysqli, int $projectsId, int $userId)
{
    $sql_sut = "SELECT tasks.id, tasks.user_id, tasks.projects_id, tasks.tname, tasks.tstatus, tasks.due_time, tasks.tdescribe FROM tasks
    LEFT JOIN projects AS p ON (p.id = tasks.projects_id)
    WHERE tasks.projects_id = ? AND tasks.user_id = ?                                                               
    GROUP BY tasks.id";

    $stmt = mysqli_prepare($mysqli, $sql_sut);
    if ($stmt === false) {
        die('Cant prepare query: ' . mysqli_error($mysqli));
    }
    if (!mysqli_stmt_bind_param($stmt, 'ii', $projectsId, $userId)){
        die('Cant bind param' . mysqli_error($mysqli));
    }

    if (!mysqli_stmt_execute($stmt)) {
        die('Cant execute query: ' . mysqli_error($mysqli));
    }
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}


