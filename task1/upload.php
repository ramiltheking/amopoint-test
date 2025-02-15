<?php

function getWordEnd($n, $titles) {
    $cases = array(2, 0, 1, 1, 1, 2);
    return $titles[($n % 100 > 4 && $n % 100 < 20) ? 2 : $cases[min($n % 10, 5)]];
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file']) && isset($_POST['separator'])){

    $uploadDir = __DIR__ ."/files/";
    $extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
    $fileName = time() . "." . $extension; 
    $targetPath = $uploadDir . $fileName;

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetPath)) {
        $content = file_get_contents($targetPath);
        $lines = explode("\n", $content);
        $delimiter = $_POST['separator']; 

        $result = [];
        foreach ($lines as $line) {
            $parts = explode($delimiter, $line);
            foreach ($parts as $part) {
                $count = preg_match_all('/\d/', $part);
                $result[] = $part . " = $count ".getWordEnd($count, ["цифра", "цифры", "цифр"])." в строке<br>";
            }
        }

        echo implode("", $result);
        return ["status" => "success"];
    }

    return http_response_code(500);

}