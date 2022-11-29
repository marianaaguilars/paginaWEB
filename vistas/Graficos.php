<?php 
session_start();
if(isset($_SESSION['usuario'])){

  ?>

<!DOCTYPE html>


<html>
  <head>
    <title>Grafica Stock</title>
        <?php require_once "menu.php"; ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Terror',     50],
          ['Novelas',      40]
        ]);

        var options = {
          title: 'Tienda de libros',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart_3d" style="width: 800px; height: 400px;"></div><br><br>

    <a href="Stock.pdf?cl=<?php echo $row['id_cliente'] ?>&v=<?php echo $row['id'] ?>" target="_blank" class="btn btn-danger" style="background-color:black;"><i class="fas fa-file-pdf" style="color:black;"></i> Genera PDF</a>
  </body>
</html>
  <?php 
}else{
  header("location:../index.php");
}
?>