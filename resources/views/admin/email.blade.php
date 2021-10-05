<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
h1 {
  text-align:center;
}
</style>
</head>
<body>
<h1>Feedback from website</h1>
<table id="customers">
  <tr>
    <td>Name</td>
    <td>{{ $name }}</td>
  </tr>
  <tr>
    <td>Email</td>
    <td>{{ $email }}</td>
  </tr>
  <tr>
    <td>Phone</td>
    <td>{{ $phone }}</td>
  </tr>
  <tr>
    <td>Message</td>
    <td>{{ $client_message }}</td>
  </tr>
</table>

</body>
</html>