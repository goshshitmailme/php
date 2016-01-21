<?php
// psr-2
$a = 2.3;
$b = 3;
$text = "sdfgfdsd";
$bool = true; // Comment
$int = (float)"43.54";

//array
/*$arr = array ();
$arr = [
    "one" => 1,
    "two" => 2,
    3,
];
$arr = [
    4 => 1,
    2,
    3,
];*/

//object
//resource


//echo $bool;


//echo $int;

//var_dump($text);
//var_dump($arr);
//echo $arr["one"];

$serverLangs = [
    "php",
    "python",
    "ruby",
    "fdsfd"
];
// $serverLangs[] = "ruby";
// $serverLangs[] = "JavaScript";
//unset($serverLangs[3]);
//die("fdfdf");

$clientLangs = [
    "JavaScript",
];

$langs = [
    "server" => $serverLangs,
    "client" => $clientLangs
];
//$langs["server"][]="ruby";

//var_dump($langs);
//print $langs[0][2];
// $c = count($langs["server"]);
// for ($i = 0, $c = count($langs["server"]); $i < $c; $i++) {
// //    print $langs["server"][$i];

// }

// foreach ($langs as $key => $lang) {
//     for ($i = 0, $c = count($langs[$key]); $i < $c; $i++) {
// //        print $lang[$i];
//     }
// }

// print "<ul>" . "\n";
// foreach ($langs as $langGroup) {
//     foreach ($langGroup as $lang) {
// //        print "<li>";
// //        print $lang;
// //        print "</li>";
// //        print "<li>" . $lang . "</li>";
//         print "\t<li>{$lang}</li>\n";
// //        print '<li>$lang</li>';

//     }
// }
// print "</ul>";
//var_dump($langs);
//print_r($langs);



// foreach ($langs as $langGroup) {
//     foreach ($langGroup as $lang) {
// //        print "<li>";
// //        print $lang;
// //        print "</li>";
// //        print "<li>" . $lang . "</li>";
//         print "\t<li>{$lang}</li>\n";
// //        print '<li>$lang</li>';

//     }
// }
// array_merge();
?>

<ul>
    <?php 
    foreach ($langs as $langGroup) {
        foreach ($langGroup as $index => $lang) :
    ?>
            <li<?php if ($index % 2) :?> style="background-color: #999"<?php endif; ?>><?php print $lang; ?></li>
    <?php 
        endforeach;
    }
    ?>
</ul>

