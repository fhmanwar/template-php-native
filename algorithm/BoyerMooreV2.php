<?php 
function PreBmBc($pattern, $m, $bmBc = [])
{
    $i = 0;

    for ($i = 0; $i < 256; $i++) {
        $bmBc[$i] = $m;
    }

    for ($i = 0; $i < $m - 1; $i++) {
        $bmBc[$pattern[$i]] = $m - 1 - $i;
    }

    return $bmBc;
}

function PreBmGs($pattern, $m, $bmGs = [])
{
    $suff = suffix($pattern, $m);
    for ($i = 0; $i < $m; $i++) {
        $bmGs[$i] = $m;
    }

    // Case2
    $j = 0;
    for ($i = $m - 1; $i >= 0; $i--) {
        if ($suff[$i] == $i + 1) {
            for ($j; $j < $m - 1 - $i; $j++) {
                if ($bmGs[$j] == $m)
                    $bmGs[$j] = $m - 1 - $i;
            }
        }
    }

    // Case1
    for ($i = 0; $i <= $m - 2; $i++) {
        $bmGs[$m - 1 - $suff[$i]] = $m - 1 - $i;
    }
    return $bmGs;
}

function suffix($pattern, $m, $suff = [])
{
    $suff[$m - 1] = $m;
    for ($i = $m - 2; $i >= 0; $i--) {
        $j = $i;
        while ($j >= 0 && $pattern[$j] == $pattern[$m - 1 - $i + $j]) {
            $j--;
        }

        $suff[$i] = $i - $j;

    }

    return $suff;
}

function BoyerMoore($pattern, $m, $text, $n)
{

    $bmBc = PreBmBc($pattern, $m);
    // print_r($bmBc);
    $bmGs = PreBmGs($pattern, $m);
    // print_r($bmGs);
    $j = 0;
    while ($j <= $n - $m) {
        for ($i = $m - 1; $i >= 0 && $pattern[$i] == $text[$i + $j]; $i--) {
            $i--;
        }

        if ($i < 0) {
            echo "Find it , the position is $j";
            $j += $bmGs[0];

            return $j;
        } else {
            $j += max($bmBc[$text[$i + $j]] - $m + 1 + $i, $bmGs[$i]);
        }
    }
}

// $text = 'dfxxiaofangdfere';
// $pattern = 'xiaofang';
// BoyerMoore($pattern, strlen($pattern), $text, strlen($text));