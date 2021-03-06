<meta name="csrf-token" content="{{ csrf_token() }}" />

<!-- Fila -->
<div class="row">
    <!-- Rut-->
    <div class="col-6">
        <label for="rutTxt">Rut</label>
        <input id="rutTxt" class=" form-control">
        <label class="text-danger" id="errorRut"></label>
    </div>
    <!-- Nombre-->
    <div class="col-6">
        <label for="nombreTxt">Nombre</label>
        <input id="nombreTxt" class=" form-control">
    </div>
</div>
<!-- Fila -->
<div class="row">
    <!-- Apellido paterno-->
    <div class="col-6">
        <label for="apellidoPaternoTxt">Apellido Paterno</label>
        <input id="apellidoPaternoTxt" class=" form-control">
    </div>
    <!-- Apellido materno-->
    <div class="col-6">
        <label for="apellidoPaternoTxt">Apellido Materno</label>
        <input id="apellidoMaternoTxt" class=" form-control">
    </div>
</div>
<!-- Fila -->
<div class="row">
    <!-- Telefono-->
    <div class="col-6">
        <label for="telefonoTxt">Telefono</label>
        <input id="telefonoTxt" class=" form-control">
    </div>
    <!-- Comuna-->
    <div class="col-6">
    <label for="comunaSelect">Comuna</label>
        <select name="" id="comunaSelect" class=" form-control">
            <option value="">Seleccione una opción</option>
            <option value="La florida">La florida</option>
            <option value="Cerrillos">Cerrillos</option>
            <option value="Estación Central">Estación Central</option>
            <option value="Maipú">Maipú</option>
            <option value="Ñuñoa">Ñuñoa</option>
        </select>
    </div>
</div>
<button type="button" class="btn btn-outline-success mt-3" id="button">Guardar</button>
