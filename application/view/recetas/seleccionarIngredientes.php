<div class="container contact-form" style="width:100%;">
    <h4>Añade los ingredientes:</h4>
    <div class="card-columns">
        <?php foreach($ingredientes as $ingrediente) { ?>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="<?php echo $ingrediente->imagen ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $ingrediente->nombre ?></h5>
                    <input type="text" class="form-control" id="idNombre" placeholder="Cantidad" name="nombre">
                </div>
                <div style="text-align: center; margin-bottom: 10px;">
                    <button name="btnAnadir"  onclick="registarReceta()">Añadir</button>
                </div>
            </div>
        <?php } ?>
    </div>
</div>