<x-front-layout>

       <!-- Header End -->
       <div class="container-xxl py-5 bg-dark page-header mb-5">
        <div class="container my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Mes candidatures</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="/">Accueil</a></li>
                    <li class="breadcrumb-item"><a href="#">Offres</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Mes candidatures</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Header End -->


    <!-- Job Detail Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Liste des Candidatures</h1>
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">

                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">

                                        <table class="table table-bordered">
                                          <thead>
                                            <tr>
                                              <th style="width: 100%">Titre</th>
                                              <th>Statut de la candidature</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            @foreach($candidatures as $candidature)
                                            <tr>
                                              <td style="width: 100%">
                                                {{ $candidature->offre->titre }}
                                              </td>
                                              <td>Envoyée le {{ $candidature->created_at->format('d-m-Y') }} </td>
                                            </tr>
                                            @endforeach
                                          </tbody>
                                        </table>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Job Detail End -->




</x-front-layout>
