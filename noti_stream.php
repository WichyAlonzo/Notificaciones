<?php
    $jsonFile = 'noti.json';
    // $jsonFile = $_SERVER['DOCUMENT_ROOT'] . '/noti.json';
    header('Content-Type: text/event-stream');
    header('Cache-Control: no-cache');
    header('Connection: keep-alive');

    function sendEvent($data) {
        echo "event: message\n";
        echo "data: " . json_encode($data) . "\n\n";
        ob_flush();
        flush();
    }

    function checkFileChanges($jsonFile) {
        static $lastModifiedTime = null;
        clearstatcache();
        $currentModifiedTime = filemtime($jsonFile);
        if ($currentModifiedTime !== $lastModifiedTime) {
            $lastModifiedTime = $currentModifiedTime;
            $jsonContent = file_get_contents($jsonFile);
            $jsonData = json_decode($jsonContent, true);
            $lastData = end($jsonData);
            sendEvent($lastData);
            return true;

        }
        return false;

    }

    if (checkFileChanges($jsonFile)) {
        sleep(1);
    }

    while (true) {
        if (!checkFileChanges($jsonFile)) {
            usleep(100000);
        }
    }
?>
