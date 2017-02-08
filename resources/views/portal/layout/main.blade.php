<!DOCTYPE html>
<html lang="en">
<!-- head -->
@include('portal.layout.head')


<body>
	
	@include('portal.layout.header')

	<section id="main">

		<section id="content">
			
				@yield('content')
			<!-- </div> -->
		</section>

		<footer id="footer">
			<a href="http://www.premait.com/" target="_blank">PremaIT Solutions</a> © <?= date('Y'); ?>  All Rights Reserved.
		
                </footer>

	</section>
		
</body>
</html>