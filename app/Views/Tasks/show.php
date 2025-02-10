<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>
    <?= $task->title ?>
<?= $this->endSection() ?>


<?= $this->section("content") ?>
    <div class="container">
        <h1 class="mb-4">Task Details</h1>
        <div class="card">
            <div class="card-body">
                <p class="card-text">ID: <?= $task->id ?></p>
                <p class="card-text">Title: <?= esc($task->title) ?></p>
                <p class="card-text">Description: <?= esc($task->description) ?></p>
                <p class="card-text">Created At: <?= esc($task->created_at) ?></p>
                <hr>
                <a href="<?= site_url("/tasks/edit/" . $task->id) ?>" class="btn btn-primary">Edit</a>
                <a onclick="return confirmDelete()" href="<?= site_url("/tasks/delete/" . $task->id) ?>" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete() {
            return confirm("Вы действительно хотите удалить задачу?");
        }
    </script>
<?= $this->endSection() ?>
