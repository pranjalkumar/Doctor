<div class="col-sm-2 col-sm-offset-1 hidden-xs sidebar" data-spy="affix" data-offset-top="100">
    <p><strong>Most Viewed</strong></p>
<?php
require_once 'core/init.php';

if (isset($dr_profession)) {
    $db=DB::getInstance();
    $list=$db->get('doctor',array('dr_profession','=',$dr_profession));
    $most_viewed=$list->query('select name from doctor order by dr_view desc;');

    for ($i = 0; $i < 5 && $i < $most_viewed->count(); ++$i) {
?>
        <a href="dr_profile.php?dr_id=<?=$most_viewed->results()[$i]->dr_id?>"><?=$most_viewed->results()[$i]->dr_name?></a><br>
<?php
    }
}
?>
</div>