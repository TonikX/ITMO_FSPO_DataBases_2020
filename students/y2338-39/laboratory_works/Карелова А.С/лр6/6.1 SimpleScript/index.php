<?php
	echo "Это всего лишь простой скрипт! :^)<br/>";
	//смотрите, я могу сделать комментарий
	
	$a = 6;
	$b = 5;
	$c = 8.5;
	
	if ($a === $b) echo 'Сейчас 5 утра';
	else if ($c < $b) echo 'Сейчас 10 вечера';
	else echo 'Сейчас 12 дня';
	
	echo " (на момент написания этого текста)";
	
	switch ($a) {
		
		case 5:
		echo ', я чувствую себя прекрасно!<br/>';
		break;
		
		case 3:
		echo ', у меня нет ни на что сил.<br/>';
		break;
		
		case 6:
		echo ', я просто хочу спать.<br/>';
		break;
		
		default:
		echo ', мне скучно.<br/>';
		break;
	};
	echo "Мне нравится много животных, сейчас расскажу.<br/>";
	$arr = array('Жаба','Лягушка','Кот','Змея');
	
	$i = 0;
	while ($i <= 3) {
		Switch ($i) {
			case '2':
			echo "$arr[$i] - это мохнатое животное!<br/>";
			break;
			default:
			echo "$arr[$i] - это гладкое животное!<br/>";
			break;
		};
		$i++;
	};
	$i = 0;
	do {
		$i += 1;
	} while ($i <4);
	if ($i%10 == 1) echo "Я сказала только $i животное.<br/>";
	else echo "Я сказала $i животных.";
	$j = 1;
	$i = 0;
	for ($i = 0; $j < 5; $i++ ) {
		echo "$arr[$i] для меня на $j месте.<br/>";
		$j++;
	};
	$newarr = array('зн1' => 4, 'зн2' =>10, 'зн3' => 17, 'зн4' => 24);
	
	foreach ($newarr as $key => $value) {
		echo "$key: $value <br/>";
	};
	
	function Test1($p1, $p2 = 'уйди') {
		echo "Осталось немного практики. $p1, $p2 <br/>";
	};
	
	Test1(2);
	
	
	$d = 5;
	echo $d;
	
	session_start();
		
	$_SESSION['lang'] = 'English';
	$_SESSION['choose'] = 'it';
?>

