<?php
	
    $bl = TRUE;
    $int = 69;
    $fl = 69.69;
    $str = 'Hewwo, World!';
    echo 'Vars: Bool: ' . $bl . ' Integer: ' . $int . ' Float: ' . $fl . ' Text: ' . $str . '<br>';
    $arr = [
        1 => 'First item of array',
        2 => 'Second item of array',
        3 => 'Third item of array'
    ];
    $random_number = rand(1, 3);
    if ($random_number) {
        echo 'If: ' . $random_number . '<br>';
    }
    echo 'Switch: ';
    switch ($random_number) {
        case 1:
            echo 'One';
            break;
        case 2:
            echo 'Two';
            break;
        case 3:
            echo 'Three';
            break;
        default:
            echo 'How?';
            break;
    };
    echo '<br>';

    echo 'For: ';
    for ($i=0; $i < 3; $i++) { 
        echo rand(1, 3) . ' ';
    }
    $j = 0;
    $i = 0;
    echo '<br>While: ';
    while ($i != 3) {
        $i=rand(1, 3);
        echo $i . ' ';
        $j++;
        if ($j == 5) break;
    }

    echo '<br>Foreach: ';
    foreach ($arr as $kekiterator) {
        echo $kekiterator . ' ';
    }

    function foo()
    {
        echo "<br>Function foo() typed this.\n";
    }
    foo();

    session_start();
    $_SESSION['randy random'] = 9;
    $_SESSION['time']     = time();
    echo '<br>Session data output: ' . $_SESSION['randy random'] . ' ' . $_SESSION['time'];
    $_SESSION = array();
?>
