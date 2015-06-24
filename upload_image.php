 <!DOCTYPE html>
<html lang="en">

<head>
    <title>GALLERi Image Viewer</title>
    
    <link href="styles/galleri.css"     		 rel="stylesheet" type="text/css">
    
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="/scripts/navigation.js"></script>
</head>

<body class="g-font">

    <h1>Welcome to GALLERi Uploader</h1>
    <h2>View some art</h2>
    
    <?php 
	$server = "tcp:m0oyvtw1iy.database.windows.net,1433"; 
	$user = "usr_sage@m0oyvtw1iy";
	$pwd = "90MB26#!";
	$db = "GalleriDB";

    $conn = sqlsrv_connect($server, array("UID"=>$user, "PWD"=>$pwd, "Database"=>$db));
    if( $conn ) {
         echo "Connection established.<br />";
    }else{
         echo "Connection could not be established.<br />";
         die( print_r( sqlsrv_errors(), true));
    }

    if(($result = sqlsrv_query($conn,"SELECT * FROM TestImages")) !== false){
        echo "found something";
        while( $row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC) ) {
            echo "<br>".$row['ID'].", ".$row['Name']."</br>";
        }
    }
    ?> 
    
    
</body>
</html> 