<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>
    List of tasks
<?= $this->endSection() ?>

<?= $this->section("content") ?>
    <div class="container">
        <h1 class="mb-4">List of tasks</h1>
        <ul class="list-group">
            <?php foreach ($tasks as $task): ?>
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-1">
                                <a href="<?= site_url("/tasks/" . $task->id) ?>" class="text-decoration-none text-dark">
                                    <?= esc($task->title) ?>
                                </a>
                            </h5>
                            <small><?= esc($task->description) ?></small>
                        </div>
                        <div>
                            <small><?= esc($task->created_at) ?></small>
                        </div>
                    </div>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
<?= $this->endSection() ?>
