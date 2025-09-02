<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Decode the incoming base64 image
    $imageData = $_POST['image'] ?? null;

    if ($imageData) {
        $image = base64_decode(str_replace('data:image/png;base64,', '', $imageData));

        $filename = 'uploads/' . time() . '.png';

        // Create uploads folder if it doesn't exist
        if (!file_exists('uploads')) {
            mkdir('uploads', 0777, true);
        }

        if (file_put_contents($filename, $image)) {
            echo "File saved as $filename";
        } else {
            echo "Error saving file!";
        }
    } else {
        echo "No image data received.";
    }
} else {
    echo "Invalid request.";
}
?>
