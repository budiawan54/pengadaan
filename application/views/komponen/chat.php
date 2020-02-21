<div class="col-md-5 chat_panel ">
    <div class="panel panel-primary " style="margin-bottom: 0px !important;">
        <div class="panel-heading">
            <h5 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Chat
            <div class="pull-right" >
                <a href="#" style="color: #FFF;"><span id="minim_chat_window" class="glyphicon glyphicon-minus icon_minim"></span></a>
            </div>
            </h5>
        </div>
        <div class="panel-body msg_container_base ">
            <div  id="chat_target">

            </div>

        </div>
        <div class="panel-footer">
            <form action="<?php echo base_url('home/kirimPesanDiskusi') ?>" method="POST" id="form_chat">
                <div class="input-group">
                    <input id="btn-input" type="text" name="isi" class="form-control input-sm" placeholder="Type your message here..." autocomplete="off" />
                    <input type="hidden" name="Id_Pengajuan_Pengadaan" value="<?php echo $pengajuan['Id_Pengajuan_Pengadaan'] ?>" />
                    <span class="input-group-btn">
                        <button class="btn btn-warning btn-sm" id="btn-chat" data-loading-text="loading...">
                            Kirim</button>
                    </span>
                </div>

            </form>
        </div>
    </div>
</div>

<script src="https://js.pusher.com/4.1/pusher.min.js"></script>
<script>
    var user_id = <?php echo $userLogin['Id_User'] ?>;

    function loadChat(){
        var data = '';

        $.get("<?php echo base_url('home/loadPesandiskusi/' . $pengajuan['Id_Pengajuan_Pengadaan']) ?>", function(de){

            var d = $.parseJSON(de);

            for (var i = 0; i < d.length; i++) {

                data = d[i];

                var class_parent = '';

                if (data.is_parent_pertanyaan == 1){
                    class_parent = '<span class="text-primary"><i class="fa fa-check"></i></span>';
                }


                if (data.Id_User == user_id){

                    var field = '<div class="row msg_container base_sent">'
                            +'<div class="col-md-11 col-xs-11">'
                                +'<div class="messages msg_sent">'
                                    +'<b>'+ data.Nama_Lengkap +' ' + class_parent +'</b><br>'
                                    +'<p>'+ data.isi +'</p>'
                                    +'<time datetime="'+ data.posted_at +'">'+ data.posted_at +'</time>'
                                +'</div>'
                            +'</div>'
                            +'<div class="col-md-1 col-xs-1 avatar">'
                                +'<img src="<?php echo base_url('resources/image/user.png') ?>" class="img-responsive ">'
                            +'</div>'
                        +'</div>';
                }
                else{

                    var field = '<div class="row msg_container base_receive">'
                            +'<div class="col-md-1 col-xs-1 avatar">'
                                +'<img src="<?php echo base_url('resources/image/user.png') ?>" class="img-responsive ">'
                            +'</div>'
                            +'<div class="col-md-11 col-xs-11">'
                                +'<div class="messages msg_receive">'
                                    +'<b>'+ data.Nama_Lengkap +' ' + class_parent +'</b><br>'
                                    +'<p>'+ data.isi +'</p>'
                                    +'<time datetime="'+ data.posted_at +'">'+ data.posted_at +'</time>'
                                +'</div>'
                            +'</div>'
                        +'</div>';
                           
                }

                $('#chat_target').append(field);
                $('#chat_target').animate({scrollTop:$('#chat_target').height()},100);
            }

            var div = $(".msg_container_base");
            div.scrollTop(div.prop('scrollHeight'));

        });
    }

    $(function(){

        loadChat();

        $('#form_chat').on("submit", function(e){
            e.preventDefault();
            $('#btn-chat').button('loading');
            $.ajax({
                type : 'POST',
                url : $(this).attr('action'),
                data : $(this).serialize(),
                success : function(e){
                    $('input[name="isi"]').val('');
                    $('#btn-chat').button('reset');
                },
                error : function(){
                    
                    $('#btn-chat').button('reset');
                }
            })
        });
    });

    $(document).on('click', '.panel-heading span.icon_minim', function (e) {
        var $this = $(this);
        if (!$this.hasClass('panel-collapsed')) {
            $this.parents('.panel').find('.panel-body').slideUp();
            $this.parents('.panel').find('.panel-footer').slideUp();
            
            $this.addClass('panel-collapsed');
            $this.removeClass('glyphicon-minus').addClass('glyphicon-plus');
        } else {
            $this.parents('.panel').find('.panel-body').slideDown();
            $this.parents('.panel').find('.panel-footer').slideDown();
            $this.removeClass('panel-collapsed');
            $this.removeClass('glyphicon-plus').addClass('glyphicon-minus');
        }
    });
    $(document).on('focus', '.panel-footer input.chat_input', function (e) {
        var $this = $(this);
        if ($('#minim_chat_window').hasClass('panel-collapsed')) {
            $this.parents('.panel').find('.panel-body').slideDown();
            $('#minim_chat_window').removeClass('panel-collapsed');
            $('#minim_chat_window').removeClass('glyphicon-plus').addClass('glyphicon-minus');
        }
    });
    $(document).on('click', '#new_chat', function (e) {
        var size = $( ".chat-window:last-child" ).css("margin-left");
         size_total = parseInt(size) + 400;
        alert(size_total);
        var clone = $( "#chat_window_1" ).clone().appendTo( ".container" );
        clone.css("margin-left", size_total);
    });


    var pusher = new Pusher('60ca35d3a40d7cbfb839', {
        encrypted: true
    });

    var channel = pusher.subscribe('blp_<?php echo $pengajuan['Id_Pengajuan_Pengadaan'] ?>');
 

    channel.bind('chat_masuk', function(data) {
            
        var class_parent = '';

        if (data.is_parent_pertanyaan == 1){
            class_parent = '<span class="text-primary"><i class="fa fa-check"></i></span>';
        }

        if (data.Id_User == user_id){

            var field = '<div class="row msg_container base_sent">'
                    +'<div class="col-md-11 col-xs-11">'
                        +'<div class="messages msg_sent">'
                            +'<b>'+ data.Nama_Lengkap +' ' + class_parent +'</b><br>'
                            +'<p>'+ data.isi +'</p>'
                            +'<time datetime="'+ data.posted_at +'">'+ data.posted_at +'</time>'
                        +'</div>'
                    +'</div>'
                    +'<div class="col-md-1 col-xs-1 avatar">'
                        +'<img src="<?php echo base_url('resources/image/user.png') ?>" class="img-responsive ">'
                    +'</div>'
                +'</div>';
        }
        else{

            var field = '<div class="row msg_container base_receive">'
                    +'<div class="col-md-1 col-xs-1 avatar">'
                        +'<img src="<?php echo base_url('resources/image/user.png') ?>" class="img-responsive ">'
                    +'</div>'
                    +'<div class="col-md-11 col-xs-11">'
                        +'<div class="messages msg_receive">'
                            +'<b>'+ data.Nama_Lengkap +' ' + class_parent +'</b><br>'
                            +'<p>'+ data.isi +'</p>'
                            +'<time datetime="'+ data.posted_at +'">'+ data.posted_at +'</time>'
                        +'</div>'
                    +'</div>'
                +'</div>';
                   
        }


        $('#chat_target').append(field);

        var div = $(".msg_container_base");
        div.scrollTop(div.prop('scrollHeight'));

    });




</script>

