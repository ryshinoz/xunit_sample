<?php
class Point
{
    private $_point;

    /**
     * コンストラクタ
     *
     * @param int $point ポイント
     */
    public function __construct($point)
    {
        $this->_point = $point;
    }

    /**
     * ポイントを追加する
     * 追加ポイントが0未満の場合は、何もしない
     *
     * @param int $addPoint 追加するポイント
     */
    public function add($addPoint)
    {
        if ($addPoint < 0) {
            $addPoint = 0;
        }
        $this->_point += $addPoint;
    }

    /**
     * ポイントを引く
     * 引くポイントが0未満の場合は、何もしない
     * 引くポイントが所持ポイント以上の場合は例外をthrowする
     *
     * @param int $substractPoint 引くポイント
     * @exception Exception 引くポイントが所持ポイント以上の場合
     */
    public function substract($substractPoint)
    {
        if ($substractPoint < 0) {
            $substractPoint = 0;
        }
        if ($this->_point < $substractPoint) {
            throw new Exception('error');
        }
        $this->_point -= $substractPoint;
    }

    /**
     * 所持ポイントを取得する
     *
     * @return int 所持ポイント
     */
    public function getPoint()
    {
        return $this->_point;
    }
}
