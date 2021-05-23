<?= $this->extend('layout/default') ?>
<?= $this->section('content') ?>
<div class="uk-container uk-container-xsmall">
    <?php if ($message) : ?>
        <div class="uk-alert-<?= $success ? 'primary' : 'danger' ?>" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p><?= $message ?></p>
        </div>
    <?php endif ?>
    <table class="uk-table uk-table-divider uk-table-small uk-table-responsive">
        <thead>
            <tr>
                <th class="uk-table-shrink">No</th>
                <th>Nama</th>
                <th>Telepon</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $index => $contact) : ?>
                <tr>
                    <td class="uk-visible@m"><?= $index + 1 ?></td>
                    <td><a href="/contact/<?= $contact['id'] ?>" class="uk-text-secondary"><?= $contact['name'] ?></a></td>
                    <td><a href="/contact/<?= $contact['id'] ?>" class="uk-text-secondary"><?= $contact['phone'] ?></a></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<div class="uk-position-fixed uk-position-bottom-right uk-position-small">
    <a class="uk-button uk-button-primary" href="/new">
        Tambah Kontak
    </a>
</div>
<?= $this->endSection() ?>