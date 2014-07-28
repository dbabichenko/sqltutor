<?php
$pageTitle = "SQL Puzzle";
require('inc/security.php');
require('layout/header.php');




function cleanQueryElementNames($el){
	$tmp = str_replace(",", "", $el);
	$tmp = str_replace("=", "equal", $tmp);
	$tmp = str_replace(">", "greaterthen", $tmp);
	$tmp = str_replace("<", "lessthen", $tmp);
	$tmp = str_replace(">=", "greaterthenorequalto", $tmp);
	$tmp = str_replace("<=", "lessthenorequalto", $tmp);
	$tmp = str_replace(" ", "_", $tmp);
	return $tmp;
}
$sql = "SELECT customerName, contactFirstName, phone FROM classicmodels.customers WHERE state = 'CA';";

//echo $sql . "<br />";

$puzzlePiecies = explode(' ', $sql);
//$shuffledPuzzlePiecies = explode(' ', $sql);
$shuffledPuzzlePiecies = array();
for($i=0;$i<count($puzzlePiecies);$i++){
	$piece = "{";
	$piece .= "'id' : '" . $puzzlePiecies[$i] . "',";	
	$piece .= "'label' : '" . cleanQueryElementNames($puzzlePiecies[$i]) . "'";	
	$piece .= "}";
	//echo $piece;
	array_push($shuffledPuzzlePiecies, $puzzlePiecies[$i]);
	//array_push($shuffledPuzzlePiecies, $piece);
}

shuffle($shuffledPuzzlePiecies);


?>
<style type="text/css">
	
</style>
<script language="javascript">
$(function() {
	$( ".puzzlePiece" ).draggable();
	$( ".puzzlePieceEmpty" ).droppable({
      	drop: function( event, ui ) {
      		var drop_p = $(this).offset();
	  		var drag_p = ui.draggable.offset();
	  		var left_end = drop_p.left - drag_p.left + 1;
	  		var top_end = drop_p.top - drag_p.top + 1;
	  		
	  		console.log($(this).get(0).id + " = " + ui.draggable.get(0).id);
	  		if($(this).get(0).id == ui.draggable.get(0).id){	  		
				$(this).css("width", ui.draggable.width() + 22);
				$("#puzzleProblem").remove(ui.draggable.get(0).id);
				ui.draggable.css({
					"left" : "0px",
					"top" : "0px",
					"margin" : "0px"
				});
				$(this).append(ui.draggable);
			}
			else{
				showBubble(false, $(this));
			}
		}
			
    });
});

function showBubble(bubbleType, parentObject){
	$("#insult").css({
		"visibility" : "visible",
		"display" : "block"
	});
	$("#insult").fadeOut(5000);
	
}
</script>
<div id="puzzleSolution">
<?php
for($i=0;$i<count($puzzlePiecies);$i++){
	echo "<div class='puzzlePieceEmpty' id='" . cleanQueryElementNames($puzzlePiecies[$i]) . "'></div>";
}
?>
</div>

<div id="puzzleProblem">
<?php
for($i=0;$i<count($puzzlePiecies);$i++){
	echo "<div class='puzzlePiece' id='" . cleanQueryElementNames($shuffledPuzzlePiecies[$i]) . "'>" . $shuffledPuzzlePiecies[$i] . "</div>";
	//echo "<div class='puzzlePiece' id='" . JSON.parse($shuffledPuzzlePiecies[$i]).id . "'>" . JSON.parse($shuffledPuzzlePiecies[$i]).label . "</div>";
}
?>
</div>

<div id="insult">Dude!  Seriously?  What were you thinking!</div>

<?php
require("layout/footer.php");
?>
