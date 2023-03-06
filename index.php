<?php

require_once('functions/helpers.php');
require_once('functions/functions.php');

$config = [
    'host' => 'ithillel.localhost:8889',
    'user' => 'root',
    'pass' => 'root',
    'db' => 'task_manager_db',
];

$con = getDbCon($config);
$projects = getProjects($con);


$tStatus = [
    'backlog' => [],
    'to-do' => [],
    'in-progress' => [],
    'done' => [],
];

$tasks = getTasks($con);

foreach ($tasks as $task) {
    $status = $task['tstatus'];
    unset($task['tstatus']);
    $tStatus[$status][] = $task;
}


$pageName = 'Завдання та проекти | Дошка';

$content = renderTemplate('main.php', [
    'tasks' => $tStatus,
    'projects' => $projects,
]);

$page = renderTemplate('layout.php', [
    'projects' => $projects,
    'content' => $content,
    'title' => $pageName,
]);

print $page;
