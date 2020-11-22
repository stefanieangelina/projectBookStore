<div id="livechat-container" class="">
    <div class="livechat-head">Chat</div>
    <div class="livechat-body">
        <div class="livechat-message livechat-message-other">
            <span class="livechat-message-body">MessageBody</span>
            <span class="livechat-message-time">18:00</span>
        </div>
        <div class="livechat-message livechat-message-mine">
            <span class="livechat-message-body">MessageBody</span>
            <span class="livechat-message-time">18:00</span>
        </div>
        <div class="livechat-message livechat-message-mine">
            <span class="livechat-message-body">MessageBody</span>
            <span class="livechat-message-time">18:00</span>
        </div>
        <div class="livechat-message livechat-message-mine">
            <span class="livechat-message-body">MessageBody</span>
            <span class="livechat-message-time">18:00</span>
        </div>
        <div class="livechat-message livechat-message-mine">
            <span class="livechat-message-body">MessageBody</span>
            <span class="livechat-message-time">18:00</span>
        </div>
    </div>
    <div class="livechat-input">

        <input class="col"/>
         <a name="" id="" class="btn btn-primary d-inline" href="#" role="button">send</a>
    </div>
</div>
<script>
    $('.livechat-head').click(function (e) {
        e.preventDefault();
        $(this).parent().toggleClass('active');
    });
</script>
