<?php
include_once('core/assembly.php');
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="export.xml"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');

$people = $db->get('person');
$xml = "<?xml version='1.0' encoding='UTF-8'?>";
$xml .= '<compendium version="5">';

foreach ($people as $person) {
    $xml .= '<monster>';
    $xml .= '<name>'.$person['name'].'</name>';
    $xml .= '<size>M</size>';
    $xml .= '<type>'.$person['race'].' '.$person['class'].'</type>';
    $xml .= '<str>'.$person['str'].'</str>';
    $xml .= '<dex>'.$person['dex'].'</dex>';
    $xml .= '<con>'.$person['con'].'</con>';
    $xml .= '<int>'.$person['int'].'</int>';
    $xml .= '<wis>'.$person['wis'].'</wis>';
    $xml .= '<cha>'.$person['cha'].'</cha>';
    $xml .= '</monster>';
}

$xml .= '</compendium>';
echo $xml;

        // <alignment>neutral good</alignment>
        // <ac>12</ac>
        // <hp>13 (3d8)</hp>
        // <speed>20 ft., fly 50 ft.</speed>
        // <skill>Perception +5</skill>
        // <passive>15</passive>
        // <languages>Auran, Aarakocra</languages>
        // <cr>1/4</cr>
        // <trait>
        //     <name>Dive Attack</name>
        //     <text>If the aarakocra is flying and dives at least 30 ft. straight toward a target and then hits it with a melee weapon attack, the attack deals an extra 3 (1d6) damage to the target.</text>
        //     <attack>Dive Attack||1d6</attack>
        // </trait>
        // <action>
        //     <name>Talon</name>
        //     <text>Melee Weapon Attack: +4 to hit, reach 5 ft., one target. Hit: 4 (1d4 + 2) slashing damage.</text>
        //     <attack>Talon|4|1d4+2</attack>
        // </action>
        // <action>
        //     <name>Javelin</name>
        //     <text>Melee or Ranged Weapon Attack: +4 to hit, reach 5 ft. or range 30/120 ft., one target. Hit: 5 (1d6 + 2) piercing damage.</text>
        //     <attack>Javelin|4|1d6+2</attack>
        // </action>
        // <action>
        //     <name>Summon Air Elemental</name>
        //     <text>Five aarakocra within 30 feet of each other can magically summon an air elemental. Each of the five must use its action and movement on three consecutive turns to perform an aerial dance and must maintain concentration while doing so (as if concentrating on a spell). When all five have finished their third turn of the dance, the elemental appears in an unoccupied space within 60 feet of them. It is friendly toward them and obeys their spoken commands. It remains for 1 hour, until it or all its summoners die, or until any of its summoners dismisses it as a bonus action. A summoner can't perform the dance again until it finishes a short rest. When the elemental returns to the Elemental Plane of Air, any aarakocra within 5 feet of it can return with it.</text>
        // </action>
?>
