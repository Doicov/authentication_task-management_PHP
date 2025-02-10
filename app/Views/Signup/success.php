<?= $this->extend("layouts/default") ?>

<?= $this->section("content") ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
        <h3> Вы успешно зарегестрировались</h3>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Информация о регистрации</h5>
                    <p class="card-text">Поздравляем! Вы успешно прошли регистрацию на нашем сайте.</p>
                    <p class="card-text">Теперь вы можете войти в свою учетную запись и начать использовать все возможности сайта</p>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="<?= site_url("/login/login-form") ?>" class="btn btn-primary">Войти</a>
                <a href="<?= site_url("/") ?>" class="btn btn-secondary">На главную</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
