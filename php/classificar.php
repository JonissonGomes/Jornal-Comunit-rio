<?php 

require_once 'pacote.php';

query('INSERT INTO stars(valor,user_id,post_id) values (?,?,?)',[$_POST['valor'],$_SESSION['id'],$_SESSION['post']]);

$media=fetch('SELECT AVG(valor) FROM stars where post_id=?',[$_SESSION['post']]);
$classificado = fetch('SELECT * FROM stars where post_id=? and user_id=?',[$_SESSION['post'],$_SESSION['id']]);
if ($classificado==null) {
?> 

		<section id='estrela' class='rating-widget'>			
			<!-- Rating Stars Box -->
			<div class='rating-stars text-center'>
				<ul id='stars'>
					<li class='star' title='Péssimo' data-value='1'>
						<i class='fa fa-star fa-fw'></i>
					</li>
					<li class='star' title='Ruim' data-value='2'>
						<i class='fa fa-star fa-fw'></i>
					</li>
					<li class='star' title='Bom' data-value='3'>
						<i class='fa fa-star fa-fw'></i>
					</li>
					<li class='star' title='Muito bom' data-value='4'>
						<i class='fa fa-star fa-fw'></i>
					</li>
					<li class='star' title='Excelente' data-value='5'>
						<i class='fa fa-star fa-fw'></i>
					</li>
				</ul>
			</div>
			<div>
				<span></span>
			</div>
			
		</section>
	<?php
}else{
?>
<section class='rating-widget'>
<div class='rating-stars text-center'>
	<ul id='stars '>
		<li class='star selected'>
			<i class='fa fa-star fa-fw'><?=number_format($media[0],2);?> </i>
		</li>
	</ul>
</div>
<div>
	<span></span>
</div>
</section>
<?php } ?>