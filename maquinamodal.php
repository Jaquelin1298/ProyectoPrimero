<?php $idmaquina=$_GET["idmaquina"];?>
<?php 
require "./conecciones.php";
  $consulta = "SELECT * FROM maquinash WHERE idmaquina = '$idmaquina'";
  $fila = mysqli_fetch_array(mysqli_query($conexion,$consulta));

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
              <center><h4>¿Realmente deseas eliminar <?php echo $fila["nombre"];?>?</h4></center>
              <center><label>Ya no lo podrás remediar</label></center>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
              <a href="./eliminarMaquina.php?idmaquina=<?php echo $idmaquina; ?>" class="btn btn-danger">Confirmar</a>
            </div>
        </div>
    </div>
</div>
