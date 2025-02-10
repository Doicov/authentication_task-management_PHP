<?= $this->extend("layouts/default") ?>

<?= $this->section("content") ?>

<div class="container">
    <h1 class="mb-4">Авторизация</h1>

    <?php if(session()->has('errors')): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach (session('errors') as $item): ?>
                    <li><?= $item ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?= form_open('/login/store', ['class' => 'row g-3']) ?>
    
    <div class="col-md-6">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="<?= old('email') ?>">
    </div>

    <div class="col-md-6">
        <label for="password" class="form-label">Пароль</label>
        <input type="password" name="password" class="form-control">
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Войти</button>
        <a href="<?= site_url("/") ?>" class="btn btn-secondary">Отмена</a>
    </div>

    <?= form_close() ?>

</div>

<?= $this->endSection() ?>
