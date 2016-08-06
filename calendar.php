<?php
function calendar($year = '', $month = '') {
    if (empty($year) && empty($month)) {
        $year = date('Y');
        $month = date('n');
    }
    //月末の取得
    $l_day = date('j', mktime(0, 0, 0, $month + 1, 0, $year));
    //初期出力
    $html = <<<EOM
<table class="calendar">
    <caption>{$year}年{$month}月</caption>
    <tr>
        <th class="sun">日</th>
        <th>月</th>
        <th>火</th>
        <th>水</th>
        <th>木</th>
        <th>金</th>
        <th class="sat">土</th>
    </tr>\n
EOM;
    $lc = 0;

    // 月末分繰り返す
    for ($i = 1; $i < $l_day + 1;$i++) {
        $classes = array();
        $class   = '';

        // 曜日の取得
        $week = date('w', mktime(0, 0, 0, $month, $i, $year));

        // 曜日が日曜日の場合
        if ($week == 0) {
            $str .= $tab."\t\t<tr>\n";
            $lc++;
        }

        // 1日の場合
        if ($i == 1) {
            if($week != 0) {
                $str .= $tab."\t\t<tr>\n";
                $lc++;
            }
            $str .= repeatEmptyTd($week);
        }

        if ($week == 6) {
            $classes[] = 'sat';
        } else if ($week == 0) {
            $classes[] = 'sun';
        }

        if ($i == date('j') && $year == date('Y') && $month == date('n')) {
            // 現在の日付の場合
            $classes[] = 'today';
        }

        if (count($classes) > 0) {
            $class = ' class="'.implode(' ', $classes).'"';
        }

        $str .= $tab."\t\t\t".'<td'.$class.'>'.$i.'</td>'."\n";

        // 月末の場合
        if ($i == $l_day) {
            $str .= repeatEmptyTd(6 - $week);
        }
        // 土曜日の場合
        if ($week == 6) {
            $str .= $tab."\t\t</tr>\n";
        }
    }

    if ($lc < 6) {
        $html .= "\t<tr>\n";
        $html .= repeatEmptyTd(7);
        $html .= "\t</tr>\n";
    }

    if ($lc == 4) {
        $html .= "\t<tr>\n";
        $html .= repeatEmptyTd(7);
        $html .= "\t</tr>\n";
    }

    $html .= "</table>\n";
    return $html;
}

function repeatEmptyTd($n = 0) {
    return str_repeat("\t\t<td> </td>\n", $n);
}
?>