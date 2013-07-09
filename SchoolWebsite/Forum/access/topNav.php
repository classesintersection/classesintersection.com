<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>

            <style type="text/css">


            p
            {
               margin-left:auto;
               margin-right:auto;
               width: 50%
            }


            ul {
                list-style-type:none;

                padding:0;
                }

            li
                {

                margin: 0;
                display: inline;
                background: black;

                }

            a {

                position:fixed;
                top:30px;
                right:50%;
/*              margin-left: auto;
                margin-right: auto;*/
                display:inline;
                font-family: Lucida Console;
                font-style: normal;
                 }


            a:link {

                color:black;
                font-family: Lucida Console;
                text-decoration:none;
                background-color:white;
            }
            a:visited {

                color:black;
                font-family: Lucida Console;
                text-decoration:none;
                background-color:white;
            }
            a:hover {

                color:black;
                font-family: Lucida Console;
                text-decoration:none;
                background-color:white;

            }

            a:active {

                color:black;
                font-family: Lucida Console;
                text-decoration:none;
                background-color:white;
            }

/*          The nagviation CSS*/

            a.topNav {
                margin-top: auto;
                margin-left: auto;
                margin-right: auto;
                display:inline;
                font-family: Lucida Console;
                font-style: normal;
                 }


            a.topNav:link {

                font-family: Lucida Console;
                color:white;
                text-decoration:none;
                background-color:black;
            }

            a.topNav:visited {

                color:white;
                font-family: Lucida Console;
                text-decoration:none;
                background-color:black;
            }

            a.topNav:hover {

                color:black;
                font-family: Lucida Console;
                text-decoration:none;
                background-color:white;

            }

            a.topNav:active {

                color:white;
                font-family: Lucida Console;
                text-decoration:none;
                background-color:black;
            }

            table{

                border-collapse:collapse;
                width: 70%

            }
            table,th, td{

                border: 1px solid black;
                text-align: center;
            }

        </style>


    </head>
    <body>
        <?php
        echo'
            <ul>
            <li><a href="index.php" class="topNav" >Home</a></li>
           <li><a href="index.php" class="topNav" >Home</a></li>


            <li><a href="createCat.php" class="topNav" >Create Category</a></li>
            <li><a href="" class="topNav">Contact Us</a></li>
            <li><a href="" class="topNav">Sign Out</a></li>
            </ul>

            ';

        ?>
    </body>
</html>
