<!DOCTYPE html>
<head>
    <title>Student Data</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="formstyle.css">
    <script>
        jQuery(document).ready(function ($) {
        tab = $('.tabs h3 a');
        tab.on('click', function (event) {
        event.preventDefault();
        tab.removeClass('active');
        $(this).addClass('active');
        tab_content = $(this).attr('href');
        $('div[id$="tab-content"]').removeClass('active');
        $(tab_content).addClass('active');
        });});
    </script>
</head>
<body>
    <div class="container">
        <div class="tabs">
            <h3 class="data-tab"><a class="active" href="#data-tab-content">Data Entry</a></h3>
            <h3 class="get-tab"><a href="#get-tab-content">Data Query</a></h3>
        </div>

        <div class="tabs-content">
            <div id="data-tab-content" class="active">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input type="text" class="input" id="name" name="name" autocomplete="off" placeholder="Enter your Name" required>
                    <input type="email" class="input" id="email" name="email" autocomplete="off" placeholder="Enter your Email ID" required>
                    <input type="number" class="input" id="no" name="roll" autocomplete="off" placeholder="Enter your Roll No." required>
                    <input type="hidden" name="timestamp" value="">
                    <input type="submit" class="button" value="Submit">
                </form>
            </div>

            <div id="get-tab-content">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
                    <input type="number" class="input" id="no" name="getroll" autocomplete="off" placeholder="Enter your Roll No." required>
                    <input type="submit" class="button" value="Submit">
                </form>
            </div>
        </div>
    </div>
</body>

</html>