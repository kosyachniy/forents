<?php
include('func.php');

start('Поиск', 'sys/search.php', 'Поиск по сайту');
$db=db('');
$search=mb_strtolower($_POST['search'], 'UTF-8');
print '<br>Результаты поиска "'.$search.'"<br>';

$l=0;
print '<div class="c5">';
$res=mysqli_query($db,"SELECT * FROM `note`");
while($d=mysqli_fetch_array($res))
  {
  if (stripos(' '.mb_strtolower($d['nam'], 'UTF-8'), $search) || stripos(' '.mb_strtolower($d['state'], 'UTF-8'), $search) || stripos(' '.mb_strtolower($d['city'], 'UTF-8'), $search) || stripos(' '.mb_strtolower($d['street'], 'UTF-8'), $search) || stripos(' '.mb_strtolower($d['house'], 'UTF-8'), $search) || stripos(' '.mb_strtolower($d['apartment'], 'UTF-8'), $search) || stripos(' '.mb_strtolower($d['cont'], 'UTF-8'), $search) || stripos(' '.mb_strtolower($d['dop'], 'UTF-8'), $search) || stripos(' '.mb_strtolower($d['metro'], 'UTF-8'), $search) || $d['id']==$search)
    {
    $l=$l+1;
    print '<a href="../?i='.$d['id'].'"><div style="background-image: url(/sys/bck/'.$d['id'].'.jpg);"><div><table><tr><td>';
    if ($d['nam']) print $d['nam'];
      else print $d['city'].', '.$d['street'].', '.$d['house'].', '.$d['apartment'];
    if ($d['metro']) print ' ('.$d['metro'].')';
    print '<br>'.$d['room'].'-комнатная, '.$d['metr'].' м<sup>2</sup></td><td class="c6">&nbsp;'.$d['price'].'₽</td></tr></table></div></div></a>';
    }
  }
print'</div>';

finish();
act(15,$search);
?>