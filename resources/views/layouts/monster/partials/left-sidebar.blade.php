<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile">
            <!-- User profile image -->
            <div class="profile-img"> <img src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" alt="{{ Auth::user()->name }}" /> </div>
            <!-- User profile text-->
            <div class="profile-text"> <a href="#" class="dropdown-toggle link u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">{{ Auth::user()->name }} <span class="caret"></span></a>
                <div class="dropdown-menu animated flipInY">
                    <div class="dropdown-divider"></div> 
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                </div>
            </div>
        </div>
        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="{{ request()->is('/dashboard') ? 'active' : '' }}">
                    <a href="/dashboard"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                </li>
                <li class="nav-small-cap">EXCHANGES</li>
                <li class="{{ request()->is('/exchanges/nexmo') ? 'active' : '' }}">
                    <a href="/exchanges/nexmo"><i class="mdi mdi-cellphone"></i><span class="hide-menu">Nexmo</span></a>
                </li>
                <li class="{{ request()->is('/exchanges/skype') ? 'active' : '' }}">
                    <a href="/exchanges/skype"><i class="mdi mdi-skype"></i><span class="hide-menu">Skype</span></a>
                </li>
                <li class="{{ request()->is('/exchanges/spark') ? 'active' : '' }}">
                    <a href="/exchanges/spark"><i class="mdi mdi-asterisk"></i><span class="hide-menu">Spark</span></a>
                </li>
                <li class="{{ request()->is('/exchanges/teams') ? 'active' : '' }}">
                    <a href="/exchanges/teams"><i class="mdi mdi-microsoft"></i><span class="hide-menu">Teams</span></a>
                </li>

                <li class="nav-devider"></li>

                <li class="nav-small-cap">METRICS</li>

                <li class="nav-devider"></li>

                <li class="nav-small-cap">DOCUMENTATION</li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-lightbulb-on-outline"></i><span class="hide-menu">Core Concepts</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li class="">
                            <a href="">Hearing Messages</a>
                        </li>
                        <li class="">
                            <a href="">Hearing Attachments</a>
                        </li>
                        <li class="">
                            <a href="">Sending Messages</a>
                        </li>
                        <li class="">
                            <a href="">Conversations</a>
                        </li>
                        <li class="">
                            <a href="">Events</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-math-compass"></i><span class="hide-menu">Advanced Topics</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li class="">
                            <a href="">Natural Language Processing</a>
                        </li>
                        <li class="">
                            <a href="">User Information</a>
                        </li>
                        <li class="">
                            <a href="">Storing Information</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-robot"></i><span class="hide-menu">Extending Cora</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li class="">
                            <a href="">Middleware</a>
                        </li>
                        <li class="">
                            <a href="">Drivers</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-wrench"></i><span class="hide-menu">Drivers</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li class="">
                            <a href="">Amazon Alexa</a>
                        </li>
                        <li class="">
                            <a href="">Cisco Spark</a>
                        </li>
                        <li class="">
                            <a href="">Facebook Messenger</a>
                        </li>
                        <li class="">
                            <a href="">HipChat</a>
                        </li>
                        <li class="">
                            <a href="">Microsoft Bot Framework</a>
                        </li>
                        <li class="">
                            <a href="">Nexmo</a>
                        </li>
                        <li class="">
                            <a href="">Slack</a>
                        </li>
                        <li class="">
                            <a href="">Telegram</a>
                        </li>
                        <li class="">
                            <a href="">Twilio</a>
                        </li>
                        <li class="">
                            <a href="">Web</a>
                        </li>
                        <li class="">
                            <a href="">WeChat</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ request()->is('/documentation/testing') ? 'active' : '' }}">
                    <a href="/#"><i class="mdi mdi-test-tube"></i><span class="hide-menu">Testing</span></a>
                </li>
                <li class="{{ request()->is('/documentation/faq') ? 'active' : '' }}">
                    <a href="/#"><i class="mdi mdi-comment-question-outline"></i><span class="hide-menu">FAQs</span></a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <!-- Bottom points-->
    <div class="sidebar-footer">
        <!-- item-->
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
    </div>
    <!-- End Bottom points-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->