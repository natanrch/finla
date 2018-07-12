<html>
<head>
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet">
    <title>Finla</title>
</head>
<body>
  <div class="container">

	<nav class="navbar navbar-default">
	<div class="container-fluid">

	<div class="navbar-header">      
	  <a class="navbar-brand" href="/">Finla</a>
	</div>

	  <ul class="nav navbar-nav navbar-right">
	    <li><a href="/choose-list">Lists</a></li>
	    <li><a href="/choose-entry">New Entry</a></li>
	    <li><a href="/choose-category">New Category</a></li>
	    <li><a href="/discounts">Discounts</a></li>
	    <li><a href="/details">Details</a></li>
	  </ul>

	</div>
	</nav>

    @yield('content')

  </div>
</body>
</html>