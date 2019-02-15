<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Csiro</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrapframe/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="bootstrapframe/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/freelancer.min.css" rel="stylesheet">
     
  <style>
    /* Tabs*/
section {
    padding: 60px 0;
    height: auto;
}

section .section-title {
    text-align: center;
    color:#2C3E50;
    margin-bottom: 50px;
    text-transform: uppercase;
}
#tabs{
	background: #2c3e50;
    color: #eee;
}
#tabs h6.section-title{
    color: #eee;
}

#tabs .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    color: #f3f3f3;
    background-color: transparent;
    border-color: transparent transparent #f3f3f3;
    border-bottom: 4px solid !important;
    font-size: 20px;
    font-weight: bold;
}
#tabs .nav-tabs .nav-link {
    border: 1px solid transparent;
    border-top-left-radius: .25rem;
    border-top-right-radius: .25rem;
    color: #eee;
    font-size: 20px;
}
#nav-tabContent
{
  background-color: white;
  color: black;
}

.node rect {
  cursor: move;
  fill-opacity: .9;
  shape-rendering: crispEdges;
  
}

.node text {
  pointer-events: none;
  text-shadow: 0 1px 0 #fff;
}

.link {
  fill: none;
  stroke:cadetblue;
  stroke-opacity: .2;
}

.link:hover {
  stroke-opacity: .5;
}
canvas
{
  position: unset !important;
}
  </style>
  </head>

  <body id="page-top">
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
      <div class="container">
        <center><h1 style="text-align: center; color: #eee;">CSIRO</h1></center>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead bg-primary text-white text-center">
      <div class="container">
        <section id="tabs">
          <div class="container" id="t"> 
            <h6 class="section-title h1">CISRO Organisational History</h6>
            <div class="row">
              <div class="col-xs-12 ">
                <nav>
                  <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
                    <a class="nav-item nav-link" id="nav-query-tab" data-toggle="tab" href="#nav-query" role="tab" aria-controls="nav-querys" aria-selected="false">Query</a>
                    <a class="nav-item nav-link active" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Graph</a>
                    <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">About</a>
                  </div>
                </nav>

                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                
                  <div class="tab-pane fade " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                  CSIRO do the extraordinary every day. We innovate for tomorrow and help improve today-for our customers,all Australians and the world.
                  We imagine. We collaborate. We innovate.
                  </div>

                  <div class="tab-pane fade" id="nav-query" role="tabpanel" aria-labelledby="nav-query-tab"> 
                          <form action="genSQ.php" method="post">
                                  <textarea id="gen" name="gen"  rows="15" cols="134">
                            Please enter SPARQL query</textarea>
                              <br/>
                                  <input type="submit" class="button" name="someAction" value="Run" />
                              </form>
                      </div>
                  
                  <div class="tab-pane fade show active" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="margin-left:10px;">
                          <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Sankey</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Pie Chart</a>
                          </li>
                          <li class="nav-item">
                          <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Table</a>
                          </li>
                        </ul>
                       <div class="tab-content" id="pills-tabContent">
                          <div class="tab-pane fade show active" id="pills-home-tab" role="tabpanel" aria-labelledby="pills-home-tab"> 
                          <p id="sankey_multiple" style="padding: 55px;"></p>
                          </div>
                          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                          <p id="chartContainer"style="padding: 55px; position: initial !important;"></p>
                          </div>
                          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <?php
                              require_once( "sparqllib.php" );

                              $data = sparql_get(
                                "http://52.237.253.139:7200/repositories/CSIRO?query= ",
                                "
                              PREFIX org: <http://www.w3.org/ns/org%23>
                            PREFIX foaf: <http://xmlns.com/foaf/0.1/>
                            SELECT Distinct (?x AS ?Organisation) (count(?y) As ?Number_of_Members)
                            WHERE{
                            ?x org:hasMember ?y .
                            }
                            GROUP BY ?x
                            " );

                              if( !isset($data) )
                              {
                                print "<p>Error: ".sparql_errno().": ".sparql_error()."</p>";
                              }
                              print "<table class='example_table'>";
                              print "<tr>";
                              foreach( $data->fields() as $field )
                              {
                                  print "<th>$field</th>";
                              }
                              print "</tr>";
                              $array = array();

                              foreach( $data as $row )
                              {
                                  print "<tr>";
                                  $a=0;
                                  foreach( $data->fields() as $field )
                                  {
                                      print "<td>$row[$field]</td>";
                                      if($a==0){
                                          $tmp1=$row[$field];
                                          $a++;
                                      }else{
                                          $tmp2=$row[$field];
                                          $array[] = array($tmp1, $tmp2);

                                      }
                                  }
                                  print "</tr>";
                              }
                              print "</table>";
                              $i=0;
                              $dataPoints=array();
                              foreach ( $array as $var ) {
                                  $dataPoints[]=array("label"=>$var[0], "y"=>(double)$var[1]);
                              }

                            ?>
                          </div>
                      </div>
                    </div>
                  <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                  We do the extraordinary every day. We innovate for tomorrow and help improve today – for our customers, all Australians and the world.<br>
                   <b>At the Commonwealth Scientific and Industrial Research Organisation (CSIRO), we shape the future. We do this by using science to solve real issues. Our research makes a difference to people, industry and the planet.</b>
                </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </header>


    <!-- Footer -->
    <footer class="footer text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-4 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4">Location</h4>
            <p class="lead mb-0">Building 101, Clunies Ross Street
              <br>Black Mountain ACT 2601 Australia</p>
          </div>
          <div class="col-md-4 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4">Links to CSIRO</h4>
            <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="https://www.facebook.com/pages/CSIRO/142468583842">
                  <i class="fab fa-fw fa-facebook-f"></i>
                </a>
              </li>

              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="https://twitter.com/CSIROnews">
                  <i class="fab fa-fw fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="http://www.linkedin.com/company/csiro">
                  <i class="fab fa-fw fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <h4 class="text-uppercase mb-4">About CSIRO</h4>
            <p class="lead mb-0">We imagine. We collaborate. We innovate.
              <a href="https://www.csiro.au/">CSIRO</a>.</p>
          </div>
        </div>
      </div>
    </footer>

    <div class="copyright py-4 text-center text-white">
      <div class="container">
        <small>Copyright &copy;  CSIRO 2018</small>
      </div>
    </div>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-to-top d-lg-none position-fixed ">
      <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="https://d3js.org/d3.v3.min.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="sankey.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js" integrity="sha384-vhJnz1OVIdLktyixHY4Uk3OHEwdQqPppqYR8+5mjsauETgLOcEynD9oPHhhz18Nw" crossorigin="anonymous"></script>
    <script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>

   



<script type="text/javascript">
    google.charts.load("current", {packages:["sankey"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = new google.visualization.DataTable();
        var users = <?php echo json_encode($array); ?>;

        data.addColumn('string', 'From');
        data.addColumn('string', 'To');
        data.addColumn('number', 'Weight');
        var arrayLength = users.length;
        for (var i = 0; i < arrayLength; i++) {
            data.addRows([
                [ users[i][0],users[i][1] , 1 ]
            ]);

        }
        // Set chart options
        var options = {
            width: 1000,
            height: 1200
        };


        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.Sankey(document.getElementById('sankey_multiple'));
        chart.draw(data, options);
    }
</script>
<script>
        window.onload = function() {


            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                title: {
                    text: "Number of Members in each Unit"
                },
                subtitles: [{
                    text: "CSIRO"
                }],
                data: [{
                    type: "pie",
                    indexLabel: "{label} ({y})",
                    fontsize: 4,
                     is3D: true,
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>
  </body>

</html>
