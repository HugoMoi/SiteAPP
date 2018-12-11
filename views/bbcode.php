<?php
function code($texte)
{
//Smileys
$texte = str_replace(':D ', '<img src="../img/emojis/emo_smile.png" title="heureux" alt="heureux" style="width: 17px" />', $texte);

$texte = str_replace(':(', '<img src="../img/emojis/sad.png" title="triste" alt="triste" style="width: 17px" />', $texte);


$texte = str_replace(':|', '<img src="../img/emojis/emo_noreaction.png" title="confus" alt="confus" />', $texte);
$texte = str_replace(';)', '<img src="../img/emojis/emo_wink.png" title="clinOEIL" alt="choc" />', $texte);
$texte = str_replace(':question:', '<img src="./images/smileys/question.gif" title="?" alt="?" />', $texte);
$texte = str_replace(':exclamation:', '<img src="./images/smileys/exclamation.gif" title="!" alt="!" />', $texte);

//Mise en forme du texte
//gras
$texte = preg_replace('`\[g\](.+)\[/g\]`isU', '<strong>$1</strong>', $texte); 
//italique
$texte = preg_replace('`\[i\](.+)\[/i\]`isU', '<em>$1</em>', $texte);
//souligné
$texte = preg_replace('`\[s\](.+)\[/s\]`isU', '<u>$1</u>', $texte);
//lien
$texte = preg_replace('#http://[a-z0-9._/-]+#i', '<a href="$0">$0</a>', $texte);
$texte = preg_replace('`\[quote\](.+)\[/quote\]`isU', '<div id="quote">$1</div>', $texte);

//etc., etc.

//On retourne la variable texte
return $texte;
}
?>
