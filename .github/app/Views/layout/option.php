<select class="custom-select" onchange="this.form.submit()" name="idkategori" id="idkategori">
    <option value="1">Cari..</option>
    <?php foreach ($kategoris as $kategori => $value) : ?>
        <option value="<?= $value['idkategori'] ?>"><?= $value['kategori'] ?></option>
    <?php endforeach; ?>
</select>