<?php
if (isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/^(curl)/i', $_SERVER['HTTP_USER_AGENT'])) {
    require_once 'table/Table.php';
    // require_once 'table/Color.php';
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
        array('New Cases', 'Critical','Todays Deaths','Total Deaths','Total Cases','Recovered')
    );
    $tbl->addRow(array(strval($decode['todayCases']), 
    strval($decode['critical']), 
    strval($decode['todayDeaths']), 
    strval($decode['deaths']), 
    strval($decode['cases']),
    strval($decode['recovered'])
    ));
    echo "PHILIPPINES COVID-19 TRACKER REALTIME DATA \n";
    echo "\n";
    echo $tbl->getTable();
    echo "\n";
    echo "COVID-19 RealTime Data PHP version Made By: Miles Balatar\n";
    echo "Data:source = https://www.worldometers.info/coronavirus/ \n";
}
else {
    echo 'CLI lang pwede sir try mo to curl http://www.covid19-ph-tracker.ga/';
    exit();
}


?>
