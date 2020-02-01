<footer>
			<div id="sticky-chat" class="sticky-chat">
				<!-- <button><img src="<'images/chat-logo.png'); ?>" alt="">チャット相談</button> -->
				<div class="return-to-top"><i class="fa fa-2x fa-chevron-up'); ?>"></i></div>
			</div>
			<div class="sns">
				<a href=""><img src="<?php echo base_url('images/line.png'); ?>" alt=""></a>
				<a href=""><img src="<?php echo base_url('images/fb.png'); ?>" alt=""></a>
				<a href=""><img src="<?php echo base_url('images/twitter.png'); ?>" alt=""></a>
				<a href=""><img src="<?php echo base_url('images/instagram.png'); ?>" alt=""></a>
			</div>
			
			<p>Copyright © ad-kit Co.,Ltd. All rights resereved.</p>
		</footer>
		
	</div>	<!-- Page: HOME end -->



<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>
<script type="text/javascript" src="<?php echo base_url('js/wow.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/custom.js'); ?>"></script>
<!-- <script>
    new WOW().init();
	console.log("Wow Start");
</script> -->

<!-- Start of Easychat code -->
<script>
var a = document.createElement('a');
a.setAttribute('href', 'javascript:;');
a.setAttribute('id', 'easychat-floating-button');
var img = document.createElement('img');
img.src = 'http://adkitdev.s200.coreserver.jp/test-sites/cebu/careerdirect/php/images/chat-logo.png';
a.appendChild(img);
var span = document.createElement('span');
span.setAttribute('id', 'easychat-unread-badge');
span.setAttribute('style', 'display: none');
var d1 = document.createElement('div');
d1.setAttribute('id', 'easychat-close-btn');
d1.setAttribute('class', 'easychat-close-btn-close');
var d2 = document.createElement('div');
d2.setAttribute('id', 'easychat-chat-dialog');
d2.setAttribute('class', 'easychat-chat-dialog-close');
var ifrm = document.createElement('iframe');
ifrm.setAttribute('id', 'easychat-chat-dialog-iframe');
ifrm.setAttribute('src', 'https://client-chat.easychat.co/?appkey=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ0ZWFtTmFtZSI6IlRlYW0gQUsifQ.Qxx6uSQUJmSlD7kqjATmCe7rqnxwo1lftfS44M6Oo40&lang=en');
ifrm.style.width = '100%';
ifrm.style.height = '100%';
ifrm.style.frameborder = '0';
ifrm.style.scrolling = 'on';
d2.appendChild(ifrm);
var stickchat = document.querySelector("#sticky-chat");
stickchat.appendChild(d2);
document.body.appendChild(a);
document.body.appendChild(span);
document.body.appendChild(d1);
document.body.appendChild(d2);
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$("#easychat-floating-button").remove().prependTo(".sticky-chat");
		$("#easychat-floating-button").append("チャット相談");
		$("#easychat-chat-dialog").remove().appendTo(".sticky-chat");
		$("#easychat-unread-badge").remove().appendTo(".sticky-chat");
		$("#easychat-close-btn").remove().appendTo(".sticky-chat");
	});
</script>


<script src='https://chat-plugin.easychat.co/easychat.js'></script>
<!-- End of Easychat code -->

</body>
</html>