

<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('asset/css/vendors_css.css') }}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/skin_color.css') }}">

</head>

</html>

@extends('layouts.qms')

@section('title', __('QMS'))

@section('content')
    <div class="row">
        <div class="col-md-8">
{{--            <iframe width="100%" height="400" src="https://www.youtube.com/embed/tgbNymZ7vqY">--}}
{{--            </iframe>--}}
            <iframe width="100%" height="400" src="https://www.youtube.com/embed/Ji0TR6Q-V-U" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="col-md-4">
            <div class="box bg-info">
                <div class="box-body">
                    <div class="p-15 text-center">
                        <div class="vertical-align-middle">
                            <div class="fs-40" id="clock"></div>
                            <div class="fs-20">Limbang, Sarawak</div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <div class="box box-inverse bg-img" data-overlay="5">
                <div class="box-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="text-center p-45">
                                <div class="vertical-align-middle">
                                    <div class="fs-40">
                                        27°
                                        <span class="fs-24">C</span>
                                    </div>
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
                                    <div class="mt-3">{{ \Carbon\Carbon::today()->format('d M Y') }}</div>
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
                <div class="box bg-primary text-center">
                    <div class="box-body">
                        <h1 class="box-title fw-600 fs-28">{{ $appointment->qms_format }}</h1>
                        <div class="fw-bold text-success mt-5 mb-10">{{ __('Room :room', ['room' => 2]) }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@push('after-scripts')
    <script>

        $(function(){
            if ('speechSynthesis' in window) {
                $('#speak').click(function(){});
            } else {
                alert("Your Browser does not support speech synthesis");
            }
        });

        // textSpeech("0 0 0 1 <break=300> Bilik<break=100> 1")


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
