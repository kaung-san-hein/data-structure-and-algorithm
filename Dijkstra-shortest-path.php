<?php
$graph = [
    'A' => ['B' => 3, 'C' => 5, 'D' => 9],
    'B' => ['A' => 3, 'C' => 3, 'D' => 4, 'E' => 7],
    'C' => ['A' => 5, 'B' => 3, 'D' => 2, 'E' => 6, 'F' => 3],
    'D' => ['A' => 9, 'B' => 4, 'C' => 2, 'E' => 2, 'F' => 2],
    'E' => ['B' => 7, 'C' => 6, 'D' => 2, 'F' => 5],
    'F' => ['C' => 3, 'D' => 2, 'E' => 5],
];
function Dijkstra(array $graph, string $source, string $target): array
{
    $dist = [];
    $pred = [];
    $Queue = new SplPriorityQueue();
    foreach ($graph as $v => $adj) {
        $dist[$v] = PHP_INT_MAX;
        $pred[$v] = null;
        $Queue->insert($v, min($adj));
    }
    // dist[] => $dist[A] = MAX,$dist[B] = MAX,$dist[C] = MAX,

    $dist[$source] = 0; // $dist[A] = 0
    while (!$Queue->isEmpty()) {
        $u = $Queue->extract(); // A
        if (!empty($graph[$u])) {
            foreach ($graph[$u] as $v => $cost) {
                if ($dist[$u] + $cost < $dist[$v]) { // 0 + 3 < MAX
                    $dist[$v] = $dist[$u] + $cost; // dist[A] = 3
                    $pred[$v] = $u; // pred[A] = A
                }
            }
        }
    }

    $S = new SplStack();
    $u = $target;
    $distance = 0;

    while (isset($pred[$u]) && $pred[$u]) {
        $S->push($u);
        $distance += $graph[$u][$pred[$u]];  // distance = graph[B][]
        $u = $pred[$u]; // increment
    }
    if ($S->isEmpty()) {
        return ["distance" => 0, "path" => $S];
    } else {
        $S->push($source);
        return ["distance" => $distance, "path" => $S];
    }
}

$source = "A";
$target = "F";
$result = Dijkstra($graph, $source, $target);
extract($result);
echo "Distance from $source to $target is $distance <br/>";
echo "Path to follow : ";
while (!$path->isEmpty()) {
    echo $path->pop() . "\t";
}
