</style>
<div id="sharepanel">

            <div class="sharer">
                <!-- Put this script tag to the <head> of your page -->
                <script type="text/javascript" src="http://userapi.com/js/api/openapi.js?20"></script>
                
                <script type="text/javascript">
                  VK.init({apiId: 2051465, onlyWidgets: true});
                </script>
                
                <!-- Put this div tag to the place, where the Like block will be -->
                <div id="vk_like"></div>
                <script type="text/javascript">
                VK.Widgets.Like("vk_like", {type: "button", verb: 1});
                </script>
            </div>
            <div class="sharer" style="width: 115px;">        
                <iframe src="http://www.facebook.com/plugins/like.php?href=<?=urlencode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'])?>&amp;layout=button_count&amp;show_faces=true&amp;width=450&amp;action=like&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:21px;" allowTransparency="true"></iframe>
            </div>
            <div class="sharer" style="width: 110px;">        
                <!-- Put this script tag to the <head> of your page -->
<script type="text/javascript" src="http://vkontakte.ru/js/api/share.js?10" charset="windows-1251"></script>

<!-- Put this script tag to the place, where the Share button will be -->
<script type="text/javascript"><!--
document.write(VK.Share.button(false,{type: "button_nocount", text: "Поделиться"}));
--></script>
            </div>                       
            <div class="sharer" style="width: 70px;">        
                <a name="fb_share"></a> 
                <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" 
                        type="text/javascript">
                </script>
            </div>
            <div class="sharer" style="width: 115px;">
            <a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
            </div>
      
</div>
