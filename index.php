<?php
error_reporting(0);
require('conexion.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
    integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
    crossorigin="" />
    <link rel="stylesheet" href="stylemap.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="wbootstrap.css">
</head>

<body>




<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Humedal App</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <button type="button" class="btn btn-success" id="btn_add">+</button>
      <button type="button" class="btn btn-warning" id="btn_img_xy">Obtener Coordenadas</button>
          <a class="nav-link dropdown-toggle" id="tools" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Herramientas</a>
          <div class="dropdown-menu" id="tools_op">
            <a class="dropdown-item" href="https://facu52da.users.earthengine.app/view/humedales">Imagenes Satelitales</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a>
          </div>

          <div class="tiposHumedal">
    <button type="radio" onClick="validarTipo(this.id);" id="all">Todos</button>
    <button class="radio" onClick="validarTipo(this.id);" id="Natural">Natural</button>
    <button class="radio" onClick="validarTipo(this.id);" id="Artificial">Artificial</button>
  </div>

        <ul class="navbar-nav ml-auto">
          <form class="form-inline my-2 my-lg-0">
          <input name="search" id="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button>
            <!--<div class="card my col-md-6" id="task-result"  style="height: 45px; width: 98px; display:block; "></div>-->
          </form>
      </div>



</nav>



    

 <div id="myMap" style="height: 600px">
 <div class="info leaflet-control" id="task-result" style="display:block; float:right  position: absolute; left: 989px;"></div>
 </div>
 
 
  <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
   integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
   crossorigin=""></script>
   <script src="js/html2pdf.bundle.min.js"></script>
   <script src="js/export.js" async></script>
   <script src="js/map.js"></script> 
   
  
 

<!---------------Formulario Alta--------------------------->
<div class="modal" role="document" id="form_add" style="background: rgba(0,0,0,0.8);">
<div class="modal-dialog modal-lg" style="">
    <div class="modal-content" id="form_modal">
      <div class="modal-header">
        <h5 class="modal-title" id="t_form">Alta Humedal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close_btn_add">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row p-4">

        <fieldset> <!-- Formulario -->
        <form id="task-form">

        <!-- ID Humedal -->
        <div class="form-group">
         <input type="text" id="ID_humedal" placeholder="ID" class="form-control"> 
         </div>

        <!-- Nombre -->
        <div class="form-group">
         <input type="text" id="nombre" placeholder="Nombre" class="form-control"> 
         </div>

         <!-- cuenca -->
        <div class="form-group">
      <label for="cuenca_label" class="form-label mt-4">Cuenca:</label>
      <select class="form-select" id="sel_cuenca">
      <option>Seleccione Cuenca...</option>
      </select>
      <button type="button" class="btn btn-success" id="btn_cuenca_add">Añadir Nueva Cuenca</button>
      </div>

      <!-- complejo -->
      <div class="form-group">
      <label for="complejo_label" class="form-label mt-4">Complejo:</label>
      <select class="form-select" id="sel_complejo">
      <option>Seleccione Complejo...</option>
      </select>
      <button type="button" class="btn btn-success" id="btn_complejo_add">Añadir Nuevo Complejo</button>
      </div>
      <!--Latiud-->
                <div class="form-group">
                  <input type="text" id="lat" placeholder="Latitud" class="form-control">
                </div>
      <!-- Longitud -->
                <div class="form-group">
                  <input type="text" id="lng" placeholder="Longitud" class="form-control">
                </div>
      <!-- Ancho -->
                <div class="form-group">
                  <input type="text" id="ancho" placeholder="Ancho" class="form-control">
                </div>
      <!-- Largo -->
                <div class="form-group">
                  <input type="text" id="largo" placeholder="Largo" class="form-control">
                </div>
      <!-- Caracteristicas -->
                <div class="form-group">
                  <textarea id="carac" cols="30" rows="10" class="form-control" placeholder="Caracteristicas"></textarea>
                </div>
      <!-- Observaciones -->
      <div class="form-group">
                  <textarea id="obs" cols="30" rows="10" class="form-control" placeholder="Observaciones"></textarea>
                </div>

      <!-- Fuente -->
        <legend class="mt-4">Fuente</legend>
        <div class="form-check">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="optionsFuente" id="fuente_op1" value="Artificial">
           Artificial
        </label>
          
          </div>

        <div class="form-check">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="optionsFuente" id="fuente_op2" value="Natural">
           Natural
        </label>
        </div>
        
        <legend class="mt-4">Tiempo</legend>
        <div class="form-check">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="optionsTiempo" id="tiempo_op1" value="Permanente" checked="">
          Permanente
          </label>
          </div>
        <div class="form-check">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="optionsTiempo" id="tiempo_op2" value="Temporal" checked="">
          Temporal
        </label>
      </div>

  <!-- Diversidad Vegetal -->
        <legend class="mt-4">Diversidad Vegetal</legend>
        <div class="form-check">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="optionsDV" id="dv_op1" value="Conservado" checked="">
          Conservado
          </label>
          </div>

        <div class="form-check">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="optionsDV" id="dv_op2" value="Alterado" checked="">
          Alterado
        </label>
      </div>

      <div class="form-check">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="optionsDV" id="dv_op3" value="Muy Alterado" checked="">
          Muy Alterado
        </label>
      </div>

    <!-- Regimen Hidrologico -->
        <legend class="mt-4">Regimen Hidrologico</legend>
        <div class="form-check">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="optionsReg" id="reg_op1" value="Conservado" checked="">
          Conservado
          </label>
          </div>

        <div class="form-check">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="optionsReg" id="reg_op2" value="Alterado" checked="">
          Alterado
        </label>
      </div>

      <div class="form-check">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="optionsReg" id="reg_op3" value="Muy Alterado" checked="">
          Muy Alterado
        </label>
      </div>

    <!-- Calidad del agua -->
        <legend class="mt-4">Calidad del Agua</legend>
        <div class="form-check">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="optionsAgua" id="agua_op1" value="Conservado" checked="">
          Conservado
          </label>
          </div>

        <div class="form-check">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="optionsAgua" id="agua_op2" value="Alterado" checked="">
          Alterado
        </label>
      </div>

      <div class="form-check">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="optionsAgua" id="agua_op3" value="Muy Alterado" checked="">
          Muy Alterado
        </label>
      </div>

<!-- Presion -->
      <div class="form-group" id="input_presion">
      <button type="button" class="btn btn-success" id="btn_presion_hum">+</button>
      <button type="button" class="btn btn-success" id="btn_presion_add">Añadir Nueva Presion</button>
      <label for="presion_label" class="form-label mt-4">Presión del terreno:</label>

      <div class="from-group"> <!-- Parte que se agrega-->
      <select class="form-select 0" id="sel_presion">
      <option>Tipo de presion...</option>
      <option>Complejo 2</option>
      <option>Complejo 3</option>
      <option>Complejo 4</option>
      <option>Complejo 5</option>
      </select>
      </div>

      
      </div>
<!-- Fauna -->
      <div class="form-group" id="input_fauna">
      <button type="button" class="btn btn-success" id="btn_fauna_hum">+</button>
      <button type="button" class="btn btn-success" id="btn_fauna_add">Añadir Nueva Fauna</button>
      <label for="fauna_label" class="form-label mt-4">Fauna:</label>

      <div class="from-group"> <!-- Parte que se agrega-->
      <select class="form-select 0" id="sel_fauna">
      <option>Seleccione Fauna...</option>
      <option>Complejo 2</option>
      <option>Complejo 3</option>
      <option>Complejo 4</option>
      <option>Complejo 5</option>
      </select>
      </div>

      </div>
<!-- Flora -->
      <div class="form-group" id="input_flora">
      <button type="button" class="btn btn-success" id="btn_flora_hum">+</button>
      <button type="button" class="btn btn-success" id="btn_flora_add">Añadir Nueva Flora</button>
      <label for="flora_label" class="form-label mt-4">Flora:</label>
      <div class="from-group"> <!-- Parte que se agrega-->
      <select class="form-select 0" id="sel_flora">
      <option>Seleccione Flora...</option>
      <option>Complejo 2</option>
      <option>Complejo 3</option>
      <option>Complejo 4</option>
      <option>Complejo 5</option>
      </select>
      </div>


      </div>
      </fieldset> <!--  -->


      <div class="modal-footer">
                <input type="hidden" id="form_alta_id">
                <button type="submit" class="btn btn-primary btn-block text-center">
                  Guardar datos
                </button>
                </form> <!-- Fin del formulario -->
                </div>      
      </div>
   </div>
  </div>
 </div>
</div>

<!------------------------------------------------------------------------->

<!-------------------------Formulario Cuenca------------------------------->
<div class="modal" role="document" id="form_cuenca_add" style="background: rgba(0,0,0,0.8);">
 <div class="modal-dialog modal-lg" style="">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cargar Cuenca</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close_btn_cuenca_add">
          <span aria-hidden="true"></span>
        </button>
      </div>

      <div class="modal-body">
        <div class="row p-4">

        <fieldset> <!-- Formulario -->
        <form id="form-cuenca">

          <!-- ID Cuenca -->
          <div class="form-group">
         <input type="text" id="id_cuenca" placeholder="ID Cuenca" class="form-control"> 
         </div>
        
        <!-- Nombre -->
        <div class="form-group">
         <input type="text" id="nom_cuenca" placeholder="Nombre" class="form-control"> 
         </div>
        <!-- Superficie -->
        <div class="form-group">
         <input type="text" id="sup_cuenca" placeholder="Superficie" class="form-control"> 
        </div>
        <!-- Extensión -->
        <div class="form-group">
         <input type="text" id="ext_cuenca" placeholder="Extensión" class="form-control"> 
        </div>
        <!-- Tipo -->
        <div class="form-group">
         <input type="text" id="tipo_cuenca" placeholder="Tipo de cuenca" class="form-control"> 
        </div>
        </fieldset>
        <div class="modal-footer">
                <input type="hidden" id="form_cuenca_id">
                <button type="submit" class="btn btn-primary btn-block text-center">
                  Guardar datos
                </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!------------------------------------------------------------------------->

<!-------------------------Formulario Complejo------------------------------->
<div class="modal" role="document" id="form_complejo_add" style="background: rgba(0,0,0,0.8);">
 <div class="modal-dialog modal-lg" style="">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cargar Complejo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close_btn_comp_add">
          <span aria-hidden="true"></span>
        </button>
      </div>

      <div class="modal-body">
        <div class="row p-4">

        <fieldset> <!-- Formulario -->
        <form id="form-complejo">

         <!-- ID Complejo -->
         <div class="form-group">
         <input type="text" id="id_complejo" placeholder="ID Complejo" class="form-control"> 
         </div>
        
        <!-- Nombre -->
        <div class="form-group">
         <input type="text" id="nom_comp" placeholder="Nombre" class="form-control"> 
         </div>
        <!-- Superficie -->
        <div class="form-group">
         <input type="text" id="prop_comp" placeholder="Propietario" class="form-control"> 
        </div>
        </fieldset>
        <div class="modal-footer">
                <input type="hidden" id="form_comp_id">
                <button type="submit" class="btn btn-primary btn-block text-center">
                  Guardar datos
                </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!------------------------------------------------------------------------->

<!-------------------------Formulario Presion------------------------------->
<div class="modal" role="document" id="form_presion_add" style="background: rgba(0,0,0,0.8);">
 <div class="modal-dialog modal-lg" style="">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cargar Presión</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close_btn_presion_add">
          <span aria-hidden="true"></span>
        </button>
      </div>

      <div class="modal-body">
        <div class="row p-4">

        <fieldset> <!-- Formulario -->
        <form id="form-presion">
        
        <!-- Tipo Presion -->
        <div class="form-group">
         <input type="text" id="tipo_presion" placeholder="Tipo de Presión" class="form-control"> 
         </div>
         <!-- Observaciones -->
         <div class="form-group">
         <textarea id="obs_presion" cols="30" rows="10" class="form-control" placeholder="Observaciones"></textarea>
         </div>

        </fieldset>
        <div class="modal-footer">
                <input type="hidden" id="form_presion_id">
                <button type="submit" class="btn btn-primary btn-block text-center">
                  Guardar datos
                </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!------------------------------------------------------------------------->

<!-------------------------Formulario Fauna------------------------------->
<div class="modal" role="document" id="form_fauna_add" style="background: rgba(0,0,0,0.8);">
 <div class="modal-dialog modal-lg" style="">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cargar Fauna</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close_btn_fauna_add">
          <span aria-hidden="true"></span>
        </button>
      </div>

      <div class="modal-body">
        <div class="row p-4">

        <fieldset> <!-- Formulario -->
        <form id="form-fauna">
        
        <!-- Nombre coloquial -->
        <div class="form-group">
         <input type="text" id="nom_colquial_fauna" placeholder="Nombre Coloquial" class="form-control"> 
         </div>
        <!-- Nombre cientifico -->
        <div class="form-group">
         <input type="text" id="nom_ctfico_fauna" placeholder="Nombre Cientifico" class="form-control"> 
        </div>
         <!-- Caracteristicas -->
         <div class="form-group">
         <textarea id="carac_fauna" cols="30" rows="10" class="form-control" placeholder="Caracteristicas"></textarea>
         </div>
         <!-- Imagen -->
         <div class="form-group">
      <label for="formFile" class="form-label mt-4">Cargar Imagen</label>
      <input class="form-control" type="file" id="img_fauna">
      </div>
        </fieldset>
        <div class="modal-footer">
                <input type="hidden" id="form_fauna_id">
                <button type="submit" class="btn btn-primary btn-block text-center">
                  Guardar datos
                </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!------------------------------------------------------------------------->
<!-------------------------Formulario Flora------------------------------->
<div class="modal" role="document" id="form_flora_add" style="background: rgba(0,0,0,0.8);">
 <div class="modal-dialog modal-lg" style="">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cargar Flora</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close_btn_flora_add">
          <span aria-hidden="true"></span>
        </button>
      </div>

      <div class="modal-body">
        <div class="row p-4">

        <fieldset> <!-- Formulario -->
        <form id="form-flora">
        
        <!-- Nombre coloquial -->
        <div class="form-group">
         <input type="text" id="nom_colquial_flora" placeholder="Nombre Coloquial" class="form-control"> 
         </div>
        <!-- Nombre cientifico -->
        <div class="form-group">
         <input type="text" id="nom_ctfico_flora" placeholder="Nombre Cientifico" class="form-control"> 
        </div>
         <!-- Caracteristicas -->
         <div class="form-group">
         <textarea id="carac_flora" cols="30" rows="10" class="form-control" placeholder="Caracteristicas"></textarea>
         </div>
         <!-- Imagen -->
         <div class="form-group">
      <label for="formFile" class="form-label mt-4">Cargar Imagen</label>
      <input class="form-control" type="file" id="img_flora">
      </div>
        </fieldset>
        <div class="modal-footer">
                <input type="hidden" id="form_flora_id">
                <button type="submit" class="btn btn-primary btn-block text-center">
                  Guardar datos
                </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!------------------------------------------------------------------------->

<!------------Mensaje Eliminar---------------------------------------------->
<div class="modal" role="document" id="del_hum" style="background: rgba(0,0,0,0.8);">
 <div class="modal-dialog modal-lg" style="">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Eliminar Humedal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close_btn_del_hum">
          <span aria-hidden="true"></span>
        </button>
      </div>

      <div class="modal-body">
        <div class="row p-4">

        <fieldset> <!-- Formulario -->
        <p>¿Desea Eliminar el Humedal seleccionado?</p>
        </fieldset>
        <div class="modal-footer">
                <input type="hidden" id="form_cuenca_id">
                <button type="submit" class="btn btn-primary btn-block text-center" id="delete_h">
                  Eliminar Humedal
                </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!------------------------------------------------------------------------------------>
<!---------------------Formulario Imagen---------------------------------------------->
<div class="modal" role="document" id="form_img_xy" style="background: rgba(0,0,0,0.8);">
 <div class="modal-dialog modal-lg" style="">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cargar Imagen</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close_btn_img_xy">
          <span aria-hidden="true"></span>
        </button>
      </div>

      <div class="modal-body">
        <div class="row p-4">

        <fieldset id="res_img"> <!-- Formulario -->
        <div class="card"  style="width: 18rem;">
        <img class="card-img-top" src="images/default-avatar.png">
        </div>
        <input class="form-control" type="file" id="img_xy">
        </fieldset>
        <div class="modal-footer">
                <input type="hidden" id="form_cuenca_id">
                <button type="submit" class="btn btn-primary btn-block text-center" id="sub_img">
                  Buscar Coordenadas
                </button>
          </form>
        </div>
        
      </div>
    </div>
  </div>
</div>
</div>
<!------------------------------------------------------------------------------------>
 
 <!-- <table id="resultado" class="table"><?php //include('consulta.php');?></div>-->


</body>

</html>
