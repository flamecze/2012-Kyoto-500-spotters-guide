<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="robots" content="noindex,nofollow">
<meta name="Author" content="Martin Kapal">
<meta name="Keywords" content="lfs, live, for, speed">
<link rel="stylesheet" type="text/css" href="reset.css">
<link rel="stylesheet" type="text/css" href="css.css">

<!--[if IE]>
<link rel="stylesheet" type="text/css" href="ie.css">
<![endif]-->

<title>2012 Kyoto 500 Spotters Guide</title>

</head>

<body>

<p id="links">
    <a href="http://www.newdimensionracing.com">New Dimension Racing</a>&nbsp;&nbsp;&nbsp;
    <a href="http://www.lfsforum.net/forumdisplay.php?f=190">LFSForum Thread</a>&nbsp;&nbsp;&nbsp;
    <a href="https://docs.google.com/spreadsheet/ccc?key=0AsF_dCXxE3EldGxEbi1KYVgzWTQ4NmowSXlWRWpra0E">Qualifying Results</a>&nbsp;&nbsp;&nbsp;
    <a href="http://www.livestream.com/ndrtv">Race Broadcast</a>&nbsp;&nbsp;&nbsp;
    <a href="http://lfsworld.net/remote/?h=NDR.LFSCART">LFS Remote</a>&nbsp;&nbsp;&nbsp;
</p>

<div id="header"></div>

<?php
require_once ('../inc/mysql_con.php');

echo '<div id="grid">' . "\n";

function ordinal($num)
{
    // Special case "teenth"
    if ( ($num / 10) % 10 !== 1 )
    {
        // Handle 1st, 2nd, 3rd
        switch( $num % 10 )
        {
            case 1: return $num . 'st';
            case 2: return $num . 'nd';
            case 3: return $num . 'rd';
        }
    }
    // Everything else is "nth"
    return $num . 'th';
}

$select = 'SELECT id, username, name, team, country, time, position FROM kyoto500_grid ORDER BY position ASC';
if ($query = mysql_query ($select))
{
    while (list ($id, $username, $name, $team, $country, $time, $position) = mysql_fetch_row ($query))
    {
        $qual_time = ($id === 10) ? '<span id="quali">' . number_format($time, 4) . ' <abbr title="Pole Position" style="color: darkred">(PP)</abbr></span>' : '<span id="quali"><abbr title="' . sprintf('%+.4f', $time - 36.9675) . '">' . number_format($time, 4) . '</abbr></span>';

        echo '<div id="block">' . "\n";
            echo '<div id="number">' . $id . '</div>' . "\n";
            echo '<div style="float: right;">' . "\n";
                echo '<div id="flag_name"><img id="flag" title="' . $country . '" alt="' . $country . '" src="flags/' . $country . '.png" /><a href="http://www.lfsworld.net/?win=stats&racer=' . urlencode($username) . '" title="View LFSWorld Statistics" target="_blank">' . $name . '</a>' . $qual_time . '</div>' . "\n";
                echo '<div id="team">' . $team . '</div>' . "\n";
                echo "<div style=\"width: 260px; height: 68px; background: transparent url('cars/" . $id . ".png') center center no-repeat\"></div>\n";
            echo '</div>' . "\n";
        echo '</div>' . "\n";
    }
}

echo '</div>' . "\n";

?>

<h1>Reserve Drivers</h1>

<?php

echo '<div id="grid">' . "\n";

    echo '<div style="float: left">';

$select = 'SELECT id, username, name, team, country, time, position FROM kyoto500_reserve ORDER BY position ASC';
if ($query = mysql_query ($select))
{
    while (list ($id, $username, $name, $team, $country, $time, $position) = mysql_fetch_row ($query))
    {
        $qual_time = ($id === 10) ? '<span id="quali">' . number_format($time, 4) . ' <abbr title="Pole Position" style="color: darkred">(PP)</abbr></span>' : '<span id="quali"><abbr title="' . sprintf("%+.4f", $time - 36.9675) . '">' . number_format($time, 4) . '</abbr></span>';

        echo '<div id="block2">' . "\n";
            echo '<div id="number">' . $id . '</div>' . "\n";
            echo '<div style="float: right;">' . "\n";
                echo '<div id="flag_name"><img id="flag" title="' . $country . '" alt="' . $country . '" src="flags/' . $country . '.png" /><a href="http://www.lfsworld.net/?win=stats&racer=' . urlencode($username) . '" title="View LFSWorld Statistics" target="_blank">' . $name . '</a>' . $qual_time . '</div>' . "\n";
                echo '<div id="team">' . $team . '</div>' . "\n";
                echo "<div style=\"width: 260px; height: 68px; background: transparent url('cars/" . $id . ".png') center center no-repeat\"></div>\n";
            echo '</div>' . "\n";
        echo '</div>' . "\n";
    }
}
?>
    </div>


    <p id="clickimg">Click image for bigger version</p>
    <a target="_blank" href="2012_Kyoto500_TrackMap.png"><img src="2012_Kyoto500_TrackMapSmall.png" /></a>

    <p id="track_info">
    <span>Kyoto Ring Oval</span><br />
    Circuit length: 2.980 km / 1.852 miles<br />
    Pit lane speed: 80 kph / 50 mph<br />
    Race distance: 268 laps / 500 miles / 804.672 km<br />
    Banking: T1 17°-21°  / T2 16°-21° / T3 11°-15°
    </p>

    <p style="font-size: 18px; font-weight: bold; text-indent: 5px;">Course Cars</p>

        <div id="block3">
            <div id="number3">SC</div>
            <div style="float: right;">
                <div id="flag_name"><img id="flag" title="Great Britain" alt="United Kingdom" src="flags/United Kingdom.png" /><a href="http://www.lfsworld.net/?win=stats&racer=Bean0" title="View LFSWorld Statistics" target="_blank">Stuart Baker</a><span id="quali">Safety Car</span></div>
                <div id="team">Concept Racing</div>
                <div style="width: 260px; height: 84px; background: transparent url('cars/SC.png') center center no-repeat"></div>
            </div>
        </div>

        <div id="block3">
            <div id="number3">RC</div>
            <div style="float: right;">
                <div id="flag_name"><img id="flag" title="USA" alt="USA" src="flags/USA.png" /><a href="http://www.lfsworld.net/?win=stats&racer=dekojester" title="View LFSWorld Statistics" target="_blank">Jonathan Palmer</a><span id="quali">Rescue Car</span></div>
                <div id="team">New Dimension Racing</div>
                <div style="width: 260px; height: 84px; background: transparent url('cars/RC.png') center center no-repeat"></div>
            </div>
        </div>

</div>

<p id="footer">
Designed by Martin Kapal | Flame CZE<br />
Flag icons by <a href="http://www.icondrawer.com">www.icondrawer.com</a>
</p>

</body>
</html>