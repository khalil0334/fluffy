<?php
/**
 * Created by PhpStorm.
 * User: Shah
 * Date: 03-Mar-16
 * Time: 12:42 PM
 */
require_once '../config/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Campaign</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo bower_components; ?>bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo bower_components; ?>metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo dist; ?>css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo bower_components; ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- jQuery -->
    <script src="<?php echo bower_components; ?>jquery/dist/jquery.min.js"></script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <?php require_once nav; ?>


    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Campigns</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Adding new campaign
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form role="form" method='post' action='' id="addCampaignForm">
                                    <div class="form-group">
                                        <label for="title">Title:</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                               placeholder="Enter campign title" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="isActive">Is active?:</label>
                                        <select class="form-control" id="isActive" name="isActive" required>
                                            <option value="">Is campaign active?</option>
                                            <option value='1'>Yes</option>
                                            <option value='0'>No</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="isNoPackgae">Is no package?:</label>
                                        <select class="form-control" id="isNoPackgae" name="isNoPackage" required>
                                            <option value="">Is no package?</option>
                                            <option value='0'>Yes</option>
                                            <option value='1'>NO</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" id="addCampaign" name="AddCampign"
                                               value="Add Campaign">
                                        <input type="reset" class="btn btn-primary" value="Reset">
                                    </div>
                                </form>
                            </div>
                            <!-- /.col-lg-12 (nested) -->
                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

</div>

<!-- /#wrapper -->


<!-- Bootstrap Core JavaScript -->
<script src="<?php echo bower_components; ?>bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo bower_components; ?>metisMenu/dist/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo dist; ?>js/sb-admin-2.js"></script>

<!-- Javascript notification library -->
<script src="<?php echo assets; ?>js/notify.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $("form").submit(function (e) {
            e.preventDefault();
            $.notify("Wait! Your request is in progress.", "success");
            var url = '<?php echo processing . 'process.php'; ?>',
                formData = $("form").serialize() + "&dataType=addCampaign";
            $.ajax({
                url: url,
                method: "POST",
                data: formData,
                dataType: "json",
                success: function (data) {
                    if (data.status) {
                        $.notify(data.msg, "success");
                        setTimeout(function () {
                            window.location.href = "<?php echo campaigns; ?>";
                        }, 1000);
                    } else {
                        console.info("[Login][Error] : " + JSON.stringify(data.msg));
                        $.notify(data.msg, "error");
                    }
                }, error: function (data) {
                    console.info("[Login][Error] : " + JSON.stringify(data));
                    $.notify("You request has failed!", "error");
                }
            });
        });
    });
</script>

</body>

</html>


