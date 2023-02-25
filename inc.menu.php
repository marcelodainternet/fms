<!-- Static navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
<span class="sr-only">Sistema Web Para</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="inicial.php">Sistema Web Para</a>
</div>
<div id="navbar" class="navbar-collapse collapse">
<?php if($_SESSION['id_usuarios']){ ?>
<ul class="nav navbar-nav">
<?php if($_SESSION['permissao']['clientes']['visualizar'] || $_SESSION['permissao']['corretores']['visualizar'] || $_SESSION['permissao']['parceiros']['visualizar'] || $_SESSION['permissao']['proprietarios']['visualizar']){ ?>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Cadastros<span class="caret"></span></a>
<ul class="dropdown-menu" role="menu">
<?php if($_SESSION['permissao']['clientes']['visualizar']){ ?>
<li><a href="clientes-listar.php">Clientes</a></li>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['visualizar']){ ?>
<li><a href="corretores-listar.php">Corretores</a></li>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['visualizar']){ ?>
<li><a href="parceiros-listar.php">Parceiros</a></li>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['visualizar']){ ?>
<li><a href="proprietarios-listar.php">Proprietários</a></li>
<?php } ?></ul>
</li>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['visualizar']){ ?>
<li><a href="categorias-listar.php">Categorias</a></li>
<?php } ?>
<?php if($_SESSION['permissao']['cupons_de_descontos']['visualizar']){ ?>
<li><a href="cupons-de-descontos-listar.php">Cupons de Descontos</a></li>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['visualizar']){ ?>
<li><a href="imoveis-listar.php">Imóveis</a></li>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['visualizar']){ ?>
<li><a href="lancamentos-listar.php">Lançamentos</a></li>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['visualizar']){ ?>
<li><a href="pedidos-listar.php">Pedidos</a></li>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['visualizar']){ ?>
<li><a href="postagens-listar.php">Postagens</a></li>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['visualizar']){ ?>
<li><a href="produtos-listar.php">Produtos</a></li>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['visualizar']){ ?>
<li><a href="secoes-listar.php">Seções</a></li>
<?php } ?>
<?php if($_SESSION['permissao']['site']['visualizar']){ ?>
<li><a href="site-listar.php">Site</a></li>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['visualizar']){ ?>
<li><a href="subcategorias-listar.php">Subcategorias</a></li>
<?php } ?>
<?php if($_SESSION['permissao']['tarefas']['visualizar']){ ?>
<li><a href="tarefas-listar.php">Tarefas</a></li>
<?php } ?>
<?php if($_SESSION['permissao']['e_mails_automaticos']['visualizar'] || $_SESSION['permissao']['e_mails_captados']['visualizar'] || $_SESSION['permissao']['e_mails_mkt']['visualizar']){ ?>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">E-mails<span class="caret"></span></a>
<ul class="dropdown-menu" role="menu">
<?php if($_SESSION['permissao']['e_mails_automaticos']['visualizar']){ ?>
<li><a href="e-mails-automaticos-listar.php">Automáticos</a></li>
<?php } ?>
<?php if($_SESSION['permissao']['e_mails_captados']['visualizar']){ ?>
<li><a href="e-mails-captados-listar.php">Captados</a></li>
<?php } ?>
<?php if($_SESSION['permissao']['e_mails_mkt']['visualizar']){ ?>
<li><a href="e-mails-mkt-listar.php">Mkt</a></li>
<?php } ?>
</ul>
</li>
<?php } ?>
<?php if($_SESSION['permissao']['etiquetas_imovel']['visualizar'] || $_SESSION['permissao']['etiquetas_postagem']['visualizar'] || $_SESSION['permissao']['etiquetas_produto']['visualizar']){ ?>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Etiquetas<span class="caret"></span></a>
<ul class="dropdown-menu" role="menu">
<?php if($_SESSION['permissao']['etiquetas_imovel']['visualizar']){ ?>
<li><a href="etiquetas-imovel-listar.php">Imóvel</a></li>
<?php } ?>
<?php if($_SESSION['permissao']['etiquetas_postagem']['visualizar']){ ?>
<li><a href="etiquetas-postagem-listar.php">Postagem</a></li>
<?php } ?>
<?php if($_SESSION['permissao']['etiquetas_produto']['visualizar']){ ?>
<li><a href="etiquetas-produto-listar.php">Produto</a></li>
<?php } ?>
</ul>
</li>
<?php } ?>
<?php if($_SESSION['permissao']['status_cadastro']['visualizar'] || $_SESSION['permissao']['status_imovel']['visualizar'] || $_SESSION['permissao']['status_lancamento']['visualizar'] || $_SESSION['permissao']['status_mkt']['visualizar'] || $_SESSION['permissao']['status_negociacao']['visualizar'] || $_SESSION['permissao']['status_operacao']['visualizar'] || $_SESSION['permissao']['status_pedido']['visualizar'] || $_SESSION['permissao']['status_produto']['visualizar'] || $_SESSION['permissao']['status_site']['visualizar'] || $_SESSION['permissao']['status_tarefa']['visualizar']){ ?>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Status<span class="caret"></span></a>
<ul class="dropdown-menu" role="menu">
<?php if($_SESSION['permissao']['status_cadastro']['visualizar']){ ?>
<li><a href="status-cadastro-listar.php">Cadastro</a></li>
<?php } ?>
<?php if($_SESSION['permissao']['status_imovel']['visualizar']){ ?>
<li><a href="status-imovel-listar.php">Imóvel</a></li>
<?php } ?>
<?php if($_SESSION['permissao']['status_lancamento']['visualizar']){ ?>
<li><a href="status-lancamento-listar.php">Lançamento</a></li>
<?php } ?>
<?php if($_SESSION['permissao']['status_mkt']['visualizar']){ ?>
<li><a href="status-mkt-listar.php">Mkt</a></li>
<?php } ?>
<?php if($_SESSION['permissao']['status_negociacao']['visualizar']){ ?>
<li><a href="status-negociacao-listar.php">Negociação</a></li>
<?php } ?>
<?php if($_SESSION['permissao']['status_operacao']['visualizar']){ ?>
<li><a href="status-operacao-listar.php">Operação</a></li>
<?php } ?>
<?php if($_SESSION['permissao']['status_pedido']['visualizar']){ ?>
<li><a href="status-pedido-listar.php">Pedido</a></li>
<?php } ?>
<?php if($_SESSION['permissao']['status_produto']['visualizar']){ ?>
<li><a href="status-produto-listar.php">Produto</a></li>
<?php } ?>
<?php if($_SESSION['permissao']['status_site']['visualizar']){ ?>
<li><a href="status-site-listar.php">Site</a></li>
<?php } ?>
<?php if($_SESSION['permissao']['status_tarefa']['visualizar']){ ?>
<li><a href="status-tarefa-listar.php">Tarefa</a></li>
<?php } ?>
</ul>
</li>
<?php } ?>
<?php if($_SESSION['permissao']['taxa_de_entrega']['visualizar']){ ?>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Taxa<span class="caret"></span></a>
<ul class="dropdown-menu" role="menu">
<?php if($_SESSION['permissao']['taxa_de_entrega']['visualizar']){ ?>
<li><a href="taxa-de-entrega-listar.php">de Entrega</a></li>
<?php } ?>
</ul>
</li>
<?php } ?>
<?php if($_SESSION['permissao']['tipos_imovel']['visualizar'] || $_SESSION['permissao']['tipos_lancamento']['visualizar'] || $_SESSION['permissao']['tipos_produto']['visualizar'] || $_SESSION['permissao']['tipos_tarefa']['visualizar']){ ?>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tipos<span class="caret"></span></a>
<ul class="dropdown-menu" role="menu">
<?php if($_SESSION['permissao']['tipos_imovel']['visualizar']){ ?>
<li><a href="tipos-imovel-listar.php">Imóvel</a></li>
<?php } ?>
<?php if($_SESSION['permissao']['tipos_lancamento']['visualizar']){ ?>
<li><a href="tipos-lancamento-listar.php">Lançamento</a></li>
<?php } ?>
<?php if($_SESSION['permissao']['tipos_produto']['visualizar']){ ?>
<li><a href="tipos-produto-listar.php">Produto</a></li>
<?php } ?>
<?php if($_SESSION['permissao']['tipos_tarefa']['visualizar']){ ?>
<li><a href="tipos-tarefa-listar.php">Tarefa</a></li>
<?php } ?>
</ul>
</li>
<?php } ?>
</ul>
<?php } ?>
<ul class="nav navbar-nav navbar-right">
<?php if($_SESSION['id_usuarios'] == 1){ ?>

<li><a href="backup-R9tl2JDjkhNxMOO0eJYrDBfhAtsdHE356nUD.php" target="_blank"><i class="fas fa-download"></i></a></li>

<li><a href="editor.php?arquivo=<?php echo base64_encode(str_replace('/', '', strrchr($_SERVER['SCRIPT_FILENAME'], '/'))); ?>" target="_blank"><i class="fas fa-code"></i></a></li>
<?php } ?>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fas fa-cogs"></i><span class="caret"></span></a>
<ul class="dropdown-menu" role="menu">
<?php if($_SESSION['id_usuarios']){ ?>
<li><a href="meu-cadastro.php"><i class="fas fa-user-circle"></i> <?php echo $_SESSION['nome_usuarios'] ?></a></li>
<?php if($_SESSION['permissao']['pperfis']['visualizar']){ ?>
<li><a href="pperfis-listar.php"><i class="fas fa-users"></i> pPerfis</a></li>
<?php } ?>
<?php if($_SESSION['permissao']['usuarios']['visualizar']){ ?>
<li><a href="usuarios-listar.php"><i class="fas fa-user"></i> Usuários</a></li>
<?php } ?>
<?php if($_SESSION['permissao']['llogs']['visualizar']){ ?>
<li><a href="llogs-listar.php"><i class="fas fa-bug"></i> lLogs</a></li>
<?php } ?>
<li><a href="./?sair=true"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
<?php } else { ?>
<li><a href="./"><i class="fas fa-sign-in-alt"></i> Login</a></li>
<?php } ?>
</ul>
</li>
</ul>
</div>
</div>
</nav>
