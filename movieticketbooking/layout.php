<?php
require("common.php");
$id=$_GET['id'];
$user_id=$_SESSION['user_id'];

$sel="select seats from reservation where screen_no=$id";
$result=mysqli_query($con,$sel)or die($mysqli_error($con));

$seats=array();
 if(isset($_POST['submit'])) {
    $id=$_GET['id'];
    $name=$_POST['name'];
    $number=$_POST['number'];
    $seats=$_POST['seats'];
   $var;
$results= mysqli_query($con, $sel);
  while($num=mysqli_fetch_array($results, MYSQLI_ASSOC))
  {
$var=$num['seats'];
  }

if ($seats==$var) { 
    echo 'seats are already';
}
else
{
    $query = "INSERT INTO `reservation`(`name`, `number`, `seats`,`screen_no`,`user_id`) VALUES ('$name','$number','$seats','$id','$user_id')";
            mysqli_query($con,$query)or die($mysqli_error($con));
            header('location:ticket.php');
  }



}
 
 
?>

      
           
      

<html lang="zxx">

<head>
    <title>Movie Seat Selection Flat Responsive Widget Template :: w3layouts</title>
    <!-- Meta-Tags -->
    <link rel="stylesheet" href="st.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Movie Seat Selection a Responsive Web Template, Bootstrap Web Templates, Flat Web Templates, Android Compatible Web Template, Smartphone Compatible Web Template, Free Webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta-Tags -->
    <!-- Index-Page-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <!-- //Custom-Stylesheet-Links -->
    <!--fonts -->
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
    <!-- //fonts -->
</head>

<body onload="onLoaderFunc()" style=" background-image: url('background.jpg');">
<script src='//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script><script src="//m.servedby-buysellads.com/monetization.js" type="text/javascript"></script>
<script>
(function(){
	if(typeof _bsa !== 'undefined' && _bsa) {
  		// format, zoneKey, segment:value, options
  		_bsa.init('flexbar', 'CKYI627U', 'placement:w3layoutscom');
  	}
})();
</script>
<script>
(function(){
if(typeof _bsa !== 'undefined' && _bsa) {
	// format, zoneKey, segment:value, options
	_bsa.init('fancybar', 'CKYDL2JN', 'placement:demo');
}
})();
</script>
<script>
(function(){
	if(typeof _bsa !== 'undefined' && _bsa) {
  		// format, zoneKey, segment:value, options
  		_bsa.init('stickybox', 'CKYI653J', 'placement:w3layoutscom');
  	}
})();
</script>
<script>
	(function(v,d,o,ai){ai=d.createElement("script");ai.defer=true;ai.async=true;ai.src=v.location.protocol+o;d.head.appendChild(ai);})(window, document, "//vdo.ai/core/w3layouts/vdo.ai.js");
	</script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-125810435-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-125810435-1');
</script><script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-30027142-1', 'w3layouts.com');
  ga('send', 'pageview');
</script>
<body>
<!---728x90--->

    <h1>Movie Seat Selection</h1>
    <div class="container">

        <div class="w3ls-reg">
            <!-- input fields -->
            <div class="inputForm">
                <h2>fill the required details below and select your seats</h2>
                <div class="mr_agilemain">
                    <div class="agileits-left">
                        <label> Name
                            <span>*</span>
                        </label>
                        <input type="text" id="Username" required>
                    </div>
                    <div class="agileits-right">
                        <label> Number of Seats
                            <span>*</span>
                        </label>
                       
                        <input type="number" id="Numseats" required min="1">
                    </div>
                </div>
                 <?php 
    $projects = array();
    while ($project =  mysqli_fetch_assoc($result))
    {
        $projects[] = $project;
    }
    echo '<h5 style="color:red";>ALREADY RESERVED SEATS:</h5>'; 
    foreach ($projects as $project)
    {
?>
     <?php echo "<pre style='color:red';>".$project['seats']."</pre>"; ?>
                  
   
<?php
    }
    
?>      
                <button onclick="takeData()">Start Selecting</button>
            </div>
            <!-- //input fields -->
			<!---728x90--->

            <!-- seat availabilty list -->
            <ul class="seat_w3ls">
                <li class="smallBox greenBox">Selected Seat</li>

                <!--<li class="smallBox redBox">Reserved Seat</li>-->

                <li class="smallBox emptyBox">Empty Seat</li>
            </ul>
            <!-- seat availabilty list -->
            <!-- seat layout -->
            <div class="seatStructure txt-center" style="overflow-x:auto;">
                <table id="seatsBlock">
                    <p id="notification"></p>
                    <tr>
                        <td></td>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td></td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                        <td>9</td>
                        <td>10</td>
                        <td>11</td>
                        <td>12</td>
                    </tr>
                    <tr>
                        <td>A</td>
                        <td>
                            <input type="checkbox" class="seats"  value="A1">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="A2">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="A3">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="A4">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="A5">
                        </td>
                        <td class="seatGap"></td>
                        <td>
                            <input type="checkbox" class="seats" value="A6">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="A7">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="A8">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="A9">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="A10">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="A11">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="A12">
                        </td>
                    </tr>

                    <tr>
                        <td>B</td>
                        <td>
                            <input type="checkbox" class="seats" value="B1">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="B2">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="B3">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="B4">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="B5">
                        </td>
                        <td></td>
                        <td>
                            <input type="checkbox" class="seats" value="B6">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="B7">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="B8">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="B9">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="B10">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="B11">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="B12">
                        </td>
                    </tr>

                    <tr>
                        <td>C</td>
                        <td>
                            <input type="checkbox" class="seats" value="C1">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="C2">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="C3">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="C4">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="C5">
                        </td>
                        <td></td>
                        <td>
                            <input type="checkbox" class="seats" value="C6">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="C7">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="C8">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="C9">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="C10">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="C11">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="C12">
                        </td>
                    </tr>

                    <tr>
                        <td>D</td>
                        <td>
                            <input type="checkbox" class="seats" value="D1">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="D2">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="D3">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="D4">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="D5">
                        </td>
                        <td></td>
                        <td>
                            <input type="checkbox" class="seats" value="D6">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="D7">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="D8">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="D9">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="D10">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="D11">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="D12">
                        </td>
                    </tr>

                    <tr>
                        <td>E</td>
                        <td>
                            <input type="checkbox" class="seats" value="E1">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="E2">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="E3">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="E4">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="E5">
                        </td>
                        <td></td>
                        <td>
                            <input type="checkbox" class="seats" value="E6">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="E7">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="E8">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="E9">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="E10">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="E11">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="E12">
                        </td>
                    </tr>

                    <tr class="seatVGap"></tr>

                    <tr>
                        <td>F</td>
                        <td>
                            <input type="checkbox" class="seats" value="F1">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="F2">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="F3">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="F4">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="F5">
                        </td>
                        <td></td>
                        <td>
                            <input type="checkbox" class="seats" value="F6">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="F7">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="F8">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="F9">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="F10">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="F11">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="F12">
                        </td>
                    </tr>

                    <tr>
                        <td>G</td>
                        <td>
                            <input type="checkbox" class="seats" value="G1">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="G2">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="G3">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="G4">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="G5">
                        </td>
                        <td></td>
                        <td>
                            <input type="checkbox" class="seats" value="G6">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="G7">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="G8">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="G9">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="G10">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="G11">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="G12">
                        </td>
                    </tr>

                    <tr>
                        <td>H</td>
                        <td>
                            <input type="checkbox" class="seats" value="H1">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="H2">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="H3">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="H4">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="H5">
                        </td>
                        <td></td>
                        <td>
                            <input type="checkbox" class="seats" value="H6">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="H7">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="H8">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="H9">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="H10">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="H11">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="H12">
                        </td>
                    </tr>

                    <tr>
                        <td>I</td>
                        <td>
                            <input type="checkbox" class="seats" value="I1">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="I2">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="I3">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="I4">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="I5">
                        </td>
                        <td></td>
                        <td>
                            <input type="checkbox" class="seats" value="I6">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="I7">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="I8">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="I9">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="I10">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="I11">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="I12">
                        </td>
                    </tr>

                    <tr>
                        <td>J</td>
                        <td>
                            <input type="checkbox" class="seats" value="J1">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="J2">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="J3">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="J4">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="J5">
                        </td>
                        <td></td>
                        <td>
                            <input type="checkbox" class="seats" value="J6">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="J7">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="J8">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="J9">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="J10">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="J11">
                        </td>
                        <td>
                            <input type="checkbox" class="seats" value="J12">
                        </td>
                    </tr>
                </table>

                <div class="screen">
                    <h2 class="wthree">Screen this way</h2>
                </div>
                <button onclick="updateTextArea()">Confirm Selection</button>
               
            </div>
            <!-- //seat layout -->
            <!-- details after booking displayed here -->
            <div class="displayerBoxes txt-center" style="overflow-x:auto;">
                <table class="Displaytable w3ls-table" width="100%">
                    <tr>
                        <th>Name</th>
                        <th>Number of Seats</th>
                        <th>Seats</th>
                    </tr>
                    <tr>
                        <td>
                            <textarea id="nameDisplay"></textarea>
                        </td>
                        <td>
                            <textarea id="NumberDisplay" name='number'></textarea>
                        </td>
                        <td>
                            <textarea id="seatsDisplay" name='seats'></textarea>
                        </td>
                    </tr>
                    
                </table>
            </div>
            <div style="float: left">
            <form method="post" action="">
        <input type="hidden" name="name" id="nn" >
         <input type="hidden" name="number" id="nu" >
          <input type="hidden" name="seats" id="ss" >
          <button  name="submit" value="submit">NEXT</button>
    </form>
            </div>  
            <!-- //details after booking displayed here -->
        </div> 
    </div>
    
	<!---728x90--->

    
    <!-- js -->
    <script src="js/jquery-2.2.3.min.js"></script>
    <!-- //js -->
    <!-- script for seat selection -->
    <script language="javascript">
        function onLoaderFunc() {
            $(".seatStructure *").prop("disabled", true);
            $(".displayerBoxes *").prop("disabled", true);
        }

        function takeData() {
            if (($("#Username").val().length == 0) || ($("#Numseats").val().length == 0)) {
                alert("Please Enter your Name and Number of Seats");
            } else {
                $(".inputForm *").prop("disabled", true);
                $(".seatStructure *").prop("disabled", false);
                document.getElementById("notification").innerHTML =
                    "<b style='margin-bottom:0px;background:#ff9800;letter-spacing:1px;'>Please Select your Seats NOW!</b>";
            }
        }


        function updateTextArea() {

            if ($("input:checked").length == ($("#Numseats").val())) {
                $(".seatStructure *").prop("disabled", true);

                var allNameVals = [];
                var allNumberVals = [];
                var allSeatsVals = [];

                //Storing in Array
                allNameVals.push($("#Username").val());
                allNumberVals.push($("#Numseats").val());
                $('#seatsBlock :checked').each(function () {
                    allSeatsVals.push($(this).val());
                });

                //Displaying 
                $('#nameDisplay').val(allNameVals);
                $('#NumberDisplay').val(allNumberVals);
                $('#seatsDisplay').val(allSeatsVals);
                 $('#nn').val(allNameVals);
                $('#nu').val(allNumberVals);
                $('#ss').val(allSeatsVals);
                
              
            } else {
                alert("Please select " + ($("#Numseats").val()) + " seats")
            }
        }
        
        

        function myFunction() {
            alert($("input:checked").length);
        }

        /*
        function getCookie(cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
            for(var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }
        */


        $(":checkbox").click(function () {
            if ($("input:checked").length == ($("#Numseats").val())) {
                $(":checkbox").prop('disabled', true);
                $(':checked').prop('disabled', false);
            } else {
                $(":checkbox").prop('disabled', false);
            }
        });
    </script>
    <!-- //script for seat selection -->
    
</body>

</html>