<html>

<head>
    <style>
        .item {
            border: 2px solid darkblue;
            border-radius: 30px;
            margin: 2px;
            padding: 25px;
            display: flex;
            width: 12em;
            justify-content: center;
            align-items: center;
            background-color:linen;
        }
    </style>
    <title>hello PHP</title>
</head>

<body>
    <?php
    echo "<h1 style=text-align:center>Social Network</h1>";
    echo "<br>";
    ?>

    <div style=display:flex;flex-wrap:wrap;flex-direction:row;margin:10px>

        <?php
        $api_url = 'https://jsonplaceholder.typicode.com/posts';
        $json_data = file_get_contents($api_url);
        $decoded = json_decode($json_data);

        foreach ($decoded as $eachpost) {
            echo '<div class=item>';
            foreach ($eachpost as $key => $value) {
                echo $key . " : " . substr($value,rand(0,10),rand(0,1000)) . "<br>";
            }
            echo "</div>";
        }
        ?>
    </div>
</body>

</html>