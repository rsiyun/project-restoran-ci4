<select name="kategori" id="kategori">
    <?php foreach ($kategoris as $kategori => $value) : ?>
        <option value="<?= $value['idkategori'] ?>"><?= $value['kategori'] ?></option>
    <?php endforeach; ?>
</select>