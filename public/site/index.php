<?php 
    include("view/header.php");

    include("view/slide.php");

    include("view/home-product.php");

?>
<script>
    $(document).ready(function() { 
        $(".owl-demo").owlCarousel({
            autoPlay: 3000, //Set AutoPlay to 3 seconds
            items :4,
            itemsDesktop : [640,5],
            itemsDesktopSmall : [414,4],
            navigation : true
        }); 
    }); 
</script>
<?php
    include("view/footer.php");
?>
