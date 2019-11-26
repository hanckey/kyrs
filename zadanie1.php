<?php

$articleLink = "http://127.0.0.1/text.html";//ссылка на статью
$articleText = "<p><strong>Richard III</strong> (2 October 1452 – 22August 1485) 
was King of England for two years, from 1483 until his death in 1485 in the Battle 
of Bosworth Field. He was the last king of the House of York and the last of the 
Plantagenet dynasty. His defeat at Bosworth Field, the decisive battle of the Wars 
of the Roses, is sometimes regarded as the end of the Middle Ages in England. He is
the subject of the play<cite>Richard III</cite> by <a href=//en.wikipedia.org/wiki/William_Shakespeare>William Shakespeare.</a>";//текст статьи
if (mb_strlen($articleText, 'UTF-8') > 200) {
	$articlePreview = strip_tags($articleText);//убираем все html элементы
	$articlePreview = substr($articlePreview, 0, 200);//обрезаем на 200 символов
	$articlePreview = rtrim($articlePreview, "!,.- ");//Затем убедимся, 
											   //что обрезанный текст не заканчивается 
											   //восклицательным знаком, запятой, точкой 
											   //или тире или пробел
	
	$text = explode(' ', $articlePreview); # формирует массив из строки обрезая по пробелу
	$refer = " ".$text[count($text)-3]." ".$text[count($text)-2]." ".$text[count($text)-1];#заносим в массив три последних слова необходимых для того, чтобы сделать их ссылкой
	$len = mb_strlen($refer);#заносим в переменную количество символов, которые хранятся в массиве $refer
	$articlePreview = substr($articlePreview, 0, mb_strlen($articlePreview, 'UTF-8')-$len);#обрезаем текст без последних трёх слов
	echo $articlePreview."<a href=".$articleLink.">".$refer."</a>…";#делаем последние три слова и многоточие ссылкой
}
# 1. Если не сделать проверку на количество символов в строке, то даже если текст будет не обрезан, так как будет меньше 200 сиволов, то всё равно будет стоять "..."
# 2. Можно забыть убрать все html теги и текст будет менее читаемым
# 3. Если не обрезать в статье три последних слова, то эти три слова будут повторяться как в тексте, так и в виде ссылки далее после них
 
