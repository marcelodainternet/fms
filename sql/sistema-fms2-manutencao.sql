
SET sql_mode = '';

CREATE TABLE IF NOT EXISTS `aacoes` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`nome` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `ccampos` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_ttabelas` int(11) NOT NULL,
`nome` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `llogs` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_usuarios` int(11) NOT NULL,
`ip` varchar(255) NOT NULL,
`url` varchar(255) NOT NULL,
`arquivos` varchar(255) NOT NULL,
`data_hora` datetime NOT NULL,
`sql_executado` longtext NOT NULL,
`parametros` longtext NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `pperfis` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`nome` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `ppermissoes` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_pperfis` int(11) NOT NULL,
`id_ttabelas` int(11) NOT NULL,
`id_ccampos` int(11) NOT NULL,
`id_aacoes` int(11) NOT NULL,
`permissao` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `ttabelas` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`nome` varchar(255) NOT NULL,
`relacionamentos` longtext NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `carrinhos` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL,
`carrinho` varchar(255) NOT NULL,
`operacao` varchar(255) NOT NULL,
`id_produtos` int(11) NOT NULL,
`quantidade` int(11) NOT NULL,
`obs_do_pedido` longtext NOT NULL,
`taxa_de_entrega` decimal(10,2) NOT NULL,
`desconto` decimal(10,2) NOT NULL,
`cupom_de_desconto` varchar(255) NOT NULL,
`historico` longtext NOT NULL,
`data_cadastro` datetime NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `categorias` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_secoes` int(11) NOT NULL,
`nome` varchar(255) NOT NULL,
`imagem` char(4) NOT NULL,
`id_status_site` int(11) NOT NULL,
`data_expira` datetime NOT NULL,
`ordem` int(11) NOT NULL,
`titulo` varchar(255) NOT NULL,
`subtitulo` varchar(255) NOT NULL,
`descricao` longtext NOT NULL,
`obs` longtext NOT NULL,
`background` varchar(255) NOT NULL,
`cortxt` varchar(255) NOT NULL,
`container` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não',
`borda` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não',
`borda_cor` varchar(255) NOT NULL,
`borda_sombra` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não',
`arredondado` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não',
`parallax` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não',
`historico` longtext NOT NULL,
`data_cadastro` datetime NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `clientes` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL,
`nome` varchar(255) NOT NULL,
`foto` char(4) NOT NULL,
`id_status_cadastro` int(11) NOT NULL,
`data_expira` datetime NOT NULL,
`retorno` datetime NOT NULL,
`cpf` varchar(255) NOT NULL,
`empresa` varchar(255) NOT NULL,
`cnpj` varchar(255) NOT NULL,
`e_mail` varchar(255) NOT NULL,
`senha` varchar(255) NOT NULL,
`e_mail_2` varchar(255) NOT NULL,
`telefone` varchar(255) NOT NULL,
`telefone_2` varchar(255) NOT NULL,
`cep` varchar(255) NOT NULL,
`endereco` varchar(255) NOT NULL,
`numero` varchar(255) NOT NULL,
`complemento` varchar(255) NOT NULL,
`bairro` varchar(255) NOT NULL,
`cidade` varchar(255) NOT NULL,
`estado` varchar(255) NOT NULL,
`pix` varchar(255) NOT NULL,
`banco` varchar(255) NOT NULL,
`agencia` varchar(255) NOT NULL,
`conta` varchar(255) NOT NULL,
`tipo_de_conta` varchar(255) NOT NULL,
`obs` longtext NOT NULL,
`documentos` char(4) NOT NULL,
`historico` longtext NOT NULL,
`data_cadastro` datetime NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `corretores` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL,
`nome` varchar(255) NOT NULL,
`foto` char(4) NOT NULL,
`id_status_cadastro` int(11) NOT NULL,
`creci` varchar(255) NOT NULL,
`data_expira` datetime NOT NULL,
`retorno` datetime NOT NULL,
`cpf` varchar(255) NOT NULL,
`empresa` varchar(255) NOT NULL,
`cnpj` varchar(255) NOT NULL,
`e_mail` varchar(255) NOT NULL,
`senha` varchar(255) NOT NULL,
`e_mail_2` varchar(255) NOT NULL,
`telefone` varchar(255) NOT NULL,
`telefone_2` varchar(255) NOT NULL,
`cep` varchar(255) NOT NULL,
`endereco` varchar(255) NOT NULL,
`numero` varchar(255) NOT NULL,
`complemento` varchar(255) NOT NULL,
`bairro` varchar(255) NOT NULL,
`cidade` varchar(255) NOT NULL,
`estado` varchar(255) NOT NULL,
`pix` varchar(255) NOT NULL,
`banco` varchar(255) NOT NULL,
`agencia` varchar(255) NOT NULL,
`conta` varchar(255) NOT NULL,
`tipo_de_conta` varchar(255) NOT NULL,
`obs` longtext NOT NULL,
`documentos` char(4) NOT NULL,
`historico` longtext NOT NULL,
`data_cadastro` datetime NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `cupons_de_descontos` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL,
`nome` varchar(255) NOT NULL,
`imagem` char(4) NOT NULL,
`id_status_site` int(11) NOT NULL,
`codigo` varchar(255) NOT NULL,
`data_expira` datetime NOT NULL,
`titulo` varchar(255) NOT NULL,
`descricao` longtext NOT NULL,
`obs` longtext NOT NULL,
`historico` longtext NOT NULL,
`data_cadastro` datetime NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `e_mails_automaticos` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL,
`tipo` varchar(255) NOT NULL,
`id_status_site` int(11) NOT NULL,
`titulo` varchar(255) NOT NULL,
`mensagem` longtext NOT NULL,
`historico` longtext NOT NULL,
`data_cadastro` datetime NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `e_mails_captados` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL,
`nome` varchar(255) NOT NULL,
`empresa` varchar(255) NOT NULL,
`id_status_site` int(11) NOT NULL,
`telefone` varchar(255) NOT NULL,
`e_mail` varchar(255) NOT NULL,
`fonte` varchar(255) NOT NULL,
`obs` longtext NOT NULL,
`historico` longtext NOT NULL,
`data_cadastro` datetime NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `e_mails_mkt` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL,
`tipo` varchar(255) NOT NULL,
`id_status_mkt` int(11) NOT NULL,
`destinatario` longtext NOT NULL,
`copia_oculta` longtext NOT NULL,
`titulo` varchar(255) NOT NULL,
`mensagem` longtext NOT NULL,
`obs` longtext NOT NULL,
`data_envio` datetime NOT NULL,
`historico` longtext NOT NULL,
`data_cadastro` datetime NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `enderecos` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_clientes` int(11) NOT NULL,
`nome` varchar(255) NOT NULL,
`cpf` varchar(255) NOT NULL,
`telefone` varchar(255) NOT NULL,
`cep` varchar(255) NOT NULL,
`endereco` varchar(255) NOT NULL,
`numero` varchar(255) NOT NULL,
`complemento` varchar(255) NOT NULL,
`bairro` varchar(255) NOT NULL,
`cidade` varchar(255) NOT NULL,
`estado` varchar(255) NOT NULL,
`obs` longtext NOT NULL,
`historico` longtext NOT NULL,
`data_cadastro` datetime NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `etiquetas_imovel` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL,
`nome` varchar(255) NOT NULL,
`label` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `etiquetas_postagem` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL,
`nome` varchar(255) NOT NULL,
`label` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `etiquetas_produto` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL,
`nome` varchar(255) NOT NULL,
`label` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `imoveis` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_secoes` int(11) NOT NULL,
`id_categorias` int(11) NOT NULL,
`id_subcategorias` int(11) NOT NULL,
`nome` varchar(255) NOT NULL,
`imagem` char(4) NOT NULL,
`id_status_imovel` int(11) NOT NULL,
`codigo` varchar(255) NOT NULL,
`data_expira` datetime NOT NULL,
`destaque` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não',
`id_etiquetas_imovel` int(11) NOT NULL,
`id_status_negociacao` int(11) NOT NULL,
`id_tipos_imovel` int(11) NOT NULL,
`exclusivo` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não',
`escriturado` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não',
`id_corretores` int(11) NOT NULL,
`id_proprietarios` int(11) NOT NULL,
`area_total` int(11) NOT NULL,
`area_construida` int(11) NOT NULL,
`valor_venda` decimal(10,2) NOT NULL,
`valor_aluguel` decimal(10,2) NOT NULL,
`valor_condominio` decimal(10,2) NOT NULL,
`valor_caucao` varchar(255) NOT NULL,
`outros_valores` varchar(255) NOT NULL,
`comissao` varchar(255) NOT NULL,
`imagens` char(4) NOT NULL,
`video` varchar(255) NOT NULL,
`titulo` varchar(255) NOT NULL,
`detalhes` longtext NOT NULL,
`descricao` longtext NOT NULL,
`obs` longtext NOT NULL,
`documentos` char(4) NOT NULL,
`historico` longtext NOT NULL,
`data_cadastro` datetime NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `lancamentos` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL,
`id_tipos_lancamento` int(11) NOT NULL,
`imagem` char(4) NOT NULL,
`id_status_lancamento` int(11) NOT NULL,
`destaque` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não',
`documentos` char(4) NOT NULL,
`id_pedidos` int(11) NOT NULL,
`id_clientes` int(11) NOT NULL,
`id_parceiros` int(11) NOT NULL,
`terceiro` longtext NOT NULL,
`telefone` varchar(255) NOT NULL,
`e_mail` varchar(255) NOT NULL,
`titulo` varchar(255) NOT NULL,
`detalhe` varchar(255) NOT NULL,
`descricao` longtext NOT NULL,
`pagamento` varchar(255) NOT NULL,
`parcelas` int(11) NOT NULL,
`valor` decimal(10,2) NOT NULL,
`valor_total` decimal(10,2) NOT NULL,
`valor_recorrente` decimal(10,2) NOT NULL,
`proximo_pagamento` date NOT NULL,
`ultimo_pagamento` date NOT NULL,
`observacoes` longtext NOT NULL,
`historico` longtext NOT NULL,
`data_cadastro` datetime NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `parceiros` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL,
`nome` varchar(255) NOT NULL,
`foto` char(4) NOT NULL,
`id_status_cadastro` int(11) NOT NULL,
`funcao` varchar(255) NOT NULL,
`data_expira` datetime NOT NULL,
`retorno` datetime NOT NULL,
`cpf` varchar(255) NOT NULL,
`empresa` varchar(255) NOT NULL,
`cnpj` varchar(255) NOT NULL,
`e_mail` varchar(255) NOT NULL,
`senha` varchar(255) NOT NULL,
`e_mail_2` varchar(255) NOT NULL,
`telefone` varchar(255) NOT NULL,
`telefone_2` varchar(255) NOT NULL,
`cep` varchar(255) NOT NULL,
`endereco` varchar(255) NOT NULL,
`numero` varchar(255) NOT NULL,
`complemento` varchar(255) NOT NULL,
`bairro` varchar(255) NOT NULL,
`cidade` varchar(255) NOT NULL,
`estado` varchar(255) NOT NULL,
`pix` varchar(255) NOT NULL,
`banco` varchar(255) NOT NULL,
`agencia` varchar(255) NOT NULL,
`conta` varchar(255) NOT NULL,
`tipo_de_conta` varchar(255) NOT NULL,
`obs` longtext NOT NULL,
`enexos` char(4) NOT NULL,
`historico` longtext NOT NULL,
`data_cadastro` datetime NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `pedidos` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL,
`id_parceiros` int(11) NOT NULL,
`id_clientes` int(11) NOT NULL,
`pedido` int(11) NOT NULL,
`data` datetime NOT NULL,
`id_status_pedido` int(11) NOT NULL,
`id_status_operacao` int(11) NOT NULL,
`id_produtos` int(11) NOT NULL,
`quantidade` int(11) NOT NULL,
`preco` decimal(10,2) NOT NULL,
`desconto` decimal(10,2) NOT NULL,
`taxa_de_entrega` decimal(10,2) NOT NULL,
`cupom_de_desconto` varchar(255) NOT NULL,
`valor_total` decimal(10,2) NOT NULL,
`pagamento` varchar(255) NOT NULL,
`txt_pedido` longtext NOT NULL,
`obs_pedido` longtext NOT NULL,
`historico` longtext NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `postagens` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_secoes` int(11) NOT NULL,
`id_categorias` int(11) NOT NULL,
`id_subcategorias` int(11) NOT NULL,
`nome` varchar(255) NOT NULL,
`imagem` char(4) NOT NULL,
`id_status_site` int(11) NOT NULL,
`data_expira` datetime NOT NULL,
`destaque` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não',
`id_etiquetas_postagem` int(11) NOT NULL,
`anexos` char(4) NOT NULL,
`video` varchar(255) NOT NULL,
`titulo` varchar(255) NOT NULL,
`subtitulo` varchar(255) NOT NULL,
`descricao` longtext NOT NULL,
`link` varchar(255) NOT NULL,
`fonte` varchar(255) NOT NULL,
`obs` longtext NOT NULL,
`background` varchar(255) NOT NULL,
`cortxt` varchar(255) NOT NULL,
`container` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não',
`borda` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não',
`borda_cor` varchar(255) NOT NULL,
`borda_sombra` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não',
`arredondado` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não',
`historico` longtext NOT NULL,
`data_cadastro` datetime NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `produtos` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_secoes` int(11) NOT NULL,
`id_categorias` int(11) NOT NULL,
`id_subcategorias` int(11) NOT NULL,
`nome` varchar(255) NOT NULL,
`imagem` char(4) NOT NULL,
`id_status_produto` int(11) NOT NULL,
`codigo` varchar(255) NOT NULL,
`data_expira` datetime NOT NULL,
`destaque` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não',
`id_etiquetas_produto` int(11) NOT NULL,
`estoque` int(11) NOT NULL,
`id_parceiros` int(11) NOT NULL,
`imagens` char(4) NOT NULL,
`video` varchar(255) NOT NULL,
`custo` decimal(10,2) NOT NULL,
`preco` decimal(10,2) NOT NULL,
`preco_2` decimal(10,2) NOT NULL,
`oferta` decimal(10,2) NOT NULL,
`desconto` decimal(10,2) NOT NULL,
`cupom_de_desconto` varchar(255) NOT NULL,
`marca` varchar(255) NOT NULL,
`modelo` varchar(255) NOT NULL,
`titulo` varchar(255) NOT NULL,
`subtitulo` varchar(255) NOT NULL,
`detalhe` varchar(255) NOT NULL,
`descricao` longtext NOT NULL,
`obs` longtext NOT NULL,
`link` varchar(255) NOT NULL,
`material` varchar(255) NOT NULL,
`cor` varchar(255) NOT NULL,
`peso` decimal(10,2) NOT NULL,
`volumes` int(11) NOT NULL,
`tamanho` varchar(255) NOT NULL,
`largura` int(11) NOT NULL,
`altura` int(11) NOT NULL,
`profundidade` decimal(10,2) NOT NULL,
`views` int(11) NOT NULL,
`liks` int(11) NOT NULL,
`pontos` int(11) NOT NULL,
`historico` longtext NOT NULL,
`data_cadastro` datetime NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `proprietarios` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL,
`nome` varchar(255) NOT NULL,
`foto` char(4) NOT NULL,
`id_status_cadastro` int(11) NOT NULL,
`ocupacao` varchar(255) NOT NULL,
`data_expira` datetime NOT NULL,
`retorno` datetime NOT NULL,
`cpf` varchar(255) NOT NULL,
`empresa` varchar(255) NOT NULL,
`cnpj` varchar(255) NOT NULL,
`e_mail` varchar(255) NOT NULL,
`senha` varchar(255) NOT NULL,
`e_mail_2` varchar(255) NOT NULL,
`telefone` varchar(255) NOT NULL,
`telefone_2` varchar(255) NOT NULL,
`cep` varchar(255) NOT NULL,
`endereco` varchar(255) NOT NULL,
`numero` varchar(255) NOT NULL,
`complemento` varchar(255) NOT NULL,
`bairro` varchar(255) NOT NULL,
`cidade` varchar(255) NOT NULL,
`estado` varchar(255) NOT NULL,
`pix` varchar(255) NOT NULL,
`banco` varchar(255) NOT NULL,
`agencia` varchar(255) NOT NULL,
`conta` varchar(255) NOT NULL,
`tipo_de_conta` varchar(255) NOT NULL,
`obs` longtext NOT NULL,
`enexos` char(4) NOT NULL,
`historico` longtext NOT NULL,
`data_cadastro` datetime NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `secoes` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL,
`nome` varchar(255) NOT NULL,
`imagem` char(4) NOT NULL,
`id_status_site` int(11) NOT NULL,
`data_expira` datetime NOT NULL,
`ordem` int(11) NOT NULL,
`titulo` varchar(255) NOT NULL,
`subtitulo` varchar(255) NOT NULL,
`descricao` longtext NOT NULL,
`obs` longtext NOT NULL,
`background` varchar(255) NOT NULL,
`cortxt` varchar(255) NOT NULL,
`container` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não',
`borda` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não',
`borda_cor` varchar(255) NOT NULL,
`borda_sombra` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não',
`arredondado` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não',
`parallax` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não',
`historico` longtext NOT NULL,
`data_cadastro` datetime NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `site` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`site` varchar(255) NOT NULL,
`nome` varchar(255) NOT NULL,
`id_status_site` int(11) NOT NULL,
`logo` char(4) NOT NULL,
`responsavel` varchar(255) NOT NULL,
`cargo` varchar(255) NOT NULL,
`fone` varchar(255) NOT NULL,
`email` varchar(255) NOT NULL,
`aberto` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não',
`titulo` varchar(255) NOT NULL,
`subtitulo` varchar(255) NOT NULL,
`palavras_chaves` varchar(255) NOT NULL,
`descricao` longtext NOT NULL,
`logo2` char(4) NOT NULL,
`logo3` char(4) NOT NULL,
`e_mail` varchar(255) NOT NULL,
`e_mail2` varchar(255) NOT NULL,
`e_mail3` varchar(255) NOT NULL,
`telefone` varchar(255) NOT NULL,
`telefone2` varchar(255) NOT NULL,
`telefone3` varchar(255) NOT NULL,
`cep` varchar(255) NOT NULL,
`endereco` varchar(255) NOT NULL,
`numero` varchar(255) NOT NULL,
`complemento` varchar(255) NOT NULL,
`bairro` varchar(255) NOT NULL,
`cidade` varchar(255) NOT NULL,
`estado` varchar(255) NOT NULL,
`endereco2` varchar(255) NOT NULL,
`endereco3` varchar(255) NOT NULL,
`horario` varchar(255) NOT NULL,
`horario2` varchar(255) NOT NULL,
`horario3` varchar(255) NOT NULL,
`textowhats` varchar(255) NOT NULL,
`textowhats2` varchar(255) NOT NULL,
`textowhats3` varchar(255) NOT NULL,
`textoauxiliar` varchar(255) NOT NULL,
`textoauxiliar2` varchar(255) NOT NULL,
`textoauxiliar3` varchar(255) NOT NULL,
`instagram` varchar(255) NOT NULL,
`facebook` varchar(255) NOT NULL,
`linkedin` varchar(255) NOT NULL,
`twitter` varchar(255) NOT NULL,
`youtube` varchar(255) NOT NULL,
`tiktok` varchar(255) NOT NULL,
`kwai` varchar(255) NOT NULL,
`google` varchar(255) NOT NULL,
`google_plus` varchar(255) NOT NULL,
`google_maps` varchar(255) NOT NULL,
`google_analitics` varchar(255) NOT NULL,
`play_store` varchar(255) NOT NULL,
`apple_store` varchar(255) NOT NULL,
`popup` longtext NOT NULL,
`aviso_de_cookies` varchar(255) NOT NULL,
`politica_de_cookies` longtext NOT NULL,
`politica_de_privacidade` longtext NOT NULL,
`termos_de_uso` longtext NOT NULL,
`contrato` longtext NOT NULL,
`contrato2` varchar(255) NOT NULL,
`contrato3` varchar(255) NOT NULL,
`obs` longtext NOT NULL,
`cor` varchar(255) NOT NULL,
`cor2` varchar(255) NOT NULL,
`cor3` varchar(255) NOT NULL,
`cor4` varchar(255) NOT NULL,
`cortxt` varchar(255) NOT NULL,
`cortxt2` varchar(255) NOT NULL,
`cortxt3` varchar(255) NOT NULL,
`cortxt4` varchar(255) NOT NULL,
`container` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não',
`borda` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não',
`borda_cor` varchar(255) NOT NULL,
`borda_sombra` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não',
`arredondado` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não',
`documentos` char(4) NOT NULL,
`historico` longtext NOT NULL,
`data_cadastro` datetime NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `status_cadastro` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL,
`nome` varchar(255) NOT NULL,
`label` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `status_imovel` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL,
`nome` varchar(255) NOT NULL,
`label` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `status_lancamento` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL,
`nome` varchar(255) NOT NULL,
`label` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `status_mkt` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL,
`nome` varchar(255) NOT NULL,
`label` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `status_negociacao` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL,
`nome` varchar(255) NOT NULL,
`label` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `status_operacao` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL,
`nome` varchar(255) NOT NULL,
`label` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `status_pedido` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL,
`nome` varchar(255) NOT NULL,
`label` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `status_produto` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL,
`nome` varchar(255) NOT NULL,
`label` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `status_site` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL,
`nome` varchar(255) NOT NULL,
`label` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `status_tarefa` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL,
`nome` varchar(255) NOT NULL,
`label` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `subcategorias` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_categorias` int(11) NOT NULL,
`nome` varchar(255) NOT NULL,
`imagem` char(4) NOT NULL,
`id_status_site` int(11) NOT NULL,
`data_expira` datetime NOT NULL,
`ordem` int(11) NOT NULL,
`titulo` varchar(255) NOT NULL,
`subtitulo` varchar(255) NOT NULL,
`descricao` longtext NOT NULL,
`obs` longtext NOT NULL,
`background` varchar(255) NOT NULL,
`cortxt` varchar(255) NOT NULL,
`container` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não',
`borda` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não',
`borda_cor` varchar(255) NOT NULL,
`borda_sombra` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não',
`arredondado` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não',
`parallax` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não',
`historico` longtext NOT NULL,
`data_cadastro` datetime NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `tarefas` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL,
`nome` varchar(255) NOT NULL,
`id_status_tarefa` int(11) NOT NULL,
`destaque` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não',
`data_expira` datetime NOT NULL,
`executada_de` datetime NOT NULL,
`executada_ate` datetime NOT NULL,
`lembrete_por_email` varchar(255) NOT NULL,
`repeticoes` int(11) NOT NULL,
`anexos` char(4) NOT NULL,
`titulo` varchar(255) NOT NULL,
`detalhe` varchar(255) NOT NULL,
`motivo` varchar(255) NOT NULL,
`descricao` longtext NOT NULL,
`observacao` longtext NOT NULL,
`historico` longtext NOT NULL,
`data_cadastro` datetime NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `taxa_de_entrega` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL,
`id_status_site` int(11) NOT NULL,
`bairro` varchar(255) NOT NULL,
`tarifa` decimal(10,2) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `tipos_imovel` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL,
`nome` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `tipos_lancamento` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL,
`nome` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `tipos_produto` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL,
`nome` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `tipos_tarefa` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL,
`nome` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `usuarios` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_pperfis` int(11) NOT NULL,
`nome` varchar(255) NOT NULL,
`e_mail` varchar(255) NOT NULL,
`senha` varchar(255) NOT NULL,
`telefone` varchar(255) NOT NULL,
`id_status_cadastro` int(11) NOT NULL,
`id_site` int(11) NOT NULL,
`obs` longtext NOT NULL,
`historico` longtext NOT NULL,
`data_cadastro` datetime NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

ALTER TABLE `aacoes` COMMENT 'aAções';
ALTER TABLE `ccampos` COMMENT 'cCampos';
ALTER TABLE `llogs` COMMENT 'lLogs';
ALTER TABLE `pperfis` COMMENT 'pPerfis';
ALTER TABLE `ppermissoes` COMMENT 'pPermissões';
ALTER TABLE `ttabelas` COMMENT 'tTabelas';
ALTER TABLE `carrinhos` COMMENT 'Carrinhos';
ALTER TABLE `categorias` COMMENT 'Categorias';
ALTER TABLE `clientes` COMMENT 'Clientes';
ALTER TABLE `corretores` COMMENT 'Corretores';
ALTER TABLE `cupons_de_descontos` COMMENT 'Cupons de Descontos';
ALTER TABLE `e_mails_automaticos` COMMENT 'E-mails Automáticos';
ALTER TABLE `e_mails_captados` COMMENT 'E-mails Captados';
ALTER TABLE `e_mails_mkt` COMMENT 'E-mails Mkt';
ALTER TABLE `enderecos` COMMENT 'Endereços';
ALTER TABLE `etiquetas_imovel` COMMENT 'Etiquetas Imóvel';
ALTER TABLE `etiquetas_postagem` COMMENT 'Etiquetas Postagem';
ALTER TABLE `etiquetas_produto` COMMENT 'Etiquetas Produto';
ALTER TABLE `imoveis` COMMENT 'Imóveis';
ALTER TABLE `lancamentos` COMMENT 'Lançamentos';
ALTER TABLE `parceiros` COMMENT 'Parceiros';
ALTER TABLE `pedidos` COMMENT 'Pedidos';
ALTER TABLE `postagens` COMMENT 'Postagens';
ALTER TABLE `produtos` COMMENT 'Produtos';
ALTER TABLE `proprietarios` COMMENT 'Proprietários';
ALTER TABLE `secoes` COMMENT 'Seções';
ALTER TABLE `site` COMMENT 'Site';
ALTER TABLE `status_cadastro` COMMENT 'Status Cadastro';
ALTER TABLE `status_imovel` COMMENT 'Status Imóvel';
ALTER TABLE `status_lancamento` COMMENT 'Status Lançamento';
ALTER TABLE `status_mkt` COMMENT 'Status Mkt';
ALTER TABLE `status_negociacao` COMMENT 'Status Negociação';
ALTER TABLE `status_operacao` COMMENT 'Status Operação';
ALTER TABLE `status_pedido` COMMENT 'Status Pedido';
ALTER TABLE `status_produto` COMMENT 'Status Produto';
ALTER TABLE `status_site` COMMENT 'Status Site';
ALTER TABLE `status_tarefa` COMMENT 'Status Tarefa';
ALTER TABLE `subcategorias` COMMENT 'Subcategorias';
ALTER TABLE `tarefas` COMMENT 'Tarefas';
ALTER TABLE `taxa_de_entrega` COMMENT 'Taxa de Entrega';
ALTER TABLE `tipos_imovel` COMMENT 'Tipos Imóvel';
ALTER TABLE `tipos_lancamento` COMMENT 'Tipos Lançamento';
ALTER TABLE `tipos_produto` COMMENT 'Tipos Produto';
ALTER TABLE `tipos_tarefa` COMMENT 'Tipos Tarefa';
ALTER TABLE `usuarios` COMMENT 'Usuários';

SET @dbname = DATABASE();
SET @tablename = "aacoes";
SET @columnname = "nome";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE aacoes
MODIFY COLUMN nome varchar(255) NOT NULL COMMENT 'Nome';


SET @dbname = DATABASE();
SET @tablename = "ccampos";
SET @columnname = "id_ttabelas";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE ccampos
MODIFY COLUMN id_ttabelas int(11) NOT NULL COMMENT 'Tabela';


SET @dbname = DATABASE();
SET @tablename = "ccampos";
SET @columnname = "nome";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE ccampos
MODIFY COLUMN nome varchar(255) NOT NULL COMMENT 'Nome';


SET @dbname = DATABASE();
SET @tablename = "llogs";
SET @columnname = "id_usuarios";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE llogs
MODIFY COLUMN id_usuarios int(11) NOT NULL COMMENT 'Usuário';


SET @dbname = DATABASE();
SET @tablename = "llogs";
SET @columnname = "ip";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE llogs
MODIFY COLUMN ip varchar(255) NOT NULL COMMENT 'IP';


SET @dbname = DATABASE();
SET @tablename = "llogs";
SET @columnname = "url";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE llogs
MODIFY COLUMN url varchar(255) NOT NULL COMMENT 'URL';


SET @dbname = DATABASE();
SET @tablename = "llogs";
SET @columnname = "arquivos";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE llogs
MODIFY COLUMN arquivos varchar(255) NOT NULL COMMENT 'Arquivos';


SET @dbname = DATABASE();
SET @tablename = "llogs";
SET @columnname = "data_hora";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " datetime NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE llogs
MODIFY COLUMN data_hora datetime NOT NULL COMMENT 'Data Hora';


SET @dbname = DATABASE();
SET @tablename = "llogs";
SET @columnname = "sql_executado";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE llogs
MODIFY COLUMN sql_executado longtext NOT NULL COMMENT 'SQL Executado';


SET @dbname = DATABASE();
SET @tablename = "llogs";
SET @columnname = "parametros";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE llogs
MODIFY COLUMN parametros longtext NOT NULL COMMENT 'Parâmetros';


SET @dbname = DATABASE();
SET @tablename = "pperfis";
SET @columnname = "nome";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE pperfis
MODIFY COLUMN nome varchar(255) NOT NULL COMMENT 'Nome';


SET @dbname = DATABASE();
SET @tablename = "ppermissoes";
SET @columnname = "id_pperfis";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE ppermissoes
MODIFY COLUMN id_pperfis int(11) NOT NULL COMMENT 'Perfil';


SET @dbname = DATABASE();
SET @tablename = "ppermissoes";
SET @columnname = "id_ttabelas";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE ppermissoes
MODIFY COLUMN id_ttabelas int(11) NOT NULL COMMENT 'Tabela';


SET @dbname = DATABASE();
SET @tablename = "ppermissoes";
SET @columnname = "id_ccampos";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE ppermissoes
MODIFY COLUMN id_ccampos int(11) NOT NULL COMMENT 'Campo';


SET @dbname = DATABASE();
SET @tablename = "ppermissoes";
SET @columnname = "id_aacoes";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE ppermissoes
MODIFY COLUMN id_aacoes int(11) NOT NULL COMMENT 'Ação';


SET @dbname = DATABASE();
SET @tablename = "ppermissoes";
SET @columnname = "permissao";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " set('Sim','Não') DEFAULT 'Não' NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE ppermissoes
MODIFY COLUMN permissao set('Sim','Não') DEFAULT 'Não' NOT NULL COMMENT 'Permissão';


SET @dbname = DATABASE();
SET @tablename = "ttabelas";
SET @columnname = "nome";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE ttabelas
MODIFY COLUMN nome varchar(255) NOT NULL COMMENT 'Nome';


SET @dbname = DATABASE();
SET @tablename = "ttabelas";
SET @columnname = "relacionamentos";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE ttabelas
MODIFY COLUMN relacionamentos longtext NOT NULL COMMENT 'relacionamentos';


SET @dbname = DATABASE();
SET @tablename = "carrinhos";
SET @columnname = "id_site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE carrinhos
MODIFY COLUMN id_site int(11) NOT NULL COMMENT 'Site';


SET @dbname = DATABASE();
SET @tablename = "carrinhos";
SET @columnname = "carrinho";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE carrinhos
MODIFY COLUMN carrinho varchar(255) NOT NULL COMMENT 'Carrinho';


SET @dbname = DATABASE();
SET @tablename = "carrinhos";
SET @columnname = "operacao";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE carrinhos
MODIFY COLUMN operacao varchar(255) NOT NULL COMMENT 'Operação';


SET @dbname = DATABASE();
SET @tablename = "carrinhos";
SET @columnname = "id_produtos";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE carrinhos
MODIFY COLUMN id_produtos int(11) NOT NULL COMMENT 'Produto';


SET @dbname = DATABASE();
SET @tablename = "carrinhos";
SET @columnname = "quantidade";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE carrinhos
MODIFY COLUMN quantidade int(11) NOT NULL COMMENT 'Quantidade';


SET @dbname = DATABASE();
SET @tablename = "carrinhos";
SET @columnname = "obs_do_pedido";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE carrinhos
MODIFY COLUMN obs_do_pedido longtext NOT NULL COMMENT 'Obs do Pedido';


SET @dbname = DATABASE();
SET @tablename = "carrinhos";
SET @columnname = "taxa_de_entrega";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " decimal(10,2) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE carrinhos
MODIFY COLUMN taxa_de_entrega decimal(10,2) NOT NULL COMMENT 'Taxa de Entrega';


SET @dbname = DATABASE();
SET @tablename = "carrinhos";
SET @columnname = "desconto";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " decimal(10,2) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE carrinhos
MODIFY COLUMN desconto decimal(10,2) NOT NULL COMMENT 'Desconto';


SET @dbname = DATABASE();
SET @tablename = "carrinhos";
SET @columnname = "cupom_de_desconto";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE carrinhos
MODIFY COLUMN cupom_de_desconto varchar(255) NOT NULL COMMENT 'Cupom de Desconto';


SET @dbname = DATABASE();
SET @tablename = "carrinhos";
SET @columnname = "historico";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE carrinhos
MODIFY COLUMN historico longtext NOT NULL COMMENT 'Histórico';


SET @dbname = DATABASE();
SET @tablename = "carrinhos";
SET @columnname = "data_cadastro";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " datetime NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE carrinhos
MODIFY COLUMN data_cadastro datetime NOT NULL COMMENT 'Data Cadastro';


SET @dbname = DATABASE();
SET @tablename = "categorias";
SET @columnname = "id_secoes";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE categorias
MODIFY COLUMN id_secoes int(11) NOT NULL COMMENT 'Seção';


SET @dbname = DATABASE();
SET @tablename = "categorias";
SET @columnname = "nome";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE categorias
MODIFY COLUMN nome varchar(255) NOT NULL COMMENT 'Nome';


SET @dbname = DATABASE();
SET @tablename = "categorias";
SET @columnname = "imagem";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " char(4) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE categorias
MODIFY COLUMN imagem char(4) NOT NULL COMMENT 'Imagem';


SET @dbname = DATABASE();
SET @tablename = "categorias";
SET @columnname = "id_status_site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE categorias
MODIFY COLUMN id_status_site int(11) NOT NULL COMMENT 'Status';


SET @dbname = DATABASE();
SET @tablename = "categorias";
SET @columnname = "data_expira";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " datetime NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE categorias
MODIFY COLUMN data_expira datetime NOT NULL COMMENT 'Data Expira';


SET @dbname = DATABASE();
SET @tablename = "categorias";
SET @columnname = "ordem";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE categorias
MODIFY COLUMN ordem int(11) NOT NULL COMMENT 'Ordem';


SET @dbname = DATABASE();
SET @tablename = "categorias";
SET @columnname = "titulo";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE categorias
MODIFY COLUMN titulo varchar(255) NOT NULL COMMENT 'Título';


SET @dbname = DATABASE();
SET @tablename = "categorias";
SET @columnname = "subtitulo";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE categorias
MODIFY COLUMN subtitulo varchar(255) NOT NULL COMMENT 'Subtítulo';


SET @dbname = DATABASE();
SET @tablename = "categorias";
SET @columnname = "descricao";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE categorias
MODIFY COLUMN descricao longtext NOT NULL COMMENT 'Descrição';


SET @dbname = DATABASE();
SET @tablename = "categorias";
SET @columnname = "obs";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE categorias
MODIFY COLUMN obs longtext NOT NULL COMMENT 'Obs';


SET @dbname = DATABASE();
SET @tablename = "categorias";
SET @columnname = "background";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE categorias
MODIFY COLUMN background varchar(255) NOT NULL COMMENT 'Background';


SET @dbname = DATABASE();
SET @tablename = "categorias";
SET @columnname = "cortxt";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE categorias
MODIFY COLUMN cortxt varchar(255) NOT NULL COMMENT 'CorTxt';


SET @dbname = DATABASE();
SET @tablename = "categorias";
SET @columnname = "container";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " set('Sim','Não') DEFAULT 'Não' NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE categorias
MODIFY COLUMN container set('Sim','Não') DEFAULT 'Não' NOT NULL COMMENT 'Container';


SET @dbname = DATABASE();
SET @tablename = "categorias";
SET @columnname = "borda";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " set('Sim','Não') DEFAULT 'Não' NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE categorias
MODIFY COLUMN borda set('Sim','Não') DEFAULT 'Não' NOT NULL COMMENT 'Borda';


SET @dbname = DATABASE();
SET @tablename = "categorias";
SET @columnname = "borda_cor";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE categorias
MODIFY COLUMN borda_cor varchar(255) NOT NULL COMMENT 'Borda Cor';


SET @dbname = DATABASE();
SET @tablename = "categorias";
SET @columnname = "borda_sombra";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " set('Sim','Não') DEFAULT 'Não' NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE categorias
MODIFY COLUMN borda_sombra set('Sim','Não') DEFAULT 'Não' NOT NULL COMMENT 'Borda Sombra';


SET @dbname = DATABASE();
SET @tablename = "categorias";
SET @columnname = "arredondado";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " set('Sim','Não') DEFAULT 'Não' NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE categorias
MODIFY COLUMN arredondado set('Sim','Não') DEFAULT 'Não' NOT NULL COMMENT 'Arredondado';


SET @dbname = DATABASE();
SET @tablename = "categorias";
SET @columnname = "parallax";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " set('Sim','Não') DEFAULT 'Não' NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE categorias
MODIFY COLUMN parallax set('Sim','Não') DEFAULT 'Não' NOT NULL COMMENT 'Parallax';


SET @dbname = DATABASE();
SET @tablename = "categorias";
SET @columnname = "historico";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE categorias
MODIFY COLUMN historico longtext NOT NULL COMMENT 'Histórico';


SET @dbname = DATABASE();
SET @tablename = "categorias";
SET @columnname = "data_cadastro";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " datetime NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE categorias
MODIFY COLUMN data_cadastro datetime NOT NULL COMMENT 'Data Cadastro';


SET @dbname = DATABASE();
SET @tablename = "clientes";
SET @columnname = "id_site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE clientes
MODIFY COLUMN id_site int(11) NOT NULL COMMENT 'Site';


SET @dbname = DATABASE();
SET @tablename = "clientes";
SET @columnname = "nome";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE clientes
MODIFY COLUMN nome varchar(255) NOT NULL COMMENT 'Nome';


SET @dbname = DATABASE();
SET @tablename = "clientes";
SET @columnname = "foto";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " char(4) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE clientes
MODIFY COLUMN foto char(4) NOT NULL COMMENT 'Foto';


SET @dbname = DATABASE();
SET @tablename = "clientes";
SET @columnname = "id_status_cadastro";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE clientes
MODIFY COLUMN id_status_cadastro int(11) NOT NULL COMMENT 'Status';


SET @dbname = DATABASE();
SET @tablename = "clientes";
SET @columnname = "data_expira";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " datetime NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE clientes
MODIFY COLUMN data_expira datetime NOT NULL COMMENT 'Data Expira';


SET @dbname = DATABASE();
SET @tablename = "clientes";
SET @columnname = "retorno";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " datetime NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE clientes
MODIFY COLUMN retorno datetime NOT NULL COMMENT 'Retorno';


SET @dbname = DATABASE();
SET @tablename = "clientes";
SET @columnname = "cpf";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE clientes
MODIFY COLUMN cpf varchar(255) NOT NULL COMMENT 'CPF';


SET @dbname = DATABASE();
SET @tablename = "clientes";
SET @columnname = "empresa";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE clientes
MODIFY COLUMN empresa varchar(255) NOT NULL COMMENT 'Empresa';


SET @dbname = DATABASE();
SET @tablename = "clientes";
SET @columnname = "cnpj";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE clientes
MODIFY COLUMN cnpj varchar(255) NOT NULL COMMENT 'CNPJ';


SET @dbname = DATABASE();
SET @tablename = "clientes";
SET @columnname = "e_mail";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE clientes
MODIFY COLUMN e_mail varchar(255) NOT NULL COMMENT 'E-mail';


SET @dbname = DATABASE();
SET @tablename = "clientes";
SET @columnname = "senha";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE clientes
MODIFY COLUMN senha varchar(255) NOT NULL COMMENT 'Senha';


SET @dbname = DATABASE();
SET @tablename = "clientes";
SET @columnname = "e_mail_2";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE clientes
MODIFY COLUMN e_mail_2 varchar(255) NOT NULL COMMENT 'E-mail 2';


SET @dbname = DATABASE();
SET @tablename = "clientes";
SET @columnname = "telefone";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE clientes
MODIFY COLUMN telefone varchar(255) NOT NULL COMMENT 'Telefone';


SET @dbname = DATABASE();
SET @tablename = "clientes";
SET @columnname = "telefone_2";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE clientes
MODIFY COLUMN telefone_2 varchar(255) NOT NULL COMMENT 'Telefone 2';


SET @dbname = DATABASE();
SET @tablename = "clientes";
SET @columnname = "cep";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE clientes
MODIFY COLUMN cep varchar(255) NOT NULL COMMENT 'CEP';


SET @dbname = DATABASE();
SET @tablename = "clientes";
SET @columnname = "endereco";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE clientes
MODIFY COLUMN endereco varchar(255) NOT NULL COMMENT 'Endereço';


SET @dbname = DATABASE();
SET @tablename = "clientes";
SET @columnname = "numero";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE clientes
MODIFY COLUMN numero varchar(255) NOT NULL COMMENT 'Número';


SET @dbname = DATABASE();
SET @tablename = "clientes";
SET @columnname = "complemento";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE clientes
MODIFY COLUMN complemento varchar(255) NOT NULL COMMENT 'Complemento';


SET @dbname = DATABASE();
SET @tablename = "clientes";
SET @columnname = "bairro";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE clientes
MODIFY COLUMN bairro varchar(255) NOT NULL COMMENT 'Bairro';


SET @dbname = DATABASE();
SET @tablename = "clientes";
SET @columnname = "cidade";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE clientes
MODIFY COLUMN cidade varchar(255) NOT NULL COMMENT 'Cidade';


SET @dbname = DATABASE();
SET @tablename = "clientes";
SET @columnname = "estado";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE clientes
MODIFY COLUMN estado varchar(255) NOT NULL COMMENT 'Estado';


SET @dbname = DATABASE();
SET @tablename = "clientes";
SET @columnname = "pix";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE clientes
MODIFY COLUMN pix varchar(255) NOT NULL COMMENT 'PIX';


SET @dbname = DATABASE();
SET @tablename = "clientes";
SET @columnname = "banco";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE clientes
MODIFY COLUMN banco varchar(255) NOT NULL COMMENT 'Banco';


SET @dbname = DATABASE();
SET @tablename = "clientes";
SET @columnname = "agencia";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE clientes
MODIFY COLUMN agencia varchar(255) NOT NULL COMMENT 'Agência';


SET @dbname = DATABASE();
SET @tablename = "clientes";
SET @columnname = "conta";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE clientes
MODIFY COLUMN conta varchar(255) NOT NULL COMMENT 'Conta';


SET @dbname = DATABASE();
SET @tablename = "clientes";
SET @columnname = "tipo_de_conta";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE clientes
MODIFY COLUMN tipo_de_conta varchar(255) NOT NULL COMMENT 'Tipo de Conta';


SET @dbname = DATABASE();
SET @tablename = "clientes";
SET @columnname = "obs";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE clientes
MODIFY COLUMN obs longtext NOT NULL COMMENT 'Obs';


SET @dbname = DATABASE();
SET @tablename = "clientes";
SET @columnname = "documentos";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " char(4) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE clientes
MODIFY COLUMN documentos char(4) NOT NULL COMMENT 'Documentos';


SET @dbname = DATABASE();
SET @tablename = "clientes";
SET @columnname = "historico";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE clientes
MODIFY COLUMN historico longtext NOT NULL COMMENT 'Histórico';


SET @dbname = DATABASE();
SET @tablename = "clientes";
SET @columnname = "data_cadastro";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " datetime NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE clientes
MODIFY COLUMN data_cadastro datetime NOT NULL COMMENT 'Data Cadastro';


SET @dbname = DATABASE();
SET @tablename = "corretores";
SET @columnname = "id_site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE corretores
MODIFY COLUMN id_site int(11) NOT NULL COMMENT 'Site';


SET @dbname = DATABASE();
SET @tablename = "corretores";
SET @columnname = "nome";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE corretores
MODIFY COLUMN nome varchar(255) NOT NULL COMMENT 'Nome';


SET @dbname = DATABASE();
SET @tablename = "corretores";
SET @columnname = "foto";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " char(4) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE corretores
MODIFY COLUMN foto char(4) NOT NULL COMMENT 'Foto';


SET @dbname = DATABASE();
SET @tablename = "corretores";
SET @columnname = "id_status_cadastro";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE corretores
MODIFY COLUMN id_status_cadastro int(11) NOT NULL COMMENT 'Status';


SET @dbname = DATABASE();
SET @tablename = "corretores";
SET @columnname = "creci";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE corretores
MODIFY COLUMN creci varchar(255) NOT NULL COMMENT 'CRECI';


SET @dbname = DATABASE();
SET @tablename = "corretores";
SET @columnname = "data_expira";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " datetime NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE corretores
MODIFY COLUMN data_expira datetime NOT NULL COMMENT 'Data Expira';


SET @dbname = DATABASE();
SET @tablename = "corretores";
SET @columnname = "retorno";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " datetime NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE corretores
MODIFY COLUMN retorno datetime NOT NULL COMMENT 'Retorno';


SET @dbname = DATABASE();
SET @tablename = "corretores";
SET @columnname = "cpf";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE corretores
MODIFY COLUMN cpf varchar(255) NOT NULL COMMENT 'CPF';


SET @dbname = DATABASE();
SET @tablename = "corretores";
SET @columnname = "empresa";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE corretores
MODIFY COLUMN empresa varchar(255) NOT NULL COMMENT 'Empresa';


SET @dbname = DATABASE();
SET @tablename = "corretores";
SET @columnname = "cnpj";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE corretores
MODIFY COLUMN cnpj varchar(255) NOT NULL COMMENT 'CNPJ';


SET @dbname = DATABASE();
SET @tablename = "corretores";
SET @columnname = "e_mail";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE corretores
MODIFY COLUMN e_mail varchar(255) NOT NULL COMMENT 'E-mail';


SET @dbname = DATABASE();
SET @tablename = "corretores";
SET @columnname = "senha";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE corretores
MODIFY COLUMN senha varchar(255) NOT NULL COMMENT 'Senha';


SET @dbname = DATABASE();
SET @tablename = "corretores";
SET @columnname = "e_mail_2";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE corretores
MODIFY COLUMN e_mail_2 varchar(255) NOT NULL COMMENT 'E-mail 2';


SET @dbname = DATABASE();
SET @tablename = "corretores";
SET @columnname = "telefone";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE corretores
MODIFY COLUMN telefone varchar(255) NOT NULL COMMENT 'Telefone';


SET @dbname = DATABASE();
SET @tablename = "corretores";
SET @columnname = "telefone_2";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE corretores
MODIFY COLUMN telefone_2 varchar(255) NOT NULL COMMENT 'Telefone 2';


SET @dbname = DATABASE();
SET @tablename = "corretores";
SET @columnname = "cep";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE corretores
MODIFY COLUMN cep varchar(255) NOT NULL COMMENT 'CEP';


SET @dbname = DATABASE();
SET @tablename = "corretores";
SET @columnname = "endereco";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE corretores
MODIFY COLUMN endereco varchar(255) NOT NULL COMMENT 'Endereço';


SET @dbname = DATABASE();
SET @tablename = "corretores";
SET @columnname = "numero";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE corretores
MODIFY COLUMN numero varchar(255) NOT NULL COMMENT 'Número';


SET @dbname = DATABASE();
SET @tablename = "corretores";
SET @columnname = "complemento";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE corretores
MODIFY COLUMN complemento varchar(255) NOT NULL COMMENT 'Complemento';


SET @dbname = DATABASE();
SET @tablename = "corretores";
SET @columnname = "bairro";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE corretores
MODIFY COLUMN bairro varchar(255) NOT NULL COMMENT 'Bairro';


SET @dbname = DATABASE();
SET @tablename = "corretores";
SET @columnname = "cidade";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE corretores
MODIFY COLUMN cidade varchar(255) NOT NULL COMMENT 'Cidade';


SET @dbname = DATABASE();
SET @tablename = "corretores";
SET @columnname = "estado";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE corretores
MODIFY COLUMN estado varchar(255) NOT NULL COMMENT 'Estado';


SET @dbname = DATABASE();
SET @tablename = "corretores";
SET @columnname = "pix";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE corretores
MODIFY COLUMN pix varchar(255) NOT NULL COMMENT 'PIX';


SET @dbname = DATABASE();
SET @tablename = "corretores";
SET @columnname = "banco";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE corretores
MODIFY COLUMN banco varchar(255) NOT NULL COMMENT 'Banco';


SET @dbname = DATABASE();
SET @tablename = "corretores";
SET @columnname = "agencia";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE corretores
MODIFY COLUMN agencia varchar(255) NOT NULL COMMENT 'Agência';


SET @dbname = DATABASE();
SET @tablename = "corretores";
SET @columnname = "conta";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE corretores
MODIFY COLUMN conta varchar(255) NOT NULL COMMENT 'Conta';


SET @dbname = DATABASE();
SET @tablename = "corretores";
SET @columnname = "tipo_de_conta";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE corretores
MODIFY COLUMN tipo_de_conta varchar(255) NOT NULL COMMENT 'Tipo de Conta';


SET @dbname = DATABASE();
SET @tablename = "corretores";
SET @columnname = "obs";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE corretores
MODIFY COLUMN obs longtext NOT NULL COMMENT 'Obs';


SET @dbname = DATABASE();
SET @tablename = "corretores";
SET @columnname = "documentos";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " char(4) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE corretores
MODIFY COLUMN documentos char(4) NOT NULL COMMENT 'Documentos';


SET @dbname = DATABASE();
SET @tablename = "corretores";
SET @columnname = "historico";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE corretores
MODIFY COLUMN historico longtext NOT NULL COMMENT 'Histórico';


SET @dbname = DATABASE();
SET @tablename = "corretores";
SET @columnname = "data_cadastro";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " datetime NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE corretores
MODIFY COLUMN data_cadastro datetime NOT NULL COMMENT 'Data Cadastro';


SET @dbname = DATABASE();
SET @tablename = "cupons_de_descontos";
SET @columnname = "id_site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE cupons_de_descontos
MODIFY COLUMN id_site int(11) NOT NULL COMMENT 'Site';


SET @dbname = DATABASE();
SET @tablename = "cupons_de_descontos";
SET @columnname = "nome";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE cupons_de_descontos
MODIFY COLUMN nome varchar(255) NOT NULL COMMENT 'Nome';


SET @dbname = DATABASE();
SET @tablename = "cupons_de_descontos";
SET @columnname = "imagem";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " char(4) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE cupons_de_descontos
MODIFY COLUMN imagem char(4) NOT NULL COMMENT 'Imagem';


SET @dbname = DATABASE();
SET @tablename = "cupons_de_descontos";
SET @columnname = "id_status_site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE cupons_de_descontos
MODIFY COLUMN id_status_site int(11) NOT NULL COMMENT 'Status';


SET @dbname = DATABASE();
SET @tablename = "cupons_de_descontos";
SET @columnname = "codigo";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE cupons_de_descontos
MODIFY COLUMN codigo varchar(255) NOT NULL COMMENT 'Código';


SET @dbname = DATABASE();
SET @tablename = "cupons_de_descontos";
SET @columnname = "data_expira";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " datetime NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE cupons_de_descontos
MODIFY COLUMN data_expira datetime NOT NULL COMMENT 'Data Expira';


SET @dbname = DATABASE();
SET @tablename = "cupons_de_descontos";
SET @columnname = "titulo";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE cupons_de_descontos
MODIFY COLUMN titulo varchar(255) NOT NULL COMMENT 'Título';


SET @dbname = DATABASE();
SET @tablename = "cupons_de_descontos";
SET @columnname = "descricao";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE cupons_de_descontos
MODIFY COLUMN descricao longtext NOT NULL COMMENT 'Descrição';


SET @dbname = DATABASE();
SET @tablename = "cupons_de_descontos";
SET @columnname = "obs";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE cupons_de_descontos
MODIFY COLUMN obs longtext NOT NULL COMMENT 'Obs';


SET @dbname = DATABASE();
SET @tablename = "cupons_de_descontos";
SET @columnname = "historico";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE cupons_de_descontos
MODIFY COLUMN historico longtext NOT NULL COMMENT 'Histórico';


SET @dbname = DATABASE();
SET @tablename = "cupons_de_descontos";
SET @columnname = "data_cadastro";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " datetime NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE cupons_de_descontos
MODIFY COLUMN data_cadastro datetime NOT NULL COMMENT 'Data Cadastro';


SET @dbname = DATABASE();
SET @tablename = "e_mails_automaticos";
SET @columnname = "id_site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE e_mails_automaticos
MODIFY COLUMN id_site int(11) NOT NULL COMMENT 'Site';


SET @dbname = DATABASE();
SET @tablename = "e_mails_automaticos";
SET @columnname = "tipo";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE e_mails_automaticos
MODIFY COLUMN tipo varchar(255) NOT NULL COMMENT 'Tipo';


SET @dbname = DATABASE();
SET @tablename = "e_mails_automaticos";
SET @columnname = "id_status_site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE e_mails_automaticos
MODIFY COLUMN id_status_site int(11) NOT NULL COMMENT 'Status';


SET @dbname = DATABASE();
SET @tablename = "e_mails_automaticos";
SET @columnname = "titulo";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE e_mails_automaticos
MODIFY COLUMN titulo varchar(255) NOT NULL COMMENT 'Título';


SET @dbname = DATABASE();
SET @tablename = "e_mails_automaticos";
SET @columnname = "mensagem";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE e_mails_automaticos
MODIFY COLUMN mensagem longtext NOT NULL COMMENT 'Mensagem';


SET @dbname = DATABASE();
SET @tablename = "e_mails_automaticos";
SET @columnname = "historico";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE e_mails_automaticos
MODIFY COLUMN historico longtext NOT NULL COMMENT 'Histórico';


SET @dbname = DATABASE();
SET @tablename = "e_mails_automaticos";
SET @columnname = "data_cadastro";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " datetime NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE e_mails_automaticos
MODIFY COLUMN data_cadastro datetime NOT NULL COMMENT 'Data Cadastro';


SET @dbname = DATABASE();
SET @tablename = "e_mails_captados";
SET @columnname = "id_site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE e_mails_captados
MODIFY COLUMN id_site int(11) NOT NULL COMMENT 'Site';


SET @dbname = DATABASE();
SET @tablename = "e_mails_captados";
SET @columnname = "nome";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE e_mails_captados
MODIFY COLUMN nome varchar(255) NOT NULL COMMENT 'Nome';


SET @dbname = DATABASE();
SET @tablename = "e_mails_captados";
SET @columnname = "empresa";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE e_mails_captados
MODIFY COLUMN empresa varchar(255) NOT NULL COMMENT 'Empresa';


SET @dbname = DATABASE();
SET @tablename = "e_mails_captados";
SET @columnname = "id_status_site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE e_mails_captados
MODIFY COLUMN id_status_site int(11) NOT NULL COMMENT 'Status';


SET @dbname = DATABASE();
SET @tablename = "e_mails_captados";
SET @columnname = "telefone";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE e_mails_captados
MODIFY COLUMN telefone varchar(255) NOT NULL COMMENT 'Telefone';


SET @dbname = DATABASE();
SET @tablename = "e_mails_captados";
SET @columnname = "e_mail";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE e_mails_captados
MODIFY COLUMN e_mail varchar(255) NOT NULL COMMENT 'E-mail';


SET @dbname = DATABASE();
SET @tablename = "e_mails_captados";
SET @columnname = "fonte";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE e_mails_captados
MODIFY COLUMN fonte varchar(255) NOT NULL COMMENT 'Fonte';


SET @dbname = DATABASE();
SET @tablename = "e_mails_captados";
SET @columnname = "obs";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE e_mails_captados
MODIFY COLUMN obs longtext NOT NULL COMMENT 'Obs';


SET @dbname = DATABASE();
SET @tablename = "e_mails_captados";
SET @columnname = "historico";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE e_mails_captados
MODIFY COLUMN historico longtext NOT NULL COMMENT 'Histórico';


SET @dbname = DATABASE();
SET @tablename = "e_mails_captados";
SET @columnname = "data_cadastro";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " datetime NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE e_mails_captados
MODIFY COLUMN data_cadastro datetime NOT NULL COMMENT 'Data Cadastro';


SET @dbname = DATABASE();
SET @tablename = "e_mails_mkt";
SET @columnname = "id_site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE e_mails_mkt
MODIFY COLUMN id_site int(11) NOT NULL COMMENT 'Site';


SET @dbname = DATABASE();
SET @tablename = "e_mails_mkt";
SET @columnname = "tipo";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE e_mails_mkt
MODIFY COLUMN tipo varchar(255) NOT NULL COMMENT 'Tipo';


SET @dbname = DATABASE();
SET @tablename = "e_mails_mkt";
SET @columnname = "id_status_mkt";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE e_mails_mkt
MODIFY COLUMN id_status_mkt int(11) NOT NULL COMMENT 'Status';


SET @dbname = DATABASE();
SET @tablename = "e_mails_mkt";
SET @columnname = "destinatario";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE e_mails_mkt
MODIFY COLUMN destinatario longtext NOT NULL COMMENT 'Destinatário';


SET @dbname = DATABASE();
SET @tablename = "e_mails_mkt";
SET @columnname = "copia_oculta";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE e_mails_mkt
MODIFY COLUMN copia_oculta longtext NOT NULL COMMENT 'Cópia Oculta';


SET @dbname = DATABASE();
SET @tablename = "e_mails_mkt";
SET @columnname = "titulo";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE e_mails_mkt
MODIFY COLUMN titulo varchar(255) NOT NULL COMMENT 'Título';


SET @dbname = DATABASE();
SET @tablename = "e_mails_mkt";
SET @columnname = "mensagem";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE e_mails_mkt
MODIFY COLUMN mensagem longtext NOT NULL COMMENT 'Mensagem';


SET @dbname = DATABASE();
SET @tablename = "e_mails_mkt";
SET @columnname = "obs";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE e_mails_mkt
MODIFY COLUMN obs longtext NOT NULL COMMENT 'Obs';


SET @dbname = DATABASE();
SET @tablename = "e_mails_mkt";
SET @columnname = "data_envio";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " datetime NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE e_mails_mkt
MODIFY COLUMN data_envio datetime NOT NULL COMMENT 'Data Envio';


SET @dbname = DATABASE();
SET @tablename = "e_mails_mkt";
SET @columnname = "historico";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE e_mails_mkt
MODIFY COLUMN historico longtext NOT NULL COMMENT 'Histórico';


SET @dbname = DATABASE();
SET @tablename = "e_mails_mkt";
SET @columnname = "data_cadastro";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " datetime NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE e_mails_mkt
MODIFY COLUMN data_cadastro datetime NOT NULL COMMENT 'Data Cadastro';


SET @dbname = DATABASE();
SET @tablename = "enderecos";
SET @columnname = "id_clientes";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE enderecos
MODIFY COLUMN id_clientes int(11) NOT NULL COMMENT 'Cliente';


SET @dbname = DATABASE();
SET @tablename = "enderecos";
SET @columnname = "nome";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE enderecos
MODIFY COLUMN nome varchar(255) NOT NULL COMMENT 'Nome';


SET @dbname = DATABASE();
SET @tablename = "enderecos";
SET @columnname = "cpf";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE enderecos
MODIFY COLUMN cpf varchar(255) NOT NULL COMMENT 'CPF';


SET @dbname = DATABASE();
SET @tablename = "enderecos";
SET @columnname = "telefone";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE enderecos
MODIFY COLUMN telefone varchar(255) NOT NULL COMMENT 'Telefone';


SET @dbname = DATABASE();
SET @tablename = "enderecos";
SET @columnname = "cep";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE enderecos
MODIFY COLUMN cep varchar(255) NOT NULL COMMENT 'CEP';


SET @dbname = DATABASE();
SET @tablename = "enderecos";
SET @columnname = "endereco";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE enderecos
MODIFY COLUMN endereco varchar(255) NOT NULL COMMENT 'Endereço';


SET @dbname = DATABASE();
SET @tablename = "enderecos";
SET @columnname = "numero";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE enderecos
MODIFY COLUMN numero varchar(255) NOT NULL COMMENT 'Número';


SET @dbname = DATABASE();
SET @tablename = "enderecos";
SET @columnname = "complemento";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE enderecos
MODIFY COLUMN complemento varchar(255) NOT NULL COMMENT 'Complemento';


SET @dbname = DATABASE();
SET @tablename = "enderecos";
SET @columnname = "bairro";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE enderecos
MODIFY COLUMN bairro varchar(255) NOT NULL COMMENT 'Bairro';


SET @dbname = DATABASE();
SET @tablename = "enderecos";
SET @columnname = "cidade";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE enderecos
MODIFY COLUMN cidade varchar(255) NOT NULL COMMENT 'Cidade';


SET @dbname = DATABASE();
SET @tablename = "enderecos";
SET @columnname = "estado";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE enderecos
MODIFY COLUMN estado varchar(255) NOT NULL COMMENT 'Estado';


SET @dbname = DATABASE();
SET @tablename = "enderecos";
SET @columnname = "obs";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE enderecos
MODIFY COLUMN obs longtext NOT NULL COMMENT 'Obs';


SET @dbname = DATABASE();
SET @tablename = "enderecos";
SET @columnname = "historico";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE enderecos
MODIFY COLUMN historico longtext NOT NULL COMMENT 'Histórico';


SET @dbname = DATABASE();
SET @tablename = "enderecos";
SET @columnname = "data_cadastro";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " datetime NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE enderecos
MODIFY COLUMN data_cadastro datetime NOT NULL COMMENT 'Data Cadastro';


SET @dbname = DATABASE();
SET @tablename = "etiquetas_imovel";
SET @columnname = "id_site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE etiquetas_imovel
MODIFY COLUMN id_site int(11) NOT NULL COMMENT 'Site';


SET @dbname = DATABASE();
SET @tablename = "etiquetas_imovel";
SET @columnname = "nome";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE etiquetas_imovel
MODIFY COLUMN nome varchar(255) NOT NULL COMMENT 'Nome';


SET @dbname = DATABASE();
SET @tablename = "etiquetas_imovel";
SET @columnname = "label";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE etiquetas_imovel
MODIFY COLUMN label varchar(255) NOT NULL COMMENT 'Label';


SET @dbname = DATABASE();
SET @tablename = "etiquetas_postagem";
SET @columnname = "id_site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE etiquetas_postagem
MODIFY COLUMN id_site int(11) NOT NULL COMMENT 'Site';


SET @dbname = DATABASE();
SET @tablename = "etiquetas_postagem";
SET @columnname = "nome";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE etiquetas_postagem
MODIFY COLUMN nome varchar(255) NOT NULL COMMENT 'Nome';


SET @dbname = DATABASE();
SET @tablename = "etiquetas_postagem";
SET @columnname = "label";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE etiquetas_postagem
MODIFY COLUMN label varchar(255) NOT NULL COMMENT 'Label';


SET @dbname = DATABASE();
SET @tablename = "etiquetas_produto";
SET @columnname = "id_site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE etiquetas_produto
MODIFY COLUMN id_site int(11) NOT NULL COMMENT 'Site';


SET @dbname = DATABASE();
SET @tablename = "etiquetas_produto";
SET @columnname = "nome";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE etiquetas_produto
MODIFY COLUMN nome varchar(255) NOT NULL COMMENT 'Nome';


SET @dbname = DATABASE();
SET @tablename = "etiquetas_produto";
SET @columnname = "label";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE etiquetas_produto
MODIFY COLUMN label varchar(255) NOT NULL COMMENT 'Label';


SET @dbname = DATABASE();
SET @tablename = "imoveis";
SET @columnname = "id_secoes";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE imoveis
MODIFY COLUMN id_secoes int(11) NOT NULL COMMENT 'Seção';


SET @dbname = DATABASE();
SET @tablename = "imoveis";
SET @columnname = "id_categorias";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE imoveis
MODIFY COLUMN id_categorias int(11) NOT NULL COMMENT 'Categoria';


SET @dbname = DATABASE();
SET @tablename = "imoveis";
SET @columnname = "id_subcategorias";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE imoveis
MODIFY COLUMN id_subcategorias int(11) NOT NULL COMMENT 'Subcategoria';


SET @dbname = DATABASE();
SET @tablename = "imoveis";
SET @columnname = "nome";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE imoveis
MODIFY COLUMN nome varchar(255) NOT NULL COMMENT 'Nome';


SET @dbname = DATABASE();
SET @tablename = "imoveis";
SET @columnname = "imagem";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " char(4) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE imoveis
MODIFY COLUMN imagem char(4) NOT NULL COMMENT 'Imagem';


SET @dbname = DATABASE();
SET @tablename = "imoveis";
SET @columnname = "id_status_imovel";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE imoveis
MODIFY COLUMN id_status_imovel int(11) NOT NULL COMMENT 'Status';


SET @dbname = DATABASE();
SET @tablename = "imoveis";
SET @columnname = "codigo";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE imoveis
MODIFY COLUMN codigo varchar(255) NOT NULL COMMENT 'Código';


SET @dbname = DATABASE();
SET @tablename = "imoveis";
SET @columnname = "data_expira";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " datetime NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE imoveis
MODIFY COLUMN data_expira datetime NOT NULL COMMENT 'Data Expira';


SET @dbname = DATABASE();
SET @tablename = "imoveis";
SET @columnname = "destaque";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " set('Sim','Não') DEFAULT 'Não' NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE imoveis
MODIFY COLUMN destaque set('Sim','Não') DEFAULT 'Não' NOT NULL COMMENT 'Destaque';


SET @dbname = DATABASE();
SET @tablename = "imoveis";
SET @columnname = "id_etiquetas_imovel";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE imoveis
MODIFY COLUMN id_etiquetas_imovel int(11) NOT NULL COMMENT 'Etiqueta';


SET @dbname = DATABASE();
SET @tablename = "imoveis";
SET @columnname = "id_status_negociacao";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE imoveis
MODIFY COLUMN id_status_negociacao int(11) NOT NULL COMMENT 'Negociação';


SET @dbname = DATABASE();
SET @tablename = "imoveis";
SET @columnname = "id_tipos_imovel";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE imoveis
MODIFY COLUMN id_tipos_imovel int(11) NOT NULL COMMENT 'Tipo';


SET @dbname = DATABASE();
SET @tablename = "imoveis";
SET @columnname = "exclusivo";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " set('Sim','Não') DEFAULT 'Não' NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE imoveis
MODIFY COLUMN exclusivo set('Sim','Não') DEFAULT 'Não' NOT NULL COMMENT 'Exclusivo';


SET @dbname = DATABASE();
SET @tablename = "imoveis";
SET @columnname = "escriturado";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " set('Sim','Não') DEFAULT 'Não' NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE imoveis
MODIFY COLUMN escriturado set('Sim','Não') DEFAULT 'Não' NOT NULL COMMENT 'Escriturado';


SET @dbname = DATABASE();
SET @tablename = "imoveis";
SET @columnname = "id_corretores";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE imoveis
MODIFY COLUMN id_corretores int(11) NOT NULL COMMENT 'Corretor';


SET @dbname = DATABASE();
SET @tablename = "imoveis";
SET @columnname = "id_proprietarios";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE imoveis
MODIFY COLUMN id_proprietarios int(11) NOT NULL COMMENT 'Proprietário';


SET @dbname = DATABASE();
SET @tablename = "imoveis";
SET @columnname = "area_total";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE imoveis
MODIFY COLUMN area_total int(11) NOT NULL COMMENT 'Área Total';


SET @dbname = DATABASE();
SET @tablename = "imoveis";
SET @columnname = "area_construida";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE imoveis
MODIFY COLUMN area_construida int(11) NOT NULL COMMENT 'Área Construída';


SET @dbname = DATABASE();
SET @tablename = "imoveis";
SET @columnname = "valor_venda";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " decimal(10,2) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE imoveis
MODIFY COLUMN valor_venda decimal(10,2) NOT NULL COMMENT 'Valor Venda';


SET @dbname = DATABASE();
SET @tablename = "imoveis";
SET @columnname = "valor_aluguel";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " decimal(10,2) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE imoveis
MODIFY COLUMN valor_aluguel decimal(10,2) NOT NULL COMMENT 'Valor Aluguel';


SET @dbname = DATABASE();
SET @tablename = "imoveis";
SET @columnname = "valor_condominio";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " decimal(10,2) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE imoveis
MODIFY COLUMN valor_condominio decimal(10,2) NOT NULL COMMENT 'Valor Condomínio';


SET @dbname = DATABASE();
SET @tablename = "imoveis";
SET @columnname = "valor_caucao";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE imoveis
MODIFY COLUMN valor_caucao varchar(255) NOT NULL COMMENT 'Valor Caução';


SET @dbname = DATABASE();
SET @tablename = "imoveis";
SET @columnname = "outros_valores";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE imoveis
MODIFY COLUMN outros_valores varchar(255) NOT NULL COMMENT 'Outros Valores';


SET @dbname = DATABASE();
SET @tablename = "imoveis";
SET @columnname = "comissao";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE imoveis
MODIFY COLUMN comissao varchar(255) NOT NULL COMMENT 'Comissão';


SET @dbname = DATABASE();
SET @tablename = "imoveis";
SET @columnname = "imagens";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " char(4) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE imoveis
MODIFY COLUMN imagens char(4) NOT NULL COMMENT 'Imagens';


SET @dbname = DATABASE();
SET @tablename = "imoveis";
SET @columnname = "video";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE imoveis
MODIFY COLUMN video varchar(255) NOT NULL COMMENT 'Vídeo';


SET @dbname = DATABASE();
SET @tablename = "imoveis";
SET @columnname = "titulo";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE imoveis
MODIFY COLUMN titulo varchar(255) NOT NULL COMMENT 'Título';


SET @dbname = DATABASE();
SET @tablename = "imoveis";
SET @columnname = "detalhes";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE imoveis
MODIFY COLUMN detalhes longtext NOT NULL COMMENT 'Detalhes';


SET @dbname = DATABASE();
SET @tablename = "imoveis";
SET @columnname = "descricao";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE imoveis
MODIFY COLUMN descricao longtext NOT NULL COMMENT 'Descrição';


SET @dbname = DATABASE();
SET @tablename = "imoveis";
SET @columnname = "obs";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE imoveis
MODIFY COLUMN obs longtext NOT NULL COMMENT 'Obs';


SET @dbname = DATABASE();
SET @tablename = "imoveis";
SET @columnname = "documentos";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " char(4) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE imoveis
MODIFY COLUMN documentos char(4) NOT NULL COMMENT 'Documentos';


SET @dbname = DATABASE();
SET @tablename = "imoveis";
SET @columnname = "historico";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE imoveis
MODIFY COLUMN historico longtext NOT NULL COMMENT 'Histórico';


SET @dbname = DATABASE();
SET @tablename = "imoveis";
SET @columnname = "data_cadastro";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " datetime NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE imoveis
MODIFY COLUMN data_cadastro datetime NOT NULL COMMENT 'Data Cadastro';


SET @dbname = DATABASE();
SET @tablename = "lancamentos";
SET @columnname = "id_site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE lancamentos
MODIFY COLUMN id_site int(11) NOT NULL COMMENT 'Site';


SET @dbname = DATABASE();
SET @tablename = "lancamentos";
SET @columnname = "id_tipos_lancamento";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE lancamentos
MODIFY COLUMN id_tipos_lancamento int(11) NOT NULL COMMENT 'Tipo';


SET @dbname = DATABASE();
SET @tablename = "lancamentos";
SET @columnname = "imagem";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " char(4) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE lancamentos
MODIFY COLUMN imagem char(4) NOT NULL COMMENT 'Imagem';


SET @dbname = DATABASE();
SET @tablename = "lancamentos";
SET @columnname = "id_status_lancamento";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE lancamentos
MODIFY COLUMN id_status_lancamento int(11) NOT NULL COMMENT 'Status';


SET @dbname = DATABASE();
SET @tablename = "lancamentos";
SET @columnname = "destaque";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " set('Sim','Não') DEFAULT 'Não' NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE lancamentos
MODIFY COLUMN destaque set('Sim','Não') DEFAULT 'Não' NOT NULL COMMENT 'Destaque';


SET @dbname = DATABASE();
SET @tablename = "lancamentos";
SET @columnname = "documentos";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " char(4) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE lancamentos
MODIFY COLUMN documentos char(4) NOT NULL COMMENT 'Documentos';


SET @dbname = DATABASE();
SET @tablename = "lancamentos";
SET @columnname = "id_pedidos";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE lancamentos
MODIFY COLUMN id_pedidos int(11) NOT NULL COMMENT 'Pedido';


SET @dbname = DATABASE();
SET @tablename = "lancamentos";
SET @columnname = "id_clientes";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE lancamentos
MODIFY COLUMN id_clientes int(11) NOT NULL COMMENT 'Cliente';


SET @dbname = DATABASE();
SET @tablename = "lancamentos";
SET @columnname = "id_parceiros";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE lancamentos
MODIFY COLUMN id_parceiros int(11) NOT NULL COMMENT 'Parceiro';


SET @dbname = DATABASE();
SET @tablename = "lancamentos";
SET @columnname = "terceiro";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE lancamentos
MODIFY COLUMN terceiro longtext NOT NULL COMMENT 'Terceiro';


SET @dbname = DATABASE();
SET @tablename = "lancamentos";
SET @columnname = "telefone";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE lancamentos
MODIFY COLUMN telefone varchar(255) NOT NULL COMMENT 'Telefone';


SET @dbname = DATABASE();
SET @tablename = "lancamentos";
SET @columnname = "e_mail";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE lancamentos
MODIFY COLUMN e_mail varchar(255) NOT NULL COMMENT 'E-mail';


SET @dbname = DATABASE();
SET @tablename = "lancamentos";
SET @columnname = "titulo";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE lancamentos
MODIFY COLUMN titulo varchar(255) NOT NULL COMMENT 'Título';


SET @dbname = DATABASE();
SET @tablename = "lancamentos";
SET @columnname = "detalhe";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE lancamentos
MODIFY COLUMN detalhe varchar(255) NOT NULL COMMENT 'Detalhe';


SET @dbname = DATABASE();
SET @tablename = "lancamentos";
SET @columnname = "descricao";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE lancamentos
MODIFY COLUMN descricao longtext NOT NULL COMMENT 'Descrição';


SET @dbname = DATABASE();
SET @tablename = "lancamentos";
SET @columnname = "pagamento";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE lancamentos
MODIFY COLUMN pagamento varchar(255) NOT NULL COMMENT 'Pagamento';


SET @dbname = DATABASE();
SET @tablename = "lancamentos";
SET @columnname = "parcelas";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE lancamentos
MODIFY COLUMN parcelas int(11) NOT NULL COMMENT 'Parcelas';


SET @dbname = DATABASE();
SET @tablename = "lancamentos";
SET @columnname = "valor";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " decimal(10,2) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE lancamentos
MODIFY COLUMN valor decimal(10,2) NOT NULL COMMENT 'Valor';


SET @dbname = DATABASE();
SET @tablename = "lancamentos";
SET @columnname = "valor_total";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " decimal(10,2) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE lancamentos
MODIFY COLUMN valor_total decimal(10,2) NOT NULL COMMENT 'Valor Total';


SET @dbname = DATABASE();
SET @tablename = "lancamentos";
SET @columnname = "valor_recorrente";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " decimal(10,2) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE lancamentos
MODIFY COLUMN valor_recorrente decimal(10,2) NOT NULL COMMENT 'Valor Recorrente';


SET @dbname = DATABASE();
SET @tablename = "lancamentos";
SET @columnname = "proximo_pagamento";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " date NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE lancamentos
MODIFY COLUMN proximo_pagamento date NOT NULL COMMENT 'Próximo Pagamento';


SET @dbname = DATABASE();
SET @tablename = "lancamentos";
SET @columnname = "ultimo_pagamento";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " date NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE lancamentos
MODIFY COLUMN ultimo_pagamento date NOT NULL COMMENT 'Ultimo Pagamento';


SET @dbname = DATABASE();
SET @tablename = "lancamentos";
SET @columnname = "observacoes";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE lancamentos
MODIFY COLUMN observacoes longtext NOT NULL COMMENT 'Observações';


SET @dbname = DATABASE();
SET @tablename = "lancamentos";
SET @columnname = "historico";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE lancamentos
MODIFY COLUMN historico longtext NOT NULL COMMENT 'Histórico';


SET @dbname = DATABASE();
SET @tablename = "lancamentos";
SET @columnname = "data_cadastro";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " datetime NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE lancamentos
MODIFY COLUMN data_cadastro datetime NOT NULL COMMENT 'Data Cadastro';


SET @dbname = DATABASE();
SET @tablename = "parceiros";
SET @columnname = "id_site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE parceiros
MODIFY COLUMN id_site int(11) NOT NULL COMMENT 'Site';


SET @dbname = DATABASE();
SET @tablename = "parceiros";
SET @columnname = "nome";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE parceiros
MODIFY COLUMN nome varchar(255) NOT NULL COMMENT 'Nome';


SET @dbname = DATABASE();
SET @tablename = "parceiros";
SET @columnname = "foto";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " char(4) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE parceiros
MODIFY COLUMN foto char(4) NOT NULL COMMENT 'Foto';


SET @dbname = DATABASE();
SET @tablename = "parceiros";
SET @columnname = "id_status_cadastro";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE parceiros
MODIFY COLUMN id_status_cadastro int(11) NOT NULL COMMENT 'Status';


SET @dbname = DATABASE();
SET @tablename = "parceiros";
SET @columnname = "funcao";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE parceiros
MODIFY COLUMN funcao varchar(255) NOT NULL COMMENT 'Função';


SET @dbname = DATABASE();
SET @tablename = "parceiros";
SET @columnname = "data_expira";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " datetime NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE parceiros
MODIFY COLUMN data_expira datetime NOT NULL COMMENT 'Data Expira';


SET @dbname = DATABASE();
SET @tablename = "parceiros";
SET @columnname = "retorno";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " datetime NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE parceiros
MODIFY COLUMN retorno datetime NOT NULL COMMENT 'Retorno';


SET @dbname = DATABASE();
SET @tablename = "parceiros";
SET @columnname = "cpf";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE parceiros
MODIFY COLUMN cpf varchar(255) NOT NULL COMMENT 'CPF';


SET @dbname = DATABASE();
SET @tablename = "parceiros";
SET @columnname = "empresa";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE parceiros
MODIFY COLUMN empresa varchar(255) NOT NULL COMMENT 'Empresa';


SET @dbname = DATABASE();
SET @tablename = "parceiros";
SET @columnname = "cnpj";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE parceiros
MODIFY COLUMN cnpj varchar(255) NOT NULL COMMENT 'CNPJ';


SET @dbname = DATABASE();
SET @tablename = "parceiros";
SET @columnname = "e_mail";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE parceiros
MODIFY COLUMN e_mail varchar(255) NOT NULL COMMENT 'E-mail';


SET @dbname = DATABASE();
SET @tablename = "parceiros";
SET @columnname = "senha";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE parceiros
MODIFY COLUMN senha varchar(255) NOT NULL COMMENT 'Senha';


SET @dbname = DATABASE();
SET @tablename = "parceiros";
SET @columnname = "e_mail_2";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE parceiros
MODIFY COLUMN e_mail_2 varchar(255) NOT NULL COMMENT 'E-mail 2';


SET @dbname = DATABASE();
SET @tablename = "parceiros";
SET @columnname = "telefone";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE parceiros
MODIFY COLUMN telefone varchar(255) NOT NULL COMMENT 'Telefone';


SET @dbname = DATABASE();
SET @tablename = "parceiros";
SET @columnname = "telefone_2";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE parceiros
MODIFY COLUMN telefone_2 varchar(255) NOT NULL COMMENT 'Telefone 2';


SET @dbname = DATABASE();
SET @tablename = "parceiros";
SET @columnname = "cep";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE parceiros
MODIFY COLUMN cep varchar(255) NOT NULL COMMENT 'CEP';


SET @dbname = DATABASE();
SET @tablename = "parceiros";
SET @columnname = "endereco";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE parceiros
MODIFY COLUMN endereco varchar(255) NOT NULL COMMENT 'Endereço';


SET @dbname = DATABASE();
SET @tablename = "parceiros";
SET @columnname = "numero";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE parceiros
MODIFY COLUMN numero varchar(255) NOT NULL COMMENT 'Número';


SET @dbname = DATABASE();
SET @tablename = "parceiros";
SET @columnname = "complemento";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE parceiros
MODIFY COLUMN complemento varchar(255) NOT NULL COMMENT 'Complemento';


SET @dbname = DATABASE();
SET @tablename = "parceiros";
SET @columnname = "bairro";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE parceiros
MODIFY COLUMN bairro varchar(255) NOT NULL COMMENT 'Bairro';


SET @dbname = DATABASE();
SET @tablename = "parceiros";
SET @columnname = "cidade";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE parceiros
MODIFY COLUMN cidade varchar(255) NOT NULL COMMENT 'Cidade';


SET @dbname = DATABASE();
SET @tablename = "parceiros";
SET @columnname = "estado";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE parceiros
MODIFY COLUMN estado varchar(255) NOT NULL COMMENT 'Estado';


SET @dbname = DATABASE();
SET @tablename = "parceiros";
SET @columnname = "pix";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE parceiros
MODIFY COLUMN pix varchar(255) NOT NULL COMMENT 'PIX';


SET @dbname = DATABASE();
SET @tablename = "parceiros";
SET @columnname = "banco";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE parceiros
MODIFY COLUMN banco varchar(255) NOT NULL COMMENT 'Banco';


SET @dbname = DATABASE();
SET @tablename = "parceiros";
SET @columnname = "agencia";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE parceiros
MODIFY COLUMN agencia varchar(255) NOT NULL COMMENT 'Agência';


SET @dbname = DATABASE();
SET @tablename = "parceiros";
SET @columnname = "conta";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE parceiros
MODIFY COLUMN conta varchar(255) NOT NULL COMMENT 'Conta';


SET @dbname = DATABASE();
SET @tablename = "parceiros";
SET @columnname = "tipo_de_conta";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE parceiros
MODIFY COLUMN tipo_de_conta varchar(255) NOT NULL COMMENT 'Tipo de Conta';


SET @dbname = DATABASE();
SET @tablename = "parceiros";
SET @columnname = "obs";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE parceiros
MODIFY COLUMN obs longtext NOT NULL COMMENT 'Obs';


SET @dbname = DATABASE();
SET @tablename = "parceiros";
SET @columnname = "enexos";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " char(4) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE parceiros
MODIFY COLUMN enexos char(4) NOT NULL COMMENT 'Enexo(s)';


SET @dbname = DATABASE();
SET @tablename = "parceiros";
SET @columnname = "historico";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE parceiros
MODIFY COLUMN historico longtext NOT NULL COMMENT 'Histórico';


SET @dbname = DATABASE();
SET @tablename = "parceiros";
SET @columnname = "data_cadastro";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " datetime NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE parceiros
MODIFY COLUMN data_cadastro datetime NOT NULL COMMENT 'Data Cadastro';


SET @dbname = DATABASE();
SET @tablename = "pedidos";
SET @columnname = "id_site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE pedidos
MODIFY COLUMN id_site int(11) NOT NULL COMMENT 'Site';


SET @dbname = DATABASE();
SET @tablename = "pedidos";
SET @columnname = "id_parceiros";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE pedidos
MODIFY COLUMN id_parceiros int(11) NOT NULL COMMENT 'Vendedor';


SET @dbname = DATABASE();
SET @tablename = "pedidos";
SET @columnname = "id_clientes";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE pedidos
MODIFY COLUMN id_clientes int(11) NOT NULL COMMENT 'Cliente';


SET @dbname = DATABASE();
SET @tablename = "pedidos";
SET @columnname = "pedido";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE pedidos
MODIFY COLUMN pedido int(11) NOT NULL COMMENT 'Pedido';


SET @dbname = DATABASE();
SET @tablename = "pedidos";
SET @columnname = "data";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " datetime NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE pedidos
MODIFY COLUMN data datetime NOT NULL COMMENT 'Data';


SET @dbname = DATABASE();
SET @tablename = "pedidos";
SET @columnname = "id_status_pedido";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE pedidos
MODIFY COLUMN id_status_pedido int(11) NOT NULL COMMENT 'Status';


SET @dbname = DATABASE();
SET @tablename = "pedidos";
SET @columnname = "id_status_operacao";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE pedidos
MODIFY COLUMN id_status_operacao int(11) NOT NULL COMMENT 'Operação';


SET @dbname = DATABASE();
SET @tablename = "pedidos";
SET @columnname = "id_produtos";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE pedidos
MODIFY COLUMN id_produtos int(11) NOT NULL COMMENT 'Produto';


SET @dbname = DATABASE();
SET @tablename = "pedidos";
SET @columnname = "quantidade";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE pedidos
MODIFY COLUMN quantidade int(11) NOT NULL COMMENT 'Quantidade';


SET @dbname = DATABASE();
SET @tablename = "pedidos";
SET @columnname = "preco";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " decimal(10,2) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE pedidos
MODIFY COLUMN preco decimal(10,2) NOT NULL COMMENT 'Preço';


SET @dbname = DATABASE();
SET @tablename = "pedidos";
SET @columnname = "desconto";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " decimal(10,2) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE pedidos
MODIFY COLUMN desconto decimal(10,2) NOT NULL COMMENT 'Desconto';


SET @dbname = DATABASE();
SET @tablename = "pedidos";
SET @columnname = "taxa_de_entrega";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " decimal(10,2) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE pedidos
MODIFY COLUMN taxa_de_entrega decimal(10,2) NOT NULL COMMENT 'Taxa de Entrega';


SET @dbname = DATABASE();
SET @tablename = "pedidos";
SET @columnname = "cupom_de_desconto";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE pedidos
MODIFY COLUMN cupom_de_desconto varchar(255) NOT NULL COMMENT 'Cupom de Desconto';


SET @dbname = DATABASE();
SET @tablename = "pedidos";
SET @columnname = "valor_total";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " decimal(10,2) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE pedidos
MODIFY COLUMN valor_total decimal(10,2) NOT NULL COMMENT 'Valor Total';


SET @dbname = DATABASE();
SET @tablename = "pedidos";
SET @columnname = "pagamento";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE pedidos
MODIFY COLUMN pagamento varchar(255) NOT NULL COMMENT 'Pagamento';


SET @dbname = DATABASE();
SET @tablename = "pedidos";
SET @columnname = "txt_pedido";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE pedidos
MODIFY COLUMN txt_pedido longtext NOT NULL COMMENT 'Txt Pedido';


SET @dbname = DATABASE();
SET @tablename = "pedidos";
SET @columnname = "obs_pedido";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE pedidos
MODIFY COLUMN obs_pedido longtext NOT NULL COMMENT 'Obs Pedido';


SET @dbname = DATABASE();
SET @tablename = "pedidos";
SET @columnname = "historico";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE pedidos
MODIFY COLUMN historico longtext NOT NULL COMMENT 'Histórico';


SET @dbname = DATABASE();
SET @tablename = "postagens";
SET @columnname = "id_secoes";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE postagens
MODIFY COLUMN id_secoes int(11) NOT NULL COMMENT 'Seção';


SET @dbname = DATABASE();
SET @tablename = "postagens";
SET @columnname = "id_categorias";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE postagens
MODIFY COLUMN id_categorias int(11) NOT NULL COMMENT 'Categoria';


SET @dbname = DATABASE();
SET @tablename = "postagens";
SET @columnname = "id_subcategorias";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE postagens
MODIFY COLUMN id_subcategorias int(11) NOT NULL COMMENT 'Subcategoria';


SET @dbname = DATABASE();
SET @tablename = "postagens";
SET @columnname = "nome";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE postagens
MODIFY COLUMN nome varchar(255) NOT NULL COMMENT 'Nome';


SET @dbname = DATABASE();
SET @tablename = "postagens";
SET @columnname = "imagem";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " char(4) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE postagens
MODIFY COLUMN imagem char(4) NOT NULL COMMENT 'Imagem';


SET @dbname = DATABASE();
SET @tablename = "postagens";
SET @columnname = "id_status_site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE postagens
MODIFY COLUMN id_status_site int(11) NOT NULL COMMENT 'Status';


SET @dbname = DATABASE();
SET @tablename = "postagens";
SET @columnname = "data_expira";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " datetime NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE postagens
MODIFY COLUMN data_expira datetime NOT NULL COMMENT 'Data Expira';


SET @dbname = DATABASE();
SET @tablename = "postagens";
SET @columnname = "destaque";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " set('Sim','Não') DEFAULT 'Não' NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE postagens
MODIFY COLUMN destaque set('Sim','Não') DEFAULT 'Não' NOT NULL COMMENT 'Destaque';


SET @dbname = DATABASE();
SET @tablename = "postagens";
SET @columnname = "id_etiquetas_postagem";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE postagens
MODIFY COLUMN id_etiquetas_postagem int(11) NOT NULL COMMENT 'Etiqueta';


SET @dbname = DATABASE();
SET @tablename = "postagens";
SET @columnname = "anexos";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " char(4) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE postagens
MODIFY COLUMN anexos char(4) NOT NULL COMMENT 'Anexo(s)';


SET @dbname = DATABASE();
SET @tablename = "postagens";
SET @columnname = "video";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE postagens
MODIFY COLUMN video varchar(255) NOT NULL COMMENT 'Vídeo';


SET @dbname = DATABASE();
SET @tablename = "postagens";
SET @columnname = "titulo";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE postagens
MODIFY COLUMN titulo varchar(255) NOT NULL COMMENT 'Título';


SET @dbname = DATABASE();
SET @tablename = "postagens";
SET @columnname = "subtitulo";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE postagens
MODIFY COLUMN subtitulo varchar(255) NOT NULL COMMENT 'Subtítulo';


SET @dbname = DATABASE();
SET @tablename = "postagens";
SET @columnname = "descricao";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE postagens
MODIFY COLUMN descricao longtext NOT NULL COMMENT 'Descrição';


SET @dbname = DATABASE();
SET @tablename = "postagens";
SET @columnname = "link";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE postagens
MODIFY COLUMN link varchar(255) NOT NULL COMMENT 'Link';


SET @dbname = DATABASE();
SET @tablename = "postagens";
SET @columnname = "fonte";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE postagens
MODIFY COLUMN fonte varchar(255) NOT NULL COMMENT 'Fonte';


SET @dbname = DATABASE();
SET @tablename = "postagens";
SET @columnname = "obs";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE postagens
MODIFY COLUMN obs longtext NOT NULL COMMENT 'Obs';


SET @dbname = DATABASE();
SET @tablename = "postagens";
SET @columnname = "background";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE postagens
MODIFY COLUMN background varchar(255) NOT NULL COMMENT 'Background';


SET @dbname = DATABASE();
SET @tablename = "postagens";
SET @columnname = "cortxt";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE postagens
MODIFY COLUMN cortxt varchar(255) NOT NULL COMMENT 'CorTxt';


SET @dbname = DATABASE();
SET @tablename = "postagens";
SET @columnname = "container";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " set('Sim','Não') DEFAULT 'Não' NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE postagens
MODIFY COLUMN container set('Sim','Não') DEFAULT 'Não' NOT NULL COMMENT 'Container';


SET @dbname = DATABASE();
SET @tablename = "postagens";
SET @columnname = "borda";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " set('Sim','Não') DEFAULT 'Não' NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE postagens
MODIFY COLUMN borda set('Sim','Não') DEFAULT 'Não' NOT NULL COMMENT 'Borda';


SET @dbname = DATABASE();
SET @tablename = "postagens";
SET @columnname = "borda_cor";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE postagens
MODIFY COLUMN borda_cor varchar(255) NOT NULL COMMENT 'Borda Cor';


SET @dbname = DATABASE();
SET @tablename = "postagens";
SET @columnname = "borda_sombra";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " set('Sim','Não') DEFAULT 'Não' NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE postagens
MODIFY COLUMN borda_sombra set('Sim','Não') DEFAULT 'Não' NOT NULL COMMENT 'Borda Sombra';


SET @dbname = DATABASE();
SET @tablename = "postagens";
SET @columnname = "arredondado";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " set('Sim','Não') DEFAULT 'Não' NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE postagens
MODIFY COLUMN arredondado set('Sim','Não') DEFAULT 'Não' NOT NULL COMMENT 'Arredondado';


SET @dbname = DATABASE();
SET @tablename = "postagens";
SET @columnname = "historico";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE postagens
MODIFY COLUMN historico longtext NOT NULL COMMENT 'Histórico';


SET @dbname = DATABASE();
SET @tablename = "postagens";
SET @columnname = "data_cadastro";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " datetime NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE postagens
MODIFY COLUMN data_cadastro datetime NOT NULL COMMENT 'Data Cadastro';


SET @dbname = DATABASE();
SET @tablename = "produtos";
SET @columnname = "id_secoes";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE produtos
MODIFY COLUMN id_secoes int(11) NOT NULL COMMENT 'Seção';


SET @dbname = DATABASE();
SET @tablename = "produtos";
SET @columnname = "id_categorias";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE produtos
MODIFY COLUMN id_categorias int(11) NOT NULL COMMENT 'Categoria';


SET @dbname = DATABASE();
SET @tablename = "produtos";
SET @columnname = "id_subcategorias";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE produtos
MODIFY COLUMN id_subcategorias int(11) NOT NULL COMMENT 'Subcategoria';


SET @dbname = DATABASE();
SET @tablename = "produtos";
SET @columnname = "nome";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE produtos
MODIFY COLUMN nome varchar(255) NOT NULL COMMENT 'Nome';


SET @dbname = DATABASE();
SET @tablename = "produtos";
SET @columnname = "imagem";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " char(4) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE produtos
MODIFY COLUMN imagem char(4) NOT NULL COMMENT 'Imagem';


SET @dbname = DATABASE();
SET @tablename = "produtos";
SET @columnname = "id_status_produto";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE produtos
MODIFY COLUMN id_status_produto int(11) NOT NULL COMMENT 'Status';


SET @dbname = DATABASE();
SET @tablename = "produtos";
SET @columnname = "codigo";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE produtos
MODIFY COLUMN codigo varchar(255) NOT NULL COMMENT 'Código';


SET @dbname = DATABASE();
SET @tablename = "produtos";
SET @columnname = "data_expira";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " datetime NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE produtos
MODIFY COLUMN data_expira datetime NOT NULL COMMENT 'Data Expira';


SET @dbname = DATABASE();
SET @tablename = "produtos";
SET @columnname = "destaque";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " set('Sim','Não') DEFAULT 'Não' NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE produtos
MODIFY COLUMN destaque set('Sim','Não') DEFAULT 'Não' NOT NULL COMMENT 'Destaque';


SET @dbname = DATABASE();
SET @tablename = "produtos";
SET @columnname = "id_etiquetas_produto";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE produtos
MODIFY COLUMN id_etiquetas_produto int(11) NOT NULL COMMENT 'Etiqueta';


SET @dbname = DATABASE();
SET @tablename = "produtos";
SET @columnname = "estoque";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE produtos
MODIFY COLUMN estoque int(11) NOT NULL COMMENT 'Estoque';


SET @dbname = DATABASE();
SET @tablename = "produtos";
SET @columnname = "id_parceiros";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE produtos
MODIFY COLUMN id_parceiros int(11) NOT NULL COMMENT 'Fornecedor';


SET @dbname = DATABASE();
SET @tablename = "produtos";
SET @columnname = "imagens";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " char(4) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE produtos
MODIFY COLUMN imagens char(4) NOT NULL COMMENT 'Imagens';


SET @dbname = DATABASE();
SET @tablename = "produtos";
SET @columnname = "video";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE produtos
MODIFY COLUMN video varchar(255) NOT NULL COMMENT 'Vídeo';


SET @dbname = DATABASE();
SET @tablename = "produtos";
SET @columnname = "custo";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " decimal(10,2) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE produtos
MODIFY COLUMN custo decimal(10,2) NOT NULL COMMENT 'Custo';


SET @dbname = DATABASE();
SET @tablename = "produtos";
SET @columnname = "preco";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " decimal(10,2) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE produtos
MODIFY COLUMN preco decimal(10,2) NOT NULL COMMENT 'Preço';


SET @dbname = DATABASE();
SET @tablename = "produtos";
SET @columnname = "preco_2";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " decimal(10,2) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE produtos
MODIFY COLUMN preco_2 decimal(10,2) NOT NULL COMMENT 'Preço 2';


SET @dbname = DATABASE();
SET @tablename = "produtos";
SET @columnname = "oferta";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " decimal(10,2) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE produtos
MODIFY COLUMN oferta decimal(10,2) NOT NULL COMMENT 'Oferta';


SET @dbname = DATABASE();
SET @tablename = "produtos";
SET @columnname = "desconto";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " decimal(10,2) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE produtos
MODIFY COLUMN desconto decimal(10,2) NOT NULL COMMENT 'Desconto';


SET @dbname = DATABASE();
SET @tablename = "produtos";
SET @columnname = "cupom_de_desconto";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE produtos
MODIFY COLUMN cupom_de_desconto varchar(255) NOT NULL COMMENT 'Cupom de Desconto';


SET @dbname = DATABASE();
SET @tablename = "produtos";
SET @columnname = "marca";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE produtos
MODIFY COLUMN marca varchar(255) NOT NULL COMMENT 'Marca';


SET @dbname = DATABASE();
SET @tablename = "produtos";
SET @columnname = "modelo";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE produtos
MODIFY COLUMN modelo varchar(255) NOT NULL COMMENT 'Modelo';


SET @dbname = DATABASE();
SET @tablename = "produtos";
SET @columnname = "titulo";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE produtos
MODIFY COLUMN titulo varchar(255) NOT NULL COMMENT 'Título';


SET @dbname = DATABASE();
SET @tablename = "produtos";
SET @columnname = "subtitulo";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE produtos
MODIFY COLUMN subtitulo varchar(255) NOT NULL COMMENT 'Subtítulo';


SET @dbname = DATABASE();
SET @tablename = "produtos";
SET @columnname = "detalhe";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE produtos
MODIFY COLUMN detalhe varchar(255) NOT NULL COMMENT 'Detalhe';


SET @dbname = DATABASE();
SET @tablename = "produtos";
SET @columnname = "descricao";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE produtos
MODIFY COLUMN descricao longtext NOT NULL COMMENT 'Descrição';


SET @dbname = DATABASE();
SET @tablename = "produtos";
SET @columnname = "obs";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE produtos
MODIFY COLUMN obs longtext NOT NULL COMMENT 'Obs';


SET @dbname = DATABASE();
SET @tablename = "produtos";
SET @columnname = "link";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE produtos
MODIFY COLUMN link varchar(255) NOT NULL COMMENT 'Link';


SET @dbname = DATABASE();
SET @tablename = "produtos";
SET @columnname = "material";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE produtos
MODIFY COLUMN material varchar(255) NOT NULL COMMENT 'Material';


SET @dbname = DATABASE();
SET @tablename = "produtos";
SET @columnname = "cor";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE produtos
MODIFY COLUMN cor varchar(255) NOT NULL COMMENT 'Cor';


SET @dbname = DATABASE();
SET @tablename = "produtos";
SET @columnname = "peso";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " decimal(10,2) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE produtos
MODIFY COLUMN peso decimal(10,2) NOT NULL COMMENT 'Peso';


SET @dbname = DATABASE();
SET @tablename = "produtos";
SET @columnname = "volumes";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE produtos
MODIFY COLUMN volumes int(11) NOT NULL COMMENT 'Volumes';


SET @dbname = DATABASE();
SET @tablename = "produtos";
SET @columnname = "tamanho";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE produtos
MODIFY COLUMN tamanho varchar(255) NOT NULL COMMENT 'Tamanho';


SET @dbname = DATABASE();
SET @tablename = "produtos";
SET @columnname = "largura";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE produtos
MODIFY COLUMN largura int(11) NOT NULL COMMENT 'Largura';


SET @dbname = DATABASE();
SET @tablename = "produtos";
SET @columnname = "altura";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE produtos
MODIFY COLUMN altura int(11) NOT NULL COMMENT 'Altura';


SET @dbname = DATABASE();
SET @tablename = "produtos";
SET @columnname = "profundidade";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " decimal(10,2) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE produtos
MODIFY COLUMN profundidade decimal(10,2) NOT NULL COMMENT 'Profundidade';


SET @dbname = DATABASE();
SET @tablename = "produtos";
SET @columnname = "views";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE produtos
MODIFY COLUMN views int(11) NOT NULL COMMENT 'Views';


SET @dbname = DATABASE();
SET @tablename = "produtos";
SET @columnname = "liks";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE produtos
MODIFY COLUMN liks int(11) NOT NULL COMMENT 'Liks';


SET @dbname = DATABASE();
SET @tablename = "produtos";
SET @columnname = "pontos";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE produtos
MODIFY COLUMN pontos int(11) NOT NULL COMMENT 'Pontos';


SET @dbname = DATABASE();
SET @tablename = "produtos";
SET @columnname = "historico";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE produtos
MODIFY COLUMN historico longtext NOT NULL COMMENT 'Histórico';


SET @dbname = DATABASE();
SET @tablename = "produtos";
SET @columnname = "data_cadastro";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " datetime NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE produtos
MODIFY COLUMN data_cadastro datetime NOT NULL COMMENT 'Data Cadastro';


SET @dbname = DATABASE();
SET @tablename = "proprietarios";
SET @columnname = "id_site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE proprietarios
MODIFY COLUMN id_site int(11) NOT NULL COMMENT 'Site';


SET @dbname = DATABASE();
SET @tablename = "proprietarios";
SET @columnname = "nome";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE proprietarios
MODIFY COLUMN nome varchar(255) NOT NULL COMMENT 'Nome';


SET @dbname = DATABASE();
SET @tablename = "proprietarios";
SET @columnname = "foto";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " char(4) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE proprietarios
MODIFY COLUMN foto char(4) NOT NULL COMMENT 'Foto';


SET @dbname = DATABASE();
SET @tablename = "proprietarios";
SET @columnname = "id_status_cadastro";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE proprietarios
MODIFY COLUMN id_status_cadastro int(11) NOT NULL COMMENT 'Status';


SET @dbname = DATABASE();
SET @tablename = "proprietarios";
SET @columnname = "ocupacao";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE proprietarios
MODIFY COLUMN ocupacao varchar(255) NOT NULL COMMENT 'Ocupação';


SET @dbname = DATABASE();
SET @tablename = "proprietarios";
SET @columnname = "data_expira";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " datetime NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE proprietarios
MODIFY COLUMN data_expira datetime NOT NULL COMMENT 'Data Expira';


SET @dbname = DATABASE();
SET @tablename = "proprietarios";
SET @columnname = "retorno";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " datetime NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE proprietarios
MODIFY COLUMN retorno datetime NOT NULL COMMENT 'Retorno';


SET @dbname = DATABASE();
SET @tablename = "proprietarios";
SET @columnname = "cpf";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE proprietarios
MODIFY COLUMN cpf varchar(255) NOT NULL COMMENT 'CPF';


SET @dbname = DATABASE();
SET @tablename = "proprietarios";
SET @columnname = "empresa";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE proprietarios
MODIFY COLUMN empresa varchar(255) NOT NULL COMMENT 'Empresa';


SET @dbname = DATABASE();
SET @tablename = "proprietarios";
SET @columnname = "cnpj";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE proprietarios
MODIFY COLUMN cnpj varchar(255) NOT NULL COMMENT 'CNPJ';


SET @dbname = DATABASE();
SET @tablename = "proprietarios";
SET @columnname = "e_mail";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE proprietarios
MODIFY COLUMN e_mail varchar(255) NOT NULL COMMENT 'E-mail';


SET @dbname = DATABASE();
SET @tablename = "proprietarios";
SET @columnname = "senha";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE proprietarios
MODIFY COLUMN senha varchar(255) NOT NULL COMMENT 'Senha';


SET @dbname = DATABASE();
SET @tablename = "proprietarios";
SET @columnname = "e_mail_2";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE proprietarios
MODIFY COLUMN e_mail_2 varchar(255) NOT NULL COMMENT 'E-mail 2';


SET @dbname = DATABASE();
SET @tablename = "proprietarios";
SET @columnname = "telefone";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE proprietarios
MODIFY COLUMN telefone varchar(255) NOT NULL COMMENT 'Telefone';


SET @dbname = DATABASE();
SET @tablename = "proprietarios";
SET @columnname = "telefone_2";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE proprietarios
MODIFY COLUMN telefone_2 varchar(255) NOT NULL COMMENT 'Telefone 2';


SET @dbname = DATABASE();
SET @tablename = "proprietarios";
SET @columnname = "cep";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE proprietarios
MODIFY COLUMN cep varchar(255) NOT NULL COMMENT 'CEP';


SET @dbname = DATABASE();
SET @tablename = "proprietarios";
SET @columnname = "endereco";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE proprietarios
MODIFY COLUMN endereco varchar(255) NOT NULL COMMENT 'Endereço';


SET @dbname = DATABASE();
SET @tablename = "proprietarios";
SET @columnname = "numero";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE proprietarios
MODIFY COLUMN numero varchar(255) NOT NULL COMMENT 'Número';


SET @dbname = DATABASE();
SET @tablename = "proprietarios";
SET @columnname = "complemento";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE proprietarios
MODIFY COLUMN complemento varchar(255) NOT NULL COMMENT 'Complemento';


SET @dbname = DATABASE();
SET @tablename = "proprietarios";
SET @columnname = "bairro";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE proprietarios
MODIFY COLUMN bairro varchar(255) NOT NULL COMMENT 'Bairro';


SET @dbname = DATABASE();
SET @tablename = "proprietarios";
SET @columnname = "cidade";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE proprietarios
MODIFY COLUMN cidade varchar(255) NOT NULL COMMENT 'Cidade';


SET @dbname = DATABASE();
SET @tablename = "proprietarios";
SET @columnname = "estado";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE proprietarios
MODIFY COLUMN estado varchar(255) NOT NULL COMMENT 'Estado';


SET @dbname = DATABASE();
SET @tablename = "proprietarios";
SET @columnname = "pix";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE proprietarios
MODIFY COLUMN pix varchar(255) NOT NULL COMMENT 'PIX';


SET @dbname = DATABASE();
SET @tablename = "proprietarios";
SET @columnname = "banco";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE proprietarios
MODIFY COLUMN banco varchar(255) NOT NULL COMMENT 'Banco';


SET @dbname = DATABASE();
SET @tablename = "proprietarios";
SET @columnname = "agencia";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE proprietarios
MODIFY COLUMN agencia varchar(255) NOT NULL COMMENT 'Agência';


SET @dbname = DATABASE();
SET @tablename = "proprietarios";
SET @columnname = "conta";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE proprietarios
MODIFY COLUMN conta varchar(255) NOT NULL COMMENT 'Conta';


SET @dbname = DATABASE();
SET @tablename = "proprietarios";
SET @columnname = "tipo_de_conta";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE proprietarios
MODIFY COLUMN tipo_de_conta varchar(255) NOT NULL COMMENT 'Tipo de Conta';


SET @dbname = DATABASE();
SET @tablename = "proprietarios";
SET @columnname = "obs";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE proprietarios
MODIFY COLUMN obs longtext NOT NULL COMMENT 'Obs';


SET @dbname = DATABASE();
SET @tablename = "proprietarios";
SET @columnname = "enexos";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " char(4) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE proprietarios
MODIFY COLUMN enexos char(4) NOT NULL COMMENT 'Enexo(s)';


SET @dbname = DATABASE();
SET @tablename = "proprietarios";
SET @columnname = "historico";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE proprietarios
MODIFY COLUMN historico longtext NOT NULL COMMENT 'Histórico';


SET @dbname = DATABASE();
SET @tablename = "proprietarios";
SET @columnname = "data_cadastro";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " datetime NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE proprietarios
MODIFY COLUMN data_cadastro datetime NOT NULL COMMENT 'Data Cadastro';


SET @dbname = DATABASE();
SET @tablename = "secoes";
SET @columnname = "id_site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE secoes
MODIFY COLUMN id_site int(11) NOT NULL COMMENT 'Site';


SET @dbname = DATABASE();
SET @tablename = "secoes";
SET @columnname = "nome";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE secoes
MODIFY COLUMN nome varchar(255) NOT NULL COMMENT 'Nome';


SET @dbname = DATABASE();
SET @tablename = "secoes";
SET @columnname = "imagem";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " char(4) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE secoes
MODIFY COLUMN imagem char(4) NOT NULL COMMENT 'Imagem';


SET @dbname = DATABASE();
SET @tablename = "secoes";
SET @columnname = "id_status_site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE secoes
MODIFY COLUMN id_status_site int(11) NOT NULL COMMENT 'Status';


SET @dbname = DATABASE();
SET @tablename = "secoes";
SET @columnname = "data_expira";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " datetime NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE secoes
MODIFY COLUMN data_expira datetime NOT NULL COMMENT 'Data Expira';


SET @dbname = DATABASE();
SET @tablename = "secoes";
SET @columnname = "ordem";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE secoes
MODIFY COLUMN ordem int(11) NOT NULL COMMENT 'Ordem';


SET @dbname = DATABASE();
SET @tablename = "secoes";
SET @columnname = "titulo";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE secoes
MODIFY COLUMN titulo varchar(255) NOT NULL COMMENT 'Título';


SET @dbname = DATABASE();
SET @tablename = "secoes";
SET @columnname = "subtitulo";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE secoes
MODIFY COLUMN subtitulo varchar(255) NOT NULL COMMENT 'Subtítulo';


SET @dbname = DATABASE();
SET @tablename = "secoes";
SET @columnname = "descricao";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE secoes
MODIFY COLUMN descricao longtext NOT NULL COMMENT 'Descrição';


SET @dbname = DATABASE();
SET @tablename = "secoes";
SET @columnname = "obs";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE secoes
MODIFY COLUMN obs longtext NOT NULL COMMENT 'Obs';


SET @dbname = DATABASE();
SET @tablename = "secoes";
SET @columnname = "background";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE secoes
MODIFY COLUMN background varchar(255) NOT NULL COMMENT 'Background';


SET @dbname = DATABASE();
SET @tablename = "secoes";
SET @columnname = "cortxt";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE secoes
MODIFY COLUMN cortxt varchar(255) NOT NULL COMMENT 'CorTxt';


SET @dbname = DATABASE();
SET @tablename = "secoes";
SET @columnname = "container";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " set('Sim','Não') DEFAULT 'Não' NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE secoes
MODIFY COLUMN container set('Sim','Não') DEFAULT 'Não' NOT NULL COMMENT 'Container';


SET @dbname = DATABASE();
SET @tablename = "secoes";
SET @columnname = "borda";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " set('Sim','Não') DEFAULT 'Não' NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE secoes
MODIFY COLUMN borda set('Sim','Não') DEFAULT 'Não' NOT NULL COMMENT 'Borda';


SET @dbname = DATABASE();
SET @tablename = "secoes";
SET @columnname = "borda_cor";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE secoes
MODIFY COLUMN borda_cor varchar(255) NOT NULL COMMENT 'Borda Cor';


SET @dbname = DATABASE();
SET @tablename = "secoes";
SET @columnname = "borda_sombra";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " set('Sim','Não') DEFAULT 'Não' NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE secoes
MODIFY COLUMN borda_sombra set('Sim','Não') DEFAULT 'Não' NOT NULL COMMENT 'Borda Sombra';


SET @dbname = DATABASE();
SET @tablename = "secoes";
SET @columnname = "arredondado";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " set('Sim','Não') DEFAULT 'Não' NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE secoes
MODIFY COLUMN arredondado set('Sim','Não') DEFAULT 'Não' NOT NULL COMMENT 'Arredondado';


SET @dbname = DATABASE();
SET @tablename = "secoes";
SET @columnname = "parallax";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " set('Sim','Não') DEFAULT 'Não' NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE secoes
MODIFY COLUMN parallax set('Sim','Não') DEFAULT 'Não' NOT NULL COMMENT 'Parallax';


SET @dbname = DATABASE();
SET @tablename = "secoes";
SET @columnname = "historico";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE secoes
MODIFY COLUMN historico longtext NOT NULL COMMENT 'Histórico';


SET @dbname = DATABASE();
SET @tablename = "secoes";
SET @columnname = "data_cadastro";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " datetime NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE secoes
MODIFY COLUMN data_cadastro datetime NOT NULL COMMENT 'Data Cadastro';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN site varchar(255) NOT NULL COMMENT 'Site';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "nome";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN nome varchar(255) NOT NULL COMMENT 'Nome';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "id_status_site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN id_status_site int(11) NOT NULL COMMENT 'Status';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "logo";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " char(4) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN logo char(4) NOT NULL COMMENT 'Logo';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "responsavel";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN responsavel varchar(255) NOT NULL COMMENT 'Responsável';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "cargo";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN cargo varchar(255) NOT NULL COMMENT 'Cargo';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "fone";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN fone varchar(255) NOT NULL COMMENT 'Fone';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "email";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN email varchar(255) NOT NULL COMMENT 'Email';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "aberto";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " set('Sim','Não') DEFAULT 'Não' NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN aberto set('Sim','Não') DEFAULT 'Não' NOT NULL COMMENT 'Aberto';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "titulo";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN titulo varchar(255) NOT NULL COMMENT 'Título';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "subtitulo";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN subtitulo varchar(255) NOT NULL COMMENT 'Subtítulo';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "palavras_chaves";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN palavras_chaves varchar(255) NOT NULL COMMENT 'Palavras Chaves';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "descricao";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN descricao longtext NOT NULL COMMENT 'Descrição';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "logo2";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " char(4) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN logo2 char(4) NOT NULL COMMENT 'Logo2';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "logo3";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " char(4) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN logo3 char(4) NOT NULL COMMENT 'Logo3';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "e_mail";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN e_mail varchar(255) NOT NULL COMMENT 'E-mail';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "e_mail2";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN e_mail2 varchar(255) NOT NULL COMMENT 'E-mail2';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "e_mail3";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN e_mail3 varchar(255) NOT NULL COMMENT 'E-mail3';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "telefone";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN telefone varchar(255) NOT NULL COMMENT 'Telefone';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "telefone2";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN telefone2 varchar(255) NOT NULL COMMENT 'Telefone2';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "telefone3";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN telefone3 varchar(255) NOT NULL COMMENT 'Telefone3';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "cep";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN cep varchar(255) NOT NULL COMMENT 'CEP';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "endereco";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN endereco varchar(255) NOT NULL COMMENT 'Endereço';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "numero";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN numero varchar(255) NOT NULL COMMENT 'Número';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "complemento";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN complemento varchar(255) NOT NULL COMMENT 'Complemento';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "bairro";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN bairro varchar(255) NOT NULL COMMENT 'Bairro';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "cidade";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN cidade varchar(255) NOT NULL COMMENT 'Cidade';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "estado";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN estado varchar(255) NOT NULL COMMENT 'Estado';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "endereco2";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN endereco2 varchar(255) NOT NULL COMMENT 'Endereço2';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "endereco3";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN endereco3 varchar(255) NOT NULL COMMENT 'Endereço3';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "horario";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN horario varchar(255) NOT NULL COMMENT 'Horário';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "horario2";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN horario2 varchar(255) NOT NULL COMMENT 'Horário2';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "horario3";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN horario3 varchar(255) NOT NULL COMMENT 'Horário3';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "textowhats";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN textowhats varchar(255) NOT NULL COMMENT 'TextoWhats';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "textowhats2";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN textowhats2 varchar(255) NOT NULL COMMENT 'TextoWhats2';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "textowhats3";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN textowhats3 varchar(255) NOT NULL COMMENT 'TextoWhats3';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "textoauxiliar";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN textoauxiliar varchar(255) NOT NULL COMMENT 'TextoAuxiliar';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "textoauxiliar2";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN textoauxiliar2 varchar(255) NOT NULL COMMENT 'TextoAuxiliar2';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "textoauxiliar3";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN textoauxiliar3 varchar(255) NOT NULL COMMENT 'TextoAuxiliar3';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "instagram";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN instagram varchar(255) NOT NULL COMMENT 'Instagram';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "facebook";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN facebook varchar(255) NOT NULL COMMENT 'Facebook';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "linkedin";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN linkedin varchar(255) NOT NULL COMMENT 'Linkedin';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "twitter";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN twitter varchar(255) NOT NULL COMMENT 'Twitter';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "youtube";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN youtube varchar(255) NOT NULL COMMENT 'YouTube';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "tiktok";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN tiktok varchar(255) NOT NULL COMMENT 'TikTok';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "kwai";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN kwai varchar(255) NOT NULL COMMENT 'Kwai';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "google";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN google varchar(255) NOT NULL COMMENT 'Google';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "google_plus";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN google_plus varchar(255) NOT NULL COMMENT 'Google Plus';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "google_maps";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN google_maps varchar(255) NOT NULL COMMENT 'Google Maps';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "google_analitics";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN google_analitics varchar(255) NOT NULL COMMENT 'Google Analítics';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "play_store";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN play_store varchar(255) NOT NULL COMMENT 'Play Store';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "apple_store";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN apple_store varchar(255) NOT NULL COMMENT 'Apple Store';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "popup";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN popup longtext NOT NULL COMMENT 'PopUp';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "aviso_de_cookies";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN aviso_de_cookies varchar(255) NOT NULL COMMENT 'Aviso de Cookies';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "politica_de_cookies";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN politica_de_cookies longtext NOT NULL COMMENT 'Politica de Cookies';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "politica_de_privacidade";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN politica_de_privacidade longtext NOT NULL COMMENT 'Política de Privacidade';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "termos_de_uso";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN termos_de_uso longtext NOT NULL COMMENT 'Termos de Uso';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "contrato";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN contrato longtext NOT NULL COMMENT 'Contrato';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "contrato2";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN contrato2 varchar(255) NOT NULL COMMENT 'Contrato2';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "contrato3";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN contrato3 varchar(255) NOT NULL COMMENT 'Contrato3';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "obs";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN obs longtext NOT NULL COMMENT 'Obs';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "cor";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN cor varchar(255) NOT NULL COMMENT 'Cor';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "cor2";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN cor2 varchar(255) NOT NULL COMMENT 'Cor2';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "cor3";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN cor3 varchar(255) NOT NULL COMMENT 'Cor3';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "cor4";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN cor4 varchar(255) NOT NULL COMMENT 'Cor4';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "cortxt";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN cortxt varchar(255) NOT NULL COMMENT 'CorTxt';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "cortxt2";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN cortxt2 varchar(255) NOT NULL COMMENT 'CorTxt2';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "cortxt3";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN cortxt3 varchar(255) NOT NULL COMMENT 'CorTxt3';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "cortxt4";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN cortxt4 varchar(255) NOT NULL COMMENT 'CorTxt4';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "container";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " set('Sim','Não') DEFAULT 'Não' NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN container set('Sim','Não') DEFAULT 'Não' NOT NULL COMMENT 'Container';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "borda";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " set('Sim','Não') DEFAULT 'Não' NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN borda set('Sim','Não') DEFAULT 'Não' NOT NULL COMMENT 'Borda';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "borda_cor";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN borda_cor varchar(255) NOT NULL COMMENT 'Borda Cor';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "borda_sombra";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " set('Sim','Não') DEFAULT 'Não' NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN borda_sombra set('Sim','Não') DEFAULT 'Não' NOT NULL COMMENT 'Borda Sombra';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "arredondado";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " set('Sim','Não') DEFAULT 'Não' NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN arredondado set('Sim','Não') DEFAULT 'Não' NOT NULL COMMENT 'Arredondado';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "documentos";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " char(4) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN documentos char(4) NOT NULL COMMENT 'Documentos';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "historico";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN historico longtext NOT NULL COMMENT 'Histórico';


SET @dbname = DATABASE();
SET @tablename = "site";
SET @columnname = "data_cadastro";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " datetime NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE site
MODIFY COLUMN data_cadastro datetime NOT NULL COMMENT 'Data Cadastro';


SET @dbname = DATABASE();
SET @tablename = "status_cadastro";
SET @columnname = "id_site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE status_cadastro
MODIFY COLUMN id_site int(11) NOT NULL COMMENT 'Site';


SET @dbname = DATABASE();
SET @tablename = "status_cadastro";
SET @columnname = "nome";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE status_cadastro
MODIFY COLUMN nome varchar(255) NOT NULL COMMENT 'Nome';


SET @dbname = DATABASE();
SET @tablename = "status_cadastro";
SET @columnname = "label";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE status_cadastro
MODIFY COLUMN label varchar(255) NOT NULL COMMENT 'Label';


SET @dbname = DATABASE();
SET @tablename = "status_imovel";
SET @columnname = "id_site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE status_imovel
MODIFY COLUMN id_site int(11) NOT NULL COMMENT 'Site';


SET @dbname = DATABASE();
SET @tablename = "status_imovel";
SET @columnname = "nome";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE status_imovel
MODIFY COLUMN nome varchar(255) NOT NULL COMMENT 'Nome';


SET @dbname = DATABASE();
SET @tablename = "status_imovel";
SET @columnname = "label";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE status_imovel
MODIFY COLUMN label varchar(255) NOT NULL COMMENT 'Label';


SET @dbname = DATABASE();
SET @tablename = "status_lancamento";
SET @columnname = "id_site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE status_lancamento
MODIFY COLUMN id_site int(11) NOT NULL COMMENT 'Site';


SET @dbname = DATABASE();
SET @tablename = "status_lancamento";
SET @columnname = "nome";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE status_lancamento
MODIFY COLUMN nome varchar(255) NOT NULL COMMENT 'Nome';


SET @dbname = DATABASE();
SET @tablename = "status_lancamento";
SET @columnname = "label";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE status_lancamento
MODIFY COLUMN label varchar(255) NOT NULL COMMENT 'Label';


SET @dbname = DATABASE();
SET @tablename = "status_mkt";
SET @columnname = "id_site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE status_mkt
MODIFY COLUMN id_site int(11) NOT NULL COMMENT 'Site';


SET @dbname = DATABASE();
SET @tablename = "status_mkt";
SET @columnname = "nome";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE status_mkt
MODIFY COLUMN nome varchar(255) NOT NULL COMMENT 'Nome';


SET @dbname = DATABASE();
SET @tablename = "status_mkt";
SET @columnname = "label";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE status_mkt
MODIFY COLUMN label varchar(255) NOT NULL COMMENT 'Label';


SET @dbname = DATABASE();
SET @tablename = "status_negociacao";
SET @columnname = "id_site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE status_negociacao
MODIFY COLUMN id_site int(11) NOT NULL COMMENT 'Site';


SET @dbname = DATABASE();
SET @tablename = "status_negociacao";
SET @columnname = "nome";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE status_negociacao
MODIFY COLUMN nome varchar(255) NOT NULL COMMENT 'Nome';


SET @dbname = DATABASE();
SET @tablename = "status_negociacao";
SET @columnname = "label";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE status_negociacao
MODIFY COLUMN label varchar(255) NOT NULL COMMENT 'Label';


SET @dbname = DATABASE();
SET @tablename = "status_operacao";
SET @columnname = "id_site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE status_operacao
MODIFY COLUMN id_site int(11) NOT NULL COMMENT 'Site';


SET @dbname = DATABASE();
SET @tablename = "status_operacao";
SET @columnname = "nome";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE status_operacao
MODIFY COLUMN nome varchar(255) NOT NULL COMMENT 'Nome';


SET @dbname = DATABASE();
SET @tablename = "status_operacao";
SET @columnname = "label";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE status_operacao
MODIFY COLUMN label varchar(255) NOT NULL COMMENT 'Label';


SET @dbname = DATABASE();
SET @tablename = "status_pedido";
SET @columnname = "id_site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE status_pedido
MODIFY COLUMN id_site int(11) NOT NULL COMMENT 'Site';


SET @dbname = DATABASE();
SET @tablename = "status_pedido";
SET @columnname = "nome";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE status_pedido
MODIFY COLUMN nome varchar(255) NOT NULL COMMENT 'Nome';


SET @dbname = DATABASE();
SET @tablename = "status_pedido";
SET @columnname = "label";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE status_pedido
MODIFY COLUMN label varchar(255) NOT NULL COMMENT 'Label';


SET @dbname = DATABASE();
SET @tablename = "status_produto";
SET @columnname = "id_site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE status_produto
MODIFY COLUMN id_site int(11) NOT NULL COMMENT 'Site';


SET @dbname = DATABASE();
SET @tablename = "status_produto";
SET @columnname = "nome";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE status_produto
MODIFY COLUMN nome varchar(255) NOT NULL COMMENT 'Nome';


SET @dbname = DATABASE();
SET @tablename = "status_produto";
SET @columnname = "label";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE status_produto
MODIFY COLUMN label varchar(255) NOT NULL COMMENT 'Label';


SET @dbname = DATABASE();
SET @tablename = "status_site";
SET @columnname = "id_site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE status_site
MODIFY COLUMN id_site int(11) NOT NULL COMMENT 'Site';


SET @dbname = DATABASE();
SET @tablename = "status_site";
SET @columnname = "nome";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE status_site
MODIFY COLUMN nome varchar(255) NOT NULL COMMENT 'Nome';


SET @dbname = DATABASE();
SET @tablename = "status_site";
SET @columnname = "label";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE status_site
MODIFY COLUMN label varchar(255) NOT NULL COMMENT 'Label';


SET @dbname = DATABASE();
SET @tablename = "status_tarefa";
SET @columnname = "id_site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE status_tarefa
MODIFY COLUMN id_site int(11) NOT NULL COMMENT 'Site';


SET @dbname = DATABASE();
SET @tablename = "status_tarefa";
SET @columnname = "nome";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE status_tarefa
MODIFY COLUMN nome varchar(255) NOT NULL COMMENT 'Nome';


SET @dbname = DATABASE();
SET @tablename = "status_tarefa";
SET @columnname = "label";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE status_tarefa
MODIFY COLUMN label varchar(255) NOT NULL COMMENT 'Label';


SET @dbname = DATABASE();
SET @tablename = "subcategorias";
SET @columnname = "id_categorias";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE subcategorias
MODIFY COLUMN id_categorias int(11) NOT NULL COMMENT 'Categoria';


SET @dbname = DATABASE();
SET @tablename = "subcategorias";
SET @columnname = "nome";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE subcategorias
MODIFY COLUMN nome varchar(255) NOT NULL COMMENT 'Nome';


SET @dbname = DATABASE();
SET @tablename = "subcategorias";
SET @columnname = "imagem";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " char(4) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE subcategorias
MODIFY COLUMN imagem char(4) NOT NULL COMMENT 'Imagem';


SET @dbname = DATABASE();
SET @tablename = "subcategorias";
SET @columnname = "id_status_site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE subcategorias
MODIFY COLUMN id_status_site int(11) NOT NULL COMMENT 'Status';


SET @dbname = DATABASE();
SET @tablename = "subcategorias";
SET @columnname = "data_expira";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " datetime NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE subcategorias
MODIFY COLUMN data_expira datetime NOT NULL COMMENT 'Data Expira';


SET @dbname = DATABASE();
SET @tablename = "subcategorias";
SET @columnname = "ordem";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE subcategorias
MODIFY COLUMN ordem int(11) NOT NULL COMMENT 'Ordem';


SET @dbname = DATABASE();
SET @tablename = "subcategorias";
SET @columnname = "titulo";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE subcategorias
MODIFY COLUMN titulo varchar(255) NOT NULL COMMENT 'Título';


SET @dbname = DATABASE();
SET @tablename = "subcategorias";
SET @columnname = "subtitulo";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE subcategorias
MODIFY COLUMN subtitulo varchar(255) NOT NULL COMMENT 'Subtítulo';


SET @dbname = DATABASE();
SET @tablename = "subcategorias";
SET @columnname = "descricao";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE subcategorias
MODIFY COLUMN descricao longtext NOT NULL COMMENT 'Descrição';


SET @dbname = DATABASE();
SET @tablename = "subcategorias";
SET @columnname = "obs";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE subcategorias
MODIFY COLUMN obs longtext NOT NULL COMMENT 'Obs';


SET @dbname = DATABASE();
SET @tablename = "subcategorias";
SET @columnname = "background";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE subcategorias
MODIFY COLUMN background varchar(255) NOT NULL COMMENT 'Background';


SET @dbname = DATABASE();
SET @tablename = "subcategorias";
SET @columnname = "cortxt";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE subcategorias
MODIFY COLUMN cortxt varchar(255) NOT NULL COMMENT 'CorTxt';


SET @dbname = DATABASE();
SET @tablename = "subcategorias";
SET @columnname = "container";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " set('Sim','Não') DEFAULT 'Não' NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE subcategorias
MODIFY COLUMN container set('Sim','Não') DEFAULT 'Não' NOT NULL COMMENT 'Container';


SET @dbname = DATABASE();
SET @tablename = "subcategorias";
SET @columnname = "borda";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " set('Sim','Não') DEFAULT 'Não' NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE subcategorias
MODIFY COLUMN borda set('Sim','Não') DEFAULT 'Não' NOT NULL COMMENT 'Borda';


SET @dbname = DATABASE();
SET @tablename = "subcategorias";
SET @columnname = "borda_cor";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE subcategorias
MODIFY COLUMN borda_cor varchar(255) NOT NULL COMMENT 'Borda Cor';


SET @dbname = DATABASE();
SET @tablename = "subcategorias";
SET @columnname = "borda_sombra";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " set('Sim','Não') DEFAULT 'Não' NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE subcategorias
MODIFY COLUMN borda_sombra set('Sim','Não') DEFAULT 'Não' NOT NULL COMMENT 'Borda Sombra';


SET @dbname = DATABASE();
SET @tablename = "subcategorias";
SET @columnname = "arredondado";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " set('Sim','Não') DEFAULT 'Não' NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE subcategorias
MODIFY COLUMN arredondado set('Sim','Não') DEFAULT 'Não' NOT NULL COMMENT 'Arredondado';


SET @dbname = DATABASE();
SET @tablename = "subcategorias";
SET @columnname = "parallax";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " set('Sim','Não') DEFAULT 'Não' NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE subcategorias
MODIFY COLUMN parallax set('Sim','Não') DEFAULT 'Não' NOT NULL COMMENT 'Parallax';


SET @dbname = DATABASE();
SET @tablename = "subcategorias";
SET @columnname = "historico";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE subcategorias
MODIFY COLUMN historico longtext NOT NULL COMMENT 'Histórico';


SET @dbname = DATABASE();
SET @tablename = "subcategorias";
SET @columnname = "data_cadastro";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " datetime NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE subcategorias
MODIFY COLUMN data_cadastro datetime NOT NULL COMMENT 'Data Cadastro';


SET @dbname = DATABASE();
SET @tablename = "tarefas";
SET @columnname = "id_site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE tarefas
MODIFY COLUMN id_site int(11) NOT NULL COMMENT 'Site';


SET @dbname = DATABASE();
SET @tablename = "tarefas";
SET @columnname = "nome";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE tarefas
MODIFY COLUMN nome varchar(255) NOT NULL COMMENT 'Nome';


SET @dbname = DATABASE();
SET @tablename = "tarefas";
SET @columnname = "id_status_tarefa";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE tarefas
MODIFY COLUMN id_status_tarefa int(11) NOT NULL COMMENT 'Status';


SET @dbname = DATABASE();
SET @tablename = "tarefas";
SET @columnname = "destaque";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " set('Sim','Não') DEFAULT 'Não' NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE tarefas
MODIFY COLUMN destaque set('Sim','Não') DEFAULT 'Não' NOT NULL COMMENT 'Destaque';


SET @dbname = DATABASE();
SET @tablename = "tarefas";
SET @columnname = "data_expira";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " datetime NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE tarefas
MODIFY COLUMN data_expira datetime NOT NULL COMMENT 'Data Expira';


SET @dbname = DATABASE();
SET @tablename = "tarefas";
SET @columnname = "executada_de";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " datetime NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE tarefas
MODIFY COLUMN executada_de datetime NOT NULL COMMENT 'Executada De';


SET @dbname = DATABASE();
SET @tablename = "tarefas";
SET @columnname = "executada_ate";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " datetime NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE tarefas
MODIFY COLUMN executada_ate datetime NOT NULL COMMENT 'Executada Até';


SET @dbname = DATABASE();
SET @tablename = "tarefas";
SET @columnname = "lembrete_por_email";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE tarefas
MODIFY COLUMN lembrete_por_email varchar(255) NOT NULL COMMENT 'Lembrete por Email';


SET @dbname = DATABASE();
SET @tablename = "tarefas";
SET @columnname = "repeticoes";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE tarefas
MODIFY COLUMN repeticoes int(11) NOT NULL COMMENT 'Repetições';


SET @dbname = DATABASE();
SET @tablename = "tarefas";
SET @columnname = "anexos";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " char(4) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE tarefas
MODIFY COLUMN anexos char(4) NOT NULL COMMENT 'Anexos';


SET @dbname = DATABASE();
SET @tablename = "tarefas";
SET @columnname = "titulo";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE tarefas
MODIFY COLUMN titulo varchar(255) NOT NULL COMMENT 'Título';


SET @dbname = DATABASE();
SET @tablename = "tarefas";
SET @columnname = "detalhe";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE tarefas
MODIFY COLUMN detalhe varchar(255) NOT NULL COMMENT 'Detalhe';


SET @dbname = DATABASE();
SET @tablename = "tarefas";
SET @columnname = "motivo";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE tarefas
MODIFY COLUMN motivo varchar(255) NOT NULL COMMENT 'Motivo';


SET @dbname = DATABASE();
SET @tablename = "tarefas";
SET @columnname = "descricao";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE tarefas
MODIFY COLUMN descricao longtext NOT NULL COMMENT 'Descrição';


SET @dbname = DATABASE();
SET @tablename = "tarefas";
SET @columnname = "observacao";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE tarefas
MODIFY COLUMN observacao longtext NOT NULL COMMENT 'Observação';


SET @dbname = DATABASE();
SET @tablename = "tarefas";
SET @columnname = "historico";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE tarefas
MODIFY COLUMN historico longtext NOT NULL COMMENT 'Histórico';


SET @dbname = DATABASE();
SET @tablename = "tarefas";
SET @columnname = "data_cadastro";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " datetime NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE tarefas
MODIFY COLUMN data_cadastro datetime NOT NULL COMMENT 'Data Cadastro';


SET @dbname = DATABASE();
SET @tablename = "taxa_de_entrega";
SET @columnname = "id_site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE taxa_de_entrega
MODIFY COLUMN id_site int(11) NOT NULL COMMENT 'Site';


SET @dbname = DATABASE();
SET @tablename = "taxa_de_entrega";
SET @columnname = "id_status_site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE taxa_de_entrega
MODIFY COLUMN id_status_site int(11) NOT NULL COMMENT 'Status';


SET @dbname = DATABASE();
SET @tablename = "taxa_de_entrega";
SET @columnname = "bairro";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE taxa_de_entrega
MODIFY COLUMN bairro varchar(255) NOT NULL COMMENT 'Bairro';


SET @dbname = DATABASE();
SET @tablename = "taxa_de_entrega";
SET @columnname = "tarifa";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " decimal(10,2) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE taxa_de_entrega
MODIFY COLUMN tarifa decimal(10,2) NOT NULL COMMENT 'Tarífa';


SET @dbname = DATABASE();
SET @tablename = "tipos_imovel";
SET @columnname = "id_site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE tipos_imovel
MODIFY COLUMN id_site int(11) NOT NULL COMMENT 'Site';


SET @dbname = DATABASE();
SET @tablename = "tipos_imovel";
SET @columnname = "nome";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE tipos_imovel
MODIFY COLUMN nome varchar(255) NOT NULL COMMENT 'Nome';


SET @dbname = DATABASE();
SET @tablename = "tipos_lancamento";
SET @columnname = "id_site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE tipos_lancamento
MODIFY COLUMN id_site int(11) NOT NULL COMMENT 'Site';


SET @dbname = DATABASE();
SET @tablename = "tipos_lancamento";
SET @columnname = "nome";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE tipos_lancamento
MODIFY COLUMN nome varchar(255) NOT NULL COMMENT 'Nome';


SET @dbname = DATABASE();
SET @tablename = "tipos_produto";
SET @columnname = "id_site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE tipos_produto
MODIFY COLUMN id_site int(11) NOT NULL COMMENT 'Site';


SET @dbname = DATABASE();
SET @tablename = "tipos_produto";
SET @columnname = "nome";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE tipos_produto
MODIFY COLUMN nome varchar(255) NOT NULL COMMENT 'Nome';


SET @dbname = DATABASE();
SET @tablename = "tipos_tarefa";
SET @columnname = "id_site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE tipos_tarefa
MODIFY COLUMN id_site int(11) NOT NULL COMMENT 'Site';


SET @dbname = DATABASE();
SET @tablename = "tipos_tarefa";
SET @columnname = "nome";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE tipos_tarefa
MODIFY COLUMN nome varchar(255) NOT NULL COMMENT 'Nome';


SET @dbname = DATABASE();
SET @tablename = "usuarios";
SET @columnname = "id_pperfis";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE usuarios
MODIFY COLUMN id_pperfis int(11) NOT NULL COMMENT 'Perfil';


SET @dbname = DATABASE();
SET @tablename = "usuarios";
SET @columnname = "nome";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE usuarios
MODIFY COLUMN nome varchar(255) NOT NULL COMMENT 'Nome';


SET @dbname = DATABASE();
SET @tablename = "usuarios";
SET @columnname = "e_mail";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE usuarios
MODIFY COLUMN e_mail varchar(255) NOT NULL COMMENT 'E-mail';


SET @dbname = DATABASE();
SET @tablename = "usuarios";
SET @columnname = "senha";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE usuarios
MODIFY COLUMN senha varchar(255) NOT NULL COMMENT 'Senha';


SET @dbname = DATABASE();
SET @tablename = "usuarios";
SET @columnname = "telefone";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " varchar(255) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE usuarios
MODIFY COLUMN telefone varchar(255) NOT NULL COMMENT 'Telefone';


SET @dbname = DATABASE();
SET @tablename = "usuarios";
SET @columnname = "id_status_cadastro";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE usuarios
MODIFY COLUMN id_status_cadastro int(11) NOT NULL COMMENT 'Status';


SET @dbname = DATABASE();
SET @tablename = "usuarios";
SET @columnname = "id_site";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " int(11) NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE usuarios
MODIFY COLUMN id_site int(11) NOT NULL COMMENT 'Site';


SET @dbname = DATABASE();
SET @tablename = "usuarios";
SET @columnname = "obs";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE usuarios
MODIFY COLUMN obs longtext NOT NULL COMMENT 'Obs';


SET @dbname = DATABASE();
SET @tablename = "usuarios";
SET @columnname = "historico";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " longtext NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE usuarios
MODIFY COLUMN historico longtext NOT NULL COMMENT 'Histórico';


SET @dbname = DATABASE();
SET @tablename = "usuarios";
SET @columnname = "data_cadastro";
SET @preparedStatement = (SELECT IF(
(SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE (table_name = @tablename) AND (table_schema = @dbname) AND (column_name = @columnname)) > 0, "SELECT 1", CONCAT("ALTER TABLE ", @tablename, " ADD ", @columnname, " datetime NOT NULL;")));
PREPARE alterIfNotExists FROM @preparedStatement;
EXECUTE alterIfNotExists;
DEALLOCATE PREPARE alterIfNotExists;
ALTER TABLE usuarios
MODIFY COLUMN data_cadastro datetime NOT NULL COMMENT 'Data Cadastro';


