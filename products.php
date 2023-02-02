<html>

<head>
    <style>
        .item {
            border: 2px solid red;
            border-radius: 30px;
            margin: 2px;
            padding: 25px;
            display: flex;
            width: 12em;
            height: fit-content;
            align-self: center;
            justify-content: center;
            background-color: white;
        }
    </style>
    <title>Buy now</title>
</head>

<body
    background='https://www.hdwallpapers.in/download/dark_light_yellow_lines_background_material_design_hd_abstract-HD.jpg'
    style="background-attachment:fixed">

    <div>
        <h1 style=text-align:center>Products from mongodb</h1>
        <h2><a href='index.php'>&lt;&lt;Home</a></h2>

        <div style=display:flex;flex-wrap:wrap;flex-direction:row;margin:10px>

            <?php
            $manager = new MongoDB\Driver\Manager(
                'mongodb+srv://twinkle:1234@cluster0.jqk7zdi.mongodb.net/?retryWrites=true&w=majority'
            );

            $filter = array();
            $options = array('limit' => 100);
            $query = new MongoDB\Driver\Query($filter, $options);
            $products = $manager->executeQuery('test.products', $query);

            foreach ($products->toArray() as $document) {
                echo '<div class=item>';

                foreach ($document as $key => $value) {
                    echo $key . " : " . $value . "<br>";
                }
                echo "</div>";
            }
            ?>

            <div class=item style="font-size:xxx-large;width:fit-content">+</div>
        </div>
    </div>
</body>

</html>