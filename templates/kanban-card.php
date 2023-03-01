<div class="card card-info card-outline" data-task-id="1">
                        <div class="card-header">
                            <h5 class="card-title"><?=htmlentities($task['tname'] ?? '');?></h5>
                            <div class="card-tools">
                                <a href="#" class="btn btn-tool btn-link">#3</a>
                                <a href="#" class="btn btn-tool">
                                    <i class="fas fa-pen"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <p>
                                <?=htmlentities($task['tdescribe'] ?? '');?>
                            </p>
                            <?php if (!empty($taTime['due_date'])):?>
                            <small class="badge-<?=getTaskTimeText($taTime['due_date']) > 24 ? 'success' : 'danger';?>"><i class="far fa-clock"></i><?=getTaskTimeText($taTime['due_date'])?> <?php getTaskTimeText($taTime['due_date']);?> </small>
                            <?php endif?>
                        </div>
                    </div>

