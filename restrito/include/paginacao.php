<?php
//determina de quantos em quantos links serão adicionados e removidos
$max_links = 6;
//dados para os botões
$previous = $pagina - 1;
$next = $pagina + 1;
//usa uma funcção "ceil" para arrendondar o numero pra cima, ex 1,01 será 2
$pgs = ceil($total / $maximo);
//se a tabela não for vazia, adiciona os botões
if ($pgs > 1) {?>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<!-- Pagination -->
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
				<ul class="pagination p-center">
				<?php if ($previous > 0) {?>
					<li class="page-item">
						<a class="page-link"href=" <?=$_SERVER['PHP_SELF'] . '?pagina=' . $previous?> ">
							<span class="ti-arrow-left"></span>
							<span class="sr-only">Anterior</span>
						</a>
					</li>
				<?php }?>
	<?php if ($pagina > 5) {?>
		<li class="page-item"><a class="page-link" href=" <?=$_SERVER['PHP_SELF'] . "?pagina=" . (1)?> ">1</a></li>
		<li class="page-item"><a class="page-link" href=" <?=$_SERVER['PHP_SELF'] . '?pagina=' . ($pagina-5)?>">...</a></li>
	<?php }?>
<?php
	$paginaInicio = ($pagina >= 2) ? $pagina - 2 : 0;
    $ult_pg_loop = 0;
    for ($i = $paginaInicio; $i <= $paginaInicio + 4; $i++) {
        if ($i > 0 && $i <= $pgs) {?>
<?php
//senão adiciona os links para outra pagina
	if ($i != $pagina) {?>
	<li class="page-item">
		<a class="page-link" href=" <?=$_SERVER['PHP_SELF'] . '?pagina=' . $i?> "><?=$i?></a>
	</li>
<?php } else {?>
	<li class="page-item active">
		<a class="page-link " href="#"><?=$i?></a>
	</li>
<?php }?>
<?php
}
$ult_pg_loop = $i + 3;
}
?>
<?php if ($pagina + 2 < $pgs) {?>
		<li class="page-item"><a class="page-link" href=" <?=$_SERVER['PHP_SELF'] . '?pagina=' . ($ult_pg_loop)?>">...</a></li>
		<li class="page-item"><a class="page-link" href=" <?=$_SERVER['PHP_SELF'] . "?pagina=" . ($pgs)?> "><?=$pgs?></a></li>
<?php }?>

<?php if ($next <= $pgs) {?>
	<li class="page-item">
		<a class="page-link" href="<?=$_SERVER['PHP_SELF'] . '?pagina=' . $next ?>" aria-label='Next'>
			<span class="ti-arrow-right"></span>
			<span class="sr-only"></span>
		</a>
	</li>
<?php } ?>
					</ul>
				</div>
			</div>

		</div>
	</div>
<?php }?>