<x-front-layout>

       <!-- Header End -->
       <div class="container-xxl py-5 bg-dark page-header mb-5">
        <div class="container my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Detail de l'offre</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="/">Accueil</a></li>
                    <li class="breadcrumb-item"><a href="#">Offres</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Detail de l'offre</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Header End -->


    <!-- Job Detail Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gy-5 gx-4">
                <div class="col-lg-8">
                    <div class="d-flex align-items-center mb-5">
                        <img class="flex-shrink-0 img-fluid border rounded" src="{{asset('jobentry/img/com-logo-2.jpg')}}" alt="" style="width: 80px; height: 80px;">
                        <div class="text-start ps-4">
                            <h3 class="mb-3"> {{$offre->titre}} </h3>
                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i> {{$offre->lieu}} </span>
                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i> {{$offre->temps}} </span>
                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i> {{$offre->salaire}} </span>
                        </div>
                    </div>

                    <div class="mb-5">
                        {!! html_entity_decode($offre->description) !!}

                    </div>

                    <div class="">
                        @if( $can_postule )
                        <h4 class="mb-4">Postuler Pour Cette Offre</h4>
                        {{-- <form method="POST" action="{{ route('candidature.store', $offre->id) }}"> --}}
                        <form method="POST" action="{{ route('candidature.store') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="offre_id" value="{{ $offre->id }}" >
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <label for="cv">Joindre un CV
                                    </label>
                                    <input type="file" required data-text="Joindre un CV" class="form-control bg-white" id="cvCandidat" name="cv" value="{{ old('cv') }}">
                                </div>
                                <div class="col-12">
                                    <textarea required class="form-control" rows="5" placeholder="Message" id="messageCandidat" name="message" value="{{ old('message') }}"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">Je Postule</button>
                                </div>
                            </div>
                        </form>
                        @else
                        <ul>
                            <li>Candidature déjà envoyée </li>
                            <li>
                                <a class="btn btn-primary" href="{{ route('user.candidatures', Auth::user()?->id) }}" >Voir les candidatures envoyées.</a>
                            </li>
                          </ul>

                        @endif
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                        <h4 class="mb-4">Resumé de l'offre </h4>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Publiée le: {{ $offre->created_at->format('d-m-Y') }}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Vacance: 123 Position</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Nature: Full Time</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Salaire: $123 - $456</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Location: New York, USA</p>
                        <p class="m-0"><i class="fa fa-angle-right text-primary me-2"></i>Date Limit: {{ $offre->created_at->format('d-m-Y') }}</p>
                    </div>
                    <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                        <h4 class="mb-4">Detail de l'entreprise</h4>
                        <p class="m-0">Ipsum dolor ipsum accusam stet et et diam dolores, sed rebum sadipscing elitr vero dolores. Lorem dolore elitr justo et no gubergren sadipscing, ipsum et takimata aliquyam et rebum est ipsum lorem diam. Et lorem magna eirmod est et et sanctus et, kasd clita labore.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Job Detail End -->




</x-front-layout>
