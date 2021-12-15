<div class="specialist-slider segments">
    <div class="container">
        <div class="section-title">
            <h3>Shortcuts
                <a href="search-doctor.html" class="see-all-link">View All</a>
            </h3>
        </div>
        <div class="swiper-container swiper-container-initialized swiper-container-horizontal">
            <div class="swiper-wrapper" style="transform: translate3d(-313px, 0px, 0px); transition-duration: 0ms;">
                <a href="{{ route('appointment.create') }}" class="swiper-slide m-4">
                    <div class="content">
                        <img src="assets/images/brain.svg" alt="">
                        <div class="text">
                            <span>New Appointment</span>
                        </div>
                    </div>
                </a>

                <a href="{{ route('patient.create') }}" class="swiper-slide m-4" style="margin-right: 15px;">
                    <div class="content">
                        <img src="assets/images/brain.svg" alt="">
                        <div class="text">
                            <span>Patient Registration</span>
                        </div>
                    </div>
                </a>

                <a href="{{ route('patient.index') }}" class="swiper-slide m-4" style="margin-right: 15px;">
                    <div class="content">
                        <img src="assets/images/brain.svg" alt="">
                        <div class="text">
                            <span>Patient Directory</span>
                        </div>
                    </div>
                </a>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
        </div>
    </div>
</div>
