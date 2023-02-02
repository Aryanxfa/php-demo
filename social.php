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
            height: fit-content;
            align-self: center;
            justify-content: center;
            background-color: linen;
        }
    </style>
    <title>Social Page</title>
</head>

<body>
    <h1 style=text-align:center>Parsing data from JSON</h1>
    <h2><a href='index.php'>&lt;&lt;Home</a></h2>

    <div style=display:flex;flex-wrap:wrap;flex-direction:row;margin:10px>

        <?php
        $api_url = 'https://jsonplaceholder.typicode.com/posts';
        $json_data = file_get_contents($api_url);
        $decoded = json_decode($json_data);

        foreach ($decoded as $eachpost) {
            echo '<div class=item>';
            foreach ($eachpost as $key => $value) {
                echo $key . " : " . substr($value, rand(0, 10), rand(0, 1000)) . "<br>";
            }
            echo "</div>";
        }
        ?>
    </div>
</body>

</html>