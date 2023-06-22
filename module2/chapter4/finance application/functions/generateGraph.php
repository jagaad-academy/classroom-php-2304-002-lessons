<?php

//https://jpgraph.net/download/


require_once __DIR__ . '/../libs/jpgraph-4.4.1/src/jpgraph.php';
require_once __DIR__ . '/../libs/jpgraph-4.4.1/src/jpgraph_line.php';
//Set the data

$data = array(10,6,16,23,11,9,5);

//Declare the graph object

$graph = new Graph(400,250);

//Clear all

$graph->ClearTheme();

//Set the scale

$graph->SetScale('textlin');

//Set the linear plot

$linept=new LinePlot($data);

//Set the line color

$linept->SetColor('green');

//Add the plot to create the chart

$graph->Add($linept);
//Set title of the chart, x-axis and y-axis

$graph->title->Set("Accumulated Bar Chart");

$graph->xaxis->title->Set("Series-1");

$graph->yaxis->title->Set("Series-2");

//Display the chart

$graph->Stroke();
//$graph->Stroke(_IMG_HANDLER);
//
//// Default is PNG so use ".png" as suffix
//$fileName = __DIR__ . "/../images/imagefile1.png";
//$graph->img->Stream($fileName);
