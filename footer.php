<footer id="footer" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
    <div href="#" class="scrollup"><span class="fa fa-1x fa-chevron-up "></span></div>
    <div class="container">
        <div class="row">
            <div id="social-icons" class="btn-group btn-group-justified" role="group">
                <span><span class="fa fa-2x fa-envelope"></span></span>
                <span><span class="fa fa-2x fa-film"></span></span>
                <span><span class="fa fa-2x fa-send"></span></span>
            </div>
            <br>
            <h5 id="copy-right"> asremajazi.com &nbsp;<span class="fa fa-copyright"></span> &nbsp;2016</h5>
        </div>
    </div>
    <!--end footer section-->
    <div id=" <?php
    echo getnumrows2("article");
    ?>">
    </div>
    <script>
        $(document).ready(function () {
            $(".loader").addClass("animated slideOutUp")
            var $height = $(window).height();
            $('footer').css('opacity','0');
//        scrool to top
            $(window).scroll(function () {
                if ($(this).scrollTop() > 100) {
                    $('.scrollup').fadeIn();
                } else {
                    $('.scrollup').fadeOut();
                }
            });
            $('.scrollup').click(function () {

                $("html, body").animate({ scrollTop: 0 }, "slow");
                return false;
            });
            $(window).scroll(function (event) {
                var scrollTop = $(document).scrollTop();

                var docHeight = $( window ).height();


                if(scrollTop >= (docHeight - 300) )
                {
                    $("footer").addClass("animated zoomIn");
                }
            });
        });
    </script>
</footer>

