 $("#submit-signup").click(function(){
  	$("#submit-signup").css('opacity', '0.4');
    $("#status").removeClass("alert alert-info");
    $("#status").empty();    
    var name = $("#name").val();
    var username = $("#username-signup").val();
    var email = $("#email").val();
    var password = $("#password-signup").val();
    var confirm = $("#confirm").val();
    $.post(url+"account/signup/action",{name:name,username:username,email:email,password:password,confirm:confirm},function(data){
      $("#submit-signup").css('opacity', '1');
           $("#status").addClass("alert alert-info");  
           $("#status").append(data);      
    });
  });        
 $("#submit-login").click(function(){
  	$("#submit-login").css('opacity', '0.4');
    $("#status").removeClass("alert alert-danger");
    $("#status").empty();
    var username = $("#username-login").val();
    var password = $("#password-login").val();   
     $.post(url+"account/login/action",{username:username,password:password},function(data){
     	  $("#submit-login").css('opacity', '1');
     	 if(data !== '1'){
           $("#status").addClass("alert alert-danger");  
 			     $("#status").append(data);      
        }else{
      	 	window.location = url + "@" + username;
        }    
    });
  });    
  $("#submit-update").click(function(){
    $("#status-update").removeClass("alert alert-info");
    $("#status-update").empty();        
  	$("#submit-update").css('opacity', '0.4');
    var name = $("#name").val();
    var id = $("#id").val();
    $.post(url+"account/update/action",{id:id,name:name},function(data){
      $("#submit-update").css('opacity', '1');
           $("#status-update").addClass("alert alert-info");  
           $("#status-update").append(data);      
    });
  }); 
  $("#submit-update-password").click(function(){
    $("#status-update-password").removeClass("alert alert-info");
    $("#status-update-password").empty();        
    $("#submit-update-password").css('opacity', '0.4');
    var password = $("#password").val();
    var confirm = $("#confirm").val();
    $.post(url+"account/update/password/action",{password:password,confirm:confirm},function(data){
      $("#submit-update-password").css('opacity', '1');
           $("#status-update-password").addClass("alert alert-info");  
           $("#status-update-password").append(data);      
    });
  }); 
  $("#submit-detail").click(function(){
    $("#status-detail").removeClass("alert alert-info");
    $("#status-detail").empty();        
    $("#submit-detail").css('opacity', '0.4');
    var bio = $("#bio").val();
    $.post(url+"account/update/bio/action",{bio:bio},function(data){
      $("#submit-detail").css('opacity', '1');
        $("#status-detail").addClass("alert alert-info");  
        $("#status-detail").append(data);      
    });
  }); 
  $("#submit-address").click(function(){
    $("#submit-address").css('opacity', '0.4');
    var address = $("#address").val();
    var city = $("#city").val();
    var zip = $("#zip").val();
    var state = $("#state").val();
    var country = $("#country").val();
    var pnumber = $("#pnumber").val();            
    $.post(url+"account/update/action/address",{address:address,city:city,zip:zip,state:state,country:country,pnumber:pnumber},function(data){
      $("#submit-address").css('opacity', '1');
         var toastHTML = '<span>'+ data +'</span>';
       M.toast({html: toastHTML});        
    });
  }); 
$(document).on('submit',"#profile-img",function(e){
  e.preventDefault();
  $("#submit-img").css('opacity','0.4');
    $.ajax({
    url: url+"account/update/action/pimage",
    type: "POST",
    data:  new FormData(this),
    contentType: false,
    cache: false,
    processData:false, 
    success: function(data){
      $("#submit-img").css('opacity','1');
        var toastHTML = '<span>'+ data +'</span>';
        M.toast({html: toastHTML});   
    },
    }); 
});

function zestRealLinks() {
    var links = document.getElementsByTagName('a');
    for(var i = 0; i < links.length; i++) {
        var thisLink = links[i];
        var source = thisLink.getAttribute('href'); 
         $(thisLink).click(function(e){
          e.preventDefault();
          var Address = $(this).attr('href');
          history.pushState(null,null, Address);
          $.get(Address,{},function(data){
            console.log(data);
            $("body").html(data);
            $("html, body").animate({ scrollTop: 0 }, 100);
          });
        });
    }
}
