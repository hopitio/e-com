<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Calendar
 *
 * @package http://blog.peacois.me/?p=21
 * @author ANLT <lethanhan.bkaptech@gmail.com>
 * @copyright peacois
 */
class Calendar
{
    private $year, $month, $day;
    private $prevYear, $prevMonth;
    private $nextYear, $nextMonth;
    public $week = array();
    private $timestamp;

    public function __construct($y = null, $m = null, $d = null, $firstDay = null, $is_padding = false)
    {
        $this->year = is_null($y) ? intval(date('Y')) : (int)$y;
        $this->month = is_null($m) ? intval(date('m')) : (int)$m;
        $this->day = is_null($d) ? intval(date('d')) : (int)$d;
        $this->is_padding = (bool)$is_padding;
        if (is_null($firstDay) || $firstDay < 0 || $firstDay > 6) {
            $firstDay = 0;
        }
        $this->firstDay = $firstDay;

        $this->nextYear = mktime(0, 0, 0, $this->month, 1, $this->year + 1);
        $this->nextMonth = mktime(0, 0, 0, $this->month + 1, 1, $this->year);
        $this->nextDay = mktime(0, 0, 0, $this->month, $this->day + 1, $this->year);
        $this->prevYear = mktime(0, 0, 0, $this->month, 1, $this->year - 1);
        $this->prevMonth = mktime(0, 0, 0, $this->month - 1, 1, $this->year);
        $this->prevDay = mktime(0, 0, 0, $this->month, $this->day - 1, $this->year);

        $this->init();
    }

    /**
     * generate Calendar
     */
    private function init()
    {
        $this->timestamp = mktime(0, 0, 0, $this->month, $this->day, $this->year);

        // パディング
        $prevMonth = date('t', mktime(0, 0, 0, $this->month - 1, 1, $this->year)); // 先月の最終日
        $paddings = date('w', mktime(0, 0, 0, $this->month, 1, $this->year));
        $paddings = $paddings % 7;
        // 先月のパディングすべき日から、先月末までパディングする
        for ($i = $paddings - 1; $i >= 0; $i--) {
            $thisTime = mktime(0, 0, 0, $this->month - 1, $prevMonth - $i, $this->year);
            $firstDay = false;
            $this->week[] = new Day($thisTime, $firstDay, false, $this->is_padding, false);
        }


        // 今月の日付
        $counter = 1;
        for ($i = 1; $i <= date('t', $this->timestamp); $i++) {
            $thisTime = mktime(0, 0, 0, $this->month, $i, $this->year);
            $firstDay = false;
            $lastDay = false;
            if (date('w', $thisTime) == $this->firstDay) {
                $firstDay = true;
                $counter = 1;
            } else {
                if (($this->firstDay == 0 && date('w', $thisTime) == 6) || $this->firstDay - 1 == date('w', $thisTime)) {
                    $lastDay = true;
                }
                $counter++;
            }
            $this->week[] = new Day($thisTime, $firstDay, $lastDay, true, true);
        }

        // パディング
        if ($lastDay == false) {
            $lastW = date('w', $thisTime);
//            echo $counter;
            for ($i = 1; $i <= 7 - $counter; $i++) {
                $time = mktime(0, 0, 0, $this->month + 1, $i, $this->year);
                $lastDay = ($i == 7 - $counter) ? true : false;
                $this->week[] = new Day($time, false, $lastDay, $this->is_padding, false);
            }
        }
    }

    /**
     * getter methods
     */
    public function getYear()
    {
        return $this->year;
    }

    public function getMonth()
    {
        return $this->month;
    }

    public function getDay()
    {
        return $this->day;
    }

    public function getPrevYear()
    {
        return $this->prevYear;
    }

    public function getPrevMonth()
    {
        return $this->prevMonth;
    }

    public function getNextYear()
    {
        return $this->nextYear;
    }

    public function getNextMonth()
    {
        return $this->nextMonth;
    }
}

class Day
{
    private $timestamp = null;
    private $firstDay = false;
    private $lastDay = false;
    private $is_display = true;
    private $is_thisMonth = true;
    private $y, $m, $d, $week;

    public function __construct($timestamp = 0, $firstDay = false, $lastDay = false, $is_display = true, $is_thisMonth = true)
    {
        $this->timestamp = $timestamp;
        $this->firstDay = $firstDay;
        $this->lastDay = $lastDay;
        $this->is_display = $is_display;
        $this->is_thisMonth = $is_thisMonth;

        $this->y = date('Y', $timestamp);
        $this->m = date('n', $timestamp);
        $this->d = date('j', $timestamp);
        $this->week = date('w', $timestamp);
    }

    /**
     * return Timestamp
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * 今日？
     */
    public function isToday()
    {
        if (date('Ymd', $this->timestamp) == date('Ymd')) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 日曜日？
     */
    public function isSunday()
    {
        if ($this->thisWeek() == 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 土曜日？
     */
    public function isSaturday()
    {
        if ($this->thisWeek() == 6) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 日オブジェクトの年を返す
     */
    public function thisYear()
    {
        return $this->y;
    }

    /**
     * 日オブジェクトの月を返す
     */
    public function thisMonth()
    {
        return $this->m;
    }

    /**
     * 日オブジェクトの日を返す
     */
    public function thisDay()
    {
//        if ($this->is_display) {
        return $this->d;
//        } else {
//            return null;
//        }
    }

    /**
     * 日オブジェクトの曜日を返す
     */
    public function thisWeek()
    {
        return $this->week;
    }

    /**
     * この日オブジェクトが今月のものか調べる
     * 先月・来月をパディングしている日オブジェクトならfalseになる
     */
    public function isThisMonth()
    {
        return $this->is_thisMonth;
    }

    /**
     * この日オブジェクトが週のはじまりか調べる
     */
    public function isFirst()
    {
        return $this->firstDay;
    }

    /**
     * この日オブジェクトが週の終わりか調べる
     */
    public function isLast()
    {
        return $this->lastDay;
    }
}