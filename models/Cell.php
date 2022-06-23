<?php


class Cell
{
    private $x;
    private $y;
    private $width = 50;
    private $walls = [
        'left' => true,
        'right'=> true,
        'top' => true,
        'bottom' => true
    ];
    private $active = false;
    private $visited = false;

    /**
     * Cell constructor.
     * @param $x
     * @param $y
     */
    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }


    /**
     * @return mixed
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @param mixed $x
     */
    public function setX($x)
    {
        $this->x = $x;
    }

    /**
     * @return mixed
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * @param mixed $y
     */
    public function setY($y)
    {
        $this->y = $y;
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    public function openWall($key)
    {
        $this->walls[$key] = false;
    }

    /**
     * @return bool[]
     */
    public function getWalls()
    {
        return $this->walls;
    }

    /**
     * @param bool[] $walls
     */
    public function setWalls($walls)
    {
        $this->walls = $walls;
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * @param bool $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return bool
     */
    public function isVisited()
    {
        return $this->visited;
    }

    /**
     * @param bool $visited
     */
    public function setVisited($visited)
    {
        $this->visited = $visited;
    }



}