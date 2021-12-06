@extends('layouts.user')

@section('title', __('QMS'))

@section('content')
    <div class="row">
        <div class="col-md-8">
            <iframe width="100%" height="400" src="https://www.youtube.com/embed/tgbNymZ7vqY">
            </iframe>
        </div>
        <div class="col-md-4">
            <div class="box bg-info">
                <div class="box-body">
                    <div class="p-15 text-center">
                        <div class="vertical-align-middle">
                            <div class="fs-40" id="clock"></div>
                            <div class="fs-20">City, Country</div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <div class="box box-inverse bg-img" style="background-image: url({{ asset('asset/images/gallery/thumb/9.jpg') }});" data-overlay="5">
                <div class="box-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="text-center p-45">
                                <div class="vertical-align-middle">
                                    <div class="fs-40">
                                        27°
                                        <span class="fs-24">C</span>
                                    </div>
                                    <div class="mt-3">City, Country</div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-6">
                            <div class="text-center p-45 bs-1">
                                <div class="vertical-align-middle">
                                    <div class="fs-40">
                                        <i class="wi-cloudy"></i>
                                    </div>
                                    <div class="mt-3">20.5.2017</div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
    <div class="row mt-5">
        @foreach($appointments as $appointment)
            <div class="col-md-3">
                <div class="box bg-primary-light text-center">
                    <div class="box-body">
                        <h1 class="box-title fw-600 fs-28">{{ $appointment->qms_format }}</h1>
                        <div class="fw-bold text-success mt-5 mb-10">{{ __('Room :room', ['room' => 2]) }}</div>
                    </div>
                </div>
            </div>
        @endforeach

        <button id="speak" class="btn btn-info">Speak</button>
    </div>
@endsection
@push('after-scripts')
    <script>

        $(function(){
            if ('speechSynthesis' in window)  // To check speech sysntesis is supported in browser or not
            {

                // To get supported voice list in browser & append to select list

                // On speak button click below function is calling
                $('#speak').click(function(){
                });

            } else {
                alert("Your Browser does not support speech synthesis");
            }
        });

        var intervalId = window.setInterval(function(){

            textSpeech("0 0 0 1 <break=300> Bilik<break=100> 1")

        }, 5000);

        function textSpeech(message){

            const messageParts = message.split(/<break[=0-9]*>/g);
            var timeDelay = "";
            if(messageParts.length>1)  // to check delay is added or not
            {
                timeDelay = message.match(/break[=0-9]*/g).toString().replace(/break=/g, "").split(",");  // To get time delay added in break
            }
            let currentIndex = 0;

            // TTS function which is called for each part of text
            const speak = (textToSpeak, timeToDelay) => {
                const msg = new SpeechSynthesisUtterance();
                const voices = window.speechSynthesis.getVoices();
                msg.voice = voices[11];
                msg.rate =  1;
                msg.pitch = 1;
                msg.volume = 1; // 0 to 1
                msg.text = textToSpeak;
                msg.onend = function() {
                    currentIndex++;
                    if (currentIndex < messageParts.length) {
                        setTimeout(() => {
                            speak(messageParts[currentIndex],timeDelay[currentIndex])
                        }, timeToDelay)
                    }
                };
                speechSynthesis.speak(msg);
            }

            speak(messageParts[0], timeDelay[0]);
        }
        startTime();

        function startTime() {
            const today = new Date();
            let h = today.getHours();
            let m = today.getMinutes();
            let s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            $("#clock").text(h + ":" + m + ":" + s)
            setTimeout(startTime, 1000);
        }

        function checkTime(i) {
            if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
            return i;
        }
    </script>
@endpush
