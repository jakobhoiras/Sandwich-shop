<html>
    <head>
        <title>Sandwich Shoppen</title>
    </head>
    <body>
        <div id="container" style="width:100%">

            <div id="header" style="background-color:#04B431; height: 100px; line-height:2; width:73%; float:left; text-align: center;">
                <font style="color:#FFFFFF; font-size: 50; text-align: center;">
                Sandwich Shoppen</font></div>
            <div style="background-color:#04B431; height: 100px; line-height:2; width:27%; float:right;">
                <center>Brugernavn:<input><br>
                    Adgangskode:<input type="password"><br>
                    <button>Log ind</button>
                    <button>
                        <a href="sandwichshoppen_login.php" style="text-decoration: none; color: #000000;">
                            Ny bruger?</a></button></center>
            </div>
            <hr>
            <div id="menu" style="background-color:#04B431; width:100%; float:left; text-align: center">
                <h3 style="color: black;">
                    <a href="sandwichshoppen.php" style="text-decoration: none; color: #FFFFFF;">Forside </a>
                    Menu 
                    <a href="sandwichshoppen_kontakt.php" style="text-decoration: none; color: #FFFFFF;">Kontakt Information</a></h3>
            </div>
            <div id="sandwich_billed" style="width: 50%; float:left; height:400;">
                <img style=" float:right; width:450; height:370;" src="http://www.audion.com/system/public/categories/125/images/bread-sandwich.jpg">
            </div>
            <div id="sandwich" style="width:50%; float: right; height:400;">
                <h2>Sandwiches</h2>
                V&#230lg mellem disse forskellige sandwiches:<br>
                <select>
                    <option></option>
                    <option>Roastbeef med cornichons</option>
                    <option>Roastbeff med emmenthaler</option>
                    <option>Skinke med ost og sennep</option>
                    <option>Kylling med ost</option>
                    <option>R&#248get laks</option>
                    <option>Pastrami med cornichons</option>
                    <option>Kylling med bacon</option>
                    <option>Kalkun med emmenthaler</option>
                    <option>Hjemmelavet tunsalat</option>
                    <option>&#198ggesalat med bacon</option>
                    <option>Chorizo</option>
                    <option>Emmenthaler med oliven</option>
                    <option>Brie med peberfrugt</option>
                    <option>Vegatar m/u humus</option>
                    <option>Humus, kylling og bacon</option>
                </select>
                45,-<br>V&#230lg antal:<br>
                <select>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                </select>
                <button>Tilf&#248j til kurv</button><br>

                <table align="left">
                    <tr><th colspan="3">Tilbeh&#248r:</th></tr>
                    <tr><td>Salat</td>
                        <td align="left"><input type="checkbox">Agurk</td><td align="right"><input type="checkbox"></td></tr>
                    <tr><td>Tomat</td>
                        <td align="left"><input type="checkbox">Oliven</td><td align="right"><input type="checkbox"></td></tr>
                    <tr><td>Majs</td>
                        <td align="left"><input type="checkbox">Guler&#248d</td><td align="right"><input type="checkbox"></td></tr>
                    <tr><td>Syltede agurk</td>
                        <td align="left"><input type="checkbox">R&#248dl&#248g</td><td align="right"><input type="checkbox"></td></tr>

                    <tr><th colspan="3">Dressinger</th></tr>
                    <tr><td>Creme Fraiche</td>
                        <td align="left"><input type="checkbox">Karry</td><td align="right"><input type="checkbox"></td></tr>

                    <tr><th colspan="3">Ekstra tilbeh&#248r</th></tr>
                    <tr><td>Bacon</td>
                        <td align="left"><input type="checkbox">Bacon</td><td align="right"><input type="checkbox"></td></tr>
                </table>
            </div>
            <div style="width: 100%;"><hr></div>
            <div id="salat_billed" style="width: 50%; float:left; height:400;">
                <img style="float:right; width:450; height:350; margin-right: 20px;" src="http://multimedia.pol.dk/archive/00446/Salat_446129a.jpg">
            </div>
            <div id="salat" style=" width:50%; float:right; height:400;">
                <h2>Salater</h2>
                V&#230lg mellem disse forskellige salater:<br>
                <select>
                    <option></option>
                    <option>Salat med kylling</option>
                    <option>Salat med laks</option>
                    <option>Salat med kalkun</option>
                    <option>Salat med tun</option>
                    <option>Gr&#230sk salat</option>
                    <option>Gr&#248n salat</option>
                </select>
                38,-<br>V&#230lg antal:<br>
                <select>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                </select>
                <button>Tilf&#248j til kurv</button><br>
            </div><div style="width: 100%;"><hr></div>
            <div id="drikkevarer_billed" style="width: 50%; float:left; height:400;">
                <img style="float:right; width:450; height:350; margin-right: 20px;" src="http://cache2.allpostersimages.com/p/LRG/15/1563/2GADD00Z/plakater/iskold-coca-cola.jpg">               
            </div>
            <div id="drikkevarer" style="width:50%; float:left;">
                <h2>Drikkevarer</h2>
                Udvalget varierer, se i k&#248leskabet
            </div>
            <div id="footer" style="background-color:#04B431;clear:both;text-align:center;">
                Valby Langgade 36 TLF: 20 78 02 52</div>
        </div>
    </body>
</html>