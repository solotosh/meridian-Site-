@extends('frontend.master_dashboard')

@section('main')

<!-- Page Title -->
 <!--Page Title-->
 <section class="page-title-two bg-color-1 centred">
    <div class="pattern-layer">
        <div class="pattern-1" style="background-image: url('{{ asset('assets/images/shape/shape-9.png') }}');"></div>
        <div class="pattern-2" style="background-image: url('{{ asset('assets/images/shape/shape-10.png') }}');"></div>
    </div>
    <div class="auto-container">
        <div class="content-box clearfix">
            <h6>Technology List</h6>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>More Blog</li>
            </ul>
        </div>
    </div>
</section>
<!-- End Page Title -->

<!-- Technology Listing Section -->
<section class="agents-page-section agents-list">
    <div class="auto-container">
        <div class="row clearfix">

            <!-- Sidebar Technology List -->
            <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">

                <!-- Mobile Toggle Button -->
                <div class="d-block d-lg-none mb-3 text-end">
                    <button class="btn btn-outline-success" type="button" data-bs-toggle="collapse" data-bs-target="#techListCollapse">
                        <i class="fas fa-list"></i> Technology List
                    </button>
                </div>

                <!-- Collapsible Sidebar with Green Theme -->
                <div id="techListCollapse" class="collapse d-lg-block">
                    <div class="default-sidebar agent-sidebar bg-success bg-opacity-10 border rounded p-3">
                        <div class="agents-search sidebar-widget">
                            <div class="widget-title mb-3">
                                <h5 class="text-success">Technologies</h5>
                            </div>

                            <!-- Technology Name List -->
                            <ul class="list-group list-group-flush">
                                @foreach($technologies as $techItem)
                                    <li class="list-group-item px-0 border-0">
                                        <a href="{{ route('technology.show', $techItem->id) }}"
                                           class="text-decoration-none d-block text-dark fw-medium">
                                            {{ $techItem->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Main Content -->
            <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                <div class="agency-content-side">
                    <div class="item-shorting clearfix mb-4">
                        <div class="left-column pull-left">
                            <h5>Technologies Available</h5>
                        </div>
                    </div>

                    <div class="wrapper list">
                        <div class="agents-list-content list-item">
                            @forelse ($technologies as $tech)
                                <div class="agents-block-one mb-4">
                                    <div class="inner-box d-flex flex-column flex-md-row align-items-center">
                                        <!-- Clickable Image -->
                                        <a href="{{ route('technology.show', $tech->id) }}">
                                            <figure class="image-box me-md-4 mb-3 mb-md-0">
                                                <img src="{{ asset($tech->image) }}" alt="{{ $tech->name }}"
                                                     class="img-fluid"
                                                     style="width: 270px; height: 330px; object-fit: cover; border-radius: 6px;">
                                            </figure>
                                        </a>

                                        <!-- Content -->
                                        <div class="content-box text-center text-md-start">
                                            <div class="title-inner">
                                                <h4>
                                                    <a href="{{ route('technology.show', $tech->id) }}" class="text-decoration-none text-dark">
                                                        {{ $tech->name }}
                                                    </a>
                                                </h4>
                                                <span class="designation">Technology Tool</span>
                                            </div>
                                            <div class="text mt-2">
                                                <p>{{ \Illuminate\Support\Str::limit($tech->short_description, 120) }}</p>
                                            </div>
                                            <div class="btn-box mt-3">
                                                <a href="{{ route('technology.show', $tech->id) }}" class="theme-btn btn-two">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-danger">No technologies available at the moment.</p>
                            @endforelse
                        </div>

                        <!-- Pagination -->
                        <div class="pagination-wrapper mt-4 d-flex justify-content-center">
                            <nav>
                                {{ $technologies->links('vendor.pagination.custom') }}
                            </nav>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

@endsection
