<?php include('./Database.php'); ?>

<head>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css2/style.css">
    <link rel="stylesheet" href="fonts2/icomoon/style.css">
    <link rel="stylesheet" href="css2/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css2/bootstrap.min.css.map">

    <link href='fullcalendar/packages/core/main.css' rel='stylesheet' />
    <link href='fullcalendar/packages/daygrid/main.css' rel='stylesheet' />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">


    <!-- boostrap - accordion -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- boostrap - accordion - script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</head>

<body>
    <?php include('mathheader.php'); ?>


    <?php
    if (isset($_GET['fname'])) {
        $fname = $_GET['fname'];

        $eewebconn = new Database();
        $myfacq = "SELECT * FROM facultynew WHERE added_by='akdhanhsr' AND fname = :fname";
        $eewebconn->query($myfacq);
        $eewebconn->bind(':fname', $fname);
        $result = $eewebconn->single();

        if (!empty($result)) {
            $facr = $result;
    ?>

            <div class="total">
                <div class="mech-content" style="padding: 30px;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="img-box">
                                    <a href="#"><img class="faculty-member" src="http://localhost/maths-new/img/outerfaculty/<?php echo $facr->img; ?>" alt="team"></a>
                                </div>
                            </div>
                            <div class="col-md-8 inner-faculty-col">
                                <div class="inner-faculty-content">
                                    <div class="name_designation">
                                        <h2 style="font-size:28px; text-align: left;"><b><?php echo $facr->fname; ?></b></h2>
                                        <h2 class="designation" style="font-size: 22px;"><b><?php echo $facr->fdesig; ?></b></h2>
                                    </div>
                                    <div class="about_prof">
                                        <div class="education" style="display: flex; align-items: flex-start;flex-direction: column;">

                                            <?php if (!empty($facr->phdc) || !empty($facr->phd)) : ?>
                                                <div class="education" style="display: flex; align-items: flex-start;">
                                                    <img src="http://localhost/maths-new/img/icons/caps.png">
                                                    <p style=" font-size:20px;"><b><?php echo $facr->phd; ?></b>&nbsp;<?php echo $facr->phdc; ?> </p>
                                                </div>
                                            <?php endif; ?>
                                            <?php if (!empty($facr->mastc) || !empty($facr->mast)) : ?>
                                                <div class="education" style="display: flex; align-items: flex-start;">
                                                    <img src="http://localhost/maths-new/img/icons/caps.png">
                                                    <p style=" font-size:20px;"><b><?php echo $facr->mast; ?></b>&nbsp;<?php echo $facr->mastc; ?>
                                                    </p>
                                                </div>
                                            <?php endif; ?>
                                            <?php if (!empty($facr->bachc) || !empty($facr->bach)) : ?>
                                                <div class="education" style="display: flex; align-items: flex-start;">
                                                    <img src="http://localhost/maths-new/img/icons/caps.png">
                                                    <p style=" font-size:20px;"><b><?php echo $facr->bach; ?></b>&nbsp;<?php echo $facr->bachc; ?> </p>
                                                </div>
                                            <?php endif; ?>
                                        </div>

                                    </div>
                                    <div class="contact_details" style="display: flex; gap: 20px; padding-top: 20px">
                                        <div class="education" style="display: flex; align-items: center;">
                                            <img src="http://localhost/maths-new/img/icons/phone.png">
                                            <p style=" font-size:20px;"><?php echo $facr->phone; ?></p>
                                        </div>
                                        <div class="education" style="display: flex; align-items: center;">
                                            <img src="http://localhost/maths-new/img/icons/mail.png">
                                            <p style=" font-size:20px;"><?php echo $facr->mail; ?></p>
                                        </div>
                                        <div class="education" style="display: flex; align-items: center; ">
                                            <img src="http://localhost/maths-new/img/icons/web.png" style="padding-right: 10px;">
                                            <!-- <a style=" font-size:20px;">website<?php echo $facr->personallink; ?></a> -->
                                            <a href="#" onclick="window.open('<?php echo $facr->personallink; ?>', '_blank'); return false;" style="color:black; font-size:20px;"> Personal Link</a>
                                        </div>
                                    </div>
                                    <div class="contact_details" style="display: flex; gap: 20px; padding-top: 20px">
                                        <?php if (!empty($facr->officeno)) : ?>
                                            <div class="education" style="display: flex; align-items: flex-start;padding-top: 15px;">
                                                <img src="http://localhost/maths-new/img/icons/officeno.png" style="width: fit-content;">
                                                <p style=" font-size:20px;"><?php echo $facr->officeno; ?>
                                                </p>
                                            </div>
                                        <?php endif; ?>
                                    </div>


                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            </div>

    <?php
        }
    }
    ?>

    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="accordion" id="accordionExample" style="padding-bottom : 50px;">



                        <?php if (!empty($facr->about1)) : ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" style="background-color: #f4f4f4;">
                                        <span style="border-left: 3px #A00E09 solid; padding-left: 10px; font-size:20px;">Biography</span>
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">

                                        <ul style="list-style-type: disc; margin-left: 30px; font-size: 18px;">
                                            <?php
                                            $content = $facr->about1;
                                            $lines = explode("\n", $content); // Split the content by new line characters instead of <br> tag
                                            foreach ($lines as $line) :
                                                $sentence = trim($line);
                                                if (!empty($sentence)) :
                                            ?>
                                                    <li style="padding: 3px;"><?php echo $sentence; ?></li>
                                            <?php
                                                endif;
                                            endforeach;
                                            ?>

                                        </ul>

                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($facr->resrch)) : ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="background-color: #f4f4f4;">
                                        <span style="border-left: 3px #A00E09 solid; padding-left: 10px; font-size:20px;">Research
                                            Areas</span>
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul style="list-style-type: disc; margin-left: 30px; font-size: 18px;">
                                            <?php
                                            $content = $facr->resrch;
                                            $lines = explode("\n", $content); // Split the content by new line characters instead of <br> tag
                                            foreach ($lines as $line) :
                                                $sentence = trim($line);
                                                if (!empty($sentence)) :
                                            ?>
                                                    <li style="padding: 3px;"><?php echo $sentence; ?></li>
                                            <?php
                                                endif;
                                            endforeach;
                                            ?>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>


                        <?php if (!empty($facr->award)) : ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="background-color: #f4f4f4;">
                                        <span style="border-left: 3px #A00E09 solid; padding-left: 10px;font-size:20px;">Awards and Honors</span>
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="Stud_status">
                                            <ol style="margin-left: 30px; font-size: 18px;">
                                                <?php if (!empty($facr->award)) : ?>
                                                    <?php
                                                    $content = $facr->award;
                                                    $lines = explode("\n", $content);
                                                    ?>
                                                    <?php if (!empty($lines)) : ?>
                                                        <?php foreach ($lines as $line) : ?>
                                                            <?php $sentence = trim($line); ?>
                                                            <?php if (!empty($sentence)) : ?>

                                                                <li style="padding: 3px;"><?php echo $sentence; ?></li>

                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                <?php else : ?>
                                                    <li>No records found</li>
                                                <?php endif; ?>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>


                        <?php if (!empty($facr->curcourse) || !empty($facr->precourse)) : ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseTwo" style="background-color: #f4f4f4;">
                                        <span style="border-left: 3px #A00E09 solid; padding-left: 10px;font-size:20px;">Teachings</span>
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul style="list-style-type: disc; margin-left: 30px; font-size: 18px;">
                                            <?php if (!empty($facr->curcourse)) : ?>
                                                <p style="font-size: 18px; text-align: left;margin-bottom: 2px;margin-top: 5px;"><b>Current Courses</b></p>
                                                <?php
                                                $content = $facr->curcourse;
                                                $lines = explode("\n", $content);
                                                ?>
                                                <?php if (!empty($lines)) : ?>
                                                    <?php foreach ($lines as $line) : ?>
                                                        <?php $sentence = trim($line); ?>
                                                        <?php if (!empty($sentence)) : ?>
                                                            <li style="padding: 3px;"><?php echo $sentence; ?></li>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </ul>
                                        <ul style="list-style-type: disc; margin-left: 30px; font-size: 18px;">
                                            <?php if (!empty($facr->precourse)) : ?>
                                                <p style="font-size: 18px; text-align: left;margin-bottom: 2px;"><b>Previous Courses</b></p>
                                                <?php
                                                $content = $facr->precourse;
                                                $lines = explode("\n", $content);
                                                ?>
                                                <?php if (!empty($lines)) : ?>
                                                    <?php foreach ($lines as $line) : ?>
                                                        <?php $sentence = trim($line); ?>
                                                        <?php if (!empty($sentence)) : ?>
                                                            <li style="padding: 3px;"><?php echo $sentence; ?></li>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>





                        <?php if (!empty($facr->publication) || !empty($facr->journal) || !empty($facr->conference) || !empty($facr->patent) || !empty($facr->books)) : ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseThree" style="background-color: #f4f4f4;">
                                        <span style="border-left: 3px #A00E09 solid; padding-left: 10px;font-size:20px;"> Selected Publications</span>
                                    </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="Stud_status">
                                            <?php if (!empty($facr->publication)) : ?>
                                                <ol style="margin-left: 30px; font-size: 18px;">
                                                    <?php
                                                    $content = $facr->publication;
                                                    $lines = explode("\n", $content);
                                                    ?>
                                                    <?php if (!empty($lines)) : ?>
                                                        <?php foreach ($lines as $line) : ?>
                                                            <?php $sentence = trim($line); ?>
                                                            <?php if (!empty($sentence)) : ?>
                                                                <li style="padding: 3px;"><?php echo $sentence; ?></li>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </ol>
                                            <?php endif; ?>

                                            <?php if (!empty($facr->journal)) : ?>
                                                <p style="font-size: 18px; margin-left: 20px;margin-bottom: 2px;margin-top: 5px;"><b>Journals</b></p>
                                                <ol style=" margin-left: 30px; font-size: 18px;">
                                                    <?php
                                                    $content = $facr->journal;
                                                    $lines = explode("\n", $content);
                                                    ?>
                                                    <?php if (!empty($lines)) : ?>
                                                        <?php foreach ($lines as $line) : ?>
                                                            <?php $sentence = trim($line); ?>
                                                            <?php if (!empty($sentence)) : ?>
                                                                <li style="padding: 3px;"><?php echo $sentence; ?></li>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </ol>
                                            <?php endif; ?>

                                            <?php if (!empty($facr->conference)) : ?>
                                                <p style="font-size: 18px; margin-left: 20px;margin-bottom: 2px;margin-top: 5px;"><b>Conference Proceedings</b></p>
                                                <ol style=" margin-left: 30px; font-size: 18px;">
                                                    <?php
                                                    $content = $facr->conference;
                                                    $lines = explode("\n", $content);
                                                    ?>
                                                    <?php if (!empty($lines)) : ?>
                                                        <?php foreach ($lines as $line) : ?>
                                                            <?php $sentence = trim($line); ?>
                                                            <?php if (!empty($sentence)) : ?>
                                                                <li style="padding: 3px;"><?php echo $sentence; ?></li>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </ol>
                                            <?php endif; ?>

                                            <?php if (!empty($facr->patent)) : ?>
                                                <p style="font-size: 18px; margin-left: 20px;margin-bottom: 2px;margin-top: 5px;"><b>Patents</b></p>
                                                <ol style=" margin-left: 30px; font-size: 18px;">
                                                    <?php
                                                    $content = $facr->patent;
                                                    $lines = explode("\n", $content);
                                                    ?>
                                                    <?php if (!empty($lines)) : ?>
                                                        <?php foreach ($lines as $line) : ?>
                                                            <?php $sentence = trim($line); ?>
                                                            <?php if (!empty($sentence)) : ?>
                                                                <li style="padding: 3px;"><?php echo $sentence; ?></li>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </ol>
                                            <?php endif; ?>

                                            <?php if (!empty($facr->books)) : ?>
                                                <p style="font-size: 18px; margin-left: 20px;margin-bottom: 2px;margin-top: 5px;"><b>Books Authored</b></p>
                                                <ol style=" margin-left: 30px; font-size: 18px;">
                                                    <?php
                                                    $content = $facr->books;
                                                    $lines = explode("\n", $content);
                                                    ?>
                                                    <?php if (!empty($lines)) : ?>
                                                        <?php foreach ($lines as $line) : ?>
                                                            <?php $sentence = trim($line); ?>
                                                            <?php if (!empty($sentence)) : ?>
                                                                <li style="padding: 3px;"><?php echo $sentence; ?></li>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </ol>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>




                        <?php if (!empty($facr->otherinfo)) : ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingSix">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix" style="background-color: #f4f4f4;">
                                        <span style="border-left: 3px #A00E09 solid; padding-left: 10px;font-size:20px;">Other Informations</span>
                                    </button>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul style="list-style-type: disc; margin-left: 30px; font-size: 18px;">
                                            <?php
                                            $content = $facr->otherinfo;
                                            $lines = explode("\n", $content);
                                            ?>
                                            <?php if (!empty($lines)) : ?>
                                                <?php foreach ($lines as $line) : ?>
                                                    <?php $sentence = trim($line); ?>
                                                    <?php if (!empty($sentence)) : ?>
                                                        <li style="padding: 3px;"><?php echo $sentence; ?></li>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>



                        <?php if (!empty($facr->giancourse)) : ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingSix">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix" style="background-color: #f4f4f4;">
                                        <span style="border-left: 3px #A00E09 solid; padding-left: 10px;font-size:20px;">Gian course</span>
                                    </button>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul style="list-style-type: disc; margin-left: 30px; font-size: 18px;">
                                            <?php
                                            $content = $facr->giancourse;
                                            $lines = explode("\n", $content);
                                            ?>
                                            <?php if (!empty($lines)) : ?>
                                                <?php foreach ($lines as $line) : ?>
                                                    <?php $sentence = trim($line); ?>
                                                    <?php if (!empty($sentence)) : ?>
                                                        <li style="padding: 3px;"><?php echo $sentence; ?></li>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>








                    </div>
                </div>

            </div>
        </div>



        <!-- footer -->

        <?php include('mathfooter.php'); ?>


        
    <script src="http://localhost/maths-new/js2/jquery.min.js"></script>
    <script src="http://localhost/maths-new/js2/popper.js"></script>
    <script src="http://localhost/maths-new/js2/bootstrap.min.js"></script>
    <script src="http://localhost/maths-new/js2/jquery.sticky.js"></script>
    <script src="http://localhost/maths-new/js2/jquery.touch-swipe.min.js"></script>
    <script src="http://localhost/maths-new/js2/main.js"></script>



        <style>
            .about_prof {
                padding: 20px 0 20px 0;
                color: #000;
                border-bottom: 2px #A00E09 dashed;
            }

            /* Inner-faculty-page */
            .inner-faculty-col {
                display: grid;
                padding-left: 30px;
                align-items: center;

            }

            .about_prof {
                padding: 20px 0 20px 0;
                color: #000;
                border-bottom: 2px #A00E09 dashed;
            }

            .about_prof .education p {
                padding-left: 10px;
                font-family: 'Lato', sans-serif;
                margin-bottom: 0px !important;
            }

            .contact_details .education p {
                color: #000;
                padding-left: 10px;
                font-family: 'Lato', sans-serif;
                margin-bottom: 0px !important;
            }

            .accordion .accordion-item .accordion-button {
                padding: 20px 10;
                background-color: #f4f4f4;
                font-family: 'Lato', sans-serif;
                font-size: 18px;
                font-weight: 500;
            }

            .accordion-button:focus {
                box-shadow: none !important;
            }

            .accordion-button:not(.collapsed) {
                color: #A00E09 !important;
            }

            .faculty-member {
                width: 100%;
                box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
            }

            .name {
                font-size: 24px;
                font-family: 'Lato', sans-serif;
            }

            .designation {
                font-size: 18px;
                font-family: 'Lato', sans-serif;
            }

            .education p {
                font-size: 17px;
                font-family: 'Lato', sans-serif;
            }

            .accordion-header span {
                font-family: 'Lato', sans-serif;
            }

            .accordion-body li {
                font-family: 'Lato', sans-serif;
            }

            .accordion-button:not(.collapsed)::after {
                background-image: var(--bs-accordion-btn-active-icon);
            }

            @media only screen and (max-width: 900px) {
                .contact_details {
                    flex-direction: column;
                }
            }
        </style>
</body>