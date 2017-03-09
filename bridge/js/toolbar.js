
$j(window).load(function(){

    setTimeout(function(){
        $j('.sticky_menu').addClass('open');
    },1000);

});

$j(document).ready(function() {
    $j('.sticky_close_bar a').on('click',function(e){
        e.preventDefault();
        $j('.sticky_menu').removeClass('open');
    });
});