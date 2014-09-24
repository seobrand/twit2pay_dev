
    <!--start Sign Up Form-->
    <div class="sign_up_container" id="first">
      <div class="sign_up_form_title">Connect with twitter and get started today!</div>
        <div class="sign_form">
          <ul>
            <li>
              <div class="login_facebook">
                <input id="twitter" type="image" value=" " src="<?php echo Helper::webroot(''); ?>img/sign-in-social.png">
              </div>
            </li>
          </ul>
        </div>
    </div>
    <!--end Sign Up Form-->


<script type="text/javascript">
(function (jQuery) {
    jQuery.oauthpopup = function (options) {
        options.windowName = options.windowName || 'ConnectWithOAuth';
        options.windowOptions = options.windowOptions || 'location=0,status=0,width='+options.width+',height='+options.height+',scrollbars=1';
        options.callback = options.callback || function () {
            window.location.reload();
        };
        var that = this;
        that._oauthWindow = window.open(options.path, options.windowName, options.windowOptions);
        that._oauthInterval = window.setInterval(function () {
            if (that._oauthWindow.closed) {
                window.clearInterval(that._oauthInterval);
                options.callback();
            }
        }, 1000);
    };
})(jQuery);
</script>

<script type="text/javascript">
(function($){
	$(document).ready(function(){
	    $('#twitter').click(function(e){
	        $.oauthpopup({
	            path: '<?php echo Router::url(array("controller" => 'twitters', 'action' => 'index'), true); ?>',
				width:600,
				height:600,
	            callback: function(){
	                window.location.reload();
	            }
	        });
			e.preventDefault();
	    });
	});
})(jQuery);
</script>