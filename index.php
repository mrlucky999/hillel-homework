<?php

require_once ('helpers.php');

$projects = [
    [
        'id' => 1,
        'name' => 'Проект 1',
        'count' => 2,
    ],
    [
        'id' => 2,
        'name' => 'Проект 2',
        'count' => 5,
    ]
];

$tasks = [
    'backlog' => [
        [
            'id' => 1,
            'title' => 'Задача 1',
            'description' => 'Описание задачи 1',
            'due_date' => ('2023-02-05'),
        ],
        ['id' => 2,
            'title' => 'Задача 2',
            'description' => 'Описание задачи 2',
            'due_date' => ('2023-02-12'),
        ],
    ],
    'todo' => [],
    'in_progress' => [
            ['id' => 3,
            'title' => 'Задача 3',
            'description' => 'Описание задачи 3',
            'due_date' => ('tomorrow'),]
    ],
    'done' => [],
];


function checkfinishtask ($date) {

    $due_date = strtotime($date);
    $current_time = time();
    $difference = $due_date - $current_time;
    $result = floor($difference / (60*60));
    if($result > 24) {
        return true;
    }
    return false;
}

function getHours($date) {
    $value = strtotime($date);
    $current = time();
    $difference = $value - $current;
    return floor($difference / (60*60));

}


$pagename = 'Завдання та проекти | Дошка';

$content = renderTemplate('main.php', [
    'tasks' => $tasks,
]);

$page = renderTemplate('layout.php', [
    'projects' => $projects,
    'content' => $content,
    'title' => $pagename,
]);

print $page;
