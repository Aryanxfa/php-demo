<?php

$manager = new MongoDB\Driver\Manager(
    'mongodb+srv://twinkle:1234@cluster0.jqk7zdi.mongodb.net/?retryWrites=true&w=majority'
);
$bulk = new MongoDB\Driver\BulkWrite;

if (isset($_POST['add'])) {
    echo "Adding Entry to Database";
}
if (isset($_POST['importcsv'])) {
    echo "Current File: " . $_FILES['fileToUpload']['name'];
    echo "Importing CSV to Database";
}
if (isset($_POST['exportcsv'])) {
    echo "Exporting Database as CSV";
}
if (isset($_POST['wipedb'])) {
    echo "Wiping Database...";
    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->delete(['x' => 1], ['limit' => 1]);
    $result = $manager->executeBulkWrite('db.collection', $bulk);
}
?>