<?php
require('models/Grid.php');

require('models/MazeMaker.php');
require('models/Cell.php');

$grid = new Grid(14, 29);
$mazeMaker = new MazeMaker($grid);
$mazeMaker->makeMaze();

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="grid">
    <?php foreach($grid->getCells() as $key=>$cell): ?>
    <?php
        $rightBorder = 'white';
        if($cell->getWalls()['right']){
            $rightBorder = 'black';
        }
        $leftBorder = 'white';
        if($cell->getWalls()['left']){
            $leftBorder = 'black';
        }
        $topBorder = 'white';
        if($cell->getWalls()['top']){
            $topBorder = 'black';
        }
        $bottomBorder = 'white';
        if($cell->getWalls()['bottom']){
            $bottomBorder = 'black';
        }
        ?>
    <div style="
            width: <?php echo $cell->getWidth()?>px;
            height: <?php echo $cell->getWidth()?>px;
            border-right: 1px solid <?php echo $rightBorder?>;
            border-top: 1px solid <?php echo $topBorder?>;
            border-left: 1px solid <?php echo $leftBorder?>;
            border-bottom: 1px solid <?php echo $bottomBorder?>;
            position: absolute;
            left: <?php echo $cell->getX()*($cell->getWidth()+2)?>px;
            top: <?php echo $cell->getY()*($cell->getWidth()+2)?>px;
    "></div>
    <?php endforeach; ?>
</div>
</body>
</html>

<?php