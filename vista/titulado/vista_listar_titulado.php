

<div class="col-md-4">
    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">REGISTRAR TITULADOS</h3>
            <div class="box-tools pull right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div>

        <div class="box-body">
            <div class="form-group">
                <input type="text"  id="idAula" hidden>
                <div class="col-lg-12">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" id="aulaAula" placeholder="Ingrese nombre"><br>
                </div>
                <div class="col-lg-12">
                    <label for="">Piso</label>
                    <input type="number" class="form-control" id="piso" placeholder="Ingrese numero"><br>
                </div>
                <div class="col-lg-12">
                    <label for="">N&uacute;mero</label>
                    <input type="number" class="form-control" id="numero" placeholder="N°"><br>
                </div>
                <div class="col-lg-12">
                    <label for="">Aforro</label>
                    <input type="number" class="form-control" id="aforro" placeholder="Ingrese número"><br>
                </div>
                <div class="col-lg-12">
                    <label for="">Secci&oacute;n</label>
                    <select class="js-example-basic-single" name="state" id="seccion" style="width:100%;">
                        <option value="">--selecione secci&oacute;n--</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                    </select><br><br>
                </div>

                <div class="col-lg-12">
                    <label for="">Secci&oacute;n</label>
                    <select class="js-example-basic-single" name="state" id="seccion" style="width:100%;">
                        <option value="">--selecione secci&oacute;n--</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                    </select><br><br>
                </div>

                <div class="col-lg-12">
                    <label for="">Estado</label>
                    <select class="js-example-basic-single" name="state" id="estado" style="width:100%;">
                        <option value="">--seleccione estado--</option>
                        <option value="LIBRE">LIBRE</option>
                        <option value="OCUPADO">OCUPADO</option>
                    </select><br><br>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" onclick="registarAula()"><i class="fa fa-check"><b>Registrar</b></i></button>
                    <button type="button" class="btn btn-danger" onclick="linpiarregistroAula()"><i class="fa fa-close"><b>Cancelar</b></i></button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-8">
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">LISTA DE TITULADOS</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <div clas="col-lg-10">
                    <div class="input-group">
                        <input type="text" class="global_filter form-control" id="global_filter" placeholder="Ingresar dato a buscar">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
            <table id="tabla_titulados" class="display responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Especialidad</th>
                    <th>Universidad</th>
                    <th>Año</th>
                    <th>Articulo</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </tfoot>
            </table>
        </div>
    </div>
</div>




