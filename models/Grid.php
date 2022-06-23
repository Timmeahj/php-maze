<?php


class Grid
{
    private $rows;
    private $cols;
    private $cells = [];

    /**
     * Grid constructor.
     * @param int $rows
     * @param int $cols
     */
    public function __construct($rows, $cols)
    {
        $this->rows = $rows;
        $this->cols = $cols;
        for($y = 0; $y < $rows; $y++){
            for($x = 0; $x < $cols; $x++){
                $cell = new Cell($x, $y);
                $this->cells[] = $cell;
            }
        }
    }

    public function getCell($x, $y)
    {
        foreach ($this->cells as $key => $cell){
            if($cell->getX() === $x && $cell->getY() === $y){
                return $cell;
            }
        }
    }

    /**
     * @return int
     */
    public function getRows()
    {
        return $this->rows;
    }

    /**
     * @param int $rows
     */
    public function setRows($rows)
    {
        $this->rows = $rows;
    }

    /**
     * @return int
     */
    public function getCols()
    {
        return $this->cols;
    }

    /**
     * @param int $cols
     */
    public function setCols($cols)
    {
        $this->cols = $cols;
    }

    /**
     * @return array
     */
    public function getCells()
    {
        return $this->cells;
    }

    /**
     * @param array $cells
     */
    public function setCells($cells)
    {
        $this->cells = $cells;
    }


}