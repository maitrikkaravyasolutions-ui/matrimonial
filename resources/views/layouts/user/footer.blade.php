<footer class="site-footer mt-5">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-12 col-md-6 col-lg-4">
                <h5 class="footer-brand mb-2">Matrimony</h5>
                <p class="footer-desc">
                    A trusted platform to discover meaningful matches with privacy, transparency, and ease.
                </p>
            </div>

            <div class="col-6 col-md-3 col-lg-2">
                <h6 class="footer-title">Quick Links</h6>
                <ul class="footer-links">
                    <li><a href="{{ route('/') }}">Home</a></li>
                    <li><a href="{{ route('user.profiles') }}">Browse Profiles</a></li>
                    @auth
                        <li><a href="{{ route('user.favourite_profile') }}">Favourites</a></li>
                        <li><a href="{{ route('users.create_profile') }}">My Profile</a></li>
                    @endauth
                </ul>
            </div>

            <div class="col-6 col-md-3 col-lg-3">
                <h6 class="footer-title">Account</h6>
                <ul class="footer-links">
                    @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @endguest
                    @auth
                        <li><a href="{{ route('home') }}">Dashboard</a></li>
                        <li><a href="{{ route('change-password') }}">Change Password</a></li>
                    @endauth
                </ul>
            </div>

            <div class="col-12 col-lg-3">
                <h6 class="footer-title">Get In Touch</h6>
                <div class="footer-contact-item">
                    <i class="bi bi-envelope"></i>
                    <span>support@matrimony.com</span>
                </div>
                <div class="footer-contact-item">
                    <i class="bi bi-telephone"></i>
                    <span>+91 98765 43210</span>
                </div>
                <div class="footer-contact-item mb-0">
                    <i class="bi bi-clock"></i>
                    <span>Mon - Sat, 10:00 AM - 7:00 PM</span>
                </div>
            </div>
        </div>

        <hr class="footer-divider my-4">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-2 footer-bottom">
            <span>© {{ date('Y') }} Matrimony. All Rights Reserved.</span>
            <span>Made with care for better matches.</span>
        </div>
    </div>
</footer>