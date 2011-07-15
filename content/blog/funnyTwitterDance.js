
/*
 * funnyTwitterDnace 1.0.2
 * http://paunin.com/ru/content/blog/SMO_witht_witter_friends_adder
 *
 * Copyright (c) 2011 Dmitriy Paunin (http://paunin.com)
 *
 * Dual licensed under the MIT and GPL licenses (same as jQuery):
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 *
 * $Date: 2011-06-14$
 */

/*settings*/
var actionLimit = 500;				//how many buttons will be clicked
var timeLimit = 2000; 				//wait befor next click
var timeOutScroll = 25000;                      //wait after scrolling
var unFollow = false;				//unfolow?
var liveTab = false;				//click user for open left panel
var removeFromDom = true;			//remove clicked items?
var debug = true;                               //use firebug console 


/* this settings isn't for edit */
var t;
var ts;

var dance_counter = 0;
var linkclass = unFollow?'.unfollow-button':'.follow-button';
var anti_linkclass = unFollow?'.follow-button':'.unfollow-button';
var click_counter = 0;
var scroll_counter = 1;
var last_user_id;

function dance_init(){
    scroller();
    dance();
}

function dance(){
    dance_counter+=1;
    makeLog('-------dance#'+dance_counter+'-------');
    makeLog('Get links...');
    var links = $(linkclass);
    
    if(links && links.size()){
        makeLog('Links: '+links.size());
        var link = links.first(); 
        var user_id = link.attr("data-user-id");
        if(last_user_id && last_user_id==user_id){
            makeLog('User '+user_id+' processing...');
        }else{
            if(liveTab)
                link.parents('.stream-item-content').first().click();
            click_counter+=1;
            link.focus().click();
            last_user_id = user_id;
            makeLog('User link '+user_id+' clicked! - ['+click_counter+' of '+actionLimit+']'); 
            if(removeFromDom){
                link.parents('.stream-item').first().remove();
                makeLog('Button holder for user '+user_id+' removed!');			
            }
            if(click_counter>=actionLimit){
                makeLog('Limit is done!');
                return;
            }
        }
        t=setTimeout("dance()",timeLimit);
    }else{
        makeLog('No more linlks to click');
        alert('No more linlks to click');
        return;
    }
}
/*scroll function*/
function scrollto(elem,to_bottom,fn){
    var cb_need=true;
    var destination = elem.offset().top - 150;
    if(to_bottom)
        destination += elem.height();

    $("html,body").animate({
        scrollTop: destination
    }, 1000, function(){
        $('#doc').focus();
        if(removeFromDom){
            var al = $(anti_linkclass);
            if(al && al.size())
                al.each(function(){
                    $(this).parents('.stream-item').remove()
                });  
        }
        if(fn && cb_need){
            cb_need = false;
            fn();
        }
    } );
}
/* scroller */
function scroller(){
    if(actionLimit-$(linkclass).size()-click_counter < 0){
        makeLog('Scrolling stopped. That\'s enough for limit action.');
        return;
    }
    scroll_counter+=1;
    makeLog('Scrolling '+scroll_counter+' ...');
    scrollto($('.stream-container'),true);
    t=setTimeout("scroller()",timeOutScroll);
}
/* log */
function makeLog(info){
    if(info &&  debug)
        console.info(info);
}
//------- red button :) ---->
dance_init();

