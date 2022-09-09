<?php
include_once ("../header_doctor.php");
?>
    <main class="main bg-white" id="main">
        <div class="row">
            <div class="col-md-12">
                <h4>SEARCH RESULTS</h4>
                <div class="alert alert-info">Search results for <b><?=$_GET['query']?></b></div>
                <h4>Results in users</h4>
                <?php
                $query = $_GET['query'];
                $user = $_SESSION['user_Id'];
                $role = $_SESSION['role'];
                $users = mysqli_query($conn, "select * from user where name like '%$query%' order by name asc") or die(mysqli_error($conn));
                $cases = mysqli_query($conn, "select disease_case, animal_disease_cases.date_added, animal_disease_cases.location,animal_disease_cases.date_added, (select animal from animals where id = animal_disease_cases.animal) as animal, (select name from user where user_Id = animal_disease_cases.user) as farmer from animal_disease_cases where disease_case like '%$query%' order by date_added") or die(mysqli_error($conn));
                if ($_SESSION['role'] != 1)
                    if ($_SESSION['role'] == 2)
                        $messages = mysqli_query($conn, "select message, name, date_added from messages left join user on user.user_Id = messages.receiver where message like '%$query%' and (receiver = '$user' or sender = '$user') order by date_added") or die(mysqli_error($conn));
                    else
                        $messages = mysqli_query($conn, "select message, name, date_added from messages left join user on user.user_Id = messages.sender  where message like '%$query%' and (receiver = '$user' or sender = '$user') order by date_added") or die(mysqli_error($conn));

                ?>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Names</th>
                        <Th>Address</Th>
                        <th>Role</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    while ($row = mysqli_fetch_array($users)) {
                        if ($role =! 1 and $row['user_type'] == 'admin')
                            continue;
                        if ($role == 2 and $row['user_type'] == 'farmer')
                            continue;
                        if ($role == 3 and $row['user_type'] == 'farmer')
                            continue;
                        ?>
                        <tr>
                            <td><?=$i++?></td>
                            <td><?=$row['name']?></td>
                            <td><?=$row['address']?></td>
                            <td><?=$row['user_type']?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
                <h4>From diseases</h4>
                <table id="example" class="table table-striped table-bordered">
                    <thead class="table-dark">
                    <tr>
                        <th></th>
                        <th>From Farmer</th>
                        <th>Location</th>
                        <th>Animal Type</th>
                        <th>Case outbreak</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    while ($row = mysqli_fetch_array($cases)) {
                        ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$row['farmer']?></td>
                            <td><?=$row['location']?></td>
                            <td><?=$row['animal']?></td>
                            <td><?=$row['disease_case']?></td>
                            <td><?=$row['date_added']?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
                <?php if ($role > 1) {
                    ?>
                    <table class="table shadow table-striped">
                        <thead>
                        <tr>
                            <Th></Th>
                            <th><?=$role == 2  ? 'Receipt' : 'Sender'?></th>
                            <th>Message</th>
                            <th>Date sent</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no =1;
                        while ($rows = mysqli_fetch_array($messages)) {
                            ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$rows['name']?></td>
                                <td><?=$rows['message']?></td>
                                <td><?=$rows['date_added']?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                    <?php
                }
                ?>
            </div>
        </div>
    </main>
<?php
