jQuery(document).ready(function($) {
    "use strict";
    
    $("body").on("click",".add-item", function(e){
        e.preventDefault();
        var conewrap = $(this).parent().clone();
        $(this).parent().before(conewrap)
        $(this).parent().prev(".clone-item").children(".add-item").addClass("remove-item ti-trash-b-io").removeClass("add-item ti-plus-io");
    });
    
    $("body").on("click",".remove-item", function(e){
        e.preventDefault();
        $(this).parent().remove();
    });
    
    $(".btn[data-tab]").on("click", function(){
        var tabID = $(this).attr("data-tab");
        $("#" + tabID).fadeIn(500).addClass("active").siblings(".tab-content").fadeOut(0).removeClass("active");
        $('.tabs-menu li[data-tab="' + tabID + '"]').addClass("active").siblings().removeClass("active");
    });
    
    $(".home-slider").slick({
        rtl:true,
        autoplay:true, // Enables Autoplay
        autoplaySpeed:5000, // Autoplay Speed in milliseconds
        speed:500, // Transition Speed In Milliseconds
        dots:true, // Enable or Disable Bullets
    });
    
    var gadwaURL = "www.gadwa.com"; // Gadwa Website Link
    $(".output-page.cover h5,.pdf-footer i").html(gadwaURL);
    
    $(".select2").select2();
    
});