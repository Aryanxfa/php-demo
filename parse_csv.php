<html>

<head>
    <style>
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
    <title>CSV Viewer</title>
</head>

<body
    background='https://4kwallpapers.com/images/wallpapers/macos-big-sur-apple-layers-fluidic-colorful-wwdc-stock-1920x1080-1455.jpg'
    style="background-attachment:fixed">

    <div>
        <h1 style=text-align:center>Parsing data from CSV</h1>
        <h2><a href='index.php'>&lt;&lt;Home</a></h2>
        <form action="parse_csv.php" method="post" enctype="multipart/form-data">
            Select CSV to upload:
            <input type="hidden" name="MAX_FILE_SIZE" value="1000000000" />
            <input type="file" name="fileToUpload" id="fileToUpload" />
            <input type="submit" value="Upload CSV" name="submit" />
        </form>

        <?php
        if (isset($_POST['submit'])) {
            echo "Current File: " . $_FILES['fileToUpload']['name'];
            echo "<br>";
        }
        ?>
        <div style=display:flex;flex-wrap:wrap;flex-direction:row;margin:10px>

            <?php
            if (isset($_POST['submit'])) {
                $tmpName = $_FILES['fileToUpload']['tmp_name'];
                $csvAsArray = array_map('str_getcsv', file($tmpName));
                $header = array_shift($csvAsArray);

                foreach ($csvAsArray as $document) {
                    echo '<div class=item>';
                    foreach ($document as $key => $value) {
                        echo $header[$key] . " : " . $value . "<br>";
                    }
                    echo "</div>";
                }
            }
            ?>

        </div>
    </div>
</body>

</html>