$(document).ready(function() {
	$('.tiny').tinymce({
		// Location of TinyMCE script
		script_url : '/js/lib/tiny_mce/tiny_mce.js',
		// General options
        mode : "exact",
		elements : "ajaxfilemanager",
        theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",
        theme_advanced_buttons1 : "mybutton,bold,italic,underline,strikethrough,|,forecolor,backcolor,|,sub,sup,|,justifyleft,justifycenter,justifyright, justifyfull,|,bullist,numlist,|,undo,redo,|,link,unlink,|,emotions,media,|,code",
		theme_advanced_buttons2 : "",
		theme_advanced_buttons3 :"",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "center",
		//theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : false,
		language: "ru",
        
        forced_root_block : false,
        force_br_newlines : true,
        force_p_newlines : false,
        relative_urls : false,
        remove_script_host : false,
        convert_urls : false,
        width : "100%",
        height:'150',
        
        content_css : "/css/tinyMce.css",
        relative_urls : true
		});
	});

