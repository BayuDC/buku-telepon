<?= $this->extend('layout/default') ?>
<?= $this->section('content') ?>
<div class="uk-container uk-container-xsmall">
    <div class="uk-card uk-card-default">
        <form action="/update/<?= $contact['id'] ?>" method="post" class="uk-form-horizontal">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="patch">
            <input type="hidden" name="id" value="<?= $contact['id'] ?>">
            <div class="uk-card-body">
                <h3 class="uk-card-title">Edit Kontak</h3>
                <div>
                    <label class="uk-form-label" for="name">Nama</label>
                    <div class="uk-form-controls">
                        <input value="<?= old('name') ? old('name') : $contact['name'] ?>" class="<?= $validation->hasError('name') ? 'uk-form-danger' : '' ?> uk-input" id="name" name="name" type="text" placeholder="Nama..." autocomplete="off">
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
                        <input value="<?= old('phone') ? old('phone') : $contact['phone'] ?>" class="<?= $validation->hasError('phone') ? 'uk-form-danger' : '' ?> uk-input" id="phone" name="phone" type="text" placeholder="No. Telepon..." autocomplete="off" maxlength="15">
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
                        <input value="<?= old('email') === null ? $contact['email'] : old('email') ?>" class="<?= $validation->hasError('email') ? 'uk-form-danger' : '' ?> uk-input" id="email" name="email" type="text" placeholder="Email..." autocomplete="off">
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
                        <input value="<?= old('address') === null ? $contact['address'] : old('address') ?>" class="<?= $validation->hasError('address') ? 'uk-form-danger' : '' ?> uk-input" id="address" name="address"" type=" text" placeholder="Alamat..." autocomplete="off">
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
                    <a href="/contact/<?= $contact['id'] ?>" class="uk-button uk-button-danger uk-flex-first@s uk-margin-auto-right@s">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>