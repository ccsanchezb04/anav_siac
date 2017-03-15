<div class="modal fade bs-example-modal-lg" id="search_users" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Busqueda de usuario(s)</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" role="form" method="post">
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <input type="text" class="form-control" placeholder="Ingrese datos de busqueda" name="busquedaDato" id="busquedaDato">
                    </div>
                </div>               
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-4">
                        <button class="btn btn-block btn-primary" id="searchUsers">Buscar</button>
                    </div>
                </div>
            </form>
            <div class="divider"></div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div id="info_content"></div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
        <div class="modal-footer">
            <p class="text-primary">SIAC - Sistema Academico ANAV Derechos reservados.</p>
            <div class="mensaje"></div>
        </div>
    </div>
  </div>
</div>
<div class="modal fade bs-example-modal-lg" id="search_student" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Busqueda de estudiante(s)</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" role="form" method="post">
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <input type="text" class="form-control" placeholder="Ingrese datos de busqueda" name="busquedaDatoEst" id="busquedaDatoEst">
                    </div>
                </div>               
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-4">
                        <button class="btn btn-block btn-primary" id="searchStudents">Buscar</button>
                    </div>
                </div>
            </form>
            <div class="divider"></div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div id="info_content"></div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
        <div class="modal-footer">
            <p class="text-primary">SIAC - Sistema Academico ANAV Derechos reservados.</p>
            <div class="mensaje"></div>
        </div>
    </div>
  </div>
</div>