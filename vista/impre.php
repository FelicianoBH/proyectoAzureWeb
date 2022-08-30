<?php

 

$handle = printer_open('\\\192.168.1.59\HP Deskjet 1050 j410 series');

printer_start_doc($handle, "TITULO DEL DOCUMENTO A IMPRIMIR");

printer_set_option($handle, PRINTER_MODE, "RAW");

printer_set_option($handle, PRINTER_COPIES, 1);

 

printer_start_page($handle);

printer_write($handle, "Esto debe imprimir ! :)");

printer_end_page($handle);

printer_end_doc($handle);

printer_close($handle);

?>

