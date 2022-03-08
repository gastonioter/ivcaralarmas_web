<div class="box">
    <div class="box-header">
        <h2><?= $title ?></h2>
    </div>
    <div class="box-body">
        <p class="text-muted">Completá el formulario.</p>
        <hr>
        <div class="form-group">
            <label>Nuevo Número</label>
            <input value="<?= old('phone', $phone->phone_number) ?>" name="phone" type="text" class="form-control" data-parsley-id="4">
            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'phone') : '' ?></span>
        </div>

        <div class="dker p-a text-left">
            <button type="submit" class="btn success"><i class="fas fa-save"></i><?= $textButton ?></button>
            <a class="btn btn-blue mx-3" href="<?= $back ?>"><i class="fas fa-arrow-circle-left"></i> Volver</a>
        </div>
    </div>


</div>
</form>