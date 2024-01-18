<? php 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>

    <!-- Custom Css -->
    <link rel="stylesheet"  href="<?php  echo base_url('assets/css/profile.css');?>">

    <!-- FontAwesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
</head>
<body>
    <!-- Navbar top -->
    <div class="navbar-top">
        <div class="title">
            <h1>Profile</h1>
        </div>

        <!-- Navbar -->
        <ul>
           
            <li>
                <a href="<?php echo base_url('/logout');?>">
                    <i class="fa fa-sign-out-alt fa-2x"></i>
                </a>
            </li>
        </ul>
        <!-- End -->
    </div>
    <!-- End -->

    <!-- Sidenav -->
    <div class="sidenav">
        <div class="profile">
      <?php  $imgurl = base_url('uploads/').$data['profilePic']; ?>
            <img src="<?php echo $imgurl;?>" alt="" width="100" height="100">

            <div class="name">
                <?php echo $data['firstName']; ?>
            </div>
            <div class="job">
               <?php echo $data['lastName']; ?>
            </div>
        </div>

        <div class="sidenav-url">
            <div class="url">
                <a href="#profile" class="active">Profile</a>
                <hr align="center">
            </div>
            
        </div>
    </div>
    <!-- End -->

    <!-- Main -->
    <div class="main">
        <h2>IDENTITY</h2>
        <div class="card">
            <div class="card-body">
                <i class="fa fa-pen fa-xs edit"></i>
                <table>
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td><?php echo $data['firstName']; ?></td>
                        </tr>
                         <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td><?php echo $data['lastName']; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?php echo $data['email']; ?></td>
                        </tr>
                        <tr>
                            <td>DOB</td>
                            <td>:</td>
                            <td><?php echo $data['dob']; ?></td>
                        </tr>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- End -->
</body>
</html>
?>