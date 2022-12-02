<?php

function isValidDate($date, $format= 'd-m-Y'){
    return $date == date($format, strtotime($date));
}
 function formatDate($date, $format= 'Y-m-d'){
     return date($format, strtotime($date));
 }
?>