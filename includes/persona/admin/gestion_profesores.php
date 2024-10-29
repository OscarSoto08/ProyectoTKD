<?php require 'admin_header.php';?>


<body>

  <div class="container">

    <!-- Filter Toolbar -->
    
      <div class="add" class="input-group "> 
        <button id="btnNuevo" class="d-flex gap-1" data-bs-toggle="modal" data-bs-target="#modalCRUD" >Nuevo Profesor<svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" fill="#FFFFFF"><path d="M520-400h80v-120h120v-80H600v-120h-80v120H400v80h120v120ZM320-240q-33 0-56.5-23.5T240-320v-480q0-33 23.5-56.5T320-880h480q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H320Zm0-80h480v-480H320v480ZM160-80q-33 0-56.5-23.5T80-160v-560h80v560h560v80H160Zm160-720v480-480Z"/></svg>
        </button>
      </div>
    <table id="tablaProfesores" class="table-responsive"> 
        <thead> 
          <tr> 
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Fecha nacimiento</th>
            <th>Estado</th>
            <th>Telefono</th>
            <th>Acciones</th>
          </tr>
        <thead>
        <tbody>

        </tbody>
      </table>
  </div>
<!-- Modal -->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Nuevo Profesor</h5>
              <button type="button" style="color: black; border: none;" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
              </button>
          </div>
      <form id="formUsuarios">    
          <div class="modal-body">
              <div class="row">
                  <div class="col-lg-6">
                  <div class="form-group">
                  <label for="nombre" class="col-form-label">Nombre</label>
                  <input type="text" class="form-control" id="nombre">
                  </div>
                  </div>
                  <div class="col-lg-6">
                  <div class="form-group">
                  <label for="apellido" class="col-form-label">Apellido</label>
                  <input type="text" class="form-control" id="apellido" aria-describedby="passHelp">
                  </div> 
                  </div>    
              </div>
              <div class="row"> 
                  <div class="col-lg-6">
                  <div class="form-group">
                  <label for="correo" class="col-form-label">Dirección de correo</label>
                  <input type="email" class="form-control" id="correo">
                  </div>               
                  </div>
                  <div class="col-lg-6">
                  <div class="form-group">
                  <label for="clave" class="col-form-label">Contraseña</label>
                  <input type="text" class="form-control" id="clave" aria-describedby="passHelp">
                  <div id="passHelp" class="form-text text-center">Por motivos de seguridad, la clave que ingreses será encriptada</div>
                  </div>
                  </div>  
              </div>
              <div class="row">
                  <div class="col-lg-6">
                      <div class="form-group">
                      <label for="telefono" class="col-form-label">Telefono</label>
                      <input type="text" class="form-control" id="telefono" aria-describedby="helpTel">
                      <div class="form-text" id="telHelp">No es obligatorio</div>
                      </div>
                  </div>    
                  <div class="col-lg-3">    
                      <div class="form-group">
                      <label for="estado" class="col-form-label">Estado</label>
                      <select name="estado" id="estado" aria-label="Estado actual del profesor">
                        <option value="1" selected>Activo</option>
                        <option value="2">Inactivo</option>
                      </select>
                    </div>            
                  </div> 
                  <div class="col-lg-3">    
                    <div class="form-group">
                    <label for="fechaNac" class="col-form-label">Fecha Nac.</label>
                    <input type="date" class="form-control" id="fechaNac" name="fechaNac">
                    </div>            
                </div>   
              </div>                
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
          </div>
      </form>    
      </div>
  </div>
</div>  
    
    
</body>
</html>
