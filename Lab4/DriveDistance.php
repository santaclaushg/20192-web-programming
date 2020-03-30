<html>
    <head>
        <title>
            Distance from Chicago!
        </title>
    </head>
    <body>
        <font size="4" color=BLUE>Welcome to the Distance Calculation Page.</font>
        <br />
        <div>The page that calculates the distances from Chicago!</div>
        <br />
        <div>Select a destination:</div>
        <form action="CheckDistance.php" method="GET">
            <select name="destination[]" size=5 multiple='multiple'>
                <option> Boston </option>
                <option> Dallas </option>
                <option> Miami </option>
                <option> Nashville </option>
                <option> Las Vegas </option>
                <option> Pittsburgh </option>
                <option> San Francisco </option>
                <option> Toronto </option>
                <option> Washington, DC </option>
            </select>
            <br />
            <input type="submit" value="Submit" />
            <input type="reset" value="Reset" />
        </form>
    </body>
</html>