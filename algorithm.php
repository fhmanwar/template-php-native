
<div class="row d-flex justify-content-center">
    <div class="col-xl-4 col-lg-5">
        <div class="card border-left-success shadow h-100 py-2">
            <!-- Card Header - Dropdown -->
            <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                <h4 class="m-0 font-weight-bold text-primary">RESIQ.ID BOT</h4>
                
            </div> -->
            <div class="card-body">
                <!-- <div class="logo">
                    <a href="https://resiq.id">
                        <img src="images/icon.png" width="20%">
                    </a>
                </div> -->

                <div class="row d-flex justify-content-center">
                    <div class="wrapper">
                        <div class="title">RESIQ.ID BOT</div>
                        <div class="form">
                            <div class="bot-inbox inbox">
                                <div class="icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="msg-header">
                                    <p>Hai, Selamat datang di Resiq.Id</p><br>
                                    <p>Silahkan tulis pertanyaan Anda di bawah</p>
                                </div>
        
                            </div>
                        </div>
                        <div class="typing-field">
                            <div class="input-data">
                                <input id="data" type="text" placeholder="Ketik sesuatu di sini.." required>
                                <button id="send-btn">Kirim</button>
                            </div>
                        </div>
                    </div>                    
                </div>
    
            </div>
        </div>
    </div>     
</div>

<script>
    $(document).ready(function(){
        $("#send-btn").on("click", function(){
            var value = $("#data").val();
            var msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ value +'</p></div></div>';
            $(".form").append(msg);
            $("#data").val('');
            
            // console.log(value);
            $.ajax({
                url: 'algoProses.php',
                type: 'POST',
                dataType: "JSON",
                // data: 'text='+$value,
                data: {
                    method: 'get',
                    ask: value
                },
            }).then((res) => {
                // debugger;
                // var data = JSON.parse(res);
                // console.log(res);
                var data = res.data;
                if (data.length > 1) {
                    $.each(data , function(index, val) { 
                        // console.log(index, val)
                        var replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ val.res +'</p></div></div>';
                        $(".form").append(replay);
                        // when chat goes down the scroll bar automatically comes to the bottom
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    });
                    
                } else {
                    var replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ data.res +'</p></div></div>';
                    $(".form").append(replay);
                    // when chat goes down the scroll bar automatically comes to the bottom
                    $(".form").scrollTop($(".form")[0].scrollHeight);
                }
            });
        });
    });
</script>