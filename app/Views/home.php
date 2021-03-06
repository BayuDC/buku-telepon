<?= $this->extend('layout/default') ?>
<?= $this->section('content') ?>
<div class="uk-container uk-container-xsmall">
    <div class="uk-search uk-search-default uk-width-expand">
        <div class="uk-flex">
            <input id="input-search" value="<?= $keyword ? $keyword : '' ?>" class="uk-search-input" type="search" placeholder="Cari Kontak..." autocomplete="off">
            <a id="btn-search" href="" class="uk-button uk-button-primary">Cari</a>
        </div>
    </div>
    <?= $this->include('layout/alert') ?>
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
                    <td class="uk-visible@m"><?= ($pager->getCurrentPage('contact_group') - 1) * 10 + $index + 1 ?></td>
                    <td><a href="/<?= $contact['id'] ?>" class="uk-text-secondary"><?= $contact['name'] ?></a></td>
                    <td><a href="/<?= $contact['id'] ?>" class="uk-text-secondary"><?= $contact['phone'] ?></a></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <?= $pager->links('contact_group', 'contact_pagination') ?>
</div>
<div class="uk-position-fixed uk-position-bottom-right uk-position-small">
    <a class="uk-button uk-button-primary" href="/new">
        Tambah Kontak
    </a>
</div>
<?= $this->endSection() ?>