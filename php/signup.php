<?php
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $sname = mysqli_real_escape_string($conn, $_POST['sname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($fname) && !empty($sname) && !empty($email) && !empty($password)){
        //check email is valid or not
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){ //if email is valid
            //check email already exist in database
            $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}' ");
            if(mysqli_num_rows($sql) > 0){ //if email already exist
                echo "$email - This email already exist!";
            }else{
                //file uploaded or not
                if(isset($_FILES['image'])){ //if file uploaded
                    $img_name = $_FILES['image']['name']; //getting user uploaded img name
                    $img_type = $_FILES['image']['type']; //getting user upload img type
                    $tmp_name = $_FILES['image']['tmp_name']; //this is temporary name used to save file in out folder
                    
                    //explode img and get last ext
                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode);//get the ext

                    $extensions = ['png', 'jpeg', 'jpg'];//valid types
                    if(in_array($img_ext, $extensions) === true){//ext is matched
                        $time = time();//current time
                        
                        $new_img_name = $time.$img_name; 

                        if(move_uploaded_file($tmp_name, "images/".$new_img_name)){ //if user upload img to our fldr
                            $status = "Active now";//status for user
                            $random_id = rand(time(), 10000000); //creating randoom id for user

                            //insert user data in table
                            $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, sname, email, password, img, status)
                                                VALUES({$random_id}, '{$fname}', '{$sname}', '{$email}','{$password}', '{$new_img_name}', '{$status}')");
                            if($sql2){//if data insert
                                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
                                if(mysqli_num_rows($sql3) > 0){
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id']; //using this session we used user unique id in other php file
                                    echo "succes";
                                }
                            }else{
                                echo "Something went wrong.";
                            }
                        }

                    }else{
                        echo "Please select an Image file - jpeg, jpg, png!";
                    }
                
                }else{
                    echo "Please select an image file!";
                }
            }
        }else{
            echo "$email - This is not a valid email!";
        }

    }else{
        echo "All input field are required!";
    }
?>