<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title> Website add by sams</title>
    <style>
        input{
            width: 550px;
            height:35px;
            border:1px solid green;
            border-radius:5px;
        }
       #addbtn{
            width: 100px;
            height:35px;
            border:1px solid green;
            border-radius:5px;
            background-color:white;
            color:green;
            font-size=20px;


        }
        #cancelbtn{
            width: 100px;
            height:35px;
            border:1px solid red;
            border-radius:5px;
            background-color:white;
            color:red;
            font-size=20px;
        }
        #cancelbtn:hover{
            background-color:red;
            color:white;

            
        }
        #addbtn:hover{
        background-color:green;
        color:white;

        }
        #desc{
            width:550px;
            height:100px;
            border:1px solid greeen;
            border-radius:5PX;
        }

    </style
    >

</head>

<body>
<font size="7"><b><p align="center">Add a website</p><b></font> 

    <form action="" method="POST" enctype="multipart/form-data">
        <table border="0" width="50%" align="center" cellspacing="10">
            <tr>
                <td> Website Title</td>
                <td><input type="text" name="WebsiteTitle"></td>
            </tr>
            <tr>
                <td> Website link </td>
                <td><input type="text" name="Websitelink"></td>
            </tr>
            <tr>
                <td> Website keywords</td>
                <td><input type="text" name="Websitekeywords"></td>
            </tr>
            <tr>
                <td> Website Description</td>
                <td><textarea name="Websitedescription" id="desc"></textarea> </td>
            </tr>
            <tr>
                <td> Website Image </td>
                <td><input type="file" name="uploadfile"></td>
            </tr>
            <tr>
               
                <td colspan="2" align="center"><input type="submit" name="addwebsite" id="addbtn">
                &nbsp &nbsp
                <input type="reset" name="reset" id="cancelbtn"></td>
            </tr>
            


        </table>
    </form>
</body>

</html>
<?php
include("connection.php");
if($_POST["addwebsite"])
{
    $website_title=$_POST['WebsiteTitle'];
    $website_link=$_POST['Websitelink'];

    $website_keyword=$_POST['Websitekeywords'];
    $website_title=$_POST['WebsiteTitle'];
    $website_description=$_POST['Websitedescription'];

    $filename=basename($_FILES["uploadfile"]["name"]);
    $tempname=$_FILES["uploadfile"]["tmp_name"];

    $folder="Website_image/".$filename;
    move_uploaded_file($tempname,$folder);

    $ff=htmlspecialchars($filename);

    if($website_title!=""&& $website_link!=""&& $website_keyword!=""&& $website_description!=""&& $filename!="")
    {   
        //echo "".$folder;                
        $query="INSERT INTO add_website values('$website_title',' $website_link','$website_keyword','$website_description','$ff')";

        $data = mysqli_query($conn,$query);
         if($data)
         {
            echo"<script>alert('website insert')</script>";
        }
        else{
            echo"<script>alert('failed')</script>";  
        }
        echo"<script>alert('failed')</script>"; 
    } 
    

}
?>