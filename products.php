<html>

<head>
    <style>
        #parent * {
            margin: 5px 0;
            width: 250px;
        }

        .item {
            border: 2px solid red;
            border-radius: 30px;
            margin: 2px;
            padding: 25px;
            display: flex;
            width: fit-content;
            height: fit-content;
            align-self: center;
            justify-content: center;
            background-color: white;
        }
    </style>
    <title>Product page</title>
</head>

<body
    background='https://www.hdwallpapers.in/download/dark_light_yellow_lines_background_material_design_hd_abstract-1920x1080.jpg'
    style="background-attachment:fixed">

    <div>
        <h1 style=text-align:center>Parsing data from mongodb</h1>
        <h2><a href='index.php'>&lt;&lt;Home</a></h2>

        <div style=display:flex;flex-wrap:wrap;flex-direction:row;margin:10px>
            <div class="item" id="parent">
                <form action="mongo_internal.php" method="post">
                    <h4>Add New Entry</h4>
                    <input type="text" placeholder="Enter Email" name="email">
                    <input type="text" placeholder="Enter UserID" name="userid">
                    <input type="password" placeholder="Enter Password" name="password">
                    <button type="submit" name="add" class="btn">Add Entry</button>
                </form>
            </div>
            <div class="item" id="parent">
                <form action="mongo_internal.php" method="post" enctype="multipart/form-data">
                    <h4>CSV Operations:</h4>
                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000000" />
                    <input type="file" name="fileToUpload" id="fileToUpload" />
                    <button type="submit" name="importcsv">Import CSV</button>
                    <button type="submit" name="exportcsv">Export CSV</button>
                </form>
            </div>
            <div class="item" id="parent">
                <form action="mongo_internal.php" method="post" enctype="multipart/form-data">
                    <h4>Delete Operations:</h4>
                    <button type="submit" name="wipedb" style="color:red">Wipe All Data</button>
                </form>
            </div>
        </div>
        <hr style="border:1px solid grey;margin-left:1%;margin-right:1%">
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
        </div>
    </div>
</body>

</html>