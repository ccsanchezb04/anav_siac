<div class="form-group">                                            
    <div class="col-sm-offset-2 col-sm-8">
        <select class="form-control grupo" id="asig_idgrupo" name="asig_idgrupo" required="required">
            <option value="">SELECCIONE UN GRUPO</option>
            <?php foreach ($group as $g): ?>
            <option value="<?php echo $g->grupo_id; ?>"><?php echo $g->grupo_nombre." - ".$g->grupo_codigo; ?></option>
            <?php endforeach ?>
        </select>
        <div class="help-block with-errors"></div>
    </div>
</div>                                        
<div class="form-group">                                            
    <div class="col-sm-offset-2 col-sm-8">
        <select class="form-control grupo" id="asig_idmate" name="asig_idmate" required="required">
            <option value="">SELECCIONE UNA MATERIA</option>
            <?php foreach ($subj as $m): ?>
            <option value="<?php echo $m->mate_id; ?>"><?php echo $m->mate_nombre; ?></option>
            <?php endforeach ?>
        </select>
        <div class="help-block with-errors"></div>
        <div id="menssage">

        </div>
    </div>
</div> 