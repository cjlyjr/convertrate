$(function() {
    $(".keyth").click(function(e){
     e.preventDefault();
    });
     $("#inputid").click(function(e){
       e.preventDefault();
       $("#divinput").show();
       
     });
   
     $("#outputid").click(function(e){
       e.preventDefault();
       $("#divoutput").slideToggle( "slow", function() {
           
         });
     });
   
     $("#cinput tr").click(function(e){
       e.preventDefault();
       //$(this).find(".rightcol").css({"color": "red", "border": "2px solid red"});
       var id = $(this).find(".rightcol").html();
       $("#myInput").val(id);
     });
    
     $("#coutput tr").click(function(e){
       e.preventDefault();
       //$(this).find(".rightcol").css({"color": "red", "border": "2px solid red"});
       var id = $(this).find(".rightcol").html();
      
       
     $("#myOutput").val(id);
     });
    
     $("#sbform").submit(function(e){
       if($("#myInput").val()=="")
       {
        $("#crates").html("please select currency");
       }
       
     });
     
     })
     
   
   
   
   