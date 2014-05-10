<html>
    <head>
        <title>Sandwich Shoppen</title>
    </head>
    <body>
        <div id="container" style="width:100%">

            <div id="header" style="background-color:#04B431; height: 100px; line-height:2; width:60%; float:left; text-align: right;">
                <font style="color:#FFFFFF; font-size: 50;">
                Sandwich Shoppen
                </font>
            </div>
            <div style="background-color:#04B431; height: 100px; line-height:2; width:40%; float:right; text-align: right;">
                Brugernavn:<input><br>
                Adgangskode:<input type="password"><br>
                <button style="width: 100px; background-color: #029727; border-top-left-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; border-top-right-radius: 10px;">Log ind</button>
                <a href="sandwichshoppen_login.php">
                    <button onmouseover="" style="width: 100px; background-color: #029727; cursor: pointer; border-top-left-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; border-top-right-radius: 10px;">
                        Ny bruger?</button>
                </a>
            </div>
            <div id="menu" style="background-color:#04B431; width:100%; float:left; text-align: center">
                <center>
                    <a href="sandwichshoppen.php">
                        <button onmouseover="" style="width:200; background-color: #029727; border: 1px solid #444; cursor: pointer; border-top-left-radius: 50px;"><font size="6" color="#FFFFFF">Forside</font></button>
                    </a>
                    <button style="width:200; background-color: #029727; border: 1px solid #444;"><font size="6">Menu</font></button>
                    <a href="sandwichshoppen_kontakt.php">
                        <button onmouseover="" style="width:350; background-color: #029727; border: 1px solid #444; cursor: pointer; border-top-right-radius: 50px;"><font size="6" color="#FFFFFF">Kontakt Information</font></button>
                    </a>
                </center>
            </div>
            <div id="sandwich_billed" style="width: 50%; float:left; height:400;">
                <img style=" float:right; width:450; height:370;" src="http://www.audion.com/system/public/categories/125/images/bread-sandwich.jpg">
            </div>
            <div id="sandwich" style="width:50%; float: right; height:400;">
                <h2>Sandwiches</h2>
                V&#230lg mellem disse forskellige sandwiches:<br>
                <select style="background-color: #F5F6CE;">
                    <option></option>
                    <option>Roastbeef med cornichons</option>
                    <option>Roastbeef med emmenthaler</option>
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
                    <option>Vegetar m/u humus</option>
                    <option>Humus, kylling og bacon</option>
                </select>
                45,-<br>V&#230lg antal:<br>
                <select style="background-color: #F5F6CE;">
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
                <button style="background-color: #F5F6CE; border-top-left-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; border-top-right-radius: 10px;">Tilf&#248j til kurv</button><br>

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
                <table>
                    <tr><th colspan="10" style="text-align: center; font-size: 50">Salater</th><tr>
                    <tr><th colspan="10" style="text-align:center;">K&#248d:</th></tr>
                    <td>Kylling</td><td><input type="radio" name="topping"></td>
                    <td>Laks</td><td><input type="radio" name="topping"></td>
                    <td>Kalkun</td><td><input type="radio" name="topping"></td>
                    <td>Tun</td><td><input type="radio" name="topping"></td>
                    <td>Vegetar</td><td><input type="radio" name="topping"></td>
                    <tr><th colspan="10" style="text-align: center;">Gr&#248ntsager</th></tr>
                    <tr><td>Agurk</td><td><input type="checkbox"></td>
                        <td>Tomat</td><td><input type="checkbox"></td>
                        <td>Bacon</td><td><input type="checkbox"></td>
                        <td>Majs</td><td><input type="checkbox"></td>
                        <td>Guler&#248d</td><td><input type="checkbox"></td>

                </table>
                38,-<br>V&#230lg antal:<br>
                <select style="background-color: #F5F6CE;">
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
                <button style="background-color: #F5F6CE; border-top-left-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; border-top-right-radius: 10px;">Tilf&#248j til kurv</button><br>
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