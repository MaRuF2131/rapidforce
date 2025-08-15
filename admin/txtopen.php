<?php
function read() {
    $filePath = "admin/text.txt";
    
    if (!file_exists($filePath)) {
        die("Unable to open file: File does not exist");
    }

    $txt = file_get_contents($filePath);
    if ($txt === false) {
        die("Unable to open file: Error reading file");
    }

    return $txt;
}
?>
