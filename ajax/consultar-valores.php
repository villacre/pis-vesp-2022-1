
<?php

/* 
 * CONSULTAR INFORMACION DE LA BASE DE DATOS.
 *
 */


/*
//Query que seleciona toda los campos de la base de datos
$sql="SELECT DescripPeriodoLect FROM db_insti.periodolectivo";

//asignamos en una variable los dato del query que se traen del objeto de conexion.
$result= mysqli_query($ObjCn, $sql);

//mediante un ciclo while y una variables presentamos los datos
while ($fila = mysqli_fetch_array($result)){
   
    echo"<option value='".$fila['id']."'>".$fila['DescripPeriodoLect']."</option>";
}
 * 
 */

require_once '../conexion/conexion.php';
require_once 'funcion_consulta.php';

//Querys para cosultar valores en la cabecera index
$queryPL = "select PL.idperiodo_lectivo, PL.descripcion as descpL from tb_periodo_lectivo PL;";
$queryCA = "select TC.idtb_carrera, TC.descripcion as descpC from tb_carrera TC;";
$queryJN = "select TJ.idtb_jornada, TJ.descripcion as descpJ from tb_jornada TJ;";
$queryPA = "select PA.idtb_periodo_academico, PA.descripcion as descpA from tb_periodo_academico PA;';";
$queryPr = "select TP.idtb_paralelo, TP.descripcion as descpP from tb_paralelo TP;";
$queryAS = "select TA.idtb_asignatura, TA.descripcion as descpAsg from tb_asignatura TA;";
$queryPC = "select TPr.idtb_parcial, TPr.descripcion as descpPr from tb_parcial TPr;";
$queryDC = "select TD.idtb_docentes, concat_ws(' ',TD.apellido, TD.nombre ) as docente from tb_docentes TD;";

//Resultados de las sentencias que seleciona toda los campos de la base de datos
$result1 = $obj1 =consulta($queryPL, $ObjCn);
$result2 = $obj2 =consulta($queryJN, $ObjCn);
$result3 = $obj3 =consulta($queryPr, $ObjCn);
$result4 = $obj4 =consulta($queryPC, $ObjCn);
$result5 = $obj5 =consulta($queryCA, $ObjCn);
$result6 = $obj6 =consulta($queryPA, $ObjCn);
$result7 = $obj7 =consulta($queryAS, $ObjCn);
$result8 = $obj8 =consulta($queryDC, $ObjCn);

//asignamos en una variable los dato del query que se traen del objeto de conexion.

//mediante un ciclo while y una variables presentamos los datos

?>

<div class=" col-xl-6 col-md-12 col-sm-12">
    <div class="row justify-content-center align-items-center my-2">
        <div class="col-4 d-inline-block">
            <label class="control-label fw-bolder text-muted fs-5">Periodo Academico</label>
        </div>
        <div id="" class="col-8 d-inline-block" >
            <select id="selectPL" class="form-select">
                <?php
                foreach($result1 as $result){
                ?>
                <option value="<?php echo $result ->idperiodo_lectivo; ?>"> <?php echo $result ->descpL; }?> </option>;
                    

            </select>
        </div>
    </div>
    <div class="row justify-content-center align-items-center my-2">
        <div class="col-4 d-inline-block">
            <label class="control-label fw-bolder text-muted fs-5">Jornada</label>
        </div>
        <div id="" class="col-8 d-inline-block" >
            <select id="selectJN" class="form-select">
                    <?php
                    foreach($result2 as $result){
                    ?>
                    <option value="<?php echo $result ->idtb_jornada; ?>"> <?php echo $result ->descpJ; }?> </option>";
                
            </select>
        </div>
    </div>
    <div class="row justify-content-center align-items-center my-2">
        <div class="col-4 d-inline-block">
            <label class="control-label fw-bolder text-muted fs-5">Paralelo</label>
        </div>
        <div id="" class="col-8 d-inline-block" >
            <select id="selectPr" class="form-select">
                    <?php
                    foreach($result3 as $result){
                    ?>
                    <option value="<?php echo $result ->idtb_paralelo; ?>"> <?php echo $result ->descpP; }?> </option>
                

            </select>
            
        </div>
    </div>
    <div class="row justify-content-center align-items-center my-2">
        <div class="col-4 d-inline-block">
            <label class="control-label fw-bolder text-muted fs-5">Parcial</label>
        </div>
        <div id="" class="col-8 d-inline-block" >
            <select id="selectPc" class="form-select">
                    <?php
                    foreach($result4 as $result){
                    ?>
                    <option value="<?php echo $result ->idtb_parcial; ?>"> <?php echo $result ->descpPr;} ?> </option>
                

            </select>
        </div>
    </div>
</div>

<div class=" col-xl-6 col-md-12 col-sm-12">
    <div class="row justify-content-center align-items-center my-2">
        <div class="col-4 d-inline-block">
            <label class="control-label fw-bolder text-muted fs-5">Carrera</label>
        </div>
        <div id="" class="col-8 d-inline-block" >
            <select id="selectCA" class="form-select">
                    <?php
                    foreach($result5 as $result){
                    ?>
                    <option value="<?php echo $result ->idtb_carrera; ?>"> <?php echo $result ->descpC; }?> </option>
                

            </select>
        </div>
    </div>
    <div class="row justify-content-center align-items-center my-2">
        <div class="col-4 d-inline-block">
            <label class="control-label fw-bolder text-muted fs-5">Periodo/Nivel</label>
        </div>
        <div id="" class="col-8 d-inline-block" >
            <select id="selectPA" class="form-select">
                    <?php
                    foreach($result6 as $result){
                    ?>
                    <option value="<?php echo $result ->idtb_periodo_academico; ?>"> <?php echo $result ->descpA; }?> </option>
                

            </select>
        </div>
    </div>
    <div class="row justify-content-center align-items-center my-2">
        <div class="col-4 d-inline-block">
            <label class="control-label fw-bolder text-muted fs-5">Asignatura</label>
        </div>
        <div id="" class="col-8 d-inline-block" >
            <select id="selectAS" class="form-select">
                    <?php
                    foreach($result7 as $result){
                    ?>
                    <option value="<?php echo $result ->idtb_asignatura; ?>"> <?php echo $result ->descpAsg; }?> </option>
                
            </select>
        </div>
    </div>
    <div class="row justify-content-center align-items-center my-2">
        <div class="col-4 d-inline-block">
            <label class="control-label fw-bolder text-muted fs-5">Docente</label>
        </div>
        <div id="" class="col-8 d-inline-block" >
            <select id="selectDc" class="form-select">
                    <?php
                    foreach($result8 as $result){
                    ?>
                <option value="<?php echo $result ->idtb_docentes; ?>"> <?php echo $result ->docente; }?> </option>
                

            </select>
        </div>
    </div>
</div>
<?php 



