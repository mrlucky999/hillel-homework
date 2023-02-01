<?php

require_once ('helpers.php');

$backlogcards = renderTemplate('kanban-card.php', [
    'description' => 'First desc<script>alert(1);</script>',
]);
$content= renderTemplate('main.php', [
    'backlogcards' => $backlogcards,
]);

require_once ('templates/layout.php');
