

$(function(){

    // jQuery(document).on("click",".rpdocut",function(){})

    $("#product_light").mouseover(function(){
        $("#productImg_light").attr("src", "../assets/images/products/light_green.png");
        $("#circle_light").css("color","#2cb1ba", "border","5px solid #2cb1ba");
        $("#productP_light p").css("color","#232323");
        $("#servcircle1").css("border","5px solid #2cb1ba");
    });
    $("#product_light").mouseout(function(){
        $("#productImg_light").attr("src", "../assets/images/products/light.png");
        $("#circle_light").css("color","white");
        $("#productP_light p").css("color","white");
        $("#servcircle1").css("border","5px solid rgba(24, 24, 24, 0.3)");
    });


    $("#product_airCondition").mouseover(function(){
        $("#productImg_airCondition").attr("src", "../assets/images/products/airCondition_green.png");
        $("#circle_airCondition").css("color","#2cb1ba");
        $("#productP_airCondition p").css("color","#232323");
        $("#servcircle2").css("border","5px solid #2cb1ba");
    });
    $("#product_airCondition").mouseout(function(){
        $("#productImg_airCondition").attr("src", "../assets/images/products/airCondition.png");
        $("#productP_airCondition p").css("color","white");
        $("#circle_airCondition").css("color","white");
        $("#servcircle2").css("border","5px solid rgba(24, 24, 24, 0.3)");
    });


    $("#product_solarPanel").mouseover(function(){
        $("#productImg_solarPanel").attr("src", "../assets/images/products/solarPanel_green.png");
        $("#circle_solarPanel").css("color","#2cb1ba");
        $("#productP_solarPanel p").css("color","#232323");
        $("#servcircle3").css("border","5px solid #2cb1ba");
    });
    $("#product_solarPanel").mouseout(function(){
        $("#productImg_solarPanel").attr("src", "../assets/images/products/solarPanel.png");
        $("#productP_solarPanel p").css("color","white");
        $("#circle_solarPanel").css("color","white");
        $("#servcircle3").css("border","5px solid rgba(24, 24, 24, 0.3)");
    });


    $("#product_energyStorage").mouseover(function(){
        $("#productImg_energyStorage").attr("src", "../assets/images/products/energyStorage_green.png");
        $("#circle_energyStorage").css("color","#2cb1ba");
        $("#productP_energyStorage p").css("color","#232323");
        $("#servcircle4").css("border","5px solid #2cb1ba");
    });
    $("#product_energyStorage").mouseout(function(){
        $("#productImg_energyStorage").attr("src", "../assets/images/products/energyStorage.png");
        $("#productP_energyStorage p").css("color","white");
        $("#circle_energyStorage").css("color","white");
        $("#servcircle4").css("border","5px solid rgba(24, 24, 24, 0.3)");
    });


    $("#product_windowFirm").mouseover(function(){
        $("#productImg_windowFirm").attr("src", "../assets/images/products/windowFirm_green.png");
        $("#circle_windowFirm").css("color","#2cb1ba");
        $("#productP_windowFirm p").css("color","#232323");
        $("#servcircle5").css("border","5px solid #2cb1ba");
    });
    $("#product_windowFirm").mouseout(function(){
        $("#productImg_windowFirm").attr("src", "../assets/images/products/windowFirm.png");
        $("#productP_windowFirm p").css("color","white");
        $("#circle_windowFirm").css("color","white");
        $("#servcircle5").css("border","5px solid rgba(24, 24, 24, 0.3)");
    });

    

});
