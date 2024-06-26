<?php
// Disable error reporting
error_reporting(0);
ini_set('display_errors', 0);

include_once ('includes/connect.php');
include_once ('functions/common_functions.php');
@session_start();
if (!isset($_SESSION['username'])) {
    include ('login_register/login.php');
} else {
    include ('login_register/cash.php');
}
?>
<link rel="stylesheet" href="../login.css">
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: cursive;
        scroll-behavior: smooth;
    }

    body {
        background-color: gray;
    }

    .container {
        background: url(../images/background.jpg);
        background-size: cover;
        height: 120vh;
        opacity: 0.7;
        color: silver;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 120px;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    /* Show the dropdown content when hovering over the profile section */
    .profile:hover .dropdown-content {
        display: block;
    }

    /* Style the links inside the dropdown */
    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    /* Change the background color of links on hover */
    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    .head {
        display: flex;
    }


    .top {
        display: flex;
        width: 100%;
        justify-content: space-between;
        align-items: center;
    }

    .logo {
        margin: 30px 0 0 50px;
    }

    .logo img {
        height: 70px;
    }



    .profile {
        background: linear-gradient(to left, rgb(246, 32, 8), rgb(32, 32, 31));
        border-radius: 30px;
        padding: 0.8rem 1.4rem;
        text-transform: capitalize;
        word-spacing: 0.2rem;
        margin-bottom: 5px;
        margin-right: 3rem;
        cursor: pointer;
        transition: transform .5s;
    }

    .profile i {
        display: none;
    }


    .profile:hover i {
        display: inline-block;
        padding-right: 5px;
    }


    .profile:hover {
        transform: scale(1.1);
    }


    .nav {
        text-transform: uppercase;
        position: absolute;
        left: 40%;
        top: 5%;
        transform: translateX(-30%);
        display: flex;
        justify-content: space-between;
        z-index: 1;
        opacity: 70%;
    }


    .nav ul {
        display: flex;
        list-style: none;
    }


    .nav ul li {
        cursor: pointer;
        padding: .5rem 2.5rem;
        font-weight: 900;
        text-align: center;
    }

    .nav ul a {
        text-decoration: none;
        color: snow;
    }


    .nav ul li:hover {
        border-radius: 60px;
        background: linear-gradient(to left, rgb(32, 32, 31), rgb(246, 32, 8), rgb(32, 32, 31));
    }


    .quote {
        width: 75%;
        margin-top: 5rem;
        margin-left: 9rem;
    }

    .quote p {
        padding-top: 10px;
    }

    .login_box {
        height: 350px;
        width: 400px;
        background-color: rgb(88, 88, 88);
        margin-top: 3rem;
        margin-left: 6rem;
        margin-bottom: 4rem;
        border-radius: 30px;
        text-align: center;
        border-radius: 20px;
        box-shadow: 0 0 8vh 0 rgba(139, 16, 2, 1);
    }

    .login_box {
        padding: 2vh;
    }

    .login_box input {
        border-radius: 50px;
        margin-top: 1vh;
        padding: 2vh;
        font-size: 10px;
        width: 45vh;
        height: 4vh;
        border-width: 1px;
        border-color: rgb(0, 0, 0);
        background-color: rgb(88, 88, 88);
        border-style: solid;
        font-size: 15px;
    }

    ::placeholder {
        color: snow;
    }

    .login {
        background-color: rgb(88, 88, 88);
        border-color: rgb(7, 7, 7);
        padding: 1.7vh;
        margin-top: 2vh;
        width: 25vh;
        border-radius: 50px;
        border-width: 1px;
        border-style: solid;
        font-weight: bold;
        font-size: 15px;
        color: whitesmoke;
    }

    .login_box p {
        padding: 2vh 0 2vh 0;
        font-size: 13px;
    }

    .login_box p a {
        text-decoration: none;
        color: snow;
    }

    .creat {
        padding: 0.1rem 1rem;
        background-color: rgb(88, 88, 88);
        border-radius: 50px;
        border-style: solid;
        border-width: 1px;
        border-color: rgb(7, 7, 7);
        height: 7vh;
        font-weight: bold;
        font-size: 15px;
        color: whitesmoke;

    }

    .login_box p a:hover {
        color: rgb(0, 0, 0);
    }

    button {
        cursor: pointer;
    }

    .login_box input:hover {
        border: 1px solid rgb(243, 33, 33);
    }

    .login_box input:focus {
        border: 3px solid rgb(124, 3, 3);
        outline: none;
    }

    .creat:hover,
    .login:hover {
        border: 1px solid rgb(243, 33, 33);
        font-size: 15px;
        font-weight: 900;
    }

    .guest {
        padding: 0.1rem 1rem;
        background-color: rgb(88, 88, 88);
        border-style: none;
        font-size: 15px;
        margin-top: 20px;
        transition: transform 0.5s;
    }

    .guest i {
        display: none;
    }

    .guest:hover i {
        display: inline-block;
        padding-right: 5px;
    }

    .guest:hover {
        transform: scale(1.2);
    }

    .footer {
        background: linear-gradient(to left, rgb(32, 32, 31), rgb(246, 93, 76), rgb(32, 32, 31));
        width: 100%;
        /* bottom: 0; */
        color: aliceblue;
        border-top-left-radius: 40px;
        font-size: 13px;
        line-height: 20px;
        padding: 100px 0 30px;
    }

    .row {
        width: 85%;
        margin: auto;
        display: flex;
        flex-wrap: wrap;
        align-items: flex-start;
        justify-content: space-between;
    }

    .col {
        flex-basis: 25%;
        padding: 10px;
    }

    .col:nth-child(2),
    .col:nth-child(2),
    .col:nth-child(3) {
        flex-basis: 15%;
    }

    .foot_logo {
        width: 200px;
        margin-bottom: 30px;
    }

    .col h3 {
        width: fit-content;
        margin-bottom: 40px;
        position: relative;
    }

    .email_id {
        width: fit-content;
        border-bottom: 1px solid snow;
        margin: 20px 0;
    }

    .col ul li {
        list-style: none;
        margin-bottom: 12px;
    }

    .col ul li a {
        text-decoration: none;
        color: snow;
    }

    .col form {
        padding-bottom: 15px;
        display: flex;
        align-items: center;
        justify-content: space-around;
        border-bottom: 1px solid snow;
        margin-bottom: 50px;
    }

    .col form .fa-regular {
        font-size: 18px;
        margin-right: 10px;
    }

    .col form input {
        width: 100%;
        background: transparent;
        color: snow;
        border: 0;
        outline: none;
    }

    .col form button {
        background: transparent;
        border: 0;
        outline: none;
        cursor: pointer;
    }

    .col form .fa-solid {
        font-size: 16px;
        color: snow;
    }

    .social_icons .fa-brands {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        text-align: center;
        line-height: 40px;
        font-size: 20px;
        color: black;
        background: snow;
        margin-right: 15px;
    }

    .footer hr {
        width: 98%;
        border-bottom: 1 px solid snow;
        margin: 20px auto;
    }

    .copyright {
        text-align: center;
    }

    .underline {
        width: 100%;
        height: 5px;
        background: gray;
        border-radius: 3px;
        position: absolute;
        top: 25px;
        left: 0;
        overflow: hidden;
    }

    .underline span {
        width: 15px;
        height: 100%;
        background: snow;
        border-radius: 3px;
        position: absolute;
        top: 0;
        left: 10px;
        animation: moving 2s linear infinite;
    }

    @keyframes moving {
        0% {
            left: -20px;
        }

        100% {
            left: 100%;
        }
    }

    @media (max-width: 800px) {

        .col {
            flex-basis: 100%;
        }

        .col:nth-child(2),
        .col:nth-child(2),
        .col:nth-child(3) {
            flex-basis: 100%;
        }

        .footer {
            bottom: 0;
        }
    }
</style>