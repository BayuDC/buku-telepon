<?php $alert = session()->getFlashData('alert') ?>
<?php if ($alert) : ?>
    <div class="uk-alert-<?= $alert['error'] ? 'danger' : 'primary' ?>" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <p><?= $alert['message'] ?></p>
    </div>
<?php endif ?>