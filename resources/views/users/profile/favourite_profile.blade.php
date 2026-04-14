@extends('layouts.user.app')

@section('title') Favourite Profile @endsection

@section('style')
<link rel="stylesheet" href="{{ asset('css/fav_profile.css') }}" />
@endsection

@section('content')
<div class="container mt-4 mb-4">
    <div class="favourite-page">
    <div class="row g-4">
        <!-- LEFT: FILTERS -->
        <div class="col-12 col-lg-3">
          <div class="card filters-card filters-sticky">
            <div class="card-body">
              <div class="mb-3">
                <h5 class="filters-title mb-1">Filters</h5>
                <p class="filters-subtitle mb-0">Refine your favourite profiles quickly.</p>
              </div>
              <button class="btn filter-toggle-btn d-block d-md-none mb-3" type="button" id="filterToggleBtn">
                <i class="bi bi-chevron-compact-up"></i>
              </button>
              <div class="accordion collapse d-md-block show" id="filterAccordion_full">
                <form method="get" name="filter_form" id="filter_form" action="{{ route('user.favourite_profile') }}">
                  <div class="accordion filter-accordion" id="filterAccordion">
                    <!-- Gender -->
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#genderCollapse">
                          Gender
                        </button>
                      </h2>
                      <div id="genderCollapse" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                          <select class="form-select" name="gender">
                            <option value="">All</option>
                            <option value="Male" {{ request('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ request('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <!-- Marital Status -->
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#maritalCollapse">
                          Marital Status
                        </button>
                      </h2>
                      <div id="maritalCollapse" class="accordion-collapse collapse">
                        <div class="accordion-body">
                          <select class="form-select" name="marital_status">
                            <option value="">All</option>
                            <option value="Never_Married" <?php if(isset($_GET['marital_status']) && $_GET['marital_status'] == 'Never_Married') echo 'selected'; ?>>Never Married</option>
                            <option value="Divorced" <?php if(isset($_GET['marital_status']) && $_GET['marital_status'] == 'Divorced') echo 'selected'; ?>>Divorced</option>
                            <option value="Widowed" <?php if(isset($_GET['marital_status']) && $_GET['marital_status'] == 'Widowed') echo 'selected'; ?>>Widowed</option>
                            <option value="Mithi_Jibh_Cancel" <?php if(isset($_GET['marital_status']) && $_GET['marital_status'] == 'Mithi_Jibh_Cancel') echo 'selected'; ?>>Mithi Jibh Cancel</option>
                            <option value="Broken_Engagement" <?php if(isset($_GET['marital_status']) && $_GET['marital_status'] == 'Broken_Engagement') echo 'selected'; ?>>Broken Engagement</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <!-- City -->
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cityCollapse">
                          City
                        </button>
                      </h2>
                      <div id="cityCollapse" class="accordion-collapse collapse">
                        <div class="accordion-body">
                          <select class="form-select" name="city">
                            <option value="">All</option>
                            @foreach($cityList as $city)
                              <option value="{{ $city->id }}" {{ request('city') == $city->id ? 'selected' : '' }}>
                                {{ $city->name }}
                              </option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>

                    <!-- Age -->
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ageCollapse">
                          Age Range
                        </button>
                      </h2>
                      <div id="ageCollapse" class="accordion-collapse collapse">
                        <div class="accordion-body">
                          <input type="number" name="min_age" id="min_age" class="form-control mb-2" placeholder="Min Age" value="{{ request('min_age') }}">
                          <input type="number" name="max_age" id="max_age" class="form-control" placeholder="Max Age" value="{{ request('max_age') }}">
                        </div>
                      </div>
                    </div>

                    <!-- Name/ Religion -->
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#searchCollapse">
                          Name / Religion
                        </button>
                      </h2>
                      <div id="searchCollapse" class="accordion-collapse collapse">
                        <div class="accordion-body">
                          <input type="text" name="name" class="form-control" placeholder="Enter name or religion" value="{{ request('name') }}">
                        </div>
                      </div>
                    </div>

                    <!-- Education -->
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#educationCollapse">
                          Education
                        </button>
                      </h2>
                      <div id="educationCollapse" class="accordion-collapse collapse">
                        <div class="accordion-body">
                         <input type="text" id="education" name="education" class="form-control" placeholder="Education" value="<?php if (isset($_GET['education']) && $_GET['education'])  echo $_GET['education'] ?>" />
                        </div>
                      </div>
                    </div>

                    <!-- Profession -->
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#professionCollapse">
                          Profession
                        </button>
                      </h2>
                      <div id="professionCollapse" class="accordion-collapse collapse">
                        <div class="accordion-body">
                         <input type="text" id="profession" name="profession" class="form-control" placeholder="profession" value="<?php if (isset($_GET['profession']) && $_GET['profession'])  echo $_GET['profession'] ?>" />
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Buttons -->
                  <div class="d-grid gap-2 mt-3">
                    <button class="btn btn-theme">Apply Filters</button>
                    <a href="{{ url()->current() }}" class="btn btn-theme-outline">Reset Filters</a>
                  </div>
                  <input type="hidden" name="sort_by" id="sort_by" value="" />
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- RIGHT: FILTERS -->
        <div class="col-12 col-lg-9">
            <section>
                <div class="row g-4" id="favourite_profile_list">
                        @if(count($profilelist) > 0)
                        <div class="card listing-card mb-2">
                          <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-0">
                            <div>
                              <h5 class="listing-title mb-1">Favourite Profiles ({{ $favouriteProfilesCount ?? ''}})</h5>
                              <p class="listing-subtitle mb-0">All your saved profiles in one responsive view.</p>
                            </div>

                            <form method="get" name="search_profile" action="{{ route('user.favourite_profile') }}">
                              <input type="hidden" name="sort_by" id="" value="" />
                                <select class="form-select profiles-sort-select w-auto" name="sorting" id="sorting">
                                  <option value="latest" {{ request('sort_by') == 'latest' ? 'selected' : '' }}>Latest</option>
                                  <option value="age" {{ request('sort_by') == 'age' ? 'selected' : '' }}>Age</option>
                                  <option value="location" {{ request('sort_by') == 'location' ? 'selected' : '' }}>Location</option>
                                </select>
                            </form>
                          </div>
                          </div>
                        </div>
                            @foreach($profilelist as $fav)
                                @php 
                                  $profile = $fav->profile; 
                                  $fullAddress = $profile->current_address . ', ' . $profile->city->name . ', ' . $profile->state->name;
                                  $shortAddress = \Illuminate\Support\Str::limit($fullAddress, 100);
                                @endphp

                                <div class="col-12 col-md-6 col-xl-6 mb-3">
                                    <div class="card profile-card h-100">
                                        <div class="row g-0 align-items-center">

                                            <!-- Image -->
                                            <div class="col-12 col-sm-4 text-center">
                                                <div class="profile-media">
                                                @if($profile?->profile_photo?->image)
                                                    <img src="{{ asset('/profile_photos/'.$profile->profile_photo->image) }}"
                                                         class="img-fluid profile-img">
                                                @else
                                                    @if($profile->gender == "Male")
                                                      <img src="{{ asset('/assets/img/man.png') }}" alt="user-avatar" class="img-fluid profile-img">
                                                    @else
                                                      <img src="{{ asset('/assets/img/women.png') }}" alt="user-avatar" class="img-fluid profile-img">
                                                    @endif
                                                @endif
                                                </div>
                                            </div>

                                            <!-- Content -->
                                            <div class="col-12 col-sm-8">
                                                <div class="card-body profile-card-body">
                                                    <h6 class="profile-name mb-2">
                                                        {{ $profile->first_name }} {{ $profile->last_name }}
                                                    </h6>

                                                    <small class="profile-summary d-block">
                                                        <strong>Occupation:</strong> {{ $profile->occupation ?? 'N/A' }}<br/>
                                                        <strong>Age:</strong> {{ $profile->age ?? 'N/A' }} Years<br/>
                                                        <strong>Address:</strong> {{ $shortAddress }}
                                                        <span class="full-text d-none">{{ $fullAddress }}</span>
                                                    </small>

                                                   
                                                    <!-- Buttons -->
                                                    <div class="mt-2 d-flex gap-2 flex-wrap">
                                                        <a href="{{ route('user.getprofile',$profile->id) }}"
                                                           class="btn btn-theme btn-sm flex-fill">
                                                            View Profile
                                                        </a>
                                                        @if(Auth::user()?->role == "User")
                                                          <button
                                                            class="favourite-heart-btn"
                                                            onclick="BookmarkFunction({{ $profile->id }},this)"
                                                            aria-label="Remove from favourites"
                                                            title="Remove from favourites">
                                                                <i class="bi bi-heart-fill"></i>
                                                          </button>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{-- <nav class="mt-3">
                            <ul class="pagination justify-content-center">
                              {{ $profilelist->links() }}
                            </ul>
                        </nav> --}}
                      @else
                        <div class="empty-state text-center">
                          <h5 class="mb-1">No Record Found</h5>
                          <p class="mb-0">Try adjusting filters to see favourite profiles.</p>
                        </div>
                      @endif
                    </div>
            </section>
        </div>
    </div>
    </div>
</div>

@endsection


@section('js')
  <script type="text/javascript" src="{{ asset('js/profile/favourite_profile.js') }}"></script>
@endsection