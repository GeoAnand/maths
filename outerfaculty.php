<?php include('Database.php'); ?>

<head>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css2/style.css">
    <link rel="stylesheet" href="fonts2/icomoon/style.css">

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


    <div class="lecturers-page1-area">
        <div class="total">
            <div class="row">
                <div class="col-md-3" style="padding: 22px 0;">
                    <div id="container-card" style="padding-top: 50px;">
                        <div>
                            <button id="item1" class="btn" onclick="filterBySpecialization(this, ' Algebra and Number Theory')"> Algebra and Number Theory</button>
                        </div>
                        <div>
                            <button id="item1" class="btn" onclick="filterBySpecialization(this, ' Analysis and Linear Algebra')"> Analysis and Linear Algebra</button>
                        </div>
                        <div>
                            <button id="item1" class="btn" onclick="filterBySpecialization(this, ' Combinatorics and Theoretical Computer Science')"> Combinatorics and Theoretical <br>Computer Science</button>
                        </div>
                        <div>
                            <button id="item1" class="btn" onclick="filterBySpecialization(this, 'Differential Equations and Applied Mathematics')">Differential Equations and <br>Applied Mathematics</button>
                        </div>
                        <div>
                            <button id="item1" class="btn" onclick="filterBySpecialization(this, 'Geometry and Topology')">Geometry and Topology</button>
                        </div>
                        <div>
                            <button id="item1" class="btn" onclick="filterBySpecialization(this, ' Probability and Statistics')">Probability and Statistics</button>
                        </div>
                        <div>
                            <button id="item1" class="btn" onclick="filterBySpecialization(this, 'all')">All Faculty</button>
                        </div>
                    </div>

                </div>

                <div class="col-md-8 fac-cards" style="padding: 22px 0;">
                    <div class="row prof-img-row">
                        <?php
                        $eewebconn = new Database();
                        $specialization = isset($_GET['specialization']) ? $_GET['specialization'] : 'all';

                        if ($specialization == 'all') {
                            $myfacq = "SELECT * FROM facultynew WHERE added_by='akdhanhsr' ORDER BY fname";
                        } else {
                            $myfacq = "SELECT * FROM facultynew WHERE added_by='akdhanhsr' AND FIND_IN_SET('$specialization', specialization) > 0 ORDER BY fname";
                        }

                        $result = $eewebconn->query($myfacq);
                        $myfacr = $eewebconn->resultSet();
                        foreach ($myfacr as $facr) {
                            $facSpecializations = explode(",", $facr->specialization);
                        ?>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 fac-card" style="padding: 25px;" data-specializations="<?php echo implode(',', $facSpecializations); ?>">
                                <div class="card-container">
                                    <div class="lecturers1-item-wrapper imgHt1">
                                        <div class="lecturers-img-wrapper">
                                            <a href="#"><img class="img-responsive imgHt" src="http://localhost/maths-new/img/outerfaculty/<?php echo $facr->img; ?>" alt="team" style="width: 335px; height: 340px;"></a>
                                        </div>
                                        <div class="lecturers-content-wrapper" style="text-align: center;">
                                            <a href="innerfaculty.php?fname=<?php echo $facr->fname; ?>" style="color: #000;">
                                                <h3 class="item-title"><?php echo $facr->dr; ?> <?php echo $facr->fname; ?></h3>
                                            </a>
                                            <span class="prof"><?php echo $facr->fdesig; ?></span>
                                            <p class="fac-no"><?php echo $facr->mail; ?><br><?php echo $facr->phone; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>


                <script>
                    function filterBySpecialization(button, specialization) {
                        var facultyCards = document.getElementsByClassName("fac-card");
                        var buttons = document.getElementsByClassName("btn");

                        // Remove the active class from all buttons and reset styles
                        for (var i = 0; i < buttons.length; i++) {
                            buttons[i].classList.remove("active");
                            buttons[i].style.backgroundColor = "#a00e09";
                            buttons[i].style.color = "#fff";
                        }

                        // Add the active class to the clicked button and update styles
                        for (var i = 0; i < buttons.length; i++) {
                            button.classList.add("active");
                            button.style.backgroundColor = "#fff";
                            button.style.color = "#000";
                        }

                        if (specialization === 'all') {
                            // Display all faculty cards
                            for (var i = 0; i < facultyCards.length; i++) {
                                facultyCards[i].style.display = "block";
                            }
                        } else {
                            // Filter and display faculty cards based on specialization
                            for (var i = 0; i < facultyCards.length; i++) {
                                var facultySpecializations = facultyCards[i].getAttribute("data-specializations").split(",");
                                if (facultySpecializations.includes(specialization)) {
                                    facultyCards[i].style.display = "block";
                                } else {
                                    facultyCards[i].style.display = "none";
                                }
                            }
                        }
                    }
                </script>



            </div>



        </div>
    </div>


    <!-- Lecturers Page 1 Area End Here -->

    <!-- footer -->

    <?php include('mathfooter.php'); ?>




    <script src="http://localhost/maths-new/js2/jquery.min.js"></script>
    <script src="http://localhost/maths-new/js2/popper.js"></script>
    <script src="http://localhost/maths-new/js2/bootstrap.min.js"></script>
    <script src="http://localhost/maths-new/js2/jquery.sticky.js"></script>
    <script src="http://localhost/maths-new/js2/jquery.touch-swipe.min.js"></script>
    <script src="http://localhost/maths-new/js2/main.js"></script>


    <style>
        .lecturers1-item-wrapper {
            text-align: center;
        }

        .lecturers-img-wrapper {
            overflow: hidden;
            margin-bottom: 20px;
        }

        .wrapperr img {
            height: 150px;
        }

        .lecturers-img-wrapper img {
            width: 100%;
            margin: auto;

        }

        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');


        .icons_container {
            display: inline-flex
        }

        .icons_container .icon {
            margin: 0 3px;
            text-align: center;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            position: relative;
            z-index: 2;
            transition: 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55)
        }

        .icons_container .icon span {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 16px;
            height: 40px;
            width: 40px;
            background: #fdd333;
            border-radius: 50%;
            position: relative;
            z-index: 2;
            box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.1);
            transition: 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55)
        }

        .icons_container .icon .tooltip {
            position: absolute;
            top: 0;
            z-index: 1;
            background: #fff;
            color: #fff;
            padding: 10px 18px;
            font-size: 16px;
            font-weight: 500;
            border-radius: 10px;
            opacity: 0;
            pointer-events: none;
            box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.1);
            transition: 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55)
        }

        .icons_container .icon:hover .tooltip {
            top: -60px;
            opacity: 1;
            pointer-events: auto;
        }

        .icon .tooltip:before {
            position: absolute;
            content: "";
            height: 15px;
            width: 15px;
            background: #fff;
            left: 50%;
            bottom: -6px;
            transform: translateX(-50%) rotate(45deg);
            transition: 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55)
        }

        .icons_container .icon:hover span {
            color: #fff;
        }

        .icons_container .icon:hover span,
        .icons_container .icon:hover .tooltip {
            text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.4)
        }

        .icons_container .facebook:hover span,
        .icons_container .facebook:hover .tooltip,
        .icons_container .facebook:hover .tooltip:before {
            background: #fdd333
        }

        .icons_container .twitter:hover span,
        .icons_container .twitter:hover .tooltip,
        .icons_container .twitter:hover .tooltip:before {
            background: #fdd333
        }

        .icons_container .instagram:hover span,
        .icons_container .instagram:hover .tooltip,
        .icons_container .instagram:hover .tooltip:before {
            background: #fdd333
        }

        .icons_container .github:hover span,
        .icons_container .github:hover .tooltip,
        .icons_container .github:hover .tooltip:before {
            background: #fdd333
        }

        .icons_container .youtube:hover span,
        .icons_container .youtube:hover .tooltip,
        .icons_container .youtube:hover .tooltip:before {
            background: #fdd333
        }

        .active {
            /* background-color: green; */
            color: black;
        }



        /* facultymainpage page */

        #container-card {
            text-align: center;
            /* margin: 0px 60px 0px 60px; */
            margin-left: auto;
            margin-right: auto;
            padding: 18px 0;
            color: #fff;
            /* border-bottom: #000; */
            width: 80%;

        }

        .item {
            width: 90%;
            background-color: #A00E09;
            padding: 10px 0;
            border-bottom: #fff 1px solid;
            margin-left: 23px;
            height: 80px;


        }

        /* .item:hover {
            background-color: #fff;
            color: #000;
            box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
        }

        .item:hover a {
            color: #000;
        }

        .item,
        .btn:hover {
            color: #000 !important;
            transition: .8s;
        }

        .item a {
            display: inline-block;
            text-decoration: none;
            color: #000;
            font-size: 20px;
            width: 100%;
            height: 100%;
        } */

        /* .item a:hover {
            color: #000;
        } */

        .faculty-cards {
            transition: 0.3s;
            width: 100%;
            border-radius: 0px !important;
        }

        .prof-img-row {
            padding: 22px 0;
        }

        .name {
            padding: 10px;
            text-align: center;

        }

        .name .faculty_name {
            font-size: 20px;
            margin-bottom: 0 !important;
            color: #000;
        }

        .prof {
            font-size: 18px;
            color: #646464;
            text-align: center;
        }

        .fac-no {
            font-family: Lato;
            font-size: 18px;
            color: #a00;
            padding-top: 10px;

        }

        .container {
            padding: 2px 16px;
        }

        .faculty-cards img {
            width: 100%;
            border-radius: none;
        }

        #item1 .btn:focus {
            box-shadow: none !important;
            --bs-btn-border-radius: 0;
        }

        /* filter */
        .faculty-cards {
            text-align: center;
            display: none;
            float: left;
            width: 28% !important;

        }

        .show {
            display: block;
        }

        .prof-img-row:after {
            content: "";
            display: table;
            clear: both;
        }

        .prof-img-row,
        .prof-img-row>.faculty-cards {
            padding: 20px;

        }

        /* .card-container {
            box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
            /* padding-bottom: 50px; */



        .card-container a {
            text-decoration: none;
        }



        .item-title {
            font-family: Lato;
            color: #000;
            font-size: 22px;
            font-weight: 5px;
            padding-top: 25px;
        }

        #item1:hover {
            background-color: #fff;
            color: #000;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
            --bs-btn-border-radius: 0;
        }

        #item1 {
            background-color: #a00e09;
            color: #fff;
            transition: .8s;
            width: 90%;
            margin-left: 23px;
            border-bottom: #fff 1px solid;
            --bs-btn-border-radius: 0;
        }

        .btn {
            background-color: #a00e09;
            font-family: Lato;
            color: #fff;
            font-size: 16px;
            font-weight: 5px;
            /* padding-top: 25px; */
            transition: .8s;
            width: 90%;
            justify-content: center;
            margin-left: 23px;
            border-bottom: #fff 1px solid;
            --bs-btn-border-radius: 0;
            height: 5.8rem;
        }

        /* .btn:hover{
    background-color: #fff;
            color: #000;
            --bs-btn-border-radius: 0;
} */

        .btn.active {
            background-color: rgb(255, 255, 255);
            color: #000;
            /* color: rgba(0, 0, 0, 0); */
            box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
            border-color: #fff;
        }

        /* mobile responsive */
        @media only screen and (max-width: 900px) {
            body {
                overflow-x: hidden;
            }

            .navbar-con {
                border-top: none !important;
            }

            .third-dropdown {
                top: 0;
                left: 0;
                position: relative;
                background-color: #000 !important;
                margin: 0;
            }

            .dropdown-item-third {
                background-color: #000;
                color: #fff;
                text-align: left;
                font-size: 12px;
                padding: 0.25rem 1rem;
            }

            .third-dropdown-parent:focus {
                color: #fff;
            }

            .dept-name {
                text-align: center;
            }

            .iitm-logo {
                text-align: center;
            }

            .site_logo {
                width: 30%;
            }

            .navbar-brand {
                font-size: 17px !important;
            }

            .navbar-brand span {
                font-size: 12px;
            }

            .faculty-member {
                text-align: center;
            }

            .box {
                text-align: left;
                margin-left: auto;
                margin-right: auto;
            }

            .name {
                font-size: 18px;
            }

            .designation {
                font-size: 16px;
            }

            .name_designation {
                padding: 15px 0px 5px 0px;
                text-align: center;
            }

            .education p {
                font-size: 15px;
            }

            .accordion-body li {
                font-size: 15px;
            }

            .accordion-header span {
                font-size: 18px;
            }

            .footer-first {
                display: none;
            }

            .iitm-footer-logo {
                width: 100%;
                text-align: center;
                padding: 8px 0;
            }

            .footer-bottom-left h6,
            .footer-bottom-right h6 {
                font-size: 15px;
                text-align: center;
            }

            .copyrights h6 {
                font-size: 13px;
                text-align: center;
                padding: 10px;
            }

            /* faculty - outer page */
            .container-card {
                margin-left: auto;
                margin-right: auto;
                align-items: center !important;
            }

            .faculty-cards {
                width: 100% !important;
            }

            .events-list {
                flex-wrap: wrap;
                padding: 10px;
            }

            /* .button-box {
                flex-direction: column;
                text-align: center;
                gap: 15px;
                padding-bottom: 10px;
            } */

            .wrapper {
                width: 100%;
                padding: 10px 0;
            }



            .hod-content {
                padding-bottom: 20px;
            }

            .hod-image img {
                width: 100%;
                text-align: center;
            }

            .research-col {
                padding: 10px 0;
                text-align: center;
            }

            .faculty-Achievement-image img {
                width: 100%;
                margin-top: 50%;
            }

            .counter .counter-value {
                font-size: 35px;
            }

            .counter-hdng {
                font-size: 22px;
            }

            .home-counters {
                width: 100% !important;
            }

            .centered,
            .centered-text {
                font-size: 18px;
            }

            .faculty-Achievement-details h3 {
                font-size: 14px;
            }

            .on-hover {
                padding: 15px 0;
            }

            .latest-news {
                top: 8%;
                left: 30% !important;
                width: 50%;
                max-height: 185px;
            }

            .side-card .card-title {
                font-size: 13px;
            }

            .side-card {
                min-height: 185px;
            }

            .side-card .ne-scroll {
                height: 85px;
            }

            .side-card .ne-box .ne-img img {
                width: 30px;
                height: 30px;
            }

            .side-card .ne-box .ne-item .ne-desc a {
                font-size: 12px;
            }

            #video-viewport {
                height: 30vh;
            }

            .carousel-item video {
                width: 100%;
                /* height: 200px; */
            }

            video {
                height: auto;
                transform: scale(2.5);
                transform-origin: center;
            }

            .dep-btn {
                font-size: 12px;
            }

            /* carousel */
            .carousel-inner {
                height: 50vh;
            }



        }

        @media only screen and (min-width: 2048px) {
            .carousel-item video {
                width: 100%;
                height: 75vh;
            }

        }

        @media only screen and (max-width: 1200px) {
            .latest-news {
                left: 65%;
            }
        }
    </style>


</body>