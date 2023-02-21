<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 1: Toyota</title>
    <link href="styles.css"  rel="stylesheet">
</head>
<body>
    <h1><a href="https://www.toyota.ca/toyota/en/"><img class="emblem" src="/images/toyota/toyota.png" alt="Toyota emblem" width="500"></a></h1>
    <h1>Products Currently Available in Canada</h1>


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
    FROM toyota
    ORDER BY id";
    $result = mysqli_query($connect, $query) or die(mysqli_error());

    // echo "Number of rows ".mysqli_num_rows($result);
    echo '<div class="container">';
    while($product = mysqli_fetch_assoc($result))
    {
        $hybrid = $product['hybrid'];
        // echo '<p>'.$hybrid.'</p>';
        // echo '<p>'.$product['hybrid'].'</p>';
        $hybridLeaf = "";

        if ($hybrid === '1')
        {
            $hybridLeaf = " <img src=\"/images/toyota/hybrid.png\">";
        } else {
            $hybridLeaf = "";
        }

        echo '<div class="product">';
        echo '<h2>'.$product['year'].' '.$product['model'].$hybridLeaf.'</h2>';
        echo '<p>Starts at: $'.number_format($product['price'], 0, '.', ',').'</p>';
        echo '<img src="/images/toyota/'.$product['preview'].'" alt="Preview of '.$product['year'].' '.$product['model'].'" width="300"><br>';
        echo '<p class="desc">Trim shown above: '.$product['previewed_trim'].'</p>';
        echo '<p><a href="'.$product['explore'].'">Explore</a>'.' | '.'<a href="'.$product['build_pricing'].'">Build & Price</a></p>';
        echo '</div>';
    }
    echo '</div>';
    // Toyota logo/emblem found at: https://commons.wikimedia.org/wiki/File:Toyota.svg
    // All Toyota vehicle model previews, information, links, icons, etc. taken from: https://www.toyota.ca and are trademarked, copyrighted, and owned by Toyota; Kee-Fung Anthony is no affiliated with Toyota and is using said properties for academic and recreational purposes.
    ?>
</body>
</html>