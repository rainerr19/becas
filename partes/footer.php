
<footer>

    <!-- <div class="foot-derechos">
            <p>todos los derechos reservados &copy;</p>
    </div>                     -->
                   
</footer>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->

<script src="<?php echo($root_url);?>assets/js/jquery-3.3.1.js"></script>
<script src="<?php echo($root_url);?>assets/js/bootstrap.js"></script>
<!-- <script src="<?php //echo($root_url);?>assets/js/popper.js"></script> -->

<!-- -------------------------data tables---------------------------- -->
<script type="text/javascript" src="<?php echo($root_url);?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo($root_url);?>assets/js/datatable.bootstrap4.min.js"></script>
<!-- <script src="<?php //echo($root_url);?>assets/js/dataTableUser.config.js"></script> -->
<!-- ----------------------------sidebar script------------------------- -->
<script>
    function open_sidebar() {
    document.getElementById("mySidebar").style.display = "block";
    }

    function close_sidebar() {
    document.getElementById("mySidebar").style.display = "none";
    }
//---------------- scroll ---------------------
if(document.getElementById("btn-top")!=null){
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        document.getElementById("btn-top").style.display = "block";
    } else {
        document.getElementById("btn-top").style.display = "none";
    }
    }

    //
    function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
    }
}
</script>