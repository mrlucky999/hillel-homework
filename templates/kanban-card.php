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
                            <small class="badge badge-danger"><i class="far fa-clock"></i> 2 mins</small>
                        </div>
                    </div>
