<div class="box">
          <div class="box-header">
            <h2><?= $title ?></h2>
          </div>
          <div class="box-body">
            <p class="text-muted">Completá el formulario con un número de serie y el alias para que puedas identificarlo fácilmente.</p>
            <hr>
            <div class="form-group">
              <label>Alias</label>
              <input value="<?=old('alias', $device->device_alias)?>" name="alias" type="text" class="form-control"  data-parsley-id="4"> 
              <span class="text-danger"><?= isset($validation) ? display_error($validation, 'alias') : '' ?></span>                      
            </div>

            <div class="form-group">
              <label>Serie</label>
              <input value="<?=old('serie', $device->device_serie)?>" name="serie" type="text" class="form-control"  data-parsley-id="6">   
              <span class="text-danger"><?= isset($validation) ? display_error($validation, 'serie') : '' ?></span>
            </div>

            <div class="form-group">
        <label for="single">Tipo</label>
        <select class="form-control text-black" name="type">
            <?php foreach($categories as $key): ?>
              <option <?= $device->device_category_id != $key->category_id ?: "selected"?> value="<?=$key->category_id?>"><?= $key->category_name?></option>
            <?php endforeach ?>
        </select>
      </div>
      <div class="dker p-a text-left">
            <button type="submit" class="btn success"><i class="fas fa-save"></i><?= $textButton ?></button>
            <a class="btn btn-blue mx-3" href="<?=$back?>"><i class="fas fa-arrow-circle-left"></i> Volver</a>
          </div>
        </div>
      </form>

