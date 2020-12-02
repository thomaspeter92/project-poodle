<style>
    .modalSubDiv {
        position:fixed;
        width:100%;
        height:100%;
        top:0px;
        left:0px;
        z-index:1000;
        margin:0;
    }

    .modalDivContent {
        padding-top:80px;
    }

    .notificationsTitle {
        border-bottom: solid;
        font-weight: bold;
        padding-bottom: 10px;
        padding-left:10px;
    }

    a{
        color: black;
    }
</style>

<div class="notificationsTitle"><?=$_SESSION['name']?>'s Notifications:</div>
<?php
function time_elapsed_string($datetime, $full = false) {
    date_default_timezone_set('Asia/Seoul');
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

for ($i=0;  $i<count($notifications); $i++) {
    // notification for countdown
    // && $notifications[$i]['eventDate'] - time() > 0 && $notifications[$i]['eventDate' - time() < ]
    if (isset($notifications[$i]['eventDate'])) {
        date_default_timezone_set('Asia/Seoul');
        $unixEvent = strtotime($notifications[$i]['eventDate']);
        $timeToEvent = $unixEvent-time();
        if ($timeToEvent<7200 AND $timeToEvent>0) {
        echo '<a href="'.$notifications[$i]['href'].'">';
            echo '<div id="notificationDesktop">';
                echo '<div class="countdown" id="notificationMessageDesktop">';
                $message = $notifications[$i]['message'];
                $strongMessage = str_replace('#', '<strong>', $message);
                $endStrongMessage = str_replace('|', '</strong>', $strongMessage);
                $countdownStrongMessage = str_replace('*', '<span class="urgent countDownSpan" data-unixevent="'.$unixEvent.'" id="countdownMobile'.$i.'" data-unique="'.$i.'"></span>',  $endStrongMessage);
                echo $countdownStrongMessage;
                echo '</div>';
            echo '</div>';
        echo '</a>';
        ?>
        
        <?php
        } else {
            continue;
        }
    } else if (isset($notifications[$i]['href']) && !isset($notifications[$i]['eventDate'])) {
        // notification for attending or comment on an event
            echo '<a href="'.$notifications[$i]['href'].'">';
                echo '<div id="notificationDesktop">';
                    echo '<div id="notificationMessageDesktop">';
                    $message = $notifications[$i]['message'];
                    $strongMessage = str_replace('#', '<strong>', $message);
                    $endStrongMessage = str_replace('|', '</strong>', $strongMessage);
                    echo $endStrongMessage;
                    echo '</div>';
                    echo '<div id="notificationTimeDesktop">';
                    $notificationDate = $notifications[$i]['notificationDate'];
                    echo time_elapsed_string($notificationDate, true);
                    echo '</div>';
                echo '</div>';
            echo '</a>';
    } else {
        // notification for cancel
        echo '<div id="notificationDesktop">';
            echo '<div id="notificationMessageDesktop">';
            $message = $notifications[$i]['message'];
            $strongMessage = str_replace('#', '<strong>', $message);
            $endStrongMessage = str_replace('|', '</strong>', $strongMessage);
            echo $endStrongMessage;
            echo '</div>';
            echo '<div id="notificationTimeDesktop">';
            $notificationDate = $notifications[$i]['notificationDate'];
            echo time_elapsed_string($notificationDate, true);
            echo '</div>';
        echo '</div>';
    }
};

?>