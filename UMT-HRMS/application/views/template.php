<!DOCTYPE html>
<html lang="en">
    <?php
    $this->load->view('header');
    ?>

    <body>

        <!-- Main navbar -->
        <?php
        $this->load->view('main_nav_bar');
        ?>
        <!-- /main navbar -->


        <!-- Page container -->
        <div class="page-container">

            <!-- Page content -->
            <div class="page-content">

                <!-- Main sidebar -->
                <?php
                $this->load->view('side_bar');
                ?>
                <!-- /main sidebar -->


                <!-- Main content -->

                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- Form horizontal -->
                    <?php echo $contents; ?>
                    <!-- /form horizontal -->


                    <!-- Footer -->
                    <?php $this->load->view('footer'); ?>
                    <!-- /footer -->

                </div>
                <!-- /content area -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

        <!-- /page container -->

    </body>
</html>
