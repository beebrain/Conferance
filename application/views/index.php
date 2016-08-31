<link rel="stylesheet" href="<?php echo base_url('asserts/css/jquery.dataTables.min.css') ?>">
<div class="pre-loader">
    <div class="load-con">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
</div>

<header>

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="fa fa-bars fa-lg"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('index.php/MainController/index') ?>">
                    <img src="<?php echo base_url('asserts/img/Logo3.png') ?>" alt="" class="logo">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#Registration">Call for papers</a>
                    </li>
                    <li><a href="#Important">Important Date</a>
                    </li>
                    <li><a href="#committee">committee</a>
                    </li>
                    <li><a href="#Author">Submission information</a>
                    </li>
                    <li><a href="#Venue">Venue & Lodging</a>
                    </li>
                    <li><a href="#login">login</a>
                    </li>
                    <li><a href="<?php echo base_url() . "index.php/MainController/signup" ?>">Register</a>
                    </li>
                    <li><a href="#ListMember">List Member</a>
                    </li>
                    <li><a href="#contact">contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-->
    </nav>


    <!--RevSlider-->
    <div class="tp-banner-container">
        <div class="tp-banner" >
            <ul>
                <!-- SLIDE  -->
                <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
                    <div class="tp-caption large_light_white sft" data-x="center" data-y="center" data-hoffset="-100" data-voffset="-150" data-speed="500" data-start="1000" data-easing="Power4.easeOut">
                        <img src="<?php echo base_url('asserts/img/logo/URU_80.png') ?>" height="10%" width="10%" class="img-responsive scrollpoint sp-effect3" alt="">
                    </div>
                    <div class="tp-caption large_light_white sft" data-x="center" data-y="center" data-hoffset="100" data-voffset="-150" data-speed="500" data-start="1000" data-easing="Power4.easeOut">
                        <img src="<?php echo base_url('asserts/img/Logo_ICST.gif') ?>" height="10%" width="10%" class="img-responsive scrollpoint sp-effect3" alt="">
                    </div>
                    <div class="tp-caption mediumlarge_light_white sft" data-x="center" data-y="center" data-hoffset="0" data-voffset="-40" data-speed="500" data-start="1200" data-easing="Power4.easeOut">
                        <p>URU International Conference on Science and Technology 2016</p>
                    </div>
                    <div class="tp-caption medium_light_white  sft" data-x="center" data-y="center" data-hoffset="0" data-voffset="10" data-speed="500" data-start="1000" data-easing="Power4.easeOut">
                        “Celebrating 80 years of Uttaradit Rajabhat University”
                    </div>
                    <!-- <div class="tp-caption medium_light_white  sft" data-x="center" data-y="center" data-hoffset="-100" data-voffset="100" data-speed="500" data-start="900" data-easing="Power4.easeOut">
                         <img src="<?php echo base_url('asserts/img/Logo_uru.png') ?>" height="20%" width="20%" class="img-responsive scrollpoint sp-effect1" alt="">    
                     </div>
                     <div class="tp-caption medium_light_white  sft" data-x="center" data-y="center" data-hoffset="100" data-voffset="100" data-speed="500" data-start="1000" data-easing="Power4.easeOut">
                         <img src="<?php echo base_url('asserts/img/Logo_sci.png') ?>" height="25%" width="25%" class="img-responsive scrollpoint sp-effect2" alt="">
                     </div>
                     <div class="tp-caption medium_light_white  sft" data-x="center" data-y="center" data-hoffset="-280" data-voffset="100" data-speed="500" data-start="1100" data-easing="Power4.easeOut">
                         <img src="<?php echo base_url('asserts/img/logo/Logo3.png') ?>" height="25%" width="25%" class="img-responsive scrollpoint sp-effect3" alt="">
                     </div>
                     <div class="tp-caption medium_light_white  sft" data-x="center" data-y="center" data-hoffset="280" data-voffset="100" data-speed="500" data-start="1200" data-easing="Power4.easeOut">
                         <img src="<?php echo base_url('asserts/img/logo/Logo1.png') ?>" height="10%" width="10%" class="img-responsive scrollpoint sp-effect5" alt="">
                     </div>
                     <div class="tp-caption medium_light_white  sft" data-x="center" data-y="center" data-hoffset="-450" data-voffset="100" data-speed="500" data-start="1300" data-easing="Power4.easeOut">
                         <img src="<?php echo base_url('asserts/img/logo/Logo2.png') ?>" height="15%" width="15%" class="img-responsive scrollpoint sp-effect3" alt=""> 
                     </div>
                     <div class="tp-caption medium_light_white  sft" data-x="center" data-y="center" data-hoffset="450" data-voffset="100" data-speed="500" data-start="1400" data-easing="Power4.easeOut">
                         <img src="<?php echo base_url('asserts/img/logo/Logo6.png') ?>" height="100%" width="80%" class="img-responsive scrollpoint sp-effect1" alt="">
                     </div>
                     <div class="tp-caption medium_light_white  sft" data-x="center" data-y="center" data-hoffset="600" data-voffset="100" data-speed="500" data-start="1400" data-easing="Power4.easeOut">
                         <img src="<?php echo base_url('asserts/img/logo/Logo5.png') ?>" height="100%" width="80%" class="img-responsive scrollpoint sp-effect1" alt="">
                     </div>
                     <div class="tp-caption medium_light_white  sft" data-x="center" data-y="center" data-hoffset="-600" data-voffset="100" data-speed="500" data-start="1500" data-easing="Power4.easeOut">
                         <img src="<?php echo base_url('asserts/img/logo/Logo4.png') ?>" width="70%" class="img-responsive scrollpoint sp-effect2" alt="">
                     </div>
                    -->
                    <div class="tp-caption medium_bg_orange sft" data-x="center" data-y="center" data-hoffset="0" data-voffset="100" data-speed="1000" data-start="1500" data-easing="Power4.easeOut">
                        August 1-2, 2016
                    </div>
                    <div class="tp-caption medium_light_white sft" data-x="center" data-y="center" data-hoffset="0" data-voffset="220" data-speed="1000" data-start="1500" data-easing="Power4.easeOut">
                        Faculty of Science and Technology, Uttaradit Rajabhat University, Uttaradit, Thailand
                    </div>
                    <div class="tp-caption medium_light_red sft" data-x="center" data-y="center" data-hoffset="0" data-voffset="150" data-speed="1000" data-start="1500" data-easing="Power4.easeOut">
                        Update!! URUICST2016 Program,Oral Presentation Program and  Poster Presentation Program
                    </div>
                    <div class="tp-caption small_text " data-x="center" data-y="center" data-hoffset="0" data-voffset="190" data-speed="1000" data-start="1500" data-easing="Power4.easeOut">
                        <p>(<a href="<?= base_url('/upload/Doc/URUICST-2016-CONFERENCE-PROGRAM.pdf')?>">URUICST2016 Program</a>,<a href="<?= base_url('/upload/doc/Oral-Presentation-Program.pdf')?>"> Oral Presentation Program </a>,<a href="<?= base_url('/upload/doc/poster-Presentation-Program.pdf')?>"> Poster Presentation Program </a>)</p>
                    </div>
                    
                    
            </ul>
        </div>

    </div>


</header>
<div class="wrapper">
    <section id="about" class="reviews">
        <div class="container">
            <div class="section-heading scrollpoint sp-effect3">
                <h1>ABOUT URUICST 2016</h1>
                <h2>Conference Theme</h2>

                <div class="divider"></div>
                <div class="row scrollpoint sp-effect1">
                    <p>The URU International Conference on Science and Technology 2016 (URUICST2016) 
                        is held by the Faculty of Science and Technology, Uttaradit Rajabhat University.
                        The conference aims to be an international forum for research presentation of pure
                        sciences, applied sciences and health sciences and to provide an opportunity for 
                        researchers from academic, public and private sectors all over the world to exchange,
                        disseminate new knowledge, research experience and professional expertise, 
                        and to create linkages among the participants for mutual benefits. The official 
                        theme of URUICST2016 is <br>“Celebrating 80 years of Uttaradit Rajabhat University”</p>
                </div>
                <div class="divider"></div>
            </div>
            <div class="row scrollpoint sp-effect2">
                <h2 class="text-center">Highlights</h2>
                <div class="col-md-10 col-md-push-1 scrollpoint sp-effect3">
                    <div class="review-filtering">
                        <div class="review ">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="review-person">
                                        <img src="<?php echo base_url('/upload/prof/Sanjay_kumar.jpg') ?>" alt="" class="img-responsive"> 
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="review-comment">
                                        <h3>“Prof. Dr. Sanjay kumar”</h3>
                                        <p>Solar Energy B.R. Ambedkar Bihar University, Bihar, India</p>
                                        <p>Topic:   Solar and Bio Energy: options and potential in developing countries.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="review rollitin">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="review-person">
                                        <img src="<?php echo base_url("/upload/prof/Lung.jpg") ?>" alt="" class="img-responsive"> 
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="review-comment">
                                        <h3>“Prof. Dr. Lung-jen Wang”</h3>
                                        <p>Computer Science and Information Engineering National Pingtung University, Taiwan.</p>
                                        <p>Topic : A wavelet-based self-embedding fragile watermarking for social network images</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="review rollitin">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="review-person">
                                        <img src="<?php echo base_url("/upload/prof/Saisamorn.jpg") ?>" alt="" class="img-responsive"> 
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="review-comment">
                                        <h3>“Prof. Dr. Saisamorn Lumyong ”</h3>
                                        <p>Department of Biology, Faculty of Science, Chiang Mai University, Chiang Mai, Thailand.                                       </p>
                                        <p>Topic : Application and utilization of the microbial diversity</p>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="review rollitin">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="review-person">
                                        <img src="<?php echo base_url("/upload/prof/Lakkana.jpg") ?>" alt="" class="img-responsive"> 
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="review-comment">
                                        <h3>“Associate Professor Doctor Lakkana  Thaikruea”</h3>
                                        <p>Community Medicine Department, Faculty of Medicine, Chiang Mai University Chiang Mai, Thailand. </p>
                                        <p>Topic: University Engagement: A case study of Thailand’s first toxic jellyfish networks and knowledge establishment.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


</div>
</section>
<section id="Registration" class="about">
    <div class="container">
        <div class="section-heading scrollpoint sp-effect3">
            <h1>Call for papers</h1>
            <div class="divider"></div>
            <div class="row scrollpoint sp-effect1">
                <p>Topics of interest include, but are not limited to:</p>
            </div>
            <div class="divider"></div>
            <div class="row scrollpoint sp-effect2">
                <div class="col-md-4">
                    <div class="about-item sp-effect2 active animated fadeInRight">
                        <i class="fa fa-space-shuttle fa-2x"></i>
                        <h2>Topic A: Pure Sciences</h2>
                        <table class="table table-hover table-responsive table-bordered table-condensed">
                            <tbody>
                                <tr >
                                    <td style="text-align: left;">
                                        <ul>
                                            <li>Physics</li>
                                            <li>Chemistry</li>
                                            <li>Mathematics</li>
                                            <li>Biology</li>
                                            <li>Others</li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="about-item sp-effect2 active animated fadeInRight">
                        <i class="fa fa-bug fa-2x"></i>
                        <h2>Topic B: Applied Sciences</h2>
                        <table class="table table-hover table-responsive table-bordered table-condensed">
                            <tbody>
                                <tr >
                                    <td style="text-align: left;">
                                        <ul>
                                            <li>Nanomaterials and Construction Materials Technology</li>
                                            <li>Energy</li>
                                            <li>Biotechnology</li>
                                            <li>Environmental Science</li>
                                            <li>Computer Sciences</li>
                                            <li>Information Technology</li>
                                            <li>Others</li>
                                        </ul>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="about-item sp-effect2 active animated fadeInRight">
                        <i class="fa fa-ambulance  fa-2x"></i>
                        <h2>Topic C: Health Science</h2>
                        <table class="table table-hover table-responsive table-bordered table-condensed">
                            <tbody>
                                <tr >
                                    <td style="text-align: left;">
                                        <ul>
                                            <li>Medical Sciences</li>
                                            <li>Public Health</li>
                                            <li>Thai Traditional Medical</li>
                                            <li>Nursing</li>
                                            <li>Sport Science</li>
                                            <li>Food and Nutrition</li>
                                            <li>Others</li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="divider"></div>
        </div>

        <div class="row scrollpoint sp-effect3">
            <h2 class="text-center">URUICST 2016 Registration Rate</h2>
            <div class="col-md-offset-2 col-md-8">
                <table class="table table-hover table-responsive table-bordered table-condensed">
                    <thead>
                        <tr >
                            <th rowspan="2" style="text-align: center;">Registration period</th>
                            <th colspan="2" style="text-align: center;">Local participant</th>
                            <th colspan="2" style="text-align: center;">Oversea participant</th>

                        </tr>
                        <tr >
                            <th style="text-align: center;">Regular</th>
                            <th style="text-align: center;">Student </th>
                            <th style="text-align: center;">Regular</th>
                            <th style="text-align: center;">Student</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr >
                            <td>Early bird (Until 15 June 2016)</td>
                            <td style="text-align: center;" >4,500 B</td>
                            <td style="text-align: center;">4,000 B</td>
                            <td style="text-align: center;">&#36;180</td>
                            <td style="text-align: center;">&#36;160</td>
                        </tr>
                        <tr >
                            <td>Late (Until 30 June 2016)</td>
                            <td style="text-align: center;">5,000 B</td>
                            <td style="text-align: center;">4,500 B</td>
                            <td style="text-align: center;">&#36;180</td>
                            <td style="text-align: center;">&#36;160</td>
                        </tr>
                    </tbody>
                </table>
                <p style=" font-size: 14px; TEXT-ALIGN: LEFT; color: red">
                    * Author registrations that are completed AFTER the Late Registration Deadline and not completed payment may not be included in the Conference Proceedings.
                </p>
                <p class="text-center"><button type="button" class="btn btn-success btn-lg" Onclick="window.location.href = '<?php echo base_url('index.php/MainController/signup') ?>'">Register</button></p>
            </div>

        </div>
</section>

<section id="Important" class="getApp">
    <div class="container">
        <div class="section-heading scrollpoint sp-effect3">
            <h1>Important Date</h1>
            <div class="divider"></div>
            <p>URUICST2016 Date</p>
        </div>

        <div class="col-md-offset-2 col-md-8">
            <table class="table table-bordered table-responsive table-striped">
                <thead>
                    <tr style="background: #5AD3FF;">
                        <th rowspan="2" style="text-align: center;">Description</th>
                        <th colspan="2" style="text-align: center;">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="row-odd" >
                        <td >Extended Full Paper Submission Deadline
                            <p style="color: red">(Update!! Extended full paper submission to 20 May 2016)</p>
                        </td>
                     
                        
                        <td >20 May 2016</td>
                    </tr>
                    <tr class="row-even">
                        <td>Early Bird Registration Deadline</td>
                        <td>1 June 2016</td>
                    </tr>
                    <tr class="row-odd">
                        <td>Late Registration Deadline</td>
                        <td>30 June 2016</td>

                    </tr>
                    <tr class="row-even">
                        <td>Conference Dates</td>
                        <td>1-2 August 2016</td>

                    </tr>
                </tbody>
            </table>
            <p>*Author registrations that are completed  AFTER the Late Registration Deadline may not be included in the Conference Proceedings.</p>
        </div>
    </div>
</section>

<section id='committee' class="reviews">
    <div class="container">
        <div class="section-heading scrollpoint sp-effect3">
            <h1>Committee</h1>
            <div class="divider"></div>
            <p>International Organizing Committees</p>
        </div>
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <table class="table table-bordered table-responsive table-hover table-condensed">
                    <tbody>
                        <tr class="row-odd" >
                            <td>Chair</td>
                            <td>Assistant Professor Dr. Ruangdet Wongla</td>
                            <td>President of Uttaradit Rajabhat University</td>
                        </tr>
                        <tr class="row-even">
                            <td>Secretary</td>
                            <td>Associate Professor Dr. Chanboon Sathitwiriyawong</td>
                            <td>King Mongkut’s Institute of  Technology Ladkrabang</td>
                        </tr>
                        <tr class="row-odd" >
                            <td>Scientific Committee Chair</td>
                            <td>Professor Dr. Lung-Jen Wang</td>
                            <td>National Pingtung University, Taiwan</td>
                        </tr>
                        <tr class="row-even">
                            <td>Technical Program Chair</td>
                            <td>Professor Dr. Sampan Rittidech</td>
                            <td>Mahasarakham University</td>
                        </tr>
                        <tr class="row-odd" >
                            <td>Editors</td>
                            <td>Professor Dr. Sanjay Kumar</td>
                            <td>Ambedkar Bihar University, Bihar, India</td>
                        </tr>
                        <tr class="row-even">
                            <td></td>
                            <td>Professor Dr. Charles Christopher Sorrell</td>
                            <td>NewSouthwales, Australia</td>
                        </tr>
                        <tr class="row-odd" >
                            <td></td>
                            <td>Professor Emeritus Dr. Tawee Tunkasiri</td>
                            <td>Chiang Mai University</td>
                        </tr>
                        <tr class="row-even">
                            <td></td>
                            <td>Associate Professor Dr. Singhadej Tangjuank</td>
                            <td>Uttaradit Rajabhat University</td>
                        </tr>
                        <tr class="row-odd" >
                            <td>Organizing Committee</td>
                            <td>Associate Professor Dr. Akira Baba</td>
                            <td>Niigata University, Japan</td>
                        </tr>
                        <tr class="row-even">
                            <td></td>
                            <td>Associate Professor Dr. Peter C. Angeletti</td>
                            <td>University of Nebraska, Lincoln, USA</td>
                        </tr>
                        <tr class="row-odd" >
                            <td></td>
                            <td>Associate Professor Dr. Akiyoshi Yamada</td>
                            <td>Nagano, Japan</td>
                        </tr>
                        <tr class="row-even">
                            <td></td>
                            <td>Professor Dr. Saisamorn Lumyong</td>
                            <td>Chiang Mai University</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</section>

<section id="Author" class="screens">
    <div class="container">
        <div class="section-heading scrollpoint sp-effect3">
            <h1>Submission information</h1>
            <div class="divider"></div>
            <p style="text-align: left;text-indent: 1.5em;"> Submissions are recommended to have no more than 6 pages, including figures, tables, and references. Submissions will be judged on originality, significance, interest, clarity, relevance, correctness, and presentation. 
            </p>
            <p style="text-align: left;text-indent: 1.5em;" >
                - See more at: http://www. uruicst2016.uru.ac.th
                Full paper template, please see more at www.scientific.net (Advanced Engineering Forum)
            </p>
            <div class="divider"></div>
        </div>
        <div class="row scrollpoint sp-effect2">
            <h2 class="text-center">Paper Submission</h2>
            <div class="col-md-10 col-md-push-1 scrollpoint sp-effect3">
                <div class="row scrollpoint sp-effect1">
                    <ul style="font-size: 20px">
                        <li>All papers must  be written in good English and have been proven by a native English speaker.</li>
                        <li>All papers must  be submitted through the conference website at www.uruicst2016.uru.ac.th</li>
                        <li>All papers are blinded peer reviewed by experts in their corresponding  fields.</li>
                        <li>The minimum  length of manuscript is  5 pages; and  the maximum  length  is 6 pages.</li>
                        <li>Paper in full text for publication in the Conference Proceedings may be published in full text in a periodical on www.scientific.net (by Trans Tech Publications Ltd.). "Advanced Engineering Forum" </li>
                    </ul>
                </div>
                <p class="text-center"><button type="button" class="btn btn-warning btn-lg" Onclick="window.location.href = '<?php echo base_url('upload/Doc/Desc-Abstract-59.pdf') ?>'">Download Full Text Description</button></p>
                <p class="text-center"> <button type="button" class="btn btn-success btn-lg" Onclick="window.location.href = '<?php echo base_url('upload/Doc/Template_Full-text.pdf') ?>'">Download Full Text Template</button></p>
				<p class="text-center"> <button type="button" class="btn btn-info btn-lg" Onclick="window.location.href = '<?php echo base_url('upload/Doc/Poster-template-English.pdf') ?>'">Download Poster Template</button></p>
            </div>
            <div class="divider"></div>
        </div>
        <div class="row scrollpoint sp-effect3" style="padding-top: 20px">
            <h2 class="text-center">Instruction for presenters</h2>
            <div class="col-md-10 col-md-push-1 scrollpoint sp-effect1">
                <div class="row scrollpoint sp-effect1">
                    <p style="font-size: 22px" ><b>Oral Presentation</b></p>
                    <p style="text-align: left;font-size: 20px;text-indent: 1.5em;" >Each oral presentation is limited to 15 minutes. Presenters should prepare their presentation to 10-12 minutes to allow for some question times. 
                        Presentation must be in English. 
                        All presenters have to upload their files at least one session (morning/afternoon) prior to their presentations at the upload stations at the conference.
                    </p>
                    <p class="text-center"><button type="button" class="btn btn-success btn-lg" Onclick="window.location.href = '<?php echo base_url('upload/Doc/Poster-template-English.pdf') ?>'">Download Poster Template</button></p>
                </div>
            </div>
        </div>


    </div>
</section>

<section id="Venue" class="demo">
    <div class="container">
        <div class="section-heading scrollpoint sp-effect3">
            <h1>Venue & Lodging</h1>
            <div class="divider"></div>
            <p>Uttaradit Rajabhat University, Uttaradit, Thailand</p>
        </div>
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="media">
                    <a class="pull-left" href="#" >
                        <i class="fa fa-map-marker fa-2x"></i>
                    </a>
                    <div class="media-body">
                        <p style="text-align: left;font-size: 20px;text-indent: 1.5em;" >
                            Uttaradit is located in the North of Thailand bordering Laos, Uttaradit has a long history dating back to pre-historic times. The site of the "modern" town, then called Bang Pho Tha It, was located on the right bank of the Nan River during the Dvaravati or Lavo periods, prior to Lanna and Sukhothai, when it flourished as a commercial port until King Rama V elevated its status into a province and re-named it Uttaradit, literally "the Port of the North".
                            Uttaradit, which literally means "the Port of the North" has a long history of commercial importance. Today, the city is a naturally beautiful town and the province contains Queen Sirikit Dam, a 250 km² artificial lake, as well as the world's largest teak tree, which has stood for roughly 1500 years.
                        </p>
                        <h4 class="lead-heading"></h4>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <style>
                #map {
                    height: 400px;
                }
            </style>
            <div class="col-md-offset-2 col-md-8" id="map">

            </div>
        </div>

    </div>
</section>

<section id="login" class="getApp2">
    <div class="section-heading inverse scrollpoint sp-effect3">
        <h1>Login</h1>
        <div class="divider"></div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="alert alert-danger" id="info_m">
                Email or Password is wrong
            </div>
            <div style="padding: 20px;" id="form-olvidado">
                <form class="form" name = 'loginform' id='loginform' role="form" method="post" action="<?php echo base_url('index.php/UserController/login') ?>" accept-charset="UTF-8" id="login-nav">
                    <div class="form-group">
                        <label for="Email" class="rights">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email address" required>
                    </div>
                    <div class="form-group">
                        <label >Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <button type="button" onclick="login()" class="btn btn-success btn-lg pull-right">Sign in</button>

                    </div>
                    <div class="form-group">
                        <p class="help-block">
                            <a class="pull-left" href="<?php echo base_url("index.php") . "/Welcome/forgotPass" ?>">Forgot your password?</a>
                        </p>

                    </div>


                </form>

            </div>

        </div>
    </div>
</section>
<section id="ListMember" class="demo">
    <div class="container">
        <div class="section-heading scrollpoint sp-effect3">
            <h1>Member List</h1>
            <div class="divider"></div>
            <p>Uttaradit Rajabhat University, Uttaradit, Thailand</p>
        </div>
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <table id="listmember" class="display" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center"><label >No.</label></th>
                            <th class="text-center"><label >Registrant</label></th>
                            <th class="text-center"><label >Faculty</label></th>
                            <th class="text-center"><label >University</label></th>
                            <th class="text-center"><label >Country</label></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($member as $key => $value) {
                            ?>
                            <tr >
                                <td class="text-center" ><?= ++$i; ?></td>
                                <td><?= $value->title . $value->first . " " . $value->mid . " " . $value->last ?></td>
                                <td class="text-center"><?= $value->faculty ?></td>
                                <td class="text-center"><?= $value->university ?></td>
                                <td class="text-center"><?= $value->country ?></td>

                            </tr>
                        <?php }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>


    </div>
</section>
<section id="contact" class="doublediagonal">
    <div class="container">
        <div class="section-heading scrollpoint sp-effect3">
            <h1>Contact</h1>
            <div class="divider"></div>
            <p>For more info, contact us!</p>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8 col-md-offset-1 col-sm-8 scrollpoint sp-effect1">
                        <div class="media">
                            <a class="pull-left" href="#" >
                                <i class="fa fa-map-marker fa-2x"></i>
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Faculty of Science and Technology Uttaradit Rajabhat University Thailand</h4>
                            </div>
                        </div>
                        <div class="media">
                            <a class="pull-left" href="#" >
                                <i class="fa fa-envelope fa-2x"></i>
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">
                                    <a href="mailto:uruicst2016@uru.ac.th">uruicst2016@uru.ac.th</a>
                                </h4>
                            </div>
                        </div>
                        <div class="media">
                            <a class="pull-left" href="#" >
                                <i class="fa fa-phone fa-2x"></i>
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">+66-81 8812099</h4>
                            </div>
                        </div>
                        <div class="media">
                            <a class="pull-left" href="#" >
                                <i class="fa fa-navicon fa-2x"></i>
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Website: www.uruicst2016.uru.ac.th</h4>
                            </div>
                        </div>
                        <div class="media">
                            <a class="pull-left" href="#" >
                                <i class="fa fa-facebook fa-2x"></i>
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Facebook: https://www.facebook.com/uruicst2016</h4>
                            </div>

                        </div>

                    </div>

                    <div class="col-md-3 col-sm-3 scrollpoint sp-effect1">

                        <div class="media">
                            <h4>Visitor Counter</h4>
                            <script type="text/javascript" src="//rf.revolvermaps.com/0/0/6.js?i=5jcc03mnh23&amp;m=0&amp;s=220&amp;c=ff0000&amp;cr1=ffffff&amp;f=arial&amp;l=0" async="async"></script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
<script src="<?php echo base_url('asserts/js/jquery-1.11.1.min.js') ?>"></script>
<script src="<?php echo base_url('asserts/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('asserts/js/slick.min.js') ?>"></script>
<script src="<?php echo base_url('asserts/js/placeholdem.min.js') ?>"></script>
<script src="<?php echo base_url('asserts/js/rs-plugin/js/jquery.themepunch.plugins.min.js') ?>"></script>
<script src="<?php echo base_url('asserts/js/rs-plugin/js/jquery.themepunch.revolution.min.js') ?>"></script>
<script src="<?php echo base_url('asserts/js/waypoints.min.js') ?>"></script>
<script src="<?php echo base_url('asserts/js/scripts.js') ?>"></script>
<script src="<?php echo base_url('asserts/js/datatable.js') ?>"></script>
<script src="https://maps.googleapis.com/maps/api/js"></script>

<script>
                            $(document).ready(function () {
                                appMaster.preLoader();
                                $("#info_m").hide();
                                $('#listmember').DataTable();
                            });

                            function login() {
                                $("#info_m").hide();
                                var formData = $("#loginform").serializeArray();
                                var URL = $("#loginform").attr("action");
                                console.log(formData);

                                $.post(URL, formData, function (data) {
                                    var data_json = jQuery.parseJSON(data);
                                    console.log(data_json);
                                    if (data_json["url"] == "") {

                                        $("#info_m").html(data_json["info"]);
                                        $("#info_m").show();
                                    } else {
                                        window.location.replace(data_json["url"]);
                                    }
                                    }).fail(function (jqXHR, textStatus, errorThrown)
                                    {

                                    });


                            }



                            var marker;

                            function initMap() {
                                var map = new google.maps.Map(document.getElementById('map'), {
                                    zoom: 15,
                                    center: {lat: 17.6321324, lng: 100.093077}
                                });

                                marker = new google.maps.Marker({
                                    map: map,
                                    draggable: true,
                                    animation: google.maps.Animation.DROP,
                                    position: {lat: 17.6321324, lng: 100.093077}
                                });
                                marker.addListener('click', toggleBounce);
                            }

                            function toggleBounce() {
                                if (marker.getAnimation() !== null) {
                                    marker.setAnimation(null);
                                } else {
                                    marker.setAnimation(google.maps.Animation.BOUNCE);
                                }
                            }


                            google.maps.event.addDomListener(window, 'load', initMap);
</script>

