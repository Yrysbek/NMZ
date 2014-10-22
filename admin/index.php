<?php
//echo $_SESSION['admin']; return;
session_start();
if(isset($_SESSION['admin']) && $_SESSION['admin'] == true){
    if(isset($_GET['exit']) && $_GET['exit'] == 'true'){
        unset($_SESSION['admin']);
        showLoginForm();
    } else {
        echo 'You authorized as ADMIN<br><a href="?exit=true">Click for exit</a>';
    }
} else {
    if(isset($_POST['login']) && isset($_POST['password'])){
        include '../model/config.php';
        if($_POST['login'] == ADMINLOGIN && $_POST['password'] == ADMINPASS){
            $_SESSION['admin'] = true;
            echo '<span style="color:green;">You already authorized!</span>';
            echo '<br><a href="../">Go to main page</a>';
        } else {
            echo '<span style="color:red;">Sorry! Incorrect login or password!</span>';
            showLoginForm();
        }
    } else {
        showLoginForm();
    }
}
function showLoginForm(){
?><div>
    <form method="post">
    Login: <input type="text" name="login" /><br>
    Password: <input type="password" name="password" /><br>
    <input type="submit" value="OK" />
    </form>
</div>
<?php 
}
?>