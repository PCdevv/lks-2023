<?php
$current_date = date('d');
$current_month = date('m');
$current_month_name = date('M');
$current_year = date('Y');

$previous_month = ($current_month == 1) ? $previous_year : $current_month -1;
$previous_year =  ($current_month == 1) ? $current_month == 12 : $current_year - 1;

$next_month = ($current_month == 12) ? $next_year : $current_month +1;
$next_year =  ($current_month == 12) ? $current_month == 11 : $current_year + 1;

$total_day = cal_days_in_month(CAL_GREGORIAN, $current_month, $current_year);

// $day_week = [
//     'SUN',
//     'MON',
//     'TUE',
//     'WED',
//     'THU',
//     'FRI',
//     'SAT'
// ];
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calendar</title>
    <link rel="stylesheet" href="calendar.css">
</head>
<body>
    <div class="custom-calendar-wrap">
        <div class="custom-inner">
            <div class="custom-header clearfix">
                <nav>
                    <a href="?date=&year=" class="custom-btn custom-prev"></a>
                    <a href="?date=&year=" class="custom-btn custom-next"></a>
                </nav>
                <h2 id="custom-month" class="custom-month"><?php echo $current_month_name?></h2>
                <h3 id="custom-year" class="custom-year"><?php echo $current_year?></h3>
            </div>
            <div id="calendar" class="fc-calendar-container">
                <div class="fc-calendar fc-five-rows">
                    <div class="fc-head">
                        <div>Mon</div>
                        <div>Tue</div>
                        <div>Wed</div>
                        <div>Thu</div>
                        <div>Fri</div>
                        <div>Sat</div>
                        <div>Sun</div>
                    </div>
                    <div class="fc-body">
                    <div class="fc-row">
                        <?php 
                        for ($i=0; $i < $total_day ; $i++) {
                            if ($i + 1 <= 7) {
                                echo '<div><span class="fc-date">'.$i + 1..'</span></div>';
                            }
                        }
                        ?>
                    </div>
                    <div class="fc-row">
                        <?php 
                        for ($i=0; $i < $total_day ; $i++) {
                            if ($i + 1 <= 14 && $i + 1 > 7) {
                                echo '<div><span class="fc-date">'.$i + 1..'</span></div>';
                            }
                        }
                        ?>
                    </div>
                    <div class="fc-row">
                        <?php 
                        for ($i=0; $i < $total_day ; $i++) {
                            if ($i + 1 <= 21 && $i + 1 > 14) {
                                echo '<div><span class="fc-date">'.$i + 1..'</span></div>';
                            }
                        }
                        ?>
                    </div>
                    <div class="fc-row">
                        <?php 
                        for ($i=0; $i < $total_day ; $i++) {
                            if ($i + 1 <= 28 && $i + 1 > 21) {
                                echo '<div><span class="fc-date">'.$i + 1..'</span></div>';
                            }
                        }
                        ?>
                    </div>
                    <div class="fc-row">
                        <?php 
                        for ($i=0; $i < $total_day ; $i++) {
                            if ($i == $current_date) {
                                # code...
                            }
                            // echo '<div class="fc-row">';
                            if ($i + 1 <= $total_day && $i + 1 > 28) {
                                if ($i + 1 == $current_date) {
                                    echo '<div class="fc-today"><span class="fc-date">'.$i + 1..'</span></div>';
                                } else {
                                    echo '<div><span class="fc-date">'.$i + 1..'</span></div>';
                                }
                            }
                        }
                        ?>
                    </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>