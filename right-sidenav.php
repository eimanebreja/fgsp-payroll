<div class="area-event">
    <div class="calendar">
        <?php
                    $monthNames = Array("January", "February", "March", "April", "May", "June", "July", 
                    "August", "September", "October", "November", "December");
                    ?>
        <?php
                    if (!isset($_REQUEST["month"])) $_REQUEST["month"] = date("n");
                    if (!isset($_REQUEST["year"])) $_REQUEST["year"] = date("Y");
                    ?>
        <?php
                    $cMonth = $_REQUEST["month"];
                    $cYear = $_REQUEST["year"];
                    
                    $prev_year = $cYear;
                    $next_year = $cYear;
                    $prev_month = $cMonth-1;
                    $next_month = $cMonth+1;
                    
                    if ($prev_month == 0 ) {
                        $prev_month = 12;
                        $prev_year = $cYear - 1;
                    }
                    if ($next_month == 13 ) {
                        $next_month = 1;
                        $next_year = $cYear + 1;
                    }
                    ?>
        <table>
            <tr>
                <td>
                    <table>
                        <tr style="display:flex">
                            <td style="flex-basis:50%; text-align:left"> <a
                                    href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $prev_month . "&year=" . $prev_year; ?>">Previous</a>
                            </td>
                            <td style="flex-basis:50%; text-align:right"><a
                                    href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $next_month . "&year=" . $next_year; ?>">Next</a>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table>
                        <tr>
                            <td colspan="7" style="text-align:center">
                                <strong><?php echo $monthNames[$cMonth-1].' '.$cYear; ?></strong></td>
                        </tr>
                        <tr>
                            <td><strong>S</strong></td>
                            <td><strong>M</strong></td>
                            <td><strong>T</strong></td>
                            <td><strong>W</strong></td>
                            <td><strong>T</strong></td>
                            <td><strong>F</strong></td>
                            <td><strong>S</strong></td>
                        </tr>

                        <?php 
                                    $timestamp = mktime(0,0,0,$cMonth,1,$cYear);
                                    $maxday = date("t",$timestamp);
                                    $thismonth = getdate ($timestamp);
                                    $startday = $thismonth['wday'];
                                    for ($i=0; $i<($maxday+$startday); $i++) {
                                        if(($i % 7) == 0 ) echo "<tr>";
                                        if($i < $startday) echo "<td></td>";
                                        else echo "<td>". ($i - $startday + 1) . "</td>";
                                        if(($i % 7) == 6 ) echo "</tr>";
                                    }
                                    ?>
                    </table>
                </td>
            </tr>
        </table>
    </div>
    <div class="event">
        <div class="event-title">
            EVENT <span><a href="add-event.php"><i class="fa fa-plus" aria-hidden="true"></i></a></span>
        </div>
        <div class="event-body">
            <ul>
                <?php $result_event = mysqli_query($mysqli, "SELECT * FROM tbl_event"); 
                         while ($event_row = mysqli_fetch_array($result_event)) {
                            $id = $event_row['event_id']; 
                         
                        ?>
                <li><?php echo $event_row['event_name']; ?>
                    <span>(<?php echo $event_row['event_date']; ?>)</span><a id="<?php echo $id; ?>"
                        href="delete-event.php<?php echo '?id=' . $id; ?>"><i class="fa fa-minus"
                            aria-hidden="true"></i></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>