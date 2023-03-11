<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper kanban">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <?php foreach ($projects as $project): ?>
                    <h1><?php  echo 'Назва проекту: ' . $project['pname']; ?></h1>
                    <?php endforeach;?>
                </div>
                <div class="col-sm-6 d-none d-sm-block">
                    <ol class="breadcrumb float-sm-right">
                        <?php foreach ($projects as $project): ?>
                        <li class="breadcrumb-item active"><?php if($project['id'] == 1) {echo 'Назва проекту: ' . $project['pname'];}?></li>
                        <?php endforeach;?>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <div class="row">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <a type="button" href="#" class="btn btn-secondary active">Усі завдання</a>
                            <a type="button" href="#" class="btn btn-default">Порядок денний</a>
                            <a type="button" href="#" class="btn btn-default">Завтра</a>
                            <a type="button" href="#" class="btn btn-default">Прострочені</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content pb-3">
        <div class="container-fluid h-100">
            <div class="card card-row card-secondary">
                <div class="card-header">
                    <h3 class="card-title">
                        Беклог
                    </h3>
                </div>
                <div class="card-body connectedSortable" data-status="backlog">
        <?php foreach ($tasks['backlog'] as $task): ?>
        <?=renderTemplate('kanban-card.php', ['task' => $task]);?>
        <?php endforeach;?>
                </div>
            </div>
            <div class="card card-row card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        Зробити
                    </h3>
                </div>
                <div class="card-body connectedSortable" data-status="to-do">
        <?php foreach ($tasks['to-do'] as $task): ?>
        <?=renderTemplate('kanban-card.php', ['task' => $task]);?>
        <?php endforeach;?>
                </div>
            </div>
            <div class="card card-row card-default">
                <div class="card-header bg-info">
                    <h3 class="card-title">
                        В процесі
                    </h3>
                </div>
                <div class="card-body connectedSortable" data-status="in-progress">
        <?php foreach ($tasks['in-progress'] as $task): ?>
        <?=renderTemplate('kanban-card.php', ['task' => $task]);?>
        <?php endforeach;?>
                </div>
            </div>
            <div class="card card-row card-success">
                <div class="card-header">
                    <h3 class="card-title">
                        Готово
                    </h3>
                </div>
                <div class="card-body connectedSortable" data-status="done">
        <?php foreach ($tasks['done'] as $task): ?>
        <?=renderTemplate('kanban-card.php', ['task' => $task]);?>
        <?php endforeach;?>
                </div>
            </div>
        </div>
    </section>
</div>

<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 0.1.0
    </div>
    <strong>Copyright &copy; 2023 <a href="https://ithillel.ua/">Комп'ютерна школа Hillel</a>.</strong> All rights
    reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- ./wrapper -->