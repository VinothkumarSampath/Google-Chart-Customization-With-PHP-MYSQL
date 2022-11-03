<?php
//DB Connection
$con = mysqli_connect('localhost','root','','gchart');
   
    $table = array();
      $table['cols'] = array(
          array('id' => "", 'label' => 'Attoneys Involved', 'pattern' => "", 'type' => 'string'),
          array('id' => "", 'label' => 'No of Applications', 'pattern' => "", 'type' => 'number'),
          array('type' => 'string', 'p' => array('role' => 'style'))
      );
	  
    $query = "SELECT * from attoneyinvolved";
    $query_result = mysqli_query($con,$query);
      $rows = array();
      while($r = mysqli_fetch_array($query_result)) {
   
          $temp = array();
          $temp[] = array('v' => (string) $r['antonyinvolved']); 
          $temp[] = array('v' => (int) $r['applications']); 
          $temp[] = array('v' => 'color:'.$r['color']);
              $rows[] = array('c' => $temp);
      }
   
      $table['rows'] = $rows;
      $jsonTable = json_encode($table);
   ?>
<html>
   <head>
      <title>Charts</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	 <!-- Google Chart JS Files--->
	 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
         google.charts.load('current', {'packages':['bar']});
         google.charts.setOnLoadCallback(drawChart);
         
         function drawChart() {
           var data = google.visualization.arrayToDataTable([
             ['Year', 'First Half', 'Second Half'],
             <?php 
            $query = "SELECT * from renewals";
             $query_result = mysqli_query($con,$query);
            while($row_val = mysqli_fetch_array($query_result)){
            
            echo "[".$row_val['ryear'].",".$row_val['rfirst'].",".$row_val['rsecond']."],";
            
            
            }
             ?> 
         
         ]);
         
           var options = {
               chart: {
               title: 'Upcoming Renewals',
               isStacked:'percent'
             },
             bars: 'vertical' // Required for Material Bar Charts.
           };
         
           var chart = new google.charts.Bar(document.getElementById('chart_div'));
           chart.draw(data, google.charts.Bar.convertOptions(options));
         
         }
      </script>
      <script type="text/javascript">
         google.charts.load('current', {'packages':['corechart']});
         google.charts.setOnLoadCallback(drawChart);
         
         function drawChart() {
         
           var data = google.visualization.arrayToDataTable([
             ['Class No', 'Applications'],
            <?php 
            $query = "SELECT * from applnstatus";
            
             $query_result = mysqli_query($con,$query);
            while($row_val = mysqli_fetch_array($query_result)){
            
            echo "['".$row_val['applnstatus']."',".$row_val['noofappln']."],";
            
            
            }
             ?> 
         
         ]);
         
           var options = {
             title: 'Application Status',
             is3D: true,
             pieSliceText: 'value'
           };
           var chart = new google.visualization.PieChart(document.getElementById('piechart'));
         
           chart.draw(data, options);
         }
      </script>
      <script type="text/javascript">
         google.charts.load('current', {'packages':['corechart']});
         google.charts.setOnLoadCallback(drawChart);
         
         function drawChart() {
         
           var data = google.visualization.arrayToDataTable([
             ['Class No', 'Applications'],
            <?php 
            $query = "SELECT * from applicationwithclass";
            
             $query_result = mysqli_query($con,$query);
            while($row_val = mysqli_fetch_array($query_result)){
            
            echo "['".$row_val['classno']."',".$row_val['applications']."],";
            
            
            }
             ?> 
         
         ]);
         
           var options = {
             title: 'Applications with Class Details ',
             is3D: true,
             pieSliceText: 'value',
             chartArea: {
         height: '85%',
         top: '13%'
         }
           };
          
         
           var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
           chart.draw(data, options);
         }
         
      </script>
      <?php
         $query2 = "SELECT * from attoneyinvolved";  
         $result2 = mysqli_query($con, $query2);
         $resultCount=$result2->num_rows;
         
         $color = ['#FF5733','#334CFF','#3FFF33','#FF339F','#EF132D'];
         $date = array();
         $number = array();
         foreach ($result2 as $peopleData) {
         $date[] = $peopleData['antonyinvolved'];
         $number[] = $peopleData['applications'];
         } 
         ?>
      <script>
         google.charts.load("current", {packages:['corechart']});
         google.charts.setOnLoadCallback(drawColumnChart);
         function drawColumnChart() {
         var data = google.visualization.arrayToDataTable([
           ['Year', 'Total sales', { role: 'style' }, { role: 'annotation' }],
           <?php
            for($i=0;$i<$resultCount;$i++){
              ?>[<?php echo "'".$date[$i]."', ".$number[$i].", 'color:".$color[$i]."' , "."'".$number[$i]."'" ?>],
           <?php } 
            ?>
           ]);
         
         
         var options = {
            title: 'Attoneys Involved',
                hAxis: {title: 'Attoneys Involved', titleTextStyle: {color: 'red',bold: true,
               italic: false}},
                vAxis: {title: 'No of Applications', titleTextStyle: {color: 'blue',bold: true,
               italic: false}},
           chartArea: {width: '75%'},
           legend: { position: "none" },
         };
          var chart = new google.visualization.ColumnChart(document.getElementById("column-chart"));
         chart.draw(data, options);
         }
      </script>
      <script type="text/javascript">
         google.charts.load('current', {'packages':['corechart']});
         google.charts.setOnLoadCallback(drawChart);
         
         function drawChart() {
                 var data = google.visualization.arrayToDataTable([
                   ['Year', 'First Half', 'Second Half'],
                   <?php 
            $query = "SELECT * from renewals";
            
             //$exec = mysqli_query($con,$query);
            
             
             $query_result = mysqli_query($con,$query);
            while($row_val = mysqli_fetch_array($query_result)){
            
            echo "[".$row_val['ryear'].",".$row_val['rfirst'].",".$row_val['rsecond']."],";
            
            
            }
             ?> 
          
          ]);
         
             var view = new google.visualization.DataView(data);
         
             view.setColumns([0, //The "descr column"
             1, //Downlink column
             {
                 calc: "stringify",
                 sourceColumn: 1, // Create an annotation column with source column "1"
                 type: "string",
                 role: "annotation"
             },
             2, // Uplink column
             {
                 calc: "stringify",
                 sourceColumn: 2, // Create an annotation column with source column "2"
                 type: "string",
                 role: "annotation"
             }]);
         
             var columnWrapper = new google.visualization.ChartWrapper({
                 chartType: 'ColumnChart',
                 containerId: 'chart_div1',
                 dataTable: view,
             });
             
         
             columnWrapper.draw();
         }
      </script>
   </head>
   <body>
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-6">
               <div id="column-chart" style="width: 100%; height: 500px;"></div>
            </div>
            <div class="col-md-6">
               <div id="chart_div1" style="width: 100%; height: 500px;"></div>
            </div>
            <div class="col-md-6">
               <div id="piechart" style="width: 100%; height: 500px;"></div>
            </div>
            <div class="col-md-6">
               <div id="piechart1" style="width: 100%; height: 500px;"></div>
            </div>
         </div>
      </div>
   </body>
</html>
