$(document).ready(function(){
    // $("#typingFirstName").keydown(function(){
    //     return /[a-z]/i.test(event.key);
    //   });

    //   $("#typingLastName").keydown(function(){
    //     return /[a-z]/i.test(event.key);
    //   });

    //   $('#typingLastName').on('input', function() {
    //     $(this).val($(this).val().replace(/[^a-z0-9]/gi, ''));
    //   });
    //   $('#typingFirstName').on('input', function() {
    //     $(this).val($(this).val().replace(/[^a-z0-9]/gi, ''));
    //   });
      
    //   $('#ec-mobile-number').on('input',function(){
    //     this.value = this.value.replace(/[^0-9\.]/g,'');
    //   });

    $("#exampleInputEmail1").change(function () { 
        var inputvalues = $(this).val();    
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(inputvalues)){    
          alert('invalid email id.');
          return regex.test(inputvalues);    
        }
    });   

});