<h1><?php echo($data[0]['title']); ?></h1>
<video width="640" height="480" controls="controls" autoplay>
	<source src=<?php echo($data[0]['mp4']);?> type="video/mp4">
	<source src=<?php echo($data[0]['ogv']);?> type="video/ogg">
	Votre navigateur n'a pas de lecteur de cassettes adapté.
</video>
