<?php
/**
 * index.php
 * hennadii.shvedko
 * 12.09.2023
 */

//$file = new SplFileObject(__DIR__ . '/src/text.txt', 'w');
//print_r($file->fwrite('test test write'));


//$dll = new SplDoublyLinkedList();
//$dll->push('a');
//$dll->push('b');
//$dll->push('c');
//$dll->push('d');
//$dll->setIteratorMode(SplDoublyLinkedList::IT_MODE_DELETE);
//
//for ($dll->rewind(); $dll->valid(); $dll->next()) {
//    echo $dll->current() . PHP_EOL;
//}
//
//print_r($dll->count());

//$fixedArray = new SplFixedArray(5);
//
//$fixedArray[1] = 'a';
//$fixedArray[2] = 'b';
//
//$fixedArray->setSize(6);
//
//$fixedArray[5] = 'c';
//
//var_dump($fixedArray->toArray());

//$queue = new SplQueue();
//$queue->push(1);
//$queue->push(2);
//$queue->push(3);
//
////foreach ($queue as $item){
////    echo $item . PHP_EOL;
////}
//
//for($queue->rewind(); $queue->valid(); $queue->next()){
//    echo $queue->current() . PHP_EOL;
//}
//
//$queue->dequeue();
//echo "dequeue" . PHP_EOL;
//$queue->enqueue(4);
//for($queue->rewind(); $queue->valid(); $queue->next()){
//    echo $queue->current() . PHP_EOL;
//}

$stack = new SplStack();
$stack->push(1);
$stack->push(2);
$stack->push(3);

for($stack->rewind(); $stack->valid(); $stack->next()){
    echo $stack->current() . PHP_EOL;
}
