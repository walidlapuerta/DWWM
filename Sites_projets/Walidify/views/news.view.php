<?php ob_start() ?>

<div class="row">
            <div class="col-12 m-auto">
                <div class="owl-carousel owl-theme">
                    <div class="item mb-4">
                        <div class="card border-0 shadow">
                            <img src="public/images/kanye.png" alt="" class="card-img-top">
                            <div class="card-body">
                                <div class="card-title text-center">
                                    <h4>Owl Carousel</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="card border-0 shadow">
                            <img src="public/images/kanye.png" alt="" class="card-img-top">
                            <div class="card-body">
                                <div class="card-title text-center">
                                    <h4>Owl Carousel</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card border-0 shadow">
                            <img src="public/images/kanye.png" alt="" class="card-img-top">
                            <div class="card-body">
                                <div class="card-title text-center">
                                    <h4>Owl Carousel</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card border-0 shadow">
                            <img src="public/images/kanye.png" alt="" class="card-img-top">
                            <div class="card-body">
                                <div class="card-title text-center">
                                    <h4>Owl Carousel</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card border-0 shadow">
                            <img src="public/images/kanye.png" alt="" class="card-img-top">
                            <div class="card-body">
                                <div class="card-title text-center">
                                    <h4>Owl Carousel</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card border-0 shadow">
                            <img src="public/images/kanye.png" alt="" class="card-img-top">
                            <div class="card-body">
                                <div class="card-title text-center">
                                    <h4>Owl Carousel</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 15,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        })
    </script>


<?php

$content = ob_get_clean();
$titre = "Page des news";

require "template.php";

?>