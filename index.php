<?php  
    $unix = null;
    $nat = null;
    if(isset($_GET["date"])) {
        $date = $_GET["date"];
        
        $pattern = '/^[0-9]{10}$/';
        
        if(preg_match($pattern, $date)) {
            $nat = date("F d, Y", $date);
            $unix = $date;
        } else {
            $unix = strtotime($date);
            $nat = date("F d, Y", $unix);
        }
    }
    $data = array(
        "unix" => $unix,
        "natural" => $nat
        );
    
    header("Content-type: application/json");
    print json_encode($data);
    
?>
