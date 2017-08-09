<?php $__env->startSection('title'); ?>
    Home
<?php $__env->stopSection(); ?>

<?php $__env->startPush('asset'); ?>
<link href="/css/home.css" rel="stylesheet">
<link href="/css/slider-btt.css" rel="stylesheet">
<link href="/assets/pages/css/about.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Initializing the slider -->
    <div id="slider">
        <div class="slides">
            <div class="slider">
                <div class="legend"></div>
                <div class="content">
                    <div class="content-txt">
                        <h1>Lorem ipsum dolor</h1>
                        <h2>Nam ultrices pellentesque facilisis. In semper tellus mollis nisl pulvinar vitae vulputate lorem consequat. Fusce odio tortor, pretium sit amet auctor ut, ultrices vel nibh.</h2>
                    </div>
                </div>
                <div class="image">
                    <img src="img/1.jpg">
                </div>
            </div>
            <div class="slider">
                <div class="legend"></div>
                <div class="content">
                    <div class="content-txt">
                        <h1>Lorem ipsum dolor</h1>
                        <h2>Nam ultrices pellentesque facilisis. In semper tellus mollis nisl pulvinar vitae vulputate lorem consequat. Fusce odio tortor, pretium sit amet auctor ut, ultrices vel nibh.</h2>
                    </div>
                </div>
                <div class="image">
                    <img src="img/2.jpg">
                </div>
            </div>
            <div class="slider">
                <div class="legend"></div>
                <div class="content">
                    <div class="content-txt">
                        <h1>Lorem ipsum dolor</h1>
                        <h2>Nam ultrices pellentesque facilisis. In semper tellus mollis nisl pulvinar vitae vulputate lorem consequat. Fusce odio tortor, pretium sit amet auctor ut, ultrices vel nibh.</h2>
                    </div>
                </div>
                <div class="image">
                    <img src="img/3.jpg">
                </div>
            </div>
            <div class="slider">
                <div class="legend"></div>
                <div class="content">
                    <div class="content-txt">
                        <h1>Lorem ipsum dolor</h1>
                        <h2>Nam ultrices pellentesque facilisis. In semper tellus mollis nisl pulvinar vitae vulputate lorem consequat. Fusce odio tortor, pretium sit amet auctor ut, ultrices vel nibh.</h2>
                    </div>
                </div>
                <div class="image">
                    <img src="img/4.jpg">
                </div>
            </div>
        </div>
        <div class="switch">
            <ul>
                <li>
                    <div class="on"></div>
                </li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
    </div>

    <div class="page-container">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="container">
                    <div id="page-start"></div>

                    <section class="section m-iconcontainer">
                        <ul>
                            <li>
                                <img class="licon" src="/img/communicate_icon.png" alt="">
                                <span>Improved Communication <br> With your members</span>
                            </li>
                            <li>
                                <span><img class="licon" src="/img/add_sign.png" alt="" style="width: 42px; height: 42px"></span>
                            </li>
                            <li>
                                <img class="licon" src="/img/renewal_icon.png" alt="">
                                <span>Easy Online <br> Renewals</span>
                            </li>
                            <li>
                                <span><img class="licon" src="/img/equal_sign.png" alt="" style="width: 42px; height: 42px"></span>
                            </li>
                            <li>
                                <img class="licon" src="/img/retreiving_icon.png" alt="">
                                <span>Healthy and <br> Happy Club</span>
                            </li>
                        </ul>
                    </section>

                    <div>
                        <div class="page-content-inner">
                            <h2 class="text-center">Core <strong>Features</strong></h2>
                            <!-- BEGIN CARDS -->
                            <div class="row margin-bottom-20">
                                <div class="col-lg-4 col-md-4">
                                    <div class="portlet light">
                                        <div class="card-icon">
                                            <i class="fa fa-wechat font-red-sunglo theme-font"></i>
                                        </div>
                                        <div class="card-title">
                                            <span> Improved Communication </span>
                                        </div>
                                        <div class="card-desc">
                            <span> <?php echo e(\Illuminate\Support\Str::limit("Rosterfi makes it easy to keep your membership roster up to date and accurate.
                                                Empower your members to maintain their membership status and set their prefered methods of being reminded.
                                                Setup events to notify your members allowing them to RSVP and even pay for them online.", 200)); ?> </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="portlet light">
                                        <div class="card-icon">
                                            <i class="fa fa-credit-card font-green-haze theme-font"></i>
                                        </div>
                                        <div class="card-title">
                                            <span> Easy Online Renewals </span>
                                        </div>
                                        <div class="card-desc">
                            <span> <?php echo e(\Illuminate\Support\Str::limit("Accept online payments through your Stripe or Paypal account.
                                                Members can pay for events or membership fee's beforehand freeing up valuable time before the event.
                                                For the members who dont wish to use the webpage, you can still accept and record cash transactions.", 200)); ?> </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="portlet light">
                                        <div class="card-icon">
                                            <i class="fa fa-thumbs-o-up font-purple-wisteria theme-font"></i>
                                        </div>
                                        <div class="card-title">
                                            <span> Healthy & Happy Club </span>
                                        </div>
                                        <div class="card-desc">
                            <span> <?php echo e(\Illuminate\Support\Str::limit("Make it eaiser for prospective members to find your club and see what you are up to.
                                                Link to your social media accounts so members can find the latest news about your club.", 200)); ?> </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- END CARDS -->

                            <!-- BEGIN MEMBERS SUCCESS STORIES -->
                            <div class="row margin-bottom-40 stories-header" data-auto-height="true">
                                <div class="col-md-12">
                                    <h1>Members Success Stories</h1>
                                    <h2>Life is either a great adventure or nothing</h2>
                                </div>
                            </div>
                            <div class="row margin-bottom-20 stories-cont">
                                <div class="col-lg-3 col-md-6">
                                    <div class="portlet light">
                                        <div class="photo">
                                            <img src="/assets/pages/media/users/teambg1.jpg" alt="" class="img-responsive" /> </div>
                                        <div class="title">
                                            <span> Mark Wahlberg </span>
                                        </div>
                                        <div class="desc">
                                            <span> We are at our very best, and we are happiest, when we are fully engaged in work we enjoy on the journey toward the goal we've established for ourselves. </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="portlet light">
                                        <div class="photo">
                                            <img src="/assets/pages/media/users/teambg2.jpg" alt="" class="img-responsive" /> </div>
                                        <div class="title">
                                            <span> Lindsay Lohan </span>
                                        </div>
                                        <div class="desc">
                                            <span> Do what you love to do and give it your very best. Whether it's business or baseball, or the theater, or any field. If you don't love what you're doing and you can't give it your best, get out of it. </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="portlet light">
                                        <div class="photo">
                                            <img src="/assets/pages/media/users/teambg5.jpg" alt="" class="img-responsive" /> </div>
                                        <div class="title">
                                            <span> John Travolta </span>
                                        </div>
                                        <div class="desc">
                                            <span> To be nobody but yourself in a world which is doing its best, to make you everybody else means to fight the hardest battle which any human being can fight; and never stop fighting. </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="portlet light">
                                        <div class="photo">
                                            <img src="/assets/pages/media/users/teambg8.jpg" alt="" class="img-responsive" /> </div>
                                        <div class="title">
                                            <span> Tom Brady </span>
                                        </div>
                                        <div class="desc">
                                            <span> You have to accept whatever comes and the only important thing is that you meet it with courage and with the best that you have to give. Never give up, never surrender. Go all out or gain nothing. </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END MEMBERS SUCCESS STORIES -->
                        </div>
                    </div>


                    <!-- section start -->
                    <!-- ================ -->
                    <section class="light-gray-bg pv-30 clearfix">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <h2 class="text-center">Featured <strong>Clubs</strong></h2>
                                    <div class="separator"></div>
                                </div>

                            </div>
                            <div class="listing-item mb-20 light-gray-bg">
                                <div class="row grid-space-0">
                                    <div class="col-sm-2 col-md-2 col-lg-2">
                                        <div class="overlay-container">
                                            <img src="/img/economy.jpg" alt="" style="width: 180px">

                                        </div>
                                    </div>
                                    <div class="col-sm-10 col-md-10 col-lg-10">
                                        <div class="body">
                                            <h3 class="margin-clear">South Louisiana IDPA</h3>

                                            <div class="separator-2 mt-10"></div>
                                            <p>South Louisiana IDPA is an Practical Pistol club. We meet on the second sunday of each month for a club level match and host a regional championship match once a year.</p>
                                            <a href="<?php echo e(url('/myclub')); ?>">More information</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="listing-item mb-20 light-gray-bg">
                                <div class="row grid-space-0">
                                    <div class="col-sm-2 col-md-2 col-lg-2">
                                        <div class="overlay-container">
                                            <img src="/img/economy.jpg" alt="" style="width: 180px">

                                        </div>
                                    </div>
                                    <div class="col-sm-10 col-md-10 col-lg-10">
                                        <div class="body">
                                            <h3 class="margin-clear">ToastMasters</h3>

                                            <div class="separator-2 mt-10"></div>
                                            <p>The mission of a Toastmasters Club is to provide a mutually supportive and positive learining environment in which every individual member has the opportunity to
                                                develop oral communication and leadership skills, which in turn foster self-confidence and personal growth.
                                                ToastMasters meets on the last Tuesday of the month at the Jefferson Parish Library on Metaire Rd.6PM.
                                            </p>
                                            <a href="#">More information</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="listing-item mb-20 light-gray-bg">
                                <div class="row grid-space-0">
                                    <div class="col-sm-2 col-md-2 col-lg-2">
                                        <div class="overlay-container">
                                            <img src="/img/economy.jpg" alt="" style="width: 180px">

                                        </div>
                                    </div>
                                    <div class="col-sm-10 col-md-10 col-lg-10">
                                        <div class="body">
                                            <h3 class="margin-clear">South Louisiana IDPA</h3>

                                            <div class="separator-2 mt-10"></div>
                                            <p>South Louisiana IDPA is an Practical Pistol club. We meet on the second sunday of each month for a club level match and host a regional championship match once a year.</p>
                                            <a href="#">More information</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>
                    <!-- section end -->
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.hometemplate', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>