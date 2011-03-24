$(document).ready(function() {
	$('.big_tiny').tinymce({
		// Location of TinyMCE script
		script_url : '/js/lib/tiny_mce/tiny_mce.js',
		// General options
        mode : "exact",
		elements : "ajaxfilemanager",
        theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",
        theme_advanced_buttons1 : "newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,undo,redo,|,forecolor,backcolor,sub,sup,|,charmap,emotions,|,link,unlink,anchor,|,image,media",
		theme_advanced_buttons2 : "bullist,numlist,|,fontsizeselect,formatselect,tablecontrols,code,fullscreen",
		theme_advanced_buttons3 :"",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "center",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,
		language: "ru",
        file_browser_callback : "ajaxfilemanager",
        forced_root_block : false,
        force_br_newlines : true,
        force_p_newlines : false,
        relative_urls : false,
        remove_script_host : false,
        convert_urls : false,
        width : "100%",
        height:'300',
        
        content_css : "/css/tinyMce.css",
        relative_urls : true
		});
	});
function ajaxfilemanager(field_name, url, type, win) {
			var ajaxfilemanagerurl = "/js/lib/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php";
			switch (type) {
				case "image":
					break;
				case "media":
					break;
				case "flash": 
					break;
				case "file":
					break;
				default:
					return false;
			}
            tinyMCE.activeEditor.windowManager.open({
                url: "/js/lib/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php",
                width: 782,
                height: 440,
                inline : "yes",
                close_previous : "no"
            },{
                window : win,
                input : field_name
            });
		}
