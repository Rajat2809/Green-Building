
jQuery(document).ready(function(){
    var categoryName;
    //top 5 product category
    $("#product_light").mouseover(function(){
        $("#productImg_light").attr("src", "../assets/images/products/light_232323.png");
    });
    $("#product_light").mouseout(function(){
        $("#productImg_light").attr("src", "../assets/images/products/light.png");
    });


    $("#product_airCondition").mouseover(function(){
        $("#productImg_airCondition").attr("src", "../assets/images/products/airCondition_232323.png");
    });
    $("#product_airCondition").mouseout(function(){
        $("#productImg_airCondition").attr("src", "../assets/images/products/airCondition.png");
    });


    $("#product_solarPanel").mouseover(function(){
        $("#productImg_solarPanel").attr("src", "../assets/images/products/solarPanel_232323.png");
    });
    $("#product_solarPanel").mouseout(function(){
        $("#productImg_solarPanel").attr("src", "../assets/images/products/solarPanel.png");
    });


    $("#product_energyStorage").mouseover(function(){
        $("#productImg_energyStorage").attr("src", "../assets/images/products/energyStorage_232323.png");
    });
    $("#product_energyStorage").mouseout(function(){
        $("#productImg_energyStorage").attr("src", "../assets/images/products/energyStorage.png");
    });


    $("#product_windowFirm").mouseover(function(){
        $("#productImg_windowFirm").attr("src", "../assets/images/products/windowFirm_232323.png");
    });
    $("#product_windowFirm").mouseout(function(){
        $("#productImg_windowFirm").attr("src", "../assets/images/products/windowFirm.png");
    });

    jQuery(document).on("change",".FilterChange",function(e){
        e.preventDefault();
        jQuery('#searchVal').val('');
        var price=jQuery("input[name='price']:checked"). val();
        var review=jQuery("input[name='review']:checked"). val();
        var categorySort=jQuery("select[name='SortControl']").val();
        categorySelect();
        var priceMultiple=[];
        var priceMin, priceMax;
        var flag=false;
        var custom='false';
       if(price)
       {
         jQuery("#MinPrice").attr('disabled', true);
         jQuery("#MaxPrice").attr('disabled', true);
         jQuery("#btnPriceFiltter").attr('disabled', true);
        if(price.search(',')==-1 && price != 0)
        {
            priceMin=price;
            priceMax=0;
            flag=true;
        }
        else if(price==0){
            jQuery("#MinPrice").attr('disabled', false);
            jQuery("#MaxPrice").attr('disabled', false);
            jQuery("#btnPriceFiltter").attr('disabled', false);
            if(jQuery("#MinPrice"). val())
            priceMin=jQuery("#MinPrice"). val();
            if(jQuery("#MaxPrice"). val())
            priceMax=jQuery("#MaxPrice"). val();
            flag=false;
        }
        else
        {
            priceMultiple=price.split(',');
            priceMin=priceMultiple[0];
            priceMax=priceMultiple[1];
            flag=true;
        }
    }
        if(review)
        {
            flag=true;
        }
        if(categorySort)
        {
            flag=true;
        }
        if(flag){
            jQuery('#productList_single').animate({ opacity:0.5 },'normal');
            $.post('../php/listener.php',{ action : 'grid',priceMin,priceMax,custom,review,categorySort,categoryName},function(data){

                jQuery('#productList_single').html(data);
                jQuery('#productList_single').animate({ opacity:1},'normal');
            })
        }
    });

    jQuery(document).on('click','#btnPriceFiltter',function(e){
        e.preventDefault();
        var priceMin=Number(jQuery("#MinPrice"). val());
        var priceMax=Number(jQuery("#MaxPrice"). val());
        var review=jQuery("input[name='review']:checked"). val();
        var categorySort=jQuery("select[name='SortControl']").val();
        var custom='true';

        if(!priceMin && !priceMax)
        {
            alert("Min Price and Max Price cannot be empty");
        }
        else if(!priceMin)
        {
            alert("Min Price cannot be empty");
        }
       else if(!priceMax)
        {
            alert("Man Price cannot be empty");
        }
        else if(priceMin >= priceMax){
            alert("Min Price should be less then Max price");
        }
        else
        {
         jQuery('#productList_single').animate({ opacity:0.5 },'normal');
            $.post('../php/listener.php',{ action : 'grid',priceMin,priceMax,custom,categoryName,review,categorySort},function(data){

                jQuery('#productList_single').html(data);
                jQuery('#productList_single').animate({ opacity:1},'normal');
            })   
        }
         
    });
     jQuery(document).on('click','#searchButton',function(e){
            e.preventDefault();
            var searchVal=jQuery('#searchVal').val();
            if(searchVal){
            resetAllFilters();
             jQuery('#productList_single').animate({ opacity:0.5 },'normal');
            $.post('../php/listener.php',{ action : 'search',searchVal,custom:'false'},function(data){

                jQuery('#productList_single').html(data);
                jQuery('#productList_single').animate({ opacity:1},'normal');
                })
            }
            else
            {
                alert("Please enter name of product to search");
            }

     });
      jQuery(document).on('click','#insertToCart',function(e){
               var productName= jQuery(this).attr("data-productName");
               var brandName= jQuery(this).attr("data-brandName");
               var unitPrice= jQuery(this).attr("data-unitPrice");
               
                jQuery('#productList_single').animate({ opacity:0.5 },'normal');
            $.post('../php/listener.php',{ action : 'addToCart',productName,brandName,unitPrice,quantity:1},function(data){

                jQuery('#productList_single').html(data);
                jQuery('#productList_single').animate({ opacity:1},'normal');
            })   
                
      });
      jQuery(document).on('click','.categorySelect',function(e){
        
                resetAllFilters();
                jQuery('#product_light').attr('data-onselect','0');
                jQuery('#product_airCondition').attr('data-onselect','0');
                jQuery('#product_solarPanel').attr('data-onselect','0');
                jQuery('#product_energyStorage').attr('data-onselect','0');
                jQuery('#product_windowFirm').attr('data-onselect','0');
                jQuery(this).attr('data-onselect','1');
                categorySelect();
                jQuery('#productList_single').animate({ opacity:0.5 },'normal');
            $.post('../php/listener.php',{ action : 'categoryChange',categoryName},function(data){

                jQuery('#productList_single').html(data);
                jQuery('#productList_single').animate({ opacity:1},'normal');
            })   
                
      });
      
       jQuery(document).on('click','#detailToCart',function(e){
        var productName= jQuery('#productName').text();
               var brandName= jQuery('#brand').text();
               var unitPrice=Number(jQuery('#productPrice').text());
               var quantity= jQuery('#quantityInput').val();
               
            $.post('../php/listener.php',{ action : 'addToCart',productName,brandName,unitPrice,quantity},function(data){
                window.location = '../php/shoppingCart.php';
            })  
       });
    function resetAllFilters()
    {
        jQuery("input[name='price']:checked").attr('checked',false);
        jQuery("input[name='review']:checked").attr('checked',false);
        jQuery("select[name='SortControl']").val('PLH');
        jQuery("#MinPrice").attr('disabled', true);
        jQuery("#MaxPrice").attr('disabled', true);
        jQuery("#btnPriceFiltter").attr('disabled', true);
    }
    function categorySelect()
    {
        var categoryID=jQuery('div[data-onselect="1"]').attr('id');
                
                if(categoryID=='product_airCondition')
                {
                    categoryName='Air Condition';
                }
                else if(categoryID=='product_solarPanel')
                {
                    categoryName='Solar Panel';
                }
                 else if(categoryID=='product_energyStorage')
                {
                    categoryName='Energy Storage';
                }
                 else if(categoryID=='product_windowFirm')
                {
                    categoryName='Window Film';
                }
                else
                {
                    categoryName='Lights';
                }
                
    }
});
