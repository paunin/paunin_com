function highlight(field) {
    field.focus();
    field.select();
}
$(document).ready(function(){
    $('.autoselect').click(function(){
        highlight(this);
    })    
});

function make_in(){
	$('.cool').focus(function (){
        $(this).addClass('cool_focus');
	}).blur(function (){
		$(this).removeClass('cool_focus');	 
	});	
}

/* scroll to element*/
function scrollto(elemId){
	if(!elemId || elemId=='top'){
		destination=0;
	}else{
	 	destination = $('#'+elemId).offset().top-10;
	}
    $("html,body").animate({ scrollTop: destination}, 700 );
	return true;
}
// main ready
$(document).ready(function(){
    $('body').toggleClass('hidden');
//    alert('s');
    make_in();
           
});
