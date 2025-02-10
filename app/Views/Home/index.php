<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>
    Home page
<?= $this->endSection() ?>


<?= $this->section("content") ?>

<?php if(session()->has('success')): ?>

    <div class="alert alert-info">
        <p><?= session('success') ?></p>
    </div>

<?php endif; ?>

    <div class="container">
        <h1 class="mb-4">Home page</h1>
        <hr>
        <a href="<?= site_url('/signup/new') ?>" class="btn btn-primary">Регистрация</a>
        <a href="<?= site_url('/login/login-form') ?>" class="btn btn-primary">Авторизация</a>
    </div>

<?= $this->endSection() ?>
