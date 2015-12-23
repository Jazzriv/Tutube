<header class="row">
	<table class="header_table" width="100%" col-lg>
		<tr>
			<td class="logo_set" rowspan="2">
				<span class="image">
				<a href="index.html"><img src="images/Movie_File.png" alt="Logo" class="logo"></a>
				</span>
				<span class="title">
					<h1>Tutube</h1>
				</span>
				
			</td>
			<td rowspan="2">
				<div class="search_bar">
					<form method="get" action="search.php">
						<input type="text" name="srch" class= "searchbar"size="50"/>
						<input type="button" value="" class="search"/>
					</form>
				</div>
			</td>
			
			<td>
				<div class="menu">
					<script type="text/javascript" src="./scripts/menu_scripts.js"></script>
					<button type="button" class="profil" onclick="profil.php"></button>
					<button type="button" class="logout" onclick="showhide_login()"> </button>

				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div id="loginbox">
					<div>
					<br/>
					</div>
					<form method="" class="logout_form">
						<div class="logout_form">
							<input type="button">Déconnexion</button>
						</div>
					</form>
						<div>
							<br/>
						</div>
				</div>
			</td>
		</tr>
	</table>
</header>

