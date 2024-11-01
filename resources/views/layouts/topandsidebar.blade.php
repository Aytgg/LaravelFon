<!-- Sidebar -->

<div class="dock">
    <div class="dock-container">
        <li class="li-1">
            <div class="name">Finder</div>
            <a href="/tr">
                <img class="ico"
                    src="https://uploads-ssl.webflow.com/5f7081c044fb7b3321ac260e/5f70853981255cc36b3a37af_finder.png"
                    alt="">
            </a>
        </li>
        <li class="li-2">
            <div class="name">Reminders</div>
            <a href="/us">
                <img class="ico"
                    src="https://uploads-ssl.webflow.com/5f7081c044fb7b3321ac260e/5f70853d44d99641ce69afeb_reminders.png"
                    alt="">
            </a>
        </li>
        <li class="li-3">
            <a href="/fr">
                <div class="name">Photos</div>
                <img class="ico"
                    src="https://uploads-ssl.webflow.com/5f7081c044fb7b3321ac260e/5f70853c55558a2e1192ee09_photos.png"
                    alt="">
            </a>
        </li>
        <li class="li-8">
            <div class="name">Messages</div>
            <img class="ico"
                src="https://uploads-ssl.webflow.com/5f7081c044fb7b3321ac260e/5f70853a55558a68e192ee08_messages.png"
                alt="">
        </li>
        <li class="li-4">
            <div class="name">FaceTime</div>
            <img class="ico"
                src="https://uploads-ssl.webflow.com/5f7081c044fb7b3321ac260e/5f708537f18e2cb27247c904_facetime.png"
                alt="">
        </li>
        <li class="li-5">
            <div class="name">Music</div>
            <img class="ico"
                src="https://uploads-ssl.webflow.com/5f7081c044fb7b3321ac260e/5f70853ba0782d6ff2aca6b3_music.png"
                alt="">
        </li>
        <li class="li-6">
            <div class="name">Podcasts</div>
            <img class="ico"
                src="https://uploads-ssl.webflow.com/5f7081c044fb7b3321ac260e/5f70853cc718ba9ede6888f9_podcasts.png"
                alt="">
        </li>
        <!--
                        <li class="li-bin li-15">
                        <div class="name">Bin</div>
                        <img class="ico ico-bin" src="https://findicons.com/files/icons/569/longhorn_objects/128/trash.png" alt="">
                        </li>
                        -->
    </div>
</div>

<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->

        <style>
            .breadcrumb-item-white {
                color: white !important;
            }
        </style>

        <!-- Topbar Breadcrumb -->
        @include('widgets.breadcrumb')

        {{--
    @include('widgets.idk')
    --}}
        <!-- End of Topbar -->
