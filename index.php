<?php  
    $unix = null;
    $nat = null;
    if(isset($_GET["d"])) {
        $date = $_GET["d"];
        
        $pattern = '/^[0-9]{10}$/';
        
        if(preg_match($pattern, $date)) {
            $nat = date("F d, Y", $date);
            $unix = $date;
        } else if(strtotime($date)) {
            $unix = strtotime($date);
            $nat = date("F d, Y", $unix);
        } else {
            $unix = null;
            $nat = null;
        }
    
        $data = array(
            "unix" => $unix,
            "natural" => $nat
            );
        
        header("Content-type: application/json");
        print json_encode($data);
    } else {
        ?>
        <!DOCTYPE html>
            <html>
            <head>
            	<title>Time stamp service</title>
            </head>
            <body>
                <h1>Time Stamp Micro Service</h1>
                <p>Access this service passing a unix timestamp with: <code>"https://timestamp12.herokuapp.com/?d=1450137600"</code></p>
                <p>Or a natural date with: <code>"https://timestamp12.herokuapp.com/?d=December%2015,%202015"</code></p>
                <p>Visit https://github.com/allen26x/timestamp to view code.</p>
            </body>
            </html>
                    
        
        <?php
    }
?>
