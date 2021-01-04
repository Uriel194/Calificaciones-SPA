
<?php
  error_reporting(0);
  $calumnos = $_GET['alumnos'];
  $cmateria = $_GET['materia'];
  $cgrupo = $_GET['grupo'];
  $totalasis = $_GET['tasistencia'];
  $periodos = $_GET['periodo'];
  $op1periodo = "";
  $op2periodo = "";
  $op3periodo = "";
  $funcionCalcular = "";
  $funcionGuardar = "";
  if($calumnos ==""){
?>
  <script>
    location.assign("http://localhost/Compiladores/?materia=&grupo=&alumnos=1&tasistencia=&periodo=");
  </script>
<?php
  }
  if($periodos == "p1"){
    $op1periodo = "";
    $op2periodo = "disabled";
    $op3periodo = "disabled";
    $funcionCalcular = "calResultadop1();";
    $funcionGuardar = "saveFilep1()";
  }else if($periodos == "p2"){
    $op1periodo = "disabled";
    $op2periodo = "";
    $op3periodo = "disabled";
    $funcionCalcular = "calResultadop2();";
    $funcionGuardar = "saveFilep2()";
  }else if($periodos == "p3"){
    $op1periodo = "disabled";
    $op2periodo = "disabled";
    $op3periodo = "";
    $periodos = "p3";
    $funcionCalcular = "calResultadop3();";
    $funcionGuardar = "saveFilep3()";
  }else if($periodos == "all"){
    $op1periodo = "";
    $op2periodo = "";
    $op3periodo = ""; 
    $funcionCalcular = "calResultado();";
    $funcionGuardar = "saveFile()";
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acreditación Semestral - Compiladores</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/table.min.css">
    <link rel="shortcut icon" href="img/icono.png" type="image/x-icon">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">
        <img src="img/icono-negro.png" id="img-icono">
    </a>
    <h3 class="text-light">Acreditación Semestral</h3>
    <button class="navbar-toggler menu" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav mr-auto">
      </ul>
    </div>
  </nav>
  <div class="datos">
    <form class="form-inline" method="get" target="_self">
      <div class="form-group mx-sm-3 mb-2">
        <input type="text" class="form-control solo-numeros" placeholder="GRUPO" maxlength="3" min="1" name="grupo" required>
      </div>
      <div class="form-group mx-sm-3 mb-2">
        <input type="text" class="form-control solo-numeros" placeholder="TOTAL ALUMNOS" maxlength="2" min="1" name="alumnos" required>
      </div>
      <div class="form-group mx-sm-3 mb-2">
        <input type="text" class="form-control letras" placeholder="ASIGNATURA" maxlength="50" min="1" name="materia" required>
      </div>
      <div class="form-group mx-sm-3 mb-2">
        <input type="text" class="form-control solo-numeros" placeholder="TOTAL CLASES" maxlength="2" min="1" name="tasistencia" required>
      </div>
      <div class="form-group mx-sm-3 mb-2">
        <select name="periodo" id="periodo" class="form-control" required>
          <option value="">Selecciona</option>
          <option value="p1">periodo 1</option>
          <option value="p2">periodo 2</option>
          <option value="p3">periodo 3</option>
          <option value="all">Todos</option>
        </select>
      </div>
      <div class="form-group mx-sm-3 mb-2">
        <button class="btn btn-primary" type="submit">Crear</button>
      </div>
    </form>
  </div>
<center>
<div class="tabla">
  <br>
  <br>

  <?php
    echo "
    <div class='container'>
    <div class='row justify-content-md-center'>
      <div class='col col-lg-2'>
        <button type='button' class='btn btn-primary'>
          Grupo <span class='badge badge-light'> ",$cgrupo," </span>
        </button>
      </div>
      <div class='col-md-auto'>
        <button type='button' class='btn btn-primary'>
          Alumnos <span class='badge badge-light' id='cantidad'> ",$calumnos," </span>
        </button>
      </div>
      <div class='col col-lg-2'>
        <button type='button' class='btn btn-primary'>
          Materia <span class='badge badge-light'> ",$cmateria," </span>
        </button>
      </div>
      <div class='col col-lg-2'>
        <button type='button' class='btn btn-primary'>
          Clases <span class='badge badge-light'> ",$totalasis," </span>
        </button>
      </div>
      <div class='col col-lg-2'>
        <button type='button' class='btn btn-primary' onclick='",$funcionCalcular,"'>
          Validar
        </button>
      </div>
    </div>
  </div>
    ";
  ?>
  <br>
  <table class="ui blue table-hover table table-blue">
  <thead>
    <tr>
    <th>#</th>
    <th>NO CONTROL</th>
    <th>NOMBRE</th>
    <th>
      <center>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PERIODOS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <table class="ui celled structured table">
        <tr>
          <td>1</td>
          <td>2</td>
          <td>3</td>
        </tr>
      </table>
      </center>
    </th>
    <th>
      <center>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ASISTENCIAS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <table class="ui celled structured table">
        <tr>
          <td>1</td>
          <td>2</td>
          <td>3</td>
        </tr>
      </table>
      </center>
    </th>
    <th>
      <center>
        TOTALES
      <table class="ui celled structured table">
        <tr>
          <td>Promedio</td>
          <td>Asistencias</td>
        </tr>
      </table>
      </center>
    </th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;T.A.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th>FIRMADO</th>
  </tr>
  </thead>
  <tbody>
    <?php
      if($calumnos!=0){
      for($i=1; $i <=$calumnos; $i++) { 
    ?>
    <tr>
      <td>
        <?php
          echo "<p name ='nolista".$i."'>",$i,"</p>";
          
        ?>
      </td>
      <td>
        <div class="row">
          <div class="col">
            <input class="form-control nombre solo-numero" type="text" name="" required>
          </div>
        </div> 
      </td>
      <td>
        <div class="row">
          <div class="col">
             <?php
                echo "<input class='form-control nombre letras' id='nombre".$i."' type='text' name='nombre".$i."' required>";
              ?>
          </div>
        </div>  
      </td>
      <td>
        <center>
        <table class="ui celled structured table">
          <tr>
            <!---->
            <div class="row">
              <div class="col">
                <?php //style='visibility: ",$op1periodo,";'
                  echo "<input class='nolista form-control solo-numero' id='periodo1".$i."' type='text' name='periodo1".$i."' required maxlength='3' ",$op1periodo,">";
                ?>
              </div>
              <div class="col">
                <?php
                  echo "<input class='nolista form-control solo-numero' id='periodo2".$i."' type='text' name='periodo2".$i."' required maxlength='3' ",$op2periodo,">";
                ?>
              </div>
              <div class="col">
                <?php
                  echo "<input class='nolista form-control solo-numero' id='periodo3".$i."' type='text' name='periodo3".$i."' required maxlength='3' ",$op3periodo,">";
                ?>
              </div>
            </div>
            <!---->
          </tr>
        </table>
        </center>
      </td>
      <td>
        <center>
        <table class="ui celled structured table">
          <tr>
            <!---->
            <div class="row">
              <div class="col">
                <?php
                  echo "<input class='form-control solo-numero' id='asistencia1".$i."' type='text' name='asistencia1".$i."' required maxlength='3' ",$op1periodo,">";
                ?>
              </div>
              <div class="col">
                <?php
                  echo "<input class='form-control solo-numero' id='asistencia2".$i."' type='text' name='asistencia2".$i."' required maxlength='3' ",$op2periodo,">";
                ?>
              </div>
              <div class="col">
                <?php
                  echo "<input class='form-control solo-numero' id='asistencia3".$i."' type='text' name='asistencia3".$i."' required maxlength='3' ",$op3periodo,">";
                ?>
              </div>
            </div>
            <!---->
          </tr>
        </table>
        </center>
      </td>
      <td>
        <center>
        <table class="ui celled structured table">
          <tr>
            <!---->
            <div class="row">
              <div class="col">
                <?php
                  echo "<input class='form-control solo-numero' id='promedio".$i."' type='text' name='promedio".$i."' required maxlength='3'>";
                ?>
              </div>
              <div class="col">
                <?php
                  echo "<input class='form-control solo-numero' id='asistencia".$i."' type='text' name='asistencia".$i."' required maxlength='2'>";
                ?>
              </div>
            </div>
            <!---->
          </tr>
        </table>
        </center>
      </td>
      <td>
        <center>
          <table class="ui celled structured table">
            <tr>
              <!---->
            <div class="row">
              <div class="col">
                <?php
                  echo "<input class='form-control letras' id='ta".$i."' type='text' name='ta".$i."' required maxlength='2'>";
                ?>
              </div>
            </div>
            <!---->
            </tr>
          </table>
        </center>
      </td>
      <td>
        <center>
          <br>
          <input class="form-check-input" type="checkbox" id="gridCheck">
        </center>
      </td>
    </tr>
    <?php
      }}else{
        echo "0";
      }
    ?>
  </tbody>
</table>
<br>
<div class="alert alert-success" role="alert">
  T.A. = Tipo de acreditación 
  <br>
  A: Acreditado 
  <br>
  NA: No acreditado
  <br>
</div>
  <button class="btn btn-primary" type="button" onclick="<?php echo $funcionGuardar; ?>">Guardar </button>
<br>
<br>
</div>
<div class="alerta">
  <div class="alert alert-danger" role="alert">
    <img src="img/alerta.png">
    <br>
    El sistema solo se puede administrar en Sistemas Operativos PC
  </div>
</div>
</center>
    <script src="js/popper.min.js"></script>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.numeric.js" type="text/javascript"></script>
    <script src="js/alasql.min.js"></script>
    <script src="js/xlsx.core.min.js"></script>
      <script>
      if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        window.alert("La resolucion del dispositivo no es compatible con el sistema.");
      }
      //Validar solo numeros
      $(document).ready(function(){ 
    	$('.solo-numero').numeric();
      });
      //Validar solo letras
      $(".letras").keypress(function (key) {
            window.console.log(key.charCode)
            if ((key.charCode < 97 || key.charCode > 122)//letras mayusculas
                && (key.charCode < 65 || key.charCode > 90) //letras minusculas
                && (key.charCode != 241) //ñ
                && (key.charCode != 209) //Ñ
                && (key.charCode != 32) //espacio
                && (key.charCode != 225) //á
                && (key.charCode != 233) //é
                && (key.charCode != 237) //í
                && (key.charCode != 243) //ó
                && (key.charCode != 250) //ú
                && (key.charCode != 193) //Á
                && (key.charCode != 201) //É
                && (key.charCode != 205) //Í
                && (key.charCode != 211) //Ó
                && (key.charCode != 218) //Ú
 
                )
                return false;
        });
        //variables publicas
        var cuantos = '<?php echo $calumnos; ?>';
        var tc = '<?php echo $totalasis; ?>';
        //arreglos para guardar id de periodos
        var peri1 = [cuantos];
        var peri2 = [cuantos];
        var peri3 = [cuantos];
        //arreglo para guardar id de promedios
        var prome = [cuantos];
        //areglo para calificaciones por periodo
        var valorperi1 = [cuantos];
        var valorperi2 = [cuantos];
        var valorperi3 = [cuantos];
        //arreglo para guardar resultado de pomedio
        var respromedio = [cuantos]; 
        //++++++++++++++++++++++++++++++++++++++++++++++++++//
        //++++++++++++++++++++++++++++++++++++++++++++++++++//
        //++++++++++++++++++++++++++++++++++++++++++++++++++//
        //arreglo para guardar id de asistencias por periodo
        var asis1 = [cuantos];
        var asis2 = [cuantos];
        var asis3 = [cuantos];
        //arreglo para guardar id de total de asistencias
        var asisten = [cuantos];
        //arreglo para guardar asitencias por periodo
        var valorasis1 = [cuantos]; 
        var valorasis2 = [cuantos]; 
        var valorasis3 = [cuantos]; 
        //arreglo para guardar resultado de asistencias
        var resasistencia = [cuantos];
        //arreglo para guardar id de los nombres
        var idnom = [cuantos];
        //areglo para guardar nombres
        var nombres = [cuantos];
         //++++++++++++++++++++++++++++++++++++++++++++++++++//
        //++++++++++++++++++++++++++++++++++++++++++++++++++//
        //++++++++++++++++++++++++++++++++++++++++++++++++++//
        var restaa =[cuantos];
        //fin variables publicas
        function calResultado(){
        //guardar en arreglos los id de los peridos
        for (var i = 1; i <=cuantos; i++) {
          //id periodos
          peri1.push('periodo1'+i);
          peri2.push('periodo2'+i);
          peri3.push('periodo3'+i);
          //id asistencias
          asis1.push('asistencia1'+i);
          asis2.push('asistencia2'+i);
          asis3.push('asistencia3'+i);
        }
        //guardar en arreglos los id de resultados
        for (var i = 1; i <=cuantos; i++) {
          //guardar en arreglos los id de resultado promedio
          prome.push('promedio'+i);
          //guardar en arreglos los id de resultado asistencias
          asisten.push('asistencia'+i);
          //guardar en arreglos los id de resultado TA
          restaa.push('ta'+i);
          //guardar en arreglos los id de los nombres
          idnom.push('nombre'+i);
        }
        //Guardar valores periodo 1 y asitencias 1 en arreglos y convertirlos a flotantes 
        for (var i = 1; i <=cuantos; i++) {
          //conversion a flotante del periodo 1
          var p1 = parseFloat(document.getElementById('periodo1'+i).value);
          //Guardar periodo 1 en arreglo
          valorperi1.push(p1);
          //conversion a flotante de asistencias periodo 1
          var a1 = parseFloat(document.getElementById('asistencia1'+i).value);
          //Guardar asistencias de periodo 1 en arreglo
          valorasis1.push(a1);
          
          var n1 = document.getElementById('nombre'+i).value;
          nombres.push(n1);
        }
        //Guardar valores periodo 2 y asistencias 2 en arreglos y convertirlos a flotantes 
        for (var i = 1; i <=cuantos; i++) {
          //conversion a flotante del periodo 2
          var p2 = parseFloat(document.getElementById('periodo2'+i).value);
          //Guardar periodo 2 en arreglo
          valorperi2.push(p2);
          //conversion a flotante de asistencias periodo 2
          var a2 = parseFloat(document.getElementById('asistencia2'+i).value);
          //Guardar asistencias de periodo 2 en arreglo
          valorasis2.push(a2);
        }
        //Guardar valores periodo 3 y asistencias 3 en arreglos y convertirlos a flotantes 
        for (var i = 1; i <=cuantos; i++) {
          //conversion a flotante del periodo 3
          var p3 = parseFloat(document.getElementById('periodo3'+i).value);
          //Guardar periodo 3 en arreglo
          valorperi3.push(p3);
           //conversion a flotante de asistencias periodo 3
           var a3 = parseFloat(document.getElementById('asistencia3'+i).value);
          //Guardar asistencias de periodo 3 en arreglo
          valorasis3.push(a3);
        }
        //Guarda resultado de operaciones de promedio y asistencias en arreglos 
        for (var i = 1; i <=cuantos; i++) {
          //calcula promedio
          var respro = parseFloat(((valorperi1[i] + valorperi2[i]) + valorperi3[i])/3).toFixed(1);
          //guarda promedio en arreglo
          respromedio.push(respro);
          //calcula la suma de asistencias
          var resasi = parseFloat(valorasis1[i] + valorasis2[i] +valorasis3[i]);
          //guarda asistencias en arreglo
          resasistencia.push(resasi);
        }
        for (var i = 1; i <=cuantos; i++) {
          var res = document.getElementById('promedio'+i);
          res.value = respromedio[i];
          
          var res2 = document.getElementById('asistencia'+i);
          res2.value = resasistencia[i];
        }
        for(var i = 1; i<=cuantos; i++){
          var porcentaje = resasistencia[i] * 10;
            if(porcentaje>=80 && respromedio[i]>=6){
              restaa[i]="A";
            }
            if(porcentaje<80 && respromedio[i]<6){
              restaa[i]="NA";
            }
        }
        for(var i = 1; i<=cuantos; i++){
          var res3 = document.getElementById('ta'+i);
          res3.value = restaa[i];
        }
      }
      //Funcion calcular periodo 1
      function calResultadop1(){
        //guardar en arreglos los id de los peridos
        for (var i = 1; i <=cuantos; i++) {
          //id periodos
          peri1.push('periodo1'+i);
          //id asistencias
          asis1.push('asistencia1'+i);
        }
        //guardar en arreglos los id de resultados
        for (var i = 1; i <=cuantos; i++) {
          //guardar en arreglos los id de resultado promedio
          prome.push('promedio'+i);
          //guardar en arreglos los id de resultado asistencias
          asisten.push('asistencia'+i);
          //guardar en arreglos los id de resultado TA
          restaa.push('ta'+i);
          //guardar en arreglos los id de los nombres
          idnom.push('nombre'+i);
        }
        //Guardar valores periodo 1 y asitencias 1 en arreglos y convertirlos a flotantes 
        for (var i = 1; i <=cuantos; i++) {
          //conversion a flotante del periodo 1
          var p1 = parseFloat(document.getElementById('periodo1'+i).value);
          //Guardar periodo 1 en arreglo
          valorperi1.push(p1);
          //conversion a flotante de asistencias periodo 1
          var a1 = parseFloat(document.getElementById('asistencia1'+i).value);
          //Guardar asistencias de periodo 1 en arreglo
          valorasis1.push(a1);
          
          var n1 = document.getElementById('nombre'+i).value;
          nombres.push(n1);
        }
        //Guarda resultado de operaciones de promedio y asistencias en arreglos 
        for (var i = 1; i <=cuantos; i++) {
          //calcula promedio
          var respro = parseFloat(valorperi1[i]).toFixed(1);
          //guarda promedio en arreglo
          respromedio.push(respro);
          //calcula la suma de asistencias
          var resasi = parseFloat(valorasis1[i]);
          //guarda asistencias en arreglo
          resasistencia.push(resasi);
        }
        for (var i = 1; i <=cuantos; i++) {
          var res = document.getElementById('promedio'+i);
          res.value = respromedio[i];
          
          var res2 = document.getElementById('asistencia'+i);
          res2.value = resasistencia[i];
        }
      }
      //fin funcion calcular periodo 1
      //funcion calcular periodo 2
      function calResultadop2(){
        //guardar en arreglos los id de los peridos
        for (var i = 1; i <=cuantos; i++) {
          //id periodos
          peri2.push('periodo2'+i);
          //id asistencias
          asis2.push('asistencia2'+i);
        }
        //guardar en arreglos los id de resultados
        for (var i = 1; i <=cuantos; i++) {
          //guardar en arreglos los id de resultado promedio
          prome.push('promedio'+i);
          //guardar en arreglos los id de resultado asistencias
          asisten.push('asistencia'+i);
          //guardar en arreglos los id de resultado TA
          restaa.push('ta'+i);
          //guardar en arreglos los id de los nombres
          idnom.push('nombre'+i);
        }
        //Guardar valores periodo 2 y asistencias 2 en arreglos y convertirlos a flotantes 
        for (var i = 1; i <=cuantos; i++) {
          //conversion a flotante del periodo 2
          var p2 = parseFloat(document.getElementById('periodo2'+i).value);
          //Guardar periodo 2 en arreglo
          valorperi2.push(p2);
          //conversion a flotante de asistencias periodo 2
          var a2 = parseFloat(document.getElementById('asistencia2'+i).value);
          //Guardar asistencias de periodo 2 en arreglo
          valorasis2.push(a2);

          var n2 = document.getElementById('nombre'+i).value;
          nombres.push(n2);
        }
        //Guarda resultado de operaciones de promedio y asistencias en arreglos 
        for (var i = 1; i <=cuantos; i++) {
          //calcula promedio
          var respro = parseFloat(valorperi2[i]).toFixed(1);
          //guarda promedio en arreglo
          respromedio.push(respro);
          //calcula la suma de asistencias
          var resasi = parseFloat(valorasis2[i]);
          //guarda asistencias en arreglo
          resasistencia.push(resasi);
        }
        for (var i = 1; i <=cuantos; i++) {
          var res = document.getElementById('promedio'+i);
          res.value = respromedio[i];
          
          var res2 = document.getElementById('asistencia'+i);
          res2.value = resasistencia[i];
        }
      }
      //fin calcular periodo 2
      //funcion calcular periodo 3
      function calResultadop3(){
        //guardar en arreglos los id de los peridos
        for (var i = 1; i <=cuantos; i++) {
          //id periodos
          peri3.push('periodo3'+i);
          //id asistencias
          asis3.push('asistencia3'+i);
        }
        //guardar en arreglos los id de resultados
        for (var i = 1; i <=cuantos; i++) {
          //guardar en arreglos los id de resultado promedio
          prome.push('promedio'+i);
          //guardar en arreglos los id de resultado asistencias
          asisten.push('asistencia'+i);
          //guardar en arreglos los id de resultado TA
          restaa.push('ta'+i);
          //guardar en arreglos los id de los nombres
          idnom.push('nombre'+i);
        }
        //Guardar valores periodo 3 y asistencias 3 en arreglos y convertirlos a flotantes 
        for (var i = 1; i <=cuantos; i++) {
          //conversion a flotante del periodo 3
          var p3 = parseFloat(document.getElementById('periodo3'+i).value);
          //Guardar periodo 3 en arreglo
          valorperi3.push(p3);
           //conversion a flotante de asistencias periodo 3
           var a3 = parseFloat(document.getElementById('asistencia3'+i).value);
          //Guardar asistencias de periodo 3 en arreglo
          valorasis3.push(a3);

          var n3 = document.getElementById('nombre'+i).value;
          nombres.push(n3);
        }
        //Guarda resultado de operaciones de promedio y asistencias en arreglos 
        for (var i = 1; i <=cuantos; i++) {
          //calcula promedio
          var respro = parseFloat(valorperi3[i]).toFixed(1);
          //guarda promedio en arreglo
          respromedio.push(respro);
          //calcula la suma de asistencias
          var resasi = parseFloat(valorasis3[i]);
          //guarda asistencias en arreglo
          resasistencia.push(resasi);
        }
        for (var i = 1; i <=cuantos; i++) {
          var res = document.getElementById('promedio'+i);
          res.value = respromedio[i];
          
          var res2 = document.getElementById('asistencia'+i);
          res2.value = resasistencia[i];
        }
      }
      //fin calcular periodo 3
      //guardar todos los periodos
      window.saveFile = function saveFile () {
      var prueba = [];
      for(var i =0; i<=cuantos;i++){
      var tasistencias = valorasis1[i] + valorasis2[i]+ valorasis3[i];
      prueba[i]= {NO:i, NOMBRE_DEL_ALUMNO:nombres[i], PRIMER_PARCIAL:valorperi1[i],SEGUNDO_PARCIAL:valorperi2[i], TERCER_PARCIAL:valorperi3[i], PROMEDIO:respromedio[i]};
      } 
      prueba[0]={NO:"", NOMBRE_DEL_ALUMNO:"", PRIMER_PARCIAL:"",SEGUNDO_PARCIAL:"", TERCER_PARCIAL:"", PROMEDIO:""};
      var opts = [{sheetid:'Calificaciones',header:true}];
      var result = alasql('SELECT * INTO XLSX("Calificaciones.xlsx",?) FROM ?', 
            [opts,[prueba]]);
      }
      //fin guardar todos los periodos
      //guardar periodo 1
      window.saveFilep1 = function saveFilep1 () {
      var prueba = [];
      for(var i =0; i<=cuantos;i++){
      var tasistencias = valorasis1[i];
      prueba[i]= {NO:i, NOMBRE_DEL_ALUMNO:nombres[i], PRIMER_PARCIAL:valorperi1[i]};
      } 
      prueba[0]={NO:"", NOMBRE_DEL_ALUMNO:"", PRIMER_PARCIAL:""};
      var opts = [{sheetid:'Calificaciones-Parcial-1',header:true}];
      var result = alasql('SELECT * INTO XLSX("Calificaciones-Parcial-1.xlsx",?) FROM ?', 
            [opts,[prueba]]);
      }
      //fin guardar periodo 1
      //guardar periodo 2
      window.saveFilep2 = function saveFilep2 () {
      var prueba = [];
      for(var i =0; i<=cuantos;i++){
      var tasistencias = valorasis2[i];
      prueba[i]= {NO:i, NOMBRE_DEL_ALUMNO:nombres[i], SEGUNDO_PARCIAL:valorperi2[i]};
      } 
      prueba[0]={NO:"", NOMBRE_DEL_ALUMNO:"", SEGUNDO_PARCIAL:""};
      var opts = [{sheetid:'Calificaciones-Parcial-2',header:true}];
      var result = alasql('SELECT * INTO XLSX("Calificaciones-Parcial-2.xlsx",?) FROM ?', 
            [opts,[prueba]]);
      }
      //fin guardar periodo 2
      //guardar periodo 3
      window.saveFilep3 = function saveFilep3 () {
      var prueba = [];
      for(var i =0; i<=cuantos;i++){
      var tasistencias = valorasis3[i];
      prueba[i]= {NO:i, NOMBRE_DEL_ALUMNO:nombres[i], TERCER_PARCIAL:valorperi3[i]};
      } 
      prueba[0]={NO:"", NOMBRE_DEL_ALUMNO:"", TERCER_PARCIAL:""};
      var opts = [{sheetid:'Calificaciones-Parcial-3',header:true}];
      var result = alasql('SELECT * INTO XLSX("Calificaciones-Parcial-3.xlsx",?) FROM ?', 
            [opts,[prueba]]);
      }
      //fin guardar periodo 3
      
    </script>
</body>
</html>
