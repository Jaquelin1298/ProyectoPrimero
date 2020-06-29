<?php include "connection.php"; ?>
<?php $id=$_GET["id"];?>
  <?php 
  $curso = get_curso($_GET["id"]);
  $curso_archivos = get_curso_archivo($_GET["id"]);

    ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Modificar datos</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form method="post" action="./modificarCurso.php">
<input type="hidden" name="id" value="<?php echo $curso->id; ?>">

  <div class="form-group">
    <label for="title">Titulo</label>
    <input type="text" id="titulo" class="form-control" value="<?php echo $curso->titulo; ?>" name="titulo" >
  </div>
   <div class="form-group">
    <label for="title">Maquina</label>
    <input type="text" id="maquina" class="form-control" value="<?php echo $curso->maquina; ?>" name="maquina" >
  </div>
   <div class="form-group">
    <label for="title">Modelo</label>
    <input type="text" id="modelo" class="form-control" value="<?php echo $curso->modelo; ?>" name="modelo" >
  </div>
   <div class="form-group">
    <label for="title">Marca</label>
    <input type="text" id="marca" class="form-control" value="<?php echo $curso->marca; ?>" name="marca" >
  </div>
  <div class="form-group">
    <label for="observacion">observaciones</label>
    <textarea class="form-control" name="observacion" id="observacion" ><?php echo $curso->observacion; ?></textarea>
  </div>
   <div class="form-group">
    <input type="hidden" id="estado" class="form-control" value="<?php echo $curso->estado; ?>" name="estado" >
  </div>





  <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>