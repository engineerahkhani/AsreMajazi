<meta charset="utf-8">
<link href="css/articlesStyle.css" rel="stylesheet" media="all" type="text/css">
<link href="css/bootstrap.css" rel="stylesheet" media="all" type="text/css">
<link href="css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css">
<?php
/**
 * Created by PhpStorm.
 * User: AHMAD
 * Date: 1/17/2016
 * Time: 9:27 AM
 */
$cat = $_GET['id'];
echo $cat;
?>
<div class="col-sm-8">
    <div id="articles">
        <div class="col-sm-12">
            <!--                                  show article list here-->
        </div>
    </div>
    <hr>

    <ul class="pagination"  id="pagination">
    </ul>

</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.twbsPagination.min.js"></script>
<script>
    $('#pagination').twbsPagination({
        totalPages:1,
        visiblePages:5,
        first:'شروع',
        prev:'قبلی',
        next:'بعدی',
        last:'پایان',
        onPageClick: function (event, page) {
            $('#page-content').text('Page ' + page);
            $('#articles .col-sm-12').load("test.php", {param1: page, param2:'174'});
        }
    });
</script>