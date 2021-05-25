<?= $this->extend('layout/default') ?>
<?= $this->section('content') ?>
<div class="uk-container uk-container-xsmall">
    <?= $this->include('layout/alert') ?>
    <div class="uk-card uk-card-default">
        <form action="/update" method="post" enctype="multipart/form-data" class="uk-form-horizontal">
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
                <div class="uk-margin">
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
                <div>
                    <label class="uk-form-label" for="picture">Foto</label>
                    <div class="uk-form-controls uk-flex uk-flex-column flex-row-s">
                        <div class="uk-flex uk-width-expand  <?= $contact['picture'] ? 'uk-margin-bottom margin-right-s' : '' ?> flex-column-s">
                            <div class="uk-width" uk-form-custom="target: true">
                                <input type="file" name="picture" id="picture">
                                <input class="uk-input" type="text" placeholder="Foto..." disabled>
                            </div>
                            <div class="uk-flex uk-flex-right <?= $contact['picture'] ? '' : 'uk-hidden' ?> margin-top-s">
                                <button type="button" class="uk-button uk-button-danger" id="btn-reset-img">Buang</button>
                            </div>
                        </div>
                        <div class="uk-margin-auto img-medium-parent">
                            <img src="<?= $contact['picture'] ? '/img/' . $contact['picture'] : '' ?>" alt="" class="<?= $contact['picture'] ? '' : 'uk-hidden' ?>" id="img-preview">
                        </div>
                    </div>
                    <div class="uk-form-controls" id="alert-picture">
                        <input type="hidden" name="picture_old" value="<?= $contact['picture'] ?>" class="<?= $validation->hasError('picture') ? 'uk-form-danger' : '' ?> uk-input">
                        <div class="uk-alert-danger uk-margin-remove" uk-alert>
                            <p class="uk-text-small">
                                <?= $validation->getError('picture') ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="uk-card-footer uk-padding-small">
                <div class="uk-flex uk-flex-column flex-row-s">
                    <button type="submit" class="uk-button uk-button-primary">Simpan</button>
                    <a href="/<?= $contact['id'] ?>" class="uk-button uk-button-danger uk-flex-first@s uk-margin-auto-right@s">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>