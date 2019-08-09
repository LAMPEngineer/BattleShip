<?php

namespace App\GameEngine;

class PlacingParams extends BasicPlacingParams
{
    protected $length;    

    /**
     * @param int       $row       Row where to place
     * @param int       $column    Column where to place
     * @param mixed     $type      Value to place
     * @param int       $length    Length of placing params
     * @param mixed     $extra     Extra data in placement
     * @param Direction $direction Direction of placement
     */
    public function __construct($row, $column, $type, $length, $extra = null)
    {
        $this->row = $row;
        $this->column = $column;
        $this->type = $type;
        $this->length = $length;        
        $this->extra = $extra;
    }

    /**
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }

}
