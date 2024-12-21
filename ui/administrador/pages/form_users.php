<?php 

echo "<form action='' id='form_editar'>
<input type='hidden' id='id_form' />
<div class='row g-3'>
<div class='col form-floating mb-3'>
    <input type='text' class='form-control' id='nombre_form' placeholder='name@example.com'>
    <label for='nombre_form'>Nombres</label>
</div>
<div class='col form-floating'>
    <input type='text' class='form-control' id='apellido_form' placeholder='Password'>
    <label for='apellido_form'>Apellidos</label>
</div>
</div>
<div class='row g-3'>
<div class='col-8 form-floating mb-3'>
    <input type='email' class='form-control' id='correo_form' placeholder='name@example.com'>
    <label for='correo_form'>Correo electronico</label>
</div>
<div class='col-4 form-floating'>
<select class='form-select' id='estado_form' aria-label='Default select example'>
    <option value='permitido'>Permitido</option>
    <option value='pendiente'>Pendiente</option>
    <option value='denegado'>Denegado</option>
</select>
<label for='estado_form'>Estado</label>
</div>
</div>
<div class='row g-3'>
<div class='col form-floating mb-3'>
    <input type='date' class='form-control' id='fecha_nacimiento_form' placeholder='name@example.com'>
    <label for='fecha_nacimiento_form'>Fecha de nacimiento</label>
</div>
<div class='col-7 form-floating mb-3'>
    <input type='text' class='form-control' id='telefono_form' placeholder='name@example.com'>
    <label for='telefono_form'>Telefono</label>
</div>
</div>
<button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>
<button id='btn_form' type='submit' class='btn btn-primary'></button>
</form>";