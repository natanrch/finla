<html>
<head>
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet">
    <title>Finla</title>
</head>
<body>
  <div class="container">


	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

		<div class="container">
     
		  <a class="navbar-brand h1 mb-0" href="/">Finla</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
	          <span class="navbar-toggler-icon"></span>
	      </button>

	      <div class="collapse navbar-collapse" id="navbarSite">
	      	
			  <ul class="navbar-nav ml-auto">
			    <li class="nav-item"><a class="nav-link" href="/earnings">Earnings</a></li>
			    <li class="nav-item"><a class="nav-link" href="/expenses">Expenses</a></li>
			    <li class="nav-item"><a class="nav-link" href="/categories">Categories</a></li>
			    <li class="nav-item"><a class="nav-link" href="/discounts">Discounts</a></li>
			    <li class="nav-item"><a class="nav-link" href="/limits">Limits</a></li>
			    <li class="nav-item"><a class="nav-link" href="/details">Details</a></li>
			  </ul>
	      </div>
		</div>

	</nav>

    @yield('content')

  </div>

  <script type="text/javascript" src="/js/app.js"></script>
</body>

</html>