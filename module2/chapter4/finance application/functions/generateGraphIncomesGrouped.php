<?php

//https://jpgraph.net/download/

require_once __DIR__ . '/../db/mysql-connect.php';
require_once __DIR__ . '/../functions/utils.php';

require_once __DIR__ . '/../libs/jpgraph-4.4.1/src/jpgraph.php';
require_once __DIR__ . '/../libs/jpgraph-4.4.1/src/jpgraph_bar.php';
//Set the data

global $mysqli;

$sql = "SELECT c.name, SUM(i.amount) as amount 
        FROM incomes i
        LEFT JOIN categories c ON c.category_id=i.category_id
        GROUP BY i.category_id";
$result = $mysqli->query($sql);
$incomes = $result->fetch_all(MYSQLI_ASSOC);

foreach ($incomes as $income) {
    $data[] = $income['amount'];
}

//Declare the graph object

$graph = new Graph(700,500);

$graph->SetScale('intlin');

//Set the bar plot

$linept=new BarPlot($data);

//Set the line color

$linept->SetColor('green');

//Add the plot to create the chart

$graph->Add($linept);
//Set title of the chart, x-axis and y-axis

$graph->title->Set("Revenue of incomes grouped by category");

$graph->xaxis->title->Set("Income");

$graph->yaxis->title->Set("Amount");

//Display the chart
$graph->Stroke();


require_once __DIR__ . '/../db/mysql-close.php';
