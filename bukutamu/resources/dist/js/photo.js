var video = document.getElementById('video'),
    vendorUrl = window.URL || window.webkitURL,
    canvas = document.getElementById("canvas"),
    context = canvas.getContext("2d");

function show_mdl(){
    $('#modalAbsen').modal("show");
    navigator.getMedia = navigator.getUserMedia ||
                            navigator.webkitGetUserMedia ||
                            navigator.mozGetUserMedia ||
                            navigator.msGetUserMedia;

    //capture
    navigator.getMedia({
        video:true,
        audio:  false
    }, function(stream){
        video.src = vendorUrl.createObjectURL(stream);
        video.play();
    }, function(error){
        //error
        
    });

}

function snap(){
    context.drawImage(video, 0, 0, 640, 480);
    $("#video").fadeOut("slow", function(){
        $("#canvas").fadeIn("slow");
        $("#canvas").css("visibility", 'visible');
            

        var dataUrl = canvas.toDataURL("image/jpeg", 0.85);   

        $('#targetGamber').attr('src', dataUrl);
        $('#textGambar').val(dataUrl);


        // $.ajax({
        //     type: "POST",
        //     url: "../action/upload_absensi.php",
        //     data: { 
        //         webcam: dataUrl
        //     }
        // }).done(function(msg) {

            
        //     var ms = JSON.parse(msg);
        //     if (ms.data == 2){
        //         alertify.alert('Maaf, sesi absensi berakhir');
        //     }
        //     else if(ms.data == 3){
        //         alertify.alert('Anda telah melakukan absensi untuk sesi ini');
        //     }
        //     else if(ms.data == 1){
        //         alertify.alert('Absensi berhasil dilakukan. Waktu absensi anda '+ ms.time);
        //         window.setTimeout(function () {
        //                window.location.reload();
        //         }, 1000);
        //     }

            

        //     // if (msg == 2){
        //     //     alertify.alert("Sesi berakhir");
        //     // }
        //     // else{
        //     //     alertify.alert(msg);
        //     // }
        // });
    });

}

function clear_photo(){
    $("#canvas").empty().hide(function(){
        $('#video').show();
    });
}