<?= $this->extend('layout/default') ?>
<?= $this->section('content') ?>
<div class="uk-container uk-container-xsmall">
    <?php if ($flash) : ?>
        <div class="uk-alert-danger" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p><?= $flash['message'] ?></p>
        </div>
    <?php endif ?>
    <div class="uk-card uk-card-default">
        <div class="uk-card-body">
            <h3 class="uk-card-title">Tambah Kontak</h3>
            <form action="/save" method="post" class="uk-form-horizontal">
                <?= csrf_field() ?>
                <div>
                    <label class="uk-form-label" for="name">Nama</label>
                    <div class="uk-form-controls">
                        <input value="<?= old('name') ?>" class="<?= $validation->hasError('name') ? 'uk-form-danger' : '' ?> uk-input" id="name" name="name" type="text" placeholder="Nama..." autocomplete="off">
                        <div class="uk-alert-danger uk-margin-remove" uk-alert>
                            <p class="uk-text-small">
                                <?= $validation->getError('name') ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="phone">No. Telepon</label>
                    <div class="uk-form-controls">
                        <input value="<?= old('phone') ?>" class="<?= $validation->hasError('phone') ? 'uk-form-danger' : '' ?> uk-input" id="phone" name="phone" type="text" placeholder="No. Telepon..." autocomplete="off" maxlength="15">
                        <div class="uk-alert-danger uk-margin-remove" uk-alert>
                            <p class="uk-text-small">
                                <?= $validation->getError('phone') ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="email">Email</label>
                    <div class="uk-form-controls">
                        <input value="<?= old('email') ?>" class="<?= $validation->hasError('email') ? 'uk-form-danger' : '' ?> uk-input" id="email" name="email" type="text" placeholder="Email..." autocomplete="off">
                        <div class="uk-alert-danger uk-margin-remove" uk-alert>
                            <p class="uk-text-small">
                                <?= $validation->getError('email') ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="">
                    <label class="uk-form-label" for="address">Alamat</label>
                    <div class="uk-form-controls">
                        <input value="<?= old('address') ?>" class="<?= $validation->hasError('address') ? 'uk-form-danger' : '' ?> uk-input" id="address" name="address"" type=" text" placeholder="Alamat..." autocomplete="off">
                        <div class="uk-alert-danger uk-margin-remove" uk-alert>
                            <p class="uk-text-small">
                                <?= $validation->getError('address') ?>
                            </p>
                        </div>
                    </div>
                </div>
        </div>
        <div class="uk-card-footer uk-padding-small">
            <div class="uk-flex uk-flex-column flex-row-s">
                <button type="submit" class="uk-button uk-button-primary">Simpan</button>
                <a href="/" class="uk-button uk-button-danger uk-flex-first@s uk-margin-auto-right@s">Batal</a>
            </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>