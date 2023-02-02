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
            'due_date' => '2023-02-05',
        ],
        ['id' => 2,
            'title' => 'Задача 2',
            'description' => 'Описание задачи 2',
            'due_date' => '2023-02-10',
        ],
    ],
    'todo' => [],
    'in_progress' => [
            ['id' => 3,
            'title' => 'Задача 3',
            'description' => 'Описание задачи 3',
            'due_date' => '2023-02-15',]
    ],
    'done' => [],
];

$backlogcards = renderTemplate('kanban-card.php', [
    'description' => 'First desc<script>alert(1);</script>',
]);

$content= renderTemplate('main.php', [
    'backlogcards' => $backlogcards.$backlogcards,
    'tasks' => $tasks,
]);

$page = renderTemplate('layout.php', [
    'projects' => $projects,
    'content' => $content,
]);

print $page;
