<?php
    function build_calendar($month,$year){


        $mysqli = new mysqli('localhost', 'root', '', 'amba_db');

    // $stmt =$mysqli->prepare("SELECT * from booking where MONTH(date) = ? AND YEAR(date) = ?");

    // $stmt->bind_param('ss',$month, $year);
    // $bookings = array();
    // if($stmt->execute()){
    //     $result = $stmt->get_result();
    //     if($result->num_rows>0){
    //         while($row = $result->fetch_assoc()){
    //             $bookings[] = $row['date'];
    //         }
    //         $stmt->close();
    //     }
    //  }
    $con=mysqli_connect("localhost","root","","amba_db");
    $stmt = "select * from booking where MONTH(date) AND YEAR(date)";
    $result = mysqli_query($con, $stmt);




        $daysOfWeek = array('Sunday', 'Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');

        // What is the first day of the month in question?
        $firstDayOfMonth = mktime(0,0,0,$month,1,$year);

        // How many days does this month contain?
        $numberDays = date('t',$firstDayOfMonth);

        // Retrieve some information about the first day of the
        // month in question.
        $dateComponents = getdate($firstDayOfMonth);

        // What is the name of the month in question?
        $monthName = $dateComponents['month'];

        // What is the index value (0-6) of the first day of the
        // month in question.
        $dayOfWeek = $dateComponents['wday'];

        $dateToday= date('Y-m-d');



 
        // $prev_month=date('m',mktime(0,0,0,$month-1,1,$year));
        // $prev_year=date('y',mktime(0,0,0,$month-1,1,$year));
        // $next_month=date('m',mktime(0,0,0,$month+1,1,$year));
        // $next_year=date('y',mktime(0,0,0,$month+1,1,$year));

        // $calendar="<center>$monthName $year<h2> $monthName $year</h2>";
        
        // $calendar.="<a class='btn btn-primary btn-xs' href='?month=".$prev_month."&year=".$prev_year."'>Prev Month</a>";

        // $calendar.="<a class='btn btn-primary btn-xs' href='?month=".date('m')."&year=".date('Y')." '>Current Month</a>";

        // $calendar.="<a class='btn btn-primary btn-xs' href='?month=".$next_month."&year=$next_year'>Next Month</a></center>";

        // $calendar.= "<table class='table table-bordered'>"; 
        // $calendar .= "<tr>"; 

//         $datetoday = date('Y-m-d'); 
$prev_month= date('m',mktime(0,0,0,$month-1,1,$year));
    $prev_year =date('Y',mktime(0,0,0,$month-1,1,$year));
    $next_month =date('m',mktime(0,0,0,$month+1,1,$year));
    $next_year=date('Y',mktime(0,0,0,$month+1,1,$year));
    $calendar="<center><h2>$monthName $year</h2>";
    $calendar.="<a class='btn btn-primary btn-sm' href='?month=".$prev_month."&year=".$prev_year."'>Prev Month</a>";
    $calendar.="<a class='btn btn-primary btn-sm' href='?month=".date('m')."&year=".date('Y')."'>Current Month</a>";
    $calendar.="<a class='btn btn-primary btn-sm' href='?month=".$next_month."&year=".$next_year."'>Next Month</a></center>";
    $calendar.="<br><table class='table table-bordered'>";
    $calendar.="<tr>";






        // Create the calendar headers 
        foreach($daysOfWeek as $day) { 
            $calendar .= "<th class='header'>$day</th>"; 
        } 

        // Create the rest of the calendar
        // Initiate the day counter, starting with the 1st. 
        $calendar.= "</tr><tr>";
        $currentDay = 1;
       
        // The variable $dayOfWeek is used to 
        // ensure that the calendar 
        // display consists of exactly 7 columns.
        if($dayOfWeek > 0) { 
            for($k=0;$k<$dayOfWeek;$k++){ 
                $calendar.= "<td class='empty'></td>"; 
            } 
        }

        $month = str_pad($month, 2, "0", STR_PAD_LEFT);
        while ($currentDay <= $numberDays) { 
        //Seventh column (Saturday) reached. Start a new row. 
            if ($dayOfWeek == 7) { 
                $dayOfWeek = 0; 
                $calendar.= "</tr><tr>"; 
            } 
            $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT); 
            $date = "$year-$month-$currentDayRel"; 
            $dayName = strtolower(date('l', strtotime($date))); 
            // $eventNum = 0; 
            $today = $date==date('Y-m-d')? 'today' : "";

            
            // has reffered book.php page
            if($date<date('Y-m-d')){
                $calendar.="<td><h4>$currentDay</h4><button class='btn btn-outline-danger btn-xs'>N/A</button></td>";
           }
           

           elseif($dayName=='sunday'){
          
            $calendar.="<td><h4>$currentDay</h4><button class='btn btn-danger btn-xs'>Closed</button></td>";


             }


           else{
                $calendar.="<td class='$today'><h4>$currentDay</h4><a href='timeslot.php?date=".$date."' class='btn btn-success btn-xs'>Book</a></td>";
           }
          
       



            // $calendar.="<td><h4>$currentDay</h4><a class='btn btn-success btn-xs'>Book</a>"; 
            // $calendar .="</td>"; 

            
            //Increment counters 
            $currentDay++; 
            $dayOfWeek++;     
        }

//Complete the row of the last week in month, if necessary 
if ($dayOfWeek <7) { 
    $remainingDays = 7 - $dayOfWeek; 
    for($i=0;$i<$remainingDays;$i++){ 
        $calendar .= "<td class='empty'></td>"; 
    } 
} 

$calendar .= "</tr>"; 
$calendar .= "</table>";

        return $calendar;




    
    }

?>



<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
    @media only screen and (max-width: 760px),
    (min-device-width: 802px) and (max-device-width: 1020px) {

        /* Force table to not be like tables anymore */
        table,
        thead,
        tbody,
        th,
        td,
        tr {
            display: block;

        }

        .empty {
            display: none;
        }

        /* Hide table headers (but not display: none;, for accessibility) */
        th {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }

        tr {
            border: 1px solid #ccc;
        }

        td {
            /* Behave  like a "row" */
            border: none;
            border-bottom: 1px solid #eee;
            position: relative;
            padding-left: 50%;
        }



        /*
Label the data
*/
        td:nth-of-type(1):before {
            content: "Sunday";
        }

        td:nth-of-type(2):before {
            content: "Monday";
        }

        td:nth-of-type(3):before {
            content: "Tuesday";
        }

        td:nth-of-type(4):before {
            content: "Wednesday";
        }

        td:nth-of-type(5):before {
            content: "Thursday";
        }

        td:nth-of-type(6):before {
            content: "Friday";
        }

        td:nth-of-type(7):before {
            content: "Saturday";
        }


    }

    /* Smartphones (portrait and landscape) ----------- */

    @media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
        body {
            padding: 0;
            margin: 0;
        }
    }

    /* iPads (portrait and landscape) ----------- */

    @media only screen and (min-device-width: 802px) and (max-device-width: 1020px) {
        body {
            width: 495px;
        }
    }

    @media (min-width:641px) {
        table {
            table-layout: fixed;
        }

        td {
            width: 33%;
        }
    }

    .row {
        margin-top: 20px;
    }

    .today {
        background: yellow;
    }
    </style>
</head>



<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <?php 
      $dateComponents = getdate();
      if(isset($_GET['month']) && isset($_GET['year']) ){
        $month = $_GET['month']; 
        $year = $_GET['year'];
      }
      else{
        $month = $dateComponents['mon']; 
        $year = $dateComponents['year'];
      }
     
      echo build_calendar($month,$year); 
     ?>
            </div>
            <div class="container">
                <div class="center">
                    <input type="button" class="btn btn-info" value="Go To Main Page" onclick=" relocate_home()">
                </div>
            </div>
            <script>
            function relocate_home() {
                location.href = "index2.php";
            }
            </script>

        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous">
    </script>




</body>

</html>