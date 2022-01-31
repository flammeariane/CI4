<style>
    .carousel-item {
        height: 100vh;
        min-height: 350px;
        background: no-repeat center center scroll;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    .carousel-inner {
        width: 100% !important;
        max-height: 250px !important;
        position: relative;
        overflow: hidden;
    }

    .crop-top {
        margin: -20% auto 0;
    }
</style>



<header>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active crop-top" style="background-image: url('https://source.unsplash.com/k2Kcwkandwg')">
                <div class="carousel-caption">
                    <h5>Share my book</h5>
                    <p>La plateforme collaborative d'échange de livre proche de chez vous</p>
                </div>
            </div>
            <div class="carousel-item crop-top" style="background-image: url('https://source.unsplash.com/o0Qqw21-0NI')">
                <div class="carousel-caption">
                    <h5>Share my book</h5>
                    <p>La plateforme collaborative d'échange de livre proche de chez vous</p>
                </div>
            </div>
            <div class="carousel-item crop-top" style="background-image: url('https://source.unsplash.com/GVhAezjtX-4')">
                <div class="carousel-caption">
                    <h5>Share my book</h5>
                    <p>La plateforme collaborative d'échange de livre proche de chez vous</p>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
</header>