<?php
require_once 'core/init.php';
if(!Input::exists('get'))
{
    Redirect::to('index.php');
}
?>

<?php include 'includes/styles.html';?>

<link rel="stylesheet" href="css/detail.css">

<?php include 'includes/navbar.php';?>

<?php
$search_query=Input::get('text');
if(strpos($search_query,'-')!==false) {
    $start = strpos($search_query, '-');
    $rough = substr($search_query, $start + 1);
//echo $rough;
    $end = strpos($rough, '-', 1);

    $search_text = substr($rough, 0, $end);
}
else {
    $search_text=$search_query;
}

$sort=Input::get('sortby');
$db=DB::getInstance();

//fetching the result
//$dr_unsortlist=$db->query("SELECT * FROM doctor WHERE dr_profession LIKE '%".$search_query."%'");
if( strpos($search_query,'clinic')!==false)
{
    $dr_unsortlist=$db->query("SELECT * FROM doctor WHERE dr_clinic_name LIKE '%".$search_text."%'");
}
elseif (strpos($search_query,'lab')!==false)
{
    $dr_unsortlist=$db->query("SELECT * FROM doctor WHERE dr_lab LIKE '%".$search_text."%'");
}
elseif (strpos($search_query,'doctors')!==false)
{
    $dr_unsortlist=$db->query("SELECT * FROM doctor WHERE dr_name LIKE '%".$search_text."%'");
}
else
{
    $dr_unsortlist = $db->query("SELECT * FROM doctor WHERE dr_profession LIKE '%".$search_text."%'");
}

//sorting
//if($sort=='rating')
//
//{$dr_list=$dr_unsortlist->query("Select * from doctor order by dr_rating desc");}
//
//else if($sort=='experience')
//
//{$dr_list=$dr_unsortlist->query("Select * from doctor order by dr_experience desc");}
//else if($sort=='highprice')
//
//{$dr_list=$dr_unsortlist->query("Select * from doctor order by dr_fees desc");}
//else if($sort=='lowprice')
//
//{$dr_list=$dr_unsortlist->query("Select * from doctor order by dr_fees asc");}
//else {
//    $dr_list=$dr_unsortlist->query("select * from doctor");
//}

// Page Number
$page = Input::get('page');

// Default page to 1
if ($page == '')
    $page = 1;
$dr_list=$dr_unsortlist;
$db = DB::getInstance();
//if($search_query=='Search "eye" in clinic')
//{
//    $dr_list=$db->query("SELECT * FROM doctor WHERE dr_clinic_name LIKE '%".$search_query."%'");
//}
//elseif ($search_query=='Search "eye" in lab')
//{
//    $dr_list=$db->query("SELECT * FROM doctor WHERE dr_lab LIKE '%".$search_query."%'");
//}
//elseif ($search_query=='Search "eye" in doctors')
//{
//    $dr_list=$db->query("SELECT * FROM doctor WHERE dr_name LIKE '%".$search_query."%'");
//}
//else
//{
//    $dr_list = $db->query("SELECT * FROM doctor WHERE dr_profession LIKE '%".$search_query."%'");
//}

// No  of items
$count = $dr_list->count();

// Items per page
$per_page = 3;

// No of pages
$pages_count = ceil($count / $per_page);

// Limiting conditions
if ($page < 1) {
    $page = 1;
}

if ($page > $pages_count) {
    $page = $pages_count;
}
?>

<div class="container">

<br><br>
<div class="row">
    <div class="col-sm-9">
<div class="row">
    <p class="col-sm-6"><?=$count?> Matches found for <strong><?=$search_query?></p></strong>
    <div class="col-sm-6 text-right">
        <form class="form-inline">
            <label for="sortby">Sort by: &nbsp;</label>
            <select id="sortby" class="form-control">
                <option value="relevance" <?php if ($sort == "relevance") echo "selected";?>>Relevance</option>
                <option value="rating" <?php if ($sort == "rating") echo "selected";?>>Rating</option>
                <option value="experience" <?php if ($sort == "experience") echo "selected";?>>Years of Experience</option>
                <option value="highPrice" <?php if ($sort == "highPrice") echo "selected";?>>Price - High to Low</option>
                <option value="lowPrice" <?php if ($sort == "lowPrice") echo "selected";?>>Price - Low to High</option>
            </select>
            <input type="hidden" id="searchQuery" value="<?=$search_query?>">
            <input type="hidden" id="pageno" value="<?=$page?>">
        </form>
    </div>
</div>

<br><br>

<?php
$last = $page * $per_page;

if ($count != 0) {
//creating one segment of doctor's data
for ($i = ($page - 1) * $per_page; $i < $count && $i < $last; ++$i)
{   $dr_id=$dr_list->results()[$i]->dr_id;
    $dr_image=$dr_list->results()[$i]->dr_image;
    $dr_name=$dr_list->results()[$i]->dr_name;
    $dr_degree=$dr_list->results()[$i]->dr_degree;
    $dr_experience=$dr_list->results()[$i]->dr_experience;
    $dr_profession=$dr_list->results()[$i]->dr_profession;
    $dr_clinic_name=$dr_list->results()[$i]->dr_clinic_name;
    $dr_rating=$dr_list->results()[$i]->dr_rating;
    $dr_address=$dr_list->results()[$i]->dr_address;
    $dr_fees=$dr_list->results()[$i]->dr_fees;
    $dr_time=$dr_list->results()[$i]->dr_time;

    include 'view/dr_detail_view.php';
}
?>

<div class="text-center">
    <ul class="pagination">
    <li <?=($page == 1 ? "class='disabled'" : "")?>><a href="#" id="prev">Previous</a></li>
    <li class="active"><a href="#">Page <?=$page?> of <?=$pages_count?></a></li>
    <li <?=($page == $pages_count ? "class='disabled'" : "")?>><a href="#" id="next">Next</a></li>
    </ul>
</div>
<?php } ?>

</div>

<?php include 'includes/scripts.html';?>

<?php include 'includes/sidebar.php';?>

</div>

<script>
$(function () {
    function updateSearch(page_offset) {
        return "detail.php?text=" + $("#searchQuery").val() + "&sortby=" + $("#sortby").val() + "&page=" + (parseInt($("#pageno").val()) + page_offset);
    }

    $("#sortby").change(function () {
        window.location.href = updateSearch(0);
    });

<?php if ($page > 1) { ?>
    $("#prev").attr("href", updateSearch(-1));
<?php }
if ($page < $pages_count) { ?>
    $("#next").attr("href", updateSearch(1));
<?php } ?>
})
</script>