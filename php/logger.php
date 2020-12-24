<?php

class Logger 
{
    private $logs = array();

    function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');   
    }
   
    function addLog($msg, $type = 'i')
    {
        if ($type == 'i')
        {
            $finalMsg = date("d-m H:i:s") . "=>[" . $type . "] ". $msg . "\n";
            array_push($this->logs, $finalMsg);
        }
        else if ($type == 'p' || $type == '+')
        {
            $finalMsg = date("d-m H:i:s") . "=>[" . $type . "] ". $msg . "\n";
            $finalMsg = "<p><span style=\"color: green;\"><strong>$finalMsg</strong></span></p>";
            array_push($this->logs, $finalMsg);
        }
        else if ($type == 'e' || $type == '-')
        {
            $finalMsg = date("d-m H:i:s") . "=>[" . $type . "] ". $msg . "\n";
            $finalMsg = "<p><span style=\"color: red;\"><strong>$finalMsg</strong></span></p>";
            array_push($this->logs, $finalMsg);

            $base =  $_SERVER['DOCUMENT_ROOT'];
            $file = fopen("$base/logs.txt", 'a');
            foreach ($this->logs as $log)
                fwrite($file, $log);
            fclose($file);
            $this->logs = array();
        }
    }

    function __destruct() 
    {
        $base =  $_SERVER['DOCUMENT_ROOT'];
        $file = fopen("$base/logs.txt", 'a');
        foreach ($this->logs as $log)
            fwrite($file, $log);
        fclose($file);
    }
}

?>