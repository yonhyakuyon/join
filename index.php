<?
require_once 'Database.php';
require_once 'RoomDisplay.php';

$database = new Database("localhost", "root", "", "university");
$rooms1 = $database->getRoomsWithHighCeilings();
$rooms2 = $database->getLaboratories();

require_once 'output.php';