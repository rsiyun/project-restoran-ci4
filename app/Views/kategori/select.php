<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php foreach ($kategori as $cat) : ?>
    <h2><?= $cat['kategori'] ?></h2>
<?php endforeach; ?>
<h1><?= $kategori[3]['kategori'] ?></h1>
<?= $this->endSection(); ?>