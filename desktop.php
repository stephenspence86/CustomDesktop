<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="desktop.css">
  </head>
  <title> Desktop </title>
<body>
  <div id= "time">
          <script>function checkTime(i) {
      if (i < 10) {
          i = "0" + i;
      }
        return i;
      }

      function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        // add a zero in front of numbers<10
        m = checkTime(m);

        document.getElementById('time').innerHTML = h + ":" + m;
        t = setTimeout(function () {
            startTime()
        }, 500);
        }
        startTime();
      </script>
    </div>
  <div id ="greeting">
    <?php
    $time = date("H");
    $timezone = date("e");

      if ($time < "12" ) {
        echo "Good Morning Stephen";
      }
      elseif ($time >= "12" && $time < "17" ) {
        echo "Good Afternoon Stephen";
      }
      elseif ($time >= "17" && $time < "19") {
        echo "Good Evening Stephen";
      }
      else {
        echo "Why are you still here? Go home!";
      }
    ?>
  </div>

  <br>
  <br>
  <br>
  <div id="section">
  <div id="traintimes">
   <?php
   /* This simple script generates the next 4 departures from Birmingham Snow Hill Station and posts them to the screen.
   For it to work correctly the file OpenLDBWS MUST be in the same directory as this file.

   Version 1.0 created by Stephen Spence (stephen.spence@groundwork.org.uk)

   with thanks to RailAleFan for creating OpenLDBWS*/
   $trainNumber = 4;
   require 'OpenLDBWS.php';
   $OpenLDBWS = new OpenLDBWS("3d9bc083-e05e-48d2-87da-44f1415fb68a");# Usage: OpenLDBWS("NRE API Key") DONT CHANGE THIS!
      if ($time > "13") {
        $result = $OpenLDBWS->GetDepartureBoard($trainNumber,"BSW","","", "10");# Usage: GetDepartureBoard(Number of Services to return, 3 digit station code)
      }
   ?> </div>
 <div id="departure">
   <strong>Departure </strong> <br>
   <?php
   $depart=0;
       while ($depart < $trainNumber) {
       echo $result->GetStationBoardResult->trainServices->service[$depart]->std. "<br>";
       $depart++;
   }
   ?>
 </div>

 <div id="expected">
   <strong>Expected </strong> <br>
   <?php
   $expect=0;
   while ($expect < $trainNumber) {
       echo $result->GetStationBoardResult->trainServices->service[$expect]->etd. "<br>";
       $expect++;
   }
   ?>
 </div>

 <div id="destination">
   <strong>Destination </strong> <br>
   <?php
   $dest=0;
   while ($dest < $trainNumber) {
       echo $result->GetStationBoardResult->trainServices->service[$dest]->destination->location->locationName."<br>";
       $dest++;
   }
   ?>
 </div>
  </div>

    <iframe id="weather" type="text/html" frameborder="0" height="245" width="100%" src="http://forecast.io/embed/#lat=52.481223&lon=-1.911389&name=Birmingham &units=uk"> </iframe>



 </body>
 </html>
# todo: work on rest of code