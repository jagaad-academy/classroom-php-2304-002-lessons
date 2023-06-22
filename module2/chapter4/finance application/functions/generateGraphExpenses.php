<?php

//https://jpgraph.net/download/

require_once __DIR__ . '/../db/mysql-connect.php';
require_once __DIR__ . '/../functions/utils.php';

require_once __DIR__ . '/../libs/jpgraph-4.4.1/src/jpgraph.php';
require_once __DIR__ . '/../libs/jpgraph-4.4.1/src/jpgraph_line.php';
//Set the data

global $mysqli;

$sql = "SELECT * FROM expenses";
$result = $mysqli->query($sql);
$expenses = $result->fetch_all(MYSQLI_ASSOC);

foreach ($expenses as $expense) {
    $data[] = $expense['amount'];
}

//Declare the graph object

$graph = new Graph(700,500);

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

$graph->title->Set("Revenue of expenses");

$graph->xaxis->title->Set("Expense");

$graph->yaxis->title->Set("Amount");

//Display the chart
$graph->Stroke();


require_once __DIR__ . '/../db/mysql-close.php';
