<?php
if (isset($_POST['add'])) {
    echo "Adding to Database";
    echo "<br>";
}
if (isset($_POST['importcsv'])) {
    echo "Importing CSV to Database";
    echo "<br>";
}
if (isset($_POST['submit'])) {
    echo "Current File: " . $_FILES['fileToUpload']['name'];
    echo "<br>";
}
if (isset($_POST['submit'])) {
    echo "Current File: " . $_FILES['fileToUpload']['name'];
    echo "<br>";
}
if (isset($_POST['wipedb'])) {
    echo "Wiping Database...";
    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->delete(['x' => 1], ['limit' => 1]);
    $result = $manager->executeBulkWrite('db.collection', $bulk);
}
?>