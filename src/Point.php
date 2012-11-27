<?php
class Point
{
    private $_myPoint;

    public function __construct($point)
    {
        $this->_myPoint = $point;
    }

    public function add($addPoint)
    {
        if ($addPoint < 0) {
            $addPoint = 0;
        }
        $this->_myPoint += $addPoint;
    }

    public function substract($substractPoint)
    {
        if ($substractPoint < 0) {
            $substractPoint = 0;
        }
        if ($this->_myPoint < $substractPoint) {
            throw new Exception('error');
        }
        $this->_myPoint -= $substractPoint;
    }

    public function getPoint()
    {
        return $this->_myPoint;
    }
}
