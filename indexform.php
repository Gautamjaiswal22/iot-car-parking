<html>

<head>
    <title>HTML Table</title>
  
    <h1 style="text-align:center;">WELCOME TO SMART PARKING</h1>
</head>
<body>
    <form method="POST" action="regester.php">
        <table border="2" align="center">
            <tr>
                <td>
                    <table border="0" align="center" width="430" cellpadding="5">
                        <caption>REGESTER</caption>
                        <tr>
                            <th>Mobile No *</th>
                            <td><input type="tel" id="mob" placeholder="9999999999"  maxlength="10" minlength="10" name="tel" required/></td>
                        </tr>
                        <tr>
                            <th>NAME *</th>
                            <td><input type="text" name="fn" id="fn1" maxlength="10" title="First name"
                                    placeholder="ENTER NAME HERE" required /></td>
                        </tr>

                        <tr>
                            <th rowspan="3" style="vertical-align: top;">CITY *</th>
                            <td>
                                <input type="text" id="add1" placeholder="city" name="place" required>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2" align="center">
                                <button> Submit </button>
                                <!-- <input type="submit" /> -->
                                <!-- <input type="button" onclick="sub()" value="REGESTER" id="btn" /> -->
                                <!-- <input type="reset" value="Reset Data" /> -->
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </form>

</body>

</html>