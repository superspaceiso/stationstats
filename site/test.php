<link rel='stylesheet' href='./chartist.min.css'>
<script src='./chartist.min.js'></script>

<script type="text/javascript">

fetch('json_feed.php')
  .then(function(response) {
    return response.json();
  })
  .then(function(stations) {
    var data = {
      labels: stations.map(function(station) {
        return station.station_name;
      }),
      series: stations.map(function(station) {
        return station.station_name.length;
      })
    };
  
    var chart = new Chartist.Bar('#chart', data, {
      distributeSeries: true
    });
  });


</script>

<div id="chart" class="ct-golden-section"></div>
