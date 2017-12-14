var filter = ['words', '단어'],
    reg = new RegExp("(" + filter.join("|") + ")", "g");


//이름 경고
$('#name').keyup(function(){
    $("#dest").html(
        $(this).val().replace(reg, "<mark>$1</mark>")    
    );
   if(reg.test($(this).val())==true)
   {
       alert($(this).val().match(reg)+"는 금지어입니다");
	   
   }       
});


//내용 경고
$('#message').keyup(function(){
    $("#dest").html(
        $(this).val().replace(reg, "<mark>$1</mark>")    
    );
   if(reg.test($(this).val())==true)
   {
       alert($(this).val().match(reg)+"는 금지어입니다");
	   
   }       
});




