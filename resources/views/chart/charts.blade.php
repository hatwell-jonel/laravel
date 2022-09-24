@extends('access_admin.dashboard')

@section('chart')

<script type="text/javascript">
    var analytics = <?php echo $gender; ?>
 
    google.charts.load('current', {'packages':['corechart']});
 
    google.charts.setOnLoadCallback(drawChart);
 
    function drawChart()
    {
     var data = google.visualization.arrayToDataTable(analytics);
     var options = {
      title : 'Percentage of Male and Female Employee'
     };
     var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
     chart.draw(data, options);
    }

</script>

<script>
    var application = <?php echo $application; ?>

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable(application);
        var options = {
        title: 'Daily Student Application Line Chart',
        hAxis: {title: 'Date'},
        vAxis: {title: 'No# of Students Application'},
        curveType: 'function',
        legend: 'none'
        };
        var chart = new google.visualization.LineChart(document.getElementById('linechart'));
        chart.draw(data, options);
  }
</script>
    <div class="row">
        <div class="container">
            <h1 align="center">Charts</h1>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Percentage of Male and Female Employee</h3>
                        </div>
                        <div class="panel-body" align="center">
                            <div id="pie_chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Percentage of Male and Female Employee</h3>
                        </div>
                        <div class="panel-body" align="center">
                            <div id="linechart"></div>
                        </div>
                    </div>
                </div>
            </div>
      
            
        </div>
    </div>
    

@endsection

