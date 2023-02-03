<div class="card card-info card-outline" data-task-id="1">
                        <div class="card-header">
                            <h5 class="card-title"><?=htmlentities($task['title'] ?? '');?></h5>
                            <div class="card-tools">
                                <a href="#" class="btn btn-tool btn-link">#3</a>
                                <a href="#" class="btn btn-tool">
                                    <i class="fas fa-pen"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <p>
                                <?=htmlentities($task['description'] ?? '');?>
                            </p>
                            <?php if (!empty($task['due_date'])):?>
                            <small class="badge-<?=getHours($task['due_date']) > 24 ? 'success' : 'danger';?>"><i class="far fa-clock"></i><?=getHours($task['due_date'])?>часов</small>
                            <?php endif?>
                        </div>
                    </div>

