<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdn.socket.io/4.0.1/socket.io.min.js" integrity="sha384-LzhRnpGmQP+lOvWruF/lgkcqD+WDVt9fU3H4BWmwP5u5LTmkUGafMcpZKNObVMLU" crossorigin="anonymous"></script>
<script>
            $(function() {
                let ip_address = '127.0.0.1';
                let socket_port = '3000';
                let socket = io(ip_address + ':' + socket_port);

                let chatInput = $('#chatInput');
                chatInput.keypress(function(e) {
                let message = $(this).html();
                var name = '{{$name}}';
                console.log(message);
                var total = name + ' : ' + message;
                var total2 = message + ' : ' + name;
                if(e.which === 13 && !e.shiftKey) {
                        socket.emit('sendChatToServer', total);
                        display(total2);
                        chatInput.html('');
                        return false;
                    }
                });
                const display = function(message){
                    $('.chat-content ul').append('${message}');
                }
                socket.on('sendChatToClient', (message) => {
                    $('.chat-content ul').append(`<li>${message}</li>`);
                });
            });
            
        </script>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- CSS only -->
<style>
            .chat-row {
                margin: 50px;
            }


             ul {
                position: absolute;
                 right: 25px;
                 margin: 0;
                 padding: 0;
                 list-style: none;
             }


             ul li {
                 border-top-right-radius: 5px;
                 border-top-left-radius: 5px;
                 border-bottom-left-radius: 5px;
                 border-bottom-right-radius: 5px;
                 padding:2px;
                 background: #77A6F7;
                 margin-bottom:20px;
                 
             }


             ul li:nth-child(2n-2) {
                background: #77A6F7;
             }


             .chat-input {
                 margin-top: 500px;
                 border: 1px soild lightgray;
                 border-top-right-radius: 10px;
                 border-top-left-radius: 10px;
                 padding: 8px 10px;
                 color:#F0F3F6;
                 width: 925px;
                 margin-left: -14px;
             }
             .bg-primary {
    background-color: #F0F3F6 !important;
    border: 1px soild lightgray;
    color:#8C9BA5;
             }
        </style>
@section('content')
<div class="container-fluid">
        <div class="row">

            <div class="col-lg-3 bg-dark-100 p-4" style="height: 100vh">
                <h5 class="font-weight-bold mb-3">Chats</h5>

                <div class="chat-list">
                    <p class="bg-gray-100 dark p-2 font-weight-bold radius-10"><i class="fa fa-comments-o" aria-hidden="true"></i> SASS Group</p>
                    <p class="bg-gray-100 dark p-2 font-weight-bold radius-10"><i class="fa fa-comments-o" aria-hidden="true"></i> Laravel Group</p>
                    <p class="bg-gray-100 dark p-2 font-weight-bold radius-10"><i class="fa fa-comments-o" aria-hidden="true"></i> Multimedia Group</p>
                    <p class="bg-gray-100 dark p-2 font-weight-bold radius-10"><i class="fa fa-comments-o" aria-hidden="true"></i> Capstone Group</p>
                    <p class="bg-gray-100 dark p-2 font-weight-bold radius-10"><i class="fa fa-comments-o" aria-hidden="true"></i> IT Group</p>
                </div>
            </div>
             
            <div class="col-lg-9 p-3">
            <div class="bg-grey-50 radius-10 p-2 mb-2">
                <div>
                    <div class="container">
                     <div class="row chat-row">
                     <div class="chat-content">
                    <ul>
                      
                    </ul>
                </div>    
                
                    </div>
                    <div class="chat-section">
                    <div class="chat-box">
                    <div class="d-flex">
                        <div class="chat-input bg-primary" id="chatInput" contenteditable="" required><span i class="fa fa-paper-plane" aria-hidden="true"> Type here...</span></div>  
                        </div>
                    </div>
                    </div>

                </div>
        </div>
        </div>
        </div>  
        </div>  
<style>
    .bg-secondary {
    background-color:#77A6F7  !important;
}
.bg-dark-100 {
    background-color: #D3E3FC !important;
}
    </style>
@endsection