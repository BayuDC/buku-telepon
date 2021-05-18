<?= $this->extend('layout/default') ?>
<?= $this->section('content') ?>
<div class="uk-container uk-container-xsmall">
    <div class="uk-card uk-card-default">
        <div class="uk-card-header uk-padding-small">
            <div class="uk-margin-small-top">
                <img src="/img/<?= $contact['picture'] ?>" alt="" class="uk-display-block uk-margin-auto uk-border-circle uk-box-shadow-medium img-medium">
            </div>
            <h3 class="uk-card-title uk-text-center uk-margin-small-top"><?= $contact['name'] ?></h3>
        </div>
        <div class="uk-card-body uk-padding-small">
            <table class="uk-table uk-table-divider uk-table-small uk-table-responsive uk-overflow-auto">
                <tr>
                    <td class="uk-text-emphasis uk-width-small">No. Telepon</td>
                    <td><?= $contact['phone'] ?></td>
                </tr>
                <tr>
                    <td class="uk-text-emphasis">Email</td>
                    <td><?= $contact['email'] ?></td>
                </tr>
                <tr>
                    <td class="uk-text-emphasis">Alamat</td>
                    <td><?= $contact['address'] ?></td>
                </tr>
            </table>
        </div>
        <div class="uk-card-footer uk-padding-small">
            <div class="uk-flex uk-flex-column flex-row-s">
                <a class="uk-button uk-button-primary margin-right-s">Edit</a>
                <a class="uk-button uk-button-danger">Hapus</a>
                <a href="/" class="uk-button uk-button-default uk-flex-first@s uk-margin-auto-right@s">Kembali</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>