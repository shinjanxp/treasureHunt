<?php
$user = 'abby';
$answer = 'yandex';
$lev = levenshtein($user, $answer);
similar_text($user, $answer, $percent);
echo 'levenstein:' . $lev . '<br>';
echo 'similar text:' . $percent;
?>
