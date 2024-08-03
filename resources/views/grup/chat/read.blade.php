@extends('layouts.admin')

@section('title', 'Chat Grup WESAVS')

@section('content')
    <style>
        .length-group-chat {
            max-height: 400px;
            overflow-y: scroll;
            overflow-x: hidden;
            max-width: 100%;
        }
    </style>
    <script src="https://cdn.ably.com/lib/ably.min-1.js" type="text/javascript"></script>

    <div class="wrapper">
        <x-navbar></x-navbar>
        <x-sidebar></x-sidebar>
        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="title-panel">
                        <h2 class="h3 mb-2 mt-4 page-title">Chat Grup</h2>
                        <p>Berdiskusi dan berbagi dengan sopan santun</p>
                    </div>
                    <div class="button-panel">
                        <button class="btn btn-danger grup-delete" data-card-id="{{ $grup->id }}"> <i
                                class="fe fe-log-out fe-12"></i> Keluar
                            Grup</button>
                    </div>
                </div> <!-- /.col-12 -->
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title">{{ $grup->name }}</strong>
                        <span class="float-right"><span class="badge badge-pill badge-success text-white">open</span></span>
                    </div>
                    <div class="card-body">
                        <dl class="row align-items-center mb-0">
                            <dt class="col-sm-2 mb-3 text-muted">Admin Grup</dt>
                            <dd class="col-sm-4 mb-3">
                                <strong>{{ $grup->user->name }}</strong>
                            </dd>
                            {{-- <dt class="col-sm-2 mb-3 text-muted">Jumlah Member</dt>
                            <dd class="col-sm-4 mb-3">
                                <strong>12,344 member</strong>
                            </dd> --}}
                            <dt class="col-sm-2 mb-3 text-muted">Tipe Grup</dt>
                            <dd class="col-sm-4 mb-3">
                                <strong>Terbuka Untuk Umum</strong>
                            </dd>
                        </dl>
                        <dl class="row align-items-center mb-0">
                            <dt class="col-sm-2 mb-3 text-muted">Dibuat Pada</dt>
                            <dd class="col-sm-4 mb-3">
                                <strong>{{ $grup->created_at }}</strong>
                            </dd>
                            {{-- <dt class="col-sm-2 mb-3 text-muted">Tipe Grup</dt>
                            <dd class="col-sm-4 mb-3">
                                <strong>Terbuka Untuk Umum</strong>
                            </dd> --}}
                        </dl>
                        <dl class="row mb-0">
                            <dt class="col-sm-2 mb-3 text-muted">Deskripsi</dt>
                            <dd class="col-sm-4 mb-3">
                                <strong>{{ $grup->description }}</strong>
                            </dd>
                        </dl>
                    </div> <!-- .card-body -->
                </div> <!-- .card -->
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title">Diskusi Grup</strong>
                        {{-- Jumlah Diskusi --}}
                        {{-- <span class="float-right"><i class="fe fe-message-circle mr-2"></i>3</span> --}}
                    </div>
                    <div class="card-body">
                        <div id="scrollableDiv" class="height-custom length-group-chat">
                            @foreach ($messages as $message)
                                <div class="row align-items-center mb-4 mx-2">
                                    @if ($message->user_id == Auth::user()->id)
                                        <div class="col"></div>
                                        <div class="col-md-7 col-8 border rounded mx-2 p-2 bg-light">
                                            <strong
                                                class="bg-success text-white pr-3 pl-1 rounded">{{ $message->user->name }}
                                                (Me)
                                            </strong>
                                            <div class="mb-2 mt-1">{{ $message->message }}</div>
                                            <p class="text-muted" align="right">
                                                {{ \Carbon\Carbon::parse($message->created_at)->format('Y-m-d') }}</p>
                                        </div>
                                    @else
                                        <div class="col-md-7 col-8 border rounded mx-2 p-2">
                                            <strong
                                                class="bg-dark text-white pr-3 pl-1 rounded">{{ $message->user->name }}</strong>
                                            <div class="mb-2 mt-1">{{ $message->message }}</div>
                                            <p class="text-muted" align="right">
                                                {{ \Carbon\Carbon::parse($message->created_at)->format('Y-m-d') }}</p>
                                        </div>
                                    @endif
                                </div> <!-- .row-->
                            @endforeach
                            <div class="mb-4 mx-2">
                                <div id="messages"></div>
                            </div>
                        </div>
                        <script>
                            window.onload = function() {
                                var scrollableDiv = document.getElementById('scrollableDiv');
                                scrollableDiv.scrollTop = scrollableDiv.scrollHeight;
                            };
                        </script>
                        <hr class="my-4">
                        <h6 class="mb-3">Tanggapi</h6>
                        <input type="text" class="form-control bg-light" id="sender" value="{{ Auth::user()->name }}"
                            hidden>
                        <input type="text" class="form-control bg-light" id="dateTime"
                            value="{{ Auth::user()->created_at }}" hidden>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1" class="sr-only">Your Message</label>
                            <textarea class="form-control bg-light" id="messageInput" placeholder="Tulis tanggapan anda.." rows="4"></textarea>
                        </div>
                        <div class="d-flex justify-content-end align-items-center">
                            <button class="btn btn-primary"onclick="sendMessage()">Submit</button>
                        </div>
                    </div> <!-- .card-body -->
                </div> <!-- .card -->
            </div> <!-- .row -->
        </main>
    </div> <!-- .container-fluid -->
@endsection

@section('scripts')
    <script type="text/javascript">
        // Connect to Ably with your API key
        const realtime = new Ably.Realtime.Promise("trEo7g.-zYUQA:WIqSAWOjhrr9DVtl-c0ERm-5o2ZoalsQEAWajS291JU");
        const grup = "{{ $grup->id }}";
        // Create a channel called 'chat'
        const channel = realtime.channels.get("chat-" + grup);
        // Subscribe to messages on the 'chat' channel
        if (grup) {
            channel.subscribe("message", (message) => {
                displayMessage(message.data);
            });
        }

        // Function to display a message
        function displayMessage(message) {
            const messageParts = message.split(";");
            const messageContent = messageParts.length > 1 ? messageParts[1] : "";
            const sender = messageParts.length > 1 ? messageParts[0] : "";
            const dateTime = messageParts.length > 1 ? messageParts[2] : "";
            const messagesDiv = document.getElementById("messages");
            const idSender = "{{ Auth::user()->name }}";
            const messageElement = document.createElement("div");
            messageElement.classList.add("row", "align-items-center", "mb-4");
            if (sender === idSender) {
                messageElement.innerHTML = `
                <div class="col"></div>
                <div class="col-md-7 col-8 border rounded mx-2 p-2 bg-light">
                    <strong class="bg-success text-white pr-3 pl-1 rounded">${sender} (Me)</strong>
                    <div class="mb-2 mt-1">${messageContent}</div>
                    <p class="text-muted" align="right">${dateTime}</p>
                </div>
            `;
            } else {
                messageElement.innerHTML = `
                <div class="col-md-7 col-8 border rounded mx-2 p-2">
                    <strong class="bg-dark text-white pr-3 pl-1 rounded">${sender}</strong>
                    <div class="mb-2 mt-1">${messageContent}</div>
                    <p class="text-muted" align="right">${dateTime}</p>
                </div>
            `;
            }
            messagesDiv.appendChild(messageElement);
            messagesDiv.scrollTop = messagesDiv.scrollHeight; // Auto scroll to bottom
        }

        // Function to send a message
        function sendMessage() {
            const messageContent = document.getElementById('messageInput').value;
            const sender = "{{ Auth::user()->name }}";
            const idSender = "{{ Auth::user()->id }}";
            const grup = "{{ $grup->id }}";
            const dateTime = new Date().toISOString().split('T')[0];
            const message = `${sender};${messageContent};${dateTime};${grup}`;

            if (messageContent !== "") {
                // Publish the message to the 'chat' channel
                channel.publish("message", message);
                messageInput.value = "";
            }

            fetch('/grup/send-message', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        message: messageContent,
                        sender: idSender,
                        grup: grup
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.point) {
                        Notiflix.Notify.success("Chat Harian, anda berhasil mendapat {{ $chatPoint->point }} point!", {
                            timeout: 10000
                        });
                    }
                    document.getElementById('messageInput').value = '';
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    </script>

    <script>
        const leaveGrup = document.querySelectorAll('.grup-delete');

        leaveGrup.forEach(button => {
            button.addEventListener('click', function() {
                const cardId = button.dataset.cardId;

                Notiflix.Confirm.show('Konfirmasi', 'Apakah Anda yakin ingin keluar grup ini?', 'Ya',
                    'Batal',
                    function() {
                        fetch(`/grup/leave/${cardId}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                Notiflix.Notify.success("Anda berhasil keluar!", {
                                    timeout: 3000
                                });

                                window.location.href = '/grup'
                            })
                            .catch(error => {
                                Notiflix.Notify.failure('Error:', error);
                            });
                    });
            });
        });
    </script>
@endsection
