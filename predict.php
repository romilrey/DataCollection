

<!DOCTYPE html>
<html>
<title>PredicatorFinc.</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://pyscript.net/latest/pyscript.css" />
<script defer src="https://pyscript.net/latest/pyscript.js"></script>
<style>
    body, h1, h2, h3, h4, h5, h6 {
        font-family: "Lato", sans-serif
    }

    .w3-bar, h1, button {
        font-family: "Montserrat", sans-serif
    }

    .fa-anchor, .fa-coffee {
        font-size: 200px
    }

    .dropbtn {
        background-color: #4CAF50;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
        cursor: pointer;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown:hover .dropbtn {
        background-color: #3e8e41;
    }
    hr.new {
        border: 5px solid grey;
        border-radius: 5px;
    }
</style>

<body id="bod">
    <py-env>
        - numpy
        - pandas
        - yfinance
        - ssl
    </py-env>
<head>
    <link rel="stylesheet" href="interface.css">

    <!-- Navbar -->
    <div class="w3-top">
        <div class="w3-bar w3-white w3-card w3-left-align w3-large">
            <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-black"
               href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i
                    class="fa fa-bars"></i></a>
            <a href="index.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-green">Home</a>
            <a href="predict.php" class="w3-bar-item w3-button w3-padding-large w3-black">Stock predictor</a>
        </div>
    </div>

    <!-- Header -->
    <header class="w3-container w3-white w3-center" style="padding:50px 16px">
        <h1 class="w3-margin w3-jumbo">Stock Prediction Zone</h1>
    </header>
    <hr class="new">
    <div class="w3-row-padding w3-light-white w3-padding-20 w3-container">
        <div class="w3-content">

            <form id="f1" action="predict.php" method="post">
                <br><br><br>

                <div id="co">
                    <h1 id="comp" for="company">List of Companies</h1>
                    <h5>Please select the stock from the available list</h5>
                    <div class="dropdown">
                        <button class="dropbtn">Dropdown 
                            <i class="fa fa-caret-down"></i>
                        </button>
                    <div class="dropdown-content">
                        <a href="tata.html">TATA</a>
                        <a href="mcx.html">INFY</a>
                        <a href="reliance.html">Reliance</a>
                        <a href="csdl.html">IEX</a>
                    </div>
                </div> 
            </form>
            <br><br>
            
        </div>
    </div>
    </div>
    <!-- Footer -->
    <footer class="footer-distributed">
        <div class="footer-left">
            <h3>Stock <span>Forecasting</span></h3>
        </div>
        <div class="footer-center">
            <div>
                <i class="fa fa-envelope"></i>
                <p><a href="mailto:200524811">200524811@student.georgianc.on.ca</a></p>
                <p><a href="mailto:200524811">200528076@student.georgianc.on.ca</a></p>
            </div>
        </div>
        <div class="footer-right">
        <p class="footer-company-about">
            <span>Prepared by:</span><br>
            <ol>
                <li>
                    Nikhil Sharma
                </li>
                <li>
                    Romil Patel
                </li>
                <li>
                    Tushar Kaushik
                </li>
                <li>
                    Pranav Arora
                </li>
                <li>
                    Hunny Kikaganesh
                </li>
                <li>
                    Vishal Sethi
                </li>
            </ol>
        </p>
        
    </div>
    </footer>
    <!--<py-script src="stockprediction.py">
            import numpy as np
            import pandas as pd
            import yfinance as yf
            import ssl
            def show_output():

    </py-script>-->
</body>
</html>
