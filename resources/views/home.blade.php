@extends('layouts.base')
@section('content')
    <div class="content-body">
        <!-- Hover Effects -->
        <section id="hover-effects" class="card">
            <div class="card-header">
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content">
                <div class="card-body my-gallery">
                    <div class="grid-hover d-flex justify-content-center align-items-center">
                        <div class="">
                            <figure class="effect-lily">
                                <img src="{{ asset('assets/images/gallery/12.jpg') }}" alt="img12" />
                                <figcaption>
                                    <div>
                                        <h2>Nice <span>Lily</span></h2>
                                        <p>Tagline</p>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="">
                            <figure class="effect-lily">
                                <img src="{{ asset('assets/images/gallery/1.jpg') }}" alt="img1" />
                                <figcaption>
                                    <div>
                                        <h2>Nice <span>Lily</span></h2>
                                        <p>Tagline</p>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <div class="card-text text-center">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quibusdam commodi deserunt sit inventore cumque doloribus! Aspernatur inventore amet itaque deleniti officiis nesciunt autem, earum soluta rerum temporibus mollitia ipsam vel adipisci dicta nisi sunt ex ratione! Molestiae libero architecto temporibus quisquam minus debitis. Esse nemo quo provident cum laborum distinctio consectetur vitae facilis nostrum. Laudantium ipsa aspernatur voluptate reprehenderit dolores natus laboriosam aliquid aliquam? Nesciunt, dolor. Aliquam nam molestiae eum voluptatum recusandae quo rem voluptas temporibus blanditiis similique vitae quos aperiam saepe mollitia, eius repellendus officia ex incidunt repudiandae corrupti accusamus necessitatibus illo eligendi? Doloremque dolores laborum maxime. Et, adipisci!</p>
                    </div>
                </div>
            </div>
            
            <!--/ Image grid -->
        </section>
        <!--/ Hover Effects -->

    </div>
@endsection
