<?php
if (isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/^(curl)/i', $_SERVER['HTTP_USER_AGENT'])) {
    require_once 'table/Table.php';
    require_once 'table/Color.php';
    echo "\n";
    echo "\n";
    $curl = curl_init('https://corona.lmao.ninja/countries/philippines');
    curl_setopt($curl, CURLOPT_FAILONERROR, true);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  
    $result = curl_exec($curl);
    $decode = json_decode($result,true);
    $tbl = new Console_Table();
    $tbl->setHeaders(
        array('Today New Cases', 'Critical','Todays Deaths','Total Deaths','Total Cases')
    );
    $tbl->addRow(array($decode['todayCases'], $decode['critical'], $decode['todayDeaths'], $decode['deaths'], $decode['cases'],));
    echo Console_Color::convert("%yPHILIPPINES COVID-19 TRACKER REALTIME DATA %n\n");
    echo "\n";
    echo $tbl->getTable();
    echo "\n";
    echo Console_Color::convert("%yCOVID-19 RealTime Data PHP version Made By:%n %bMiles Balatar%n\n");
    echo Console_Color::convert("%yData:source = https://www.worldometers.info/coronavirus/ %n\n");
}
else {
    echo 'Sorry, Curl only available at the moment... try curl';
    exit();
}


?>