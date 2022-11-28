
        <!-- Jobs Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Liste des Offres</h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-1">
                                <h6 class="mt-n1 mb-0">Vedettes</h6>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">
                                <h6 class="mt-n1 mb-0">Temps plein</h6>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3">
                                <h6 class="mt-n1 mb-0">Temps partiel</h6>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">

                        <div id="tab-1" class="tab-pane fade show p-0 active">
                             @foreach($offres as $offre)
                                <div class="job-item p-4 mb-4">
                                    <div class="row g-4">
                                        <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                            <img class="flex-shrink-0 img-fluid border rounded" src="jobentry/img/com-logo-1.jpg" alt="" style="width: 80px; height: 80px;">
                                            <div class="text-start ps-4">
                                                <h5 class="mb-3">{{ $offre->titre }}</h5>
                                                <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $offre->lieu }}</span>
                                                <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{ $offre->temps }}</span>
                                                <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{ $offre->salaire }}</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                            <div class="d-flex mb-3">
                                                <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-primary"></i></a>
                                                <a href="{{route('candidature.show', $offre)}}" class="btn btn-primary">
                                                    {{ __('Postulez maintenant') }}
                                                </a>
                                            </div>
                                            <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date : {{ $offre->created_at->format('j M Y, g:i A') }}</small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                                {{ $offres->appends(request()->query())->links('pagination::simple-bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
        <!-- Jobs End -->
