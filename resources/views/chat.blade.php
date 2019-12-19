@extends('admin.master')

@section('title', 'Chat')

@section('content')
    <input id="id_user_received" hidden>
    <input id="start_id" value="{{ Auth::user()->id }}" hidden>
    <div id="mmm">
        <div class="container">
            <h3 class=" text-center">Messaging</h3>
            <div class="messaging">
                <div class="inbox_msg">
                <div class="inbox_people">
                    <div class="headind_srch">
                    <div class="recent_heading">
                        <h4>Recent</h4>
                    </div>
                    <div class="srch_bar">
                        <div class="stylish-input-group">
                            <input type="text" class="search-bar"  placeholder="Search" >
                            <span class="input-group-addon">
                            <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                            </span> </div>
                        </div>
                    </div>
                    <div class="inbox_chat">
                        @foreach($users as $value)
                            <input id="id_user_send" value="{{ Auth::user()->id }}" hidden>
                            @if($value->id == Auth::user()->id)
                                <div class="chat_list" onclick="getId({{ $value->id }})" style="cursor: pointer">
                                    <div class="chat_people">
                                        <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                        <div class="chat_ib">
                                            <h5>My chat
                                            @if((DB::table('messages')->where([
                                                ['id_user_send', '=', Auth::user()->id],
                                                ['id_user_received', '=', $value->id],
                                            ])->orWhere([
                                                ['id_user_received', '=', Auth::user()->id],
                                                ['id_user_send', '=', $value->id],
                                            ])->orderBy('id', 'DESC')->first()) != null)
                                                <span class="chat_date">{{ (DB::table('messages')->where([
                                                    ['id_user_send', '=', Auth::user()->id],
                                                    ['id_user_received', '=', $value->id],
                                                ])->orWhere([
                                                    ['id_user_received', '=', Auth::user()->id],
                                                    ['id_user_send', '=', $value->id],
                                                ])->orderBy('id', 'DESC')->first())->created_at }}</span></h5>
                                                <p>{{ (DB::table('messages')->where([
                                                    ['id_user_send', '=', Auth::user()->id],
                                                    ['id_user_received', '=', $value->id],
                                                ])->orWhere([
                                                    ['id_user_received', '=', Auth::user()->id],
                                                    ['id_user_send', '=', $value->id],
                                                ])->orderBy('id', 'DESC')->first())->content }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="chat_list" onclick="getId({{ $value->id }})" style="cursor: pointer">
                                    <div class="chat_people">
                                        <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                        <div class="chat_ib">
                                            <h5>{{ $value->name }}
                                            @if((DB::table('messages')->where([
                                                ['id_user_send', '=', Auth::user()->id],
                                                ['id_user_received', '=', $value->id],
                                            ])->orWhere([
                                                ['id_user_received', '=', Auth::user()->id],
                                                ['id_user_send', '=', $value->id],
                                            ])->orderBy('id', 'DESC')->first()) != null)
                                                 <span class="chat_date">{{ (DB::table('messages')->where([
                                                    ['id_user_send', '=', Auth::user()->id],
                                                    ['id_user_received', '=', $value->id],
                                                ])->orWhere([
                                                    ['id_user_received', '=', Auth::user()->id],
                                                    ['id_user_send', '=', $value->id],
                                                ])->orderBy('id', 'DESC')->first())->created_at }}</span></h5>
                                                <p>{{ (DB::table('messages')->where([
                                                    ['id_user_send', '=', Auth::user()->id],
                                                    ['id_user_received', '=', $value->id],
                                                ])->orWhere([
                                                    ['id_user_received', '=', Auth::user()->id],
                                                    ['id_user_send', '=', $value->id],
                                                ])->orderBy('id', 'DESC')->first())->content }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        @foreach($my_groups as $value)
                            <div class="chat_list " onclick="getId({{ $value->id }})">
                                <div class="chat_people">
                                    <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                    <div class="chat_ib">
                                        <h5>{{ $value->name }}
                                        @if((DB::table('messages')->where('id_group', $value->id)->orderBy('id', 'DESC')->first()) != null)
                                            <span class="chat_date">{{ (DB::table('messages')->where('id_group', $value->id)->orderBy('id', 'DESC')->first())->created_at }}</span></h5>
                                            <p>{{ (DB::table('messages')->where('id_group', $value->id)->orderBy('id', 'DESC')->first())->content }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="mesgs">
                    <div class="msg_history"> 
                        <div id="chat">
                            @foreach($my_messages as $value)
                                @if($value->id_user_send != Auth::user()->id)
                                    <div class="incoming_msg">
                                        <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                        <div class="received_msg">
                                        <div class="received_withd_msg">
                                        <p>{{ $value->content }}</p>
                                        <span class="time_date"><i>Sent at: {{ $value->created_at->format('Y-m-d H:m:s') }}</i></span></div>
                                        </div>
                                    </div>
                                @else
                                    <div class="outgoing_msg">
                                        <div class="sent_msg">
                                        <p>{{ $value->content }}</p>
                                        <span class="time_date"><i>Sent at: {{ $value->created_at->format('Y-m-d H:m:s') }}</i></span> </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="type_msg">
                        <div class="input_msg_write">
                            <input id="message" type="text" class="write_msg" placeholder="Type a message" />
                            {{csrf_field()}}
                            <button id="send_chat" class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
                </div>
                <p class="text-center top_spac"> Design by <a target="_blank" href="#">Chin Indival</a></p>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        
        function getId(id) {
            $.ajax({
                method: 'GET', // Type of response and matches what we said in the route
                url: '/getMess', // This is the url we gave in the route
                data: {_token: CSRF_TOKEN,id: id}, // a JSON object to send back

                success: function(response){ // What to do if we succeed
                        console.log(response.html);
                        // $('.container').remove()
                        $('#mmm').html(response.html);
                        $('#id_user_received').attr('value', id);
                },
                error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                    console.log(JSON.stringify(jqXHR));

                    alert('編集しませんでした');
                }
            });
        };

        $(document).on('click', '#send_chat', function() {
            var id = $('#start_id').val();
            var id = $('#id_user_received').val();
            // alert(id);
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var id_user_send = $('#id_user_send').val();
            var message = $('#message').val();
            $.ajax({
                url: "/storeMess",
                method: "POST",
                data: { _token: CSRF_TOKEN, id: id, message: message, id_user_send: id_user_send},
                success: function (response) {
                    $("#mmm").html(response.html);
                },
                error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                    console.log(JSON.stringify(jqXHR));
                    alert('Can not send message!');
                }
            });
        });
        Pusher.logToConsole = true;
            var pusher = new Pusher('4c7dc639409e505ada7d', {
                cluster: "ap3",
                useTLS: true
            });
            // alert('Dd');
            var channel = pusher.subscribe('notify');
            channel.bind('pusher:subscription_succeeded', function(members) {
                // alert('successfully subscribed!');
            });
            channel.bind('App\\Events\\Notify', function (data) {
                var id = $('#start_id').val();
                    var id = $('#id_user_received').val();
                    // alert(id);
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    var id_user_send = $('#id_user_send').val();
                // alert(data.content);
                $.ajax({
                    url: "/getMess2",
                    method: "GET",
                    data: { _token: CSRF_TOKEN, id: id, id_user_send: id_user_send},
                    success: function (response) {
                        $("#mmm").html(response.html);
                    },
                    error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                        console.log(JSON.stringify(jqXHR));
                        alert('Can not send message!');
                    }
                });
            });
    </script>
@endsection