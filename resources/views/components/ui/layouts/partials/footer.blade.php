<footer id="footer">
    <div class="footer_up">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer_left">
                        <h2>About</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                        <p><b>Email</b> : info@jstemplate.net</p>
                        <p class="phone"><b>Phone</b> : 880 123 456 789</p>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="footer_middle">
                        <div class="footer_middle_left">
                            <h2 class="pb-1">Quick Link</h2>
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="blogListing.html">Blog</a></li>
                                <li><a href="#">Archived</a></li>
                                <li><a href="author.html">Author</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                        <div class="footer_middle_right">
                            <h2 class="pb-1">Category</h2>
                            <ul>
                                <li><a href="#">Lifestyle</a></li>
                                <li><a href="#">Technology</a></li>
                                <li><a href="#">Travel</a></li>
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Economy</a></li>
                                <li><a href="#">Sports</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="footer_right">
                        <h5>Weekly Newsletter</h5>
                        <h4>Get blog articles and offers via email</h4>
                        <div class="footer_input">
                            <form action="{{route('newsletter.subscribe')}}" method="post">
                                @csrf
                                @method('POST')
                                <input type="text" name="email" class="w-100" placeholder="Your Email">
                                <i class="fa fa-envelope-o email_icon" aria-hidden="true"></i>
                                <button class="footer_btn">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="footer_down">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-7">
                    <div class="footer_icon">
                        <div class="footer_icon_img">
                            <img src="images/footerLogo.png" alt="footerLogo">
                        </div>
                        <div class="footer_icon_text">
                            <span>Meta <b>Blog</b></span>
                            <br>
                            <span class="ftr_spn">© JS Template 2023. All Rights Reserved.</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-5">
                    <div class="footer_icon_right">
                        <span class="ftr_spn">Terms of Use</span>
                        <span class="ftr_spn">Privacy Policy</span>
                        <span class="ftr_spn">Cookie Policy</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>