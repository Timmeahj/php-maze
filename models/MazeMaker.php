<?php


class MazeMaker
{
    private $stack = [];
    private $activeCell;
    private $finished = false;
    private $grid;
    /**
     * MazeMaker constructor.
     */
    public function __construct($grid)
    {
        $this->activeCell = $grid->getCell(0,0);
        $this->activeCell->setActive(true);
        $this->stack[] = $this->activeCell;
        $this->grid = $grid;
    }

    public function makeMaze()
    {
        do {
            if(!count($this->stack)){
                $this->finished = true;
            }
            $this->activeCell->setVisited(true);
            $this->activeCell->setActive(false);
            $neighbours = $this->getNeighbours($this->activeCell);
            if(count($neighbours)){
                $nextCell = $neighbours[array_rand($neighbours)];
                if($this->activeCell->getX() === $nextCell->getX()){
                    if($this->activeCell->getY()+1 === $nextCell->getY()){
                        $this->activeCell->openWall('bottom');
                        $nextCell->openWall('top');
                    }
                    if($this->activeCell->getY()-1 === $nextCell->getY()){
                        $this->activeCell->openWall('top');
                        $nextCell->openWall('bottom');
                    }
                }
                if($this->activeCell->getY() ===  $nextCell->getY()){
                    if($this->activeCell->getX()+1 ===  $nextCell->getX()){
                        $this->activeCell->openWall('right');
                        $nextCell->openWall('left');
                    }
                    if($this->activeCell->getX()-1 ===  $nextCell->getX()){
                        $this->activeCell->openWall('left');
                        $nextCell->openWall('right');
                    }
                }
                $this->stack[] = $nextCell;
                $this->activeCell = $nextCell;
            }else{
                $previousCell = array_pop($this->stack);
                $this->activeCell = $previousCell;
            }
        } while (!$this->finished);
    }

    public function getNeighbours($cell)
    {
        $neighbours = [];
        foreach ($this->grid->getCells() as $key => $otherCell) {
            if(!$otherCell->isVisited()){
                if($cell->getX() === $otherCell->getX()){
                    if($cell->getY()+1 === $otherCell->getY() ||  $cell->getY()-1 === $otherCell->getY()){
                        $neighbours[] = $otherCell;
                    }
                }
                if($cell->getY() === $otherCell->getY()){
                    if($cell->getX()+1 === $otherCell->getX() ||  $cell->getX()-1 === $otherCell->getX()){
                        $neighbours[] = $otherCell;
                    }
                }
            }
        }
        return $neighbours;
    }
}