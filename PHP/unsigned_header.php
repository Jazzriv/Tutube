<header class="row">
	<table class="header_table" width="100%" col-lg>
		<tr><!-- Bannière du site -->
			<td class="logo_set" rowspan="2">
				<span class="image">
				<a href="home.php"><img src="../images/Movie_File.png" alt="Logo" class="logo"></a>
				</span>
				<span class="title">
					<h1>Tutube</h1>
				</span>
				
			</td><!-- Barre de recherche -->
			<td rowspan="2">
				<div class="search_bar">
					<form method="get" action="search.php">
						<input type="text" name="srch" class= "searchbar"size="50"/>
						<input type="submit" value="" class="search"/>
					</form>
				</div>
			</td>
			
			<td><!-- Menu -->
				<div class="menu">
					<script type="text/javascript" src="../scripts/menu_scripts.js"></script>
					<button type="button" class="login" onclick="showhide_login()"> </button>
					<button type="button" class="signin" onclick="location.href='signin.php';"></button>
				</div>
			</td>
		</tr>
		<tr>
			<td><!-- Interface de connexion -->
				<div id="loginbox">
					<div>
					<br/>
					</div>
					<form class="email-login"  method="post" action="home.php">

							<div class="log_form">
								<input name ="email" id="email" type="email" placeholder="E-mail"/>
							</div>
							<div class="log_form">
								<input name="pass" id="pass" type="password" placeholder="Mot de passe"/>
							</div>
							<div class="log_form">
								<input type="submit" value="Connexion"/>
							</div>
					 </form>
						<div class="log_form">
								<a href="#" class="forgot-password">Mot de passe oublié ?</a>
						</div>

				</div>
			</td>
		</tr>
	</table>
</header>
