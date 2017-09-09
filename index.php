<?php
include'geoip2.phar';

use GeoIp2\Database\Reader;

// This creates the Reader object, which should be reused across
// lookups.
$reader = new Reader('GeoLite2-City.mmdb');

// Replace "city" with the appropriate method for your database, e.g.,
// "country".

$ip = $_SERVER['REMOTE_ADDR'];

$record = $reader->city("190.67.252.39");

echo "Codigo de pais: ".$record->country->isoCode . "<br />"; // 'US'
echo "Pais: ".$record->country->name . "<br />"; // 'United States'

print($record->country->names['zh-CN'] . "\n"); // '美国'

echo " <br /> Departamento: ".$record->mostSpecificSubdivision->name . "<br />"; // 'Minnesota'

echo "Codigo Departamento: ".$record->mostSpecificSubdivision->isoCode . "<br />"; // 'MN'

echo "Ciudad: ".$record->city->name . "<br />"; // 'Minneapolis'

echo "codigo postal: " .$record->postal->code . "<br />"; // '55455'

echo "latitud: ". $record->location->latitude . "<br />"; // 44.9733

echo "longitud: ". $record->location->longitude . "<br />"; // -93.2323

?>
