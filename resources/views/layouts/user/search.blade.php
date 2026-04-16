<section class="py-5 how_works search-hero">
    <div class="container">
        <div class="search-hero-top">
            <span class="search-badge">Trusted Matrimonial Platform</span>
            <h3 class="search-hero-title">Find Your Perfect Match</h3>
            <p class="search-hero-subtitle">Search by age, location and marital status to quickly discover compatible profiles.</p>
        </div>

        <div class="search-card">
            <form id="searchForm" action="{{ route('user.profiles') }}" method="GET">
                <div class="row g-3 align-items-end">
                    <!-- Looking For -->
                    <div class="col-12 col-sm-6 col-lg-2 search-field-col">
                        <label class="search-field-label">Looking For</label>
                        <div class="search-input-wrap">
                            <select name="gender" class="form-select">
                                <option value="">I'm looking</option>
                                <option value="Male" {{ request('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ request('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="min_age" id="min_age">
                    <input type="hidden" name="max_age" id="max_age">

                    <!-- Age -->
                    <div class="col-12 col-sm-6 col-lg-2 search-field-col">
                        <label class="search-field-label">Age Range</label>
                        <div class="search-input-wrap">
                            <select name="age" id="age_range" class="form-select">
                                <option value="">Age</option>
                                <option value="18-25">18 - 25</option>
                                <option value="26-30">26 - 30</option>
                                <option value="31-35">30 - 35</option>
                                <option value="36-40">36 - 40</option>
                                <option value="41-45">41 - 45</option>
                                <option value="46-50">46 - 50</option>
                                <option value="51-60">51 - 60</option>
                                <option value="61-70">61 - 70</option>
                            </select>
                        </div>
                    </div>

                    <!-- Marital Status -->
                    <div class="col-12 col-sm-6 col-lg-3 search-field-col">
                        <label class="search-field-label">Marital Status</label>
                        <div class="search-input-wrap">
                            <select class="form-select search-select2" id="marital_status" name="marital_status[]" multiple="multiple" data-placeholder="Select marital status">
                                <option value="Never_Married" {{ in_array('Never_Married', (array) request('marital_status', [])) ? 'selected' : '' }}>Never Married</option>
                                <option value="Divorced" {{ in_array('Divorced', (array) request('marital_status', [])) ? 'selected' : '' }}>Divorced</option>
                                <option value="Widowed" {{ in_array('Widowed', (array) request('marital_status', [])) ? 'selected' : '' }}>Widowed</option>
                                <option value="Mithi_Jibh_Cancel" {{ in_array('Mithi_Jibh_Cancel', (array) request('marital_status', [])) ? 'selected' : '' }}>Mithi Jibh Cancel</option>
                                <option value="Broken_Engagement" {{ in_array('Broken_Engagement', (array) request('marital_status', [])) ? 'selected' : '' }}>Broken Engagement</option>
                            </select>
                        </div>
                    </div>

                    <!-- City -->
                    <div class="col-12 col-sm-6 col-lg-3 search-field-col">
                        <label class="search-field-label">Location</label>
                        <div class="search-input-wrap">
                            <select class="form-select search-select2" id="city" name="city[]" multiple="multiple" data-placeholder="Select city">
                                @foreach($cityList as $city)
                                    <option value="{{ $city->id }}" {{ in_array((string) $city->id, array_map('strval', (array) request('city', []))) ? 'selected' : '' }}>{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="col-12 col-lg-2 search-field-col search-action-col">
                        <button type="submit" class="btn w-100 btn-theme search-submit-btn">
                            <i class="bi bi-search"></i> Search
                        </button>
                    </div>
                </div>

                <div class="search-highlights">
                    <span class="search-chip">Verified Profiles</span>
                    <span class="search-chip">Privacy First</span>
                    <span class="search-chip">Smart Matching</span>
                </div>
            </form>
        </div>
    </div>
</section>
