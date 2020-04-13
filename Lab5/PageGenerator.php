<html>
  <head>
    <meta charset="UTF-8"<title>Page generator</title>
</head>
<body>
  <form action="PageGeneratorResult.php" method="POST">
    <table>
      <tr>
        <td>
          <font>Title: </font>
        </td>
        <td>
          <input type="text" name="title" placeholder="title" />
        </td>
      </tr>
      <tr>
        <td>
          <font>Year: </font>
        </td>
        <td>
          <input type="text" name="year" placeholder="year" />
        </td>
      </tr>
      <tr>
        <td>
          <font>Copyright: </font>
        </td>
        <td>
          <input type="text" name="copyright" placeholder="copyright" />
        </td>
      </tr>
      <tr>
        <td>
          <font>Content: </font>
        </td>
        <td>
          <input type="text" name="content" placeholder="content" />
        </td>
      </tr>
      <tr>
        <td>
          <input type="submit" value="Submit" />
          <input type="reset" value="Reset" />
        </td>
      </tr>
    </table>
  </form>
</body>
</html>