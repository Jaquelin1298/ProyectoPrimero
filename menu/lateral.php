<?php
function menulateral($men)
{
  $menu="<div class='col-md-2' style=''>
    <div class='sidebar content-box' style='display: block;'>
            <ul class='nav'>
                

                <li class='submenu'>
                     <a href='#'>
                        <i class='  fas fa-users'></i> Recusos Humanos
                        <span class='caret pull-right'></span>
                     </a>
                     <!-- Sub menu -->
                     <ul>
                        <li><a  href='rhempleados.php'>Empleados</a></li>
                        <li><a href='mecanicos.php'>Mecánicos</a></li>
                        
                        <li><a href='Nomina.php'>Nómina</a></li>
                    </ul>
                </li>
                
                <li class='submenu'>
                    <a href='#'>
                        <i class ='fas fa-tools'></i>Herramientas
                        <span class='caret pull-right'></span>
                    </a>
                    <ul>
                        <li><a href='TodasHerramientas.php'>Herramientas</a></li>
                        <li><a href='MaquinasHerramientas.php'>Máquinas Herramientas</a></li>

                    </ul>
                    
                </li>
            </ul>
         </div>
  </div>";
  return ($menu);
}
 ?>
