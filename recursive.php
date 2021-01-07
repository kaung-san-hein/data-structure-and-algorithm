<?php

function factorial(int $n): int
{
    if ($n == 0) // base condition
        return 1;
    return $n * factorial($n - 1); // every time small
}


function fibonacci(int $n): int
{
    if ($n == 0) {
        return 1;
    } else if ($n == 1) {
        return 1;
    } else {
        return fibonacci($n - 1) + fibonacci($n - 2);
    }
}

function gcd(int $a, int $b): int
{
    if ($b == 0) {
        return $a;
    } else {
        return gcd($b, $a % $b);
    }
}

echo gcd(10, 3);

// linear recursion
// binary 
// tail
// mutual
// nested