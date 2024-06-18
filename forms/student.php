<?php include '../class.php' ?>

<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Student Reg</title>
</head>
<body>
<section class="py-5">
    <div class="container">
        <form method="post" action="../action.php">
            <input type="hidden" name="action" value="add_student" id="action">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                </div>
                <div class="form-group col-md-6">
                    <label for="family">Family</label>
                    <input type="text" name="family" class="form-control" id="family" placeholder="Family">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">National Code</label>
                    <input type="text"  name="code" class="form-control" id="code" placeholder="National Code">
                </div>
                <div class="form-group col-md-6">
                    <label for="family">Address</label>
                    <input type="text" name="address" class="form-control" id="address" placeholder="Address">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</section>
<section class="py-5">
    <div class="container">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
            <tr>
                <th class="text-center">Name</th>
                <th class="text-center">Family</th>
                <th class="text-center">National Code</th>
                <th class="text-center">Address</th>


            </tr>
            </thead>
            <tbody style="text-align: center">


            <?php
            $s= new student();

            $students = $s->get_all();
            foreach ($students as $student) {
                ?>
                <tr>

                    <td><?php echo $student['name']; ?></td>
                    <td><?php echo $student['family']; ?></td>
                    <td><?php echo $student['code']; ?></td>
                    <td><?php echo $student['address']; ?></td>

                </tr>
            <?php } ?>


            </tbody>
            <tfoot>
            <tr>
                <th class="text-center">Name</th>
                <th class="text-center">Family</th>
                <th class="text-center">National Code</th>
                <th class="text-center">Address</th>
            </tr>
            </tfoot>
        </table>
    </div>
</section>



<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>

<script>


    var table = new DataTable('#example', {
        // language: {
        //     url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/fa.json',
        // },
        order: [[2, 'desc']]
    })
</script>
</body>
</html>