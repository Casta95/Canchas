<!DOCTYPE html>

<html lang="">

<head>
<title>Cancha de Tenis 2</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<!-- ################################################################################################ -->
<div class="wrapper row1">
  <header id="header" class="hoc clear">
    <div id="logo" class="fl_left"> 
      <!-- ################################################################################################ -->
      <h1 class="logoname"><a href="index1.html" style="color: #efb810">Inicio</a></h1>
      <!-- ################################################################################################ -->
    </div>
    <nav id="mainav" class="fl_right"> 
      <!-- ################################################################################################ -->
      <ul class="clear">
        <li class="active"><a href="disponibilidad.html">Disponibilidad</a></li>
        <li class="active"><a href="prestamo.html">Prestamo</a></li>
        <li><a class="drop" href="usuario.html" style="color: #efb810">Usuario</a>
          <ul>
            <li><a href="index.php" style="color: #efb810">Cerrar Session</a></li>
          </ul>
        </li>
        
      </ul>
      <!-- ################################################################################################ -->
    </nav>
  </header>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<div class="wrapper row2">
  <section id="ctdetails" class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <p class="nospace font-xs">A continuacion encontrara la disponibilidad de horarios para:</p>
      <h6 class="heading font-x2">Canchas de Tenis #2</h6>
        <form action="dis_tenis2.php" method="POST">
            <input name="feconf" type="date" id="fecha">
            <button type="submit">Consultar</button>
        </form>
        <br />
        <br />
        <table border="1">
            <tr>
                <td>FECHA</td>
                <td>HORA</td>
                <td>NOMBRE</td>
                <td>APELLIDO</td>
            </tr>
            <?php
            $inc=$conex= mysqli_connect("localhost","root","","canchas");
            if ($inc){
                $consulta="SELECT * FROM tenis2";
                $resultado=mysqli_query($conex,$consulta);
                if ($resultado){
                    while ($row=$resultado->fetch_array()){
                        $fecha=$row['fecha'];
                        $hora=$row['hora'];
                        $nombre=$row['nombre'];
                        $apellido=$row['apellido'];
                        if ($fecha==$_POST['feconf']){

                            ?>
                            <tr>
                                <td><?php  echo $fecha; ?></td>
                                <td><?php  echo $hora; ?></td>
                                <td><?php  echo $nombre; ?></td>
                                <td><?php  echo $apellido; ?></td>
                            </tr>
                            <?php
                        }
                    }
                }
            }
            ?>
        </table>

    </div>
    
  </section>
</div>
    
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ -->

  </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left" style="color: #efb810">Copyright &copy; 2022 - Todos los derechos reservados - <a style="color:#efb810">Equipo de trabajo de Camilo Castañeda</a></p>
    <p class="fl_right" style="color: #efb810">trabajo para: <a target="_blank" href="https://www.os-templates.com/" title="Free Website Templates" style="color: #efb810">equipo de ingenieria de software</a></p>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<!-- Homepage specific -->
<script src="layout/scripts/jquery.easypiechart.min.js"></script>
<!-- / Homepage specific -->
</body>
</html>