<?php
$xml_data = $_POST['xml-data'];

// if (isset($xml_data)) {
    $xml = simplexml_load_string($xml_data);
    $json = json_decode($xml);
    echo $json;
// }

// function xmlToJson($xml_data){
//     $xml = simplexml_load_string($xml_data);
//     $json = json_decode($xml);
//     return $json;
// }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XML to Json</title>
</head>
<body>
    <form method="post">
        <textarea name="xml-data" id="xml-data" cols="30" rows="10"></textarea>
        <button type="submit">Convert</button>
    </form>
    <div class="">
        <?php
        // echo $json;
        ?>
    </div>
</body>
</html>