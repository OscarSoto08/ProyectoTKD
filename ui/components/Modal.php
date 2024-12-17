

<?php

"<!-- Modal -->
<div class='modal fade' id='modalCRUD' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog modal-dialog-centered' role='document'>
      <div class='modal-content'>
          <div class='modal-header'>
              <h5 class='modal-title' id='exampleModalLabel'></h5>
              <button type='button' style='color: black; border: none;' class='close' data-bs-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span>
              </button>
          </div>
      <form id='form_usuarios'>    
          <div class='modal-body'>
              <div class='row'>
                  <div class='col-lg-6'>
                  <div class='form-group'>
                  <label for='nombre' class='col-form-label'>Nombre</label>
                  <input type='text' class='form-control' id='nombre'>
                  </div>
                  </div>
                  <div class='col-lg-6'>
                  <div class='form-group'>
                  <label for='apellido' class='col-form-label'>Apellido</label>
                  <input type='text' class='form-control' id='apellido' aria-describedby='passHelp'>
                  </div> 
                  </div>    
              </div>
              <div class='row'> 
                  <div class='col-lg-6'>
                  <div class='form-group'>
                  <label for='correo' class='col-form-label'>Dirección de correo</label>
                  <input type='email' class='form-control' id='correo'>
                  </div>               
                  </div>
                  <div class='col-lg-6'>
                  <div class='form-group'>
                  <label for='clave' class='col-form-label'>Contraseña</label>
                  <input type='password' class='form-control' id='clave' aria-describedby='passHelp'>
                  <div id='passHelp' class='form-text text-center'>Por motivos de seguridad, la clave que ingreses será encriptada</div>
                  </div>
                  </div>  
              </div>
              <div class='row'>
                  <div class='col-lg-6'>
                      <div class='form-group'>
                      <label for='telefono' class='col-form-label'>Telefono</label>
                      <input type='text' class='form-control' id='telefono' aria-describedby='helpTel'>
                      <div class='form-text' id='telHelp'>No es obligatorio</div>
                      </div>
                  </div>    
                  <div class='col-lg-3'>    
                      <div class='form-group'>
                      <label for='estado' class='col-form-label'>Estado</label>
                      <select name='estado' id='estado' aria-label='Estado actual del usuario'>
                          <option value='pendiente' selected>Pendiente</option>
                          <option value='permitido'>Permitido</option>
                          <option value='denegado'>Denegado</option>
                      </select>
                    </div>            
                  </div> 
                  <div class='col-lg-3'>    
                    <div class='form-group'>
                      <label for='fechaNac' class='col-form-label'>Fecha Nac.</label>
                      <input type='date' class='form-control' id='fechaNac' name='fechaNac'>
                    </div>            
                </div>
                <div id='rol-section' class='col-lg-4' style='display:none;'>
                  <div class='form-group'>
                    <label for='rol' class='col-form-label'>Rol</label>
                    <select name='rol' id='rol' aria-label='Validar si es profesor o estudiante en caso de ser usuario temporal'>
                      <option value='estudiante' selected>Estudiante</option>
                      <option value='profesor'>Profesor</option>
                    </select>
                    </div>
                </div>  
                <div id='grado-section' class='col-lg-4' style='display:none;'>
                  <div class='form-group'>
                    <label for='grado' class='col-form-label'>Grado</label>
                    <select name='grado' id='grado' aria-label='Validar si es profesor o estudiante en caso de ser usuario temporal'>
                      
                    </select>
                    </div>
                </div> 
              </div>                
          </div>
          <div class='modal-footer'>
              <button type='button' class='btn btn-light' data-bs-dismiss='modal'>Cancelar</button>
              <button type='submit' id='btnGuardar' class='btn btn-dark'>Guardar</button>
          </div>
      </form>    
      </div>
  </div>
</div>  
";