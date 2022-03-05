<?php

 class solution
 {
     /**
      * @param Integer[][] $image
      * @param Integer $sr
      * @param Integer $sc
      * @param Integer $newColor
      * @return Integer[][]
      */
     public function floodFill($image, $sr, $sc, $newColor)
     {
         $oldColor = $image[$sr][$sc];
         $this-> handle($image, $sr, $sc, $oldColor, $newColor);

         return $image;
     }

     public function handle(&$image, $x, $y, $oldColor, $newColor)
     {
         // 超出边界
         if ($x<0 || $x>count($image)-1 || $y<0 || $y>count($image[0])-1) {
             return;
         }
         // 颜色不属于old
         if ($image[$x][$y]!=$oldColor) {
             return;
         }
         if ($image[$x][$y]==-1) {
             return;
         }
         // 回溯
         $image[$x][$y] = -1;

         $this-> handle($image, $x-1, $y, $oldColor, $newColor);
         $this->handle($image, $x+1, $y, $oldColor, $newColor);
         $this-> handle($image, $x, $y-1, $oldColor, $newColor);
         $this-> handle($image, $x, $y+1, $oldColor, $newColor);
         $image[$x][$y]=$newColor;
     }

     /**
      * @param Integer[][] $grid
      * @param Integer $row
      * @param Integer $col
      * @param Integer $color
      * @return Integer[][]
      */
     public function colorBorder($grid, $row, $col, $color)
     {
         $oldColor = $grid[$row][$col];
         $visited = [];
         $this->chandle($grid, $row, $col, $oldColor, $color, $visited);
         return $grid;
     }

     public function chandle(&$grid, $row, $col, $oldColor, $color, &$visited)
     {
         if (!$this->inArea($grid, $row, $col)) {
             return 0;
         }
         if (!empty($visited[$row][$col])) {
             return 1;
         }
         if ($grid[$row][$col]!=$oldColor) {
             return 0;
         }
         $visited[$row][$col] = true;

         if (
            $this->chandle($grid, $row, $col-1, $oldColor, $color, $visited)
           + $this->chandle($grid, $row, $col+1, $oldColor, $color, $visited)
           + $this->chandle($grid, $row-1, $col, $oldColor, $color, $visited)
           + $this->chandle($grid, $row+1, $col, $oldColor, $color, $visited) < 4
         ) {
             $grid[$row][$col] = $color;
         }

         return 1;
     }

     public function inArea($grid, $row, $col)
     {
         return $row>=0&&$row<count($grid)
         &&$col>=0&&$col<count($grid[0]);
     }
 }

 $solution = new Solution;
 $grid = [
     [1, 1, 1],
     [1, 1, 1],
     [1, 1, 1],
 ];
 $grid = $solution->colorBorder($grid, 1, 1, 2);
 print_r($grid);
