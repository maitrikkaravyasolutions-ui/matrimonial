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
                    <div class="col-12 col-sm-6 col-lg-2">
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
                    <div class="col-12 col-sm-6 col-lg-2">
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
                    <div class="col-12 col-sm-6 col-lg-3">
                        <label class="search-field-label">Marital Status</label>
                        <div class="search-input-wrap">
                            <select class="form-select" id="marital_status" name="marital_status">
                                <option selected value="">Marital Status</option>
                                <option value="Never_Married" <?php if(isset($_GET['marital_status']) && $_GET['marital_status'] == 'Never_Married') echo 'selected'; ?>>Never Married</option>
                                <option value="Divorced" <?php if(isset($_GET['marital_status']) && $_GET['marital_status'] == 'Divorced') echo 'selected'; ?>>Divorced</option>
                                <option value="Widowed" <?php if(isset($_GET['marital_status']) && $_GET['marital_status'] == 'Widowed') echo 'selected'; ?>>Widowed</option>
                                <option value="Mithi_Jibh_Cancel" <?php if(isset($_GET['marital_status']) && $_GET['marital_status'] == 'Mithi_Jibh_Cancel') echo 'selected'; ?>>Mithi Jibh Cancel</option>
                                <option value="Broken_Engagement" <?php if(isset($_GET['marital_status']) && $_GET['marital_status'] == 'Broken_Engagement') echo 'selected'; ?>>Broken Engagement</option>
                            </select>
                        </div>
                    </div>

                    <!-- City -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <label class="search-field-label">Location</label>
                        <div class="search-input-wrap">
                            <select class="form-select" id="city" name="city">
                                <option selected value="">City</option>
                                @foreach($cityList as $city)
                                    <option value="{{ $city->id }}" <?php echo (isset($_GET['city']) && $_GET['city'] == $city->id) ? 'selected' : ''; ?>>{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="col-12 col-lg-2">
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