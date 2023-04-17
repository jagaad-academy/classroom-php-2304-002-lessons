<?php

function rec($a) {
    if ($a > 0) {
        echo "counter: $a\n";
        rec(--$a);
        echo "counter: $a\n";
    } else {
        echo 'end of the call';
    }
}

rec(5);
