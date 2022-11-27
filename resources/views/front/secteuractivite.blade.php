
     <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explorer par secteur d'activité</h1>
            <div class="row g-4">
                @foreach($secteurActivites as $secteurActivite)
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="cat-item rounded p-4" href="">
                        <i class=" {{ $secteurActivite->class }} "></i>
                        <h6 class="mb-3"> {{ $secteurActivite->nom }} </h6>
                        <p class="mb-0">123 Vacances</p>
                    </a>
                </div>
                @endforeach
                {{-- <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <a class="cat-item rounded p-4" href="">
                        <i class="fa fa-3x fa-headset text-primary mb-4"></i>
                        <h6 class="mb-3">Service Client</h6>
                        <p class="mb-0">123 Vacances</p>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <a class="cat-item rounded p-4" href="">
                        <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                        <h6 class="mb-3">Ressources Humaines</h6>
                        <p class="mb-0">123 Vacances</p>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <a class="cat-item rounded p-4" href="">
                        <i class="fa fa-3x fa-tasks text-primary mb-4"></i>
                        <h6 class="mb-3">Gestion de Projet</h6>
                        <p class="mb-0">123 Vacances</p>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="cat-item rounded p-4" href="">
                        <i class="fa fa-3x fa-chart-line text-primary mb-4"></i>
                        <h6 class="mb-3">Développement des Affaires</h6>
                        <p class="mb-0">123 Vacances</p>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <a class="cat-item rounded p-4" href="">
                        <i class="fa fa-3x fa-hands-helping text-primary mb-4"></i>
                        <h6 class="mb-3">Ventes & Communication</h6>
                        <p class="mb-0">123 Vacances</p>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <a class="cat-item rounded p-4" href="">
                        <i class="fa fa-3x fa-book-reader text-primary mb-4"></i>
                        <h6 class="mb-3">Enseignement et éducation</h6>
                        <p class="mb-0">123 Vacances</p>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <a class="cat-item rounded p-4" href="">
                        <i class="fa fa-3x fa-drafting-compass text-primary mb-4"></i>
                        <h6 class="mb-3">Design & Création</h6>
                        <p class="mb-0">123 Vacances</p>
                    </a>
                </div> --}}
            </div>
        </div>
    </div>
