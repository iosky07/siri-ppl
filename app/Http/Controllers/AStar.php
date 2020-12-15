<?php


namespace App\Http\Controllers;


class AStar
{

    private $_start; // 开始点
    private $_end; // 结束点
    private $_x; // 最大x轴
    private $_y; // 最大y轴
    private $_num; // 障碍点数量

    private $_around; // 当前节点的可能四周节点数组
    private $_g; // g值数组

    public $open; // 开放节点数组
    public $close; // 关闭节点数组
    public $disable = array(); // 随机生成的障碍点数组

    public $route = array(); // 结果路径数组

    /**
     * @param $start array 开始点
     * @param $end array 结束点
     * @param $x int 最大x轴
     * @param $y int 最大y轴
     * @param $num int 最大随机障碍点数量
     */
    public function __construct($start, $end, $x, $y, $num)
    {
        $this->_start = $start;
        $this->_end = $end;
        $this->_x = 20;
        $this->_y = 30;
        $this->_num = 70;

        // 开始寻路
        $this->_route();
    }

    private function _route()
    {
        // 生成随机路障点
        $this->_makeDisable();
        // 算法开始
        $this->_start();
    }

    private function _start()
    {
        // 设置初始点的各项值
        $point[0] = $this->_start[0]; // x
        $point[1] = $this->_start[1]; // y
        $point['i'] = $this->_pointInfo($this->_start); // 当前节点 point info
        $point['f'] = 0; // f 值
        $this->_g[$point['i']] = 0; // g 值
        $point['h'] = $this->_getH($this->_start); // h 值
        $point['p'] = null; // 父节点 point info

        $this->open[$point['i']] = $this->close[$point['i']] = $point; // 开始节点加入open和close
        while (count($this->open) > 0) {
            // 查找最小的f值
            $f = 0;
            foreach ($this->open as $info => $node) {
                if ($f === 0 || $f > $node['f']) {
                    $minInfo = $info;
                    $f = $node['f'];
                }
            }

            // 将当前节点从open中删除
            $current = $this->open[$minInfo];
            unset($this->open[$minInfo]);
            // 将当前节点加入close
            $this->close[$minInfo] = $current;

            // 如果到达了终点，根据各节点的父节点算出其route
            if ($current[0] == $this->_end[0] && $current[1] == $this->_end[1]) {
                // 反向推出路径
                while ($current['p'] !== null) {
                    $tmp = $this->close[$this->_pointInfo($current['p'])];
                    array_unshift($this->route, array($tmp[0], $tmp[1]));
                    $current = $this->close[$this->_pointInfo($current['p'])];
                }
                array_push($this->route, $this->_end);
                break;
            }

            // 设置当前节点的四周节点
            $this->_setAround($current);
            // 四周节点状态更新
            $this->_updateAround($current);
        }

    }

    private function _updateAround($current)
    {
        foreach ($this->_around as $v) {
            if (!isset($this->close[$this->_pointInfo($v)])) { // 不在close里面才处理
                if (isset($this->open[$this->_pointInfo($v)])) { // 在open里面，比较值，小则更新
                    if ($this->_getG($current) < $this->_g[$this->_pointInfo($v)]) {
                        $this->_updatePointDetail($current, $v);
                    }
                } else { // 不在open里面，直接更新
                    $this->open[$this->_pointInfo($v)][0] = $v[0];
                    $this->open[$this->_pointInfo($v)][1] = $v[1];
                    $this->_updatePointDetail($current, $v);
                }
            }
        }
    }

    private function _updatePointDetail($current, $around)
    {
        $this->open[$this->_pointInfo($around)]['f'] = $this->_getF($current, $around);
        $this->_g[$this->_pointInfo($around)] = $this->_getG($current);
        $this->open[$this->_pointInfo($around)]['h'] = $this->_getH($around);
        $this->open[$this->_pointInfo($around)]['p'] = $current; // 重新设置父节点
    }

    /**
     * 返回当前节点的可能四周节点
     */
    private function _setAround($point)
    {
        // 可能的X点
        $roundX[] = $point[0]; // 当前x点
        ($point[0] - 1 > 0) && $roundX[] = $point[0] - 1; // 不越界（最小）
        ($point[0] + 1 <= $this->_x) && $roundX[] = $point[0] + 1; // // 不越界（最大）
        // 可能的Y点
        $roundY[] = $point[1];
        ($point[1] - 1 > 0) && $roundY[] = $point[1] - 1;
        ($point[1] + 1 <= $this->_y) && $roundY[] = $point[1] + 1;

        $this->_around = array();
        foreach ($roundX as $vX) {
            foreach ($roundY as $vY) {
                $tmp = array(
                    0 => $vX,
                    1 => $vY,
                );
                // 不在障碍点内, 不在关闭节点内，不是他本身, 不是对角线
                if (
                    !in_array($tmp, $this->disable) &&
                    !in_array($tmp, $this->close) &&
                    !($vX == $point[0] && $vY == $point[1]) &&
                    ($vX == $point[0] || $vY == $point[1])
                )
                    $this->_around[] = $tmp;
            }
        }
    }

    /**
     * 返回当前节点的唯一key
     */
    private function _pointInfo($point)
    {
        return $point[0] . '_' . $point[1];
    }

    /**
     * F值计算：F = G + H
     */
    private function _getF($parent, $point)
    {
        return $this->_getG($parent) + $this->_getH($point);
    }

    /**
     * G值计算
     */
    private function _getG($current)
    {
        return isset($this->_g[$this->_pointInfo($current)]) ? $this->_g[$this->_pointInfo($current)] + 1 : 1;
    }

    /**
     * H值计算
     */
    private function _getH($point)
    {
        return abs($point[0] - $this->_end[0]) + abs($point[1] - $this->_end[1]);
    }

    /**
     * 随机生成路障点数组
     */
    private function _makeDisable()
    {
        if ($this->_num > $this->_x * $this->_y)
            exit('too many disable point');

        $tmp = array([1, 10], [2, 1], [3, 3], [4, 3], [5, 3], [6, 3], [7, 3], [8, 3], [9, 3], [3, 4], [4, 4], [5, 4], [6, 4], [7, 4], [8, 4], [9, 4], [3, 5], [4, 5], [5, 5], [6, 5], [7, 5], [8, 5], [9, 5], [3, 6], [4, 6], [5, 6], [6, 6], [7, 6], [8, 6], [9, 6],
            [11, 4], [12, 4], [13, 4], [14, 4], [15, 4], [16, 4], [17, 4], [18, 4], [11, 5], [12, 5], [13, 5], [14, 5], [15, 5], [16, 5], [17, 5], [18, 5], [11, 6], [12, 6], [13, 6], [14, 6], [15, 6], [16, 6], [17, 6], [18, 6],
            [1, 1], [1, 2], [1, 3], [1, 4], [1, 5], [1, 6], [1, 7], [1, 8], [1, 9], [1, 10], [1, 11], [1, 12], [1, 13], [1, 14], [1, 15], [1, 16], [1, 17], [1, 18], [1, 19], [1, 20], [1, 21], [1, 22], [1, 23], [1, 24], [1, 25], [1, 26], [1, 27], [1, 28], [1, 29], [1, 30],
            [2, 30], [3, 30], [4, 30], [5, 30], [6, 30], [7, 30], [8, 30], [9, 30], [10, 30], [11, 30], [12, 30], [13, 30], [14, 30], [15, 30], [16, 30], [17, 30], [18, 30], [19, 30], [20, 30], [2, 26], [2, 27], [2, 28], [2, 29], [16,7], [17,7], [18,7],
            [3, 8], [4, 8], [5, 8], [6, 8], [7, 8], [8, 8], [9, 8], [3, 9], [4, 9], [5, 9], [6, 9], [7, 9], [8, 9], [9, 9], [3, 10], [4, 10], [5, 10], [6, 10], [7, 10], [8, 10], [9, 10], [3, 11], [4, 11], [5, 11], [6, 11], [7, 11], [8, 11], [9, 11], [3, 12], [4, 12], [5, 12], [6, 12], [7, 12], [8, 12], [9, 12], [3, 13], [4, 13], [5, 13], [6, 13], [7, 13], [8, 13], [9, 13], [3, 14], [4, 14], [5, 14], [6, 14], [7, 14], [8, 14],  [3, 15], [4, 15], [5, 15], [6, 15], [7, 15], [8, 15],
            [11, 8], [12, 8], [13, 8], [14, 8], [20, 8], [11, 9], [12, 9], [13, 9], [14, 9], [15, 9], [16, 9], [18, 9], [19, 9], [20, 9], [11, 10], [12, 10], [13, 10], [14, 10], [15, 10], [16, 10], [18, 10], [19, 10], [20, 10], [11, 11], [12, 11], [13, 11], [14, 11], [15, 11], [16, 11], [18, 11], [19, 11], [20, 11], [11, 12], [12, 12], [13, 12], [14, 12], [15, 12], [16, 12], [18, 12], [19, 12], [20, 12], [11, 13], [12, 13], [13, 13], [14, 13], [15, 13], [16, 13], [18, 13], [19, 13], [20, 13], [11, 14], [12, 14], [13, 14], [14, 14], [15, 14], [16, 14], [18, 14], [19, 14], [20, 14], [10, 15], [11, 15], [12, 15], [13, 15], [14, 15], [15, 15], [16, 15], [18, 15], [19, 15], [20, 15], [15, 16], [16, 16], [18, 16], [19, 16], [20, 16], [10, 17], [11, 17], [12, 17], [13, 17], [19, 17], [20, 17], [10, 18], [11, 18], [12, 18], [13, 18], [14, 18], [15, 18], [16, 18], [17, 18], [19, 18], [20, 18], [10, 19], [11, 19], [12, 19], [13, 19], [14, 19], [15, 19], [16, 19], [17, 19], [19, 19], [20, 19], [10, 20], [11, 20], [12, 20], [13, 20], [14, 20], [15, 20], [16, 20], [17, 20], [19, 20], [20, 20], [10, 21], [11, 21], [12, 21], [13, 21], [14, 21], [15, 21], [16, 21], [17, 21], [19, 21], [20, 21], [10, 22], [11, 22], [12, 22], [13, 22], [14, 22], [15, 22], [16, 22], [17, 22], [19, 22], [20, 22], [10, 23], [11, 23], [12, 23], [13, 23], [14, 23], [15, 23], [16, 23], [17, 23], [19, 23], [20, 23], [10, 24], [11, 24], [12, 24], [13, 24], [14, 24], [15, 24], [16, 24], [17, 24], [19, 24], [20, 24], [19, 25], [20, 25], [10, 26], [11, 26], [12, 26], [13, 26], [14, 26], [15, 26], [16, 26], [18, 26], [19, 26], [20, 26], [10, 27], [11, 27], [12, 27], [13, 27], [14, 27], [15, 27], [16, 27], [18, 27], [19, 27], [20, 27], [10, 28], [11, 28], [12, 28], [13, 28], [14, 28], [15, 28], [16, 28], [18, 28], [19, 28], [20, 28], [18, 29], [19, 29], [20, 29],
            [3, 1], [4, 1], [5, 1], [6, 1], [7, 1], [8, 1], [9, 1], [10, 1], [11, 1], [12, 1], [13, 1], [14, 1], [15, 1], [16, 1], [17, 1], [18, 1], [19, 1], [20, 1], [11, 2], [12, 2], [13, 2], [14, 2], [15, 2], [16, 2], [17, 2], [18, 2], [19, 2], [20, 2], [20,3],
            [20, 4], [20, 5], [20, 6], [20, 7], [3, 17], [4, 17], [5, 17], [6, 17], [7, 17], [8, 17], [3, 18], [4, 18], [5, 18], [6, 18], [7, 18], [8, 18], [3, 19], [4, 19], [5, 19], [6, 19], [7, 19], [8, 19], [3, 20], [4, 20], [5, 20], [6, 20], [7, 20], [8, 20], [3, 21], [4, 21], [5, 21], [6, 21], [7, 21], [8, 21], [3, 22], [4, 22], [5, 22], [6, 22], [7, 22], [8, 22], [3, 23], [4, 23], [5, 23], [6, 23], [7, 23], [8, 23], [3, 24], [4, 24], [5, 24], [6, 24], [7, 24], [8, 24], [4, 26], [5, 26], [6, 26], [7, 26], [8, 26], [9, 26], [4, 27], [5, 27], [6, 27], [7, 27], [8, 27], [9, 27], [4, 28], [5, 28], [6, 28], [7, 28], [8, 28], [9, 28],


        );
//        var_dump($tmp);
        foreach ($tmp as $t) {
            $this->disable[] = $t;
        }
//        $tmp=array(2,1);
//        $this->disable[]=$tmp;
//        $tmp=array(5,9);
//        $this->disable[]=$tmp;
//        for ($i = 0; $i < $this->_num; $i++) {
//
//            $tmp = array(
//                rand(1, $this->_x),
//                rand(1, $this->_y),
//            );
////            var_dump($tmp);
////            var_dump('\n');
//
//            if ($tmp == $this->_start || $tmp == $this->_end || in_array($tmp, $this->disable)) { // 路障点不能与开始点和结束点相同,且路障不重复
//                $i--;
//                continue;
//            }
////            echo json_encode($tmp);
//            $this->disable[] = $tmp;
//        }
////        print_r($this->disable);
//        echo '<br><br>';
//        for ($y = 0; $y < count($this->disable); $y++) {
//            echo json_encode($this->disable[$y]);
//        }
//        echo '<br><br>';
//        echo count($this->disable);
//        echo '<br><br>';
    }

    /**
     * 显示地图
     */
    public function displayPic()
    {
        $a='';
//        header('content-type:text/html;charset=utf-8');
        $a=$a.'Dari A ke B, latar belakang hijau mewakili jalur terpendek, dan latar belakang hitam mewakili rintangan. Penyegaran akan membuat penghalang pandang. <br /><br />';
        $step = count($this->route) - 1;
//        $a=$a.($step > 0) ? '<font color="green">Total ' . $step . ' Langkah</font>' : '<font color="red">Tidak terjangkau!</font>';
        if ($step > 0){
            $a=$a.'<font color="green">Total ' . $step . ' Langkah</font>';
        }else{
            $a=$a.'<font color="red">Tidak terjangkau!</font>';
        }
        $a=$a.'<table border="1">';
        for ($y = 1; $y <= $this->_y; $y++) {
            $a=$a. '<tr>';
            for ($x = 1; $x <= $this->_x; $x++) {
                $current = array($x, $y);

                if (in_array($current, $this->disable)) // 黑色表示路障
                    $bg = 'bgcolor="#000"';
                elseif (in_array($current, $this->route)) // 最短路径
                    $bg = 'bgcolor="#5cb85c"';
                else
                    $bg = '';

                if ($current == $this->_start)
                    $content = 'A';
                elseif ($current == $this->_end)
                    $content = 'B';
                else
                    $content = '&nbsp;';

                $a=$a. '<td style="width:30px; height: 30px;" ' . $bg . '>' . $content . '</td>';
            }
            $a=$a. '</tr>';
        }
        $a=$a.'</table>';
        return $a;
    }

}
