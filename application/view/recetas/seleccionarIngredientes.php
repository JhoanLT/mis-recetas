<!-- LISTADO DE INGREDIENTES PARA AGREGAR A UNA RECETA -->
<div class="container contact-form" style="width:100%;">
    <h4 style="margin-bottom: 20px;">Añade los ingredientes para la receta: <?php echo $receta->nombre ?></h4>
    <div class="card-columns">
        <?php foreach($ingredientes as $ingrediente) { ?>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="<?php echo $ingrediente->imagen ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $ingrediente->nombre ?></h5>
                </div>
                <div style="text-align: center; margin-bottom: 10px;">
                    <button name="btnAnadir" onclick="abrirModal(<?php echo $receta->idreceta ?>, <?php echo $ingrediente->idingrediente ?>);">Añadir</button>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group" style="text-align: center; margin-top: 20px;">
                <button class="btnEnviar" name="btnTerminarIngredientes" onclick="regresar();">Terminar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para agregar la cantidad del ingrediente que se va a agregar a la receta -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ingrese la cantidad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="text" class="form-control" placeholder="Cantidad" id="idcantidad">
        <input type="hidden" id="idingrediente" />
        <input type="hidden" id="idreceta"/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="registrarIngrediente();">Guardar</button>
      </div>
    </div>
  </div>
</div>

<script>

    //Función que abre el modal para agregar la cantidad
    function abrirModal(idreceta, idingrediente){
        $("#idcantidad").val("1");
        $("#idreceta").val(idreceta);
        $("#idingrediente").val(idingrediente);
        $("#exampleModal").modal("show");
    }

    //Función encargada de enviar al servidor los datos del ingrediente seleccionado junto con la cantidad
    //para realizar el registro
    function registrarIngrediente(){
        let cantidad = $("#idcantidad").val();
        let idingrediente = $("#idingrediente").val();
        let idreceta = $("#idreceta").val();

        let parametros = {
            idingrediente,
            idreceta,
            cantidad,
        }

        $.ajax({
            type : 'post',
            dataType : 'json',
            url : url + 'recetas/registrarIngredientes',
            data : parametros
        }).done((respuesta) => {
            $("#idcantidad").val("");
            $("#exampleModal").modal("hide");
        });
    }

    //Función que retorna al módulo de recetas
    function regresar(){
        location.href = url + 'recetas';
    }
</script>