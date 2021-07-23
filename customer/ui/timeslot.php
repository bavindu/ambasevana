<?php
// require('connection.php');
// require('function.php');

$msg = '';

$con=mysqli_connect("localhost","root","","amba_db");

if(isset($_GET['date'])){
	$date = $_GET['date'];

	$stmt = "select * from booking where date='$date'";
    $result = mysqli_query($con, $stmt);


    //$stmt->bind_param('ss',$month,$year);
    $bookings=array();
    // if(mysqli_stmt_execute($stmt)){
        //$result=mysqli_use_result($con);
    // echo mysqli_num_rows($result);

        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
        	// $i=0;
        	// while($i<10){
                $bookings[]=$row['timeslot'];
            };
            //$stmt->close();
           // mysqli_stmt_close($stmt); 
        }
        // else{
        //     echo 'pr';
        // }


	
}

if(isset($_POST['submit'])){
	$name =$_POST['name'];
	$email=$_POST['email'];
	$mobile=$_POST['mobile'];
	$des=$_POST['des'];
	$timeslot=$_POST['timeslot'];


	$stmt = "select * from booking where date='$date' AND timeslot='$timeslot";
    $result = mysqli_query($con, $stmt);

    //$stmt->bind_param('ss',$month,$year);
    //$bookings=array();
    // if(mysqli_stmt_execute($stmt)){
        //$result=mysqli_use_reecho ;sult($con);
    if(!$result) {
        // if(mysqli_num_rows($result)>0){

        //      $msg="<div class='alert alert-danger'>Already Booked</div>";
        //     }
        // else{

            
        //     $stmt=mysqli_query($con,"insert into  booking(name,email,date,timeslot,mobile,des) values('$name','$email','$date','$timeslot','$mobile','$des')");
 		// //echo $stmt;
        //     if($stmt) {
        //         $msg="<div class='alert alert-success' id='sussMsg'>Booking Successful</div>";
        //     } else {
        //         $msg="<div class='alert alert-danger' id='errMsg'>Error</div>";
        //     }

            // !$con -> query("INSERT INTO Persons (name,email,date,timeslot,mobile,des) VALUES ('$name','$email','$date','$timeslot','$mobile','$des')");
			if($con -> query("INSERT INTO booking (name,email,date,timeslot,mobile,des) VALUES ('$name','$email','$date','$timeslot','$mobile','$des')")){
                $msg="<div class='alert alert-success' id='sussMsg'>Booking Successful</div>";
            } else {
                $msg="<div class='alert alert-danger' id='errMsg'>Error</div>";
                echo("Error description: " . $con -> error);

            }
			// $bookings[]=$timeslot;
			array_push($bookings, $timeslot);
        // }
    }
    else{
    	$msg="<div class='alert alert-danger'>Already Booked</div>";
    }
            //$stmt->close();
           // mysqli_stmt_close($stmt);
	
}


$duration=45;
$cleanup=0;
$start="11:30";
$end="22:00";





function timeslots($duration,$cleanup, $start,$end){
	$start= new DateTime($start);
	$end= new DateTime($end);
	$interval= new DateInterval("PT".$duration."M");
	$cleanupInterval= new DateInterval("PT".$cleanup."M");
	$slots= array();

	for($intStart = $start; $intStart<$end;$intStart->add($interval)->add($cleanupInterval)){
		$endPeriod = clone $intStart;
		$endPeriod->add($interval);
		if($endPeriod>$end){
			break;
		}

		$slots[]=$intStart->format("H:iA")."-".$endPeriod->format("H:iA");
	}

	return $slots;
}


?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- <title><?php //echo $meta_title?></title>
      //<meta name="description" content="<?php //echo $meta_desc?>">
      //<meta name="keywords" content="<?php //echo $meta_keyword?>">
      //<meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesheet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="css/core.css">
      <link rel="stylesheet" href="css/shortcode/shortcodes.css">
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="login.css">
      
      <link rel="stylesheet" type="text/css" href="css/main.css">
      <link rel="stylesheet" href="css/responsive.css">
      <link rel="stylesheet" type="text/css" href="css/custom.css">-->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="js/vendor/modernizr-3.5.0.min.js"></script> -->


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="../assets/js-/vendor/modernizr-3.5.0.min.js"></script>

    <style>
    .center {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 200px;
        /*border: 3px solid green; */
    }
    </style>
</head>

<body>

    <div class="container">
        <h1 class="text-center">Book for Date:<?php echo date('d/m/Y',strtotime($date)); ?> </h1>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <?php echo isset($msg)?$msg:"";?>
            </div>
            <div class="col-md-12">
                <div id="ErrMsg"></div>
            </div>
            <?php $timeslots=timeslots($duration,$cleanup, $start,$end);
  			
  			foreach ($timeslots as $ts) {

  				?>

            <div class="col-md-2">
                <div class="form-group">
                    <?php if(in_array($ts, $bookings)){?>

                    <button class="btn btn-danger disBook" onclick="displayError()"><?php echo $ts;?></button>
                    <!-- <button class="btn btn-danger book" id="book" date-timeslot="<?php echo $ts;?>"><?php echo $ts;?></button> -->

                    <?php }else {?>

                    <button class="btn btn-success book" id="book"
                        date-timeslot="<?php echo $ts;?>"><?php echo $ts;?></button>


                    <?php }?>

                </div>
            </div>

            <?php
  			}
  			?>
        </div>
    </div>


    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> Booking:<span id="slot"></span></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">

                            <form action="" method="post">

                                <div class="form-group" autocomplete="off">
                                    <label for="">TimeSlot</label>
                                    <input type="text" class="form-control " id="timeslot" name="timeslot" readonly>

                                </div>
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="">Mobile No</label>
                                    <input type="int" class="form-control" name="mobile">
                                </div>
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <input type="text" class="form-control" name="des">
                                </div>
                                <button class="btn btn-primary pull-right" type="submit" name="submit">Submit</button>
                            </form>
                        </div>
                    </div>





                </div>

            </div>

        </div>
    </div>


    <div class="container">
        <div class="center">
            <input type="button" class="btn btn-info" value="Go To Booking Page" onclick=" relocate_home()">
        </div>
    </div>
    <script>
    function relocate_home() {
        location.href = "book.php";
    }
    </script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>

    <!-- <script src="../assets/js-/bootstrap.min.js"></script> -->
    <script type="text/javascript">
    $(".book").click(function() {
        // var timeslot=$(this).attr('data-timeslot');\
        var timeslot = $(this)[0].innerHTML;
        console.log(timeslot);
        $("#slot").html(timeslot);
        $("#timeslot").val(timeslot);
        $("#myModal").modal("show");
    })
    // $(".disBook").click(function(){

    // 	// var timeslot=$(this).attr('data-timeslot');\
    // 	$msg = "<div class='alert alert-danger'>Already Booked</div>";

    // 	// $(".errMsg")[0].inner = '<div class='alert alert-danger'>Already Booked</div>';
    // })
    function displayError() {
        console.log('Called');
        console.log($("#ErrMsg"));
        $("#ErrMsg")[0].innerHTML = 'Already Booked';
        $("#ErrMsg")[0].className = 'alert alert-danger';

        $("#sussMsg")[0].innerHTML = '';
        $("#sussMsg")[0].className = '';

        // $msg="<div class='alert alert-danger'>Booking Error</div>";
    }
    </script>


</body>

</html>