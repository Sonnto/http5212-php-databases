<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week 5: Databases: Countries</title>
    <link href="styles.css"  rel="stylesheet">
</head>
<body>
    <h1>List of Countries</h1>

    <?php
    $connect = mysqli_connect(
        'sql200.epizy.com',//Host
        'epiz_33366090',//Username
        'ztp5toRTZu61M',//Password
        'epiz_33366090_test'//Database
    );

    if(mysqli_connect_errno())
    {
        echo mysqli_connect_error();
        exit();
    }

    $query = "SELECT *
    FROM countries
    ORDER BY name";
    $result = mysqli_query($connect, $query) or die(mysqli_error());

    // echo "Number of rows ".mysqli_num_rows($result);
    echo '<div class="container">';
    while($record = mysqli_fetch_assoc($result))
    {
       // print_r($record);
       echo '<div class="country">';
       echo '<h2>'.$record['name'].'</h2>';
       echo '<img src="/images/'.$record['flag'].'" width="200">';
       echo '<p>Population: '.number_format($record['population'], 0, '.', ',').'<br>';

       if($record['population'] < 1000000)
       {
            echo '&lt; &#9787;';
       }
       else
       {
            $faces = round($record['population'] / 1000000);
            for($i = 0; $i < $faces; $i++)
            {
                echo '&#9787';
            }
       }
       echo '</p>';
       echo '</div>';
    }
    echo '</div>';

    ?>

</body>
</html>