<?php
error_reporting(0);
    $key='AIQBMUBVMJBXFCWH';
    $ch='1713074';
    $url='https://api.thingspeak.com/channels/'.$ch.'/feeds/last.json?api_key='.$key;

    $data=json_decode(file_get_contents($url),true);
    $r=$data ['field4'];
    $g=$data ['field5'];
    $b=$data ['field6'];
    
    $mos=$data ['field3'];

    $r_max=350;
    $g_max=350;
    $b_max=350;

    $r_min=-10;
    $g_min=20;
    $b_min=20;

    if($r<$r_max&&$r>$r_min){
        if($g<$g_max&&$g>$g_min){
            if($b<$b_max&&$b>$b_min){
                $result='Healthy';
            }
        }
    }else{
        $result='Diseased';
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temperature and Humidity Sensor</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="./css/bootstrap.css" />
    <link rel="stylesheet" href="./css/all.min.css" />
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-toma">

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a href="" class="navbar-brand">Tomato</a>
            <ul class="navbar-nav ms-auto">
                <li><a href="index.html" class="nav-link">Home</a></li>
                
                <li><a href="value.html" class="nav-link">Data</a></li>

				
				<li class="nav-item dropdown">
				  <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					Features
				  </a>
				  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
					<li><a class="dropdown-item" href="detail\temp1.html">DHT11 Sensor</a></li>
					<li><a class="dropdown-item" href="detail\temp2.html">Benefit of DHT11 Sensor</a></li>
					<li><a class="dropdown-item" href="detail\soil1.html">Soil Moisture Sensor</a></li>
					<li><a class="dropdown-item" href="detail\soil2.html">Benefits of Soil Moisture Sensor</a></li>
					<li><a class="dropdown-item" href="detail\col1.html">Color Sensor</a></li>
					<li><a class="dropdown-item" href="detail\col2.html">Benefits of Color Sensor</a></li>
				  </ul>
				</li>
		
		
            </ul>
        </div>
    </nav>
	
	
    <section>
        
            <div class="col-xl-7 py-5 bg-cs">
                <div class="container" >
                    <div class="c-font">
                        <h1 align="center"  >Sensor Data Show</h1>
							<table class="center" border=2 bordercolor="#0000FF">
							
							
							<tr><td><h4 align="center" >Temperature</h4></td>
							<td><h4 align="center" >Humidity</h4></td>
							<td><h4 align="center" >Soil Moisture</h4></td></tr>
							
							
							<tr><td>
							<iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/1713074/widgets/468699"></iframe>
							</td>
							<td><iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/1713074/widgets/468702"></iframe>
							</td>
							<td><iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/1713074/widgets/477044"></iframe>
							</td>

						</tr>
						
						
						
						
							<tr><td><h4 align="center" >Red</h4></td>
							<td><h4 align="center" >Green</h4></td>
							<td><h4 align="center" >Blue</h4></td></tr>
							
							
						<tr>
							<td><iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/1713074/widgets/478151"></iframe>
						</td>
						</td>
							<td><iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/1713074/widgets/478153"></iframe>
						</td>
							<td><iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/1713074/widgets/478154"></iframe>
						</td>	
						
						</tr>
						
						
						
							<tr>
							<td align="center"><h4 align="center" > Tomato Health</h4></td></tr>
							
						
						<tr>


							
							
							<td align="center" ><span style="color:Tomato;">
								<?php
									echo $result;
								?></span>
							</td>
						</tr>
						
							</td>
							</table>
                    </div>
                </div>
            </div>
    </section>
	
	<script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js">
        </script>
        <script type="text/javascript">
        (function(){
            emailjs.init("GqgESTI0bP72Vukx4");
        })();
        </script>
    <?php
    if($mos<10){
        echo '<script>
            emailjs.send("service_0xn118h","template_id51rpt",{
            from_name: "Aurnab",
            to_name: "Sabbir",
            message: "Warning!!! Soil Moisture at : '.$mos.' %",
            reply_to: "testetest",
            });
            </script>';
    }
    ?>
</body>
</html>

