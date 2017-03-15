<?php $data['seccion'] = 3; ?>  
<div class="row">
        <div class="col-md-3">
            <div class="contenedor-menu">
                <?php $this->load->view('layout/navs', $data); ?>
            </div>
                
        </div>
        <div class="col-md-9">
            <div class="contenedor-principal">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Actualizar Estudiante</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" id="form-add" method="post" data-toggle="validator" role="form">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default" id="col1">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Datos Personales
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <?php foreach ($lstUs as $key): ?>
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="text" class="form-control" id="usua_doc" value="<?php echo $key->usua_doc; ?>" name="usua_doc" placeholder="Documento de Identidad" required="required">
                                                    <div class="help-block with-errors"></div>
                                                    <div id="menssage"></div>
                                                </div>
                                            </div>                                        
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="text" class="form-control" id="usua_pnombre" value="<?php echo $key->usua_pnombre; ?>" name="usua_pnombre" placeholder="Primer Nombre" required="required">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div> 
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="text" class="form-control" id="usua_snombre" value="<?php echo $key->usua_snombre; ?>" name="usua_snombre" placeholder="Segundo Nombre">
                                                </div>
                                            </div>
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="text" class="form-control" id="usua_papellido" value="<?php echo $key->usua_papellido; ?>" name="usua_papellido" placeholder="Primer Apellido" required="required">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>  
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="text" class="form-control" id="usua_sapellido" value="<?php echo $key->usua_sapellido; ?>" name="usua_sapellido" placeholder="Segundo Apellido">
                                                </div>
                                            </div>
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="email" class="form-control" id="usua_email" value="<?php echo $key->usua_email; ?>" name="usua_email" placeholder="Email" required="required">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div> 
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="password" class="form-control" id="usua_password_new" name="usua_password_new" placeholder="Contraseña">
                                                    <input type="hidden" id="usua_password_old" name="usua_password_old" value="<?php echo $key->usua_password; ?>">
                                                    <input type="hidden" name="usua_tipo" id="tipo_usuario" value="<?php echo $key->usua_tipo; ?>">
                                                </div>
                                            </div>                                          
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                Datos Estudiante
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="panel-body">                                            
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="text" class="form-control" id="estu_codigo" value="<?php echo $key->estu_codigo; ?>" name="estu_codigo" placeholder="Código" required="required">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="form-group"> 
                                                <div class="col-sm-offset-2 col-sm-8">                                           
                                                    <input type="text" class="form-control fecha" value="<?php echo $key->estu_fingreso; ?>" name="fingreso" placeholder="Fecha de ingreso" required="required">
                                                    <div class="help-block with-errors"></div>
                                                </div>                                                
                                            </div>
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <select class="form-control" id="estu_idprog" name="estu_idprog" required="required">
                                                    <?php foreach ($prog as $pg): ?>
                                                        <option <?php if ($key->estu_idprog == $pg->prog_id) { echo "selected='selected'"; } ?> value="<?php echo $pg->prog_id; ?>"><?php echo $pg->prog_nombre; ?></option>
                                                    <?php endforeach ?>
                                                    </select>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <select class="form-control" id="estu_idestaacad" name="estu_idestaacad" required="required">
                                                    <?php foreach ($estaacad as $estac): ?>
                                                        <option <?php if ($key->estu_idestaacad == $estac->estaacad_id) { echo "selected='selected'"; } ?> value="<?php echo $estac->estaacad_id; ?>"><?php echo $estac->estaacad_nombre; ?></option>
                                                    <?php endforeach ?>
                                                    </select>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="text" class="form-control" id="estu_tel" value="<?php echo $key->estu_telefono; ?>" name="estu_tel" placeholder="N° de teléfono" required="required">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="text" class="form-control" id="estu_dire" value="<?php echo $key->estu_direccion; ?>" name="estu_direccion" placeholder="Dirección de residencia" required="required">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <select class="form-control" id="estu_genero" name="estu_genero" required="required">                                                    
                                                        <option <?php if ($key->estu_genero == 'M') { echo "selected='selected'"; } ?> value="M">MASCULINO</option>
                                                        <option <?php if ($key->estu_genero == 'F') { echo "selected='selected'"; } ?> value="F">FEMENINO</option>
                                                    </select>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="form-group"> 
                                                <div class="col-sm-offset-2 col-sm-8">                                           
                                                    <input type="text" class="form-control fecha" value="<?php echo $key->estu_fnacimiento; ?>" name="fnacimiento" placeholder="Fecha de nacimiento" required="required">
                                                    <div class="help-block with-errors"></div>
                                                </div>                                                
                                            </div>
                                            <div class="form-group">                                                     
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <select class="form-control" name="estu_rh" id="" required="required">
                                                       <option value="A+" <?php if ($key->estu_rh=="A+") { echo "selected='selected'"; } ?>>A+</option>
                                                        <option value="B+" <?php if ($key->estu_rh=="B+") { echo "selected='selected'"; } ?>>B+</option>
                                                        <option value="AB+" <?php if ($key->estu_rh=="AB+") { echo "selected='selected'"; } ?>>AB+</option>
                                                        <option value="O+" <?php if ($key->estu_rh=="O+") { echo "selected='selected'"; } ?>>O+</option>
                                                        <option value="A-" <?php if ($key->estu_rh=="A-") { echo "selected='selected'"; } ?>>A-</option>
                                                        <option value="B-" <?php if ($key->estu_rh=="B-") { echo "selected='selected'"; } ?>>B-</option>
                                                        <option value="AB-" <?php if ($key->estu_rh=="AB-") { echo "selected='selected'"; } ?>>AB-</option>
                                                        <option value="O-" <?php if ($key->estu_rh=="O-") { echo "selected='selected'"; } ?>>O-</option>
                                                    </select>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <select class="form-control" id="estu_idestado" name="estu_idestado" required="required">
                                                        <option <?php if ($key->estu_idestado == 1) { echo "selected='selected'"; } ?> value="1">Activo</option>
                                                        <option <?php if ($key->estu_idestado == 2) { echo "selected='selected'"; } ?> value="2">Inactivo</option>
                                                    </select>
                                                    <div class="help-block with-errors"></div>
                                                    <input type="hidden" value="<?php echo $key->estu_id; ?>" name="estu_id" id="estu_id">
                                                    <input type="hidden" value="<?php echo $key->estu_idusua; ?>" name="usua_id" id="usua_id">                                                    
                                                    <input type="hidden" name="usua_tipo" id="usua_tipo" value="EST">
                                                </div>
                                            </div>
                                            <?php endforeach ?>
                                            <div class="form-group">                                                
                                                <div class="col-sm-6">
                                                    <a href="<?php echo base_url(); ?>admin/estudiantes_inscritos/" class="btn btn-danger pull-right"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Volver</a>
                                                </div>
                                                <div class="col-sm-6">
                                                    <button type="submit" class="btn btn-primary pull-left"><span class="glyphicon glyphicon-cog"></span>&nbsp;Modificar Usuario</button> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>              
            </div>
        </div>        
    </div>