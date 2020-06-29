<?php $id=$_GET["id"];?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">¿Realmente deseas Eliminar este Link?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <center><label>Ya no lo podrás remediar</label></center>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
              <a href="./eliminarLink.php?id=<?php echo $id; ?>" class="btn btn-primary">Confirmar</a>
            </div>
        </div>
    </div>
</div>
