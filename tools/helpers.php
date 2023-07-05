<?php
//Función renderiza en el VIEW un JSON si el origen NO está vacío
function renderJSON($data){
  if ($data) {
    echo json_encode($data);
  }
}
