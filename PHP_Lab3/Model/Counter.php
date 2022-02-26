<?php

class Counter
{
    public static function increase()
    {
        $line = file("count.txt"); //array
        $line[0]++;

        $fp = fopen("count.txt", 'w');
        fwrite($fp,  $line[0]++);
        fclose($fp);

    }
}