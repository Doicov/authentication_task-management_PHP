<?= $this->extend("layouts/default") ?>

<?= $this->section("content") ?>

<div class="container">
    <h1 class="mb-4">Регистрация пользователя</h1>

    <?php if(session()->has('errors')): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach (session('errors') as $item): ?>
                    <li><?= $item ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?= form_open('signup/store', ['class' => 'row g-3']) ?>
    
    <div class="col-md-6">
        <label for="name" class="form-label">Имя</label>
        <input type="text" name="name" id="name" class="form-control" value="<?= old('name') ?>">
    </div>

    <div class="col-md-6">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="<?= old('email') ?>">
    </div>

    <div class="col-md-6">
        <label for="password" class="form-label">Пароль</label>
        <input type="password" name="password" class="form-control">
    </div>

    <div class="col-md-6">
        <label for="password_confirmation" class="form-label">Повторить пароль</label>
        <input type="password" name="password_confirmation" class="form-control">
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Зарегистрировать</button>
        <a href="<?= site_url("/") ?>" class="btn btn-secondary">Отмена</a>
    </div>

    <?= form_close() ?>

</div>

<?= $this->endSection() ?>
