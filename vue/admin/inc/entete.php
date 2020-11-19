<div id="entete">
	
	<!-- <hr> -->
	<h1 class="ml12" >Espace d'administration </h1>

<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
</div>
<style >
	h1 {
  background: linear-gradient( 90deg, rgba(246, 114, 128, 0.6) , rgba(255, 255, 255, 0.6));
  border-left:20px #dd6673 solid;
  color: #dd6673;
  line-height: 40px;
  padding: 15px 0px 15px 20px; 
  text-align: center;

}
</style>
<script>
	// Wrap every letter in a span
var textWrapper = document.querySelector('.ml12');
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

anime.timeline({loop: true})
  .add({
    targets: '.ml12 .letter',
    translateX: [40,0],
    translateZ: 0,
    opacity: [0,1],
    easing: "easeOutExpo",
    duration: 1200,
    delay: (el, i) => 500 + 30 * i
  }).add({
    targets: '.ml12 .letter',
    translateX: [0,-30],
    opacity: [1,0],
    easing: "easeInExpo",
    duration: 1100,
    delay: (el, i) => 100 + 30 * i
  });
</script>