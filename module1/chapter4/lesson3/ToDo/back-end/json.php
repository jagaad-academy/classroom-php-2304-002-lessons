<?php

/**
 * Reads the content from JSON file and returns as an array
 * @param string $fileName
 * @return array - returns array of tasks
 */
function readFromFileJSON(string $fileName): array
{
    $tasks = [];
    if (file_exists($fileName)) {
        $json = file_get_contents($fileName);
        $tasks = json_decode($json, true);
    }

    return $tasks;
}

/**
 * Adds new item to task list and stores to the json file
 * @param string $fileName
 * @param string $newTaskName
 * @return void
 */
function addDataToFileJSON(string $fileName, string $newTaskName): void
{
    if (is_writable($fileName)) {
        $tasks = json_decode(file_get_contents($fileName), true);
        $tasks[] = ['taskName' => $newTaskName, "status" => "not-done"];
        if(!file_put_contents($fileName, json_encode($tasks))){
            echo "Cannot write to the file!";
        }
    }
}

/**
 * Deletes completely content from JSON file
 * @param string $fileName
 * @return void
 */
function clearAndWriteTheFileJSON(string $fileName): void
{
    if (is_writable($fileName)) {
        if (!file_put_contents($fileName, json_encode([]))) {
            echo "Cannot write to the file!";
        }
    }
}

/**
 * Updates (overwrites all existing tasks) JSON file with list of tasks
 *
 * $fileName = 'test.json';
 * $tasks = [
 * '0' => ['taskName' => 'task1', 'status' => 'done'],
 * '1' => ['taskName' => 'task2', 'status' => 'not-done'],
 * '3' => ['taskName' => 'task3', 'status' => 'done']
 * ];
 *
 * updateFileJSON($fileName, $tasks);
 *
 * @param string $fileName
 * @param array $tasks
 * @return void
 */
function updateFileJSON(string $fileName, array $tasks): void
{
    if (is_writable($fileName)) {
        if (!file_put_contents($fileName, json_encode($tasks))) {
            echo "Cannot write to the file!";
        }
    }
}
