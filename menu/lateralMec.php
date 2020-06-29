<?php
function menulateral($men)
{
  $menu="<div class='col-md-2'>
    <div class='sidebar content-box' style='display: block;'>
            <ul class='nav'>
                <li class='submenu'>
                     <a href='#'>
                        <i class='  fas fa-edit'></i> Cursos
                        <span class='caret pull-right'></span>
                     </a>
                     <!-- Sub menu -->
                     <ul>
                        <li><a  href='Cursos.php'>Curso</a></li>
                    </ul>
                </li>

            </ul>
         </div>
  </div>";
  return ($menu);
}
 ?>
