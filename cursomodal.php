<?php $id=$_GET["id"];?>

  <?php 
  include "connection.php";
  $curso = get_curso($_GET["id"]);
  $curso_archivos = get_curso_archivo($_GET["id"]);

    ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <center><h4>¿Realmente deseas Eliminar <?php echo $curso->titulo; ?>?</h4></center>
              <center><label>Ya no lo podrás remediar</label></center>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
              <a href="./eliminarCurso.php?id=<?php echo $id; ?>" class="btn btn-danger">Confirmar</a>
            </div>
        </div>
    </div>
</div>
