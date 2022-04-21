<?php 
function setActive($ruta){
    echo 'entra' ;
    return request()->routeIs($ruta)? 'active' : '' ;
}
?>