<?= $this->extend("layouts/default") ?>

<?= $this->section("content") ?>


    <div class="container">
    <br>
        <h1><?= esc($title) ?></h1>
        <br>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="talbe-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= esc($user->id) ?></td>
                                <td><a href="<?= site_url('/users/' . $user->id) ?>"><?= esc($user->name) ?></td>
                                <td><?= esc($user->email) ?></td>
                                <td><?= esc($user->status) ?></td>
                                <td><?= esc($user->created_at) ?></td>
                                <td>
                                    <a href="<?= site_url("/users/edit/" . $user->id) ?>" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm" onclick="showDeleteModal('<?= $user->id ?>')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
    </div> 

    <!--модальное окно -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this user?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="#" id="deleteUserLink" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showDeleteModal(userID) {
            const deleteUserLink = document.getElementById('deleteUserLink');
            deleteUserLink.href = '<?= site_url("/users/delete/") ?>' + userId;

            const deleteModal = document.getElementById('deleteModal');
            const modalBackdrop = document.querySelector('.modal-backdrop');

            deleteModal.classList.add('show');
            modalBackdrop.classList.add('show');

            deleteModal.style.display = 'block';
            modalBackdrop.style.display = 'block';

            const closeModalButtons = document.querySelectorAll('[data-bs-dismiss="modal"]');
            closeModalButtons.forEach(button => {
                button.addEventListener('click', () => {
                    deleteModal.classList.remove('show');
                    modalBackdrop.classList.remove('show');

                    deleteModal.style.display = 'none';
                    modalBackdrop.style.display = 'none';
                });
            });
        }
        </script>
<?= $this->endSection() ?>
