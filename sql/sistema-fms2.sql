
SET sql_mode = '';

CREATE TABLE IF NOT EXISTS `aacoes` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`nome` varchar(255) NOT NULL COMMENT 'Nome',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `ccampos` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_ttabelas` int(11) NOT NULL COMMENT 'Tabela',
`nome` varchar(255) NOT NULL COMMENT 'Nome',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `llogs` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_usuarios` int(11) NOT NULL COMMENT 'Usuário',
`ip` varchar(255) NOT NULL COMMENT 'IP',
`url` varchar(255) NOT NULL COMMENT 'URL',
`arquivos` varchar(255) NOT NULL COMMENT 'Arquivos',
`data_hora` datetime NOT NULL COMMENT 'Data Hora',
`sql_executado` longtext NOT NULL COMMENT 'SQL Executado',
`parametros` longtext NOT NULL COMMENT 'Parâmetros',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `pperfis` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`nome` varchar(255) NOT NULL COMMENT 'Nome',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `ppermissoes` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_pperfis` int(11) NOT NULL COMMENT 'Perfil',
`id_ttabelas` int(11) NOT NULL COMMENT 'Tabela',
`id_ccampos` int(11) NOT NULL COMMENT 'Campo',
`id_aacoes` int(11) NOT NULL COMMENT 'Ação',
`permissao` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não' COMMENT 'Permissão',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `ttabelas` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`nome` varchar(255) NOT NULL COMMENT 'Nome',
`relacionamentos` longtext NOT NULL COMMENT 'relacionamentos',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `carrinhos` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL COMMENT 'Site',
`carrinho` varchar(255) NOT NULL COMMENT 'Carrinho',
`operacao` varchar(255) NOT NULL COMMENT 'Operação',
`id_produtos` int(11) NOT NULL COMMENT 'Produto',
`quantidade` int(11) NOT NULL COMMENT 'Quantidade',
`obs_do_pedido` longtext NOT NULL COMMENT 'Obs do Pedido',
`taxa_de_entrega` decimal(10,2) NOT NULL COMMENT 'Taxa de Entrega',
`desconto` decimal(10,2) NOT NULL COMMENT 'Desconto',
`cupom_de_desconto` varchar(255) NOT NULL COMMENT 'Cupom de Desconto',
`historico` longtext NOT NULL COMMENT 'Histórico',
`data_cadastro` datetime NOT NULL COMMENT 'Data Cadastro',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `carrinhos` SET 
`id` = '1', 
`id_site` = '1', 
`carrinho` = 'Netus nisi vitae', 
`operacao` = 'Sed aenean aliquet', 
`id_produtos` = '1', 
`quantidade` = '8', 
`obs_do_pedido` = 'Proin amet ad', 
`taxa_de_entrega` = '1876.17', 
`desconto` = '1876.17', 
`cupom_de_desconto` = 'Netus nisi vitae', 
`historico` = '09/06/2022 08:09:39 João
09/06/2022 09:09:59 José
', 
`data_cadastro` = '2023-02-25 19:05:48';


INSERT INTO `carrinhos` SET 
`id` = '2', 
`id_site` = '1', 
`carrinho` = 'Netus nisi vitae', 
`operacao` = 'Sed aenean aliquet', 
`id_produtos` = '1', 
`quantidade` = '8', 
`obs_do_pedido` = 'Proin amet ad', 
`taxa_de_entrega` = '1876.17', 
`desconto` = '1876.17', 
`cupom_de_desconto` = 'Netus nisi vitae', 
`historico` = '09/06/2022 08:09:39 João
09/06/2022 09:09:59 José
', 
`data_cadastro` = '2023-02-25 19:05:48';

CREATE TABLE IF NOT EXISTS `categorias` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_secoes` int(11) NOT NULL COMMENT 'Seção',
`nome` varchar(255) NOT NULL COMMENT 'Nome',
`imagem` char(4) NOT NULL COMMENT 'Imagem',
`id_status_site` int(11) NOT NULL COMMENT 'Status',
`data_expira` datetime NOT NULL COMMENT 'Data Expira',
`ordem` int(11) NOT NULL COMMENT 'Ordem',
`titulo` varchar(255) NOT NULL COMMENT 'Título',
`subtitulo` varchar(255) NOT NULL COMMENT 'Subtítulo',
`descricao` longtext NOT NULL COMMENT 'Descrição',
`obs` longtext NOT NULL COMMENT 'Obs',
`background` varchar(255) NOT NULL COMMENT 'Background',
`cortxt` varchar(255) NOT NULL COMMENT 'CorTxt',
`container` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não' COMMENT 'Container',
`borda` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não' COMMENT 'Borda',
`borda_cor` varchar(255) NOT NULL COMMENT 'Borda Cor',
`borda_sombra` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não' COMMENT 'Borda Sombra',
`arredondado` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não' COMMENT 'Arredondado',
`parallax` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não' COMMENT 'Parallax',
`historico` longtext NOT NULL COMMENT 'Histórico',
`data_cadastro` datetime NOT NULL COMMENT 'Data Cadastro',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `categorias` SET 
`id` = '1', 
`id_secoes` = '1', 
`nome` = 'Sed aenean aliquet', 
`imagem` = 'jpg', 
`id_status_site` = '1', 
`data_expira` = '2023-02-25 19:05:48', 
`ordem` = '8', 
`titulo` = 'Netus nisi vitae', 
`subtitulo` = 'Netus nisi vitae', 
`descricao` = '<p>
Etiam potenti quam luctus interdum laoreet vestibulum ultrices elementum placerat inceptos, eleifend malesuada orci vehicula duis est dapibus aliquam pharetra, vel neque feugiat vitae non quis sociosqu ante sollicitudin. 
pharetra cras litora.
</p>', 
`obs` = 'Proin amet ad', 
`background` = 'Netus nisi vitae', 
`cortxt` = 'Sed aenean aliquet', 
`container` = 'Sim', 
`borda` = 'Sim', 
`borda_cor` = 'Sed aenean aliquet', 
`borda_sombra` = 'Sim', 
`arredondado` = 'Sim', 
`parallax` = 'Sim', 
`historico` = '09/06/2022 08:09:39 Maria
09/06/2022 09:09:59 Pedro
', 
`data_cadastro` = '2023-02-25 19:05:48';


INSERT INTO `categorias` SET 
`id` = '2', 
`id_secoes` = '1', 
`nome` = 'Sed aenean aliquet', 
`imagem` = 'jpg', 
`id_status_site` = '1', 
`data_expira` = '2023-02-25 19:05:48', 
`ordem` = '8', 
`titulo` = 'Netus nisi vitae', 
`subtitulo` = 'Netus nisi vitae', 
`descricao` = '<p>
Etiam potenti quam luctus interdum laoreet vestibulum ultrices elementum placerat inceptos, eleifend malesuada orci vehicula duis est dapibus aliquam pharetra, vel neque feugiat vitae non quis sociosqu ante sollicitudin. 
pharetra cras litora.
</p>', 
`obs` = 'Proin amet ad', 
`background` = 'Netus nisi vitae', 
`cortxt` = 'Sed aenean aliquet', 
`container` = 'Sim', 
`borda` = 'Sim', 
`borda_cor` = 'Sed aenean aliquet', 
`borda_sombra` = 'Sim', 
`arredondado` = 'Sim', 
`parallax` = 'Sim', 
`historico` = '09/06/2022 08:09:39 Maria
09/06/2022 09:09:59 Pedro
', 
`data_cadastro` = '2023-02-25 19:05:48';

CREATE TABLE IF NOT EXISTS `clientes` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL COMMENT 'Site',
`nome` varchar(255) NOT NULL COMMENT 'Nome',
`foto` char(4) NOT NULL COMMENT 'Foto',
`id_status_cadastro` int(11) NOT NULL COMMENT 'Status',
`data_expira` datetime NOT NULL COMMENT 'Data Expira',
`retorno` datetime NOT NULL COMMENT 'Retorno',
`cpf` varchar(255) NOT NULL COMMENT 'CPF',
`empresa` varchar(255) NOT NULL COMMENT 'Empresa',
`cnpj` varchar(255) NOT NULL COMMENT 'CNPJ',
`e_mail` varchar(255) NOT NULL COMMENT 'E-mail',
`senha` varchar(255) NOT NULL COMMENT 'Senha',
`e_mail_2` varchar(255) NOT NULL COMMENT 'E-mail 2',
`telefone` varchar(255) NOT NULL COMMENT 'Telefone',
`telefone_2` varchar(255) NOT NULL COMMENT 'Telefone 2',
`cep` varchar(255) NOT NULL COMMENT 'CEP',
`endereco` varchar(255) NOT NULL COMMENT 'Endereço',
`numero` varchar(255) NOT NULL COMMENT 'Número',
`complemento` varchar(255) NOT NULL COMMENT 'Complemento',
`bairro` varchar(255) NOT NULL COMMENT 'Bairro',
`cidade` varchar(255) NOT NULL COMMENT 'Cidade',
`estado` varchar(255) NOT NULL COMMENT 'Estado',
`pix` varchar(255) NOT NULL COMMENT 'PIX',
`banco` varchar(255) NOT NULL COMMENT 'Banco',
`agencia` varchar(255) NOT NULL COMMENT 'Agência',
`conta` varchar(255) NOT NULL COMMENT 'Conta',
`tipo_de_conta` varchar(255) NOT NULL COMMENT 'Tipo de Conta',
`obs` longtext NOT NULL COMMENT 'Obs',
`documentos` char(4) NOT NULL COMMENT 'Documentos',
`historico` longtext NOT NULL COMMENT 'Histórico',
`data_cadastro` datetime NOT NULL COMMENT 'Data Cadastro',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `clientes` SET 
`id` = '1', 
`id_site` = '1', 
`nome` = 'Sed aenean aliquet', 
`foto` = 'jpg', 
`id_status_cadastro` = '1', 
`data_expira` = '2023-02-25 19:05:48', 
`retorno` = '2023-02-25 19:05:48', 
`cpf` = '178.086.990-80', 
`empresa` = 'Sed aenean aliquet', 
`cnpj` = '14.712.690/0001-16', 
`e_mail` = 'lucianodalmas@gmail.com', 
`senha` = '6743560772dad0a8c0882be7ea2f1de6', 
`e_mail_2` = 'lucianodalmas@gmail.com', 
`telefone` = '(48) 98814-1308', 
`telefone_2` = '(48) 98814-1308', 
`cep` = '63040-480', 
`endereco` = 'Sed aenean aliquet', 
`numero` = 'Sed aenean aliquet', 
`complemento` = 'Netus nisi vitae', 
`bairro` = 'Netus nisi vitae', 
`cidade` = 'Netus nisi vitae', 
`estado` = 'SP', 
`pix` = 'Netus nisi vitae', 
`banco` = 'Netus nisi vitae', 
`agencia` = 'Netus nisi vitae', 
`conta` = 'Netus nisi vitae', 
`tipo_de_conta` = 'Sed aenean aliquet', 
`obs` = 'Proin amet ad', 
`documentos` = 'pdf', 
`historico` = '09/06/2022 08:09:39 João
09/06/2022 09:09:59 José
', 
`data_cadastro` = '2023-02-25 19:05:48';


INSERT INTO `clientes` SET 
`id` = '2', 
`id_site` = '1', 
`nome` = 'Sed aenean aliquet', 
`foto` = 'jpg', 
`id_status_cadastro` = '1', 
`data_expira` = '2023-02-25 19:05:48', 
`retorno` = '2023-02-25 19:05:48', 
`cpf` = '178.086.990-80', 
`empresa` = 'Sed aenean aliquet', 
`cnpj` = '14.712.690/0001-16', 
`e_mail` = 'lucianodalmas@gmail.com', 
`senha` = '6743560772dad0a8c0882be7ea2f1de6', 
`e_mail_2` = 'lucianodalmas@gmail.com', 
`telefone` = '(48) 98814-1308', 
`telefone_2` = '(48) 98814-1308', 
`cep` = '63040-480', 
`endereco` = 'Sed aenean aliquet', 
`numero` = 'Sed aenean aliquet', 
`complemento` = 'Netus nisi vitae', 
`bairro` = 'Netus nisi vitae', 
`cidade` = 'Netus nisi vitae', 
`estado` = 'SP', 
`pix` = 'Netus nisi vitae', 
`banco` = 'Netus nisi vitae', 
`agencia` = 'Netus nisi vitae', 
`conta` = 'Netus nisi vitae', 
`tipo_de_conta` = 'Sed aenean aliquet', 
`obs` = 'Proin amet ad', 
`documentos` = 'pdf', 
`historico` = '09/06/2022 08:09:39 João
09/06/2022 09:09:59 José
', 
`data_cadastro` = '2023-02-25 19:05:48';

CREATE TABLE IF NOT EXISTS `corretores` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL COMMENT 'Site',
`nome` varchar(255) NOT NULL COMMENT 'Nome',
`foto` char(4) NOT NULL COMMENT 'Foto',
`id_status_cadastro` int(11) NOT NULL COMMENT 'Status',
`creci` varchar(255) NOT NULL COMMENT 'CRECI',
`data_expira` datetime NOT NULL COMMENT 'Data Expira',
`retorno` datetime NOT NULL COMMENT 'Retorno',
`cpf` varchar(255) NOT NULL COMMENT 'CPF',
`empresa` varchar(255) NOT NULL COMMENT 'Empresa',
`cnpj` varchar(255) NOT NULL COMMENT 'CNPJ',
`e_mail` varchar(255) NOT NULL COMMENT 'E-mail',
`senha` varchar(255) NOT NULL COMMENT 'Senha',
`e_mail_2` varchar(255) NOT NULL COMMENT 'E-mail 2',
`telefone` varchar(255) NOT NULL COMMENT 'Telefone',
`telefone_2` varchar(255) NOT NULL COMMENT 'Telefone 2',
`cep` varchar(255) NOT NULL COMMENT 'CEP',
`endereco` varchar(255) NOT NULL COMMENT 'Endereço',
`numero` varchar(255) NOT NULL COMMENT 'Número',
`complemento` varchar(255) NOT NULL COMMENT 'Complemento',
`bairro` varchar(255) NOT NULL COMMENT 'Bairro',
`cidade` varchar(255) NOT NULL COMMENT 'Cidade',
`estado` varchar(255) NOT NULL COMMENT 'Estado',
`pix` varchar(255) NOT NULL COMMENT 'PIX',
`banco` varchar(255) NOT NULL COMMENT 'Banco',
`agencia` varchar(255) NOT NULL COMMENT 'Agência',
`conta` varchar(255) NOT NULL COMMENT 'Conta',
`tipo_de_conta` varchar(255) NOT NULL COMMENT 'Tipo de Conta',
`obs` longtext NOT NULL COMMENT 'Obs',
`documentos` char(4) NOT NULL COMMENT 'Documentos',
`historico` longtext NOT NULL COMMENT 'Histórico',
`data_cadastro` datetime NOT NULL COMMENT 'Data Cadastro',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `corretores` SET 
`id` = '1', 
`id_site` = '1', 
`nome` = 'Sed aenean aliquet', 
`foto` = 'pdf', 
`id_status_cadastro` = '1', 
`creci` = 'Netus nisi vitae', 
`data_expira` = '2023-02-25 19:05:48', 
`retorno` = '2023-02-25 19:05:48', 
`cpf` = '263.000.690-52', 
`empresa` = 'Netus nisi vitae', 
`cnpj` = '99.117.895/0001-06', 
`e_mail` = 'lucianodalmas@gmail.com', 
`senha` = '76a9d946769d30311fdc884ec4e65656', 
`e_mail_2` = 'lucianodalmas@gmail.com', 
`telefone` = '(48) 98814-1308', 
`telefone_2` = '(48) 98814-1308', 
`cep` = '63040-480', 
`endereco` = 'Netus nisi vitae', 
`numero` = 'Netus nisi vitae', 
`complemento` = 'Sed aenean aliquet', 
`bairro` = 'Sed aenean aliquet', 
`cidade` = 'Sed aenean aliquet', 
`estado` = 'PA', 
`pix` = 'Sed aenean aliquet', 
`banco` = 'Sed aenean aliquet', 
`agencia` = 'Sed aenean aliquet', 
`conta` = 'Netus nisi vitae', 
`tipo_de_conta` = 'Netus nisi vitae', 
`obs` = 'Netus nisi vitae', 
`documentos` = 'pdf', 
`historico` = '09/06/2022 08:09:39 Maria
09/06/2022 09:09:59 Pedro
', 
`data_cadastro` = '2023-02-25 19:05:48';


INSERT INTO `corretores` SET 
`id` = '2', 
`id_site` = '1', 
`nome` = 'Sed aenean aliquet', 
`foto` = 'pdf', 
`id_status_cadastro` = '1', 
`creci` = 'Netus nisi vitae', 
`data_expira` = '2023-02-25 19:05:48', 
`retorno` = '2023-02-25 19:05:48', 
`cpf` = '263.000.690-52', 
`empresa` = 'Netus nisi vitae', 
`cnpj` = '99.117.895/0001-06', 
`e_mail` = 'lucianodalmas@gmail.com', 
`senha` = '76a9d946769d30311fdc884ec4e65656', 
`e_mail_2` = 'lucianodalmas@gmail.com', 
`telefone` = '(48) 98814-1308', 
`telefone_2` = '(48) 98814-1308', 
`cep` = '63040-480', 
`endereco` = 'Netus nisi vitae', 
`numero` = 'Netus nisi vitae', 
`complemento` = 'Sed aenean aliquet', 
`bairro` = 'Sed aenean aliquet', 
`cidade` = 'Sed aenean aliquet', 
`estado` = 'PA', 
`pix` = 'Sed aenean aliquet', 
`banco` = 'Sed aenean aliquet', 
`agencia` = 'Sed aenean aliquet', 
`conta` = 'Netus nisi vitae', 
`tipo_de_conta` = 'Netus nisi vitae', 
`obs` = 'Netus nisi vitae', 
`documentos` = 'pdf', 
`historico` = '09/06/2022 08:09:39 Maria
09/06/2022 09:09:59 Pedro
', 
`data_cadastro` = '2023-02-25 19:05:48';

CREATE TABLE IF NOT EXISTS `cupons_de_descontos` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL COMMENT 'Site',
`nome` varchar(255) NOT NULL COMMENT 'Nome',
`imagem` char(4) NOT NULL COMMENT 'Imagem',
`id_status_site` int(11) NOT NULL COMMENT 'Status',
`codigo` varchar(255) NOT NULL COMMENT 'Código',
`data_expira` datetime NOT NULL COMMENT 'Data Expira',
`titulo` varchar(255) NOT NULL COMMENT 'Título',
`descricao` longtext NOT NULL COMMENT 'Descrição',
`obs` longtext NOT NULL COMMENT 'Obs',
`historico` longtext NOT NULL COMMENT 'Histórico',
`data_cadastro` datetime NOT NULL COMMENT 'Data Cadastro',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `cupons_de_descontos` SET 
`id` = '1', 
`id_site` = '1', 
`nome` = 'Sed aenean aliquet', 
`imagem` = 'jpg', 
`id_status_site` = '1', 
`codigo` = 'Netus nisi vitae', 
`data_expira` = '2023-02-25 19:05:48', 
`titulo` = 'Netus nisi vitae', 
`descricao` = '<p>
Etiam potenti quam luctus interdum laoreet vestibulum ultrices elementum placerat inceptos, eleifend malesuada orci vehicula duis est dapibus aliquam pharetra, vel neque feugiat vitae non quis sociosqu ante sollicitudin. 
pharetra cras litora.
</p>', 
`obs` = 'Proin amet ad', 
`historico` = '09/06/2022 08:09:39 João
09/06/2022 09:09:59 José
', 
`data_cadastro` = '2023-02-25 19:05:48';


INSERT INTO `cupons_de_descontos` SET 
`id` = '2', 
`id_site` = '1', 
`nome` = 'Sed aenean aliquet', 
`imagem` = 'jpg', 
`id_status_site` = '1', 
`codigo` = 'Netus nisi vitae', 
`data_expira` = '2023-02-25 19:05:48', 
`titulo` = 'Netus nisi vitae', 
`descricao` = '<p>
Etiam potenti quam luctus interdum laoreet vestibulum ultrices elementum placerat inceptos, eleifend malesuada orci vehicula duis est dapibus aliquam pharetra, vel neque feugiat vitae non quis sociosqu ante sollicitudin. 
pharetra cras litora.
</p>', 
`obs` = 'Proin amet ad', 
`historico` = '09/06/2022 08:09:39 João
09/06/2022 09:09:59 José
', 
`data_cadastro` = '2023-02-25 19:05:48';

CREATE TABLE IF NOT EXISTS `e_mails_automaticos` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL COMMENT 'Site',
`tipo` varchar(255) NOT NULL COMMENT 'Tipo',
`id_status_site` int(11) NOT NULL COMMENT 'Status',
`titulo` varchar(255) NOT NULL COMMENT 'Título',
`mensagem` longtext NOT NULL COMMENT 'Mensagem',
`historico` longtext NOT NULL COMMENT 'Histórico',
`data_cadastro` datetime NOT NULL COMMENT 'Data Cadastro',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `e_mails_automaticos` SET 
`id` = '1', 
`id_site` = '1', 
`tipo` = 'Sed aenean aliquet', 
`id_status_site` = '1', 
`titulo` = 'Sed aenean aliquet', 
`mensagem` = '<p>
Etiam potenti quam luctus interdum laoreet vestibulum ultrices elementum placerat inceptos, eleifend malesuada orci vehicula duis est dapibus aliquam pharetra, vel neque feugiat vitae non quis sociosqu ante sollicitudin. 
pharetra cras litora.
</p>', 
`historico` = '09/06/2022 08:09:39 Maria
09/06/2022 09:09:59 Pedro
', 
`data_cadastro` = '2023-02-25 19:05:48';


INSERT INTO `e_mails_automaticos` SET 
`id` = '2', 
`id_site` = '1', 
`tipo` = 'Sed aenean aliquet', 
`id_status_site` = '1', 
`titulo` = 'Sed aenean aliquet', 
`mensagem` = '<p>
Etiam potenti quam luctus interdum laoreet vestibulum ultrices elementum placerat inceptos, eleifend malesuada orci vehicula duis est dapibus aliquam pharetra, vel neque feugiat vitae non quis sociosqu ante sollicitudin. 
pharetra cras litora.
</p>', 
`historico` = '09/06/2022 08:09:39 Maria
09/06/2022 09:09:59 Pedro
', 
`data_cadastro` = '2023-02-25 19:05:48';

CREATE TABLE IF NOT EXISTS `e_mails_captados` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL COMMENT 'Site',
`nome` varchar(255) NOT NULL COMMENT 'Nome',
`empresa` varchar(255) NOT NULL COMMENT 'Empresa',
`id_status_site` int(11) NOT NULL COMMENT 'Status',
`telefone` varchar(255) NOT NULL COMMENT 'Telefone',
`e_mail` varchar(255) NOT NULL COMMENT 'E-mail',
`fonte` varchar(255) NOT NULL COMMENT 'Fonte',
`obs` longtext NOT NULL COMMENT 'Obs',
`historico` longtext NOT NULL COMMENT 'Histórico',
`data_cadastro` datetime NOT NULL COMMENT 'Data Cadastro',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `e_mails_captados` SET 
`id` = '1', 
`id_site` = '1', 
`nome` = 'Sed aenean aliquet', 
`empresa` = 'Sed aenean aliquet', 
`id_status_site` = '1', 
`telefone` = '(48) 98814-1308', 
`e_mail` = 'lucianodalmas@gmail.com', 
`fonte` = 'Netus nisi vitae', 
`obs` = 'Proin amet ad', 
`historico` = '09/06/2022 08:09:39 Maria
09/06/2022 09:09:59 Pedro
', 
`data_cadastro` = '2023-02-25 19:05:48';


INSERT INTO `e_mails_captados` SET 
`id` = '2', 
`id_site` = '1', 
`nome` = 'Sed aenean aliquet', 
`empresa` = 'Sed aenean aliquet', 
`id_status_site` = '1', 
`telefone` = '(48) 98814-1308', 
`e_mail` = 'lucianodalmas@gmail.com', 
`fonte` = 'Netus nisi vitae', 
`obs` = 'Proin amet ad', 
`historico` = '09/06/2022 08:09:39 Maria
09/06/2022 09:09:59 Pedro
', 
`data_cadastro` = '2023-02-25 19:05:48';

CREATE TABLE IF NOT EXISTS `e_mails_mkt` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL COMMENT 'Site',
`tipo` varchar(255) NOT NULL COMMENT 'Tipo',
`id_status_mkt` int(11) NOT NULL COMMENT 'Status',
`destinatario` longtext NOT NULL COMMENT 'Destinatário',
`copia_oculta` longtext NOT NULL COMMENT 'Cópia Oculta',
`titulo` varchar(255) NOT NULL COMMENT 'Título',
`mensagem` longtext NOT NULL COMMENT 'Mensagem',
`obs` longtext NOT NULL COMMENT 'Obs',
`data_envio` datetime NOT NULL COMMENT 'Data Envio',
`historico` longtext NOT NULL COMMENT 'Histórico',
`data_cadastro` datetime NOT NULL COMMENT 'Data Cadastro',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `e_mails_mkt` SET 
`id` = '1', 
`id_site` = '1', 
`tipo` = 'Sed aenean aliquet', 
`id_status_mkt` = '1', 
`destinatario` = 'Netus nisi vitae', 
`copia_oculta` = 'Netus nisi vitae', 
`titulo` = 'Netus nisi vitae', 
`mensagem` = '<p>
Etiam potenti quam luctus interdum laoreet vestibulum ultrices elementum placerat inceptos, eleifend malesuada orci vehicula duis est dapibus aliquam pharetra, vel neque feugiat vitae non quis sociosqu ante sollicitudin. 
pharetra cras litora.
</p>', 
`obs` = 'Netus nisi vitae', 
`data_envio` = '2023-02-25 19:05:48', 
`historico` = '09/06/2022 08:09:39 Maria
09/06/2022 09:09:59 Pedro
', 
`data_cadastro` = '2023-02-25 19:05:48';


INSERT INTO `e_mails_mkt` SET 
`id` = '2', 
`id_site` = '1', 
`tipo` = 'Sed aenean aliquet', 
`id_status_mkt` = '1', 
`destinatario` = 'Netus nisi vitae', 
`copia_oculta` = 'Netus nisi vitae', 
`titulo` = 'Netus nisi vitae', 
`mensagem` = '<p>
Etiam potenti quam luctus interdum laoreet vestibulum ultrices elementum placerat inceptos, eleifend malesuada orci vehicula duis est dapibus aliquam pharetra, vel neque feugiat vitae non quis sociosqu ante sollicitudin. 
pharetra cras litora.
</p>', 
`obs` = 'Netus nisi vitae', 
`data_envio` = '2023-02-25 19:05:48', 
`historico` = '09/06/2022 08:09:39 Maria
09/06/2022 09:09:59 Pedro
', 
`data_cadastro` = '2023-02-25 19:05:48';

CREATE TABLE IF NOT EXISTS `enderecos` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_clientes` int(11) NOT NULL COMMENT 'Cliente',
`nome` varchar(255) NOT NULL COMMENT 'Nome',
`cpf` varchar(255) NOT NULL COMMENT 'CPF',
`telefone` varchar(255) NOT NULL COMMENT 'Telefone',
`cep` varchar(255) NOT NULL COMMENT 'CEP',
`endereco` varchar(255) NOT NULL COMMENT 'Endereço',
`numero` varchar(255) NOT NULL COMMENT 'Número',
`complemento` varchar(255) NOT NULL COMMENT 'Complemento',
`bairro` varchar(255) NOT NULL COMMENT 'Bairro',
`cidade` varchar(255) NOT NULL COMMENT 'Cidade',
`estado` varchar(255) NOT NULL COMMENT 'Estado',
`obs` longtext NOT NULL COMMENT 'Obs',
`historico` longtext NOT NULL COMMENT 'Histórico',
`data_cadastro` datetime NOT NULL COMMENT 'Data Cadastro',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `enderecos` SET 
`id` = '1', 
`id_clientes` = '1', 
`nome` = 'Sed aenean aliquet', 
`cpf` = 'Sed aenean aliquet', 
`telefone` = '(48) 98814-1308', 
`cep` = '77808-652', 
`endereco` = 'Netus nisi vitae', 
`numero` = 'Sed aenean aliquet', 
`complemento` = 'Netus nisi vitae', 
`bairro` = 'Sed aenean aliquet', 
`cidade` = 'Sed aenean aliquet', 
`estado` = 'DF', 
`obs` = 'Proin amet ad', 
`historico` = '09/06/2022 08:09:39 Maria
09/06/2022 09:09:59 Pedro
', 
`data_cadastro` = '2023-02-25 19:05:48';


INSERT INTO `enderecos` SET 
`id` = '2', 
`id_clientes` = '1', 
`nome` = 'Sed aenean aliquet', 
`cpf` = 'Sed aenean aliquet', 
`telefone` = '(48) 98814-1308', 
`cep` = '77808-652', 
`endereco` = 'Netus nisi vitae', 
`numero` = 'Sed aenean aliquet', 
`complemento` = 'Netus nisi vitae', 
`bairro` = 'Sed aenean aliquet', 
`cidade` = 'Sed aenean aliquet', 
`estado` = 'DF', 
`obs` = 'Proin amet ad', 
`historico` = '09/06/2022 08:09:39 Maria
09/06/2022 09:09:59 Pedro
', 
`data_cadastro` = '2023-02-25 19:05:48';

CREATE TABLE IF NOT EXISTS `etiquetas_imovel` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL COMMENT 'Site',
`nome` varchar(255) NOT NULL COMMENT 'Nome',
`label` varchar(255) NOT NULL COMMENT 'Label',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `etiquetas_imovel` SET 
`id` = '1', 
`id_site` = '1', 
`nome` = 'Sed aenean aliquet', 
`label` = 'primary';


INSERT INTO `etiquetas_imovel` SET 
`id` = '2', 
`id_site` = '1', 
`nome` = 'Sed aenean aliquet', 
`label` = 'primary';

CREATE TABLE IF NOT EXISTS `etiquetas_postagem` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL COMMENT 'Site',
`nome` varchar(255) NOT NULL COMMENT 'Nome',
`label` varchar(255) NOT NULL COMMENT 'Label',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `etiquetas_postagem` SET 
`id` = '1', 
`id_site` = '1', 
`nome` = 'Netus nisi vitae', 
`label` = 'danger';


INSERT INTO `etiquetas_postagem` SET 
`id` = '2', 
`id_site` = '1', 
`nome` = 'Netus nisi vitae', 
`label` = 'danger';

CREATE TABLE IF NOT EXISTS `etiquetas_produto` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL COMMENT 'Site',
`nome` varchar(255) NOT NULL COMMENT 'Nome',
`label` varchar(255) NOT NULL COMMENT 'Label',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `etiquetas_produto` SET 
`id` = '1', 
`id_site` = '1', 
`nome` = 'Sed aenean aliquet', 
`label` = 'danger';


INSERT INTO `etiquetas_produto` SET 
`id` = '2', 
`id_site` = '1', 
`nome` = 'Sed aenean aliquet', 
`label` = 'danger';

CREATE TABLE IF NOT EXISTS `imoveis` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_secoes` int(11) NOT NULL COMMENT 'Seção',
`id_categorias` int(11) NOT NULL COMMENT 'Categoria',
`id_subcategorias` int(11) NOT NULL COMMENT 'Subcategoria',
`nome` varchar(255) NOT NULL COMMENT 'Nome',
`imagem` char(4) NOT NULL COMMENT 'Imagem',
`id_status_imovel` int(11) NOT NULL COMMENT 'Status',
`codigo` varchar(255) NOT NULL COMMENT 'Código',
`data_expira` datetime NOT NULL COMMENT 'Data Expira',
`destaque` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não' COMMENT 'Destaque',
`id_etiquetas_imovel` int(11) NOT NULL COMMENT 'Etiqueta',
`id_status_negociacao` int(11) NOT NULL COMMENT 'Negociação',
`id_tipos_imovel` int(11) NOT NULL COMMENT 'Tipo',
`exclusivo` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não' COMMENT 'Exclusivo',
`escriturado` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não' COMMENT 'Escriturado',
`id_corretores` int(11) NOT NULL COMMENT 'Corretor',
`id_proprietarios` int(11) NOT NULL COMMENT 'Proprietário',
`area_total` int(11) NOT NULL COMMENT 'Área Total',
`area_construida` int(11) NOT NULL COMMENT 'Área Construída',
`valor_venda` decimal(10,2) NOT NULL COMMENT 'Valor Venda',
`valor_aluguel` decimal(10,2) NOT NULL COMMENT 'Valor Aluguel',
`valor_condominio` decimal(10,2) NOT NULL COMMENT 'Valor Condomínio',
`valor_caucao` varchar(255) NOT NULL COMMENT 'Valor Caução',
`outros_valores` varchar(255) NOT NULL COMMENT 'Outros Valores',
`comissao` varchar(255) NOT NULL COMMENT 'Comissão',
`imagens` char(4) NOT NULL COMMENT 'Imagens',
`video` varchar(255) NOT NULL COMMENT 'Vídeo',
`titulo` varchar(255) NOT NULL COMMENT 'Título',
`detalhes` longtext NOT NULL COMMENT 'Detalhes',
`descricao` longtext NOT NULL COMMENT 'Descrição',
`obs` longtext NOT NULL COMMENT 'Obs',
`documentos` char(4) NOT NULL COMMENT 'Documentos',
`historico` longtext NOT NULL COMMENT 'Histórico',
`data_cadastro` datetime NOT NULL COMMENT 'Data Cadastro',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `imoveis` SET 
`id` = '1', 
`id_secoes` = '1', 
`id_categorias` = '1', 
`id_subcategorias` = '1', 
`nome` = 'Sed aenean aliquet', 
`imagem` = 'jpg', 
`id_status_imovel` = '1', 
`codigo` = 'Netus nisi vitae', 
`data_expira` = '2023-02-25 19:05:48', 
`destaque` = 'Não', 
`id_etiquetas_imovel` = '1', 
`id_status_negociacao` = '1', 
`id_tipos_imovel` = '1', 
`exclusivo` = 'Não', 
`escriturado` = 'Não', 
`id_corretores` = '1', 
`id_proprietarios` = '1', 
`area_total` = '8', 
`area_construida` = '8', 
`valor_venda` = '25.47', 
`valor_aluguel` = '1876.17', 
`valor_condominio` = '25.47', 
`valor_caucao` = 'Netus nisi vitae', 
`outros_valores` = 'Sed aenean aliquet', 
`comissao` = 'Netus nisi vitae', 
`imagens` = 'jpg', 
`video` = '...', 
`titulo` = 'Netus nisi vitae', 
`detalhes` = '<p>
Ut nunc porttitor pulvinar duis purus lectus cursus, habitasse id tincidunt bibendum donec etiam pellentesque fames, aliquam cubilia etiam quisque a class. 
dapibus gravida quisque varius sit lorem semper sed, per sem ac primis diam potenti.
</p>', 
`descricao` = '<p>
Ut nunc porttitor pulvinar duis purus lectus cursus, habitasse id tincidunt bibendum donec etiam pellentesque fames, aliquam cubilia etiam quisque a class. 
dapibus gravida quisque varius sit lorem semper sed, per sem ac primis diam potenti.
</p>', 
`obs` = 'Netus nisi vitae', 
`documentos` = 'jpg', 
`historico` = '09/06/2022 08:09:39 Maria
09/06/2022 09:09:59 Pedro
', 
`data_cadastro` = '2023-02-25 19:05:48';


INSERT INTO `imoveis` SET 
`id` = '2', 
`id_secoes` = '1', 
`id_categorias` = '1', 
`id_subcategorias` = '1', 
`nome` = 'Sed aenean aliquet', 
`imagem` = 'jpg', 
`id_status_imovel` = '1', 
`codigo` = 'Netus nisi vitae', 
`data_expira` = '2023-02-25 19:05:48', 
`destaque` = 'Não', 
`id_etiquetas_imovel` = '1', 
`id_status_negociacao` = '1', 
`id_tipos_imovel` = '1', 
`exclusivo` = 'Não', 
`escriturado` = 'Não', 
`id_corretores` = '1', 
`id_proprietarios` = '1', 
`area_total` = '8', 
`area_construida` = '8', 
`valor_venda` = '25.47', 
`valor_aluguel` = '1876.17', 
`valor_condominio` = '25.47', 
`valor_caucao` = 'Netus nisi vitae', 
`outros_valores` = 'Sed aenean aliquet', 
`comissao` = 'Netus nisi vitae', 
`imagens` = 'jpg', 
`video` = '...', 
`titulo` = 'Netus nisi vitae', 
`detalhes` = '<p>
Ut nunc porttitor pulvinar duis purus lectus cursus, habitasse id tincidunt bibendum donec etiam pellentesque fames, aliquam cubilia etiam quisque a class. 
dapibus gravida quisque varius sit lorem semper sed, per sem ac primis diam potenti.
</p>', 
`descricao` = '<p>
Ut nunc porttitor pulvinar duis purus lectus cursus, habitasse id tincidunt bibendum donec etiam pellentesque fames, aliquam cubilia etiam quisque a class. 
dapibus gravida quisque varius sit lorem semper sed, per sem ac primis diam potenti.
</p>', 
`obs` = 'Netus nisi vitae', 
`documentos` = 'jpg', 
`historico` = '09/06/2022 08:09:39 Maria
09/06/2022 09:09:59 Pedro
', 
`data_cadastro` = '2023-02-25 19:05:48';

CREATE TABLE IF NOT EXISTS `lancamentos` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL COMMENT 'Site',
`id_tipos_lancamento` int(11) NOT NULL COMMENT 'Tipo',
`imagem` char(4) NOT NULL COMMENT 'Imagem',
`id_status_lancamento` int(11) NOT NULL COMMENT 'Status',
`destaque` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não' COMMENT 'Destaque',
`documentos` char(4) NOT NULL COMMENT 'Documentos',
`id_pedidos` int(11) NOT NULL COMMENT 'Pedido',
`id_clientes` int(11) NOT NULL COMMENT 'Cliente',
`id_parceiros` int(11) NOT NULL COMMENT 'Parceiro',
`terceiro` longtext NOT NULL COMMENT 'Terceiro',
`telefone` varchar(255) NOT NULL COMMENT 'Telefone',
`e_mail` varchar(255) NOT NULL COMMENT 'E-mail',
`titulo` varchar(255) NOT NULL COMMENT 'Título',
`detalhe` varchar(255) NOT NULL COMMENT 'Detalhe',
`descricao` longtext NOT NULL COMMENT 'Descrição',
`pagamento` varchar(255) NOT NULL COMMENT 'Pagamento',
`parcelas` int(11) NOT NULL COMMENT 'Parcelas',
`valor` decimal(10,2) NOT NULL COMMENT 'Valor',
`valor_total` decimal(10,2) NOT NULL COMMENT 'Valor Total',
`valor_recorrente` decimal(10,2) NOT NULL COMMENT 'Valor Recorrente',
`proximo_pagamento` date NOT NULL COMMENT 'Próximo Pagamento',
`ultimo_pagamento` date NOT NULL COMMENT 'Ultimo Pagamento',
`observacoes` longtext NOT NULL COMMENT 'Observações',
`historico` longtext NOT NULL COMMENT 'Histórico',
`data_cadastro` datetime NOT NULL COMMENT 'Data Cadastro',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `lancamentos` SET 
`id` = '1', 
`id_site` = '1', 
`id_tipos_lancamento` = '1', 
`imagem` = 'jpg', 
`id_status_lancamento` = '1', 
`destaque` = 'Sim', 
`documentos` = 'pdf', 
`id_pedidos` = '1', 
`id_clientes` = '1', 
`id_parceiros` = '1', 
`terceiro` = 'Proin amet ad', 
`telefone` = '(48) 98814-1308', 
`e_mail` = 'lucianodalmas@gmail.com', 
`titulo` = 'Sed aenean aliquet', 
`detalhe` = 'Sed aenean aliquet', 
`descricao` = '<p>
Etiam potenti quam luctus interdum laoreet vestibulum ultrices elementum placerat inceptos, eleifend malesuada orci vehicula duis est dapibus aliquam pharetra, vel neque feugiat vitae non quis sociosqu ante sollicitudin. 
pharetra cras litora.
</p>', 
`pagamento` = 'Netus nisi vitae', 
`parcelas` = '6', 
`valor` = '25.47', 
`valor_total` = '1876.17', 
`valor_recorrente` = '25.47', 
`proximo_pagamento` = '2023-02-25', 
`ultimo_pagamento` = '2023-02-25', 
`observacoes` = 'Netus nisi vitae', 
`historico` = '09/06/2022 08:09:39 Maria
09/06/2022 09:09:59 Pedro
', 
`data_cadastro` = '2023-02-25 19:05:48';


INSERT INTO `lancamentos` SET 
`id` = '2', 
`id_site` = '1', 
`id_tipos_lancamento` = '1', 
`imagem` = 'jpg', 
`id_status_lancamento` = '1', 
`destaque` = 'Sim', 
`documentos` = 'pdf', 
`id_pedidos` = '1', 
`id_clientes` = '1', 
`id_parceiros` = '1', 
`terceiro` = 'Proin amet ad', 
`telefone` = '(48) 98814-1308', 
`e_mail` = 'lucianodalmas@gmail.com', 
`titulo` = 'Sed aenean aliquet', 
`detalhe` = 'Sed aenean aliquet', 
`descricao` = '<p>
Etiam potenti quam luctus interdum laoreet vestibulum ultrices elementum placerat inceptos, eleifend malesuada orci vehicula duis est dapibus aliquam pharetra, vel neque feugiat vitae non quis sociosqu ante sollicitudin. 
pharetra cras litora.
</p>', 
`pagamento` = 'Netus nisi vitae', 
`parcelas` = '6', 
`valor` = '25.47', 
`valor_total` = '1876.17', 
`valor_recorrente` = '25.47', 
`proximo_pagamento` = '2023-02-25', 
`ultimo_pagamento` = '2023-02-25', 
`observacoes` = 'Netus nisi vitae', 
`historico` = '09/06/2022 08:09:39 Maria
09/06/2022 09:09:59 Pedro
', 
`data_cadastro` = '2023-02-25 19:05:48';

CREATE TABLE IF NOT EXISTS `parceiros` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL COMMENT 'Site',
`nome` varchar(255) NOT NULL COMMENT 'Nome',
`foto` char(4) NOT NULL COMMENT 'Foto',
`id_status_cadastro` int(11) NOT NULL COMMENT 'Status',
`funcao` varchar(255) NOT NULL COMMENT 'Função',
`data_expira` datetime NOT NULL COMMENT 'Data Expira',
`retorno` datetime NOT NULL COMMENT 'Retorno',
`cpf` varchar(255) NOT NULL COMMENT 'CPF',
`empresa` varchar(255) NOT NULL COMMENT 'Empresa',
`cnpj` varchar(255) NOT NULL COMMENT 'CNPJ',
`e_mail` varchar(255) NOT NULL COMMENT 'E-mail',
`senha` varchar(255) NOT NULL COMMENT 'Senha',
`e_mail_2` varchar(255) NOT NULL COMMENT 'E-mail 2',
`telefone` varchar(255) NOT NULL COMMENT 'Telefone',
`telefone_2` varchar(255) NOT NULL COMMENT 'Telefone 2',
`cep` varchar(255) NOT NULL COMMENT 'CEP',
`endereco` varchar(255) NOT NULL COMMENT 'Endereço',
`numero` varchar(255) NOT NULL COMMENT 'Número',
`complemento` varchar(255) NOT NULL COMMENT 'Complemento',
`bairro` varchar(255) NOT NULL COMMENT 'Bairro',
`cidade` varchar(255) NOT NULL COMMENT 'Cidade',
`estado` varchar(255) NOT NULL COMMENT 'Estado',
`pix` varchar(255) NOT NULL COMMENT 'PIX',
`banco` varchar(255) NOT NULL COMMENT 'Banco',
`agencia` varchar(255) NOT NULL COMMENT 'Agência',
`conta` varchar(255) NOT NULL COMMENT 'Conta',
`tipo_de_conta` varchar(255) NOT NULL COMMENT 'Tipo de Conta',
`obs` longtext NOT NULL COMMENT 'Obs',
`enexos` char(4) NOT NULL COMMENT 'Enexo(s)',
`historico` longtext NOT NULL COMMENT 'Histórico',
`data_cadastro` datetime NOT NULL COMMENT 'Data Cadastro',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `parceiros` SET 
`id` = '1', 
`id_site` = '1', 
`nome` = 'Sed aenean aliquet', 
`foto` = 'jpg', 
`id_status_cadastro` = '1', 
`funcao` = 'Sed aenean aliquet', 
`data_expira` = '2023-02-25 19:05:48', 
`retorno` = '2023-02-25 19:05:48', 
`cpf` = '263.000.690-52', 
`empresa` = 'Netus nisi vitae', 
`cnpj` = '14.712.690/0001-16', 
`e_mail` = 'lucianodalmas@gmail.com', 
`senha` = '76a9d946769d30311fdc884ec4e65656', 
`e_mail_2` = 'lucianodalmas@gmail.com', 
`telefone` = '(48) 98814-1308', 
`telefone_2` = '(48) 98814-1308', 
`cep` = '77808-652', 
`endereco` = 'Sed aenean aliquet', 
`numero` = 'Sed aenean aliquet', 
`complemento` = 'Netus nisi vitae', 
`bairro` = 'Netus nisi vitae', 
`cidade` = 'Sed aenean aliquet', 
`estado` = 'MT', 
`pix` = 'Sed aenean aliquet', 
`banco` = 'Sed aenean aliquet', 
`agencia` = 'Sed aenean aliquet', 
`conta` = 'Netus nisi vitae', 
`tipo_de_conta` = 'Netus nisi vitae', 
`obs` = 'Netus nisi vitae', 
`enexos` = 'jpg', 
`historico` = '09/06/2022 08:09:39 Maria
09/06/2022 09:09:59 Pedro
', 
`data_cadastro` = '2023-02-25 19:05:48';


INSERT INTO `parceiros` SET 
`id` = '2', 
`id_site` = '1', 
`nome` = 'Sed aenean aliquet', 
`foto` = 'jpg', 
`id_status_cadastro` = '1', 
`funcao` = 'Sed aenean aliquet', 
`data_expira` = '2023-02-25 19:05:48', 
`retorno` = '2023-02-25 19:05:48', 
`cpf` = '263.000.690-52', 
`empresa` = 'Netus nisi vitae', 
`cnpj` = '14.712.690/0001-16', 
`e_mail` = 'lucianodalmas@gmail.com', 
`senha` = '76a9d946769d30311fdc884ec4e65656', 
`e_mail_2` = 'lucianodalmas@gmail.com', 
`telefone` = '(48) 98814-1308', 
`telefone_2` = '(48) 98814-1308', 
`cep` = '77808-652', 
`endereco` = 'Sed aenean aliquet', 
`numero` = 'Sed aenean aliquet', 
`complemento` = 'Netus nisi vitae', 
`bairro` = 'Netus nisi vitae', 
`cidade` = 'Sed aenean aliquet', 
`estado` = 'MT', 
`pix` = 'Sed aenean aliquet', 
`banco` = 'Sed aenean aliquet', 
`agencia` = 'Sed aenean aliquet', 
`conta` = 'Netus nisi vitae', 
`tipo_de_conta` = 'Netus nisi vitae', 
`obs` = 'Netus nisi vitae', 
`enexos` = 'jpg', 
`historico` = '09/06/2022 08:09:39 Maria
09/06/2022 09:09:59 Pedro
', 
`data_cadastro` = '2023-02-25 19:05:48';

CREATE TABLE IF NOT EXISTS `pedidos` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL COMMENT 'Site',
`id_parceiros` int(11) NOT NULL COMMENT 'Vendedor',
`id_clientes` int(11) NOT NULL COMMENT 'Cliente',
`pedido` int(11) NOT NULL COMMENT 'Pedido',
`data` datetime NOT NULL COMMENT 'Data',
`id_status_pedido` int(11) NOT NULL COMMENT 'Status',
`id_status_operacao` int(11) NOT NULL COMMENT 'Operação',
`id_produtos` int(11) NOT NULL COMMENT 'Produto',
`quantidade` int(11) NOT NULL COMMENT 'Quantidade',
`preco` decimal(10,2) NOT NULL COMMENT 'Preço',
`desconto` decimal(10,2) NOT NULL COMMENT 'Desconto',
`taxa_de_entrega` decimal(10,2) NOT NULL COMMENT 'Taxa de Entrega',
`cupom_de_desconto` varchar(255) NOT NULL COMMENT 'Cupom de Desconto',
`valor_total` decimal(10,2) NOT NULL COMMENT 'Valor Total',
`pagamento` varchar(255) NOT NULL COMMENT 'Pagamento',
`txt_pedido` longtext NOT NULL COMMENT 'Txt Pedido',
`obs_pedido` longtext NOT NULL COMMENT 'Obs Pedido',
`historico` longtext NOT NULL COMMENT 'Histórico',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `pedidos` SET 
`id` = '1', 
`id_site` = '1', 
`id_parceiros` = '1', 
`id_clientes` = '1', 
`pedido` = '1', 
`data` = '2023-02-25 19:05:48', 
`id_status_pedido` = '1', 
`id_status_operacao` = '1', 
`id_produtos` = '1', 
`quantidade` = '6', 
`preco` = '1876.17', 
`desconto` = '1876.17', 
`taxa_de_entrega` = '1876.17', 
`cupom_de_desconto` = 'Sed aenean aliquet', 
`valor_total` = '1876.17', 
`pagamento` = 'Sed aenean aliquet', 
`txt_pedido` = '<p>
Ut nunc porttitor pulvinar duis purus lectus cursus, habitasse id tincidunt bibendum donec etiam pellentesque fames, aliquam cubilia etiam quisque a class. 
dapibus gravida quisque varius sit lorem semper sed, per sem ac primis diam potenti.
</p>', 
`obs_pedido` = 'Proin amet ad', 
`historico` = '09/06/2022 08:09:39 Maria
09/06/2022 09:09:59 Pedro
';


INSERT INTO `pedidos` SET 
`id` = '2', 
`id_site` = '1', 
`id_parceiros` = '1', 
`id_clientes` = '1', 
`pedido` = '1', 
`data` = '2023-02-25 19:05:48', 
`id_status_pedido` = '1', 
`id_status_operacao` = '1', 
`id_produtos` = '1', 
`quantidade` = '6', 
`preco` = '1876.17', 
`desconto` = '1876.17', 
`taxa_de_entrega` = '1876.17', 
`cupom_de_desconto` = 'Sed aenean aliquet', 
`valor_total` = '1876.17', 
`pagamento` = 'Sed aenean aliquet', 
`txt_pedido` = '<p>
Ut nunc porttitor pulvinar duis purus lectus cursus, habitasse id tincidunt bibendum donec etiam pellentesque fames, aliquam cubilia etiam quisque a class. 
dapibus gravida quisque varius sit lorem semper sed, per sem ac primis diam potenti.
</p>', 
`obs_pedido` = 'Proin amet ad', 
`historico` = '09/06/2022 08:09:39 Maria
09/06/2022 09:09:59 Pedro
';

CREATE TABLE IF NOT EXISTS `postagens` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_secoes` int(11) NOT NULL COMMENT 'Seção',
`id_categorias` int(11) NOT NULL COMMENT 'Categoria',
`id_subcategorias` int(11) NOT NULL COMMENT 'Subcategoria',
`nome` varchar(255) NOT NULL COMMENT 'Nome',
`imagem` char(4) NOT NULL COMMENT 'Imagem',
`id_status_site` int(11) NOT NULL COMMENT 'Status',
`data_expira` datetime NOT NULL COMMENT 'Data Expira',
`destaque` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não' COMMENT 'Destaque',
`id_etiquetas_postagem` int(11) NOT NULL COMMENT 'Etiqueta',
`anexos` char(4) NOT NULL COMMENT 'Anexo(s)',
`video` varchar(255) NOT NULL COMMENT 'Vídeo',
`titulo` varchar(255) NOT NULL COMMENT 'Título',
`subtitulo` varchar(255) NOT NULL COMMENT 'Subtítulo',
`descricao` longtext NOT NULL COMMENT 'Descrição',
`link` varchar(255) NOT NULL COMMENT 'Link',
`fonte` varchar(255) NOT NULL COMMENT 'Fonte',
`obs` longtext NOT NULL COMMENT 'Obs',
`background` varchar(255) NOT NULL COMMENT 'Background',
`cortxt` varchar(255) NOT NULL COMMENT 'CorTxt',
`container` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não' COMMENT 'Container',
`borda` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não' COMMENT 'Borda',
`borda_cor` varchar(255) NOT NULL COMMENT 'Borda Cor',
`borda_sombra` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não' COMMENT 'Borda Sombra',
`arredondado` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não' COMMENT 'Arredondado',
`historico` longtext NOT NULL COMMENT 'Histórico',
`data_cadastro` datetime NOT NULL COMMENT 'Data Cadastro',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `postagens` SET 
`id` = '1', 
`id_secoes` = '1', 
`id_categorias` = '1', 
`id_subcategorias` = '1', 
`nome` = 'Netus nisi vitae', 
`imagem` = 'pdf', 
`id_status_site` = '1', 
`data_expira` = '2023-02-25 19:05:48', 
`destaque` = 'Não', 
`id_etiquetas_postagem` = '1', 
`anexos` = 'pdf', 
`video` = '...', 
`titulo` = 'Sed aenean aliquet', 
`subtitulo` = 'Sed aenean aliquet', 
`descricao` = '<p>
Etiam potenti quam luctus interdum laoreet vestibulum ultrices elementum placerat inceptos, eleifend malesuada orci vehicula duis est dapibus aliquam pharetra, vel neque feugiat vitae non quis sociosqu ante sollicitudin. 
pharetra cras litora.
</p>', 
`link` = 'https://sistema-web-para.com.br', 
`fonte` = 'Netus nisi vitae', 
`obs` = 'Proin amet ad', 
`background` = 'Sed aenean aliquet', 
`cortxt` = 'Sed aenean aliquet', 
`container` = 'Sim', 
`borda` = 'Sim', 
`borda_cor` = 'Netus nisi vitae', 
`borda_sombra` = 'Não', 
`arredondado` = 'Não', 
`historico` = '09/06/2022 08:09:39 João
09/06/2022 09:09:59 José
', 
`data_cadastro` = '2023-02-25 19:05:48';


INSERT INTO `postagens` SET 
`id` = '2', 
`id_secoes` = '1', 
`id_categorias` = '1', 
`id_subcategorias` = '1', 
`nome` = 'Netus nisi vitae', 
`imagem` = 'pdf', 
`id_status_site` = '1', 
`data_expira` = '2023-02-25 19:05:48', 
`destaque` = 'Não', 
`id_etiquetas_postagem` = '1', 
`anexos` = 'pdf', 
`video` = '...', 
`titulo` = 'Sed aenean aliquet', 
`subtitulo` = 'Sed aenean aliquet', 
`descricao` = '<p>
Etiam potenti quam luctus interdum laoreet vestibulum ultrices elementum placerat inceptos, eleifend malesuada orci vehicula duis est dapibus aliquam pharetra, vel neque feugiat vitae non quis sociosqu ante sollicitudin. 
pharetra cras litora.
</p>', 
`link` = 'https://sistema-web-para.com.br', 
`fonte` = 'Netus nisi vitae', 
`obs` = 'Proin amet ad', 
`background` = 'Sed aenean aliquet', 
`cortxt` = 'Sed aenean aliquet', 
`container` = 'Sim', 
`borda` = 'Sim', 
`borda_cor` = 'Netus nisi vitae', 
`borda_sombra` = 'Não', 
`arredondado` = 'Não', 
`historico` = '09/06/2022 08:09:39 João
09/06/2022 09:09:59 José
', 
`data_cadastro` = '2023-02-25 19:05:48';

CREATE TABLE IF NOT EXISTS `produtos` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_secoes` int(11) NOT NULL COMMENT 'Seção',
`id_categorias` int(11) NOT NULL COMMENT 'Categoria',
`id_subcategorias` int(11) NOT NULL COMMENT 'Subcategoria',
`nome` varchar(255) NOT NULL COMMENT 'Nome',
`imagem` char(4) NOT NULL COMMENT 'Imagem',
`id_status_produto` int(11) NOT NULL COMMENT 'Status',
`codigo` varchar(255) NOT NULL COMMENT 'Código',
`data_expira` datetime NOT NULL COMMENT 'Data Expira',
`destaque` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não' COMMENT 'Destaque',
`id_etiquetas_produto` int(11) NOT NULL COMMENT 'Etiqueta',
`estoque` int(11) NOT NULL COMMENT 'Estoque',
`id_parceiros` int(11) NOT NULL COMMENT 'Fornecedor',
`imagens` char(4) NOT NULL COMMENT 'Imagens',
`video` varchar(255) NOT NULL COMMENT 'Vídeo',
`custo` decimal(10,2) NOT NULL COMMENT 'Custo',
`preco` decimal(10,2) NOT NULL COMMENT 'Preço',
`preco_2` decimal(10,2) NOT NULL COMMENT 'Preço 2',
`oferta` decimal(10,2) NOT NULL COMMENT 'Oferta',
`desconto` decimal(10,2) NOT NULL COMMENT 'Desconto',
`cupom_de_desconto` varchar(255) NOT NULL COMMENT 'Cupom de Desconto',
`marca` varchar(255) NOT NULL COMMENT 'Marca',
`modelo` varchar(255) NOT NULL COMMENT 'Modelo',
`titulo` varchar(255) NOT NULL COMMENT 'Título',
`subtitulo` varchar(255) NOT NULL COMMENT 'Subtítulo',
`detalhe` varchar(255) NOT NULL COMMENT 'Detalhe',
`descricao` longtext NOT NULL COMMENT 'Descrição',
`obs` longtext NOT NULL COMMENT 'Obs',
`link` varchar(255) NOT NULL COMMENT 'Link',
`material` varchar(255) NOT NULL COMMENT 'Material',
`cor` varchar(255) NOT NULL COMMENT 'Cor',
`peso` decimal(10,2) NOT NULL COMMENT 'Peso',
`volumes` int(11) NOT NULL COMMENT 'Volumes',
`tamanho` varchar(255) NOT NULL COMMENT 'Tamanho',
`largura` int(11) NOT NULL COMMENT 'Largura',
`altura` int(11) NOT NULL COMMENT 'Altura',
`profundidade` decimal(10,2) NOT NULL COMMENT 'Profundidade',
`views` int(11) NOT NULL COMMENT 'Views',
`liks` int(11) NOT NULL COMMENT 'Liks',
`pontos` int(11) NOT NULL COMMENT 'Pontos',
`historico` longtext NOT NULL COMMENT 'Histórico',
`data_cadastro` datetime NOT NULL COMMENT 'Data Cadastro',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `produtos` SET 
`id` = '1', 
`id_secoes` = '1', 
`id_categorias` = '1', 
`id_subcategorias` = '1', 
`nome` = 'Sed aenean aliquet', 
`imagem` = 'pdf', 
`id_status_produto` = '1', 
`codigo` = 'Sed aenean aliquet', 
`data_expira` = '2023-02-25 19:05:48', 
`destaque` = 'Não', 
`id_etiquetas_produto` = '1', 
`estoque` = '6', 
`id_parceiros` = '1', 
`imagens` = 'pdf', 
`video` = '...', 
`custo` = '25.47', 
`preco` = '25.47', 
`preco_2` = '1876.17', 
`oferta` = '1876.17', 
`desconto` = '25.47', 
`cupom_de_desconto` = 'Sed aenean aliquet', 
`marca` = 'Sed aenean aliquet', 
`modelo` = 'Netus nisi vitae', 
`titulo` = 'Netus nisi vitae', 
`subtitulo` = 'Netus nisi vitae', 
`detalhe` = 'Netus nisi vitae', 
`descricao` = '<p>
Etiam potenti quam luctus interdum laoreet vestibulum ultrices elementum placerat inceptos, eleifend malesuada orci vehicula duis est dapibus aliquam pharetra, vel neque feugiat vitae non quis sociosqu ante sollicitudin. 
pharetra cras litora.
</p>', 
`obs` = 'Netus nisi vitae', 
`link` = 'https://sistema-web-para.com.br', 
`material` = 'Netus nisi vitae', 
`cor` = 'Sed aenean aliquet', 
`peso` = '5.08', 
`volumes` = '6', 
`tamanho` = 'Sed aenean aliquet', 
`largura` = '8', 
`altura` = '6', 
`profundidade` = '5.08', 
`views` = '2', 
`liks` = '1', 
`pontos` = '6', 
`historico` = '09/06/2022 08:09:39 Maria
09/06/2022 09:09:59 Pedro
', 
`data_cadastro` = '2023-02-25 19:05:48';


INSERT INTO `produtos` SET 
`id` = '2', 
`id_secoes` = '1', 
`id_categorias` = '1', 
`id_subcategorias` = '1', 
`nome` = 'Sed aenean aliquet', 
`imagem` = 'pdf', 
`id_status_produto` = '1', 
`codigo` = 'Sed aenean aliquet', 
`data_expira` = '2023-02-25 19:05:48', 
`destaque` = 'Não', 
`id_etiquetas_produto` = '1', 
`estoque` = '6', 
`id_parceiros` = '1', 
`imagens` = 'pdf', 
`video` = '...', 
`custo` = '25.47', 
`preco` = '25.47', 
`preco_2` = '1876.17', 
`oferta` = '1876.17', 
`desconto` = '25.47', 
`cupom_de_desconto` = 'Sed aenean aliquet', 
`marca` = 'Sed aenean aliquet', 
`modelo` = 'Netus nisi vitae', 
`titulo` = 'Netus nisi vitae', 
`subtitulo` = 'Netus nisi vitae', 
`detalhe` = 'Netus nisi vitae', 
`descricao` = '<p>
Etiam potenti quam luctus interdum laoreet vestibulum ultrices elementum placerat inceptos, eleifend malesuada orci vehicula duis est dapibus aliquam pharetra, vel neque feugiat vitae non quis sociosqu ante sollicitudin. 
pharetra cras litora.
</p>', 
`obs` = 'Netus nisi vitae', 
`link` = 'https://sistema-web-para.com.br', 
`material` = 'Netus nisi vitae', 
`cor` = 'Sed aenean aliquet', 
`peso` = '5.08', 
`volumes` = '6', 
`tamanho` = 'Sed aenean aliquet', 
`largura` = '8', 
`altura` = '6', 
`profundidade` = '5.08', 
`views` = '2', 
`liks` = '1', 
`pontos` = '6', 
`historico` = '09/06/2022 08:09:39 Maria
09/06/2022 09:09:59 Pedro
', 
`data_cadastro` = '2023-02-25 19:05:48';

CREATE TABLE IF NOT EXISTS `proprietarios` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL COMMENT 'Site',
`nome` varchar(255) NOT NULL COMMENT 'Nome',
`foto` char(4) NOT NULL COMMENT 'Foto',
`id_status_cadastro` int(11) NOT NULL COMMENT 'Status',
`ocupacao` varchar(255) NOT NULL COMMENT 'Ocupação',
`data_expira` datetime NOT NULL COMMENT 'Data Expira',
`retorno` datetime NOT NULL COMMENT 'Retorno',
`cpf` varchar(255) NOT NULL COMMENT 'CPF',
`empresa` varchar(255) NOT NULL COMMENT 'Empresa',
`cnpj` varchar(255) NOT NULL COMMENT 'CNPJ',
`e_mail` varchar(255) NOT NULL COMMENT 'E-mail',
`senha` varchar(255) NOT NULL COMMENT 'Senha',
`e_mail_2` varchar(255) NOT NULL COMMENT 'E-mail 2',
`telefone` varchar(255) NOT NULL COMMENT 'Telefone',
`telefone_2` varchar(255) NOT NULL COMMENT 'Telefone 2',
`cep` varchar(255) NOT NULL COMMENT 'CEP',
`endereco` varchar(255) NOT NULL COMMENT 'Endereço',
`numero` varchar(255) NOT NULL COMMENT 'Número',
`complemento` varchar(255) NOT NULL COMMENT 'Complemento',
`bairro` varchar(255) NOT NULL COMMENT 'Bairro',
`cidade` varchar(255) NOT NULL COMMENT 'Cidade',
`estado` varchar(255) NOT NULL COMMENT 'Estado',
`pix` varchar(255) NOT NULL COMMENT 'PIX',
`banco` varchar(255) NOT NULL COMMENT 'Banco',
`agencia` varchar(255) NOT NULL COMMENT 'Agência',
`conta` varchar(255) NOT NULL COMMENT 'Conta',
`tipo_de_conta` varchar(255) NOT NULL COMMENT 'Tipo de Conta',
`obs` longtext NOT NULL COMMENT 'Obs',
`enexos` char(4) NOT NULL COMMENT 'Enexo(s)',
`historico` longtext NOT NULL COMMENT 'Histórico',
`data_cadastro` datetime NOT NULL COMMENT 'Data Cadastro',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `proprietarios` SET 
`id` = '1', 
`id_site` = '1', 
`nome` = 'Netus nisi vitae', 
`foto` = 'pdf', 
`id_status_cadastro` = '1', 
`ocupacao` = 'Netus nisi vitae', 
`data_expira` = '2023-02-25 19:05:48', 
`retorno` = '2023-02-25 19:05:48', 
`cpf` = '178.086.990-80', 
`empresa` = 'Sed aenean aliquet', 
`cnpj` = '99.117.895/0001-06', 
`e_mail` = 'lucianodalmas@gmail.com', 
`senha` = '76a9d946769d30311fdc884ec4e65656', 
`e_mail_2` = 'lucianodalmas@gmail.com', 
`telefone` = '(48) 98814-1308', 
`telefone_2` = '(48) 98814-1308', 
`cep` = '77808-652', 
`endereco` = 'Netus nisi vitae', 
`numero` = 'Sed aenean aliquet', 
`complemento` = 'Netus nisi vitae', 
`bairro` = 'Netus nisi vitae', 
`cidade` = 'Sed aenean aliquet', 
`estado` = 'TO', 
`pix` = 'Sed aenean aliquet', 
`banco` = 'Netus nisi vitae', 
`agencia` = 'Netus nisi vitae', 
`conta` = 'Netus nisi vitae', 
`tipo_de_conta` = 'Netus nisi vitae', 
`obs` = 'Proin amet ad', 
`enexos` = 'jpg', 
`historico` = '09/06/2022 08:09:39 Maria
09/06/2022 09:09:59 Pedro
', 
`data_cadastro` = '2023-02-25 19:05:48';


INSERT INTO `proprietarios` SET 
`id` = '2', 
`id_site` = '1', 
`nome` = 'Netus nisi vitae', 
`foto` = 'pdf', 
`id_status_cadastro` = '1', 
`ocupacao` = 'Netus nisi vitae', 
`data_expira` = '2023-02-25 19:05:48', 
`retorno` = '2023-02-25 19:05:48', 
`cpf` = '178.086.990-80', 
`empresa` = 'Sed aenean aliquet', 
`cnpj` = '99.117.895/0001-06', 
`e_mail` = 'lucianodalmas@gmail.com', 
`senha` = '76a9d946769d30311fdc884ec4e65656', 
`e_mail_2` = 'lucianodalmas@gmail.com', 
`telefone` = '(48) 98814-1308', 
`telefone_2` = '(48) 98814-1308', 
`cep` = '77808-652', 
`endereco` = 'Netus nisi vitae', 
`numero` = 'Sed aenean aliquet', 
`complemento` = 'Netus nisi vitae', 
`bairro` = 'Netus nisi vitae', 
`cidade` = 'Sed aenean aliquet', 
`estado` = 'TO', 
`pix` = 'Sed aenean aliquet', 
`banco` = 'Netus nisi vitae', 
`agencia` = 'Netus nisi vitae', 
`conta` = 'Netus nisi vitae', 
`tipo_de_conta` = 'Netus nisi vitae', 
`obs` = 'Proin amet ad', 
`enexos` = 'jpg', 
`historico` = '09/06/2022 08:09:39 Maria
09/06/2022 09:09:59 Pedro
', 
`data_cadastro` = '2023-02-25 19:05:48';

CREATE TABLE IF NOT EXISTS `secoes` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL COMMENT 'Site',
`nome` varchar(255) NOT NULL COMMENT 'Nome',
`imagem` char(4) NOT NULL COMMENT 'Imagem',
`id_status_site` int(11) NOT NULL COMMENT 'Status',
`data_expira` datetime NOT NULL COMMENT 'Data Expira',
`ordem` int(11) NOT NULL COMMENT 'Ordem',
`titulo` varchar(255) NOT NULL COMMENT 'Título',
`subtitulo` varchar(255) NOT NULL COMMENT 'Subtítulo',
`descricao` longtext NOT NULL COMMENT 'Descrição',
`obs` longtext NOT NULL COMMENT 'Obs',
`background` varchar(255) NOT NULL COMMENT 'Background',
`cortxt` varchar(255) NOT NULL COMMENT 'CorTxt',
`container` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não' COMMENT 'Container',
`borda` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não' COMMENT 'Borda',
`borda_cor` varchar(255) NOT NULL COMMENT 'Borda Cor',
`borda_sombra` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não' COMMENT 'Borda Sombra',
`arredondado` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não' COMMENT 'Arredondado',
`parallax` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não' COMMENT 'Parallax',
`historico` longtext NOT NULL COMMENT 'Histórico',
`data_cadastro` datetime NOT NULL COMMENT 'Data Cadastro',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `secoes` SET 
`id` = '1', 
`id_site` = '1', 
`nome` = 'Sed aenean aliquet', 
`imagem` = 'jpg', 
`id_status_site` = '1', 
`data_expira` = '2023-02-25 19:05:48', 
`ordem` = '8', 
`titulo` = 'Sed aenean aliquet', 
`subtitulo` = 'Sed aenean aliquet', 
`descricao` = '<p>
Etiam potenti quam luctus interdum laoreet vestibulum ultrices elementum placerat inceptos, eleifend malesuada orci vehicula duis est dapibus aliquam pharetra, vel neque feugiat vitae non quis sociosqu ante sollicitudin. 
pharetra cras litora.
</p>', 
`obs` = 'Proin amet ad', 
`background` = 'Sed aenean aliquet', 
`cortxt` = 'Netus nisi vitae', 
`container` = 'Sim', 
`borda` = 'Sim', 
`borda_cor` = 'Sed aenean aliquet', 
`borda_sombra` = 'Sim', 
`arredondado` = 'Sim', 
`parallax` = 'Não', 
`historico` = '09/06/2022 08:09:39 Maria
09/06/2022 09:09:59 Pedro
', 
`data_cadastro` = '2023-02-25 19:05:48';


INSERT INTO `secoes` SET 
`id` = '2', 
`id_site` = '1', 
`nome` = 'Sed aenean aliquet', 
`imagem` = 'jpg', 
`id_status_site` = '1', 
`data_expira` = '2023-02-25 19:05:48', 
`ordem` = '8', 
`titulo` = 'Sed aenean aliquet', 
`subtitulo` = 'Sed aenean aliquet', 
`descricao` = '<p>
Etiam potenti quam luctus interdum laoreet vestibulum ultrices elementum placerat inceptos, eleifend malesuada orci vehicula duis est dapibus aliquam pharetra, vel neque feugiat vitae non quis sociosqu ante sollicitudin. 
pharetra cras litora.
</p>', 
`obs` = 'Proin amet ad', 
`background` = 'Sed aenean aliquet', 
`cortxt` = 'Netus nisi vitae', 
`container` = 'Sim', 
`borda` = 'Sim', 
`borda_cor` = 'Sed aenean aliquet', 
`borda_sombra` = 'Sim', 
`arredondado` = 'Sim', 
`parallax` = 'Não', 
`historico` = '09/06/2022 08:09:39 Maria
09/06/2022 09:09:59 Pedro
', 
`data_cadastro` = '2023-02-25 19:05:48';

CREATE TABLE IF NOT EXISTS `site` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`site` varchar(255) NOT NULL COMMENT 'Site',
`nome` varchar(255) NOT NULL COMMENT 'Nome',
`id_status_site` int(11) NOT NULL COMMENT 'Status',
`logo` char(4) NOT NULL COMMENT 'Logo',
`responsavel` varchar(255) NOT NULL COMMENT 'Responsável',
`cargo` varchar(255) NOT NULL COMMENT 'Cargo',
`fone` varchar(255) NOT NULL COMMENT 'Fone',
`email` varchar(255) NOT NULL COMMENT 'Email',
`aberto` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não' COMMENT 'Aberto',
`titulo` varchar(255) NOT NULL COMMENT 'Título',
`subtitulo` varchar(255) NOT NULL COMMENT 'Subtítulo',
`palavras_chaves` varchar(255) NOT NULL COMMENT 'Palavras Chaves',
`descricao` longtext NOT NULL COMMENT 'Descrição',
`logo2` char(4) NOT NULL COMMENT 'Logo2',
`logo3` char(4) NOT NULL COMMENT 'Logo3',
`e_mail` varchar(255) NOT NULL COMMENT 'E-mail',
`e_mail2` varchar(255) NOT NULL COMMENT 'E-mail2',
`e_mail3` varchar(255) NOT NULL COMMENT 'E-mail3',
`telefone` varchar(255) NOT NULL COMMENT 'Telefone',
`telefone2` varchar(255) NOT NULL COMMENT 'Telefone2',
`telefone3` varchar(255) NOT NULL COMMENT 'Telefone3',
`cep` varchar(255) NOT NULL COMMENT 'CEP',
`endereco` varchar(255) NOT NULL COMMENT 'Endereço',
`numero` varchar(255) NOT NULL COMMENT 'Número',
`complemento` varchar(255) NOT NULL COMMENT 'Complemento',
`bairro` varchar(255) NOT NULL COMMENT 'Bairro',
`cidade` varchar(255) NOT NULL COMMENT 'Cidade',
`estado` varchar(255) NOT NULL COMMENT 'Estado',
`endereco2` varchar(255) NOT NULL COMMENT 'Endereço2',
`endereco3` varchar(255) NOT NULL COMMENT 'Endereço3',
`horario` varchar(255) NOT NULL COMMENT 'Horário',
`horario2` varchar(255) NOT NULL COMMENT 'Horário2',
`horario3` varchar(255) NOT NULL COMMENT 'Horário3',
`textowhats` varchar(255) NOT NULL COMMENT 'TextoWhats',
`textowhats2` varchar(255) NOT NULL COMMENT 'TextoWhats2',
`textowhats3` varchar(255) NOT NULL COMMENT 'TextoWhats3',
`textoauxiliar` varchar(255) NOT NULL COMMENT 'TextoAuxiliar',
`textoauxiliar2` varchar(255) NOT NULL COMMENT 'TextoAuxiliar2',
`textoauxiliar3` varchar(255) NOT NULL COMMENT 'TextoAuxiliar3',
`instagram` varchar(255) NOT NULL COMMENT 'Instagram',
`facebook` varchar(255) NOT NULL COMMENT 'Facebook',
`linkedin` varchar(255) NOT NULL COMMENT 'Linkedin',
`twitter` varchar(255) NOT NULL COMMENT 'Twitter',
`youtube` varchar(255) NOT NULL COMMENT 'YouTube',
`tiktok` varchar(255) NOT NULL COMMENT 'TikTok',
`kwai` varchar(255) NOT NULL COMMENT 'Kwai',
`google` varchar(255) NOT NULL COMMENT 'Google',
`google_plus` varchar(255) NOT NULL COMMENT 'Google Plus',
`google_maps` varchar(255) NOT NULL COMMENT 'Google Maps',
`google_analitics` varchar(255) NOT NULL COMMENT 'Google Analítics',
`play_store` varchar(255) NOT NULL COMMENT 'Play Store',
`apple_store` varchar(255) NOT NULL COMMENT 'Apple Store',
`popup` longtext NOT NULL COMMENT 'PopUp',
`aviso_de_cookies` varchar(255) NOT NULL COMMENT 'Aviso de Cookies',
`politica_de_cookies` longtext NOT NULL COMMENT 'Politica de Cookies',
`politica_de_privacidade` longtext NOT NULL COMMENT 'Política de Privacidade',
`termos_de_uso` longtext NOT NULL COMMENT 'Termos de Uso',
`contrato` longtext NOT NULL COMMENT 'Contrato',
`contrato2` varchar(255) NOT NULL COMMENT 'Contrato2',
`contrato3` varchar(255) NOT NULL COMMENT 'Contrato3',
`obs` longtext NOT NULL COMMENT 'Obs',
`cor` varchar(255) NOT NULL COMMENT 'Cor',
`cor2` varchar(255) NOT NULL COMMENT 'Cor2',
`cor3` varchar(255) NOT NULL COMMENT 'Cor3',
`cor4` varchar(255) NOT NULL COMMENT 'Cor4',
`cortxt` varchar(255) NOT NULL COMMENT 'CorTxt',
`cortxt2` varchar(255) NOT NULL COMMENT 'CorTxt2',
`cortxt3` varchar(255) NOT NULL COMMENT 'CorTxt3',
`cortxt4` varchar(255) NOT NULL COMMENT 'CorTxt4',
`container` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não' COMMENT 'Container',
`borda` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não' COMMENT 'Borda',
`borda_cor` varchar(255) NOT NULL COMMENT 'Borda Cor',
`borda_sombra` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não' COMMENT 'Borda Sombra',
`arredondado` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não' COMMENT 'Arredondado',
`documentos` char(4) NOT NULL COMMENT 'Documentos',
`historico` longtext NOT NULL COMMENT 'Histórico',
`data_cadastro` datetime NOT NULL COMMENT 'Data Cadastro',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `site` SET 
`id` = '1', 
`site` = 'https://sistema-web-para.com.br', 
`nome` = 'Sed aenean aliquet', 
`id_status_site` = '1', 
`logo` = 'jpg', 
`responsavel` = 'Sed aenean aliquet', 
`cargo` = 'Netus nisi vitae', 
`fone` = '(48) 98814-1308', 
`email` = 'lucianodalmas@gmail.com', 
`aberto` = 'Sim', 
`titulo` = 'Netus nisi vitae', 
`subtitulo` = 'Netus nisi vitae', 
`palavras_chaves` = 'Netus nisi vitae', 
`descricao` = 'Proin amet ad', 
`logo2` = 'jpg', 
`logo3` = 'pdf', 
`e_mail` = 'lucianodalmas@gmail.com', 
`e_mail2` = 'lucianodalmas@gmail.com', 
`e_mail3` = 'lucianodalmas@gmail.com', 
`telefone` = '(48) 98814-1308', 
`telefone2` = '(48) 98814-1308', 
`telefone3` = '(48) 98814-1308', 
`cep` = '63040-480', 
`endereco` = 'Sed aenean aliquet', 
`numero` = 'Sed aenean aliquet', 
`complemento` = 'Sed aenean aliquet', 
`bairro` = 'Netus nisi vitae', 
`cidade` = 'Sed aenean aliquet', 
`estado` = 'BA', 
`endereco2` = 'Netus nisi vitae', 
`endereco3` = 'Sed aenean aliquet', 
`horario` = 'Sed aenean aliquet', 
`horario2` = 'Netus nisi vitae', 
`horario3` = 'Sed aenean aliquet', 
`textowhats` = 'Sed aenean aliquet', 
`textowhats2` = 'Sed aenean aliquet', 
`textowhats3` = 'Netus nisi vitae', 
`textoauxiliar` = 'Netus nisi vitae', 
`textoauxiliar2` = 'Sed aenean aliquet', 
`textoauxiliar3` = 'Sed aenean aliquet', 
`instagram` = 'https://sistema-web-para.com.br', 
`facebook` = 'https://sistema-web-para.com.br', 
`linkedin` = 'https://sistema-web-para.com.br', 
`twitter` = 'https://sistema-web-para.com.br', 
`youtube` = 'https://sistema-web-para.com.br', 
`tiktok` = 'https://sistema-web-para.com.br', 
`kwai` = 'https://sistema-web-para.com.br', 
`google` = 'Sed aenean aliquet', 
`google_plus` = 'https://sistema-web-para.com.br', 
`google_maps` = 'https://sistema-web-para.com.br', 
`google_analitics` = 'Netus nisi vitae', 
`play_store` = 'https://sistema-web-para.com.br', 
`apple_store` = 'https://sistema-web-para.com.br', 
`popup` = '<p>
Etiam potenti quam luctus interdum laoreet vestibulum ultrices elementum placerat inceptos, eleifend malesuada orci vehicula duis est dapibus aliquam pharetra, vel neque feugiat vitae non quis sociosqu ante sollicitudin. 
pharetra cras litora.
</p>', 
`aviso_de_cookies` = 'Sed aenean aliquet', 
`politica_de_cookies` = '<p>
Etiam potenti quam luctus interdum laoreet vestibulum ultrices elementum placerat inceptos, eleifend malesuada orci vehicula duis est dapibus aliquam pharetra, vel neque feugiat vitae non quis sociosqu ante sollicitudin. 
pharetra cras litora.
</p>', 
`politica_de_privacidade` = '<p>
Ut nunc porttitor pulvinar duis purus lectus cursus, habitasse id tincidunt bibendum donec etiam pellentesque fames, aliquam cubilia etiam quisque a class. 
dapibus gravida quisque varius sit lorem semper sed, per sem ac primis diam potenti.
</p>', 
`termos_de_uso` = '<p>
Etiam potenti quam luctus interdum laoreet vestibulum ultrices elementum placerat inceptos, eleifend malesuada orci vehicula duis est dapibus aliquam pharetra, vel neque feugiat vitae non quis sociosqu ante sollicitudin. 
pharetra cras litora.
</p>', 
`contrato` = '<p>
Ut nunc porttitor pulvinar duis purus lectus cursus, habitasse id tincidunt bibendum donec etiam pellentesque fames, aliquam cubilia etiam quisque a class. 
dapibus gravida quisque varius sit lorem semper sed, per sem ac primis diam potenti.
</p>', 
`contrato2` = 'Netus nisi vitae', 
`contrato3` = 'Sed aenean aliquet', 
`obs` = 'Netus nisi vitae', 
`cor` = 'Sed aenean aliquet', 
`cor2` = 'Sed aenean aliquet', 
`cor3` = 'Sed aenean aliquet', 
`cor4` = 'Sed aenean aliquet', 
`cortxt` = 'Sed aenean aliquet', 
`cortxt2` = 'Sed aenean aliquet', 
`cortxt3` = 'Sed aenean aliquet', 
`cortxt4` = 'Netus nisi vitae', 
`container` = 'Sim', 
`borda` = 'Não', 
`borda_cor` = 'Netus nisi vitae', 
`borda_sombra` = 'Sim', 
`arredondado` = 'Sim', 
`documentos` = 'pdf', 
`historico` = '09/06/2022 08:09:39 Maria
09/06/2022 09:09:59 Pedro
', 
`data_cadastro` = '2023-02-25 19:05:49';


INSERT INTO `site` SET 
`id` = '2', 
`site` = 'https://sistema-web-para.com.br', 
`nome` = 'Sed aenean aliquet', 
`id_status_site` = '1', 
`logo` = 'jpg', 
`responsavel` = 'Sed aenean aliquet', 
`cargo` = 'Netus nisi vitae', 
`fone` = '(48) 98814-1308', 
`email` = 'lucianodalmas@gmail.com', 
`aberto` = 'Sim', 
`titulo` = 'Netus nisi vitae', 
`subtitulo` = 'Netus nisi vitae', 
`palavras_chaves` = 'Netus nisi vitae', 
`descricao` = 'Proin amet ad', 
`logo2` = 'jpg', 
`logo3` = 'pdf', 
`e_mail` = 'lucianodalmas@gmail.com', 
`e_mail2` = 'lucianodalmas@gmail.com', 
`e_mail3` = 'lucianodalmas@gmail.com', 
`telefone` = '(48) 98814-1308', 
`telefone2` = '(48) 98814-1308', 
`telefone3` = '(48) 98814-1308', 
`cep` = '63040-480', 
`endereco` = 'Sed aenean aliquet', 
`numero` = 'Sed aenean aliquet', 
`complemento` = 'Sed aenean aliquet', 
`bairro` = 'Netus nisi vitae', 
`cidade` = 'Sed aenean aliquet', 
`estado` = 'BA', 
`endereco2` = 'Netus nisi vitae', 
`endereco3` = 'Sed aenean aliquet', 
`horario` = 'Sed aenean aliquet', 
`horario2` = 'Netus nisi vitae', 
`horario3` = 'Sed aenean aliquet', 
`textowhats` = 'Sed aenean aliquet', 
`textowhats2` = 'Sed aenean aliquet', 
`textowhats3` = 'Netus nisi vitae', 
`textoauxiliar` = 'Netus nisi vitae', 
`textoauxiliar2` = 'Sed aenean aliquet', 
`textoauxiliar3` = 'Sed aenean aliquet', 
`instagram` = 'https://sistema-web-para.com.br', 
`facebook` = 'https://sistema-web-para.com.br', 
`linkedin` = 'https://sistema-web-para.com.br', 
`twitter` = 'https://sistema-web-para.com.br', 
`youtube` = 'https://sistema-web-para.com.br', 
`tiktok` = 'https://sistema-web-para.com.br', 
`kwai` = 'https://sistema-web-para.com.br', 
`google` = 'Sed aenean aliquet', 
`google_plus` = 'https://sistema-web-para.com.br', 
`google_maps` = 'https://sistema-web-para.com.br', 
`google_analitics` = 'Netus nisi vitae', 
`play_store` = 'https://sistema-web-para.com.br', 
`apple_store` = 'https://sistema-web-para.com.br', 
`popup` = '<p>
Etiam potenti quam luctus interdum laoreet vestibulum ultrices elementum placerat inceptos, eleifend malesuada orci vehicula duis est dapibus aliquam pharetra, vel neque feugiat vitae non quis sociosqu ante sollicitudin. 
pharetra cras litora.
</p>', 
`aviso_de_cookies` = 'Sed aenean aliquet', 
`politica_de_cookies` = '<p>
Etiam potenti quam luctus interdum laoreet vestibulum ultrices elementum placerat inceptos, eleifend malesuada orci vehicula duis est dapibus aliquam pharetra, vel neque feugiat vitae non quis sociosqu ante sollicitudin. 
pharetra cras litora.
</p>', 
`politica_de_privacidade` = '<p>
Ut nunc porttitor pulvinar duis purus lectus cursus, habitasse id tincidunt bibendum donec etiam pellentesque fames, aliquam cubilia etiam quisque a class. 
dapibus gravida quisque varius sit lorem semper sed, per sem ac primis diam potenti.
</p>', 
`termos_de_uso` = '<p>
Etiam potenti quam luctus interdum laoreet vestibulum ultrices elementum placerat inceptos, eleifend malesuada orci vehicula duis est dapibus aliquam pharetra, vel neque feugiat vitae non quis sociosqu ante sollicitudin. 
pharetra cras litora.
</p>', 
`contrato` = '<p>
Ut nunc porttitor pulvinar duis purus lectus cursus, habitasse id tincidunt bibendum donec etiam pellentesque fames, aliquam cubilia etiam quisque a class. 
dapibus gravida quisque varius sit lorem semper sed, per sem ac primis diam potenti.
</p>', 
`contrato2` = 'Netus nisi vitae', 
`contrato3` = 'Sed aenean aliquet', 
`obs` = 'Netus nisi vitae', 
`cor` = 'Sed aenean aliquet', 
`cor2` = 'Sed aenean aliquet', 
`cor3` = 'Sed aenean aliquet', 
`cor4` = 'Sed aenean aliquet', 
`cortxt` = 'Sed aenean aliquet', 
`cortxt2` = 'Sed aenean aliquet', 
`cortxt3` = 'Sed aenean aliquet', 
`cortxt4` = 'Netus nisi vitae', 
`container` = 'Sim', 
`borda` = 'Não', 
`borda_cor` = 'Netus nisi vitae', 
`borda_sombra` = 'Sim', 
`arredondado` = 'Sim', 
`documentos` = 'pdf', 
`historico` = '09/06/2022 08:09:39 Maria
09/06/2022 09:09:59 Pedro
', 
`data_cadastro` = '2023-02-25 19:05:49';

CREATE TABLE IF NOT EXISTS `status_cadastro` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL COMMENT 'Site',
`nome` varchar(255) NOT NULL COMMENT 'Nome',
`label` varchar(255) NOT NULL COMMENT 'Label',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `status_cadastro` SET 
`id` = '1', 
`id_site` = '1', 
`nome` = 'Sed aenean aliquet', 
`label` = 'primary';


INSERT INTO `status_cadastro` SET 
`id` = '2', 
`id_site` = '1', 
`nome` = 'Sed aenean aliquet', 
`label` = 'primary';

CREATE TABLE IF NOT EXISTS `status_imovel` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL COMMENT 'Site',
`nome` varchar(255) NOT NULL COMMENT 'Nome',
`label` varchar(255) NOT NULL COMMENT 'Label',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `status_imovel` SET 
`id` = '1', 
`id_site` = '1', 
`nome` = 'Netus nisi vitae', 
`label` = 'success';


INSERT INTO `status_imovel` SET 
`id` = '2', 
`id_site` = '1', 
`nome` = 'Netus nisi vitae', 
`label` = 'success';

CREATE TABLE IF NOT EXISTS `status_lancamento` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL COMMENT 'Site',
`nome` varchar(255) NOT NULL COMMENT 'Nome',
`label` varchar(255) NOT NULL COMMENT 'Label',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `status_lancamento` SET 
`id` = '1', 
`id_site` = '1', 
`nome` = 'Sed aenean aliquet', 
`label` = 'danger';


INSERT INTO `status_lancamento` SET 
`id` = '2', 
`id_site` = '1', 
`nome` = 'Sed aenean aliquet', 
`label` = 'danger';

CREATE TABLE IF NOT EXISTS `status_mkt` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL COMMENT 'Site',
`nome` varchar(255) NOT NULL COMMENT 'Nome',
`label` varchar(255) NOT NULL COMMENT 'Label',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `status_mkt` SET 
`id` = '1', 
`id_site` = '1', 
`nome` = 'Netus nisi vitae', 
`label` = 'primary';


INSERT INTO `status_mkt` SET 
`id` = '2', 
`id_site` = '1', 
`nome` = 'Netus nisi vitae', 
`label` = 'primary';

CREATE TABLE IF NOT EXISTS `status_negociacao` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL COMMENT 'Site',
`nome` varchar(255) NOT NULL COMMENT 'Nome',
`label` varchar(255) NOT NULL COMMENT 'Label',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `status_negociacao` SET 
`id` = '1', 
`id_site` = '1', 
`nome` = 'Netus nisi vitae', 
`label` = 'success';


INSERT INTO `status_negociacao` SET 
`id` = '2', 
`id_site` = '1', 
`nome` = 'Netus nisi vitae', 
`label` = 'success';

CREATE TABLE IF NOT EXISTS `status_operacao` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL COMMENT 'Site',
`nome` varchar(255) NOT NULL COMMENT 'Nome',
`label` varchar(255) NOT NULL COMMENT 'Label',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `status_operacao` SET 
`id` = '1', 
`id_site` = '1', 
`nome` = 'Netus nisi vitae', 
`label` = 'info';


INSERT INTO `status_operacao` SET 
`id` = '2', 
`id_site` = '1', 
`nome` = 'Netus nisi vitae', 
`label` = 'info';

CREATE TABLE IF NOT EXISTS `status_pedido` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL COMMENT 'Site',
`nome` varchar(255) NOT NULL COMMENT 'Nome',
`label` varchar(255) NOT NULL COMMENT 'Label',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `status_pedido` SET 
`id` = '1', 
`id_site` = '1', 
`nome` = 'Sed aenean aliquet', 
`label` = 'warning';


INSERT INTO `status_pedido` SET 
`id` = '2', 
`id_site` = '1', 
`nome` = 'Sed aenean aliquet', 
`label` = 'warning';

CREATE TABLE IF NOT EXISTS `status_produto` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL COMMENT 'Site',
`nome` varchar(255) NOT NULL COMMENT 'Nome',
`label` varchar(255) NOT NULL COMMENT 'Label',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `status_produto` SET 
`id` = '1', 
`id_site` = '1', 
`nome` = 'Netus nisi vitae', 
`label` = 'info';


INSERT INTO `status_produto` SET 
`id` = '2', 
`id_site` = '1', 
`nome` = 'Netus nisi vitae', 
`label` = 'info';

CREATE TABLE IF NOT EXISTS `status_site` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL COMMENT 'Site',
`nome` varchar(255) NOT NULL COMMENT 'Nome',
`label` varchar(255) NOT NULL COMMENT 'Label',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `status_site` SET 
`id` = '1', 
`id_site` = '1', 
`nome` = 'Sed aenean aliquet', 
`label` = 'primary';


INSERT INTO `status_site` SET 
`id` = '2', 
`id_site` = '1', 
`nome` = 'Sed aenean aliquet', 
`label` = 'primary';

CREATE TABLE IF NOT EXISTS `status_tarefa` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL COMMENT 'Site',
`nome` varchar(255) NOT NULL COMMENT 'Nome',
`label` varchar(255) NOT NULL COMMENT 'Label',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `status_tarefa` SET 
`id` = '1', 
`id_site` = '1', 
`nome` = 'Sed aenean aliquet', 
`label` = 'default';


INSERT INTO `status_tarefa` SET 
`id` = '2', 
`id_site` = '1', 
`nome` = 'Sed aenean aliquet', 
`label` = 'default';

CREATE TABLE IF NOT EXISTS `subcategorias` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_categorias` int(11) NOT NULL COMMENT 'Categoria',
`nome` varchar(255) NOT NULL COMMENT 'Nome',
`imagem` char(4) NOT NULL COMMENT 'Imagem',
`id_status_site` int(11) NOT NULL COMMENT 'Status',
`data_expira` datetime NOT NULL COMMENT 'Data Expira',
`ordem` int(11) NOT NULL COMMENT 'Ordem',
`titulo` varchar(255) NOT NULL COMMENT 'Título',
`subtitulo` varchar(255) NOT NULL COMMENT 'Subtítulo',
`descricao` longtext NOT NULL COMMENT 'Descrição',
`obs` longtext NOT NULL COMMENT 'Obs',
`background` varchar(255) NOT NULL COMMENT 'Background',
`cortxt` varchar(255) NOT NULL COMMENT 'CorTxt',
`container` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não' COMMENT 'Container',
`borda` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não' COMMENT 'Borda',
`borda_cor` varchar(255) NOT NULL COMMENT 'Borda Cor',
`borda_sombra` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não' COMMENT 'Borda Sombra',
`arredondado` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não' COMMENT 'Arredondado',
`parallax` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não' COMMENT 'Parallax',
`historico` longtext NOT NULL COMMENT 'Histórico',
`data_cadastro` datetime NOT NULL COMMENT 'Data Cadastro',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `subcategorias` SET 
`id` = '1', 
`id_categorias` = '1', 
`nome` = 'Netus nisi vitae', 
`imagem` = 'jpg', 
`id_status_site` = '1', 
`data_expira` = '2023-02-25 19:05:49', 
`ordem` = '8', 
`titulo` = 'Sed aenean aliquet', 
`subtitulo` = 'Netus nisi vitae', 
`descricao` = '<p>
Etiam potenti quam luctus interdum laoreet vestibulum ultrices elementum placerat inceptos, eleifend malesuada orci vehicula duis est dapibus aliquam pharetra, vel neque feugiat vitae non quis sociosqu ante sollicitudin. 
pharetra cras litora.
</p>', 
`obs` = 'Proin amet ad', 
`background` = 'Netus nisi vitae', 
`cortxt` = 'Sed aenean aliquet', 
`container` = 'Não', 
`borda` = 'Sim', 
`borda_cor` = 'Netus nisi vitae', 
`borda_sombra` = 'Não', 
`arredondado` = 'Sim', 
`parallax` = 'Não', 
`historico` = '09/06/2022 08:09:39 João
09/06/2022 09:09:59 José
', 
`data_cadastro` = '2023-02-25 19:05:49';


INSERT INTO `subcategorias` SET 
`id` = '2', 
`id_categorias` = '1', 
`nome` = 'Netus nisi vitae', 
`imagem` = 'jpg', 
`id_status_site` = '1', 
`data_expira` = '2023-02-25 19:05:49', 
`ordem` = '8', 
`titulo` = 'Sed aenean aliquet', 
`subtitulo` = 'Netus nisi vitae', 
`descricao` = '<p>
Etiam potenti quam luctus interdum laoreet vestibulum ultrices elementum placerat inceptos, eleifend malesuada orci vehicula duis est dapibus aliquam pharetra, vel neque feugiat vitae non quis sociosqu ante sollicitudin. 
pharetra cras litora.
</p>', 
`obs` = 'Proin amet ad', 
`background` = 'Netus nisi vitae', 
`cortxt` = 'Sed aenean aliquet', 
`container` = 'Não', 
`borda` = 'Sim', 
`borda_cor` = 'Netus nisi vitae', 
`borda_sombra` = 'Não', 
`arredondado` = 'Sim', 
`parallax` = 'Não', 
`historico` = '09/06/2022 08:09:39 João
09/06/2022 09:09:59 José
', 
`data_cadastro` = '2023-02-25 19:05:49';

CREATE TABLE IF NOT EXISTS `tarefas` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL COMMENT 'Site',
`nome` varchar(255) NOT NULL COMMENT 'Nome',
`id_status_tarefa` int(11) NOT NULL COMMENT 'Status',
`destaque` set('Sim','Não') DEFAULT 'Não' NOT NULL DEFAULT 'Não' COMMENT 'Destaque',
`data_expira` datetime NOT NULL COMMENT 'Data Expira',
`executada_de` datetime NOT NULL COMMENT 'Executada De',
`executada_ate` datetime NOT NULL COMMENT 'Executada Até',
`lembrete_por_email` varchar(255) NOT NULL COMMENT 'Lembrete por Email',
`repeticoes` int(11) NOT NULL COMMENT 'Repetições',
`anexos` char(4) NOT NULL COMMENT 'Anexos',
`titulo` varchar(255) NOT NULL COMMENT 'Título',
`detalhe` varchar(255) NOT NULL COMMENT 'Detalhe',
`motivo` varchar(255) NOT NULL COMMENT 'Motivo',
`descricao` longtext NOT NULL COMMENT 'Descrição',
`observacao` longtext NOT NULL COMMENT 'Observação',
`historico` longtext NOT NULL COMMENT 'Histórico',
`data_cadastro` datetime NOT NULL COMMENT 'Data Cadastro',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `tarefas` SET 
`id` = '1', 
`id_site` = '1', 
`nome` = 'Sed aenean aliquet', 
`id_status_tarefa` = '1', 
`destaque` = 'Não', 
`data_expira` = '2023-02-25 19:05:49', 
`executada_de` = '2023-02-25 19:05:49', 
`executada_ate` = '2023-02-25 19:05:49', 
`lembrete_por_email` = 'lucianodalmas@gmail.com', 
`repeticoes` = '6', 
`anexos` = 'jpg', 
`titulo` = 'Sed aenean aliquet', 
`detalhe` = 'Sed aenean aliquet', 
`motivo` = 'Netus nisi vitae', 
`descricao` = '<p>
Etiam potenti quam luctus interdum laoreet vestibulum ultrices elementum placerat inceptos, eleifend malesuada orci vehicula duis est dapibus aliquam pharetra, vel neque feugiat vitae non quis sociosqu ante sollicitudin. 
pharetra cras litora.
</p>', 
`observacao` = 'Netus nisi vitae', 
`historico` = '09/06/2022 08:09:39 Maria
09/06/2022 09:09:59 Pedro
', 
`data_cadastro` = '2023-02-25 19:05:49';


INSERT INTO `tarefas` SET 
`id` = '2', 
`id_site` = '1', 
`nome` = 'Sed aenean aliquet', 
`id_status_tarefa` = '1', 
`destaque` = 'Não', 
`data_expira` = '2023-02-25 19:05:49', 
`executada_de` = '2023-02-25 19:05:49', 
`executada_ate` = '2023-02-25 19:05:49', 
`lembrete_por_email` = 'lucianodalmas@gmail.com', 
`repeticoes` = '6', 
`anexos` = 'jpg', 
`titulo` = 'Sed aenean aliquet', 
`detalhe` = 'Sed aenean aliquet', 
`motivo` = 'Netus nisi vitae', 
`descricao` = '<p>
Etiam potenti quam luctus interdum laoreet vestibulum ultrices elementum placerat inceptos, eleifend malesuada orci vehicula duis est dapibus aliquam pharetra, vel neque feugiat vitae non quis sociosqu ante sollicitudin. 
pharetra cras litora.
</p>', 
`observacao` = 'Netus nisi vitae', 
`historico` = '09/06/2022 08:09:39 Maria
09/06/2022 09:09:59 Pedro
', 
`data_cadastro` = '2023-02-25 19:05:49';

CREATE TABLE IF NOT EXISTS `taxa_de_entrega` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL COMMENT 'Site',
`id_status_site` int(11) NOT NULL COMMENT 'Status',
`bairro` varchar(255) NOT NULL COMMENT 'Bairro',
`tarifa` decimal(10,2) NOT NULL COMMENT 'Tarífa',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `taxa_de_entrega` SET 
`id` = '1', 
`id_site` = '1', 
`id_status_site` = '1', 
`bairro` = 'Netus nisi vitae', 
`tarifa` = '1876.17';


INSERT INTO `taxa_de_entrega` SET 
`id` = '2', 
`id_site` = '1', 
`id_status_site` = '1', 
`bairro` = 'Netus nisi vitae', 
`tarifa` = '1876.17';

CREATE TABLE IF NOT EXISTS `tipos_imovel` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL COMMENT 'Site',
`nome` varchar(255) NOT NULL COMMENT 'Nome',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `tipos_imovel` SET 
`id` = '1', 
`id_site` = '1', 
`nome` = 'Netus nisi vitae';


INSERT INTO `tipos_imovel` SET 
`id` = '2', 
`id_site` = '1', 
`nome` = 'Netus nisi vitae';

CREATE TABLE IF NOT EXISTS `tipos_lancamento` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL COMMENT 'Site',
`nome` varchar(255) NOT NULL COMMENT 'Nome',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `tipos_lancamento` SET 
`id` = '1', 
`id_site` = '1', 
`nome` = 'Sed aenean aliquet';


INSERT INTO `tipos_lancamento` SET 
`id` = '2', 
`id_site` = '1', 
`nome` = 'Sed aenean aliquet';

CREATE TABLE IF NOT EXISTS `tipos_produto` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL COMMENT 'Site',
`nome` varchar(255) NOT NULL COMMENT 'Nome',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `tipos_produto` SET 
`id` = '1', 
`id_site` = '1', 
`nome` = 'Sed aenean aliquet';


INSERT INTO `tipos_produto` SET 
`id` = '2', 
`id_site` = '1', 
`nome` = 'Sed aenean aliquet';

CREATE TABLE IF NOT EXISTS `tipos_tarefa` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_site` int(11) NOT NULL COMMENT 'Site',
`nome` varchar(255) NOT NULL COMMENT 'Nome',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `tipos_tarefa` SET 
`id` = '1', 
`id_site` = '1', 
`nome` = 'Netus nisi vitae';


INSERT INTO `tipos_tarefa` SET 
`id` = '2', 
`id_site` = '1', 
`nome` = 'Netus nisi vitae';

CREATE TABLE IF NOT EXISTS `usuarios` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_pperfis` int(11) NOT NULL COMMENT 'Perfil',
`nome` varchar(255) NOT NULL COMMENT 'Nome',
`e_mail` varchar(255) NOT NULL COMMENT 'E-mail',
`senha` varchar(255) NOT NULL COMMENT 'Senha',
`telefone` varchar(255) NOT NULL COMMENT 'Telefone',
`id_status_cadastro` int(11) NOT NULL COMMENT 'Status',
`id_site` int(11) NOT NULL COMMENT 'Site',
`obs` longtext NOT NULL COMMENT 'Obs',
`historico` longtext NOT NULL COMMENT 'Histórico',
`data_cadastro` datetime NOT NULL COMMENT 'Data Cadastro',
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

ALTER TABLE `llogs` CHANGE `data_hora` `data_hora` DATETIME(3) NOT NULL COMMENT 'Data Hora';

INSERT INTO `usuarios` SET 
`id_pperfis` = '1', 
`id_status_cadastro` = '0', `id_site` = '0', 
`nome` = 'Administrador', 
`e_mail` = 'admin@admin.com.br', 
`senha` = '21232f297a57a5a743894a0e4a801fc3';

INSERT INTO `usuarios` SET 
`id_pperfis` = '0', 
`id_status_cadastro` = '0', `id_site` = '0', 
`nome` = 'Usuário', 
`e_mail` = 'usuario@usuario.com.br', 
`senha` = 'f8032d5cae3de20fcec887f395ec9a6a';

INSERT INTO `pperfis` (`id`, `nome`) VALUES
('1', 'Total');

INSERT INTO `aacoes` (`id`, `nome`) VALUES
('2', 'Cadastrar'),('6', 'Duplicar'),('13', 'Edição Expressa'),('3', 'Editar'),('4', 'Excluir'),('8', 'Exportar'),('11', 'Filtrar'),('7', 'Importar'),('9', 'Imprimir'),('5', 'Obrigatório'),('12', 'Ocultar'),('10', 'PDF'),('1', 'Visualizar');

INSERT INTO `ttabelas` (`id`, `nome`, `relacionamentos`) VALUES
(1, 'aacoes', 'pPermissões'),(2, 'ccampos', 'pPermissões'),(3, 'llogs', ''),(4, 'pperfis', 'pPermissões, Usuários'),(5, 'ppermissoes', ''),(6, 'ttabelas', 'cCampos, pPermissões'),(7, 'carrinhos', ''),(8, 'categorias', 'Imóveis, Postagens, Produtos, Subcategorias'),(9, 'clientes', 'Endereços, Lançamentos, Pedidos'),(10, 'corretores', 'Imóveis'),(11, 'cupons_de_descontos', ''),(12, 'e_mails_automaticos', ''),(13, 'e_mails_captados', ''),(14, 'e_mails_mkt', ''),(15, 'enderecos', ''),(16, 'etiquetas_imovel', 'Imóveis'),(17, 'etiquetas_postagem', 'Postagens'),(18, 'etiquetas_produto', 'Produtos'),(19, 'imoveis', ''),(20, 'lancamentos', ''),(21, 'parceiros', 'Lançamentos, Pedidos, Produtos'),(22, 'pedidos', 'Lançamentos'),(23, 'postagens', ''),(24, 'produtos', 'Carrinhos, Pedidos'),(25, 'proprietarios', 'Imóveis'),(26, 'secoes', 'Categorias, Imóveis, Postagens, Produtos'),(27, 'site', 'Carrinhos, Clientes, Corretores, Cupons de Descontos, E-mails Automáticos, E-mails Captados, E-mails Mkt, Etiquetas Imóvel, Etiquetas Postagem, Etiquetas Produto, Lançamentos, Parceiros, Pedidos, Proprietários, Seções, Status Cadastro, Status Imóvel, Status Lançamento, Status Mkt, Status Negociação, Status Operação, Status Pedido, Status Produto, Status Site, Status Tarefa, Tarefas, Taxa de Entrega, Tipos Imóvel, Tipos Lançamento, Tipos Produto, Tipos Tarefa, Usuários'),(28, 'status_cadastro', 'Clientes, Corretores, Parceiros, Proprietários, Usuários'),(29, 'status_imovel', 'Imóveis'),(30, 'status_lancamento', 'Lançamentos'),(31, 'status_mkt', 'E-mails Mkt'),(32, 'status_negociacao', 'Imóveis'),(33, 'status_operacao', 'Pedidos'),(34, 'status_pedido', 'Pedidos'),(35, 'status_produto', 'Produtos'),(36, 'status_site', 'Categorias, Cupons de Descontos, E-mails Automáticos, E-mails Captados, Postagens, Seções, Site, Subcategorias, Taxa de Entrega'),(37, 'status_tarefa', 'Tarefas'),(38, 'subcategorias', 'Imóveis, Postagens, Produtos'),(39, 'tarefas', ''),(40, 'taxa_de_entrega', ''),(41, 'tipos_imovel', 'Imóveis'),(42, 'tipos_lancamento', 'Lançamentos'),(43, 'tipos_produto', ''),(44, 'tipos_tarefa', ''),(45, 'usuarios', 'lLogs');

INSERT INTO `ccampos` (`id`, `id_ttabelas`, `nome`) VALUES
(1, 1, 'nome'),(2, 2, 'id_ttabelas'),(3, 2, 'nome'),(4, 3, 'id_usuarios'),(5, 3, 'ip'),(6, 3, 'url'),(7, 3, 'arquivos'),(8, 3, 'data_hora'),(9, 3, 'sql_executado'),(10, 3, 'parametros'),(11, 4, 'nome'),(12, 5, 'id_pperfis'),(13, 5, 'id_ttabelas'),(14, 5, 'id_ccampos'),(15, 5, 'id_aacoes'),(16, 5, 'permissao'),(17, 6, 'nome'),(18, 6, 'relacionamentos'),(19, 7, 'id_site'),(20, 7, 'carrinho'),(21, 7, 'operacao'),(22, 7, 'id_produtos'),(23, 7, 'quantidade'),(24, 7, 'obs_do_pedido'),(25, 7, 'taxa_de_entrega'),(26, 7, 'desconto'),(27, 7, 'cupom_de_desconto'),(28, 7, 'historico'),(29, 7, 'data_cadastro'),(30, 8, 'id_secoes'),(31, 8, 'nome'),(32, 8, 'imagem'),(33, 8, 'id_status_site'),(34, 8, 'data_expira'),(35, 8, 'ordem'),(36, 8, 'titulo'),(37, 8, 'subtitulo'),(38, 8, 'descricao'),(39, 8, 'obs'),(40, 8, 'background'),(41, 8, 'cortxt'),(42, 8, 'container'),(43, 8, 'borda'),(44, 8, 'borda_cor'),(45, 8, 'borda_sombra'),(46, 8, 'arredondado'),(47, 8, 'parallax'),(48, 8, 'historico'),(49, 8, 'data_cadastro'),(50, 9, 'id_site'),(51, 9, 'nome'),(52, 9, 'foto'),(53, 9, 'id_status_cadastro'),(54, 9, 'data_expira'),(55, 9, 'retorno'),(56, 9, 'cpf'),(57, 9, 'empresa'),(58, 9, 'cnpj'),(59, 9, 'e_mail'),(60, 9, 'senha'),(61, 9, 'e_mail_2'),(62, 9, 'telefone'),(63, 9, 'telefone_2'),(64, 9, 'cep'),(65, 9, 'endereco'),(66, 9, 'numero'),(67, 9, 'complemento'),(68, 9, 'bairro'),(69, 9, 'cidade'),(70, 9, 'estado'),(71, 9, 'pix'),(72, 9, 'banco'),(73, 9, 'agencia'),(74, 9, 'conta'),(75, 9, 'tipo_de_conta'),(76, 9, 'obs'),(77, 9, 'documentos'),(78, 9, 'historico'),(79, 9, 'data_cadastro'),(80, 10, 'id_site'),(81, 10, 'nome'),(82, 10, 'foto'),(83, 10, 'id_status_cadastro'),(84, 10, 'creci'),(85, 10, 'data_expira'),(86, 10, 'retorno'),(87, 10, 'cpf'),(88, 10, 'empresa'),(89, 10, 'cnpj'),(90, 10, 'e_mail'),(91, 10, 'senha'),(92, 10, 'e_mail_2'),(93, 10, 'telefone'),(94, 10, 'telefone_2'),(95, 10, 'cep'),(96, 10, 'endereco'),(97, 10, 'numero'),(98, 10, 'complemento'),(99, 10, 'bairro'),(100, 10, 'cidade'),(101, 10, 'estado'),(102, 10, 'pix'),(103, 10, 'banco'),(104, 10, 'agencia'),(105, 10, 'conta'),(106, 10, 'tipo_de_conta'),(107, 10, 'obs'),(108, 10, 'documentos'),(109, 10, 'historico'),(110, 10, 'data_cadastro'),(111, 11, 'id_site'),(112, 11, 'nome'),(113, 11, 'imagem'),(114, 11, 'id_status_site'),(115, 11, 'codigo'),(116, 11, 'data_expira'),(117, 11, 'titulo'),(118, 11, 'descricao'),(119, 11, 'obs'),(120, 11, 'historico'),(121, 11, 'data_cadastro'),(122, 12, 'id_site'),(123, 12, 'tipo'),(124, 12, 'id_status_site'),(125, 12, 'titulo'),(126, 12, 'mensagem'),(127, 12, 'historico'),(128, 12, 'data_cadastro'),(129, 13, 'id_site'),(130, 13, 'nome'),(131, 13, 'empresa'),(132, 13, 'id_status_site'),(133, 13, 'telefone'),(134, 13, 'e_mail'),(135, 13, 'fonte'),(136, 13, 'obs'),(137, 13, 'historico'),(138, 13, 'data_cadastro'),(139, 14, 'id_site'),(140, 14, 'tipo'),(141, 14, 'id_status_mkt'),(142, 14, 'destinatario'),(143, 14, 'copia_oculta'),(144, 14, 'titulo'),(145, 14, 'mensagem'),(146, 14, 'obs'),(147, 14, 'data_envio'),(148, 14, 'historico'),(149, 14, 'data_cadastro'),(150, 15, 'id_clientes'),(151, 15, 'nome'),(152, 15, 'cpf'),(153, 15, 'telefone'),(154, 15, 'cep'),(155, 15, 'endereco'),(156, 15, 'numero'),(157, 15, 'complemento'),(158, 15, 'bairro'),(159, 15, 'cidade'),(160, 15, 'estado'),(161, 15, 'obs'),(162, 15, 'historico'),(163, 15, 'data_cadastro'),(164, 16, 'id_site'),(165, 16, 'nome'),(166, 16, 'label'),(167, 17, 'id_site'),(168, 17, 'nome'),(169, 17, 'label'),(170, 18, 'id_site'),(171, 18, 'nome'),(172, 18, 'label'),(173, 19, 'id_secoes'),(174, 19, 'id_categorias'),(175, 19, 'id_subcategorias'),(176, 19, 'nome'),(177, 19, 'imagem'),(178, 19, 'id_status_imovel'),(179, 19, 'codigo'),(180, 19, 'data_expira'),(181, 19, 'destaque'),(182, 19, 'id_etiquetas_imovel'),(183, 19, 'id_status_negociacao'),(184, 19, 'id_tipos_imovel'),(185, 19, 'exclusivo'),(186, 19, 'escriturado'),(187, 19, 'id_corretores'),(188, 19, 'id_proprietarios'),(189, 19, 'area_total'),(190, 19, 'area_construida'),(191, 19, 'valor_venda'),(192, 19, 'valor_aluguel'),(193, 19, 'valor_condominio'),(194, 19, 'valor_caucao'),(195, 19, 'outros_valores'),(196, 19, 'comissao'),(197, 19, 'imagens'),(198, 19, 'video'),(199, 19, 'titulo'),(200, 19, 'detalhes'),(201, 19, 'descricao'),(202, 19, 'obs'),(203, 19, 'documentos'),(204, 19, 'historico'),(205, 19, 'data_cadastro'),(206, 20, 'id_site'),(207, 20, 'id_tipos_lancamento'),(208, 20, 'imagem'),(209, 20, 'id_status_lancamento'),(210, 20, 'destaque'),(211, 20, 'documentos'),(212, 20, 'id_pedidos'),(213, 20, 'id_clientes'),(214, 20, 'id_parceiros'),(215, 20, 'terceiro'),(216, 20, 'telefone'),(217, 20, 'e_mail'),(218, 20, 'titulo'),(219, 20, 'detalhe'),(220, 20, 'descricao'),(221, 20, 'pagamento'),(222, 20, 'parcelas'),(223, 20, 'valor'),(224, 20, 'valor_total'),(225, 20, 'valor_recorrente'),(226, 20, 'proximo_pagamento'),(227, 20, 'ultimo_pagamento'),(228, 20, 'observacoes'),(229, 20, 'historico'),(230, 20, 'data_cadastro'),(231, 21, 'id_site'),(232, 21, 'nome'),(233, 21, 'foto'),(234, 21, 'id_status_cadastro'),(235, 21, 'funcao'),(236, 21, 'data_expira'),(237, 21, 'retorno'),(238, 21, 'cpf'),(239, 21, 'empresa'),(240, 21, 'cnpj'),(241, 21, 'e_mail'),(242, 21, 'senha'),(243, 21, 'e_mail_2'),(244, 21, 'telefone'),(245, 21, 'telefone_2'),(246, 21, 'cep'),(247, 21, 'endereco'),(248, 21, 'numero'),(249, 21, 'complemento'),(250, 21, 'bairro'),(251, 21, 'cidade'),(252, 21, 'estado'),(253, 21, 'pix'),(254, 21, 'banco'),(255, 21, 'agencia'),(256, 21, 'conta'),(257, 21, 'tipo_de_conta'),(258, 21, 'obs'),(259, 21, 'enexos'),(260, 21, 'historico'),(261, 21, 'data_cadastro'),(262, 22, 'id_site'),(263, 22, 'id_parceiros'),(264, 22, 'id_clientes'),(265, 22, 'pedido'),(266, 22, 'data'),(267, 22, 'id_status_pedido'),(268, 22, 'id_status_operacao'),(269, 22, 'id_produtos'),(270, 22, 'quantidade'),(271, 22, 'preco'),(272, 22, 'desconto'),(273, 22, 'taxa_de_entrega'),(274, 22, 'cupom_de_desconto'),(275, 22, 'valor_total'),(276, 22, 'pagamento'),(277, 22, 'txt_pedido'),(278, 22, 'obs_pedido'),(279, 22, 'historico'),(280, 23, 'id_secoes'),(281, 23, 'id_categorias'),(282, 23, 'id_subcategorias'),(283, 23, 'nome'),(284, 23, 'imagem'),(285, 23, 'id_status_site'),(286, 23, 'data_expira'),(287, 23, 'destaque'),(288, 23, 'id_etiquetas_postagem'),(289, 23, 'anexos'),(290, 23, 'video'),(291, 23, 'titulo'),(292, 23, 'subtitulo'),(293, 23, 'descricao'),(294, 23, 'link'),(295, 23, 'fonte'),(296, 23, 'obs'),(297, 23, 'background'),(298, 23, 'cortxt'),(299, 23, 'container'),(300, 23, 'borda'),(301, 23, 'borda_cor'),(302, 23, 'borda_sombra'),(303, 23, 'arredondado'),(304, 23, 'historico'),(305, 23, 'data_cadastro'),(306, 24, 'id_secoes'),(307, 24, 'id_categorias'),(308, 24, 'id_subcategorias'),(309, 24, 'nome'),(310, 24, 'imagem'),(311, 24, 'id_status_produto'),(312, 24, 'codigo'),(313, 24, 'data_expira'),(314, 24, 'destaque'),(315, 24, 'id_etiquetas_produto'),(316, 24, 'estoque'),(317, 24, 'id_parceiros'),(318, 24, 'imagens'),(319, 24, 'video'),(320, 24, 'custo'),(321, 24, 'preco'),(322, 24, 'preco_2'),(323, 24, 'oferta'),(324, 24, 'desconto'),(325, 24, 'cupom_de_desconto'),(326, 24, 'marca'),(327, 24, 'modelo'),(328, 24, 'titulo'),(329, 24, 'subtitulo'),(330, 24, 'detalhe'),(331, 24, 'descricao'),(332, 24, 'obs'),(333, 24, 'link'),(334, 24, 'material'),(335, 24, 'cor'),(336, 24, 'peso'),(337, 24, 'volumes'),(338, 24, 'tamanho'),(339, 24, 'largura'),(340, 24, 'altura'),(341, 24, 'profundidade'),(342, 24, 'views'),(343, 24, 'liks'),(344, 24, 'pontos'),(345, 24, 'historico'),(346, 24, 'data_cadastro'),(347, 25, 'id_site'),(348, 25, 'nome'),(349, 25, 'foto'),(350, 25, 'id_status_cadastro'),(351, 25, 'ocupacao'),(352, 25, 'data_expira'),(353, 25, 'retorno'),(354, 25, 'cpf'),(355, 25, 'empresa'),(356, 25, 'cnpj'),(357, 25, 'e_mail'),(358, 25, 'senha'),(359, 25, 'e_mail_2'),(360, 25, 'telefone'),(361, 25, 'telefone_2'),(362, 25, 'cep'),(363, 25, 'endereco'),(364, 25, 'numero'),(365, 25, 'complemento'),(366, 25, 'bairro'),(367, 25, 'cidade'),(368, 25, 'estado'),(369, 25, 'pix'),(370, 25, 'banco'),(371, 25, 'agencia'),(372, 25, 'conta'),(373, 25, 'tipo_de_conta'),(374, 25, 'obs'),(375, 25, 'enexos'),(376, 25, 'historico'),(377, 25, 'data_cadastro'),(378, 26, 'id_site'),(379, 26, 'nome'),(380, 26, 'imagem'),(381, 26, 'id_status_site'),(382, 26, 'data_expira'),(383, 26, 'ordem'),(384, 26, 'titulo'),(385, 26, 'subtitulo'),(386, 26, 'descricao'),(387, 26, 'obs'),(388, 26, 'background'),(389, 26, 'cortxt'),(390, 26, 'container'),(391, 26, 'borda'),(392, 26, 'borda_cor'),(393, 26, 'borda_sombra'),(394, 26, 'arredondado'),(395, 26, 'parallax'),(396, 26, 'historico'),(397, 26, 'data_cadastro'),(398, 27, 'site'),(399, 27, 'nome'),(400, 27, 'id_status_site'),(401, 27, 'logo'),(402, 27, 'responsavel'),(403, 27, 'cargo'),(404, 27, 'fone'),(405, 27, 'email'),(406, 27, 'aberto'),(407, 27, 'titulo'),(408, 27, 'subtitulo'),(409, 27, 'palavras_chaves'),(410, 27, 'descricao'),(411, 27, 'logo2'),(412, 27, 'logo3'),(413, 27, 'e_mail'),(414, 27, 'e_mail2'),(415, 27, 'e_mail3'),(416, 27, 'telefone'),(417, 27, 'telefone2'),(418, 27, 'telefone3'),(419, 27, 'cep'),(420, 27, 'endereco'),(421, 27, 'numero'),(422, 27, 'complemento'),(423, 27, 'bairro'),(424, 27, 'cidade'),(425, 27, 'estado'),(426, 27, 'endereco2'),(427, 27, 'endereco3'),(428, 27, 'horario'),(429, 27, 'horario2'),(430, 27, 'horario3'),(431, 27, 'textowhats'),(432, 27, 'textowhats2'),(433, 27, 'textowhats3'),(434, 27, 'textoauxiliar'),(435, 27, 'textoauxiliar2'),(436, 27, 'textoauxiliar3'),(437, 27, 'instagram'),(438, 27, 'facebook'),(439, 27, 'linkedin'),(440, 27, 'twitter'),(441, 27, 'youtube'),(442, 27, 'tiktok'),(443, 27, 'kwai'),(444, 27, 'google'),(445, 27, 'google_plus'),(446, 27, 'google_maps'),(447, 27, 'google_analitics'),(448, 27, 'play_store'),(449, 27, 'apple_store'),(450, 27, 'popup'),(451, 27, 'aviso_de_cookies'),(452, 27, 'politica_de_cookies'),(453, 27, 'politica_de_privacidade'),(454, 27, 'termos_de_uso'),(455, 27, 'contrato'),(456, 27, 'contrato2'),(457, 27, 'contrato3'),(458, 27, 'obs'),(459, 27, 'cor'),(460, 27, 'cor2'),(461, 27, 'cor3'),(462, 27, 'cor4'),(463, 27, 'cortxt'),(464, 27, 'cortxt2'),(465, 27, 'cortxt3'),(466, 27, 'cortxt4'),(467, 27, 'container'),(468, 27, 'borda'),(469, 27, 'borda_cor'),(470, 27, 'borda_sombra'),(471, 27, 'arredondado'),(472, 27, 'documentos'),(473, 27, 'historico'),(474, 27, 'data_cadastro'),(475, 28, 'id_site'),(476, 28, 'nome'),(477, 28, 'label'),(478, 29, 'id_site'),(479, 29, 'nome'),(480, 29, 'label'),(481, 30, 'id_site'),(482, 30, 'nome'),(483, 30, 'label'),(484, 31, 'id_site'),(485, 31, 'nome'),(486, 31, 'label'),(487, 32, 'id_site'),(488, 32, 'nome'),(489, 32, 'label'),(490, 33, 'id_site'),(491, 33, 'nome'),(492, 33, 'label'),(493, 34, 'id_site'),(494, 34, 'nome'),(495, 34, 'label'),(496, 35, 'id_site'),(497, 35, 'nome'),(498, 35, 'label'),(499, 36, 'id_site'),(500, 36, 'nome'),(501, 36, 'label'),(502, 37, 'id_site'),(503, 37, 'nome'),(504, 37, 'label'),(505, 38, 'id_categorias'),(506, 38, 'nome'),(507, 38, 'imagem'),(508, 38, 'id_status_site'),(509, 38, 'data_expira'),(510, 38, 'ordem'),(511, 38, 'titulo'),(512, 38, 'subtitulo'),(513, 38, 'descricao'),(514, 38, 'obs'),(515, 38, 'background'),(516, 38, 'cortxt'),(517, 38, 'container'),(518, 38, 'borda'),(519, 38, 'borda_cor'),(520, 38, 'borda_sombra'),(521, 38, 'arredondado'),(522, 38, 'parallax'),(523, 38, 'historico'),(524, 38, 'data_cadastro'),(525, 39, 'id_site'),(526, 39, 'nome'),(527, 39, 'id_status_tarefa'),(528, 39, 'destaque'),(529, 39, 'data_expira'),(530, 39, 'executada_de'),(531, 39, 'executada_ate'),(532, 39, 'lembrete_por_email'),(533, 39, 'repeticoes'),(534, 39, 'anexos'),(535, 39, 'titulo'),(536, 39, 'detalhe'),(537, 39, 'motivo'),(538, 39, 'descricao'),(539, 39, 'observacao'),(540, 39, 'historico'),(541, 39, 'data_cadastro'),(542, 40, 'id_site'),(543, 40, 'id_status_site'),(544, 40, 'bairro'),(545, 40, 'tarifa'),(546, 41, 'id_site'),(547, 41, 'nome'),(548, 42, 'id_site'),(549, 42, 'nome'),(550, 43, 'id_site'),(551, 43, 'nome'),(552, 44, 'id_site'),(553, 44, 'nome'),(554, 45, 'id_pperfis'),(555, 45, 'nome'),(556, 45, 'e_mail'),(557, 45, 'senha'),(558, 45, 'telefone'),(559, 45, 'id_status_cadastro'),(560, 45, 'id_site'),(561, 45, 'obs'),(562, 45, 'historico'),(563, 45, 'data_cadastro');

INSERT INTO `ppermissoes` (`id`, `id_pperfis`, `id_ttabelas`, `id_ccampos`, `id_aacoes`, `permissao`) VALUES
(1, 1, 1, 0, 2, 'Sim'),(2, 1, 1, 0, 6, 'Sim'),(3, 1, 1, 0, 13, 'Sim'),(4, 1, 1, 0, 3, 'Sim'),(5, 1, 1, 0, 4, 'Sim'),(6, 1, 1, 0, 8, 'Sim'),(7, 1, 1, 0, 11, 'Sim'),(8, 1, 1, 0, 7, 'Sim'),(9, 1, 1, 0, 9, 'Sim'),(10, 1, 1, 0, 5, 'Não'),(11, 1, 1, 0, 12, 'Sim'),(12, 1, 1, 0, 10, 'Sim'),(13, 1, 1, 0, 1, 'Sim'),(14, 1, 1, 1, 2, 'Sim'),(15, 1, 1, 1, 6, 'Sim'),(16, 1, 1, 1, 13, 'Sim'),(17, 1, 1, 1, 3, 'Sim'),(18, 1, 1, 1, 4, 'Sim'),(19, 1, 1, 1, 8, 'Sim'),(20, 1, 1, 1, 11, 'Sim'),(21, 1, 1, 1, 7, 'Sim'),(22, 1, 1, 1, 9, 'Sim'),(23, 1, 1, 1, 5, 'Não'),(24, 1, 1, 1, 12, 'Sim'),(25, 1, 1, 1, 10, 'Sim'),(26, 1, 1, 1, 1, 'Sim'),(27, 1, 2, 0, 2, 'Sim'),(28, 1, 2, 0, 6, 'Sim'),(29, 1, 2, 0, 13, 'Sim'),(30, 1, 2, 0, 3, 'Sim'),(31, 1, 2, 0, 4, 'Sim'),(32, 1, 2, 0, 8, 'Sim'),(33, 1, 2, 0, 11, 'Sim'),(34, 1, 2, 0, 7, 'Sim'),(35, 1, 2, 0, 9, 'Sim'),(36, 1, 2, 0, 5, 'Não'),(37, 1, 2, 0, 12, 'Sim'),(38, 1, 2, 0, 10, 'Sim'),(39, 1, 2, 0, 1, 'Sim'),(40, 1, 2, 2, 2, 'Sim'),(41, 1, 2, 2, 6, 'Sim'),(42, 1, 2, 2, 13, 'Sim'),(43, 1, 2, 2, 3, 'Sim'),(44, 1, 2, 2, 4, 'Sim'),(45, 1, 2, 2, 8, 'Sim'),(46, 1, 2, 2, 11, 'Sim'),(47, 1, 2, 2, 7, 'Sim'),(48, 1, 2, 2, 9, 'Sim'),(49, 1, 2, 2, 5, 'Não'),(50, 1, 2, 2, 12, 'Sim'),(51, 1, 2, 2, 10, 'Sim'),(52, 1, 2, 2, 1, 'Sim'),(53, 1, 2, 3, 2, 'Sim'),(54, 1, 2, 3, 6, 'Sim'),(55, 1, 2, 3, 13, 'Sim'),(56, 1, 2, 3, 3, 'Sim'),(57, 1, 2, 3, 4, 'Sim'),(58, 1, 2, 3, 8, 'Sim'),(59, 1, 2, 3, 11, 'Sim'),(60, 1, 2, 3, 7, 'Sim'),(61, 1, 2, 3, 9, 'Sim'),(62, 1, 2, 3, 5, 'Não'),(63, 1, 2, 3, 12, 'Sim'),(64, 1, 2, 3, 10, 'Sim'),(65, 1, 2, 3, 1, 'Sim'),(66, 1, 3, 0, 2, 'Sim'),(67, 1, 3, 0, 6, 'Sim'),(68, 1, 3, 0, 13, 'Sim'),(69, 1, 3, 0, 3, 'Sim'),(70, 1, 3, 0, 4, 'Sim'),(71, 1, 3, 0, 8, 'Sim'),(72, 1, 3, 0, 11, 'Sim'),(73, 1, 3, 0, 7, 'Sim'),(74, 1, 3, 0, 9, 'Sim'),(75, 1, 3, 0, 5, 'Não'),(76, 1, 3, 0, 12, 'Sim'),(77, 1, 3, 0, 10, 'Sim'),(78, 1, 3, 0, 1, 'Sim'),(79, 1, 3, 4, 2, 'Sim'),(80, 1, 3, 4, 6, 'Sim'),(81, 1, 3, 4, 13, 'Sim'),(82, 1, 3, 4, 3, 'Sim'),(83, 1, 3, 4, 4, 'Sim'),(84, 1, 3, 4, 8, 'Sim'),(85, 1, 3, 4, 11, 'Sim'),(86, 1, 3, 4, 7, 'Sim'),(87, 1, 3, 4, 9, 'Sim'),(88, 1, 3, 4, 5, 'Não'),(89, 1, 3, 4, 12, 'Sim'),(90, 1, 3, 4, 10, 'Sim'),(91, 1, 3, 4, 1, 'Sim'),(92, 1, 3, 5, 2, 'Sim'),(93, 1, 3, 5, 6, 'Sim'),(94, 1, 3, 5, 13, 'Sim'),(95, 1, 3, 5, 3, 'Sim'),(96, 1, 3, 5, 4, 'Sim'),(97, 1, 3, 5, 8, 'Sim'),(98, 1, 3, 5, 11, 'Sim'),(99, 1, 3, 5, 7, 'Sim'),(100, 1, 3, 5, 9, 'Sim'),(101, 1, 3, 5, 5, 'Não'),(102, 1, 3, 5, 12, 'Sim'),(103, 1, 3, 5, 10, 'Sim'),(104, 1, 3, 5, 1, 'Sim'),(105, 1, 3, 6, 2, 'Sim'),(106, 1, 3, 6, 6, 'Sim'),(107, 1, 3, 6, 13, 'Sim'),(108, 1, 3, 6, 3, 'Sim'),(109, 1, 3, 6, 4, 'Sim'),(110, 1, 3, 6, 8, 'Sim'),(111, 1, 3, 6, 11, 'Sim'),(112, 1, 3, 6, 7, 'Sim'),(113, 1, 3, 6, 9, 'Sim'),(114, 1, 3, 6, 5, 'Não'),(115, 1, 3, 6, 12, 'Sim'),(116, 1, 3, 6, 10, 'Sim'),(117, 1, 3, 6, 1, 'Sim'),(118, 1, 3, 7, 2, 'Sim'),(119, 1, 3, 7, 6, 'Sim'),(120, 1, 3, 7, 13, 'Sim'),(121, 1, 3, 7, 3, 'Sim'),(122, 1, 3, 7, 4, 'Sim'),(123, 1, 3, 7, 8, 'Sim'),(124, 1, 3, 7, 11, 'Sim'),(125, 1, 3, 7, 7, 'Sim'),(126, 1, 3, 7, 9, 'Sim'),(127, 1, 3, 7, 5, 'Não'),(128, 1, 3, 7, 12, 'Sim'),(129, 1, 3, 7, 10, 'Sim'),(130, 1, 3, 7, 1, 'Sim'),(131, 1, 3, 8, 2, 'Sim'),(132, 1, 3, 8, 6, 'Sim'),(133, 1, 3, 8, 13, 'Sim'),(134, 1, 3, 8, 3, 'Sim'),(135, 1, 3, 8, 4, 'Sim'),(136, 1, 3, 8, 8, 'Sim'),(137, 1, 3, 8, 11, 'Sim'),(138, 1, 3, 8, 7, 'Sim'),(139, 1, 3, 8, 9, 'Sim'),(140, 1, 3, 8, 5, 'Não'),(141, 1, 3, 8, 12, 'Sim'),(142, 1, 3, 8, 10, 'Sim'),(143, 1, 3, 8, 1, 'Sim'),(144, 1, 3, 9, 2, 'Sim'),(145, 1, 3, 9, 6, 'Sim'),(146, 1, 3, 9, 13, 'Sim'),(147, 1, 3, 9, 3, 'Sim'),(148, 1, 3, 9, 4, 'Sim'),(149, 1, 3, 9, 8, 'Sim'),(150, 1, 3, 9, 11, 'Sim'),(151, 1, 3, 9, 7, 'Sim'),(152, 1, 3, 9, 9, 'Sim'),(153, 1, 3, 9, 5, 'Não'),(154, 1, 3, 9, 12, 'Sim'),(155, 1, 3, 9, 10, 'Sim'),(156, 1, 3, 9, 1, 'Sim'),(157, 1, 3, 10, 2, 'Sim'),(158, 1, 3, 10, 6, 'Sim'),(159, 1, 3, 10, 13, 'Sim'),(160, 1, 3, 10, 3, 'Sim'),(161, 1, 3, 10, 4, 'Sim'),(162, 1, 3, 10, 8, 'Sim'),(163, 1, 3, 10, 11, 'Sim'),(164, 1, 3, 10, 7, 'Sim'),(165, 1, 3, 10, 9, 'Sim'),(166, 1, 3, 10, 5, 'Não'),(167, 1, 3, 10, 12, 'Sim'),(168, 1, 3, 10, 10, 'Sim'),(169, 1, 3, 10, 1, 'Sim'),(170, 1, 4, 0, 2, 'Sim'),(171, 1, 4, 0, 6, 'Sim'),(172, 1, 4, 0, 13, 'Sim'),(173, 1, 4, 0, 3, 'Sim'),(174, 1, 4, 0, 4, 'Sim'),(175, 1, 4, 0, 8, 'Sim'),(176, 1, 4, 0, 11, 'Sim'),(177, 1, 4, 0, 7, 'Sim'),(178, 1, 4, 0, 9, 'Sim'),(179, 1, 4, 0, 5, 'Não'),(180, 1, 4, 0, 12, 'Sim'),(181, 1, 4, 0, 10, 'Sim'),(182, 1, 4, 0, 1, 'Sim'),(183, 1, 4, 11, 2, 'Sim'),(184, 1, 4, 11, 6, 'Sim'),(185, 1, 4, 11, 13, 'Sim'),(186, 1, 4, 11, 3, 'Sim'),(187, 1, 4, 11, 4, 'Sim'),(188, 1, 4, 11, 8, 'Sim'),(189, 1, 4, 11, 11, 'Sim'),(190, 1, 4, 11, 7, 'Sim'),(191, 1, 4, 11, 9, 'Sim'),(192, 1, 4, 11, 5, 'Não'),(193, 1, 4, 11, 12, 'Sim'),(194, 1, 4, 11, 10, 'Sim'),(195, 1, 4, 11, 1, 'Sim'),(196, 1, 5, 0, 2, 'Sim'),(197, 1, 5, 0, 6, 'Sim'),(198, 1, 5, 0, 13, 'Sim'),(199, 1, 5, 0, 3, 'Sim'),(200, 1, 5, 0, 4, 'Sim'),(201, 1, 5, 0, 8, 'Sim'),(202, 1, 5, 0, 11, 'Sim'),(203, 1, 5, 0, 7, 'Sim'),(204, 1, 5, 0, 9, 'Sim'),(205, 1, 5, 0, 5, 'Não'),(206, 1, 5, 0, 12, 'Sim'),(207, 1, 5, 0, 10, 'Sim'),(208, 1, 5, 0, 1, 'Sim'),(209, 1, 5, 12, 2, 'Sim'),(210, 1, 5, 12, 6, 'Sim'),(211, 1, 5, 12, 13, 'Sim'),(212, 1, 5, 12, 3, 'Sim'),(213, 1, 5, 12, 4, 'Sim'),(214, 1, 5, 12, 8, 'Sim'),(215, 1, 5, 12, 11, 'Sim'),(216, 1, 5, 12, 7, 'Sim'),(217, 1, 5, 12, 9, 'Sim'),(218, 1, 5, 12, 5, 'Não'),(219, 1, 5, 12, 12, 'Sim'),(220, 1, 5, 12, 10, 'Sim'),(221, 1, 5, 12, 1, 'Sim'),(222, 1, 5, 13, 2, 'Sim'),(223, 1, 5, 13, 6, 'Sim'),(224, 1, 5, 13, 13, 'Sim'),(225, 1, 5, 13, 3, 'Sim'),(226, 1, 5, 13, 4, 'Sim'),(227, 1, 5, 13, 8, 'Sim'),(228, 1, 5, 13, 11, 'Sim'),(229, 1, 5, 13, 7, 'Sim'),(230, 1, 5, 13, 9, 'Sim'),(231, 1, 5, 13, 5, 'Não'),(232, 1, 5, 13, 12, 'Sim'),(233, 1, 5, 13, 10, 'Sim'),(234, 1, 5, 13, 1, 'Sim'),(235, 1, 5, 14, 2, 'Sim'),(236, 1, 5, 14, 6, 'Sim'),(237, 1, 5, 14, 13, 'Sim'),(238, 1, 5, 14, 3, 'Sim'),(239, 1, 5, 14, 4, 'Sim'),(240, 1, 5, 14, 8, 'Sim'),(241, 1, 5, 14, 11, 'Sim'),(242, 1, 5, 14, 7, 'Sim'),(243, 1, 5, 14, 9, 'Sim'),(244, 1, 5, 14, 5, 'Não'),(245, 1, 5, 14, 12, 'Sim'),(246, 1, 5, 14, 10, 'Sim'),(247, 1, 5, 14, 1, 'Sim'),(248, 1, 5, 15, 2, 'Sim'),(249, 1, 5, 15, 6, 'Sim'),(250, 1, 5, 15, 13, 'Sim'),(251, 1, 5, 15, 3, 'Sim'),(252, 1, 5, 15, 4, 'Sim'),(253, 1, 5, 15, 8, 'Sim'),(254, 1, 5, 15, 11, 'Sim'),(255, 1, 5, 15, 7, 'Sim'),(256, 1, 5, 15, 9, 'Sim'),(257, 1, 5, 15, 5, 'Não'),(258, 1, 5, 15, 12, 'Sim'),(259, 1, 5, 15, 10, 'Sim'),(260, 1, 5, 15, 1, 'Sim'),(261, 1, 5, 16, 2, 'Sim'),(262, 1, 5, 16, 6, 'Sim'),(263, 1, 5, 16, 13, 'Sim'),(264, 1, 5, 16, 3, 'Sim'),(265, 1, 5, 16, 4, 'Sim'),(266, 1, 5, 16, 8, 'Sim'),(267, 1, 5, 16, 11, 'Sim'),(268, 1, 5, 16, 7, 'Sim'),(269, 1, 5, 16, 9, 'Sim'),(270, 1, 5, 16, 5, 'Não'),(271, 1, 5, 16, 12, 'Sim'),(272, 1, 5, 16, 10, 'Sim'),(273, 1, 5, 16, 1, 'Sim'),(274, 1, 6, 0, 2, 'Sim'),(275, 1, 6, 0, 6, 'Sim'),(276, 1, 6, 0, 13, 'Sim'),(277, 1, 6, 0, 3, 'Sim'),(278, 1, 6, 0, 4, 'Sim'),(279, 1, 6, 0, 8, 'Sim'),(280, 1, 6, 0, 11, 'Sim'),(281, 1, 6, 0, 7, 'Sim'),(282, 1, 6, 0, 9, 'Sim'),(283, 1, 6, 0, 5, 'Não'),(284, 1, 6, 0, 12, 'Sim'),(285, 1, 6, 0, 10, 'Sim'),(286, 1, 6, 0, 1, 'Sim'),(287, 1, 6, 17, 2, 'Sim'),(288, 1, 6, 17, 6, 'Sim'),(289, 1, 6, 17, 13, 'Sim'),(290, 1, 6, 17, 3, 'Sim'),(291, 1, 6, 17, 4, 'Sim'),(292, 1, 6, 17, 8, 'Sim'),(293, 1, 6, 17, 11, 'Sim'),(294, 1, 6, 17, 7, 'Sim'),(295, 1, 6, 17, 9, 'Sim'),(296, 1, 6, 17, 5, 'Não'),(297, 1, 6, 17, 12, 'Sim'),(298, 1, 6, 17, 10, 'Sim'),(299, 1, 6, 17, 1, 'Sim'),(300, 1, 6, 18, 2, 'Sim'),(301, 1, 6, 18, 6, 'Sim'),(302, 1, 6, 18, 13, 'Sim'),(303, 1, 6, 18, 3, 'Sim'),(304, 1, 6, 18, 4, 'Sim'),(305, 1, 6, 18, 8, 'Sim'),(306, 1, 6, 18, 11, 'Sim'),(307, 1, 6, 18, 7, 'Sim'),(308, 1, 6, 18, 9, 'Sim'),(309, 1, 6, 18, 5, 'Não'),(310, 1, 6, 18, 12, 'Sim'),(311, 1, 6, 18, 10, 'Sim'),(312, 1, 6, 18, 1, 'Sim'),(313, 1, 7, 0, 2, 'Sim'),(314, 1, 7, 0, 6, 'Sim'),(315, 1, 7, 0, 13, 'Sim'),(316, 1, 7, 0, 3, 'Sim'),(317, 1, 7, 0, 4, 'Sim'),(318, 1, 7, 0, 8, 'Sim'),(319, 1, 7, 0, 11, 'Sim'),(320, 1, 7, 0, 7, 'Sim'),(321, 1, 7, 0, 9, 'Sim'),(322, 1, 7, 0, 5, 'Não'),(323, 1, 7, 0, 12, 'Sim'),(324, 1, 7, 0, 10, 'Sim'),(325, 1, 7, 0, 1, 'Sim'),(326, 1, 7, 19, 2, 'Sim'),(327, 1, 7, 19, 6, 'Sim'),(328, 1, 7, 19, 13, 'Sim'),(329, 1, 7, 19, 3, 'Sim'),(330, 1, 7, 19, 4, 'Sim'),(331, 1, 7, 19, 8, 'Sim'),(332, 1, 7, 19, 11, 'Sim'),(333, 1, 7, 19, 7, 'Sim'),(334, 1, 7, 19, 9, 'Sim'),(335, 1, 7, 19, 5, 'Não'),(336, 1, 7, 19, 12, 'Sim'),(337, 1, 7, 19, 10, 'Sim'),(338, 1, 7, 19, 1, 'Sim'),(339, 1, 7, 20, 2, 'Sim'),(340, 1, 7, 20, 6, 'Sim'),(341, 1, 7, 20, 13, 'Sim'),(342, 1, 7, 20, 3, 'Sim'),(343, 1, 7, 20, 4, 'Sim'),(344, 1, 7, 20, 8, 'Sim'),(345, 1, 7, 20, 11, 'Sim'),(346, 1, 7, 20, 7, 'Sim'),(347, 1, 7, 20, 9, 'Sim'),(348, 1, 7, 20, 5, 'Não'),(349, 1, 7, 20, 12, 'Sim'),(350, 1, 7, 20, 10, 'Sim'),(351, 1, 7, 20, 1, 'Sim'),(352, 1, 7, 21, 2, 'Sim'),(353, 1, 7, 21, 6, 'Sim'),(354, 1, 7, 21, 13, 'Sim'),(355, 1, 7, 21, 3, 'Sim'),(356, 1, 7, 21, 4, 'Sim'),(357, 1, 7, 21, 8, 'Sim'),(358, 1, 7, 21, 11, 'Sim'),(359, 1, 7, 21, 7, 'Sim'),(360, 1, 7, 21, 9, 'Sim'),(361, 1, 7, 21, 5, 'Não'),(362, 1, 7, 21, 12, 'Sim'),(363, 1, 7, 21, 10, 'Sim'),(364, 1, 7, 21, 1, 'Sim'),(365, 1, 7, 22, 2, 'Sim'),(366, 1, 7, 22, 6, 'Sim'),(367, 1, 7, 22, 13, 'Sim'),(368, 1, 7, 22, 3, 'Sim'),(369, 1, 7, 22, 4, 'Sim'),(370, 1, 7, 22, 8, 'Sim'),(371, 1, 7, 22, 11, 'Sim'),(372, 1, 7, 22, 7, 'Sim'),(373, 1, 7, 22, 9, 'Sim'),(374, 1, 7, 22, 5, 'Não'),(375, 1, 7, 22, 12, 'Sim'),(376, 1, 7, 22, 10, 'Sim'),(377, 1, 7, 22, 1, 'Sim'),(378, 1, 7, 23, 2, 'Sim'),(379, 1, 7, 23, 6, 'Sim'),(380, 1, 7, 23, 13, 'Sim'),(381, 1, 7, 23, 3, 'Sim'),(382, 1, 7, 23, 4, 'Sim'),(383, 1, 7, 23, 8, 'Sim'),(384, 1, 7, 23, 11, 'Sim'),(385, 1, 7, 23, 7, 'Sim'),(386, 1, 7, 23, 9, 'Sim'),(387, 1, 7, 23, 5, 'Não'),(388, 1, 7, 23, 12, 'Sim'),(389, 1, 7, 23, 10, 'Sim'),(390, 1, 7, 23, 1, 'Sim'),(391, 1, 7, 24, 2, 'Sim'),(392, 1, 7, 24, 6, 'Sim'),(393, 1, 7, 24, 13, 'Sim'),(394, 1, 7, 24, 3, 'Sim'),(395, 1, 7, 24, 4, 'Sim'),(396, 1, 7, 24, 8, 'Sim'),(397, 1, 7, 24, 11, 'Sim'),(398, 1, 7, 24, 7, 'Sim'),(399, 1, 7, 24, 9, 'Sim'),(400, 1, 7, 24, 5, 'Não'),(401, 1, 7, 24, 12, 'Sim'),(402, 1, 7, 24, 10, 'Sim'),(403, 1, 7, 24, 1, 'Sim'),(404, 1, 7, 25, 2, 'Sim'),(405, 1, 7, 25, 6, 'Sim'),(406, 1, 7, 25, 13, 'Sim'),(407, 1, 7, 25, 3, 'Sim'),(408, 1, 7, 25, 4, 'Sim'),(409, 1, 7, 25, 8, 'Sim'),(410, 1, 7, 25, 11, 'Sim'),(411, 1, 7, 25, 7, 'Sim'),(412, 1, 7, 25, 9, 'Sim'),(413, 1, 7, 25, 5, 'Não'),(414, 1, 7, 25, 12, 'Sim'),(415, 1, 7, 25, 10, 'Sim'),(416, 1, 7, 25, 1, 'Sim'),(417, 1, 7, 26, 2, 'Sim'),(418, 1, 7, 26, 6, 'Sim'),(419, 1, 7, 26, 13, 'Sim'),(420, 1, 7, 26, 3, 'Sim'),(421, 1, 7, 26, 4, 'Sim'),(422, 1, 7, 26, 8, 'Sim'),(423, 1, 7, 26, 11, 'Sim'),(424, 1, 7, 26, 7, 'Sim'),(425, 1, 7, 26, 9, 'Sim'),(426, 1, 7, 26, 5, 'Não'),(427, 1, 7, 26, 12, 'Sim'),(428, 1, 7, 26, 10, 'Sim'),(429, 1, 7, 26, 1, 'Sim'),(430, 1, 7, 27, 2, 'Sim'),(431, 1, 7, 27, 6, 'Sim'),(432, 1, 7, 27, 13, 'Sim'),(433, 1, 7, 27, 3, 'Sim'),(434, 1, 7, 27, 4, 'Sim'),(435, 1, 7, 27, 8, 'Sim'),(436, 1, 7, 27, 11, 'Sim'),(437, 1, 7, 27, 7, 'Sim'),(438, 1, 7, 27, 9, 'Sim'),(439, 1, 7, 27, 5, 'Não'),(440, 1, 7, 27, 12, 'Sim'),(441, 1, 7, 27, 10, 'Sim'),(442, 1, 7, 27, 1, 'Sim'),(443, 1, 7, 28, 2, 'Sim'),(444, 1, 7, 28, 6, 'Sim'),(445, 1, 7, 28, 13, 'Sim'),(446, 1, 7, 28, 3, 'Sim'),(447, 1, 7, 28, 4, 'Sim'),(448, 1, 7, 28, 8, 'Sim'),(449, 1, 7, 28, 11, 'Sim'),(450, 1, 7, 28, 7, 'Sim'),(451, 1, 7, 28, 9, 'Sim'),(452, 1, 7, 28, 5, 'Não'),(453, 1, 7, 28, 12, 'Sim'),(454, 1, 7, 28, 10, 'Sim'),(455, 1, 7, 28, 1, 'Sim'),(456, 1, 7, 29, 2, 'Sim'),(457, 1, 7, 29, 6, 'Sim'),(458, 1, 7, 29, 13, 'Sim'),(459, 1, 7, 29, 3, 'Sim'),(460, 1, 7, 29, 4, 'Sim'),(461, 1, 7, 29, 8, 'Sim'),(462, 1, 7, 29, 11, 'Sim'),(463, 1, 7, 29, 7, 'Sim'),(464, 1, 7, 29, 9, 'Sim'),(465, 1, 7, 29, 5, 'Não'),(466, 1, 7, 29, 12, 'Sim'),(467, 1, 7, 29, 10, 'Sim'),(468, 1, 7, 29, 1, 'Sim'),(469, 1, 8, 0, 2, 'Sim'),(470, 1, 8, 0, 6, 'Sim'),(471, 1, 8, 0, 13, 'Sim'),(472, 1, 8, 0, 3, 'Sim'),(473, 1, 8, 0, 4, 'Sim'),(474, 1, 8, 0, 8, 'Sim'),(475, 1, 8, 0, 11, 'Sim'),(476, 1, 8, 0, 7, 'Sim'),(477, 1, 8, 0, 9, 'Sim'),(478, 1, 8, 0, 5, 'Não'),(479, 1, 8, 0, 12, 'Sim'),(480, 1, 8, 0, 10, 'Sim'),(481, 1, 8, 0, 1, 'Sim'),(482, 1, 8, 30, 2, 'Sim'),(483, 1, 8, 30, 6, 'Sim'),(484, 1, 8, 30, 13, 'Sim'),(485, 1, 8, 30, 3, 'Sim'),(486, 1, 8, 30, 4, 'Sim'),(487, 1, 8, 30, 8, 'Sim'),(488, 1, 8, 30, 11, 'Sim'),(489, 1, 8, 30, 7, 'Sim'),(490, 1, 8, 30, 9, 'Sim'),(491, 1, 8, 30, 5, 'Não'),(492, 1, 8, 30, 12, 'Sim'),(493, 1, 8, 30, 10, 'Sim'),(494, 1, 8, 30, 1, 'Sim'),(495, 1, 8, 31, 2, 'Sim'),(496, 1, 8, 31, 6, 'Sim'),(497, 1, 8, 31, 13, 'Sim'),(498, 1, 8, 31, 3, 'Sim'),(499, 1, 8, 31, 4, 'Sim'),(500, 1, 8, 31, 8, 'Sim'),(501, 1, 8, 31, 11, 'Sim'),(502, 1, 8, 31, 7, 'Sim'),(503, 1, 8, 31, 9, 'Sim'),(504, 1, 8, 31, 5, 'Não'),(505, 1, 8, 31, 12, 'Sim'),(506, 1, 8, 31, 10, 'Sim'),(507, 1, 8, 31, 1, 'Sim'),(508, 1, 8, 32, 2, 'Sim'),(509, 1, 8, 32, 6, 'Sim'),(510, 1, 8, 32, 13, 'Sim'),(511, 1, 8, 32, 3, 'Sim'),(512, 1, 8, 32, 4, 'Sim'),(513, 1, 8, 32, 8, 'Sim'),(514, 1, 8, 32, 11, 'Sim'),(515, 1, 8, 32, 7, 'Sim'),(516, 1, 8, 32, 9, 'Sim'),(517, 1, 8, 32, 5, 'Não'),(518, 1, 8, 32, 12, 'Sim'),(519, 1, 8, 32, 10, 'Sim'),(520, 1, 8, 32, 1, 'Sim'),(521, 1, 8, 33, 2, 'Sim'),(522, 1, 8, 33, 6, 'Sim'),(523, 1, 8, 33, 13, 'Sim'),(524, 1, 8, 33, 3, 'Sim'),(525, 1, 8, 33, 4, 'Sim'),(526, 1, 8, 33, 8, 'Sim'),(527, 1, 8, 33, 11, 'Sim'),(528, 1, 8, 33, 7, 'Sim'),(529, 1, 8, 33, 9, 'Sim'),(530, 1, 8, 33, 5, 'Não'),(531, 1, 8, 33, 12, 'Sim'),(532, 1, 8, 33, 10, 'Sim'),(533, 1, 8, 33, 1, 'Sim'),(534, 1, 8, 34, 2, 'Sim'),(535, 1, 8, 34, 6, 'Sim'),(536, 1, 8, 34, 13, 'Sim'),(537, 1, 8, 34, 3, 'Sim'),(538, 1, 8, 34, 4, 'Sim'),(539, 1, 8, 34, 8, 'Sim'),(540, 1, 8, 34, 11, 'Sim'),(541, 1, 8, 34, 7, 'Sim'),(542, 1, 8, 34, 9, 'Sim'),(543, 1, 8, 34, 5, 'Não'),(544, 1, 8, 34, 12, 'Sim'),(545, 1, 8, 34, 10, 'Sim'),(546, 1, 8, 34, 1, 'Sim'),(547, 1, 8, 35, 2, 'Sim'),(548, 1, 8, 35, 6, 'Sim'),(549, 1, 8, 35, 13, 'Sim'),(550, 1, 8, 35, 3, 'Sim'),(551, 1, 8, 35, 4, 'Sim'),(552, 1, 8, 35, 8, 'Sim'),(553, 1, 8, 35, 11, 'Sim'),(554, 1, 8, 35, 7, 'Sim'),(555, 1, 8, 35, 9, 'Sim'),(556, 1, 8, 35, 5, 'Não'),(557, 1, 8, 35, 12, 'Sim'),(558, 1, 8, 35, 10, 'Sim'),(559, 1, 8, 35, 1, 'Sim'),(560, 1, 8, 36, 2, 'Sim'),(561, 1, 8, 36, 6, 'Sim'),(562, 1, 8, 36, 13, 'Sim'),(563, 1, 8, 36, 3, 'Sim'),(564, 1, 8, 36, 4, 'Sim'),(565, 1, 8, 36, 8, 'Sim'),(566, 1, 8, 36, 11, 'Sim'),(567, 1, 8, 36, 7, 'Sim'),(568, 1, 8, 36, 9, 'Sim'),(569, 1, 8, 36, 5, 'Não'),(570, 1, 8, 36, 12, 'Sim'),(571, 1, 8, 36, 10, 'Sim'),(572, 1, 8, 36, 1, 'Sim'),(573, 1, 8, 37, 2, 'Sim'),(574, 1, 8, 37, 6, 'Sim'),(575, 1, 8, 37, 13, 'Sim'),(576, 1, 8, 37, 3, 'Sim'),(577, 1, 8, 37, 4, 'Sim'),(578, 1, 8, 37, 8, 'Sim'),(579, 1, 8, 37, 11, 'Sim'),(580, 1, 8, 37, 7, 'Sim'),(581, 1, 8, 37, 9, 'Sim'),(582, 1, 8, 37, 5, 'Não'),(583, 1, 8, 37, 12, 'Sim'),(584, 1, 8, 37, 10, 'Sim'),(585, 1, 8, 37, 1, 'Sim'),(586, 1, 8, 38, 2, 'Sim'),(587, 1, 8, 38, 6, 'Sim'),(588, 1, 8, 38, 13, 'Sim'),(589, 1, 8, 38, 3, 'Sim'),(590, 1, 8, 38, 4, 'Sim'),(591, 1, 8, 38, 8, 'Sim'),(592, 1, 8, 38, 11, 'Sim'),(593, 1, 8, 38, 7, 'Sim'),(594, 1, 8, 38, 9, 'Sim'),(595, 1, 8, 38, 5, 'Não'),(596, 1, 8, 38, 12, 'Sim'),(597, 1, 8, 38, 10, 'Sim'),(598, 1, 8, 38, 1, 'Sim'),(599, 1, 8, 39, 2, 'Sim'),(600, 1, 8, 39, 6, 'Sim'),(601, 1, 8, 39, 13, 'Sim'),(602, 1, 8, 39, 3, 'Sim'),(603, 1, 8, 39, 4, 'Sim'),(604, 1, 8, 39, 8, 'Sim'),(605, 1, 8, 39, 11, 'Sim'),(606, 1, 8, 39, 7, 'Sim'),(607, 1, 8, 39, 9, 'Sim'),(608, 1, 8, 39, 5, 'Não'),(609, 1, 8, 39, 12, 'Sim'),(610, 1, 8, 39, 10, 'Sim'),(611, 1, 8, 39, 1, 'Sim'),(612, 1, 8, 40, 2, 'Sim'),(613, 1, 8, 40, 6, 'Sim'),(614, 1, 8, 40, 13, 'Sim'),(615, 1, 8, 40, 3, 'Sim'),(616, 1, 8, 40, 4, 'Sim'),(617, 1, 8, 40, 8, 'Sim'),(618, 1, 8, 40, 11, 'Sim'),(619, 1, 8, 40, 7, 'Sim'),(620, 1, 8, 40, 9, 'Sim'),(621, 1, 8, 40, 5, 'Não'),(622, 1, 8, 40, 12, 'Sim'),(623, 1, 8, 40, 10, 'Sim'),(624, 1, 8, 40, 1, 'Sim'),(625, 1, 8, 41, 2, 'Sim'),(626, 1, 8, 41, 6, 'Sim'),(627, 1, 8, 41, 13, 'Sim'),(628, 1, 8, 41, 3, 'Sim'),(629, 1, 8, 41, 4, 'Sim'),(630, 1, 8, 41, 8, 'Sim'),(631, 1, 8, 41, 11, 'Sim'),(632, 1, 8, 41, 7, 'Sim'),(633, 1, 8, 41, 9, 'Sim'),(634, 1, 8, 41, 5, 'Não'),(635, 1, 8, 41, 12, 'Sim'),(636, 1, 8, 41, 10, 'Sim'),(637, 1, 8, 41, 1, 'Sim'),(638, 1, 8, 42, 2, 'Sim'),(639, 1, 8, 42, 6, 'Sim'),(640, 1, 8, 42, 13, 'Sim'),(641, 1, 8, 42, 3, 'Sim'),(642, 1, 8, 42, 4, 'Sim'),(643, 1, 8, 42, 8, 'Sim'),(644, 1, 8, 42, 11, 'Sim'),(645, 1, 8, 42, 7, 'Sim'),(646, 1, 8, 42, 9, 'Sim'),(647, 1, 8, 42, 5, 'Não'),(648, 1, 8, 42, 12, 'Sim'),(649, 1, 8, 42, 10, 'Sim'),(650, 1, 8, 42, 1, 'Sim'),(651, 1, 8, 43, 2, 'Sim'),(652, 1, 8, 43, 6, 'Sim'),(653, 1, 8, 43, 13, 'Sim'),(654, 1, 8, 43, 3, 'Sim'),(655, 1, 8, 43, 4, 'Sim'),(656, 1, 8, 43, 8, 'Sim'),(657, 1, 8, 43, 11, 'Sim'),(658, 1, 8, 43, 7, 'Sim'),(659, 1, 8, 43, 9, 'Sim'),(660, 1, 8, 43, 5, 'Não'),(661, 1, 8, 43, 12, 'Sim'),(662, 1, 8, 43, 10, 'Sim'),(663, 1, 8, 43, 1, 'Sim'),(664, 1, 8, 44, 2, 'Sim'),(665, 1, 8, 44, 6, 'Sim'),(666, 1, 8, 44, 13, 'Sim'),(667, 1, 8, 44, 3, 'Sim'),(668, 1, 8, 44, 4, 'Sim'),(669, 1, 8, 44, 8, 'Sim'),(670, 1, 8, 44, 11, 'Sim'),(671, 1, 8, 44, 7, 'Sim'),(672, 1, 8, 44, 9, 'Sim'),(673, 1, 8, 44, 5, 'Não'),(674, 1, 8, 44, 12, 'Sim'),(675, 1, 8, 44, 10, 'Sim'),(676, 1, 8, 44, 1, 'Sim'),(677, 1, 8, 45, 2, 'Sim'),(678, 1, 8, 45, 6, 'Sim'),(679, 1, 8, 45, 13, 'Sim'),(680, 1, 8, 45, 3, 'Sim'),(681, 1, 8, 45, 4, 'Sim'),(682, 1, 8, 45, 8, 'Sim'),(683, 1, 8, 45, 11, 'Sim'),(684, 1, 8, 45, 7, 'Sim'),(685, 1, 8, 45, 9, 'Sim'),(686, 1, 8, 45, 5, 'Não'),(687, 1, 8, 45, 12, 'Sim'),(688, 1, 8, 45, 10, 'Sim'),(689, 1, 8, 45, 1, 'Sim'),(690, 1, 8, 46, 2, 'Sim'),(691, 1, 8, 46, 6, 'Sim'),(692, 1, 8, 46, 13, 'Sim'),(693, 1, 8, 46, 3, 'Sim'),(694, 1, 8, 46, 4, 'Sim'),(695, 1, 8, 46, 8, 'Sim'),(696, 1, 8, 46, 11, 'Sim'),(697, 1, 8, 46, 7, 'Sim'),(698, 1, 8, 46, 9, 'Sim'),(699, 1, 8, 46, 5, 'Não'),(700, 1, 8, 46, 12, 'Sim'),(701, 1, 8, 46, 10, 'Sim'),(702, 1, 8, 46, 1, 'Sim'),(703, 1, 8, 47, 2, 'Sim'),(704, 1, 8, 47, 6, 'Sim'),(705, 1, 8, 47, 13, 'Sim'),(706, 1, 8, 47, 3, 'Sim'),(707, 1, 8, 47, 4, 'Sim'),(708, 1, 8, 47, 8, 'Sim'),(709, 1, 8, 47, 11, 'Sim'),(710, 1, 8, 47, 7, 'Sim'),(711, 1, 8, 47, 9, 'Sim'),(712, 1, 8, 47, 5, 'Não'),(713, 1, 8, 47, 12, 'Sim'),(714, 1, 8, 47, 10, 'Sim'),(715, 1, 8, 47, 1, 'Sim'),(716, 1, 8, 48, 2, 'Sim'),(717, 1, 8, 48, 6, 'Sim'),(718, 1, 8, 48, 13, 'Sim'),(719, 1, 8, 48, 3, 'Sim'),(720, 1, 8, 48, 4, 'Sim'),(721, 1, 8, 48, 8, 'Sim'),(722, 1, 8, 48, 11, 'Sim'),(723, 1, 8, 48, 7, 'Sim'),(724, 1, 8, 48, 9, 'Sim'),(725, 1, 8, 48, 5, 'Não'),(726, 1, 8, 48, 12, 'Sim'),(727, 1, 8, 48, 10, 'Sim'),(728, 1, 8, 48, 1, 'Sim'),(729, 1, 8, 49, 2, 'Sim'),(730, 1, 8, 49, 6, 'Sim'),(731, 1, 8, 49, 13, 'Sim'),(732, 1, 8, 49, 3, 'Sim'),(733, 1, 8, 49, 4, 'Sim'),(734, 1, 8, 49, 8, 'Sim'),(735, 1, 8, 49, 11, 'Sim'),(736, 1, 8, 49, 7, 'Sim'),(737, 1, 8, 49, 9, 'Sim'),(738, 1, 8, 49, 5, 'Não'),(739, 1, 8, 49, 12, 'Sim'),(740, 1, 8, 49, 10, 'Sim'),(741, 1, 8, 49, 1, 'Sim'),(742, 1, 9, 0, 2, 'Sim'),(743, 1, 9, 0, 6, 'Sim'),(744, 1, 9, 0, 13, 'Sim'),(745, 1, 9, 0, 3, 'Sim'),(746, 1, 9, 0, 4, 'Sim'),(747, 1, 9, 0, 8, 'Sim'),(748, 1, 9, 0, 11, 'Sim'),(749, 1, 9, 0, 7, 'Sim'),(750, 1, 9, 0, 9, 'Sim'),(751, 1, 9, 0, 5, 'Não'),(752, 1, 9, 0, 12, 'Sim'),(753, 1, 9, 0, 10, 'Sim'),(754, 1, 9, 0, 1, 'Sim'),(755, 1, 9, 50, 2, 'Sim'),(756, 1, 9, 50, 6, 'Sim'),(757, 1, 9, 50, 13, 'Sim'),(758, 1, 9, 50, 3, 'Sim'),(759, 1, 9, 50, 4, 'Sim'),(760, 1, 9, 50, 8, 'Sim'),(761, 1, 9, 50, 11, 'Sim'),(762, 1, 9, 50, 7, 'Sim'),(763, 1, 9, 50, 9, 'Sim'),(764, 1, 9, 50, 5, 'Não'),(765, 1, 9, 50, 12, 'Sim'),(766, 1, 9, 50, 10, 'Sim'),(767, 1, 9, 50, 1, 'Sim'),(768, 1, 9, 51, 2, 'Sim'),(769, 1, 9, 51, 6, 'Sim'),(770, 1, 9, 51, 13, 'Sim'),(771, 1, 9, 51, 3, 'Sim'),(772, 1, 9, 51, 4, 'Sim'),(773, 1, 9, 51, 8, 'Sim'),(774, 1, 9, 51, 11, 'Sim'),(775, 1, 9, 51, 7, 'Sim'),(776, 1, 9, 51, 9, 'Sim'),(777, 1, 9, 51, 5, 'Não'),(778, 1, 9, 51, 12, 'Sim'),(779, 1, 9, 51, 10, 'Sim'),(780, 1, 9, 51, 1, 'Sim'),(781, 1, 9, 52, 2, 'Sim'),(782, 1, 9, 52, 6, 'Sim'),(783, 1, 9, 52, 13, 'Sim'),(784, 1, 9, 52, 3, 'Sim'),(785, 1, 9, 52, 4, 'Sim'),(786, 1, 9, 52, 8, 'Sim'),(787, 1, 9, 52, 11, 'Sim'),(788, 1, 9, 52, 7, 'Sim'),(789, 1, 9, 52, 9, 'Sim'),(790, 1, 9, 52, 5, 'Não'),(791, 1, 9, 52, 12, 'Sim'),(792, 1, 9, 52, 10, 'Sim'),(793, 1, 9, 52, 1, 'Sim'),(794, 1, 9, 53, 2, 'Sim'),(795, 1, 9, 53, 6, 'Sim'),(796, 1, 9, 53, 13, 'Sim'),(797, 1, 9, 53, 3, 'Sim'),(798, 1, 9, 53, 4, 'Sim'),(799, 1, 9, 53, 8, 'Sim'),(800, 1, 9, 53, 11, 'Sim'),(801, 1, 9, 53, 7, 'Sim'),(802, 1, 9, 53, 9, 'Sim'),(803, 1, 9, 53, 5, 'Não'),(804, 1, 9, 53, 12, 'Sim'),(805, 1, 9, 53, 10, 'Sim'),(806, 1, 9, 53, 1, 'Sim'),(807, 1, 9, 54, 2, 'Sim'),(808, 1, 9, 54, 6, 'Sim'),(809, 1, 9, 54, 13, 'Sim'),(810, 1, 9, 54, 3, 'Sim'),(811, 1, 9, 54, 4, 'Sim'),(812, 1, 9, 54, 8, 'Sim'),(813, 1, 9, 54, 11, 'Sim'),(814, 1, 9, 54, 7, 'Sim'),(815, 1, 9, 54, 9, 'Sim'),(816, 1, 9, 54, 5, 'Não'),(817, 1, 9, 54, 12, 'Sim'),(818, 1, 9, 54, 10, 'Sim'),(819, 1, 9, 54, 1, 'Sim'),(820, 1, 9, 55, 2, 'Sim'),(821, 1, 9, 55, 6, 'Sim'),(822, 1, 9, 55, 13, 'Sim'),(823, 1, 9, 55, 3, 'Sim'),(824, 1, 9, 55, 4, 'Sim'),(825, 1, 9, 55, 8, 'Sim'),(826, 1, 9, 55, 11, 'Sim'),(827, 1, 9, 55, 7, 'Sim'),(828, 1, 9, 55, 9, 'Sim'),(829, 1, 9, 55, 5, 'Não'),(830, 1, 9, 55, 12, 'Sim'),(831, 1, 9, 55, 10, 'Sim'),(832, 1, 9, 55, 1, 'Sim'),(833, 1, 9, 56, 2, 'Sim'),(834, 1, 9, 56, 6, 'Sim'),(835, 1, 9, 56, 13, 'Sim'),(836, 1, 9, 56, 3, 'Sim'),(837, 1, 9, 56, 4, 'Sim'),(838, 1, 9, 56, 8, 'Sim'),(839, 1, 9, 56, 11, 'Sim'),(840, 1, 9, 56, 7, 'Sim'),(841, 1, 9, 56, 9, 'Sim'),(842, 1, 9, 56, 5, 'Não'),(843, 1, 9, 56, 12, 'Sim'),(844, 1, 9, 56, 10, 'Sim'),(845, 1, 9, 56, 1, 'Sim'),(846, 1, 9, 57, 2, 'Sim'),(847, 1, 9, 57, 6, 'Sim'),(848, 1, 9, 57, 13, 'Sim'),(849, 1, 9, 57, 3, 'Sim'),(850, 1, 9, 57, 4, 'Sim'),(851, 1, 9, 57, 8, 'Sim'),(852, 1, 9, 57, 11, 'Sim'),(853, 1, 9, 57, 7, 'Sim'),(854, 1, 9, 57, 9, 'Sim'),(855, 1, 9, 57, 5, 'Não'),(856, 1, 9, 57, 12, 'Sim'),(857, 1, 9, 57, 10, 'Sim'),(858, 1, 9, 57, 1, 'Sim'),(859, 1, 9, 58, 2, 'Sim'),(860, 1, 9, 58, 6, 'Sim'),(861, 1, 9, 58, 13, 'Sim'),(862, 1, 9, 58, 3, 'Sim'),(863, 1, 9, 58, 4, 'Sim'),(864, 1, 9, 58, 8, 'Sim'),(865, 1, 9, 58, 11, 'Sim'),(866, 1, 9, 58, 7, 'Sim'),(867, 1, 9, 58, 9, 'Sim'),(868, 1, 9, 58, 5, 'Não'),(869, 1, 9, 58, 12, 'Sim'),(870, 1, 9, 58, 10, 'Sim'),(871, 1, 9, 58, 1, 'Sim'),(872, 1, 9, 59, 2, 'Sim'),(873, 1, 9, 59, 6, 'Sim'),(874, 1, 9, 59, 13, 'Sim'),(875, 1, 9, 59, 3, 'Sim'),(876, 1, 9, 59, 4, 'Sim'),(877, 1, 9, 59, 8, 'Sim'),(878, 1, 9, 59, 11, 'Sim'),(879, 1, 9, 59, 7, 'Sim'),(880, 1, 9, 59, 9, 'Sim'),(881, 1, 9, 59, 5, 'Não'),(882, 1, 9, 59, 12, 'Sim'),(883, 1, 9, 59, 10, 'Sim'),(884, 1, 9, 59, 1, 'Sim'),(885, 1, 9, 60, 2, 'Sim'),(886, 1, 9, 60, 6, 'Sim'),(887, 1, 9, 60, 13, 'Sim'),(888, 1, 9, 60, 3, 'Sim'),(889, 1, 9, 60, 4, 'Sim'),(890, 1, 9, 60, 8, 'Sim'),(891, 1, 9, 60, 11, 'Sim'),(892, 1, 9, 60, 7, 'Sim'),(893, 1, 9, 60, 9, 'Sim'),(894, 1, 9, 60, 5, 'Não'),(895, 1, 9, 60, 12, 'Sim'),(896, 1, 9, 60, 10, 'Sim'),(897, 1, 9, 60, 1, 'Sim'),(898, 1, 9, 61, 2, 'Sim'),(899, 1, 9, 61, 6, 'Sim'),(900, 1, 9, 61, 13, 'Sim'),(901, 1, 9, 61, 3, 'Sim'),(902, 1, 9, 61, 4, 'Sim'),(903, 1, 9, 61, 8, 'Sim'),(904, 1, 9, 61, 11, 'Sim'),(905, 1, 9, 61, 7, 'Sim'),(906, 1, 9, 61, 9, 'Sim'),(907, 1, 9, 61, 5, 'Não'),(908, 1, 9, 61, 12, 'Sim'),(909, 1, 9, 61, 10, 'Sim'),(910, 1, 9, 61, 1, 'Sim'),(911, 1, 9, 62, 2, 'Sim'),(912, 1, 9, 62, 6, 'Sim'),(913, 1, 9, 62, 13, 'Sim'),(914, 1, 9, 62, 3, 'Sim'),(915, 1, 9, 62, 4, 'Sim'),(916, 1, 9, 62, 8, 'Sim'),(917, 1, 9, 62, 11, 'Sim'),(918, 1, 9, 62, 7, 'Sim'),(919, 1, 9, 62, 9, 'Sim'),(920, 1, 9, 62, 5, 'Não'),(921, 1, 9, 62, 12, 'Sim'),(922, 1, 9, 62, 10, 'Sim'),(923, 1, 9, 62, 1, 'Sim'),(924, 1, 9, 63, 2, 'Sim'),(925, 1, 9, 63, 6, 'Sim'),(926, 1, 9, 63, 13, 'Sim'),(927, 1, 9, 63, 3, 'Sim'),(928, 1, 9, 63, 4, 'Sim'),(929, 1, 9, 63, 8, 'Sim'),(930, 1, 9, 63, 11, 'Sim'),(931, 1, 9, 63, 7, 'Sim'),(932, 1, 9, 63, 9, 'Sim'),(933, 1, 9, 63, 5, 'Não'),(934, 1, 9, 63, 12, 'Sim'),(935, 1, 9, 63, 10, 'Sim'),(936, 1, 9, 63, 1, 'Sim'),(937, 1, 9, 64, 2, 'Sim'),(938, 1, 9, 64, 6, 'Sim'),(939, 1, 9, 64, 13, 'Sim'),(940, 1, 9, 64, 3, 'Sim'),(941, 1, 9, 64, 4, 'Sim'),(942, 1, 9, 64, 8, 'Sim'),(943, 1, 9, 64, 11, 'Sim'),(944, 1, 9, 64, 7, 'Sim'),(945, 1, 9, 64, 9, 'Sim'),(946, 1, 9, 64, 5, 'Não'),(947, 1, 9, 64, 12, 'Sim'),(948, 1, 9, 64, 10, 'Sim'),(949, 1, 9, 64, 1, 'Sim'),(950, 1, 9, 65, 2, 'Sim'),(951, 1, 9, 65, 6, 'Sim'),(952, 1, 9, 65, 13, 'Sim'),(953, 1, 9, 65, 3, 'Sim'),(954, 1, 9, 65, 4, 'Sim'),(955, 1, 9, 65, 8, 'Sim'),(956, 1, 9, 65, 11, 'Sim'),(957, 1, 9, 65, 7, 'Sim'),(958, 1, 9, 65, 9, 'Sim'),(959, 1, 9, 65, 5, 'Não'),(960, 1, 9, 65, 12, 'Sim'),(961, 1, 9, 65, 10, 'Sim'),(962, 1, 9, 65, 1, 'Sim'),(963, 1, 9, 66, 2, 'Sim'),(964, 1, 9, 66, 6, 'Sim'),(965, 1, 9, 66, 13, 'Sim'),(966, 1, 9, 66, 3, 'Sim'),(967, 1, 9, 66, 4, 'Sim'),(968, 1, 9, 66, 8, 'Sim'),(969, 1, 9, 66, 11, 'Sim'),(970, 1, 9, 66, 7, 'Sim'),(971, 1, 9, 66, 9, 'Sim'),(972, 1, 9, 66, 5, 'Não'),(973, 1, 9, 66, 12, 'Sim'),(974, 1, 9, 66, 10, 'Sim'),(975, 1, 9, 66, 1, 'Sim'),(976, 1, 9, 67, 2, 'Sim'),(977, 1, 9, 67, 6, 'Sim'),(978, 1, 9, 67, 13, 'Sim'),(979, 1, 9, 67, 3, 'Sim'),(980, 1, 9, 67, 4, 'Sim'),(981, 1, 9, 67, 8, 'Sim'),(982, 1, 9, 67, 11, 'Sim'),(983, 1, 9, 67, 7, 'Sim'),(984, 1, 9, 67, 9, 'Sim'),(985, 1, 9, 67, 5, 'Não'),(986, 1, 9, 67, 12, 'Sim'),(987, 1, 9, 67, 10, 'Sim'),(988, 1, 9, 67, 1, 'Sim'),(989, 1, 9, 68, 2, 'Sim'),(990, 1, 9, 68, 6, 'Sim'),(991, 1, 9, 68, 13, 'Sim'),(992, 1, 9, 68, 3, 'Sim'),(993, 1, 9, 68, 4, 'Sim'),(994, 1, 9, 68, 8, 'Sim'),(995, 1, 9, 68, 11, 'Sim'),(996, 1, 9, 68, 7, 'Sim'),(997, 1, 9, 68, 9, 'Sim'),(998, 1, 9, 68, 5, 'Não'),(999, 1, 9, 68, 12, 'Sim'),(1000, 1, 9, 68, 10, 'Sim'),(1001, 1, 9, 68, 1, 'Sim'),(1002, 1, 9, 69, 2, 'Sim'),(1003, 1, 9, 69, 6, 'Sim'),(1004, 1, 9, 69, 13, 'Sim'),(1005, 1, 9, 69, 3, 'Sim'),(1006, 1, 9, 69, 4, 'Sim'),(1007, 1, 9, 69, 8, 'Sim'),(1008, 1, 9, 69, 11, 'Sim'),(1009, 1, 9, 69, 7, 'Sim'),(1010, 1, 9, 69, 9, 'Sim'),(1011, 1, 9, 69, 5, 'Não'),(1012, 1, 9, 69, 12, 'Sim'),(1013, 1, 9, 69, 10, 'Sim'),(1014, 1, 9, 69, 1, 'Sim'),(1015, 1, 9, 70, 2, 'Sim'),(1016, 1, 9, 70, 6, 'Sim'),(1017, 1, 9, 70, 13, 'Sim'),(1018, 1, 9, 70, 3, 'Sim'),(1019, 1, 9, 70, 4, 'Sim'),(1020, 1, 9, 70, 8, 'Sim'),(1021, 1, 9, 70, 11, 'Sim'),(1022, 1, 9, 70, 7, 'Sim'),(1023, 1, 9, 70, 9, 'Sim'),(1024, 1, 9, 70, 5, 'Não'),(1025, 1, 9, 70, 12, 'Sim'),(1026, 1, 9, 70, 10, 'Sim'),(1027, 1, 9, 70, 1, 'Sim'),(1028, 1, 9, 71, 2, 'Sim'),(1029, 1, 9, 71, 6, 'Sim'),(1030, 1, 9, 71, 13, 'Sim'),(1031, 1, 9, 71, 3, 'Sim'),(1032, 1, 9, 71, 4, 'Sim'),(1033, 1, 9, 71, 8, 'Sim'),(1034, 1, 9, 71, 11, 'Sim'),(1035, 1, 9, 71, 7, 'Sim'),(1036, 1, 9, 71, 9, 'Sim'),(1037, 1, 9, 71, 5, 'Não'),(1038, 1, 9, 71, 12, 'Sim'),(1039, 1, 9, 71, 10, 'Sim'),(1040, 1, 9, 71, 1, 'Sim'),(1041, 1, 9, 72, 2, 'Sim'),(1042, 1, 9, 72, 6, 'Sim'),(1043, 1, 9, 72, 13, 'Sim'),(1044, 1, 9, 72, 3, 'Sim'),(1045, 1, 9, 72, 4, 'Sim'),(1046, 1, 9, 72, 8, 'Sim'),(1047, 1, 9, 72, 11, 'Sim'),(1048, 1, 9, 72, 7, 'Sim'),(1049, 1, 9, 72, 9, 'Sim'),(1050, 1, 9, 72, 5, 'Não'),(1051, 1, 9, 72, 12, 'Sim'),(1052, 1, 9, 72, 10, 'Sim'),(1053, 1, 9, 72, 1, 'Sim'),(1054, 1, 9, 73, 2, 'Sim'),(1055, 1, 9, 73, 6, 'Sim'),(1056, 1, 9, 73, 13, 'Sim'),(1057, 1, 9, 73, 3, 'Sim'),(1058, 1, 9, 73, 4, 'Sim'),(1059, 1, 9, 73, 8, 'Sim'),(1060, 1, 9, 73, 11, 'Sim'),(1061, 1, 9, 73, 7, 'Sim'),(1062, 1, 9, 73, 9, 'Sim'),(1063, 1, 9, 73, 5, 'Não'),(1064, 1, 9, 73, 12, 'Sim'),(1065, 1, 9, 73, 10, 'Sim'),(1066, 1, 9, 73, 1, 'Sim'),(1067, 1, 9, 74, 2, 'Sim'),(1068, 1, 9, 74, 6, 'Sim'),(1069, 1, 9, 74, 13, 'Sim'),(1070, 1, 9, 74, 3, 'Sim'),(1071, 1, 9, 74, 4, 'Sim'),(1072, 1, 9, 74, 8, 'Sim'),(1073, 1, 9, 74, 11, 'Sim'),(1074, 1, 9, 74, 7, 'Sim'),(1075, 1, 9, 74, 9, 'Sim'),(1076, 1, 9, 74, 5, 'Não'),(1077, 1, 9, 74, 12, 'Sim'),(1078, 1, 9, 74, 10, 'Sim'),(1079, 1, 9, 74, 1, 'Sim'),(1080, 1, 9, 75, 2, 'Sim'),(1081, 1, 9, 75, 6, 'Sim'),(1082, 1, 9, 75, 13, 'Sim'),(1083, 1, 9, 75, 3, 'Sim'),(1084, 1, 9, 75, 4, 'Sim'),(1085, 1, 9, 75, 8, 'Sim'),(1086, 1, 9, 75, 11, 'Sim'),(1087, 1, 9, 75, 7, 'Sim'),(1088, 1, 9, 75, 9, 'Sim'),(1089, 1, 9, 75, 5, 'Não'),(1090, 1, 9, 75, 12, 'Sim'),(1091, 1, 9, 75, 10, 'Sim'),(1092, 1, 9, 75, 1, 'Sim'),(1093, 1, 9, 76, 2, 'Sim'),(1094, 1, 9, 76, 6, 'Sim'),(1095, 1, 9, 76, 13, 'Sim'),(1096, 1, 9, 76, 3, 'Sim'),(1097, 1, 9, 76, 4, 'Sim'),(1098, 1, 9, 76, 8, 'Sim'),(1099, 1, 9, 76, 11, 'Sim'),(1100, 1, 9, 76, 7, 'Sim'),(1101, 1, 9, 76, 9, 'Sim'),(1102, 1, 9, 76, 5, 'Não'),(1103, 1, 9, 76, 12, 'Sim'),(1104, 1, 9, 76, 10, 'Sim'),(1105, 1, 9, 76, 1, 'Sim'),(1106, 1, 9, 77, 2, 'Sim'),(1107, 1, 9, 77, 6, 'Sim'),(1108, 1, 9, 77, 13, 'Sim'),(1109, 1, 9, 77, 3, 'Sim'),(1110, 1, 9, 77, 4, 'Sim'),(1111, 1, 9, 77, 8, 'Sim'),(1112, 1, 9, 77, 11, 'Sim'),(1113, 1, 9, 77, 7, 'Sim'),(1114, 1, 9, 77, 9, 'Sim'),(1115, 1, 9, 77, 5, 'Não'),(1116, 1, 9, 77, 12, 'Sim'),(1117, 1, 9, 77, 10, 'Sim'),(1118, 1, 9, 77, 1, 'Sim'),(1119, 1, 9, 78, 2, 'Sim'),(1120, 1, 9, 78, 6, 'Sim'),(1121, 1, 9, 78, 13, 'Sim'),(1122, 1, 9, 78, 3, 'Sim'),(1123, 1, 9, 78, 4, 'Sim'),(1124, 1, 9, 78, 8, 'Sim'),(1125, 1, 9, 78, 11, 'Sim'),(1126, 1, 9, 78, 7, 'Sim'),(1127, 1, 9, 78, 9, 'Sim'),(1128, 1, 9, 78, 5, 'Não'),(1129, 1, 9, 78, 12, 'Sim'),(1130, 1, 9, 78, 10, 'Sim'),(1131, 1, 9, 78, 1, 'Sim'),(1132, 1, 9, 79, 2, 'Sim'),(1133, 1, 9, 79, 6, 'Sim'),(1134, 1, 9, 79, 13, 'Sim'),(1135, 1, 9, 79, 3, 'Sim'),(1136, 1, 9, 79, 4, 'Sim'),(1137, 1, 9, 79, 8, 'Sim'),(1138, 1, 9, 79, 11, 'Sim'),(1139, 1, 9, 79, 7, 'Sim'),(1140, 1, 9, 79, 9, 'Sim'),(1141, 1, 9, 79, 5, 'Não'),(1142, 1, 9, 79, 12, 'Sim'),(1143, 1, 9, 79, 10, 'Sim'),(1144, 1, 9, 79, 1, 'Sim'),(1145, 1, 10, 0, 2, 'Sim'),(1146, 1, 10, 0, 6, 'Sim'),(1147, 1, 10, 0, 13, 'Sim'),(1148, 1, 10, 0, 3, 'Sim'),(1149, 1, 10, 0, 4, 'Sim'),(1150, 1, 10, 0, 8, 'Sim'),(1151, 1, 10, 0, 11, 'Sim'),(1152, 1, 10, 0, 7, 'Sim'),(1153, 1, 10, 0, 9, 'Sim'),(1154, 1, 10, 0, 5, 'Não'),(1155, 1, 10, 0, 12, 'Sim'),(1156, 1, 10, 0, 10, 'Sim'),(1157, 1, 10, 0, 1, 'Sim'),(1158, 1, 10, 80, 2, 'Sim'),(1159, 1, 10, 80, 6, 'Sim'),(1160, 1, 10, 80, 13, 'Sim'),(1161, 1, 10, 80, 3, 'Sim'),(1162, 1, 10, 80, 4, 'Sim'),(1163, 1, 10, 80, 8, 'Sim'),(1164, 1, 10, 80, 11, 'Sim'),(1165, 1, 10, 80, 7, 'Sim'),(1166, 1, 10, 80, 9, 'Sim'),(1167, 1, 10, 80, 5, 'Não'),(1168, 1, 10, 80, 12, 'Sim'),(1169, 1, 10, 80, 10, 'Sim'),(1170, 1, 10, 80, 1, 'Sim'),(1171, 1, 10, 81, 2, 'Sim'),(1172, 1, 10, 81, 6, 'Sim'),(1173, 1, 10, 81, 13, 'Sim'),(1174, 1, 10, 81, 3, 'Sim'),(1175, 1, 10, 81, 4, 'Sim'),(1176, 1, 10, 81, 8, 'Sim'),(1177, 1, 10, 81, 11, 'Sim'),(1178, 1, 10, 81, 7, 'Sim'),(1179, 1, 10, 81, 9, 'Sim'),(1180, 1, 10, 81, 5, 'Não'),(1181, 1, 10, 81, 12, 'Sim'),(1182, 1, 10, 81, 10, 'Sim'),(1183, 1, 10, 81, 1, 'Sim'),(1184, 1, 10, 82, 2, 'Sim'),(1185, 1, 10, 82, 6, 'Sim'),(1186, 1, 10, 82, 13, 'Sim'),(1187, 1, 10, 82, 3, 'Sim'),(1188, 1, 10, 82, 4, 'Sim'),(1189, 1, 10, 82, 8, 'Sim'),(1190, 1, 10, 82, 11, 'Sim'),(1191, 1, 10, 82, 7, 'Sim'),(1192, 1, 10, 82, 9, 'Sim'),(1193, 1, 10, 82, 5, 'Não'),(1194, 1, 10, 82, 12, 'Sim'),(1195, 1, 10, 82, 10, 'Sim'),(1196, 1, 10, 82, 1, 'Sim'),(1197, 1, 10, 83, 2, 'Sim'),(1198, 1, 10, 83, 6, 'Sim'),(1199, 1, 10, 83, 13, 'Sim'),(1200, 1, 10, 83, 3, 'Sim'),(1201, 1, 10, 83, 4, 'Sim'),(1202, 1, 10, 83, 8, 'Sim'),(1203, 1, 10, 83, 11, 'Sim'),(1204, 1, 10, 83, 7, 'Sim'),(1205, 1, 10, 83, 9, 'Sim'),(1206, 1, 10, 83, 5, 'Não'),(1207, 1, 10, 83, 12, 'Sim'),(1208, 1, 10, 83, 10, 'Sim'),(1209, 1, 10, 83, 1, 'Sim'),(1210, 1, 10, 84, 2, 'Sim'),(1211, 1, 10, 84, 6, 'Sim'),(1212, 1, 10, 84, 13, 'Sim'),(1213, 1, 10, 84, 3, 'Sim'),(1214, 1, 10, 84, 4, 'Sim'),(1215, 1, 10, 84, 8, 'Sim'),(1216, 1, 10, 84, 11, 'Sim'),(1217, 1, 10, 84, 7, 'Sim'),(1218, 1, 10, 84, 9, 'Sim'),(1219, 1, 10, 84, 5, 'Não'),(1220, 1, 10, 84, 12, 'Sim'),(1221, 1, 10, 84, 10, 'Sim'),(1222, 1, 10, 84, 1, 'Sim'),(1223, 1, 10, 85, 2, 'Sim'),(1224, 1, 10, 85, 6, 'Sim'),(1225, 1, 10, 85, 13, 'Sim'),(1226, 1, 10, 85, 3, 'Sim'),(1227, 1, 10, 85, 4, 'Sim'),(1228, 1, 10, 85, 8, 'Sim'),(1229, 1, 10, 85, 11, 'Sim'),(1230, 1, 10, 85, 7, 'Sim'),(1231, 1, 10, 85, 9, 'Sim'),(1232, 1, 10, 85, 5, 'Não'),(1233, 1, 10, 85, 12, 'Sim'),(1234, 1, 10, 85, 10, 'Sim'),(1235, 1, 10, 85, 1, 'Sim'),(1236, 1, 10, 86, 2, 'Sim'),(1237, 1, 10, 86, 6, 'Sim'),(1238, 1, 10, 86, 13, 'Sim'),(1239, 1, 10, 86, 3, 'Sim'),(1240, 1, 10, 86, 4, 'Sim'),(1241, 1, 10, 86, 8, 'Sim'),(1242, 1, 10, 86, 11, 'Sim'),(1243, 1, 10, 86, 7, 'Sim'),(1244, 1, 10, 86, 9, 'Sim'),(1245, 1, 10, 86, 5, 'Não'),(1246, 1, 10, 86, 12, 'Sim'),(1247, 1, 10, 86, 10, 'Sim'),(1248, 1, 10, 86, 1, 'Sim'),(1249, 1, 10, 87, 2, 'Sim'),(1250, 1, 10, 87, 6, 'Sim'),(1251, 1, 10, 87, 13, 'Sim'),(1252, 1, 10, 87, 3, 'Sim'),(1253, 1, 10, 87, 4, 'Sim'),(1254, 1, 10, 87, 8, 'Sim'),(1255, 1, 10, 87, 11, 'Sim'),(1256, 1, 10, 87, 7, 'Sim'),(1257, 1, 10, 87, 9, 'Sim'),(1258, 1, 10, 87, 5, 'Não'),(1259, 1, 10, 87, 12, 'Sim'),(1260, 1, 10, 87, 10, 'Sim'),(1261, 1, 10, 87, 1, 'Sim'),(1262, 1, 10, 88, 2, 'Sim'),(1263, 1, 10, 88, 6, 'Sim'),(1264, 1, 10, 88, 13, 'Sim'),(1265, 1, 10, 88, 3, 'Sim'),(1266, 1, 10, 88, 4, 'Sim'),(1267, 1, 10, 88, 8, 'Sim'),(1268, 1, 10, 88, 11, 'Sim'),(1269, 1, 10, 88, 7, 'Sim'),(1270, 1, 10, 88, 9, 'Sim'),(1271, 1, 10, 88, 5, 'Não'),(1272, 1, 10, 88, 12, 'Sim'),(1273, 1, 10, 88, 10, 'Sim'),(1274, 1, 10, 88, 1, 'Sim'),(1275, 1, 10, 89, 2, 'Sim'),(1276, 1, 10, 89, 6, 'Sim'),(1277, 1, 10, 89, 13, 'Sim'),(1278, 1, 10, 89, 3, 'Sim'),(1279, 1, 10, 89, 4, 'Sim'),(1280, 1, 10, 89, 8, 'Sim'),(1281, 1, 10, 89, 11, 'Sim'),(1282, 1, 10, 89, 7, 'Sim'),(1283, 1, 10, 89, 9, 'Sim'),(1284, 1, 10, 89, 5, 'Não'),(1285, 1, 10, 89, 12, 'Sim'),(1286, 1, 10, 89, 10, 'Sim'),(1287, 1, 10, 89, 1, 'Sim'),(1288, 1, 10, 90, 2, 'Sim'),(1289, 1, 10, 90, 6, 'Sim'),(1290, 1, 10, 90, 13, 'Sim'),(1291, 1, 10, 90, 3, 'Sim'),(1292, 1, 10, 90, 4, 'Sim'),(1293, 1, 10, 90, 8, 'Sim'),(1294, 1, 10, 90, 11, 'Sim'),(1295, 1, 10, 90, 7, 'Sim'),(1296, 1, 10, 90, 9, 'Sim'),(1297, 1, 10, 90, 5, 'Não'),(1298, 1, 10, 90, 12, 'Sim'),(1299, 1, 10, 90, 10, 'Sim'),(1300, 1, 10, 90, 1, 'Sim'),(1301, 1, 10, 91, 2, 'Sim'),(1302, 1, 10, 91, 6, 'Sim'),(1303, 1, 10, 91, 13, 'Sim'),(1304, 1, 10, 91, 3, 'Sim'),(1305, 1, 10, 91, 4, 'Sim'),(1306, 1, 10, 91, 8, 'Sim'),(1307, 1, 10, 91, 11, 'Sim'),(1308, 1, 10, 91, 7, 'Sim'),(1309, 1, 10, 91, 9, 'Sim'),(1310, 1, 10, 91, 5, 'Não'),(1311, 1, 10, 91, 12, 'Sim'),(1312, 1, 10, 91, 10, 'Sim'),(1313, 1, 10, 91, 1, 'Sim'),(1314, 1, 10, 92, 2, 'Sim'),(1315, 1, 10, 92, 6, 'Sim'),(1316, 1, 10, 92, 13, 'Sim'),(1317, 1, 10, 92, 3, 'Sim'),(1318, 1, 10, 92, 4, 'Sim'),(1319, 1, 10, 92, 8, 'Sim'),(1320, 1, 10, 92, 11, 'Sim'),(1321, 1, 10, 92, 7, 'Sim'),(1322, 1, 10, 92, 9, 'Sim'),(1323, 1, 10, 92, 5, 'Não'),(1324, 1, 10, 92, 12, 'Sim'),(1325, 1, 10, 92, 10, 'Sim'),(1326, 1, 10, 92, 1, 'Sim'),(1327, 1, 10, 93, 2, 'Sim'),(1328, 1, 10, 93, 6, 'Sim'),(1329, 1, 10, 93, 13, 'Sim'),(1330, 1, 10, 93, 3, 'Sim'),(1331, 1, 10, 93, 4, 'Sim'),(1332, 1, 10, 93, 8, 'Sim'),(1333, 1, 10, 93, 11, 'Sim'),(1334, 1, 10, 93, 7, 'Sim'),(1335, 1, 10, 93, 9, 'Sim'),(1336, 1, 10, 93, 5, 'Não'),(1337, 1, 10, 93, 12, 'Sim'),(1338, 1, 10, 93, 10, 'Sim'),(1339, 1, 10, 93, 1, 'Sim'),(1340, 1, 10, 94, 2, 'Sim'),(1341, 1, 10, 94, 6, 'Sim'),(1342, 1, 10, 94, 13, 'Sim'),(1343, 1, 10, 94, 3, 'Sim'),(1344, 1, 10, 94, 4, 'Sim'),(1345, 1, 10, 94, 8, 'Sim'),(1346, 1, 10, 94, 11, 'Sim'),(1347, 1, 10, 94, 7, 'Sim'),(1348, 1, 10, 94, 9, 'Sim'),(1349, 1, 10, 94, 5, 'Não'),(1350, 1, 10, 94, 12, 'Sim'),(1351, 1, 10, 94, 10, 'Sim'),(1352, 1, 10, 94, 1, 'Sim'),(1353, 1, 10, 95, 2, 'Sim'),(1354, 1, 10, 95, 6, 'Sim'),(1355, 1, 10, 95, 13, 'Sim'),(1356, 1, 10, 95, 3, 'Sim'),(1357, 1, 10, 95, 4, 'Sim'),(1358, 1, 10, 95, 8, 'Sim'),(1359, 1, 10, 95, 11, 'Sim'),(1360, 1, 10, 95, 7, 'Sim'),(1361, 1, 10, 95, 9, 'Sim'),(1362, 1, 10, 95, 5, 'Não'),(1363, 1, 10, 95, 12, 'Sim'),(1364, 1, 10, 95, 10, 'Sim'),(1365, 1, 10, 95, 1, 'Sim'),(1366, 1, 10, 96, 2, 'Sim'),(1367, 1, 10, 96, 6, 'Sim'),(1368, 1, 10, 96, 13, 'Sim'),(1369, 1, 10, 96, 3, 'Sim'),(1370, 1, 10, 96, 4, 'Sim'),(1371, 1, 10, 96, 8, 'Sim'),(1372, 1, 10, 96, 11, 'Sim'),(1373, 1, 10, 96, 7, 'Sim'),(1374, 1, 10, 96, 9, 'Sim'),(1375, 1, 10, 96, 5, 'Não'),(1376, 1, 10, 96, 12, 'Sim'),(1377, 1, 10, 96, 10, 'Sim'),(1378, 1, 10, 96, 1, 'Sim'),(1379, 1, 10, 97, 2, 'Sim'),(1380, 1, 10, 97, 6, 'Sim'),(1381, 1, 10, 97, 13, 'Sim'),(1382, 1, 10, 97, 3, 'Sim'),(1383, 1, 10, 97, 4, 'Sim'),(1384, 1, 10, 97, 8, 'Sim'),(1385, 1, 10, 97, 11, 'Sim'),(1386, 1, 10, 97, 7, 'Sim'),(1387, 1, 10, 97, 9, 'Sim'),(1388, 1, 10, 97, 5, 'Não'),(1389, 1, 10, 97, 12, 'Sim'),(1390, 1, 10, 97, 10, 'Sim'),(1391, 1, 10, 97, 1, 'Sim'),(1392, 1, 10, 98, 2, 'Sim'),(1393, 1, 10, 98, 6, 'Sim'),(1394, 1, 10, 98, 13, 'Sim'),(1395, 1, 10, 98, 3, 'Sim'),(1396, 1, 10, 98, 4, 'Sim'),(1397, 1, 10, 98, 8, 'Sim'),(1398, 1, 10, 98, 11, 'Sim'),(1399, 1, 10, 98, 7, 'Sim'),(1400, 1, 10, 98, 9, 'Sim'),(1401, 1, 10, 98, 5, 'Não'),(1402, 1, 10, 98, 12, 'Sim'),(1403, 1, 10, 98, 10, 'Sim'),(1404, 1, 10, 98, 1, 'Sim'),(1405, 1, 10, 99, 2, 'Sim'),(1406, 1, 10, 99, 6, 'Sim'),(1407, 1, 10, 99, 13, 'Sim'),(1408, 1, 10, 99, 3, 'Sim'),(1409, 1, 10, 99, 4, 'Sim'),(1410, 1, 10, 99, 8, 'Sim'),(1411, 1, 10, 99, 11, 'Sim'),(1412, 1, 10, 99, 7, 'Sim'),(1413, 1, 10, 99, 9, 'Sim'),(1414, 1, 10, 99, 5, 'Não'),(1415, 1, 10, 99, 12, 'Sim'),(1416, 1, 10, 99, 10, 'Sim'),(1417, 1, 10, 99, 1, 'Sim'),(1418, 1, 10, 100, 2, 'Sim'),(1419, 1, 10, 100, 6, 'Sim'),(1420, 1, 10, 100, 13, 'Sim'),(1421, 1, 10, 100, 3, 'Sim'),(1422, 1, 10, 100, 4, 'Sim'),(1423, 1, 10, 100, 8, 'Sim'),(1424, 1, 10, 100, 11, 'Sim'),(1425, 1, 10, 100, 7, 'Sim'),(1426, 1, 10, 100, 9, 'Sim'),(1427, 1, 10, 100, 5, 'Não'),(1428, 1, 10, 100, 12, 'Sim'),(1429, 1, 10, 100, 10, 'Sim'),(1430, 1, 10, 100, 1, 'Sim'),(1431, 1, 10, 101, 2, 'Sim'),(1432, 1, 10, 101, 6, 'Sim'),(1433, 1, 10, 101, 13, 'Sim'),(1434, 1, 10, 101, 3, 'Sim'),(1435, 1, 10, 101, 4, 'Sim'),(1436, 1, 10, 101, 8, 'Sim'),(1437, 1, 10, 101, 11, 'Sim'),(1438, 1, 10, 101, 7, 'Sim'),(1439, 1, 10, 101, 9, 'Sim'),(1440, 1, 10, 101, 5, 'Não'),(1441, 1, 10, 101, 12, 'Sim'),(1442, 1, 10, 101, 10, 'Sim'),(1443, 1, 10, 101, 1, 'Sim'),(1444, 1, 10, 102, 2, 'Sim'),(1445, 1, 10, 102, 6, 'Sim'),(1446, 1, 10, 102, 13, 'Sim'),(1447, 1, 10, 102, 3, 'Sim'),(1448, 1, 10, 102, 4, 'Sim'),(1449, 1, 10, 102, 8, 'Sim'),(1450, 1, 10, 102, 11, 'Sim'),(1451, 1, 10, 102, 7, 'Sim'),(1452, 1, 10, 102, 9, 'Sim'),(1453, 1, 10, 102, 5, 'Não'),(1454, 1, 10, 102, 12, 'Sim'),(1455, 1, 10, 102, 10, 'Sim'),(1456, 1, 10, 102, 1, 'Sim'),(1457, 1, 10, 103, 2, 'Sim'),(1458, 1, 10, 103, 6, 'Sim'),(1459, 1, 10, 103, 13, 'Sim'),(1460, 1, 10, 103, 3, 'Sim'),(1461, 1, 10, 103, 4, 'Sim'),(1462, 1, 10, 103, 8, 'Sim'),(1463, 1, 10, 103, 11, 'Sim'),(1464, 1, 10, 103, 7, 'Sim'),(1465, 1, 10, 103, 9, 'Sim'),(1466, 1, 10, 103, 5, 'Não'),(1467, 1, 10, 103, 12, 'Sim'),(1468, 1, 10, 103, 10, 'Sim'),(1469, 1, 10, 103, 1, 'Sim'),(1470, 1, 10, 104, 2, 'Sim'),(1471, 1, 10, 104, 6, 'Sim'),(1472, 1, 10, 104, 13, 'Sim'),(1473, 1, 10, 104, 3, 'Sim'),(1474, 1, 10, 104, 4, 'Sim'),(1475, 1, 10, 104, 8, 'Sim'),(1476, 1, 10, 104, 11, 'Sim'),(1477, 1, 10, 104, 7, 'Sim'),(1478, 1, 10, 104, 9, 'Sim'),(1479, 1, 10, 104, 5, 'Não'),(1480, 1, 10, 104, 12, 'Sim'),(1481, 1, 10, 104, 10, 'Sim'),(1482, 1, 10, 104, 1, 'Sim'),(1483, 1, 10, 105, 2, 'Sim'),(1484, 1, 10, 105, 6, 'Sim'),(1485, 1, 10, 105, 13, 'Sim'),(1486, 1, 10, 105, 3, 'Sim'),(1487, 1, 10, 105, 4, 'Sim'),(1488, 1, 10, 105, 8, 'Sim'),(1489, 1, 10, 105, 11, 'Sim'),(1490, 1, 10, 105, 7, 'Sim'),(1491, 1, 10, 105, 9, 'Sim'),(1492, 1, 10, 105, 5, 'Não'),(1493, 1, 10, 105, 12, 'Sim'),(1494, 1, 10, 105, 10, 'Sim'),(1495, 1, 10, 105, 1, 'Sim'),(1496, 1, 10, 106, 2, 'Sim'),(1497, 1, 10, 106, 6, 'Sim'),(1498, 1, 10, 106, 13, 'Sim'),(1499, 1, 10, 106, 3, 'Sim'),(1500, 1, 10, 106, 4, 'Sim'),(1501, 1, 10, 106, 8, 'Sim'),(1502, 1, 10, 106, 11, 'Sim'),(1503, 1, 10, 106, 7, 'Sim'),(1504, 1, 10, 106, 9, 'Sim'),(1505, 1, 10, 106, 5, 'Não'),(1506, 1, 10, 106, 12, 'Sim'),(1507, 1, 10, 106, 10, 'Sim'),(1508, 1, 10, 106, 1, 'Sim'),(1509, 1, 10, 107, 2, 'Sim'),(1510, 1, 10, 107, 6, 'Sim'),(1511, 1, 10, 107, 13, 'Sim'),(1512, 1, 10, 107, 3, 'Sim'),(1513, 1, 10, 107, 4, 'Sim'),(1514, 1, 10, 107, 8, 'Sim'),(1515, 1, 10, 107, 11, 'Sim'),(1516, 1, 10, 107, 7, 'Sim'),(1517, 1, 10, 107, 9, 'Sim'),(1518, 1, 10, 107, 5, 'Não'),(1519, 1, 10, 107, 12, 'Sim'),(1520, 1, 10, 107, 10, 'Sim'),(1521, 1, 10, 107, 1, 'Sim'),(1522, 1, 10, 108, 2, 'Sim'),(1523, 1, 10, 108, 6, 'Sim'),(1524, 1, 10, 108, 13, 'Sim'),(1525, 1, 10, 108, 3, 'Sim'),(1526, 1, 10, 108, 4, 'Sim'),(1527, 1, 10, 108, 8, 'Sim'),(1528, 1, 10, 108, 11, 'Sim'),(1529, 1, 10, 108, 7, 'Sim'),(1530, 1, 10, 108, 9, 'Sim'),(1531, 1, 10, 108, 5, 'Não'),(1532, 1, 10, 108, 12, 'Sim'),(1533, 1, 10, 108, 10, 'Sim'),(1534, 1, 10, 108, 1, 'Sim'),(1535, 1, 10, 109, 2, 'Sim'),(1536, 1, 10, 109, 6, 'Sim'),(1537, 1, 10, 109, 13, 'Sim'),(1538, 1, 10, 109, 3, 'Sim'),(1539, 1, 10, 109, 4, 'Sim'),(1540, 1, 10, 109, 8, 'Sim'),(1541, 1, 10, 109, 11, 'Sim'),(1542, 1, 10, 109, 7, 'Sim'),(1543, 1, 10, 109, 9, 'Sim'),(1544, 1, 10, 109, 5, 'Não'),(1545, 1, 10, 109, 12, 'Sim'),(1546, 1, 10, 109, 10, 'Sim'),(1547, 1, 10, 109, 1, 'Sim'),(1548, 1, 10, 110, 2, 'Sim'),(1549, 1, 10, 110, 6, 'Sim'),(1550, 1, 10, 110, 13, 'Sim'),(1551, 1, 10, 110, 3, 'Sim'),(1552, 1, 10, 110, 4, 'Sim'),(1553, 1, 10, 110, 8, 'Sim'),(1554, 1, 10, 110, 11, 'Sim'),(1555, 1, 10, 110, 7, 'Sim'),(1556, 1, 10, 110, 9, 'Sim'),(1557, 1, 10, 110, 5, 'Não'),(1558, 1, 10, 110, 12, 'Sim'),(1559, 1, 10, 110, 10, 'Sim'),(1560, 1, 10, 110, 1, 'Sim'),(1561, 1, 11, 0, 2, 'Sim'),(1562, 1, 11, 0, 6, 'Sim'),(1563, 1, 11, 0, 13, 'Sim'),(1564, 1, 11, 0, 3, 'Sim'),(1565, 1, 11, 0, 4, 'Sim'),(1566, 1, 11, 0, 8, 'Sim'),(1567, 1, 11, 0, 11, 'Sim'),(1568, 1, 11, 0, 7, 'Sim'),(1569, 1, 11, 0, 9, 'Sim'),(1570, 1, 11, 0, 5, 'Não'),(1571, 1, 11, 0, 12, 'Sim'),(1572, 1, 11, 0, 10, 'Sim'),(1573, 1, 11, 0, 1, 'Sim'),(1574, 1, 11, 111, 2, 'Sim'),(1575, 1, 11, 111, 6, 'Sim'),(1576, 1, 11, 111, 13, 'Sim'),(1577, 1, 11, 111, 3, 'Sim'),(1578, 1, 11, 111, 4, 'Sim'),(1579, 1, 11, 111, 8, 'Sim'),(1580, 1, 11, 111, 11, 'Sim'),(1581, 1, 11, 111, 7, 'Sim'),(1582, 1, 11, 111, 9, 'Sim'),(1583, 1, 11, 111, 5, 'Não'),(1584, 1, 11, 111, 12, 'Sim'),(1585, 1, 11, 111, 10, 'Sim'),(1586, 1, 11, 111, 1, 'Sim'),(1587, 1, 11, 112, 2, 'Sim'),(1588, 1, 11, 112, 6, 'Sim'),(1589, 1, 11, 112, 13, 'Sim'),(1590, 1, 11, 112, 3, 'Sim'),(1591, 1, 11, 112, 4, 'Sim'),(1592, 1, 11, 112, 8, 'Sim'),(1593, 1, 11, 112, 11, 'Sim'),(1594, 1, 11, 112, 7, 'Sim'),(1595, 1, 11, 112, 9, 'Sim'),(1596, 1, 11, 112, 5, 'Não'),(1597, 1, 11, 112, 12, 'Sim'),(1598, 1, 11, 112, 10, 'Sim'),(1599, 1, 11, 112, 1, 'Sim'),(1600, 1, 11, 113, 2, 'Sim'),(1601, 1, 11, 113, 6, 'Sim'),(1602, 1, 11, 113, 13, 'Sim'),(1603, 1, 11, 113, 3, 'Sim'),(1604, 1, 11, 113, 4, 'Sim'),(1605, 1, 11, 113, 8, 'Sim'),(1606, 1, 11, 113, 11, 'Sim'),(1607, 1, 11, 113, 7, 'Sim'),(1608, 1, 11, 113, 9, 'Sim'),(1609, 1, 11, 113, 5, 'Não'),(1610, 1, 11, 113, 12, 'Sim'),(1611, 1, 11, 113, 10, 'Sim'),(1612, 1, 11, 113, 1, 'Sim'),(1613, 1, 11, 114, 2, 'Sim'),(1614, 1, 11, 114, 6, 'Sim'),(1615, 1, 11, 114, 13, 'Sim'),(1616, 1, 11, 114, 3, 'Sim'),(1617, 1, 11, 114, 4, 'Sim'),(1618, 1, 11, 114, 8, 'Sim'),(1619, 1, 11, 114, 11, 'Sim'),(1620, 1, 11, 114, 7, 'Sim'),(1621, 1, 11, 114, 9, 'Sim'),(1622, 1, 11, 114, 5, 'Não'),(1623, 1, 11, 114, 12, 'Sim'),(1624, 1, 11, 114, 10, 'Sim'),(1625, 1, 11, 114, 1, 'Sim'),(1626, 1, 11, 115, 2, 'Sim'),(1627, 1, 11, 115, 6, 'Sim'),(1628, 1, 11, 115, 13, 'Sim'),(1629, 1, 11, 115, 3, 'Sim'),(1630, 1, 11, 115, 4, 'Sim'),(1631, 1, 11, 115, 8, 'Sim'),(1632, 1, 11, 115, 11, 'Sim'),(1633, 1, 11, 115, 7, 'Sim'),(1634, 1, 11, 115, 9, 'Sim'),(1635, 1, 11, 115, 5, 'Não'),(1636, 1, 11, 115, 12, 'Sim'),(1637, 1, 11, 115, 10, 'Sim'),(1638, 1, 11, 115, 1, 'Sim'),(1639, 1, 11, 116, 2, 'Sim'),(1640, 1, 11, 116, 6, 'Sim'),(1641, 1, 11, 116, 13, 'Sim'),(1642, 1, 11, 116, 3, 'Sim'),(1643, 1, 11, 116, 4, 'Sim'),(1644, 1, 11, 116, 8, 'Sim'),(1645, 1, 11, 116, 11, 'Sim'),(1646, 1, 11, 116, 7, 'Sim'),(1647, 1, 11, 116, 9, 'Sim'),(1648, 1, 11, 116, 5, 'Não'),(1649, 1, 11, 116, 12, 'Sim'),(1650, 1, 11, 116, 10, 'Sim'),(1651, 1, 11, 116, 1, 'Sim'),(1652, 1, 11, 117, 2, 'Sim'),(1653, 1, 11, 117, 6, 'Sim'),(1654, 1, 11, 117, 13, 'Sim'),(1655, 1, 11, 117, 3, 'Sim'),(1656, 1, 11, 117, 4, 'Sim'),(1657, 1, 11, 117, 8, 'Sim'),(1658, 1, 11, 117, 11, 'Sim'),(1659, 1, 11, 117, 7, 'Sim'),(1660, 1, 11, 117, 9, 'Sim'),(1661, 1, 11, 117, 5, 'Não'),(1662, 1, 11, 117, 12, 'Sim'),(1663, 1, 11, 117, 10, 'Sim'),(1664, 1, 11, 117, 1, 'Sim'),(1665, 1, 11, 118, 2, 'Sim'),(1666, 1, 11, 118, 6, 'Sim'),(1667, 1, 11, 118, 13, 'Sim'),(1668, 1, 11, 118, 3, 'Sim'),(1669, 1, 11, 118, 4, 'Sim'),(1670, 1, 11, 118, 8, 'Sim'),(1671, 1, 11, 118, 11, 'Sim'),(1672, 1, 11, 118, 7, 'Sim'),(1673, 1, 11, 118, 9, 'Sim'),(1674, 1, 11, 118, 5, 'Não'),(1675, 1, 11, 118, 12, 'Sim'),(1676, 1, 11, 118, 10, 'Sim'),(1677, 1, 11, 118, 1, 'Sim'),(1678, 1, 11, 119, 2, 'Sim'),(1679, 1, 11, 119, 6, 'Sim'),(1680, 1, 11, 119, 13, 'Sim'),(1681, 1, 11, 119, 3, 'Sim'),(1682, 1, 11, 119, 4, 'Sim'),(1683, 1, 11, 119, 8, 'Sim'),(1684, 1, 11, 119, 11, 'Sim'),(1685, 1, 11, 119, 7, 'Sim'),(1686, 1, 11, 119, 9, 'Sim'),(1687, 1, 11, 119, 5, 'Não'),(1688, 1, 11, 119, 12, 'Sim'),(1689, 1, 11, 119, 10, 'Sim'),(1690, 1, 11, 119, 1, 'Sim'),(1691, 1, 11, 120, 2, 'Sim'),(1692, 1, 11, 120, 6, 'Sim'),(1693, 1, 11, 120, 13, 'Sim'),(1694, 1, 11, 120, 3, 'Sim'),(1695, 1, 11, 120, 4, 'Sim'),(1696, 1, 11, 120, 8, 'Sim'),(1697, 1, 11, 120, 11, 'Sim'),(1698, 1, 11, 120, 7, 'Sim'),(1699, 1, 11, 120, 9, 'Sim'),(1700, 1, 11, 120, 5, 'Não'),(1701, 1, 11, 120, 12, 'Sim'),(1702, 1, 11, 120, 10, 'Sim'),(1703, 1, 11, 120, 1, 'Sim'),(1704, 1, 11, 121, 2, 'Sim'),(1705, 1, 11, 121, 6, 'Sim'),(1706, 1, 11, 121, 13, 'Sim'),(1707, 1, 11, 121, 3, 'Sim'),(1708, 1, 11, 121, 4, 'Sim'),(1709, 1, 11, 121, 8, 'Sim'),(1710, 1, 11, 121, 11, 'Sim'),(1711, 1, 11, 121, 7, 'Sim'),(1712, 1, 11, 121, 9, 'Sim'),(1713, 1, 11, 121, 5, 'Não'),(1714, 1, 11, 121, 12, 'Sim'),(1715, 1, 11, 121, 10, 'Sim'),(1716, 1, 11, 121, 1, 'Sim'),(1717, 1, 12, 0, 2, 'Sim'),(1718, 1, 12, 0, 6, 'Sim'),(1719, 1, 12, 0, 13, 'Sim'),(1720, 1, 12, 0, 3, 'Sim'),(1721, 1, 12, 0, 4, 'Sim'),(1722, 1, 12, 0, 8, 'Sim'),(1723, 1, 12, 0, 11, 'Sim'),(1724, 1, 12, 0, 7, 'Sim'),(1725, 1, 12, 0, 9, 'Sim'),(1726, 1, 12, 0, 5, 'Não'),(1727, 1, 12, 0, 12, 'Sim'),(1728, 1, 12, 0, 10, 'Sim'),(1729, 1, 12, 0, 1, 'Sim'),(1730, 1, 12, 122, 2, 'Sim'),(1731, 1, 12, 122, 6, 'Sim'),(1732, 1, 12, 122, 13, 'Sim'),(1733, 1, 12, 122, 3, 'Sim'),(1734, 1, 12, 122, 4, 'Sim'),(1735, 1, 12, 122, 8, 'Sim'),(1736, 1, 12, 122, 11, 'Sim'),(1737, 1, 12, 122, 7, 'Sim'),(1738, 1, 12, 122, 9, 'Sim'),(1739, 1, 12, 122, 5, 'Não'),(1740, 1, 12, 122, 12, 'Sim'),(1741, 1, 12, 122, 10, 'Sim'),(1742, 1, 12, 122, 1, 'Sim'),(1743, 1, 12, 123, 2, 'Sim'),(1744, 1, 12, 123, 6, 'Sim'),(1745, 1, 12, 123, 13, 'Sim'),(1746, 1, 12, 123, 3, 'Sim'),(1747, 1, 12, 123, 4, 'Sim'),(1748, 1, 12, 123, 8, 'Sim'),(1749, 1, 12, 123, 11, 'Sim'),(1750, 1, 12, 123, 7, 'Sim'),(1751, 1, 12, 123, 9, 'Sim'),(1752, 1, 12, 123, 5, 'Não'),(1753, 1, 12, 123, 12, 'Sim'),(1754, 1, 12, 123, 10, 'Sim'),(1755, 1, 12, 123, 1, 'Sim'),(1756, 1, 12, 124, 2, 'Sim'),(1757, 1, 12, 124, 6, 'Sim'),(1758, 1, 12, 124, 13, 'Sim'),(1759, 1, 12, 124, 3, 'Sim'),(1760, 1, 12, 124, 4, 'Sim'),(1761, 1, 12, 124, 8, 'Sim'),(1762, 1, 12, 124, 11, 'Sim'),(1763, 1, 12, 124, 7, 'Sim'),(1764, 1, 12, 124, 9, 'Sim'),(1765, 1, 12, 124, 5, 'Não'),(1766, 1, 12, 124, 12, 'Sim'),(1767, 1, 12, 124, 10, 'Sim'),(1768, 1, 12, 124, 1, 'Sim'),(1769, 1, 12, 125, 2, 'Sim'),(1770, 1, 12, 125, 6, 'Sim'),(1771, 1, 12, 125, 13, 'Sim'),(1772, 1, 12, 125, 3, 'Sim'),(1773, 1, 12, 125, 4, 'Sim'),(1774, 1, 12, 125, 8, 'Sim'),(1775, 1, 12, 125, 11, 'Sim'),(1776, 1, 12, 125, 7, 'Sim'),(1777, 1, 12, 125, 9, 'Sim'),(1778, 1, 12, 125, 5, 'Não'),(1779, 1, 12, 125, 12, 'Sim'),(1780, 1, 12, 125, 10, 'Sim'),(1781, 1, 12, 125, 1, 'Sim'),(1782, 1, 12, 126, 2, 'Sim'),(1783, 1, 12, 126, 6, 'Sim'),(1784, 1, 12, 126, 13, 'Sim'),(1785, 1, 12, 126, 3, 'Sim'),(1786, 1, 12, 126, 4, 'Sim'),(1787, 1, 12, 126, 8, 'Sim'),(1788, 1, 12, 126, 11, 'Sim'),(1789, 1, 12, 126, 7, 'Sim'),(1790, 1, 12, 126, 9, 'Sim'),(1791, 1, 12, 126, 5, 'Não'),(1792, 1, 12, 126, 12, 'Sim'),(1793, 1, 12, 126, 10, 'Sim'),(1794, 1, 12, 126, 1, 'Sim'),(1795, 1, 12, 127, 2, 'Sim'),(1796, 1, 12, 127, 6, 'Sim'),(1797, 1, 12, 127, 13, 'Sim'),(1798, 1, 12, 127, 3, 'Sim'),(1799, 1, 12, 127, 4, 'Sim'),(1800, 1, 12, 127, 8, 'Sim'),(1801, 1, 12, 127, 11, 'Sim'),(1802, 1, 12, 127, 7, 'Sim'),(1803, 1, 12, 127, 9, 'Sim'),(1804, 1, 12, 127, 5, 'Não'),(1805, 1, 12, 127, 12, 'Sim'),(1806, 1, 12, 127, 10, 'Sim'),(1807, 1, 12, 127, 1, 'Sim'),(1808, 1, 12, 128, 2, 'Sim'),(1809, 1, 12, 128, 6, 'Sim'),(1810, 1, 12, 128, 13, 'Sim'),(1811, 1, 12, 128, 3, 'Sim'),(1812, 1, 12, 128, 4, 'Sim'),(1813, 1, 12, 128, 8, 'Sim'),(1814, 1, 12, 128, 11, 'Sim'),(1815, 1, 12, 128, 7, 'Sim'),(1816, 1, 12, 128, 9, 'Sim'),(1817, 1, 12, 128, 5, 'Não'),(1818, 1, 12, 128, 12, 'Sim'),(1819, 1, 12, 128, 10, 'Sim'),(1820, 1, 12, 128, 1, 'Sim'),(1821, 1, 13, 0, 2, 'Sim'),(1822, 1, 13, 0, 6, 'Sim'),(1823, 1, 13, 0, 13, 'Sim'),(1824, 1, 13, 0, 3, 'Sim'),(1825, 1, 13, 0, 4, 'Sim'),(1826, 1, 13, 0, 8, 'Sim'),(1827, 1, 13, 0, 11, 'Sim'),(1828, 1, 13, 0, 7, 'Sim'),(1829, 1, 13, 0, 9, 'Sim'),(1830, 1, 13, 0, 5, 'Não'),(1831, 1, 13, 0, 12, 'Sim'),(1832, 1, 13, 0, 10, 'Sim'),(1833, 1, 13, 0, 1, 'Sim'),(1834, 1, 13, 129, 2, 'Sim'),(1835, 1, 13, 129, 6, 'Sim'),(1836, 1, 13, 129, 13, 'Sim'),(1837, 1, 13, 129, 3, 'Sim'),(1838, 1, 13, 129, 4, 'Sim'),(1839, 1, 13, 129, 8, 'Sim'),(1840, 1, 13, 129, 11, 'Sim'),(1841, 1, 13, 129, 7, 'Sim'),(1842, 1, 13, 129, 9, 'Sim'),(1843, 1, 13, 129, 5, 'Não'),(1844, 1, 13, 129, 12, 'Sim'),(1845, 1, 13, 129, 10, 'Sim'),(1846, 1, 13, 129, 1, 'Sim'),(1847, 1, 13, 130, 2, 'Sim'),(1848, 1, 13, 130, 6, 'Sim'),(1849, 1, 13, 130, 13, 'Sim'),(1850, 1, 13, 130, 3, 'Sim'),(1851, 1, 13, 130, 4, 'Sim'),(1852, 1, 13, 130, 8, 'Sim'),(1853, 1, 13, 130, 11, 'Sim'),(1854, 1, 13, 130, 7, 'Sim'),(1855, 1, 13, 130, 9, 'Sim'),(1856, 1, 13, 130, 5, 'Não'),(1857, 1, 13, 130, 12, 'Sim'),(1858, 1, 13, 130, 10, 'Sim'),(1859, 1, 13, 130, 1, 'Sim'),(1860, 1, 13, 131, 2, 'Sim'),(1861, 1, 13, 131, 6, 'Sim'),(1862, 1, 13, 131, 13, 'Sim'),(1863, 1, 13, 131, 3, 'Sim'),(1864, 1, 13, 131, 4, 'Sim'),(1865, 1, 13, 131, 8, 'Sim'),(1866, 1, 13, 131, 11, 'Sim'),(1867, 1, 13, 131, 7, 'Sim'),(1868, 1, 13, 131, 9, 'Sim'),(1869, 1, 13, 131, 5, 'Não'),(1870, 1, 13, 131, 12, 'Sim'),(1871, 1, 13, 131, 10, 'Sim'),(1872, 1, 13, 131, 1, 'Sim'),(1873, 1, 13, 132, 2, 'Sim'),(1874, 1, 13, 132, 6, 'Sim'),(1875, 1, 13, 132, 13, 'Sim'),(1876, 1, 13, 132, 3, 'Sim'),(1877, 1, 13, 132, 4, 'Sim'),(1878, 1, 13, 132, 8, 'Sim'),(1879, 1, 13, 132, 11, 'Sim'),(1880, 1, 13, 132, 7, 'Sim'),(1881, 1, 13, 132, 9, 'Sim'),(1882, 1, 13, 132, 5, 'Não'),(1883, 1, 13, 132, 12, 'Sim'),(1884, 1, 13, 132, 10, 'Sim'),(1885, 1, 13, 132, 1, 'Sim'),(1886, 1, 13, 133, 2, 'Sim'),(1887, 1, 13, 133, 6, 'Sim'),(1888, 1, 13, 133, 13, 'Sim'),(1889, 1, 13, 133, 3, 'Sim'),(1890, 1, 13, 133, 4, 'Sim'),(1891, 1, 13, 133, 8, 'Sim'),(1892, 1, 13, 133, 11, 'Sim'),(1893, 1, 13, 133, 7, 'Sim'),(1894, 1, 13, 133, 9, 'Sim'),(1895, 1, 13, 133, 5, 'Não'),(1896, 1, 13, 133, 12, 'Sim'),(1897, 1, 13, 133, 10, 'Sim'),(1898, 1, 13, 133, 1, 'Sim'),(1899, 1, 13, 134, 2, 'Sim'),(1900, 1, 13, 134, 6, 'Sim'),(1901, 1, 13, 134, 13, 'Sim'),(1902, 1, 13, 134, 3, 'Sim'),(1903, 1, 13, 134, 4, 'Sim'),(1904, 1, 13, 134, 8, 'Sim'),(1905, 1, 13, 134, 11, 'Sim'),(1906, 1, 13, 134, 7, 'Sim'),(1907, 1, 13, 134, 9, 'Sim'),(1908, 1, 13, 134, 5, 'Não'),(1909, 1, 13, 134, 12, 'Sim'),(1910, 1, 13, 134, 10, 'Sim'),(1911, 1, 13, 134, 1, 'Sim'),(1912, 1, 13, 135, 2, 'Sim'),(1913, 1, 13, 135, 6, 'Sim'),(1914, 1, 13, 135, 13, 'Sim'),(1915, 1, 13, 135, 3, 'Sim'),(1916, 1, 13, 135, 4, 'Sim'),(1917, 1, 13, 135, 8, 'Sim'),(1918, 1, 13, 135, 11, 'Sim'),(1919, 1, 13, 135, 7, 'Sim'),(1920, 1, 13, 135, 9, 'Sim'),(1921, 1, 13, 135, 5, 'Não'),(1922, 1, 13, 135, 12, 'Sim'),(1923, 1, 13, 135, 10, 'Sim'),(1924, 1, 13, 135, 1, 'Sim'),(1925, 1, 13, 136, 2, 'Sim'),(1926, 1, 13, 136, 6, 'Sim'),(1927, 1, 13, 136, 13, 'Sim'),(1928, 1, 13, 136, 3, 'Sim'),(1929, 1, 13, 136, 4, 'Sim'),(1930, 1, 13, 136, 8, 'Sim'),(1931, 1, 13, 136, 11, 'Sim'),(1932, 1, 13, 136, 7, 'Sim'),(1933, 1, 13, 136, 9, 'Sim'),(1934, 1, 13, 136, 5, 'Não'),(1935, 1, 13, 136, 12, 'Sim'),(1936, 1, 13, 136, 10, 'Sim'),(1937, 1, 13, 136, 1, 'Sim'),(1938, 1, 13, 137, 2, 'Sim'),(1939, 1, 13, 137, 6, 'Sim'),(1940, 1, 13, 137, 13, 'Sim'),(1941, 1, 13, 137, 3, 'Sim'),(1942, 1, 13, 137, 4, 'Sim'),(1943, 1, 13, 137, 8, 'Sim'),(1944, 1, 13, 137, 11, 'Sim'),(1945, 1, 13, 137, 7, 'Sim'),(1946, 1, 13, 137, 9, 'Sim'),(1947, 1, 13, 137, 5, 'Não'),(1948, 1, 13, 137, 12, 'Sim'),(1949, 1, 13, 137, 10, 'Sim'),(1950, 1, 13, 137, 1, 'Sim'),(1951, 1, 13, 138, 2, 'Sim'),(1952, 1, 13, 138, 6, 'Sim'),(1953, 1, 13, 138, 13, 'Sim'),(1954, 1, 13, 138, 3, 'Sim'),(1955, 1, 13, 138, 4, 'Sim'),(1956, 1, 13, 138, 8, 'Sim'),(1957, 1, 13, 138, 11, 'Sim'),(1958, 1, 13, 138, 7, 'Sim'),(1959, 1, 13, 138, 9, 'Sim'),(1960, 1, 13, 138, 5, 'Não'),(1961, 1, 13, 138, 12, 'Sim'),(1962, 1, 13, 138, 10, 'Sim'),(1963, 1, 13, 138, 1, 'Sim'),(1964, 1, 14, 0, 2, 'Sim'),(1965, 1, 14, 0, 6, 'Sim'),(1966, 1, 14, 0, 13, 'Sim'),(1967, 1, 14, 0, 3, 'Sim'),(1968, 1, 14, 0, 4, 'Sim'),(1969, 1, 14, 0, 8, 'Sim'),(1970, 1, 14, 0, 11, 'Sim'),(1971, 1, 14, 0, 7, 'Sim'),(1972, 1, 14, 0, 9, 'Sim'),(1973, 1, 14, 0, 5, 'Não'),(1974, 1, 14, 0, 12, 'Sim'),(1975, 1, 14, 0, 10, 'Sim'),(1976, 1, 14, 0, 1, 'Sim'),(1977, 1, 14, 139, 2, 'Sim'),(1978, 1, 14, 139, 6, 'Sim'),(1979, 1, 14, 139, 13, 'Sim'),(1980, 1, 14, 139, 3, 'Sim'),(1981, 1, 14, 139, 4, 'Sim'),(1982, 1, 14, 139, 8, 'Sim'),(1983, 1, 14, 139, 11, 'Sim'),(1984, 1, 14, 139, 7, 'Sim'),(1985, 1, 14, 139, 9, 'Sim'),(1986, 1, 14, 139, 5, 'Não'),(1987, 1, 14, 139, 12, 'Sim'),(1988, 1, 14, 139, 10, 'Sim'),(1989, 1, 14, 139, 1, 'Sim'),(1990, 1, 14, 140, 2, 'Sim'),(1991, 1, 14, 140, 6, 'Sim'),(1992, 1, 14, 140, 13, 'Sim'),(1993, 1, 14, 140, 3, 'Sim'),(1994, 1, 14, 140, 4, 'Sim'),(1995, 1, 14, 140, 8, 'Sim'),(1996, 1, 14, 140, 11, 'Sim'),(1997, 1, 14, 140, 7, 'Sim'),(1998, 1, 14, 140, 9, 'Sim'),(1999, 1, 14, 140, 5, 'Não'),(2000, 1, 14, 140, 12, 'Sim'),(2001, 1, 14, 140, 10, 'Sim'),(2002, 1, 14, 140, 1, 'Sim'),(2003, 1, 14, 141, 2, 'Sim'),(2004, 1, 14, 141, 6, 'Sim'),(2005, 1, 14, 141, 13, 'Sim'),(2006, 1, 14, 141, 3, 'Sim'),(2007, 1, 14, 141, 4, 'Sim'),(2008, 1, 14, 141, 8, 'Sim'),(2009, 1, 14, 141, 11, 'Sim'),(2010, 1, 14, 141, 7, 'Sim'),(2011, 1, 14, 141, 9, 'Sim'),(2012, 1, 14, 141, 5, 'Não'),(2013, 1, 14, 141, 12, 'Sim'),(2014, 1, 14, 141, 10, 'Sim'),(2015, 1, 14, 141, 1, 'Sim'),(2016, 1, 14, 142, 2, 'Sim'),(2017, 1, 14, 142, 6, 'Sim'),(2018, 1, 14, 142, 13, 'Sim'),(2019, 1, 14, 142, 3, 'Sim'),(2020, 1, 14, 142, 4, 'Sim'),(2021, 1, 14, 142, 8, 'Sim'),(2022, 1, 14, 142, 11, 'Sim'),(2023, 1, 14, 142, 7, 'Sim'),(2024, 1, 14, 142, 9, 'Sim'),(2025, 1, 14, 142, 5, 'Não'),(2026, 1, 14, 142, 12, 'Sim'),(2027, 1, 14, 142, 10, 'Sim'),(2028, 1, 14, 142, 1, 'Sim'),(2029, 1, 14, 143, 2, 'Sim'),(2030, 1, 14, 143, 6, 'Sim'),(2031, 1, 14, 143, 13, 'Sim'),(2032, 1, 14, 143, 3, 'Sim'),(2033, 1, 14, 143, 4, 'Sim'),(2034, 1, 14, 143, 8, 'Sim'),(2035, 1, 14, 143, 11, 'Sim'),(2036, 1, 14, 143, 7, 'Sim'),(2037, 1, 14, 143, 9, 'Sim'),(2038, 1, 14, 143, 5, 'Não'),(2039, 1, 14, 143, 12, 'Sim'),(2040, 1, 14, 143, 10, 'Sim'),(2041, 1, 14, 143, 1, 'Sim'),(2042, 1, 14, 144, 2, 'Sim'),(2043, 1, 14, 144, 6, 'Sim'),(2044, 1, 14, 144, 13, 'Sim'),(2045, 1, 14, 144, 3, 'Sim'),(2046, 1, 14, 144, 4, 'Sim'),(2047, 1, 14, 144, 8, 'Sim'),(2048, 1, 14, 144, 11, 'Sim'),(2049, 1, 14, 144, 7, 'Sim'),(2050, 1, 14, 144, 9, 'Sim'),(2051, 1, 14, 144, 5, 'Não'),(2052, 1, 14, 144, 12, 'Sim'),(2053, 1, 14, 144, 10, 'Sim'),(2054, 1, 14, 144, 1, 'Sim'),(2055, 1, 14, 145, 2, 'Sim'),(2056, 1, 14, 145, 6, 'Sim'),(2057, 1, 14, 145, 13, 'Sim'),(2058, 1, 14, 145, 3, 'Sim'),(2059, 1, 14, 145, 4, 'Sim'),(2060, 1, 14, 145, 8, 'Sim'),(2061, 1, 14, 145, 11, 'Sim'),(2062, 1, 14, 145, 7, 'Sim'),(2063, 1, 14, 145, 9, 'Sim'),(2064, 1, 14, 145, 5, 'Não'),(2065, 1, 14, 145, 12, 'Sim'),(2066, 1, 14, 145, 10, 'Sim'),(2067, 1, 14, 145, 1, 'Sim'),(2068, 1, 14, 146, 2, 'Sim'),(2069, 1, 14, 146, 6, 'Sim'),(2070, 1, 14, 146, 13, 'Sim'),(2071, 1, 14, 146, 3, 'Sim'),(2072, 1, 14, 146, 4, 'Sim'),(2073, 1, 14, 146, 8, 'Sim'),(2074, 1, 14, 146, 11, 'Sim'),(2075, 1, 14, 146, 7, 'Sim'),(2076, 1, 14, 146, 9, 'Sim'),(2077, 1, 14, 146, 5, 'Não'),(2078, 1, 14, 146, 12, 'Sim'),(2079, 1, 14, 146, 10, 'Sim'),(2080, 1, 14, 146, 1, 'Sim'),(2081, 1, 14, 147, 2, 'Sim'),(2082, 1, 14, 147, 6, 'Sim'),(2083, 1, 14, 147, 13, 'Sim'),(2084, 1, 14, 147, 3, 'Sim'),(2085, 1, 14, 147, 4, 'Sim'),(2086, 1, 14, 147, 8, 'Sim'),(2087, 1, 14, 147, 11, 'Sim'),(2088, 1, 14, 147, 7, 'Sim'),(2089, 1, 14, 147, 9, 'Sim'),(2090, 1, 14, 147, 5, 'Não'),(2091, 1, 14, 147, 12, 'Sim'),(2092, 1, 14, 147, 10, 'Sim'),(2093, 1, 14, 147, 1, 'Sim'),(2094, 1, 14, 148, 2, 'Sim'),(2095, 1, 14, 148, 6, 'Sim'),(2096, 1, 14, 148, 13, 'Sim'),(2097, 1, 14, 148, 3, 'Sim'),(2098, 1, 14, 148, 4, 'Sim'),(2099, 1, 14, 148, 8, 'Sim'),(2100, 1, 14, 148, 11, 'Sim'),(2101, 1, 14, 148, 7, 'Sim'),(2102, 1, 14, 148, 9, 'Sim'),(2103, 1, 14, 148, 5, 'Não'),(2104, 1, 14, 148, 12, 'Sim'),(2105, 1, 14, 148, 10, 'Sim'),(2106, 1, 14, 148, 1, 'Sim'),(2107, 1, 14, 149, 2, 'Sim'),(2108, 1, 14, 149, 6, 'Sim'),(2109, 1, 14, 149, 13, 'Sim'),(2110, 1, 14, 149, 3, 'Sim'),(2111, 1, 14, 149, 4, 'Sim'),(2112, 1, 14, 149, 8, 'Sim'),(2113, 1, 14, 149, 11, 'Sim'),(2114, 1, 14, 149, 7, 'Sim'),(2115, 1, 14, 149, 9, 'Sim'),(2116, 1, 14, 149, 5, 'Não'),(2117, 1, 14, 149, 12, 'Sim'),(2118, 1, 14, 149, 10, 'Sim'),(2119, 1, 14, 149, 1, 'Sim'),(2120, 1, 15, 0, 2, 'Sim'),(2121, 1, 15, 0, 6, 'Sim'),(2122, 1, 15, 0, 13, 'Sim'),(2123, 1, 15, 0, 3, 'Sim'),(2124, 1, 15, 0, 4, 'Sim'),(2125, 1, 15, 0, 8, 'Sim'),(2126, 1, 15, 0, 11, 'Sim'),(2127, 1, 15, 0, 7, 'Sim'),(2128, 1, 15, 0, 9, 'Sim'),(2129, 1, 15, 0, 5, 'Não'),(2130, 1, 15, 0, 12, 'Sim'),(2131, 1, 15, 0, 10, 'Sim'),(2132, 1, 15, 0, 1, 'Sim'),(2133, 1, 15, 150, 2, 'Sim'),(2134, 1, 15, 150, 6, 'Sim'),(2135, 1, 15, 150, 13, 'Sim'),(2136, 1, 15, 150, 3, 'Sim'),(2137, 1, 15, 150, 4, 'Sim'),(2138, 1, 15, 150, 8, 'Sim'),(2139, 1, 15, 150, 11, 'Sim'),(2140, 1, 15, 150, 7, 'Sim'),(2141, 1, 15, 150, 9, 'Sim'),(2142, 1, 15, 150, 5, 'Não'),(2143, 1, 15, 150, 12, 'Sim'),(2144, 1, 15, 150, 10, 'Sim'),(2145, 1, 15, 150, 1, 'Sim'),(2146, 1, 15, 151, 2, 'Sim'),(2147, 1, 15, 151, 6, 'Sim'),(2148, 1, 15, 151, 13, 'Sim'),(2149, 1, 15, 151, 3, 'Sim'),(2150, 1, 15, 151, 4, 'Sim'),(2151, 1, 15, 151, 8, 'Sim'),(2152, 1, 15, 151, 11, 'Sim'),(2153, 1, 15, 151, 7, 'Sim'),(2154, 1, 15, 151, 9, 'Sim'),(2155, 1, 15, 151, 5, 'Não'),(2156, 1, 15, 151, 12, 'Sim'),(2157, 1, 15, 151, 10, 'Sim'),(2158, 1, 15, 151, 1, 'Sim'),(2159, 1, 15, 152, 2, 'Sim'),(2160, 1, 15, 152, 6, 'Sim'),(2161, 1, 15, 152, 13, 'Sim'),(2162, 1, 15, 152, 3, 'Sim'),(2163, 1, 15, 152, 4, 'Sim'),(2164, 1, 15, 152, 8, 'Sim'),(2165, 1, 15, 152, 11, 'Sim'),(2166, 1, 15, 152, 7, 'Sim'),(2167, 1, 15, 152, 9, 'Sim'),(2168, 1, 15, 152, 5, 'Não'),(2169, 1, 15, 152, 12, 'Sim'),(2170, 1, 15, 152, 10, 'Sim'),(2171, 1, 15, 152, 1, 'Sim'),(2172, 1, 15, 153, 2, 'Sim'),(2173, 1, 15, 153, 6, 'Sim'),(2174, 1, 15, 153, 13, 'Sim'),(2175, 1, 15, 153, 3, 'Sim'),(2176, 1, 15, 153, 4, 'Sim'),(2177, 1, 15, 153, 8, 'Sim'),(2178, 1, 15, 153, 11, 'Sim'),(2179, 1, 15, 153, 7, 'Sim'),(2180, 1, 15, 153, 9, 'Sim'),(2181, 1, 15, 153, 5, 'Não'),(2182, 1, 15, 153, 12, 'Sim'),(2183, 1, 15, 153, 10, 'Sim'),(2184, 1, 15, 153, 1, 'Sim'),(2185, 1, 15, 154, 2, 'Sim'),(2186, 1, 15, 154, 6, 'Sim'),(2187, 1, 15, 154, 13, 'Sim'),(2188, 1, 15, 154, 3, 'Sim'),(2189, 1, 15, 154, 4, 'Sim'),(2190, 1, 15, 154, 8, 'Sim'),(2191, 1, 15, 154, 11, 'Sim'),(2192, 1, 15, 154, 7, 'Sim'),(2193, 1, 15, 154, 9, 'Sim'),(2194, 1, 15, 154, 5, 'Não'),(2195, 1, 15, 154, 12, 'Sim'),(2196, 1, 15, 154, 10, 'Sim'),(2197, 1, 15, 154, 1, 'Sim'),(2198, 1, 15, 155, 2, 'Sim'),(2199, 1, 15, 155, 6, 'Sim'),(2200, 1, 15, 155, 13, 'Sim'),(2201, 1, 15, 155, 3, 'Sim'),(2202, 1, 15, 155, 4, 'Sim'),(2203, 1, 15, 155, 8, 'Sim'),(2204, 1, 15, 155, 11, 'Sim'),(2205, 1, 15, 155, 7, 'Sim'),(2206, 1, 15, 155, 9, 'Sim'),(2207, 1, 15, 155, 5, 'Não'),(2208, 1, 15, 155, 12, 'Sim'),(2209, 1, 15, 155, 10, 'Sim'),(2210, 1, 15, 155, 1, 'Sim'),(2211, 1, 15, 156, 2, 'Sim'),(2212, 1, 15, 156, 6, 'Sim'),(2213, 1, 15, 156, 13, 'Sim'),(2214, 1, 15, 156, 3, 'Sim'),(2215, 1, 15, 156, 4, 'Sim'),(2216, 1, 15, 156, 8, 'Sim'),(2217, 1, 15, 156, 11, 'Sim'),(2218, 1, 15, 156, 7, 'Sim'),(2219, 1, 15, 156, 9, 'Sim'),(2220, 1, 15, 156, 5, 'Não'),(2221, 1, 15, 156, 12, 'Sim'),(2222, 1, 15, 156, 10, 'Sim'),(2223, 1, 15, 156, 1, 'Sim'),(2224, 1, 15, 157, 2, 'Sim'),(2225, 1, 15, 157, 6, 'Sim'),(2226, 1, 15, 157, 13, 'Sim'),(2227, 1, 15, 157, 3, 'Sim'),(2228, 1, 15, 157, 4, 'Sim'),(2229, 1, 15, 157, 8, 'Sim'),(2230, 1, 15, 157, 11, 'Sim'),(2231, 1, 15, 157, 7, 'Sim'),(2232, 1, 15, 157, 9, 'Sim'),(2233, 1, 15, 157, 5, 'Não'),(2234, 1, 15, 157, 12, 'Sim'),(2235, 1, 15, 157, 10, 'Sim'),(2236, 1, 15, 157, 1, 'Sim'),(2237, 1, 15, 158, 2, 'Sim'),(2238, 1, 15, 158, 6, 'Sim'),(2239, 1, 15, 158, 13, 'Sim'),(2240, 1, 15, 158, 3, 'Sim'),(2241, 1, 15, 158, 4, 'Sim'),(2242, 1, 15, 158, 8, 'Sim'),(2243, 1, 15, 158, 11, 'Sim'),(2244, 1, 15, 158, 7, 'Sim'),(2245, 1, 15, 158, 9, 'Sim'),(2246, 1, 15, 158, 5, 'Não'),(2247, 1, 15, 158, 12, 'Sim'),(2248, 1, 15, 158, 10, 'Sim'),(2249, 1, 15, 158, 1, 'Sim'),(2250, 1, 15, 159, 2, 'Sim'),(2251, 1, 15, 159, 6, 'Sim'),(2252, 1, 15, 159, 13, 'Sim'),(2253, 1, 15, 159, 3, 'Sim'),(2254, 1, 15, 159, 4, 'Sim'),(2255, 1, 15, 159, 8, 'Sim'),(2256, 1, 15, 159, 11, 'Sim'),(2257, 1, 15, 159, 7, 'Sim'),(2258, 1, 15, 159, 9, 'Sim'),(2259, 1, 15, 159, 5, 'Não'),(2260, 1, 15, 159, 12, 'Sim'),(2261, 1, 15, 159, 10, 'Sim'),(2262, 1, 15, 159, 1, 'Sim'),(2263, 1, 15, 160, 2, 'Sim'),(2264, 1, 15, 160, 6, 'Sim'),(2265, 1, 15, 160, 13, 'Sim'),(2266, 1, 15, 160, 3, 'Sim'),(2267, 1, 15, 160, 4, 'Sim'),(2268, 1, 15, 160, 8, 'Sim'),(2269, 1, 15, 160, 11, 'Sim'),(2270, 1, 15, 160, 7, 'Sim'),(2271, 1, 15, 160, 9, 'Sim'),(2272, 1, 15, 160, 5, 'Não'),(2273, 1, 15, 160, 12, 'Sim'),(2274, 1, 15, 160, 10, 'Sim'),(2275, 1, 15, 160, 1, 'Sim'),(2276, 1, 15, 161, 2, 'Sim'),(2277, 1, 15, 161, 6, 'Sim'),(2278, 1, 15, 161, 13, 'Sim'),(2279, 1, 15, 161, 3, 'Sim'),(2280, 1, 15, 161, 4, 'Sim'),(2281, 1, 15, 161, 8, 'Sim'),(2282, 1, 15, 161, 11, 'Sim'),(2283, 1, 15, 161, 7, 'Sim'),(2284, 1, 15, 161, 9, 'Sim'),(2285, 1, 15, 161, 5, 'Não'),(2286, 1, 15, 161, 12, 'Sim'),(2287, 1, 15, 161, 10, 'Sim'),(2288, 1, 15, 161, 1, 'Sim'),(2289, 1, 15, 162, 2, 'Sim'),(2290, 1, 15, 162, 6, 'Sim'),(2291, 1, 15, 162, 13, 'Sim'),(2292, 1, 15, 162, 3, 'Sim'),(2293, 1, 15, 162, 4, 'Sim'),(2294, 1, 15, 162, 8, 'Sim'),(2295, 1, 15, 162, 11, 'Sim'),(2296, 1, 15, 162, 7, 'Sim'),(2297, 1, 15, 162, 9, 'Sim'),(2298, 1, 15, 162, 5, 'Não'),(2299, 1, 15, 162, 12, 'Sim'),(2300, 1, 15, 162, 10, 'Sim'),(2301, 1, 15, 162, 1, 'Sim'),(2302, 1, 15, 163, 2, 'Sim'),(2303, 1, 15, 163, 6, 'Sim'),(2304, 1, 15, 163, 13, 'Sim'),(2305, 1, 15, 163, 3, 'Sim'),(2306, 1, 15, 163, 4, 'Sim'),(2307, 1, 15, 163, 8, 'Sim'),(2308, 1, 15, 163, 11, 'Sim'),(2309, 1, 15, 163, 7, 'Sim'),(2310, 1, 15, 163, 9, 'Sim'),(2311, 1, 15, 163, 5, 'Não'),(2312, 1, 15, 163, 12, 'Sim'),(2313, 1, 15, 163, 10, 'Sim'),(2314, 1, 15, 163, 1, 'Sim'),(2315, 1, 16, 0, 2, 'Sim'),(2316, 1, 16, 0, 6, 'Sim'),(2317, 1, 16, 0, 13, 'Sim'),(2318, 1, 16, 0, 3, 'Sim'),(2319, 1, 16, 0, 4, 'Sim'),(2320, 1, 16, 0, 8, 'Sim'),(2321, 1, 16, 0, 11, 'Sim'),(2322, 1, 16, 0, 7, 'Sim'),(2323, 1, 16, 0, 9, 'Sim'),(2324, 1, 16, 0, 5, 'Não'),(2325, 1, 16, 0, 12, 'Sim'),(2326, 1, 16, 0, 10, 'Sim'),(2327, 1, 16, 0, 1, 'Sim'),(2328, 1, 16, 164, 2, 'Sim'),(2329, 1, 16, 164, 6, 'Sim'),(2330, 1, 16, 164, 13, 'Sim'),(2331, 1, 16, 164, 3, 'Sim'),(2332, 1, 16, 164, 4, 'Sim'),(2333, 1, 16, 164, 8, 'Sim'),(2334, 1, 16, 164, 11, 'Sim'),(2335, 1, 16, 164, 7, 'Sim'),(2336, 1, 16, 164, 9, 'Sim'),(2337, 1, 16, 164, 5, 'Não'),(2338, 1, 16, 164, 12, 'Sim'),(2339, 1, 16, 164, 10, 'Sim'),(2340, 1, 16, 164, 1, 'Sim'),(2341, 1, 16, 165, 2, 'Sim'),(2342, 1, 16, 165, 6, 'Sim'),(2343, 1, 16, 165, 13, 'Sim'),(2344, 1, 16, 165, 3, 'Sim'),(2345, 1, 16, 165, 4, 'Sim'),(2346, 1, 16, 165, 8, 'Sim'),(2347, 1, 16, 165, 11, 'Sim'),(2348, 1, 16, 165, 7, 'Sim'),(2349, 1, 16, 165, 9, 'Sim'),(2350, 1, 16, 165, 5, 'Não'),(2351, 1, 16, 165, 12, 'Sim'),(2352, 1, 16, 165, 10, 'Sim'),(2353, 1, 16, 165, 1, 'Sim'),(2354, 1, 16, 166, 2, 'Sim'),(2355, 1, 16, 166, 6, 'Sim'),(2356, 1, 16, 166, 13, 'Sim'),(2357, 1, 16, 166, 3, 'Sim'),(2358, 1, 16, 166, 4, 'Sim'),(2359, 1, 16, 166, 8, 'Sim'),(2360, 1, 16, 166, 11, 'Sim'),(2361, 1, 16, 166, 7, 'Sim'),(2362, 1, 16, 166, 9, 'Sim'),(2363, 1, 16, 166, 5, 'Não'),(2364, 1, 16, 166, 12, 'Sim'),(2365, 1, 16, 166, 10, 'Sim'),(2366, 1, 16, 166, 1, 'Sim'),(2367, 1, 17, 0, 2, 'Sim'),(2368, 1, 17, 0, 6, 'Sim'),(2369, 1, 17, 0, 13, 'Sim'),(2370, 1, 17, 0, 3, 'Sim'),(2371, 1, 17, 0, 4, 'Sim'),(2372, 1, 17, 0, 8, 'Sim'),(2373, 1, 17, 0, 11, 'Sim'),(2374, 1, 17, 0, 7, 'Sim'),(2375, 1, 17, 0, 9, 'Sim'),(2376, 1, 17, 0, 5, 'Não'),(2377, 1, 17, 0, 12, 'Sim'),(2378, 1, 17, 0, 10, 'Sim'),(2379, 1, 17, 0, 1, 'Sim'),(2380, 1, 17, 167, 2, 'Sim'),(2381, 1, 17, 167, 6, 'Sim'),(2382, 1, 17, 167, 13, 'Sim'),(2383, 1, 17, 167, 3, 'Sim'),(2384, 1, 17, 167, 4, 'Sim'),(2385, 1, 17, 167, 8, 'Sim'),(2386, 1, 17, 167, 11, 'Sim'),(2387, 1, 17, 167, 7, 'Sim'),(2388, 1, 17, 167, 9, 'Sim'),(2389, 1, 17, 167, 5, 'Não'),(2390, 1, 17, 167, 12, 'Sim'),(2391, 1, 17, 167, 10, 'Sim'),(2392, 1, 17, 167, 1, 'Sim'),(2393, 1, 17, 168, 2, 'Sim'),(2394, 1, 17, 168, 6, 'Sim'),(2395, 1, 17, 168, 13, 'Sim'),(2396, 1, 17, 168, 3, 'Sim'),(2397, 1, 17, 168, 4, 'Sim'),(2398, 1, 17, 168, 8, 'Sim'),(2399, 1, 17, 168, 11, 'Sim'),(2400, 1, 17, 168, 7, 'Sim'),(2401, 1, 17, 168, 9, 'Sim'),(2402, 1, 17, 168, 5, 'Não'),(2403, 1, 17, 168, 12, 'Sim'),(2404, 1, 17, 168, 10, 'Sim'),(2405, 1, 17, 168, 1, 'Sim'),(2406, 1, 17, 169, 2, 'Sim'),(2407, 1, 17, 169, 6, 'Sim'),(2408, 1, 17, 169, 13, 'Sim'),(2409, 1, 17, 169, 3, 'Sim'),(2410, 1, 17, 169, 4, 'Sim'),(2411, 1, 17, 169, 8, 'Sim'),(2412, 1, 17, 169, 11, 'Sim'),(2413, 1, 17, 169, 7, 'Sim'),(2414, 1, 17, 169, 9, 'Sim'),(2415, 1, 17, 169, 5, 'Não'),(2416, 1, 17, 169, 12, 'Sim'),(2417, 1, 17, 169, 10, 'Sim'),(2418, 1, 17, 169, 1, 'Sim'),(2419, 1, 18, 0, 2, 'Sim'),(2420, 1, 18, 0, 6, 'Sim'),(2421, 1, 18, 0, 13, 'Sim'),(2422, 1, 18, 0, 3, 'Sim'),(2423, 1, 18, 0, 4, 'Sim'),(2424, 1, 18, 0, 8, 'Sim'),(2425, 1, 18, 0, 11, 'Sim'),(2426, 1, 18, 0, 7, 'Sim'),(2427, 1, 18, 0, 9, 'Sim'),(2428, 1, 18, 0, 5, 'Não'),(2429, 1, 18, 0, 12, 'Sim'),(2430, 1, 18, 0, 10, 'Sim'),(2431, 1, 18, 0, 1, 'Sim'),(2432, 1, 18, 170, 2, 'Sim'),(2433, 1, 18, 170, 6, 'Sim'),(2434, 1, 18, 170, 13, 'Sim'),(2435, 1, 18, 170, 3, 'Sim'),(2436, 1, 18, 170, 4, 'Sim'),(2437, 1, 18, 170, 8, 'Sim'),(2438, 1, 18, 170, 11, 'Sim'),(2439, 1, 18, 170, 7, 'Sim'),(2440, 1, 18, 170, 9, 'Sim'),(2441, 1, 18, 170, 5, 'Não'),(2442, 1, 18, 170, 12, 'Sim'),(2443, 1, 18, 170, 10, 'Sim'),(2444, 1, 18, 170, 1, 'Sim'),(2445, 1, 18, 171, 2, 'Sim'),(2446, 1, 18, 171, 6, 'Sim'),(2447, 1, 18, 171, 13, 'Sim'),(2448, 1, 18, 171, 3, 'Sim'),(2449, 1, 18, 171, 4, 'Sim'),(2450, 1, 18, 171, 8, 'Sim'),(2451, 1, 18, 171, 11, 'Sim'),(2452, 1, 18, 171, 7, 'Sim'),(2453, 1, 18, 171, 9, 'Sim'),(2454, 1, 18, 171, 5, 'Não'),(2455, 1, 18, 171, 12, 'Sim'),(2456, 1, 18, 171, 10, 'Sim'),(2457, 1, 18, 171, 1, 'Sim'),(2458, 1, 18, 172, 2, 'Sim'),(2459, 1, 18, 172, 6, 'Sim'),(2460, 1, 18, 172, 13, 'Sim'),(2461, 1, 18, 172, 3, 'Sim'),(2462, 1, 18, 172, 4, 'Sim'),(2463, 1, 18, 172, 8, 'Sim'),(2464, 1, 18, 172, 11, 'Sim'),(2465, 1, 18, 172, 7, 'Sim'),(2466, 1, 18, 172, 9, 'Sim'),(2467, 1, 18, 172, 5, 'Não'),(2468, 1, 18, 172, 12, 'Sim'),(2469, 1, 18, 172, 10, 'Sim'),(2470, 1, 18, 172, 1, 'Sim'),(2471, 1, 19, 0, 2, 'Sim'),(2472, 1, 19, 0, 6, 'Sim'),(2473, 1, 19, 0, 13, 'Sim'),(2474, 1, 19, 0, 3, 'Sim'),(2475, 1, 19, 0, 4, 'Sim'),(2476, 1, 19, 0, 8, 'Sim'),(2477, 1, 19, 0, 11, 'Sim'),(2478, 1, 19, 0, 7, 'Sim'),(2479, 1, 19, 0, 9, 'Sim'),(2480, 1, 19, 0, 5, 'Não'),(2481, 1, 19, 0, 12, 'Sim'),(2482, 1, 19, 0, 10, 'Sim'),(2483, 1, 19, 0, 1, 'Sim'),(2484, 1, 19, 173, 2, 'Sim'),(2485, 1, 19, 173, 6, 'Sim'),(2486, 1, 19, 173, 13, 'Sim'),(2487, 1, 19, 173, 3, 'Sim'),(2488, 1, 19, 173, 4, 'Sim'),(2489, 1, 19, 173, 8, 'Sim'),(2490, 1, 19, 173, 11, 'Sim'),(2491, 1, 19, 173, 7, 'Sim'),(2492, 1, 19, 173, 9, 'Sim'),(2493, 1, 19, 173, 5, 'Não'),(2494, 1, 19, 173, 12, 'Sim'),(2495, 1, 19, 173, 10, 'Sim'),(2496, 1, 19, 173, 1, 'Sim'),(2497, 1, 19, 174, 2, 'Sim'),(2498, 1, 19, 174, 6, 'Sim'),(2499, 1, 19, 174, 13, 'Sim'),(2500, 1, 19, 174, 3, 'Sim'),(2501, 1, 19, 174, 4, 'Sim'),(2502, 1, 19, 174, 8, 'Sim'),(2503, 1, 19, 174, 11, 'Sim'),(2504, 1, 19, 174, 7, 'Sim'),(2505, 1, 19, 174, 9, 'Sim'),(2506, 1, 19, 174, 5, 'Não'),(2507, 1, 19, 174, 12, 'Sim'),(2508, 1, 19, 174, 10, 'Sim'),(2509, 1, 19, 174, 1, 'Sim'),(2510, 1, 19, 175, 2, 'Sim'),(2511, 1, 19, 175, 6, 'Sim'),(2512, 1, 19, 175, 13, 'Sim'),(2513, 1, 19, 175, 3, 'Sim'),(2514, 1, 19, 175, 4, 'Sim'),(2515, 1, 19, 175, 8, 'Sim'),(2516, 1, 19, 175, 11, 'Sim'),(2517, 1, 19, 175, 7, 'Sim'),(2518, 1, 19, 175, 9, 'Sim'),(2519, 1, 19, 175, 5, 'Não'),(2520, 1, 19, 175, 12, 'Sim'),(2521, 1, 19, 175, 10, 'Sim'),(2522, 1, 19, 175, 1, 'Sim'),(2523, 1, 19, 176, 2, 'Sim'),(2524, 1, 19, 176, 6, 'Sim'),(2525, 1, 19, 176, 13, 'Sim'),(2526, 1, 19, 176, 3, 'Sim'),(2527, 1, 19, 176, 4, 'Sim'),(2528, 1, 19, 176, 8, 'Sim'),(2529, 1, 19, 176, 11, 'Sim'),(2530, 1, 19, 176, 7, 'Sim'),(2531, 1, 19, 176, 9, 'Sim'),(2532, 1, 19, 176, 5, 'Não'),(2533, 1, 19, 176, 12, 'Sim'),(2534, 1, 19, 176, 10, 'Sim'),(2535, 1, 19, 176, 1, 'Sim'),(2536, 1, 19, 177, 2, 'Sim'),(2537, 1, 19, 177, 6, 'Sim'),(2538, 1, 19, 177, 13, 'Sim'),(2539, 1, 19, 177, 3, 'Sim'),(2540, 1, 19, 177, 4, 'Sim'),(2541, 1, 19, 177, 8, 'Sim'),(2542, 1, 19, 177, 11, 'Sim'),(2543, 1, 19, 177, 7, 'Sim'),(2544, 1, 19, 177, 9, 'Sim'),(2545, 1, 19, 177, 5, 'Não'),(2546, 1, 19, 177, 12, 'Sim'),(2547, 1, 19, 177, 10, 'Sim'),(2548, 1, 19, 177, 1, 'Sim'),(2549, 1, 19, 178, 2, 'Sim'),(2550, 1, 19, 178, 6, 'Sim'),(2551, 1, 19, 178, 13, 'Sim'),(2552, 1, 19, 178, 3, 'Sim'),(2553, 1, 19, 178, 4, 'Sim'),(2554, 1, 19, 178, 8, 'Sim'),(2555, 1, 19, 178, 11, 'Sim'),(2556, 1, 19, 178, 7, 'Sim'),(2557, 1, 19, 178, 9, 'Sim'),(2558, 1, 19, 178, 5, 'Não'),(2559, 1, 19, 178, 12, 'Sim'),(2560, 1, 19, 178, 10, 'Sim'),(2561, 1, 19, 178, 1, 'Sim'),(2562, 1, 19, 179, 2, 'Sim'),(2563, 1, 19, 179, 6, 'Sim'),(2564, 1, 19, 179, 13, 'Sim'),(2565, 1, 19, 179, 3, 'Sim'),(2566, 1, 19, 179, 4, 'Sim'),(2567, 1, 19, 179, 8, 'Sim'),(2568, 1, 19, 179, 11, 'Sim'),(2569, 1, 19, 179, 7, 'Sim'),(2570, 1, 19, 179, 9, 'Sim'),(2571, 1, 19, 179, 5, 'Não'),(2572, 1, 19, 179, 12, 'Sim'),(2573, 1, 19, 179, 10, 'Sim'),(2574, 1, 19, 179, 1, 'Sim'),(2575, 1, 19, 180, 2, 'Sim'),(2576, 1, 19, 180, 6, 'Sim'),(2577, 1, 19, 180, 13, 'Sim'),(2578, 1, 19, 180, 3, 'Sim'),(2579, 1, 19, 180, 4, 'Sim'),(2580, 1, 19, 180, 8, 'Sim'),(2581, 1, 19, 180, 11, 'Sim'),(2582, 1, 19, 180, 7, 'Sim'),(2583, 1, 19, 180, 9, 'Sim'),(2584, 1, 19, 180, 5, 'Não'),(2585, 1, 19, 180, 12, 'Sim'),(2586, 1, 19, 180, 10, 'Sim'),(2587, 1, 19, 180, 1, 'Sim'),(2588, 1, 19, 181, 2, 'Sim'),(2589, 1, 19, 181, 6, 'Sim'),(2590, 1, 19, 181, 13, 'Sim'),(2591, 1, 19, 181, 3, 'Sim'),(2592, 1, 19, 181, 4, 'Sim'),(2593, 1, 19, 181, 8, 'Sim'),(2594, 1, 19, 181, 11, 'Sim'),(2595, 1, 19, 181, 7, 'Sim'),(2596, 1, 19, 181, 9, 'Sim'),(2597, 1, 19, 181, 5, 'Não'),(2598, 1, 19, 181, 12, 'Sim'),(2599, 1, 19, 181, 10, 'Sim'),(2600, 1, 19, 181, 1, 'Sim'),(2601, 1, 19, 182, 2, 'Sim'),(2602, 1, 19, 182, 6, 'Sim'),(2603, 1, 19, 182, 13, 'Sim'),(2604, 1, 19, 182, 3, 'Sim'),(2605, 1, 19, 182, 4, 'Sim'),(2606, 1, 19, 182, 8, 'Sim'),(2607, 1, 19, 182, 11, 'Sim'),(2608, 1, 19, 182, 7, 'Sim'),(2609, 1, 19, 182, 9, 'Sim'),(2610, 1, 19, 182, 5, 'Não'),(2611, 1, 19, 182, 12, 'Sim'),(2612, 1, 19, 182, 10, 'Sim'),(2613, 1, 19, 182, 1, 'Sim'),(2614, 1, 19, 183, 2, 'Sim'),(2615, 1, 19, 183, 6, 'Sim'),(2616, 1, 19, 183, 13, 'Sim'),(2617, 1, 19, 183, 3, 'Sim'),(2618, 1, 19, 183, 4, 'Sim'),(2619, 1, 19, 183, 8, 'Sim'),(2620, 1, 19, 183, 11, 'Sim'),(2621, 1, 19, 183, 7, 'Sim'),(2622, 1, 19, 183, 9, 'Sim'),(2623, 1, 19, 183, 5, 'Não'),(2624, 1, 19, 183, 12, 'Sim'),(2625, 1, 19, 183, 10, 'Sim'),(2626, 1, 19, 183, 1, 'Sim'),(2627, 1, 19, 184, 2, 'Sim'),(2628, 1, 19, 184, 6, 'Sim'),(2629, 1, 19, 184, 13, 'Sim'),(2630, 1, 19, 184, 3, 'Sim'),(2631, 1, 19, 184, 4, 'Sim'),(2632, 1, 19, 184, 8, 'Sim'),(2633, 1, 19, 184, 11, 'Sim'),(2634, 1, 19, 184, 7, 'Sim'),(2635, 1, 19, 184, 9, 'Sim'),(2636, 1, 19, 184, 5, 'Não'),(2637, 1, 19, 184, 12, 'Sim'),(2638, 1, 19, 184, 10, 'Sim'),(2639, 1, 19, 184, 1, 'Sim'),(2640, 1, 19, 185, 2, 'Sim'),(2641, 1, 19, 185, 6, 'Sim'),(2642, 1, 19, 185, 13, 'Sim'),(2643, 1, 19, 185, 3, 'Sim'),(2644, 1, 19, 185, 4, 'Sim'),(2645, 1, 19, 185, 8, 'Sim'),(2646, 1, 19, 185, 11, 'Sim'),(2647, 1, 19, 185, 7, 'Sim'),(2648, 1, 19, 185, 9, 'Sim'),(2649, 1, 19, 185, 5, 'Não'),(2650, 1, 19, 185, 12, 'Sim'),(2651, 1, 19, 185, 10, 'Sim'),(2652, 1, 19, 185, 1, 'Sim'),(2653, 1, 19, 186, 2, 'Sim'),(2654, 1, 19, 186, 6, 'Sim'),(2655, 1, 19, 186, 13, 'Sim'),(2656, 1, 19, 186, 3, 'Sim'),(2657, 1, 19, 186, 4, 'Sim'),(2658, 1, 19, 186, 8, 'Sim'),(2659, 1, 19, 186, 11, 'Sim'),(2660, 1, 19, 186, 7, 'Sim'),(2661, 1, 19, 186, 9, 'Sim'),(2662, 1, 19, 186, 5, 'Não'),(2663, 1, 19, 186, 12, 'Sim'),(2664, 1, 19, 186, 10, 'Sim'),(2665, 1, 19, 186, 1, 'Sim'),(2666, 1, 19, 187, 2, 'Sim'),(2667, 1, 19, 187, 6, 'Sim'),(2668, 1, 19, 187, 13, 'Sim'),(2669, 1, 19, 187, 3, 'Sim'),(2670, 1, 19, 187, 4, 'Sim'),(2671, 1, 19, 187, 8, 'Sim'),(2672, 1, 19, 187, 11, 'Sim'),(2673, 1, 19, 187, 7, 'Sim'),(2674, 1, 19, 187, 9, 'Sim'),(2675, 1, 19, 187, 5, 'Não'),(2676, 1, 19, 187, 12, 'Sim'),(2677, 1, 19, 187, 10, 'Sim'),(2678, 1, 19, 187, 1, 'Sim'),(2679, 1, 19, 188, 2, 'Sim'),(2680, 1, 19, 188, 6, 'Sim'),(2681, 1, 19, 188, 13, 'Sim'),(2682, 1, 19, 188, 3, 'Sim'),(2683, 1, 19, 188, 4, 'Sim'),(2684, 1, 19, 188, 8, 'Sim'),(2685, 1, 19, 188, 11, 'Sim'),(2686, 1, 19, 188, 7, 'Sim'),(2687, 1, 19, 188, 9, 'Sim'),(2688, 1, 19, 188, 5, 'Não'),(2689, 1, 19, 188, 12, 'Sim'),(2690, 1, 19, 188, 10, 'Sim'),(2691, 1, 19, 188, 1, 'Sim'),(2692, 1, 19, 189, 2, 'Sim'),(2693, 1, 19, 189, 6, 'Sim'),(2694, 1, 19, 189, 13, 'Sim'),(2695, 1, 19, 189, 3, 'Sim'),(2696, 1, 19, 189, 4, 'Sim'),(2697, 1, 19, 189, 8, 'Sim'),(2698, 1, 19, 189, 11, 'Sim'),(2699, 1, 19, 189, 7, 'Sim'),(2700, 1, 19, 189, 9, 'Sim'),(2701, 1, 19, 189, 5, 'Não'),(2702, 1, 19, 189, 12, 'Sim'),(2703, 1, 19, 189, 10, 'Sim'),(2704, 1, 19, 189, 1, 'Sim'),(2705, 1, 19, 190, 2, 'Sim'),(2706, 1, 19, 190, 6, 'Sim'),(2707, 1, 19, 190, 13, 'Sim'),(2708, 1, 19, 190, 3, 'Sim'),(2709, 1, 19, 190, 4, 'Sim'),(2710, 1, 19, 190, 8, 'Sim'),(2711, 1, 19, 190, 11, 'Sim'),(2712, 1, 19, 190, 7, 'Sim'),(2713, 1, 19, 190, 9, 'Sim'),(2714, 1, 19, 190, 5, 'Não'),(2715, 1, 19, 190, 12, 'Sim'),(2716, 1, 19, 190, 10, 'Sim'),(2717, 1, 19, 190, 1, 'Sim'),(2718, 1, 19, 191, 2, 'Sim'),(2719, 1, 19, 191, 6, 'Sim'),(2720, 1, 19, 191, 13, 'Sim'),(2721, 1, 19, 191, 3, 'Sim'),(2722, 1, 19, 191, 4, 'Sim'),(2723, 1, 19, 191, 8, 'Sim'),(2724, 1, 19, 191, 11, 'Sim'),(2725, 1, 19, 191, 7, 'Sim'),(2726, 1, 19, 191, 9, 'Sim'),(2727, 1, 19, 191, 5, 'Não'),(2728, 1, 19, 191, 12, 'Sim'),(2729, 1, 19, 191, 10, 'Sim'),(2730, 1, 19, 191, 1, 'Sim'),(2731, 1, 19, 192, 2, 'Sim'),(2732, 1, 19, 192, 6, 'Sim'),(2733, 1, 19, 192, 13, 'Sim'),(2734, 1, 19, 192, 3, 'Sim'),(2735, 1, 19, 192, 4, 'Sim'),(2736, 1, 19, 192, 8, 'Sim'),(2737, 1, 19, 192, 11, 'Sim'),(2738, 1, 19, 192, 7, 'Sim'),(2739, 1, 19, 192, 9, 'Sim'),(2740, 1, 19, 192, 5, 'Não'),(2741, 1, 19, 192, 12, 'Sim'),(2742, 1, 19, 192, 10, 'Sim'),(2743, 1, 19, 192, 1, 'Sim'),(2744, 1, 19, 193, 2, 'Sim'),(2745, 1, 19, 193, 6, 'Sim'),(2746, 1, 19, 193, 13, 'Sim'),(2747, 1, 19, 193, 3, 'Sim'),(2748, 1, 19, 193, 4, 'Sim'),(2749, 1, 19, 193, 8, 'Sim'),(2750, 1, 19, 193, 11, 'Sim'),(2751, 1, 19, 193, 7, 'Sim'),(2752, 1, 19, 193, 9, 'Sim'),(2753, 1, 19, 193, 5, 'Não'),(2754, 1, 19, 193, 12, 'Sim'),(2755, 1, 19, 193, 10, 'Sim'),(2756, 1, 19, 193, 1, 'Sim'),(2757, 1, 19, 194, 2, 'Sim'),(2758, 1, 19, 194, 6, 'Sim'),(2759, 1, 19, 194, 13, 'Sim'),(2760, 1, 19, 194, 3, 'Sim'),(2761, 1, 19, 194, 4, 'Sim'),(2762, 1, 19, 194, 8, 'Sim'),(2763, 1, 19, 194, 11, 'Sim'),(2764, 1, 19, 194, 7, 'Sim'),(2765, 1, 19, 194, 9, 'Sim'),(2766, 1, 19, 194, 5, 'Não'),(2767, 1, 19, 194, 12, 'Sim'),(2768, 1, 19, 194, 10, 'Sim'),(2769, 1, 19, 194, 1, 'Sim'),(2770, 1, 19, 195, 2, 'Sim'),(2771, 1, 19, 195, 6, 'Sim'),(2772, 1, 19, 195, 13, 'Sim'),(2773, 1, 19, 195, 3, 'Sim'),(2774, 1, 19, 195, 4, 'Sim'),(2775, 1, 19, 195, 8, 'Sim'),(2776, 1, 19, 195, 11, 'Sim'),(2777, 1, 19, 195, 7, 'Sim'),(2778, 1, 19, 195, 9, 'Sim'),(2779, 1, 19, 195, 5, 'Não'),(2780, 1, 19, 195, 12, 'Sim'),(2781, 1, 19, 195, 10, 'Sim'),(2782, 1, 19, 195, 1, 'Sim'),(2783, 1, 19, 196, 2, 'Sim'),(2784, 1, 19, 196, 6, 'Sim'),(2785, 1, 19, 196, 13, 'Sim'),(2786, 1, 19, 196, 3, 'Sim'),(2787, 1, 19, 196, 4, 'Sim'),(2788, 1, 19, 196, 8, 'Sim'),(2789, 1, 19, 196, 11, 'Sim'),(2790, 1, 19, 196, 7, 'Sim'),(2791, 1, 19, 196, 9, 'Sim'),(2792, 1, 19, 196, 5, 'Não'),(2793, 1, 19, 196, 12, 'Sim'),(2794, 1, 19, 196, 10, 'Sim'),(2795, 1, 19, 196, 1, 'Sim'),(2796, 1, 19, 197, 2, 'Sim'),(2797, 1, 19, 197, 6, 'Sim'),(2798, 1, 19, 197, 13, 'Sim'),(2799, 1, 19, 197, 3, 'Sim'),(2800, 1, 19, 197, 4, 'Sim'),(2801, 1, 19, 197, 8, 'Sim'),(2802, 1, 19, 197, 11, 'Sim'),(2803, 1, 19, 197, 7, 'Sim'),(2804, 1, 19, 197, 9, 'Sim'),(2805, 1, 19, 197, 5, 'Não'),(2806, 1, 19, 197, 12, 'Sim'),(2807, 1, 19, 197, 10, 'Sim'),(2808, 1, 19, 197, 1, 'Sim'),(2809, 1, 19, 198, 2, 'Sim'),(2810, 1, 19, 198, 6, 'Sim'),(2811, 1, 19, 198, 13, 'Sim'),(2812, 1, 19, 198, 3, 'Sim'),(2813, 1, 19, 198, 4, 'Sim'),(2814, 1, 19, 198, 8, 'Sim'),(2815, 1, 19, 198, 11, 'Sim'),(2816, 1, 19, 198, 7, 'Sim'),(2817, 1, 19, 198, 9, 'Sim'),(2818, 1, 19, 198, 5, 'Não'),(2819, 1, 19, 198, 12, 'Sim'),(2820, 1, 19, 198, 10, 'Sim'),(2821, 1, 19, 198, 1, 'Sim'),(2822, 1, 19, 199, 2, 'Sim'),(2823, 1, 19, 199, 6, 'Sim'),(2824, 1, 19, 199, 13, 'Sim'),(2825, 1, 19, 199, 3, 'Sim'),(2826, 1, 19, 199, 4, 'Sim'),(2827, 1, 19, 199, 8, 'Sim'),(2828, 1, 19, 199, 11, 'Sim'),(2829, 1, 19, 199, 7, 'Sim'),(2830, 1, 19, 199, 9, 'Sim'),(2831, 1, 19, 199, 5, 'Não'),(2832, 1, 19, 199, 12, 'Sim'),(2833, 1, 19, 199, 10, 'Sim'),(2834, 1, 19, 199, 1, 'Sim'),(2835, 1, 19, 200, 2, 'Sim'),(2836, 1, 19, 200, 6, 'Sim'),(2837, 1, 19, 200, 13, 'Sim'),(2838, 1, 19, 200, 3, 'Sim'),(2839, 1, 19, 200, 4, 'Sim'),(2840, 1, 19, 200, 8, 'Sim'),(2841, 1, 19, 200, 11, 'Sim'),(2842, 1, 19, 200, 7, 'Sim'),(2843, 1, 19, 200, 9, 'Sim'),(2844, 1, 19, 200, 5, 'Não'),(2845, 1, 19, 200, 12, 'Sim'),(2846, 1, 19, 200, 10, 'Sim'),(2847, 1, 19, 200, 1, 'Sim'),(2848, 1, 19, 201, 2, 'Sim'),(2849, 1, 19, 201, 6, 'Sim'),(2850, 1, 19, 201, 13, 'Sim'),(2851, 1, 19, 201, 3, 'Sim'),(2852, 1, 19, 201, 4, 'Sim'),(2853, 1, 19, 201, 8, 'Sim'),(2854, 1, 19, 201, 11, 'Sim'),(2855, 1, 19, 201, 7, 'Sim'),(2856, 1, 19, 201, 9, 'Sim'),(2857, 1, 19, 201, 5, 'Não'),(2858, 1, 19, 201, 12, 'Sim'),(2859, 1, 19, 201, 10, 'Sim'),(2860, 1, 19, 201, 1, 'Sim'),(2861, 1, 19, 202, 2, 'Sim'),(2862, 1, 19, 202, 6, 'Sim'),(2863, 1, 19, 202, 13, 'Sim'),(2864, 1, 19, 202, 3, 'Sim'),(2865, 1, 19, 202, 4, 'Sim'),(2866, 1, 19, 202, 8, 'Sim'),(2867, 1, 19, 202, 11, 'Sim'),(2868, 1, 19, 202, 7, 'Sim'),(2869, 1, 19, 202, 9, 'Sim'),(2870, 1, 19, 202, 5, 'Não'),(2871, 1, 19, 202, 12, 'Sim'),(2872, 1, 19, 202, 10, 'Sim'),(2873, 1, 19, 202, 1, 'Sim'),(2874, 1, 19, 203, 2, 'Sim'),(2875, 1, 19, 203, 6, 'Sim'),(2876, 1, 19, 203, 13, 'Sim'),(2877, 1, 19, 203, 3, 'Sim'),(2878, 1, 19, 203, 4, 'Sim'),(2879, 1, 19, 203, 8, 'Sim'),(2880, 1, 19, 203, 11, 'Sim'),(2881, 1, 19, 203, 7, 'Sim'),(2882, 1, 19, 203, 9, 'Sim'),(2883, 1, 19, 203, 5, 'Não'),(2884, 1, 19, 203, 12, 'Sim'),(2885, 1, 19, 203, 10, 'Sim'),(2886, 1, 19, 203, 1, 'Sim'),(2887, 1, 19, 204, 2, 'Sim'),(2888, 1, 19, 204, 6, 'Sim'),(2889, 1, 19, 204, 13, 'Sim'),(2890, 1, 19, 204, 3, 'Sim'),(2891, 1, 19, 204, 4, 'Sim'),(2892, 1, 19, 204, 8, 'Sim'),(2893, 1, 19, 204, 11, 'Sim'),(2894, 1, 19, 204, 7, 'Sim'),(2895, 1, 19, 204, 9, 'Sim'),(2896, 1, 19, 204, 5, 'Não'),(2897, 1, 19, 204, 12, 'Sim'),(2898, 1, 19, 204, 10, 'Sim'),(2899, 1, 19, 204, 1, 'Sim'),(2900, 1, 19, 205, 2, 'Sim'),(2901, 1, 19, 205, 6, 'Sim'),(2902, 1, 19, 205, 13, 'Sim'),(2903, 1, 19, 205, 3, 'Sim'),(2904, 1, 19, 205, 4, 'Sim'),(2905, 1, 19, 205, 8, 'Sim'),(2906, 1, 19, 205, 11, 'Sim'),(2907, 1, 19, 205, 7, 'Sim'),(2908, 1, 19, 205, 9, 'Sim'),(2909, 1, 19, 205, 5, 'Não'),(2910, 1, 19, 205, 12, 'Sim'),(2911, 1, 19, 205, 10, 'Sim'),(2912, 1, 19, 205, 1, 'Sim'),(2913, 1, 20, 0, 2, 'Sim'),(2914, 1, 20, 0, 6, 'Sim'),(2915, 1, 20, 0, 13, 'Sim'),(2916, 1, 20, 0, 3, 'Sim'),(2917, 1, 20, 0, 4, 'Sim'),(2918, 1, 20, 0, 8, 'Sim'),(2919, 1, 20, 0, 11, 'Sim'),(2920, 1, 20, 0, 7, 'Sim'),(2921, 1, 20, 0, 9, 'Sim'),(2922, 1, 20, 0, 5, 'Não'),(2923, 1, 20, 0, 12, 'Sim'),(2924, 1, 20, 0, 10, 'Sim'),(2925, 1, 20, 0, 1, 'Sim'),(2926, 1, 20, 206, 2, 'Sim'),(2927, 1, 20, 206, 6, 'Sim'),(2928, 1, 20, 206, 13, 'Sim'),(2929, 1, 20, 206, 3, 'Sim'),(2930, 1, 20, 206, 4, 'Sim'),(2931, 1, 20, 206, 8, 'Sim'),(2932, 1, 20, 206, 11, 'Sim'),(2933, 1, 20, 206, 7, 'Sim'),(2934, 1, 20, 206, 9, 'Sim'),(2935, 1, 20, 206, 5, 'Não'),(2936, 1, 20, 206, 12, 'Sim'),(2937, 1, 20, 206, 10, 'Sim'),(2938, 1, 20, 206, 1, 'Sim'),(2939, 1, 20, 207, 2, 'Sim'),(2940, 1, 20, 207, 6, 'Sim'),(2941, 1, 20, 207, 13, 'Sim'),(2942, 1, 20, 207, 3, 'Sim'),(2943, 1, 20, 207, 4, 'Sim'),(2944, 1, 20, 207, 8, 'Sim'),(2945, 1, 20, 207, 11, 'Sim'),(2946, 1, 20, 207, 7, 'Sim'),(2947, 1, 20, 207, 9, 'Sim'),(2948, 1, 20, 207, 5, 'Não'),(2949, 1, 20, 207, 12, 'Sim'),(2950, 1, 20, 207, 10, 'Sim'),(2951, 1, 20, 207, 1, 'Sim'),(2952, 1, 20, 208, 2, 'Sim'),(2953, 1, 20, 208, 6, 'Sim'),(2954, 1, 20, 208, 13, 'Sim'),(2955, 1, 20, 208, 3, 'Sim'),(2956, 1, 20, 208, 4, 'Sim'),(2957, 1, 20, 208, 8, 'Sim'),(2958, 1, 20, 208, 11, 'Sim'),(2959, 1, 20, 208, 7, 'Sim'),(2960, 1, 20, 208, 9, 'Sim'),(2961, 1, 20, 208, 5, 'Não'),(2962, 1, 20, 208, 12, 'Sim'),(2963, 1, 20, 208, 10, 'Sim'),(2964, 1, 20, 208, 1, 'Sim'),(2965, 1, 20, 209, 2, 'Sim'),(2966, 1, 20, 209, 6, 'Sim'),(2967, 1, 20, 209, 13, 'Sim'),(2968, 1, 20, 209, 3, 'Sim'),(2969, 1, 20, 209, 4, 'Sim'),(2970, 1, 20, 209, 8, 'Sim'),(2971, 1, 20, 209, 11, 'Sim'),(2972, 1, 20, 209, 7, 'Sim'),(2973, 1, 20, 209, 9, 'Sim'),(2974, 1, 20, 209, 5, 'Não'),(2975, 1, 20, 209, 12, 'Sim'),(2976, 1, 20, 209, 10, 'Sim'),(2977, 1, 20, 209, 1, 'Sim'),(2978, 1, 20, 210, 2, 'Sim'),(2979, 1, 20, 210, 6, 'Sim'),(2980, 1, 20, 210, 13, 'Sim'),(2981, 1, 20, 210, 3, 'Sim'),(2982, 1, 20, 210, 4, 'Sim'),(2983, 1, 20, 210, 8, 'Sim'),(2984, 1, 20, 210, 11, 'Sim'),(2985, 1, 20, 210, 7, 'Sim'),(2986, 1, 20, 210, 9, 'Sim'),(2987, 1, 20, 210, 5, 'Não'),(2988, 1, 20, 210, 12, 'Sim'),(2989, 1, 20, 210, 10, 'Sim'),(2990, 1, 20, 210, 1, 'Sim'),(2991, 1, 20, 211, 2, 'Sim'),(2992, 1, 20, 211, 6, 'Sim'),(2993, 1, 20, 211, 13, 'Sim'),(2994, 1, 20, 211, 3, 'Sim'),(2995, 1, 20, 211, 4, 'Sim'),(2996, 1, 20, 211, 8, 'Sim'),(2997, 1, 20, 211, 11, 'Sim'),(2998, 1, 20, 211, 7, 'Sim'),(2999, 1, 20, 211, 9, 'Sim'),(3000, 1, 20, 211, 5, 'Não'),(3001, 1, 20, 211, 12, 'Sim'),(3002, 1, 20, 211, 10, 'Sim'),(3003, 1, 20, 211, 1, 'Sim'),(3004, 1, 20, 212, 2, 'Sim'),(3005, 1, 20, 212, 6, 'Sim'),(3006, 1, 20, 212, 13, 'Sim'),(3007, 1, 20, 212, 3, 'Sim'),(3008, 1, 20, 212, 4, 'Sim'),(3009, 1, 20, 212, 8, 'Sim'),(3010, 1, 20, 212, 11, 'Sim'),(3011, 1, 20, 212, 7, 'Sim'),(3012, 1, 20, 212, 9, 'Sim'),(3013, 1, 20, 212, 5, 'Não'),(3014, 1, 20, 212, 12, 'Sim'),(3015, 1, 20, 212, 10, 'Sim'),(3016, 1, 20, 212, 1, 'Sim'),(3017, 1, 20, 213, 2, 'Sim'),(3018, 1, 20, 213, 6, 'Sim'),(3019, 1, 20, 213, 13, 'Sim'),(3020, 1, 20, 213, 3, 'Sim'),(3021, 1, 20, 213, 4, 'Sim'),(3022, 1, 20, 213, 8, 'Sim'),(3023, 1, 20, 213, 11, 'Sim'),(3024, 1, 20, 213, 7, 'Sim'),(3025, 1, 20, 213, 9, 'Sim'),(3026, 1, 20, 213, 5, 'Não'),(3027, 1, 20, 213, 12, 'Sim'),(3028, 1, 20, 213, 10, 'Sim'),(3029, 1, 20, 213, 1, 'Sim'),(3030, 1, 20, 214, 2, 'Sim'),(3031, 1, 20, 214, 6, 'Sim'),(3032, 1, 20, 214, 13, 'Sim'),(3033, 1, 20, 214, 3, 'Sim'),(3034, 1, 20, 214, 4, 'Sim'),(3035, 1, 20, 214, 8, 'Sim'),(3036, 1, 20, 214, 11, 'Sim'),(3037, 1, 20, 214, 7, 'Sim'),(3038, 1, 20, 214, 9, 'Sim'),(3039, 1, 20, 214, 5, 'Não'),(3040, 1, 20, 214, 12, 'Sim'),(3041, 1, 20, 214, 10, 'Sim'),(3042, 1, 20, 214, 1, 'Sim'),(3043, 1, 20, 215, 2, 'Sim'),(3044, 1, 20, 215, 6, 'Sim'),(3045, 1, 20, 215, 13, 'Sim'),(3046, 1, 20, 215, 3, 'Sim'),(3047, 1, 20, 215, 4, 'Sim'),(3048, 1, 20, 215, 8, 'Sim'),(3049, 1, 20, 215, 11, 'Sim'),(3050, 1, 20, 215, 7, 'Sim'),(3051, 1, 20, 215, 9, 'Sim'),(3052, 1, 20, 215, 5, 'Não'),(3053, 1, 20, 215, 12, 'Sim'),(3054, 1, 20, 215, 10, 'Sim'),(3055, 1, 20, 215, 1, 'Sim'),(3056, 1, 20, 216, 2, 'Sim'),(3057, 1, 20, 216, 6, 'Sim'),(3058, 1, 20, 216, 13, 'Sim'),(3059, 1, 20, 216, 3, 'Sim'),(3060, 1, 20, 216, 4, 'Sim'),(3061, 1, 20, 216, 8, 'Sim'),(3062, 1, 20, 216, 11, 'Sim'),(3063, 1, 20, 216, 7, 'Sim'),(3064, 1, 20, 216, 9, 'Sim'),(3065, 1, 20, 216, 5, 'Não'),(3066, 1, 20, 216, 12, 'Sim'),(3067, 1, 20, 216, 10, 'Sim'),(3068, 1, 20, 216, 1, 'Sim'),(3069, 1, 20, 217, 2, 'Sim'),(3070, 1, 20, 217, 6, 'Sim'),(3071, 1, 20, 217, 13, 'Sim'),(3072, 1, 20, 217, 3, 'Sim'),(3073, 1, 20, 217, 4, 'Sim'),(3074, 1, 20, 217, 8, 'Sim'),(3075, 1, 20, 217, 11, 'Sim'),(3076, 1, 20, 217, 7, 'Sim'),(3077, 1, 20, 217, 9, 'Sim'),(3078, 1, 20, 217, 5, 'Não'),(3079, 1, 20, 217, 12, 'Sim'),(3080, 1, 20, 217, 10, 'Sim'),(3081, 1, 20, 217, 1, 'Sim'),(3082, 1, 20, 218, 2, 'Sim'),(3083, 1, 20, 218, 6, 'Sim'),(3084, 1, 20, 218, 13, 'Sim'),(3085, 1, 20, 218, 3, 'Sim'),(3086, 1, 20, 218, 4, 'Sim'),(3087, 1, 20, 218, 8, 'Sim'),(3088, 1, 20, 218, 11, 'Sim'),(3089, 1, 20, 218, 7, 'Sim'),(3090, 1, 20, 218, 9, 'Sim'),(3091, 1, 20, 218, 5, 'Não'),(3092, 1, 20, 218, 12, 'Sim'),(3093, 1, 20, 218, 10, 'Sim'),(3094, 1, 20, 218, 1, 'Sim'),(3095, 1, 20, 219, 2, 'Sim'),(3096, 1, 20, 219, 6, 'Sim'),(3097, 1, 20, 219, 13, 'Sim'),(3098, 1, 20, 219, 3, 'Sim'),(3099, 1, 20, 219, 4, 'Sim'),(3100, 1, 20, 219, 8, 'Sim'),(3101, 1, 20, 219, 11, 'Sim'),(3102, 1, 20, 219, 7, 'Sim'),(3103, 1, 20, 219, 9, 'Sim'),(3104, 1, 20, 219, 5, 'Não'),(3105, 1, 20, 219, 12, 'Sim'),(3106, 1, 20, 219, 10, 'Sim'),(3107, 1, 20, 219, 1, 'Sim'),(3108, 1, 20, 220, 2, 'Sim'),(3109, 1, 20, 220, 6, 'Sim'),(3110, 1, 20, 220, 13, 'Sim'),(3111, 1, 20, 220, 3, 'Sim'),(3112, 1, 20, 220, 4, 'Sim'),(3113, 1, 20, 220, 8, 'Sim'),(3114, 1, 20, 220, 11, 'Sim'),(3115, 1, 20, 220, 7, 'Sim'),(3116, 1, 20, 220, 9, 'Sim'),(3117, 1, 20, 220, 5, 'Não'),(3118, 1, 20, 220, 12, 'Sim'),(3119, 1, 20, 220, 10, 'Sim'),(3120, 1, 20, 220, 1, 'Sim'),(3121, 1, 20, 221, 2, 'Sim'),(3122, 1, 20, 221, 6, 'Sim'),(3123, 1, 20, 221, 13, 'Sim'),(3124, 1, 20, 221, 3, 'Sim'),(3125, 1, 20, 221, 4, 'Sim'),(3126, 1, 20, 221, 8, 'Sim'),(3127, 1, 20, 221, 11, 'Sim'),(3128, 1, 20, 221, 7, 'Sim'),(3129, 1, 20, 221, 9, 'Sim'),(3130, 1, 20, 221, 5, 'Não'),(3131, 1, 20, 221, 12, 'Sim'),(3132, 1, 20, 221, 10, 'Sim'),(3133, 1, 20, 221, 1, 'Sim'),(3134, 1, 20, 222, 2, 'Sim'),(3135, 1, 20, 222, 6, 'Sim'),(3136, 1, 20, 222, 13, 'Sim'),(3137, 1, 20, 222, 3, 'Sim'),(3138, 1, 20, 222, 4, 'Sim'),(3139, 1, 20, 222, 8, 'Sim'),(3140, 1, 20, 222, 11, 'Sim'),(3141, 1, 20, 222, 7, 'Sim'),(3142, 1, 20, 222, 9, 'Sim'),(3143, 1, 20, 222, 5, 'Não'),(3144, 1, 20, 222, 12, 'Sim'),(3145, 1, 20, 222, 10, 'Sim'),(3146, 1, 20, 222, 1, 'Sim'),(3147, 1, 20, 223, 2, 'Sim'),(3148, 1, 20, 223, 6, 'Sim'),(3149, 1, 20, 223, 13, 'Sim'),(3150, 1, 20, 223, 3, 'Sim'),(3151, 1, 20, 223, 4, 'Sim'),(3152, 1, 20, 223, 8, 'Sim'),(3153, 1, 20, 223, 11, 'Sim'),(3154, 1, 20, 223, 7, 'Sim'),(3155, 1, 20, 223, 9, 'Sim'),(3156, 1, 20, 223, 5, 'Não'),(3157, 1, 20, 223, 12, 'Sim'),(3158, 1, 20, 223, 10, 'Sim'),(3159, 1, 20, 223, 1, 'Sim'),(3160, 1, 20, 224, 2, 'Sim'),(3161, 1, 20, 224, 6, 'Sim'),(3162, 1, 20, 224, 13, 'Sim'),(3163, 1, 20, 224, 3, 'Sim'),(3164, 1, 20, 224, 4, 'Sim'),(3165, 1, 20, 224, 8, 'Sim'),(3166, 1, 20, 224, 11, 'Sim'),(3167, 1, 20, 224, 7, 'Sim'),(3168, 1, 20, 224, 9, 'Sim'),(3169, 1, 20, 224, 5, 'Não'),(3170, 1, 20, 224, 12, 'Sim'),(3171, 1, 20, 224, 10, 'Sim'),(3172, 1, 20, 224, 1, 'Sim'),(3173, 1, 20, 225, 2, 'Sim'),(3174, 1, 20, 225, 6, 'Sim'),(3175, 1, 20, 225, 13, 'Sim'),(3176, 1, 20, 225, 3, 'Sim'),(3177, 1, 20, 225, 4, 'Sim'),(3178, 1, 20, 225, 8, 'Sim'),(3179, 1, 20, 225, 11, 'Sim'),(3180, 1, 20, 225, 7, 'Sim'),(3181, 1, 20, 225, 9, 'Sim'),(3182, 1, 20, 225, 5, 'Não'),(3183, 1, 20, 225, 12, 'Sim'),(3184, 1, 20, 225, 10, 'Sim'),(3185, 1, 20, 225, 1, 'Sim'),(3186, 1, 20, 226, 2, 'Sim'),(3187, 1, 20, 226, 6, 'Sim'),(3188, 1, 20, 226, 13, 'Sim'),(3189, 1, 20, 226, 3, 'Sim'),(3190, 1, 20, 226, 4, 'Sim'),(3191, 1, 20, 226, 8, 'Sim'),(3192, 1, 20, 226, 11, 'Sim'),(3193, 1, 20, 226, 7, 'Sim'),(3194, 1, 20, 226, 9, 'Sim'),(3195, 1, 20, 226, 5, 'Não'),(3196, 1, 20, 226, 12, 'Sim'),(3197, 1, 20, 226, 10, 'Sim'),(3198, 1, 20, 226, 1, 'Sim'),(3199, 1, 20, 227, 2, 'Sim'),(3200, 1, 20, 227, 6, 'Sim'),(3201, 1, 20, 227, 13, 'Sim'),(3202, 1, 20, 227, 3, 'Sim'),(3203, 1, 20, 227, 4, 'Sim'),(3204, 1, 20, 227, 8, 'Sim'),(3205, 1, 20, 227, 11, 'Sim'),(3206, 1, 20, 227, 7, 'Sim'),(3207, 1, 20, 227, 9, 'Sim'),(3208, 1, 20, 227, 5, 'Não'),(3209, 1, 20, 227, 12, 'Sim'),(3210, 1, 20, 227, 10, 'Sim'),(3211, 1, 20, 227, 1, 'Sim'),(3212, 1, 20, 228, 2, 'Sim'),(3213, 1, 20, 228, 6, 'Sim'),(3214, 1, 20, 228, 13, 'Sim'),(3215, 1, 20, 228, 3, 'Sim'),(3216, 1, 20, 228, 4, 'Sim'),(3217, 1, 20, 228, 8, 'Sim'),(3218, 1, 20, 228, 11, 'Sim'),(3219, 1, 20, 228, 7, 'Sim'),(3220, 1, 20, 228, 9, 'Sim'),(3221, 1, 20, 228, 5, 'Não'),(3222, 1, 20, 228, 12, 'Sim'),(3223, 1, 20, 228, 10, 'Sim'),(3224, 1, 20, 228, 1, 'Sim'),(3225, 1, 20, 229, 2, 'Sim'),(3226, 1, 20, 229, 6, 'Sim'),(3227, 1, 20, 229, 13, 'Sim'),(3228, 1, 20, 229, 3, 'Sim'),(3229, 1, 20, 229, 4, 'Sim'),(3230, 1, 20, 229, 8, 'Sim'),(3231, 1, 20, 229, 11, 'Sim'),(3232, 1, 20, 229, 7, 'Sim'),(3233, 1, 20, 229, 9, 'Sim'),(3234, 1, 20, 229, 5, 'Não'),(3235, 1, 20, 229, 12, 'Sim'),(3236, 1, 20, 229, 10, 'Sim'),(3237, 1, 20, 229, 1, 'Sim'),(3238, 1, 20, 230, 2, 'Sim'),(3239, 1, 20, 230, 6, 'Sim'),(3240, 1, 20, 230, 13, 'Sim'),(3241, 1, 20, 230, 3, 'Sim'),(3242, 1, 20, 230, 4, 'Sim'),(3243, 1, 20, 230, 8, 'Sim'),(3244, 1, 20, 230, 11, 'Sim'),(3245, 1, 20, 230, 7, 'Sim'),(3246, 1, 20, 230, 9, 'Sim'),(3247, 1, 20, 230, 5, 'Não'),(3248, 1, 20, 230, 12, 'Sim'),(3249, 1, 20, 230, 10, 'Sim'),(3250, 1, 20, 230, 1, 'Sim'),(3251, 1, 21, 0, 2, 'Sim'),(3252, 1, 21, 0, 6, 'Sim'),(3253, 1, 21, 0, 13, 'Sim'),(3254, 1, 21, 0, 3, 'Sim'),(3255, 1, 21, 0, 4, 'Sim'),(3256, 1, 21, 0, 8, 'Sim'),(3257, 1, 21, 0, 11, 'Sim'),(3258, 1, 21, 0, 7, 'Sim'),(3259, 1, 21, 0, 9, 'Sim'),(3260, 1, 21, 0, 5, 'Não'),(3261, 1, 21, 0, 12, 'Sim'),(3262, 1, 21, 0, 10, 'Sim'),(3263, 1, 21, 0, 1, 'Sim'),(3264, 1, 21, 231, 2, 'Sim'),(3265, 1, 21, 231, 6, 'Sim'),(3266, 1, 21, 231, 13, 'Sim'),(3267, 1, 21, 231, 3, 'Sim'),(3268, 1, 21, 231, 4, 'Sim'),(3269, 1, 21, 231, 8, 'Sim'),(3270, 1, 21, 231, 11, 'Sim'),(3271, 1, 21, 231, 7, 'Sim'),(3272, 1, 21, 231, 9, 'Sim'),(3273, 1, 21, 231, 5, 'Não'),(3274, 1, 21, 231, 12, 'Sim'),(3275, 1, 21, 231, 10, 'Sim'),(3276, 1, 21, 231, 1, 'Sim'),(3277, 1, 21, 232, 2, 'Sim'),(3278, 1, 21, 232, 6, 'Sim'),(3279, 1, 21, 232, 13, 'Sim'),(3280, 1, 21, 232, 3, 'Sim'),(3281, 1, 21, 232, 4, 'Sim'),(3282, 1, 21, 232, 8, 'Sim'),(3283, 1, 21, 232, 11, 'Sim'),(3284, 1, 21, 232, 7, 'Sim'),(3285, 1, 21, 232, 9, 'Sim'),(3286, 1, 21, 232, 5, 'Não'),(3287, 1, 21, 232, 12, 'Sim'),(3288, 1, 21, 232, 10, 'Sim'),(3289, 1, 21, 232, 1, 'Sim'),(3290, 1, 21, 233, 2, 'Sim'),(3291, 1, 21, 233, 6, 'Sim'),(3292, 1, 21, 233, 13, 'Sim'),(3293, 1, 21, 233, 3, 'Sim'),(3294, 1, 21, 233, 4, 'Sim'),(3295, 1, 21, 233, 8, 'Sim'),(3296, 1, 21, 233, 11, 'Sim'),(3297, 1, 21, 233, 7, 'Sim'),(3298, 1, 21, 233, 9, 'Sim'),(3299, 1, 21, 233, 5, 'Não'),(3300, 1, 21, 233, 12, 'Sim'),(3301, 1, 21, 233, 10, 'Sim'),(3302, 1, 21, 233, 1, 'Sim'),(3303, 1, 21, 234, 2, 'Sim'),(3304, 1, 21, 234, 6, 'Sim'),(3305, 1, 21, 234, 13, 'Sim'),(3306, 1, 21, 234, 3, 'Sim'),(3307, 1, 21, 234, 4, 'Sim'),(3308, 1, 21, 234, 8, 'Sim'),(3309, 1, 21, 234, 11, 'Sim'),(3310, 1, 21, 234, 7, 'Sim'),(3311, 1, 21, 234, 9, 'Sim'),(3312, 1, 21, 234, 5, 'Não'),(3313, 1, 21, 234, 12, 'Sim'),(3314, 1, 21, 234, 10, 'Sim'),(3315, 1, 21, 234, 1, 'Sim'),(3316, 1, 21, 235, 2, 'Sim'),(3317, 1, 21, 235, 6, 'Sim'),(3318, 1, 21, 235, 13, 'Sim'),(3319, 1, 21, 235, 3, 'Sim'),(3320, 1, 21, 235, 4, 'Sim'),(3321, 1, 21, 235, 8, 'Sim'),(3322, 1, 21, 235, 11, 'Sim'),(3323, 1, 21, 235, 7, 'Sim'),(3324, 1, 21, 235, 9, 'Sim'),(3325, 1, 21, 235, 5, 'Não'),(3326, 1, 21, 235, 12, 'Sim'),(3327, 1, 21, 235, 10, 'Sim'),(3328, 1, 21, 235, 1, 'Sim'),(3329, 1, 21, 236, 2, 'Sim'),(3330, 1, 21, 236, 6, 'Sim'),(3331, 1, 21, 236, 13, 'Sim'),(3332, 1, 21, 236, 3, 'Sim'),(3333, 1, 21, 236, 4, 'Sim'),(3334, 1, 21, 236, 8, 'Sim'),(3335, 1, 21, 236, 11, 'Sim'),(3336, 1, 21, 236, 7, 'Sim'),(3337, 1, 21, 236, 9, 'Sim'),(3338, 1, 21, 236, 5, 'Não'),(3339, 1, 21, 236, 12, 'Sim'),(3340, 1, 21, 236, 10, 'Sim'),(3341, 1, 21, 236, 1, 'Sim'),(3342, 1, 21, 237, 2, 'Sim'),(3343, 1, 21, 237, 6, 'Sim'),(3344, 1, 21, 237, 13, 'Sim'),(3345, 1, 21, 237, 3, 'Sim'),(3346, 1, 21, 237, 4, 'Sim'),(3347, 1, 21, 237, 8, 'Sim'),(3348, 1, 21, 237, 11, 'Sim'),(3349, 1, 21, 237, 7, 'Sim'),(3350, 1, 21, 237, 9, 'Sim'),(3351, 1, 21, 237, 5, 'Não'),(3352, 1, 21, 237, 12, 'Sim'),(3353, 1, 21, 237, 10, 'Sim'),(3354, 1, 21, 237, 1, 'Sim'),(3355, 1, 21, 238, 2, 'Sim'),(3356, 1, 21, 238, 6, 'Sim'),(3357, 1, 21, 238, 13, 'Sim'),(3358, 1, 21, 238, 3, 'Sim'),(3359, 1, 21, 238, 4, 'Sim'),(3360, 1, 21, 238, 8, 'Sim'),(3361, 1, 21, 238, 11, 'Sim'),(3362, 1, 21, 238, 7, 'Sim'),(3363, 1, 21, 238, 9, 'Sim'),(3364, 1, 21, 238, 5, 'Não'),(3365, 1, 21, 238, 12, 'Sim'),(3366, 1, 21, 238, 10, 'Sim'),(3367, 1, 21, 238, 1, 'Sim'),(3368, 1, 21, 239, 2, 'Sim'),(3369, 1, 21, 239, 6, 'Sim'),(3370, 1, 21, 239, 13, 'Sim'),(3371, 1, 21, 239, 3, 'Sim'),(3372, 1, 21, 239, 4, 'Sim'),(3373, 1, 21, 239, 8, 'Sim'),(3374, 1, 21, 239, 11, 'Sim'),(3375, 1, 21, 239, 7, 'Sim'),(3376, 1, 21, 239, 9, 'Sim'),(3377, 1, 21, 239, 5, 'Não'),(3378, 1, 21, 239, 12, 'Sim'),(3379, 1, 21, 239, 10, 'Sim'),(3380, 1, 21, 239, 1, 'Sim'),(3381, 1, 21, 240, 2, 'Sim'),(3382, 1, 21, 240, 6, 'Sim'),(3383, 1, 21, 240, 13, 'Sim'),(3384, 1, 21, 240, 3, 'Sim'),(3385, 1, 21, 240, 4, 'Sim'),(3386, 1, 21, 240, 8, 'Sim'),(3387, 1, 21, 240, 11, 'Sim'),(3388, 1, 21, 240, 7, 'Sim'),(3389, 1, 21, 240, 9, 'Sim'),(3390, 1, 21, 240, 5, 'Não'),(3391, 1, 21, 240, 12, 'Sim'),(3392, 1, 21, 240, 10, 'Sim'),(3393, 1, 21, 240, 1, 'Sim'),(3394, 1, 21, 241, 2, 'Sim'),(3395, 1, 21, 241, 6, 'Sim'),(3396, 1, 21, 241, 13, 'Sim'),(3397, 1, 21, 241, 3, 'Sim'),(3398, 1, 21, 241, 4, 'Sim'),(3399, 1, 21, 241, 8, 'Sim'),(3400, 1, 21, 241, 11, 'Sim'),(3401, 1, 21, 241, 7, 'Sim'),(3402, 1, 21, 241, 9, 'Sim'),(3403, 1, 21, 241, 5, 'Não'),(3404, 1, 21, 241, 12, 'Sim'),(3405, 1, 21, 241, 10, 'Sim'),(3406, 1, 21, 241, 1, 'Sim'),(3407, 1, 21, 242, 2, 'Sim'),(3408, 1, 21, 242, 6, 'Sim'),(3409, 1, 21, 242, 13, 'Sim'),(3410, 1, 21, 242, 3, 'Sim'),(3411, 1, 21, 242, 4, 'Sim'),(3412, 1, 21, 242, 8, 'Sim'),(3413, 1, 21, 242, 11, 'Sim'),(3414, 1, 21, 242, 7, 'Sim'),(3415, 1, 21, 242, 9, 'Sim'),(3416, 1, 21, 242, 5, 'Não'),(3417, 1, 21, 242, 12, 'Sim'),(3418, 1, 21, 242, 10, 'Sim'),(3419, 1, 21, 242, 1, 'Sim'),(3420, 1, 21, 243, 2, 'Sim'),(3421, 1, 21, 243, 6, 'Sim'),(3422, 1, 21, 243, 13, 'Sim'),(3423, 1, 21, 243, 3, 'Sim'),(3424, 1, 21, 243, 4, 'Sim'),(3425, 1, 21, 243, 8, 'Sim'),(3426, 1, 21, 243, 11, 'Sim'),(3427, 1, 21, 243, 7, 'Sim'),(3428, 1, 21, 243, 9, 'Sim'),(3429, 1, 21, 243, 5, 'Não'),(3430, 1, 21, 243, 12, 'Sim'),(3431, 1, 21, 243, 10, 'Sim'),(3432, 1, 21, 243, 1, 'Sim'),(3433, 1, 21, 244, 2, 'Sim'),(3434, 1, 21, 244, 6, 'Sim'),(3435, 1, 21, 244, 13, 'Sim'),(3436, 1, 21, 244, 3, 'Sim'),(3437, 1, 21, 244, 4, 'Sim'),(3438, 1, 21, 244, 8, 'Sim'),(3439, 1, 21, 244, 11, 'Sim'),(3440, 1, 21, 244, 7, 'Sim'),(3441, 1, 21, 244, 9, 'Sim'),(3442, 1, 21, 244, 5, 'Não'),(3443, 1, 21, 244, 12, 'Sim'),(3444, 1, 21, 244, 10, 'Sim'),(3445, 1, 21, 244, 1, 'Sim'),(3446, 1, 21, 245, 2, 'Sim'),(3447, 1, 21, 245, 6, 'Sim'),(3448, 1, 21, 245, 13, 'Sim'),(3449, 1, 21, 245, 3, 'Sim'),(3450, 1, 21, 245, 4, 'Sim'),(3451, 1, 21, 245, 8, 'Sim'),(3452, 1, 21, 245, 11, 'Sim'),(3453, 1, 21, 245, 7, 'Sim'),(3454, 1, 21, 245, 9, 'Sim'),(3455, 1, 21, 245, 5, 'Não'),(3456, 1, 21, 245, 12, 'Sim'),(3457, 1, 21, 245, 10, 'Sim'),(3458, 1, 21, 245, 1, 'Sim'),(3459, 1, 21, 246, 2, 'Sim'),(3460, 1, 21, 246, 6, 'Sim'),(3461, 1, 21, 246, 13, 'Sim'),(3462, 1, 21, 246, 3, 'Sim'),(3463, 1, 21, 246, 4, 'Sim'),(3464, 1, 21, 246, 8, 'Sim'),(3465, 1, 21, 246, 11, 'Sim'),(3466, 1, 21, 246, 7, 'Sim'),(3467, 1, 21, 246, 9, 'Sim'),(3468, 1, 21, 246, 5, 'Não'),(3469, 1, 21, 246, 12, 'Sim'),(3470, 1, 21, 246, 10, 'Sim'),(3471, 1, 21, 246, 1, 'Sim'),(3472, 1, 21, 247, 2, 'Sim'),(3473, 1, 21, 247, 6, 'Sim'),(3474, 1, 21, 247, 13, 'Sim'),(3475, 1, 21, 247, 3, 'Sim'),(3476, 1, 21, 247, 4, 'Sim'),(3477, 1, 21, 247, 8, 'Sim'),(3478, 1, 21, 247, 11, 'Sim'),(3479, 1, 21, 247, 7, 'Sim'),(3480, 1, 21, 247, 9, 'Sim'),(3481, 1, 21, 247, 5, 'Não'),(3482, 1, 21, 247, 12, 'Sim'),(3483, 1, 21, 247, 10, 'Sim'),(3484, 1, 21, 247, 1, 'Sim'),(3485, 1, 21, 248, 2, 'Sim'),(3486, 1, 21, 248, 6, 'Sim'),(3487, 1, 21, 248, 13, 'Sim'),(3488, 1, 21, 248, 3, 'Sim'),(3489, 1, 21, 248, 4, 'Sim'),(3490, 1, 21, 248, 8, 'Sim'),(3491, 1, 21, 248, 11, 'Sim'),(3492, 1, 21, 248, 7, 'Sim'),(3493, 1, 21, 248, 9, 'Sim'),(3494, 1, 21, 248, 5, 'Não'),(3495, 1, 21, 248, 12, 'Sim'),(3496, 1, 21, 248, 10, 'Sim'),(3497, 1, 21, 248, 1, 'Sim'),(3498, 1, 21, 249, 2, 'Sim'),(3499, 1, 21, 249, 6, 'Sim'),(3500, 1, 21, 249, 13, 'Sim'),(3501, 1, 21, 249, 3, 'Sim'),(3502, 1, 21, 249, 4, 'Sim'),(3503, 1, 21, 249, 8, 'Sim'),(3504, 1, 21, 249, 11, 'Sim'),(3505, 1, 21, 249, 7, 'Sim'),(3506, 1, 21, 249, 9, 'Sim'),(3507, 1, 21, 249, 5, 'Não'),(3508, 1, 21, 249, 12, 'Sim'),(3509, 1, 21, 249, 10, 'Sim'),(3510, 1, 21, 249, 1, 'Sim'),(3511, 1, 21, 250, 2, 'Sim'),(3512, 1, 21, 250, 6, 'Sim'),(3513, 1, 21, 250, 13, 'Sim'),(3514, 1, 21, 250, 3, 'Sim'),(3515, 1, 21, 250, 4, 'Sim'),(3516, 1, 21, 250, 8, 'Sim'),(3517, 1, 21, 250, 11, 'Sim'),(3518, 1, 21, 250, 7, 'Sim'),(3519, 1, 21, 250, 9, 'Sim'),(3520, 1, 21, 250, 5, 'Não'),(3521, 1, 21, 250, 12, 'Sim'),(3522, 1, 21, 250, 10, 'Sim'),(3523, 1, 21, 250, 1, 'Sim'),(3524, 1, 21, 251, 2, 'Sim'),(3525, 1, 21, 251, 6, 'Sim'),(3526, 1, 21, 251, 13, 'Sim'),(3527, 1, 21, 251, 3, 'Sim'),(3528, 1, 21, 251, 4, 'Sim'),(3529, 1, 21, 251, 8, 'Sim'),(3530, 1, 21, 251, 11, 'Sim'),(3531, 1, 21, 251, 7, 'Sim'),(3532, 1, 21, 251, 9, 'Sim'),(3533, 1, 21, 251, 5, 'Não'),(3534, 1, 21, 251, 12, 'Sim'),(3535, 1, 21, 251, 10, 'Sim'),(3536, 1, 21, 251, 1, 'Sim'),(3537, 1, 21, 252, 2, 'Sim'),(3538, 1, 21, 252, 6, 'Sim'),(3539, 1, 21, 252, 13, 'Sim'),(3540, 1, 21, 252, 3, 'Sim'),(3541, 1, 21, 252, 4, 'Sim'),(3542, 1, 21, 252, 8, 'Sim'),(3543, 1, 21, 252, 11, 'Sim'),(3544, 1, 21, 252, 7, 'Sim'),(3545, 1, 21, 252, 9, 'Sim'),(3546, 1, 21, 252, 5, 'Não'),(3547, 1, 21, 252, 12, 'Sim'),(3548, 1, 21, 252, 10, 'Sim'),(3549, 1, 21, 252, 1, 'Sim'),(3550, 1, 21, 253, 2, 'Sim'),(3551, 1, 21, 253, 6, 'Sim'),(3552, 1, 21, 253, 13, 'Sim'),(3553, 1, 21, 253, 3, 'Sim'),(3554, 1, 21, 253, 4, 'Sim'),(3555, 1, 21, 253, 8, 'Sim'),(3556, 1, 21, 253, 11, 'Sim'),(3557, 1, 21, 253, 7, 'Sim'),(3558, 1, 21, 253, 9, 'Sim'),(3559, 1, 21, 253, 5, 'Não'),(3560, 1, 21, 253, 12, 'Sim'),(3561, 1, 21, 253, 10, 'Sim'),(3562, 1, 21, 253, 1, 'Sim'),(3563, 1, 21, 254, 2, 'Sim'),(3564, 1, 21, 254, 6, 'Sim'),(3565, 1, 21, 254, 13, 'Sim'),(3566, 1, 21, 254, 3, 'Sim'),(3567, 1, 21, 254, 4, 'Sim'),(3568, 1, 21, 254, 8, 'Sim'),(3569, 1, 21, 254, 11, 'Sim'),(3570, 1, 21, 254, 7, 'Sim'),(3571, 1, 21, 254, 9, 'Sim'),(3572, 1, 21, 254, 5, 'Não'),(3573, 1, 21, 254, 12, 'Sim'),(3574, 1, 21, 254, 10, 'Sim'),(3575, 1, 21, 254, 1, 'Sim'),(3576, 1, 21, 255, 2, 'Sim'),(3577, 1, 21, 255, 6, 'Sim'),(3578, 1, 21, 255, 13, 'Sim'),(3579, 1, 21, 255, 3, 'Sim'),(3580, 1, 21, 255, 4, 'Sim'),(3581, 1, 21, 255, 8, 'Sim'),(3582, 1, 21, 255, 11, 'Sim'),(3583, 1, 21, 255, 7, 'Sim'),(3584, 1, 21, 255, 9, 'Sim'),(3585, 1, 21, 255, 5, 'Não'),(3586, 1, 21, 255, 12, 'Sim'),(3587, 1, 21, 255, 10, 'Sim'),(3588, 1, 21, 255, 1, 'Sim'),(3589, 1, 21, 256, 2, 'Sim'),(3590, 1, 21, 256, 6, 'Sim'),(3591, 1, 21, 256, 13, 'Sim'),(3592, 1, 21, 256, 3, 'Sim'),(3593, 1, 21, 256, 4, 'Sim'),(3594, 1, 21, 256, 8, 'Sim'),(3595, 1, 21, 256, 11, 'Sim'),(3596, 1, 21, 256, 7, 'Sim'),(3597, 1, 21, 256, 9, 'Sim'),(3598, 1, 21, 256, 5, 'Não'),(3599, 1, 21, 256, 12, 'Sim'),(3600, 1, 21, 256, 10, 'Sim'),(3601, 1, 21, 256, 1, 'Sim'),(3602, 1, 21, 257, 2, 'Sim'),(3603, 1, 21, 257, 6, 'Sim'),(3604, 1, 21, 257, 13, 'Sim'),(3605, 1, 21, 257, 3, 'Sim'),(3606, 1, 21, 257, 4, 'Sim'),(3607, 1, 21, 257, 8, 'Sim'),(3608, 1, 21, 257, 11, 'Sim'),(3609, 1, 21, 257, 7, 'Sim'),(3610, 1, 21, 257, 9, 'Sim'),(3611, 1, 21, 257, 5, 'Não'),(3612, 1, 21, 257, 12, 'Sim'),(3613, 1, 21, 257, 10, 'Sim'),(3614, 1, 21, 257, 1, 'Sim'),(3615, 1, 21, 258, 2, 'Sim'),(3616, 1, 21, 258, 6, 'Sim'),(3617, 1, 21, 258, 13, 'Sim'),(3618, 1, 21, 258, 3, 'Sim'),(3619, 1, 21, 258, 4, 'Sim'),(3620, 1, 21, 258, 8, 'Sim'),(3621, 1, 21, 258, 11, 'Sim'),(3622, 1, 21, 258, 7, 'Sim'),(3623, 1, 21, 258, 9, 'Sim'),(3624, 1, 21, 258, 5, 'Não'),(3625, 1, 21, 258, 12, 'Sim'),(3626, 1, 21, 258, 10, 'Sim'),(3627, 1, 21, 258, 1, 'Sim'),(3628, 1, 21, 259, 2, 'Sim'),(3629, 1, 21, 259, 6, 'Sim'),(3630, 1, 21, 259, 13, 'Sim'),(3631, 1, 21, 259, 3, 'Sim'),(3632, 1, 21, 259, 4, 'Sim'),(3633, 1, 21, 259, 8, 'Sim'),(3634, 1, 21, 259, 11, 'Sim'),(3635, 1, 21, 259, 7, 'Sim'),(3636, 1, 21, 259, 9, 'Sim'),(3637, 1, 21, 259, 5, 'Não'),(3638, 1, 21, 259, 12, 'Sim'),(3639, 1, 21, 259, 10, 'Sim'),(3640, 1, 21, 259, 1, 'Sim'),(3641, 1, 21, 260, 2, 'Sim'),(3642, 1, 21, 260, 6, 'Sim'),(3643, 1, 21, 260, 13, 'Sim'),(3644, 1, 21, 260, 3, 'Sim'),(3645, 1, 21, 260, 4, 'Sim'),(3646, 1, 21, 260, 8, 'Sim'),(3647, 1, 21, 260, 11, 'Sim'),(3648, 1, 21, 260, 7, 'Sim'),(3649, 1, 21, 260, 9, 'Sim'),(3650, 1, 21, 260, 5, 'Não'),(3651, 1, 21, 260, 12, 'Sim'),(3652, 1, 21, 260, 10, 'Sim'),(3653, 1, 21, 260, 1, 'Sim'),(3654, 1, 21, 261, 2, 'Sim'),(3655, 1, 21, 261, 6, 'Sim'),(3656, 1, 21, 261, 13, 'Sim'),(3657, 1, 21, 261, 3, 'Sim'),(3658, 1, 21, 261, 4, 'Sim'),(3659, 1, 21, 261, 8, 'Sim'),(3660, 1, 21, 261, 11, 'Sim'),(3661, 1, 21, 261, 7, 'Sim'),(3662, 1, 21, 261, 9, 'Sim'),(3663, 1, 21, 261, 5, 'Não'),(3664, 1, 21, 261, 12, 'Sim'),(3665, 1, 21, 261, 10, 'Sim'),(3666, 1, 21, 261, 1, 'Sim'),(3667, 1, 22, 0, 2, 'Sim'),(3668, 1, 22, 0, 6, 'Sim'),(3669, 1, 22, 0, 13, 'Sim'),(3670, 1, 22, 0, 3, 'Sim'),(3671, 1, 22, 0, 4, 'Sim'),(3672, 1, 22, 0, 8, 'Sim'),(3673, 1, 22, 0, 11, 'Sim'),(3674, 1, 22, 0, 7, 'Sim'),(3675, 1, 22, 0, 9, 'Sim'),(3676, 1, 22, 0, 5, 'Não'),(3677, 1, 22, 0, 12, 'Sim'),(3678, 1, 22, 0, 10, 'Sim'),(3679, 1, 22, 0, 1, 'Sim'),(3680, 1, 22, 262, 2, 'Sim'),(3681, 1, 22, 262, 6, 'Sim'),(3682, 1, 22, 262, 13, 'Sim'),(3683, 1, 22, 262, 3, 'Sim'),(3684, 1, 22, 262, 4, 'Sim'),(3685, 1, 22, 262, 8, 'Sim'),(3686, 1, 22, 262, 11, 'Sim'),(3687, 1, 22, 262, 7, 'Sim'),(3688, 1, 22, 262, 9, 'Sim'),(3689, 1, 22, 262, 5, 'Não'),(3690, 1, 22, 262, 12, 'Sim'),(3691, 1, 22, 262, 10, 'Sim'),(3692, 1, 22, 262, 1, 'Sim'),(3693, 1, 22, 263, 2, 'Sim'),(3694, 1, 22, 263, 6, 'Sim'),(3695, 1, 22, 263, 13, 'Sim'),(3696, 1, 22, 263, 3, 'Sim'),(3697, 1, 22, 263, 4, 'Sim'),(3698, 1, 22, 263, 8, 'Sim'),(3699, 1, 22, 263, 11, 'Sim'),(3700, 1, 22, 263, 7, 'Sim'),(3701, 1, 22, 263, 9, 'Sim'),(3702, 1, 22, 263, 5, 'Não'),(3703, 1, 22, 263, 12, 'Sim'),(3704, 1, 22, 263, 10, 'Sim'),(3705, 1, 22, 263, 1, 'Sim'),(3706, 1, 22, 264, 2, 'Sim'),(3707, 1, 22, 264, 6, 'Sim'),(3708, 1, 22, 264, 13, 'Sim'),(3709, 1, 22, 264, 3, 'Sim'),(3710, 1, 22, 264, 4, 'Sim'),(3711, 1, 22, 264, 8, 'Sim'),(3712, 1, 22, 264, 11, 'Sim'),(3713, 1, 22, 264, 7, 'Sim'),(3714, 1, 22, 264, 9, 'Sim'),(3715, 1, 22, 264, 5, 'Não'),(3716, 1, 22, 264, 12, 'Sim'),(3717, 1, 22, 264, 10, 'Sim'),(3718, 1, 22, 264, 1, 'Sim'),(3719, 1, 22, 265, 2, 'Sim'),(3720, 1, 22, 265, 6, 'Sim'),(3721, 1, 22, 265, 13, 'Sim'),(3722, 1, 22, 265, 3, 'Sim'),(3723, 1, 22, 265, 4, 'Sim'),(3724, 1, 22, 265, 8, 'Sim'),(3725, 1, 22, 265, 11, 'Sim'),(3726, 1, 22, 265, 7, 'Sim'),(3727, 1, 22, 265, 9, 'Sim'),(3728, 1, 22, 265, 5, 'Não'),(3729, 1, 22, 265, 12, 'Sim'),(3730, 1, 22, 265, 10, 'Sim'),(3731, 1, 22, 265, 1, 'Sim'),(3732, 1, 22, 266, 2, 'Sim'),(3733, 1, 22, 266, 6, 'Sim'),(3734, 1, 22, 266, 13, 'Sim'),(3735, 1, 22, 266, 3, 'Sim'),(3736, 1, 22, 266, 4, 'Sim'),(3737, 1, 22, 266, 8, 'Sim'),(3738, 1, 22, 266, 11, 'Sim'),(3739, 1, 22, 266, 7, 'Sim'),(3740, 1, 22, 266, 9, 'Sim'),(3741, 1, 22, 266, 5, 'Não'),(3742, 1, 22, 266, 12, 'Sim'),(3743, 1, 22, 266, 10, 'Sim'),(3744, 1, 22, 266, 1, 'Sim'),(3745, 1, 22, 267, 2, 'Sim'),(3746, 1, 22, 267, 6, 'Sim'),(3747, 1, 22, 267, 13, 'Sim'),(3748, 1, 22, 267, 3, 'Sim'),(3749, 1, 22, 267, 4, 'Sim'),(3750, 1, 22, 267, 8, 'Sim'),(3751, 1, 22, 267, 11, 'Sim'),(3752, 1, 22, 267, 7, 'Sim'),(3753, 1, 22, 267, 9, 'Sim'),(3754, 1, 22, 267, 5, 'Não'),(3755, 1, 22, 267, 12, 'Sim'),(3756, 1, 22, 267, 10, 'Sim'),(3757, 1, 22, 267, 1, 'Sim'),(3758, 1, 22, 268, 2, 'Sim'),(3759, 1, 22, 268, 6, 'Sim'),(3760, 1, 22, 268, 13, 'Sim'),(3761, 1, 22, 268, 3, 'Sim'),(3762, 1, 22, 268, 4, 'Sim'),(3763, 1, 22, 268, 8, 'Sim'),(3764, 1, 22, 268, 11, 'Sim'),(3765, 1, 22, 268, 7, 'Sim'),(3766, 1, 22, 268, 9, 'Sim'),(3767, 1, 22, 268, 5, 'Não'),(3768, 1, 22, 268, 12, 'Sim'),(3769, 1, 22, 268, 10, 'Sim'),(3770, 1, 22, 268, 1, 'Sim'),(3771, 1, 22, 269, 2, 'Sim'),(3772, 1, 22, 269, 6, 'Sim'),(3773, 1, 22, 269, 13, 'Sim'),(3774, 1, 22, 269, 3, 'Sim'),(3775, 1, 22, 269, 4, 'Sim'),(3776, 1, 22, 269, 8, 'Sim'),(3777, 1, 22, 269, 11, 'Sim'),(3778, 1, 22, 269, 7, 'Sim'),(3779, 1, 22, 269, 9, 'Sim'),(3780, 1, 22, 269, 5, 'Não'),(3781, 1, 22, 269, 12, 'Sim'),(3782, 1, 22, 269, 10, 'Sim'),(3783, 1, 22, 269, 1, 'Sim'),(3784, 1, 22, 270, 2, 'Sim'),(3785, 1, 22, 270, 6, 'Sim'),(3786, 1, 22, 270, 13, 'Sim'),(3787, 1, 22, 270, 3, 'Sim'),(3788, 1, 22, 270, 4, 'Sim'),(3789, 1, 22, 270, 8, 'Sim'),(3790, 1, 22, 270, 11, 'Sim'),(3791, 1, 22, 270, 7, 'Sim'),(3792, 1, 22, 270, 9, 'Sim'),(3793, 1, 22, 270, 5, 'Não'),(3794, 1, 22, 270, 12, 'Sim'),(3795, 1, 22, 270, 10, 'Sim'),(3796, 1, 22, 270, 1, 'Sim'),(3797, 1, 22, 271, 2, 'Sim'),(3798, 1, 22, 271, 6, 'Sim'),(3799, 1, 22, 271, 13, 'Sim'),(3800, 1, 22, 271, 3, 'Sim'),(3801, 1, 22, 271, 4, 'Sim'),(3802, 1, 22, 271, 8, 'Sim'),(3803, 1, 22, 271, 11, 'Sim'),(3804, 1, 22, 271, 7, 'Sim'),(3805, 1, 22, 271, 9, 'Sim'),(3806, 1, 22, 271, 5, 'Não'),(3807, 1, 22, 271, 12, 'Sim'),(3808, 1, 22, 271, 10, 'Sim'),(3809, 1, 22, 271, 1, 'Sim'),(3810, 1, 22, 272, 2, 'Sim'),(3811, 1, 22, 272, 6, 'Sim'),(3812, 1, 22, 272, 13, 'Sim'),(3813, 1, 22, 272, 3, 'Sim'),(3814, 1, 22, 272, 4, 'Sim'),(3815, 1, 22, 272, 8, 'Sim'),(3816, 1, 22, 272, 11, 'Sim'),(3817, 1, 22, 272, 7, 'Sim'),(3818, 1, 22, 272, 9, 'Sim'),(3819, 1, 22, 272, 5, 'Não'),(3820, 1, 22, 272, 12, 'Sim'),(3821, 1, 22, 272, 10, 'Sim'),(3822, 1, 22, 272, 1, 'Sim'),(3823, 1, 22, 273, 2, 'Sim'),(3824, 1, 22, 273, 6, 'Sim'),(3825, 1, 22, 273, 13, 'Sim'),(3826, 1, 22, 273, 3, 'Sim'),(3827, 1, 22, 273, 4, 'Sim'),(3828, 1, 22, 273, 8, 'Sim'),(3829, 1, 22, 273, 11, 'Sim'),(3830, 1, 22, 273, 7, 'Sim'),(3831, 1, 22, 273, 9, 'Sim'),(3832, 1, 22, 273, 5, 'Não'),(3833, 1, 22, 273, 12, 'Sim'),(3834, 1, 22, 273, 10, 'Sim'),(3835, 1, 22, 273, 1, 'Sim'),(3836, 1, 22, 274, 2, 'Sim'),(3837, 1, 22, 274, 6, 'Sim'),(3838, 1, 22, 274, 13, 'Sim'),(3839, 1, 22, 274, 3, 'Sim'),(3840, 1, 22, 274, 4, 'Sim'),(3841, 1, 22, 274, 8, 'Sim'),(3842, 1, 22, 274, 11, 'Sim'),(3843, 1, 22, 274, 7, 'Sim'),(3844, 1, 22, 274, 9, 'Sim'),(3845, 1, 22, 274, 5, 'Não'),(3846, 1, 22, 274, 12, 'Sim'),(3847, 1, 22, 274, 10, 'Sim'),(3848, 1, 22, 274, 1, 'Sim'),(3849, 1, 22, 275, 2, 'Sim'),(3850, 1, 22, 275, 6, 'Sim'),(3851, 1, 22, 275, 13, 'Sim'),(3852, 1, 22, 275, 3, 'Sim'),(3853, 1, 22, 275, 4, 'Sim'),(3854, 1, 22, 275, 8, 'Sim'),(3855, 1, 22, 275, 11, 'Sim'),(3856, 1, 22, 275, 7, 'Sim'),(3857, 1, 22, 275, 9, 'Sim'),(3858, 1, 22, 275, 5, 'Não'),(3859, 1, 22, 275, 12, 'Sim'),(3860, 1, 22, 275, 10, 'Sim'),(3861, 1, 22, 275, 1, 'Sim'),(3862, 1, 22, 276, 2, 'Sim'),(3863, 1, 22, 276, 6, 'Sim'),(3864, 1, 22, 276, 13, 'Sim'),(3865, 1, 22, 276, 3, 'Sim'),(3866, 1, 22, 276, 4, 'Sim'),(3867, 1, 22, 276, 8, 'Sim'),(3868, 1, 22, 276, 11, 'Sim'),(3869, 1, 22, 276, 7, 'Sim'),(3870, 1, 22, 276, 9, 'Sim'),(3871, 1, 22, 276, 5, 'Não'),(3872, 1, 22, 276, 12, 'Sim'),(3873, 1, 22, 276, 10, 'Sim'),(3874, 1, 22, 276, 1, 'Sim'),(3875, 1, 22, 277, 2, 'Sim'),(3876, 1, 22, 277, 6, 'Sim'),(3877, 1, 22, 277, 13, 'Sim'),(3878, 1, 22, 277, 3, 'Sim'),(3879, 1, 22, 277, 4, 'Sim'),(3880, 1, 22, 277, 8, 'Sim'),(3881, 1, 22, 277, 11, 'Sim'),(3882, 1, 22, 277, 7, 'Sim'),(3883, 1, 22, 277, 9, 'Sim'),(3884, 1, 22, 277, 5, 'Não'),(3885, 1, 22, 277, 12, 'Sim'),(3886, 1, 22, 277, 10, 'Sim'),(3887, 1, 22, 277, 1, 'Sim'),(3888, 1, 22, 278, 2, 'Sim'),(3889, 1, 22, 278, 6, 'Sim'),(3890, 1, 22, 278, 13, 'Sim'),(3891, 1, 22, 278, 3, 'Sim'),(3892, 1, 22, 278, 4, 'Sim'),(3893, 1, 22, 278, 8, 'Sim'),(3894, 1, 22, 278, 11, 'Sim'),(3895, 1, 22, 278, 7, 'Sim'),(3896, 1, 22, 278, 9, 'Sim'),(3897, 1, 22, 278, 5, 'Não'),(3898, 1, 22, 278, 12, 'Sim'),(3899, 1, 22, 278, 10, 'Sim'),(3900, 1, 22, 278, 1, 'Sim'),(3901, 1, 22, 279, 2, 'Sim'),(3902, 1, 22, 279, 6, 'Sim'),(3903, 1, 22, 279, 13, 'Sim'),(3904, 1, 22, 279, 3, 'Sim'),(3905, 1, 22, 279, 4, 'Sim'),(3906, 1, 22, 279, 8, 'Sim'),(3907, 1, 22, 279, 11, 'Sim'),(3908, 1, 22, 279, 7, 'Sim'),(3909, 1, 22, 279, 9, 'Sim'),(3910, 1, 22, 279, 5, 'Não'),(3911, 1, 22, 279, 12, 'Sim'),(3912, 1, 22, 279, 10, 'Sim'),(3913, 1, 22, 279, 1, 'Sim'),(3914, 1, 23, 0, 2, 'Sim'),(3915, 1, 23, 0, 6, 'Sim'),(3916, 1, 23, 0, 13, 'Sim'),(3917, 1, 23, 0, 3, 'Sim'),(3918, 1, 23, 0, 4, 'Sim'),(3919, 1, 23, 0, 8, 'Sim'),(3920, 1, 23, 0, 11, 'Sim'),(3921, 1, 23, 0, 7, 'Sim'),(3922, 1, 23, 0, 9, 'Sim'),(3923, 1, 23, 0, 5, 'Não'),(3924, 1, 23, 0, 12, 'Sim'),(3925, 1, 23, 0, 10, 'Sim'),(3926, 1, 23, 0, 1, 'Sim'),(3927, 1, 23, 280, 2, 'Sim'),(3928, 1, 23, 280, 6, 'Sim'),(3929, 1, 23, 280, 13, 'Sim'),(3930, 1, 23, 280, 3, 'Sim'),(3931, 1, 23, 280, 4, 'Sim'),(3932, 1, 23, 280, 8, 'Sim'),(3933, 1, 23, 280, 11, 'Sim'),(3934, 1, 23, 280, 7, 'Sim'),(3935, 1, 23, 280, 9, 'Sim'),(3936, 1, 23, 280, 5, 'Não'),(3937, 1, 23, 280, 12, 'Sim'),(3938, 1, 23, 280, 10, 'Sim'),(3939, 1, 23, 280, 1, 'Sim'),(3940, 1, 23, 281, 2, 'Sim'),(3941, 1, 23, 281, 6, 'Sim'),(3942, 1, 23, 281, 13, 'Sim'),(3943, 1, 23, 281, 3, 'Sim'),(3944, 1, 23, 281, 4, 'Sim'),(3945, 1, 23, 281, 8, 'Sim'),(3946, 1, 23, 281, 11, 'Sim'),(3947, 1, 23, 281, 7, 'Sim'),(3948, 1, 23, 281, 9, 'Sim'),(3949, 1, 23, 281, 5, 'Não'),(3950, 1, 23, 281, 12, 'Sim'),(3951, 1, 23, 281, 10, 'Sim'),(3952, 1, 23, 281, 1, 'Sim'),(3953, 1, 23, 282, 2, 'Sim'),(3954, 1, 23, 282, 6, 'Sim'),(3955, 1, 23, 282, 13, 'Sim'),(3956, 1, 23, 282, 3, 'Sim'),(3957, 1, 23, 282, 4, 'Sim'),(3958, 1, 23, 282, 8, 'Sim'),(3959, 1, 23, 282, 11, 'Sim'),(3960, 1, 23, 282, 7, 'Sim'),(3961, 1, 23, 282, 9, 'Sim'),(3962, 1, 23, 282, 5, 'Não'),(3963, 1, 23, 282, 12, 'Sim'),(3964, 1, 23, 282, 10, 'Sim'),(3965, 1, 23, 282, 1, 'Sim'),(3966, 1, 23, 283, 2, 'Sim'),(3967, 1, 23, 283, 6, 'Sim'),(3968, 1, 23, 283, 13, 'Sim'),(3969, 1, 23, 283, 3, 'Sim'),(3970, 1, 23, 283, 4, 'Sim'),(3971, 1, 23, 283, 8, 'Sim'),(3972, 1, 23, 283, 11, 'Sim'),(3973, 1, 23, 283, 7, 'Sim'),(3974, 1, 23, 283, 9, 'Sim'),(3975, 1, 23, 283, 5, 'Não'),(3976, 1, 23, 283, 12, 'Sim'),(3977, 1, 23, 283, 10, 'Sim'),(3978, 1, 23, 283, 1, 'Sim'),(3979, 1, 23, 284, 2, 'Sim'),(3980, 1, 23, 284, 6, 'Sim'),(3981, 1, 23, 284, 13, 'Sim'),(3982, 1, 23, 284, 3, 'Sim'),(3983, 1, 23, 284, 4, 'Sim'),(3984, 1, 23, 284, 8, 'Sim'),(3985, 1, 23, 284, 11, 'Sim'),(3986, 1, 23, 284, 7, 'Sim'),(3987, 1, 23, 284, 9, 'Sim'),(3988, 1, 23, 284, 5, 'Não'),(3989, 1, 23, 284, 12, 'Sim'),(3990, 1, 23, 284, 10, 'Sim'),(3991, 1, 23, 284, 1, 'Sim'),(3992, 1, 23, 285, 2, 'Sim'),(3993, 1, 23, 285, 6, 'Sim'),(3994, 1, 23, 285, 13, 'Sim'),(3995, 1, 23, 285, 3, 'Sim'),(3996, 1, 23, 285, 4, 'Sim'),(3997, 1, 23, 285, 8, 'Sim'),(3998, 1, 23, 285, 11, 'Sim'),(3999, 1, 23, 285, 7, 'Sim'),(4000, 1, 23, 285, 9, 'Sim'),(4001, 1, 23, 285, 5, 'Não'),(4002, 1, 23, 285, 12, 'Sim'),(4003, 1, 23, 285, 10, 'Sim'),(4004, 1, 23, 285, 1, 'Sim'),(4005, 1, 23, 286, 2, 'Sim'),(4006, 1, 23, 286, 6, 'Sim'),(4007, 1, 23, 286, 13, 'Sim'),(4008, 1, 23, 286, 3, 'Sim'),(4009, 1, 23, 286, 4, 'Sim'),(4010, 1, 23, 286, 8, 'Sim'),(4011, 1, 23, 286, 11, 'Sim'),(4012, 1, 23, 286, 7, 'Sim'),(4013, 1, 23, 286, 9, 'Sim'),(4014, 1, 23, 286, 5, 'Não'),(4015, 1, 23, 286, 12, 'Sim'),(4016, 1, 23, 286, 10, 'Sim'),(4017, 1, 23, 286, 1, 'Sim'),(4018, 1, 23, 287, 2, 'Sim'),(4019, 1, 23, 287, 6, 'Sim'),(4020, 1, 23, 287, 13, 'Sim'),(4021, 1, 23, 287, 3, 'Sim'),(4022, 1, 23, 287, 4, 'Sim'),(4023, 1, 23, 287, 8, 'Sim'),(4024, 1, 23, 287, 11, 'Sim'),(4025, 1, 23, 287, 7, 'Sim'),(4026, 1, 23, 287, 9, 'Sim'),(4027, 1, 23, 287, 5, 'Não'),(4028, 1, 23, 287, 12, 'Sim'),(4029, 1, 23, 287, 10, 'Sim'),(4030, 1, 23, 287, 1, 'Sim'),(4031, 1, 23, 288, 2, 'Sim'),(4032, 1, 23, 288, 6, 'Sim'),(4033, 1, 23, 288, 13, 'Sim'),(4034, 1, 23, 288, 3, 'Sim'),(4035, 1, 23, 288, 4, 'Sim'),(4036, 1, 23, 288, 8, 'Sim'),(4037, 1, 23, 288, 11, 'Sim'),(4038, 1, 23, 288, 7, 'Sim'),(4039, 1, 23, 288, 9, 'Sim'),(4040, 1, 23, 288, 5, 'Não'),(4041, 1, 23, 288, 12, 'Sim'),(4042, 1, 23, 288, 10, 'Sim'),(4043, 1, 23, 288, 1, 'Sim'),(4044, 1, 23, 289, 2, 'Sim'),(4045, 1, 23, 289, 6, 'Sim'),(4046, 1, 23, 289, 13, 'Sim'),(4047, 1, 23, 289, 3, 'Sim'),(4048, 1, 23, 289, 4, 'Sim'),(4049, 1, 23, 289, 8, 'Sim'),(4050, 1, 23, 289, 11, 'Sim'),(4051, 1, 23, 289, 7, 'Sim'),(4052, 1, 23, 289, 9, 'Sim'),(4053, 1, 23, 289, 5, 'Não'),(4054, 1, 23, 289, 12, 'Sim'),(4055, 1, 23, 289, 10, 'Sim'),(4056, 1, 23, 289, 1, 'Sim'),(4057, 1, 23, 290, 2, 'Sim'),(4058, 1, 23, 290, 6, 'Sim'),(4059, 1, 23, 290, 13, 'Sim'),(4060, 1, 23, 290, 3, 'Sim'),(4061, 1, 23, 290, 4, 'Sim'),(4062, 1, 23, 290, 8, 'Sim'),(4063, 1, 23, 290, 11, 'Sim'),(4064, 1, 23, 290, 7, 'Sim'),(4065, 1, 23, 290, 9, 'Sim'),(4066, 1, 23, 290, 5, 'Não'),(4067, 1, 23, 290, 12, 'Sim'),(4068, 1, 23, 290, 10, 'Sim'),(4069, 1, 23, 290, 1, 'Sim'),(4070, 1, 23, 291, 2, 'Sim'),(4071, 1, 23, 291, 6, 'Sim'),(4072, 1, 23, 291, 13, 'Sim'),(4073, 1, 23, 291, 3, 'Sim'),(4074, 1, 23, 291, 4, 'Sim'),(4075, 1, 23, 291, 8, 'Sim'),(4076, 1, 23, 291, 11, 'Sim'),(4077, 1, 23, 291, 7, 'Sim'),(4078, 1, 23, 291, 9, 'Sim'),(4079, 1, 23, 291, 5, 'Não'),(4080, 1, 23, 291, 12, 'Sim'),(4081, 1, 23, 291, 10, 'Sim'),(4082, 1, 23, 291, 1, 'Sim'),(4083, 1, 23, 292, 2, 'Sim'),(4084, 1, 23, 292, 6, 'Sim'),(4085, 1, 23, 292, 13, 'Sim'),(4086, 1, 23, 292, 3, 'Sim'),(4087, 1, 23, 292, 4, 'Sim'),(4088, 1, 23, 292, 8, 'Sim'),(4089, 1, 23, 292, 11, 'Sim'),(4090, 1, 23, 292, 7, 'Sim'),(4091, 1, 23, 292, 9, 'Sim'),(4092, 1, 23, 292, 5, 'Não'),(4093, 1, 23, 292, 12, 'Sim'),(4094, 1, 23, 292, 10, 'Sim'),(4095, 1, 23, 292, 1, 'Sim'),(4096, 1, 23, 293, 2, 'Sim'),(4097, 1, 23, 293, 6, 'Sim'),(4098, 1, 23, 293, 13, 'Sim'),(4099, 1, 23, 293, 3, 'Sim'),(4100, 1, 23, 293, 4, 'Sim'),(4101, 1, 23, 293, 8, 'Sim'),(4102, 1, 23, 293, 11, 'Sim'),(4103, 1, 23, 293, 7, 'Sim'),(4104, 1, 23, 293, 9, 'Sim'),(4105, 1, 23, 293, 5, 'Não'),(4106, 1, 23, 293, 12, 'Sim'),(4107, 1, 23, 293, 10, 'Sim'),(4108, 1, 23, 293, 1, 'Sim'),(4109, 1, 23, 294, 2, 'Sim'),(4110, 1, 23, 294, 6, 'Sim'),(4111, 1, 23, 294, 13, 'Sim'),(4112, 1, 23, 294, 3, 'Sim'),(4113, 1, 23, 294, 4, 'Sim'),(4114, 1, 23, 294, 8, 'Sim'),(4115, 1, 23, 294, 11, 'Sim'),(4116, 1, 23, 294, 7, 'Sim'),(4117, 1, 23, 294, 9, 'Sim'),(4118, 1, 23, 294, 5, 'Não'),(4119, 1, 23, 294, 12, 'Sim'),(4120, 1, 23, 294, 10, 'Sim'),(4121, 1, 23, 294, 1, 'Sim'),(4122, 1, 23, 295, 2, 'Sim'),(4123, 1, 23, 295, 6, 'Sim'),(4124, 1, 23, 295, 13, 'Sim'),(4125, 1, 23, 295, 3, 'Sim'),(4126, 1, 23, 295, 4, 'Sim'),(4127, 1, 23, 295, 8, 'Sim'),(4128, 1, 23, 295, 11, 'Sim'),(4129, 1, 23, 295, 7, 'Sim'),(4130, 1, 23, 295, 9, 'Sim'),(4131, 1, 23, 295, 5, 'Não'),(4132, 1, 23, 295, 12, 'Sim'),(4133, 1, 23, 295, 10, 'Sim'),(4134, 1, 23, 295, 1, 'Sim'),(4135, 1, 23, 296, 2, 'Sim'),(4136, 1, 23, 296, 6, 'Sim'),(4137, 1, 23, 296, 13, 'Sim'),(4138, 1, 23, 296, 3, 'Sim'),(4139, 1, 23, 296, 4, 'Sim'),(4140, 1, 23, 296, 8, 'Sim'),(4141, 1, 23, 296, 11, 'Sim'),(4142, 1, 23, 296, 7, 'Sim'),(4143, 1, 23, 296, 9, 'Sim'),(4144, 1, 23, 296, 5, 'Não'),(4145, 1, 23, 296, 12, 'Sim'),(4146, 1, 23, 296, 10, 'Sim'),(4147, 1, 23, 296, 1, 'Sim'),(4148, 1, 23, 297, 2, 'Sim'),(4149, 1, 23, 297, 6, 'Sim'),(4150, 1, 23, 297, 13, 'Sim'),(4151, 1, 23, 297, 3, 'Sim'),(4152, 1, 23, 297, 4, 'Sim'),(4153, 1, 23, 297, 8, 'Sim'),(4154, 1, 23, 297, 11, 'Sim'),(4155, 1, 23, 297, 7, 'Sim'),(4156, 1, 23, 297, 9, 'Sim'),(4157, 1, 23, 297, 5, 'Não'),(4158, 1, 23, 297, 12, 'Sim'),(4159, 1, 23, 297, 10, 'Sim'),(4160, 1, 23, 297, 1, 'Sim'),(4161, 1, 23, 298, 2, 'Sim'),(4162, 1, 23, 298, 6, 'Sim'),(4163, 1, 23, 298, 13, 'Sim'),(4164, 1, 23, 298, 3, 'Sim'),(4165, 1, 23, 298, 4, 'Sim'),(4166, 1, 23, 298, 8, 'Sim'),(4167, 1, 23, 298, 11, 'Sim'),(4168, 1, 23, 298, 7, 'Sim'),(4169, 1, 23, 298, 9, 'Sim'),(4170, 1, 23, 298, 5, 'Não'),(4171, 1, 23, 298, 12, 'Sim'),(4172, 1, 23, 298, 10, 'Sim'),(4173, 1, 23, 298, 1, 'Sim'),(4174, 1, 23, 299, 2, 'Sim'),(4175, 1, 23, 299, 6, 'Sim'),(4176, 1, 23, 299, 13, 'Sim'),(4177, 1, 23, 299, 3, 'Sim'),(4178, 1, 23, 299, 4, 'Sim'),(4179, 1, 23, 299, 8, 'Sim'),(4180, 1, 23, 299, 11, 'Sim'),(4181, 1, 23, 299, 7, 'Sim'),(4182, 1, 23, 299, 9, 'Sim'),(4183, 1, 23, 299, 5, 'Não'),(4184, 1, 23, 299, 12, 'Sim'),(4185, 1, 23, 299, 10, 'Sim'),(4186, 1, 23, 299, 1, 'Sim'),(4187, 1, 23, 300, 2, 'Sim'),(4188, 1, 23, 300, 6, 'Sim'),(4189, 1, 23, 300, 13, 'Sim'),(4190, 1, 23, 300, 3, 'Sim'),(4191, 1, 23, 300, 4, 'Sim'),(4192, 1, 23, 300, 8, 'Sim'),(4193, 1, 23, 300, 11, 'Sim'),(4194, 1, 23, 300, 7, 'Sim'),(4195, 1, 23, 300, 9, 'Sim'),(4196, 1, 23, 300, 5, 'Não'),(4197, 1, 23, 300, 12, 'Sim'),(4198, 1, 23, 300, 10, 'Sim'),(4199, 1, 23, 300, 1, 'Sim'),(4200, 1, 23, 301, 2, 'Sim'),(4201, 1, 23, 301, 6, 'Sim'),(4202, 1, 23, 301, 13, 'Sim'),(4203, 1, 23, 301, 3, 'Sim'),(4204, 1, 23, 301, 4, 'Sim'),(4205, 1, 23, 301, 8, 'Sim'),(4206, 1, 23, 301, 11, 'Sim'),(4207, 1, 23, 301, 7, 'Sim'),(4208, 1, 23, 301, 9, 'Sim'),(4209, 1, 23, 301, 5, 'Não'),(4210, 1, 23, 301, 12, 'Sim'),(4211, 1, 23, 301, 10, 'Sim'),(4212, 1, 23, 301, 1, 'Sim'),(4213, 1, 23, 302, 2, 'Sim'),(4214, 1, 23, 302, 6, 'Sim'),(4215, 1, 23, 302, 13, 'Sim'),(4216, 1, 23, 302, 3, 'Sim'),(4217, 1, 23, 302, 4, 'Sim'),(4218, 1, 23, 302, 8, 'Sim'),(4219, 1, 23, 302, 11, 'Sim'),(4220, 1, 23, 302, 7, 'Sim'),(4221, 1, 23, 302, 9, 'Sim'),(4222, 1, 23, 302, 5, 'Não'),(4223, 1, 23, 302, 12, 'Sim'),(4224, 1, 23, 302, 10, 'Sim'),(4225, 1, 23, 302, 1, 'Sim'),(4226, 1, 23, 303, 2, 'Sim'),(4227, 1, 23, 303, 6, 'Sim'),(4228, 1, 23, 303, 13, 'Sim'),(4229, 1, 23, 303, 3, 'Sim'),(4230, 1, 23, 303, 4, 'Sim'),(4231, 1, 23, 303, 8, 'Sim'),(4232, 1, 23, 303, 11, 'Sim'),(4233, 1, 23, 303, 7, 'Sim'),(4234, 1, 23, 303, 9, 'Sim'),(4235, 1, 23, 303, 5, 'Não'),(4236, 1, 23, 303, 12, 'Sim'),(4237, 1, 23, 303, 10, 'Sim'),(4238, 1, 23, 303, 1, 'Sim'),(4239, 1, 23, 304, 2, 'Sim'),(4240, 1, 23, 304, 6, 'Sim'),(4241, 1, 23, 304, 13, 'Sim'),(4242, 1, 23, 304, 3, 'Sim'),(4243, 1, 23, 304, 4, 'Sim'),(4244, 1, 23, 304, 8, 'Sim'),(4245, 1, 23, 304, 11, 'Sim'),(4246, 1, 23, 304, 7, 'Sim'),(4247, 1, 23, 304, 9, 'Sim'),(4248, 1, 23, 304, 5, 'Não'),(4249, 1, 23, 304, 12, 'Sim'),(4250, 1, 23, 304, 10, 'Sim'),(4251, 1, 23, 304, 1, 'Sim'),(4252, 1, 23, 305, 2, 'Sim'),(4253, 1, 23, 305, 6, 'Sim'),(4254, 1, 23, 305, 13, 'Sim'),(4255, 1, 23, 305, 3, 'Sim'),(4256, 1, 23, 305, 4, 'Sim'),(4257, 1, 23, 305, 8, 'Sim'),(4258, 1, 23, 305, 11, 'Sim'),(4259, 1, 23, 305, 7, 'Sim'),(4260, 1, 23, 305, 9, 'Sim'),(4261, 1, 23, 305, 5, 'Não'),(4262, 1, 23, 305, 12, 'Sim'),(4263, 1, 23, 305, 10, 'Sim'),(4264, 1, 23, 305, 1, 'Sim'),(4265, 1, 24, 0, 2, 'Sim'),(4266, 1, 24, 0, 6, 'Sim'),(4267, 1, 24, 0, 13, 'Sim'),(4268, 1, 24, 0, 3, 'Sim'),(4269, 1, 24, 0, 4, 'Sim'),(4270, 1, 24, 0, 8, 'Sim'),(4271, 1, 24, 0, 11, 'Sim'),(4272, 1, 24, 0, 7, 'Sim'),(4273, 1, 24, 0, 9, 'Sim'),(4274, 1, 24, 0, 5, 'Não'),(4275, 1, 24, 0, 12, 'Sim'),(4276, 1, 24, 0, 10, 'Sim'),(4277, 1, 24, 0, 1, 'Sim'),(4278, 1, 24, 306, 2, 'Sim'),(4279, 1, 24, 306, 6, 'Sim'),(4280, 1, 24, 306, 13, 'Sim'),(4281, 1, 24, 306, 3, 'Sim'),(4282, 1, 24, 306, 4, 'Sim'),(4283, 1, 24, 306, 8, 'Sim'),(4284, 1, 24, 306, 11, 'Sim'),(4285, 1, 24, 306, 7, 'Sim'),(4286, 1, 24, 306, 9, 'Sim'),(4287, 1, 24, 306, 5, 'Não'),(4288, 1, 24, 306, 12, 'Sim'),(4289, 1, 24, 306, 10, 'Sim'),(4290, 1, 24, 306, 1, 'Sim'),(4291, 1, 24, 307, 2, 'Sim'),(4292, 1, 24, 307, 6, 'Sim'),(4293, 1, 24, 307, 13, 'Sim'),(4294, 1, 24, 307, 3, 'Sim'),(4295, 1, 24, 307, 4, 'Sim'),(4296, 1, 24, 307, 8, 'Sim'),(4297, 1, 24, 307, 11, 'Sim'),(4298, 1, 24, 307, 7, 'Sim'),(4299, 1, 24, 307, 9, 'Sim'),(4300, 1, 24, 307, 5, 'Não'),(4301, 1, 24, 307, 12, 'Sim'),(4302, 1, 24, 307, 10, 'Sim'),(4303, 1, 24, 307, 1, 'Sim'),(4304, 1, 24, 308, 2, 'Sim'),(4305, 1, 24, 308, 6, 'Sim'),(4306, 1, 24, 308, 13, 'Sim'),(4307, 1, 24, 308, 3, 'Sim'),(4308, 1, 24, 308, 4, 'Sim'),(4309, 1, 24, 308, 8, 'Sim'),(4310, 1, 24, 308, 11, 'Sim'),(4311, 1, 24, 308, 7, 'Sim'),(4312, 1, 24, 308, 9, 'Sim'),(4313, 1, 24, 308, 5, 'Não'),(4314, 1, 24, 308, 12, 'Sim'),(4315, 1, 24, 308, 10, 'Sim'),(4316, 1, 24, 308, 1, 'Sim'),(4317, 1, 24, 309, 2, 'Sim'),(4318, 1, 24, 309, 6, 'Sim'),(4319, 1, 24, 309, 13, 'Sim'),(4320, 1, 24, 309, 3, 'Sim'),(4321, 1, 24, 309, 4, 'Sim'),(4322, 1, 24, 309, 8, 'Sim'),(4323, 1, 24, 309, 11, 'Sim'),(4324, 1, 24, 309, 7, 'Sim'),(4325, 1, 24, 309, 9, 'Sim'),(4326, 1, 24, 309, 5, 'Não'),(4327, 1, 24, 309, 12, 'Sim'),(4328, 1, 24, 309, 10, 'Sim'),(4329, 1, 24, 309, 1, 'Sim'),(4330, 1, 24, 310, 2, 'Sim'),(4331, 1, 24, 310, 6, 'Sim'),(4332, 1, 24, 310, 13, 'Sim'),(4333, 1, 24, 310, 3, 'Sim'),(4334, 1, 24, 310, 4, 'Sim'),(4335, 1, 24, 310, 8, 'Sim'),(4336, 1, 24, 310, 11, 'Sim'),(4337, 1, 24, 310, 7, 'Sim'),(4338, 1, 24, 310, 9, 'Sim'),(4339, 1, 24, 310, 5, 'Não'),(4340, 1, 24, 310, 12, 'Sim'),(4341, 1, 24, 310, 10, 'Sim'),(4342, 1, 24, 310, 1, 'Sim'),(4343, 1, 24, 311, 2, 'Sim'),(4344, 1, 24, 311, 6, 'Sim'),(4345, 1, 24, 311, 13, 'Sim'),(4346, 1, 24, 311, 3, 'Sim'),(4347, 1, 24, 311, 4, 'Sim'),(4348, 1, 24, 311, 8, 'Sim'),(4349, 1, 24, 311, 11, 'Sim'),(4350, 1, 24, 311, 7, 'Sim'),(4351, 1, 24, 311, 9, 'Sim'),(4352, 1, 24, 311, 5, 'Não'),(4353, 1, 24, 311, 12, 'Sim'),(4354, 1, 24, 311, 10, 'Sim'),(4355, 1, 24, 311, 1, 'Sim'),(4356, 1, 24, 312, 2, 'Sim'),(4357, 1, 24, 312, 6, 'Sim'),(4358, 1, 24, 312, 13, 'Sim'),(4359, 1, 24, 312, 3, 'Sim'),(4360, 1, 24, 312, 4, 'Sim'),(4361, 1, 24, 312, 8, 'Sim'),(4362, 1, 24, 312, 11, 'Sim'),(4363, 1, 24, 312, 7, 'Sim'),(4364, 1, 24, 312, 9, 'Sim'),(4365, 1, 24, 312, 5, 'Não'),(4366, 1, 24, 312, 12, 'Sim'),(4367, 1, 24, 312, 10, 'Sim'),(4368, 1, 24, 312, 1, 'Sim'),(4369, 1, 24, 313, 2, 'Sim'),(4370, 1, 24, 313, 6, 'Sim'),(4371, 1, 24, 313, 13, 'Sim'),(4372, 1, 24, 313, 3, 'Sim'),(4373, 1, 24, 313, 4, 'Sim'),(4374, 1, 24, 313, 8, 'Sim'),(4375, 1, 24, 313, 11, 'Sim'),(4376, 1, 24, 313, 7, 'Sim'),(4377, 1, 24, 313, 9, 'Sim'),(4378, 1, 24, 313, 5, 'Não'),(4379, 1, 24, 313, 12, 'Sim'),(4380, 1, 24, 313, 10, 'Sim'),(4381, 1, 24, 313, 1, 'Sim'),(4382, 1, 24, 314, 2, 'Sim'),(4383, 1, 24, 314, 6, 'Sim'),(4384, 1, 24, 314, 13, 'Sim'),(4385, 1, 24, 314, 3, 'Sim'),(4386, 1, 24, 314, 4, 'Sim'),(4387, 1, 24, 314, 8, 'Sim'),(4388, 1, 24, 314, 11, 'Sim'),(4389, 1, 24, 314, 7, 'Sim'),(4390, 1, 24, 314, 9, 'Sim'),(4391, 1, 24, 314, 5, 'Não'),(4392, 1, 24, 314, 12, 'Sim'),(4393, 1, 24, 314, 10, 'Sim'),(4394, 1, 24, 314, 1, 'Sim'),(4395, 1, 24, 315, 2, 'Sim'),(4396, 1, 24, 315, 6, 'Sim'),(4397, 1, 24, 315, 13, 'Sim'),(4398, 1, 24, 315, 3, 'Sim'),(4399, 1, 24, 315, 4, 'Sim'),(4400, 1, 24, 315, 8, 'Sim'),(4401, 1, 24, 315, 11, 'Sim'),(4402, 1, 24, 315, 7, 'Sim'),(4403, 1, 24, 315, 9, 'Sim'),(4404, 1, 24, 315, 5, 'Não'),(4405, 1, 24, 315, 12, 'Sim'),(4406, 1, 24, 315, 10, 'Sim'),(4407, 1, 24, 315, 1, 'Sim'),(4408, 1, 24, 316, 2, 'Sim'),(4409, 1, 24, 316, 6, 'Sim'),(4410, 1, 24, 316, 13, 'Sim'),(4411, 1, 24, 316, 3, 'Sim'),(4412, 1, 24, 316, 4, 'Sim'),(4413, 1, 24, 316, 8, 'Sim'),(4414, 1, 24, 316, 11, 'Sim'),(4415, 1, 24, 316, 7, 'Sim'),(4416, 1, 24, 316, 9, 'Sim'),(4417, 1, 24, 316, 5, 'Não'),(4418, 1, 24, 316, 12, 'Sim'),(4419, 1, 24, 316, 10, 'Sim'),(4420, 1, 24, 316, 1, 'Sim'),(4421, 1, 24, 317, 2, 'Sim'),(4422, 1, 24, 317, 6, 'Sim'),(4423, 1, 24, 317, 13, 'Sim'),(4424, 1, 24, 317, 3, 'Sim'),(4425, 1, 24, 317, 4, 'Sim'),(4426, 1, 24, 317, 8, 'Sim'),(4427, 1, 24, 317, 11, 'Sim'),(4428, 1, 24, 317, 7, 'Sim'),(4429, 1, 24, 317, 9, 'Sim'),(4430, 1, 24, 317, 5, 'Não'),(4431, 1, 24, 317, 12, 'Sim'),(4432, 1, 24, 317, 10, 'Sim'),(4433, 1, 24, 317, 1, 'Sim'),(4434, 1, 24, 318, 2, 'Sim'),(4435, 1, 24, 318, 6, 'Sim'),(4436, 1, 24, 318, 13, 'Sim'),(4437, 1, 24, 318, 3, 'Sim'),(4438, 1, 24, 318, 4, 'Sim'),(4439, 1, 24, 318, 8, 'Sim'),(4440, 1, 24, 318, 11, 'Sim'),(4441, 1, 24, 318, 7, 'Sim'),(4442, 1, 24, 318, 9, 'Sim'),(4443, 1, 24, 318, 5, 'Não'),(4444, 1, 24, 318, 12, 'Sim'),(4445, 1, 24, 318, 10, 'Sim'),(4446, 1, 24, 318, 1, 'Sim'),(4447, 1, 24, 319, 2, 'Sim'),(4448, 1, 24, 319, 6, 'Sim'),(4449, 1, 24, 319, 13, 'Sim'),(4450, 1, 24, 319, 3, 'Sim'),(4451, 1, 24, 319, 4, 'Sim'),(4452, 1, 24, 319, 8, 'Sim'),(4453, 1, 24, 319, 11, 'Sim'),(4454, 1, 24, 319, 7, 'Sim'),(4455, 1, 24, 319, 9, 'Sim'),(4456, 1, 24, 319, 5, 'Não'),(4457, 1, 24, 319, 12, 'Sim'),(4458, 1, 24, 319, 10, 'Sim'),(4459, 1, 24, 319, 1, 'Sim'),(4460, 1, 24, 320, 2, 'Sim'),(4461, 1, 24, 320, 6, 'Sim'),(4462, 1, 24, 320, 13, 'Sim'),(4463, 1, 24, 320, 3, 'Sim'),(4464, 1, 24, 320, 4, 'Sim'),(4465, 1, 24, 320, 8, 'Sim'),(4466, 1, 24, 320, 11, 'Sim'),(4467, 1, 24, 320, 7, 'Sim'),(4468, 1, 24, 320, 9, 'Sim'),(4469, 1, 24, 320, 5, 'Não'),(4470, 1, 24, 320, 12, 'Sim'),(4471, 1, 24, 320, 10, 'Sim'),(4472, 1, 24, 320, 1, 'Sim'),(4473, 1, 24, 321, 2, 'Sim'),(4474, 1, 24, 321, 6, 'Sim'),(4475, 1, 24, 321, 13, 'Sim'),(4476, 1, 24, 321, 3, 'Sim'),(4477, 1, 24, 321, 4, 'Sim'),(4478, 1, 24, 321, 8, 'Sim'),(4479, 1, 24, 321, 11, 'Sim'),(4480, 1, 24, 321, 7, 'Sim'),(4481, 1, 24, 321, 9, 'Sim'),(4482, 1, 24, 321, 5, 'Não'),(4483, 1, 24, 321, 12, 'Sim'),(4484, 1, 24, 321, 10, 'Sim'),(4485, 1, 24, 321, 1, 'Sim'),(4486, 1, 24, 322, 2, 'Sim'),(4487, 1, 24, 322, 6, 'Sim'),(4488, 1, 24, 322, 13, 'Sim'),(4489, 1, 24, 322, 3, 'Sim'),(4490, 1, 24, 322, 4, 'Sim'),(4491, 1, 24, 322, 8, 'Sim'),(4492, 1, 24, 322, 11, 'Sim'),(4493, 1, 24, 322, 7, 'Sim'),(4494, 1, 24, 322, 9, 'Sim'),(4495, 1, 24, 322, 5, 'Não'),(4496, 1, 24, 322, 12, 'Sim'),(4497, 1, 24, 322, 10, 'Sim'),(4498, 1, 24, 322, 1, 'Sim'),(4499, 1, 24, 323, 2, 'Sim'),(4500, 1, 24, 323, 6, 'Sim'),(4501, 1, 24, 323, 13, 'Sim'),(4502, 1, 24, 323, 3, 'Sim'),(4503, 1, 24, 323, 4, 'Sim'),(4504, 1, 24, 323, 8, 'Sim'),(4505, 1, 24, 323, 11, 'Sim'),(4506, 1, 24, 323, 7, 'Sim'),(4507, 1, 24, 323, 9, 'Sim'),(4508, 1, 24, 323, 5, 'Não'),(4509, 1, 24, 323, 12, 'Sim'),(4510, 1, 24, 323, 10, 'Sim'),(4511, 1, 24, 323, 1, 'Sim'),(4512, 1, 24, 324, 2, 'Sim'),(4513, 1, 24, 324, 6, 'Sim'),(4514, 1, 24, 324, 13, 'Sim'),(4515, 1, 24, 324, 3, 'Sim'),(4516, 1, 24, 324, 4, 'Sim'),(4517, 1, 24, 324, 8, 'Sim'),(4518, 1, 24, 324, 11, 'Sim'),(4519, 1, 24, 324, 7, 'Sim'),(4520, 1, 24, 324, 9, 'Sim'),(4521, 1, 24, 324, 5, 'Não'),(4522, 1, 24, 324, 12, 'Sim'),(4523, 1, 24, 324, 10, 'Sim'),(4524, 1, 24, 324, 1, 'Sim'),(4525, 1, 24, 325, 2, 'Sim'),(4526, 1, 24, 325, 6, 'Sim'),(4527, 1, 24, 325, 13, 'Sim'),(4528, 1, 24, 325, 3, 'Sim'),(4529, 1, 24, 325, 4, 'Sim'),(4530, 1, 24, 325, 8, 'Sim'),(4531, 1, 24, 325, 11, 'Sim'),(4532, 1, 24, 325, 7, 'Sim'),(4533, 1, 24, 325, 9, 'Sim'),(4534, 1, 24, 325, 5, 'Não'),(4535, 1, 24, 325, 12, 'Sim'),(4536, 1, 24, 325, 10, 'Sim'),(4537, 1, 24, 325, 1, 'Sim'),(4538, 1, 24, 326, 2, 'Sim'),(4539, 1, 24, 326, 6, 'Sim'),(4540, 1, 24, 326, 13, 'Sim'),(4541, 1, 24, 326, 3, 'Sim'),(4542, 1, 24, 326, 4, 'Sim'),(4543, 1, 24, 326, 8, 'Sim'),(4544, 1, 24, 326, 11, 'Sim'),(4545, 1, 24, 326, 7, 'Sim'),(4546, 1, 24, 326, 9, 'Sim'),(4547, 1, 24, 326, 5, 'Não'),(4548, 1, 24, 326, 12, 'Sim'),(4549, 1, 24, 326, 10, 'Sim'),(4550, 1, 24, 326, 1, 'Sim'),(4551, 1, 24, 327, 2, 'Sim'),(4552, 1, 24, 327, 6, 'Sim'),(4553, 1, 24, 327, 13, 'Sim'),(4554, 1, 24, 327, 3, 'Sim'),(4555, 1, 24, 327, 4, 'Sim'),(4556, 1, 24, 327, 8, 'Sim'),(4557, 1, 24, 327, 11, 'Sim'),(4558, 1, 24, 327, 7, 'Sim'),(4559, 1, 24, 327, 9, 'Sim'),(4560, 1, 24, 327, 5, 'Não'),(4561, 1, 24, 327, 12, 'Sim'),(4562, 1, 24, 327, 10, 'Sim'),(4563, 1, 24, 327, 1, 'Sim'),(4564, 1, 24, 328, 2, 'Sim'),(4565, 1, 24, 328, 6, 'Sim'),(4566, 1, 24, 328, 13, 'Sim'),(4567, 1, 24, 328, 3, 'Sim'),(4568, 1, 24, 328, 4, 'Sim'),(4569, 1, 24, 328, 8, 'Sim'),(4570, 1, 24, 328, 11, 'Sim'),(4571, 1, 24, 328, 7, 'Sim'),(4572, 1, 24, 328, 9, 'Sim'),(4573, 1, 24, 328, 5, 'Não'),(4574, 1, 24, 328, 12, 'Sim'),(4575, 1, 24, 328, 10, 'Sim'),(4576, 1, 24, 328, 1, 'Sim'),(4577, 1, 24, 329, 2, 'Sim'),(4578, 1, 24, 329, 6, 'Sim'),(4579, 1, 24, 329, 13, 'Sim'),(4580, 1, 24, 329, 3, 'Sim'),(4581, 1, 24, 329, 4, 'Sim'),(4582, 1, 24, 329, 8, 'Sim'),(4583, 1, 24, 329, 11, 'Sim'),(4584, 1, 24, 329, 7, 'Sim'),(4585, 1, 24, 329, 9, 'Sim'),(4586, 1, 24, 329, 5, 'Não'),(4587, 1, 24, 329, 12, 'Sim'),(4588, 1, 24, 329, 10, 'Sim'),(4589, 1, 24, 329, 1, 'Sim'),(4590, 1, 24, 330, 2, 'Sim'),(4591, 1, 24, 330, 6, 'Sim'),(4592, 1, 24, 330, 13, 'Sim'),(4593, 1, 24, 330, 3, 'Sim'),(4594, 1, 24, 330, 4, 'Sim'),(4595, 1, 24, 330, 8, 'Sim'),(4596, 1, 24, 330, 11, 'Sim'),(4597, 1, 24, 330, 7, 'Sim'),(4598, 1, 24, 330, 9, 'Sim'),(4599, 1, 24, 330, 5, 'Não'),(4600, 1, 24, 330, 12, 'Sim'),(4601, 1, 24, 330, 10, 'Sim'),(4602, 1, 24, 330, 1, 'Sim'),(4603, 1, 24, 331, 2, 'Sim'),(4604, 1, 24, 331, 6, 'Sim'),(4605, 1, 24, 331, 13, 'Sim'),(4606, 1, 24, 331, 3, 'Sim'),(4607, 1, 24, 331, 4, 'Sim'),(4608, 1, 24, 331, 8, 'Sim'),(4609, 1, 24, 331, 11, 'Sim'),(4610, 1, 24, 331, 7, 'Sim'),(4611, 1, 24, 331, 9, 'Sim'),(4612, 1, 24, 331, 5, 'Não'),(4613, 1, 24, 331, 12, 'Sim'),(4614, 1, 24, 331, 10, 'Sim'),(4615, 1, 24, 331, 1, 'Sim'),(4616, 1, 24, 332, 2, 'Sim'),(4617, 1, 24, 332, 6, 'Sim'),(4618, 1, 24, 332, 13, 'Sim'),(4619, 1, 24, 332, 3, 'Sim'),(4620, 1, 24, 332, 4, 'Sim'),(4621, 1, 24, 332, 8, 'Sim'),(4622, 1, 24, 332, 11, 'Sim'),(4623, 1, 24, 332, 7, 'Sim'),(4624, 1, 24, 332, 9, 'Sim'),(4625, 1, 24, 332, 5, 'Não'),(4626, 1, 24, 332, 12, 'Sim'),(4627, 1, 24, 332, 10, 'Sim'),(4628, 1, 24, 332, 1, 'Sim'),(4629, 1, 24, 333, 2, 'Sim'),(4630, 1, 24, 333, 6, 'Sim'),(4631, 1, 24, 333, 13, 'Sim'),(4632, 1, 24, 333, 3, 'Sim'),(4633, 1, 24, 333, 4, 'Sim'),(4634, 1, 24, 333, 8, 'Sim'),(4635, 1, 24, 333, 11, 'Sim'),(4636, 1, 24, 333, 7, 'Sim'),(4637, 1, 24, 333, 9, 'Sim'),(4638, 1, 24, 333, 5, 'Não'),(4639, 1, 24, 333, 12, 'Sim'),(4640, 1, 24, 333, 10, 'Sim'),(4641, 1, 24, 333, 1, 'Sim'),(4642, 1, 24, 334, 2, 'Sim'),(4643, 1, 24, 334, 6, 'Sim'),(4644, 1, 24, 334, 13, 'Sim'),(4645, 1, 24, 334, 3, 'Sim'),(4646, 1, 24, 334, 4, 'Sim'),(4647, 1, 24, 334, 8, 'Sim'),(4648, 1, 24, 334, 11, 'Sim'),(4649, 1, 24, 334, 7, 'Sim'),(4650, 1, 24, 334, 9, 'Sim'),(4651, 1, 24, 334, 5, 'Não'),(4652, 1, 24, 334, 12, 'Sim'),(4653, 1, 24, 334, 10, 'Sim'),(4654, 1, 24, 334, 1, 'Sim'),(4655, 1, 24, 335, 2, 'Sim'),(4656, 1, 24, 335, 6, 'Sim'),(4657, 1, 24, 335, 13, 'Sim'),(4658, 1, 24, 335, 3, 'Sim'),(4659, 1, 24, 335, 4, 'Sim'),(4660, 1, 24, 335, 8, 'Sim'),(4661, 1, 24, 335, 11, 'Sim'),(4662, 1, 24, 335, 7, 'Sim'),(4663, 1, 24, 335, 9, 'Sim'),(4664, 1, 24, 335, 5, 'Não'),(4665, 1, 24, 335, 12, 'Sim'),(4666, 1, 24, 335, 10, 'Sim'),(4667, 1, 24, 335, 1, 'Sim'),(4668, 1, 24, 336, 2, 'Sim'),(4669, 1, 24, 336, 6, 'Sim'),(4670, 1, 24, 336, 13, 'Sim'),(4671, 1, 24, 336, 3, 'Sim'),(4672, 1, 24, 336, 4, 'Sim'),(4673, 1, 24, 336, 8, 'Sim'),(4674, 1, 24, 336, 11, 'Sim'),(4675, 1, 24, 336, 7, 'Sim'),(4676, 1, 24, 336, 9, 'Sim'),(4677, 1, 24, 336, 5, 'Não'),(4678, 1, 24, 336, 12, 'Sim'),(4679, 1, 24, 336, 10, 'Sim'),(4680, 1, 24, 336, 1, 'Sim'),(4681, 1, 24, 337, 2, 'Sim'),(4682, 1, 24, 337, 6, 'Sim'),(4683, 1, 24, 337, 13, 'Sim'),(4684, 1, 24, 337, 3, 'Sim'),(4685, 1, 24, 337, 4, 'Sim'),(4686, 1, 24, 337, 8, 'Sim'),(4687, 1, 24, 337, 11, 'Sim'),(4688, 1, 24, 337, 7, 'Sim'),(4689, 1, 24, 337, 9, 'Sim'),(4690, 1, 24, 337, 5, 'Não'),(4691, 1, 24, 337, 12, 'Sim'),(4692, 1, 24, 337, 10, 'Sim'),(4693, 1, 24, 337, 1, 'Sim'),(4694, 1, 24, 338, 2, 'Sim'),(4695, 1, 24, 338, 6, 'Sim'),(4696, 1, 24, 338, 13, 'Sim'),(4697, 1, 24, 338, 3, 'Sim'),(4698, 1, 24, 338, 4, 'Sim'),(4699, 1, 24, 338, 8, 'Sim'),(4700, 1, 24, 338, 11, 'Sim'),(4701, 1, 24, 338, 7, 'Sim'),(4702, 1, 24, 338, 9, 'Sim'),(4703, 1, 24, 338, 5, 'Não'),(4704, 1, 24, 338, 12, 'Sim'),(4705, 1, 24, 338, 10, 'Sim'),(4706, 1, 24, 338, 1, 'Sim'),(4707, 1, 24, 339, 2, 'Sim'),(4708, 1, 24, 339, 6, 'Sim'),(4709, 1, 24, 339, 13, 'Sim'),(4710, 1, 24, 339, 3, 'Sim'),(4711, 1, 24, 339, 4, 'Sim'),(4712, 1, 24, 339, 8, 'Sim'),(4713, 1, 24, 339, 11, 'Sim'),(4714, 1, 24, 339, 7, 'Sim'),(4715, 1, 24, 339, 9, 'Sim'),(4716, 1, 24, 339, 5, 'Não'),(4717, 1, 24, 339, 12, 'Sim'),(4718, 1, 24, 339, 10, 'Sim'),(4719, 1, 24, 339, 1, 'Sim'),(4720, 1, 24, 340, 2, 'Sim'),(4721, 1, 24, 340, 6, 'Sim'),(4722, 1, 24, 340, 13, 'Sim'),(4723, 1, 24, 340, 3, 'Sim'),(4724, 1, 24, 340, 4, 'Sim'),(4725, 1, 24, 340, 8, 'Sim'),(4726, 1, 24, 340, 11, 'Sim'),(4727, 1, 24, 340, 7, 'Sim'),(4728, 1, 24, 340, 9, 'Sim'),(4729, 1, 24, 340, 5, 'Não'),(4730, 1, 24, 340, 12, 'Sim'),(4731, 1, 24, 340, 10, 'Sim'),(4732, 1, 24, 340, 1, 'Sim'),(4733, 1, 24, 341, 2, 'Sim'),(4734, 1, 24, 341, 6, 'Sim'),(4735, 1, 24, 341, 13, 'Sim'),(4736, 1, 24, 341, 3, 'Sim'),(4737, 1, 24, 341, 4, 'Sim'),(4738, 1, 24, 341, 8, 'Sim'),(4739, 1, 24, 341, 11, 'Sim'),(4740, 1, 24, 341, 7, 'Sim'),(4741, 1, 24, 341, 9, 'Sim'),(4742, 1, 24, 341, 5, 'Não'),(4743, 1, 24, 341, 12, 'Sim'),(4744, 1, 24, 341, 10, 'Sim'),(4745, 1, 24, 341, 1, 'Sim'),(4746, 1, 24, 342, 2, 'Sim'),(4747, 1, 24, 342, 6, 'Sim'),(4748, 1, 24, 342, 13, 'Sim'),(4749, 1, 24, 342, 3, 'Sim'),(4750, 1, 24, 342, 4, 'Sim'),(4751, 1, 24, 342, 8, 'Sim'),(4752, 1, 24, 342, 11, 'Sim'),(4753, 1, 24, 342, 7, 'Sim'),(4754, 1, 24, 342, 9, 'Sim'),(4755, 1, 24, 342, 5, 'Não'),(4756, 1, 24, 342, 12, 'Sim'),(4757, 1, 24, 342, 10, 'Sim'),(4758, 1, 24, 342, 1, 'Sim'),(4759, 1, 24, 343, 2, 'Sim'),(4760, 1, 24, 343, 6, 'Sim'),(4761, 1, 24, 343, 13, 'Sim'),(4762, 1, 24, 343, 3, 'Sim'),(4763, 1, 24, 343, 4, 'Sim'),(4764, 1, 24, 343, 8, 'Sim'),(4765, 1, 24, 343, 11, 'Sim'),(4766, 1, 24, 343, 7, 'Sim'),(4767, 1, 24, 343, 9, 'Sim'),(4768, 1, 24, 343, 5, 'Não'),(4769, 1, 24, 343, 12, 'Sim'),(4770, 1, 24, 343, 10, 'Sim'),(4771, 1, 24, 343, 1, 'Sim'),(4772, 1, 24, 344, 2, 'Sim'),(4773, 1, 24, 344, 6, 'Sim'),(4774, 1, 24, 344, 13, 'Sim'),(4775, 1, 24, 344, 3, 'Sim'),(4776, 1, 24, 344, 4, 'Sim'),(4777, 1, 24, 344, 8, 'Sim'),(4778, 1, 24, 344, 11, 'Sim'),(4779, 1, 24, 344, 7, 'Sim'),(4780, 1, 24, 344, 9, 'Sim'),(4781, 1, 24, 344, 5, 'Não'),(4782, 1, 24, 344, 12, 'Sim'),(4783, 1, 24, 344, 10, 'Sim'),(4784, 1, 24, 344, 1, 'Sim'),(4785, 1, 24, 345, 2, 'Sim'),(4786, 1, 24, 345, 6, 'Sim'),(4787, 1, 24, 345, 13, 'Sim'),(4788, 1, 24, 345, 3, 'Sim'),(4789, 1, 24, 345, 4, 'Sim'),(4790, 1, 24, 345, 8, 'Sim'),(4791, 1, 24, 345, 11, 'Sim'),(4792, 1, 24, 345, 7, 'Sim'),(4793, 1, 24, 345, 9, 'Sim'),(4794, 1, 24, 345, 5, 'Não'),(4795, 1, 24, 345, 12, 'Sim'),(4796, 1, 24, 345, 10, 'Sim'),(4797, 1, 24, 345, 1, 'Sim'),(4798, 1, 24, 346, 2, 'Sim'),(4799, 1, 24, 346, 6, 'Sim'),(4800, 1, 24, 346, 13, 'Sim'),(4801, 1, 24, 346, 3, 'Sim'),(4802, 1, 24, 346, 4, 'Sim'),(4803, 1, 24, 346, 8, 'Sim'),(4804, 1, 24, 346, 11, 'Sim'),(4805, 1, 24, 346, 7, 'Sim'),(4806, 1, 24, 346, 9, 'Sim'),(4807, 1, 24, 346, 5, 'Não'),(4808, 1, 24, 346, 12, 'Sim'),(4809, 1, 24, 346, 10, 'Sim'),(4810, 1, 24, 346, 1, 'Sim'),(4811, 1, 25, 0, 2, 'Sim'),(4812, 1, 25, 0, 6, 'Sim'),(4813, 1, 25, 0, 13, 'Sim'),(4814, 1, 25, 0, 3, 'Sim'),(4815, 1, 25, 0, 4, 'Sim'),(4816, 1, 25, 0, 8, 'Sim'),(4817, 1, 25, 0, 11, 'Sim'),(4818, 1, 25, 0, 7, 'Sim'),(4819, 1, 25, 0, 9, 'Sim'),(4820, 1, 25, 0, 5, 'Não'),(4821, 1, 25, 0, 12, 'Sim'),(4822, 1, 25, 0, 10, 'Sim'),(4823, 1, 25, 0, 1, 'Sim'),(4824, 1, 25, 347, 2, 'Sim'),(4825, 1, 25, 347, 6, 'Sim'),(4826, 1, 25, 347, 13, 'Sim'),(4827, 1, 25, 347, 3, 'Sim'),(4828, 1, 25, 347, 4, 'Sim'),(4829, 1, 25, 347, 8, 'Sim'),(4830, 1, 25, 347, 11, 'Sim'),(4831, 1, 25, 347, 7, 'Sim'),(4832, 1, 25, 347, 9, 'Sim'),(4833, 1, 25, 347, 5, 'Não'),(4834, 1, 25, 347, 12, 'Sim'),(4835, 1, 25, 347, 10, 'Sim'),(4836, 1, 25, 347, 1, 'Sim'),(4837, 1, 25, 348, 2, 'Sim'),(4838, 1, 25, 348, 6, 'Sim'),(4839, 1, 25, 348, 13, 'Sim'),(4840, 1, 25, 348, 3, 'Sim'),(4841, 1, 25, 348, 4, 'Sim'),(4842, 1, 25, 348, 8, 'Sim'),(4843, 1, 25, 348, 11, 'Sim'),(4844, 1, 25, 348, 7, 'Sim'),(4845, 1, 25, 348, 9, 'Sim'),(4846, 1, 25, 348, 5, 'Não'),(4847, 1, 25, 348, 12, 'Sim'),(4848, 1, 25, 348, 10, 'Sim'),(4849, 1, 25, 348, 1, 'Sim'),(4850, 1, 25, 349, 2, 'Sim'),(4851, 1, 25, 349, 6, 'Sim'),(4852, 1, 25, 349, 13, 'Sim'),(4853, 1, 25, 349, 3, 'Sim'),(4854, 1, 25, 349, 4, 'Sim'),(4855, 1, 25, 349, 8, 'Sim'),(4856, 1, 25, 349, 11, 'Sim'),(4857, 1, 25, 349, 7, 'Sim'),(4858, 1, 25, 349, 9, 'Sim'),(4859, 1, 25, 349, 5, 'Não'),(4860, 1, 25, 349, 12, 'Sim'),(4861, 1, 25, 349, 10, 'Sim'),(4862, 1, 25, 349, 1, 'Sim'),(4863, 1, 25, 350, 2, 'Sim'),(4864, 1, 25, 350, 6, 'Sim'),(4865, 1, 25, 350, 13, 'Sim'),(4866, 1, 25, 350, 3, 'Sim'),(4867, 1, 25, 350, 4, 'Sim'),(4868, 1, 25, 350, 8, 'Sim'),(4869, 1, 25, 350, 11, 'Sim'),(4870, 1, 25, 350, 7, 'Sim'),(4871, 1, 25, 350, 9, 'Sim'),(4872, 1, 25, 350, 5, 'Não'),(4873, 1, 25, 350, 12, 'Sim'),(4874, 1, 25, 350, 10, 'Sim'),(4875, 1, 25, 350, 1, 'Sim'),(4876, 1, 25, 351, 2, 'Sim'),(4877, 1, 25, 351, 6, 'Sim'),(4878, 1, 25, 351, 13, 'Sim'),(4879, 1, 25, 351, 3, 'Sim'),(4880, 1, 25, 351, 4, 'Sim'),(4881, 1, 25, 351, 8, 'Sim'),(4882, 1, 25, 351, 11, 'Sim'),(4883, 1, 25, 351, 7, 'Sim'),(4884, 1, 25, 351, 9, 'Sim'),(4885, 1, 25, 351, 5, 'Não'),(4886, 1, 25, 351, 12, 'Sim'),(4887, 1, 25, 351, 10, 'Sim'),(4888, 1, 25, 351, 1, 'Sim'),(4889, 1, 25, 352, 2, 'Sim'),(4890, 1, 25, 352, 6, 'Sim'),(4891, 1, 25, 352, 13, 'Sim'),(4892, 1, 25, 352, 3, 'Sim'),(4893, 1, 25, 352, 4, 'Sim'),(4894, 1, 25, 352, 8, 'Sim'),(4895, 1, 25, 352, 11, 'Sim'),(4896, 1, 25, 352, 7, 'Sim'),(4897, 1, 25, 352, 9, 'Sim'),(4898, 1, 25, 352, 5, 'Não'),(4899, 1, 25, 352, 12, 'Sim'),(4900, 1, 25, 352, 10, 'Sim'),(4901, 1, 25, 352, 1, 'Sim'),(4902, 1, 25, 353, 2, 'Sim'),(4903, 1, 25, 353, 6, 'Sim'),(4904, 1, 25, 353, 13, 'Sim'),(4905, 1, 25, 353, 3, 'Sim'),(4906, 1, 25, 353, 4, 'Sim'),(4907, 1, 25, 353, 8, 'Sim'),(4908, 1, 25, 353, 11, 'Sim'),(4909, 1, 25, 353, 7, 'Sim'),(4910, 1, 25, 353, 9, 'Sim'),(4911, 1, 25, 353, 5, 'Não'),(4912, 1, 25, 353, 12, 'Sim'),(4913, 1, 25, 353, 10, 'Sim'),(4914, 1, 25, 353, 1, 'Sim'),(4915, 1, 25, 354, 2, 'Sim'),(4916, 1, 25, 354, 6, 'Sim'),(4917, 1, 25, 354, 13, 'Sim'),(4918, 1, 25, 354, 3, 'Sim'),(4919, 1, 25, 354, 4, 'Sim'),(4920, 1, 25, 354, 8, 'Sim'),(4921, 1, 25, 354, 11, 'Sim'),(4922, 1, 25, 354, 7, 'Sim'),(4923, 1, 25, 354, 9, 'Sim'),(4924, 1, 25, 354, 5, 'Não'),(4925, 1, 25, 354, 12, 'Sim'),(4926, 1, 25, 354, 10, 'Sim'),(4927, 1, 25, 354, 1, 'Sim'),(4928, 1, 25, 355, 2, 'Sim'),(4929, 1, 25, 355, 6, 'Sim'),(4930, 1, 25, 355, 13, 'Sim'),(4931, 1, 25, 355, 3, 'Sim'),(4932, 1, 25, 355, 4, 'Sim'),(4933, 1, 25, 355, 8, 'Sim'),(4934, 1, 25, 355, 11, 'Sim'),(4935, 1, 25, 355, 7, 'Sim'),(4936, 1, 25, 355, 9, 'Sim'),(4937, 1, 25, 355, 5, 'Não'),(4938, 1, 25, 355, 12, 'Sim'),(4939, 1, 25, 355, 10, 'Sim'),(4940, 1, 25, 355, 1, 'Sim'),(4941, 1, 25, 356, 2, 'Sim'),(4942, 1, 25, 356, 6, 'Sim'),(4943, 1, 25, 356, 13, 'Sim'),(4944, 1, 25, 356, 3, 'Sim'),(4945, 1, 25, 356, 4, 'Sim'),(4946, 1, 25, 356, 8, 'Sim'),(4947, 1, 25, 356, 11, 'Sim'),(4948, 1, 25, 356, 7, 'Sim'),(4949, 1, 25, 356, 9, 'Sim'),(4950, 1, 25, 356, 5, 'Não'),(4951, 1, 25, 356, 12, 'Sim'),(4952, 1, 25, 356, 10, 'Sim'),(4953, 1, 25, 356, 1, 'Sim'),(4954, 1, 25, 357, 2, 'Sim'),(4955, 1, 25, 357, 6, 'Sim'),(4956, 1, 25, 357, 13, 'Sim'),(4957, 1, 25, 357, 3, 'Sim'),(4958, 1, 25, 357, 4, 'Sim'),(4959, 1, 25, 357, 8, 'Sim'),(4960, 1, 25, 357, 11, 'Sim'),(4961, 1, 25, 357, 7, 'Sim'),(4962, 1, 25, 357, 9, 'Sim'),(4963, 1, 25, 357, 5, 'Não'),(4964, 1, 25, 357, 12, 'Sim'),(4965, 1, 25, 357, 10, 'Sim'),(4966, 1, 25, 357, 1, 'Sim'),(4967, 1, 25, 358, 2, 'Sim'),(4968, 1, 25, 358, 6, 'Sim'),(4969, 1, 25, 358, 13, 'Sim'),(4970, 1, 25, 358, 3, 'Sim'),(4971, 1, 25, 358, 4, 'Sim'),(4972, 1, 25, 358, 8, 'Sim'),(4973, 1, 25, 358, 11, 'Sim'),(4974, 1, 25, 358, 7, 'Sim'),(4975, 1, 25, 358, 9, 'Sim'),(4976, 1, 25, 358, 5, 'Não'),(4977, 1, 25, 358, 12, 'Sim'),(4978, 1, 25, 358, 10, 'Sim'),(4979, 1, 25, 358, 1, 'Sim'),(4980, 1, 25, 359, 2, 'Sim'),(4981, 1, 25, 359, 6, 'Sim'),(4982, 1, 25, 359, 13, 'Sim'),(4983, 1, 25, 359, 3, 'Sim'),(4984, 1, 25, 359, 4, 'Sim'),(4985, 1, 25, 359, 8, 'Sim'),(4986, 1, 25, 359, 11, 'Sim'),(4987, 1, 25, 359, 7, 'Sim'),(4988, 1, 25, 359, 9, 'Sim'),(4989, 1, 25, 359, 5, 'Não'),(4990, 1, 25, 359, 12, 'Sim'),(4991, 1, 25, 359, 10, 'Sim'),(4992, 1, 25, 359, 1, 'Sim'),(4993, 1, 25, 360, 2, 'Sim'),(4994, 1, 25, 360, 6, 'Sim'),(4995, 1, 25, 360, 13, 'Sim'),(4996, 1, 25, 360, 3, 'Sim'),(4997, 1, 25, 360, 4, 'Sim'),(4998, 1, 25, 360, 8, 'Sim'),(4999, 1, 25, 360, 11, 'Sim'),(5000, 1, 25, 360, 7, 'Sim'),(5001, 1, 25, 360, 9, 'Sim'),(5002, 1, 25, 360, 5, 'Não'),(5003, 1, 25, 360, 12, 'Sim'),(5004, 1, 25, 360, 10, 'Sim'),(5005, 1, 25, 360, 1, 'Sim'),(5006, 1, 25, 361, 2, 'Sim'),(5007, 1, 25, 361, 6, 'Sim'),(5008, 1, 25, 361, 13, 'Sim'),(5009, 1, 25, 361, 3, 'Sim'),(5010, 1, 25, 361, 4, 'Sim'),(5011, 1, 25, 361, 8, 'Sim'),(5012, 1, 25, 361, 11, 'Sim'),(5013, 1, 25, 361, 7, 'Sim'),(5014, 1, 25, 361, 9, 'Sim'),(5015, 1, 25, 361, 5, 'Não'),(5016, 1, 25, 361, 12, 'Sim'),(5017, 1, 25, 361, 10, 'Sim'),(5018, 1, 25, 361, 1, 'Sim'),(5019, 1, 25, 362, 2, 'Sim'),(5020, 1, 25, 362, 6, 'Sim'),(5021, 1, 25, 362, 13, 'Sim'),(5022, 1, 25, 362, 3, 'Sim'),(5023, 1, 25, 362, 4, 'Sim'),(5024, 1, 25, 362, 8, 'Sim'),(5025, 1, 25, 362, 11, 'Sim'),(5026, 1, 25, 362, 7, 'Sim'),(5027, 1, 25, 362, 9, 'Sim'),(5028, 1, 25, 362, 5, 'Não'),(5029, 1, 25, 362, 12, 'Sim'),(5030, 1, 25, 362, 10, 'Sim'),(5031, 1, 25, 362, 1, 'Sim'),(5032, 1, 25, 363, 2, 'Sim'),(5033, 1, 25, 363, 6, 'Sim'),(5034, 1, 25, 363, 13, 'Sim'),(5035, 1, 25, 363, 3, 'Sim'),(5036, 1, 25, 363, 4, 'Sim'),(5037, 1, 25, 363, 8, 'Sim'),(5038, 1, 25, 363, 11, 'Sim'),(5039, 1, 25, 363, 7, 'Sim'),(5040, 1, 25, 363, 9, 'Sim'),(5041, 1, 25, 363, 5, 'Não'),(5042, 1, 25, 363, 12, 'Sim'),(5043, 1, 25, 363, 10, 'Sim'),(5044, 1, 25, 363, 1, 'Sim'),(5045, 1, 25, 364, 2, 'Sim'),(5046, 1, 25, 364, 6, 'Sim'),(5047, 1, 25, 364, 13, 'Sim'),(5048, 1, 25, 364, 3, 'Sim'),(5049, 1, 25, 364, 4, 'Sim'),(5050, 1, 25, 364, 8, 'Sim'),(5051, 1, 25, 364, 11, 'Sim'),(5052, 1, 25, 364, 7, 'Sim'),(5053, 1, 25, 364, 9, 'Sim'),(5054, 1, 25, 364, 5, 'Não'),(5055, 1, 25, 364, 12, 'Sim'),(5056, 1, 25, 364, 10, 'Sim'),(5057, 1, 25, 364, 1, 'Sim'),(5058, 1, 25, 365, 2, 'Sim'),(5059, 1, 25, 365, 6, 'Sim'),(5060, 1, 25, 365, 13, 'Sim'),(5061, 1, 25, 365, 3, 'Sim'),(5062, 1, 25, 365, 4, 'Sim'),(5063, 1, 25, 365, 8, 'Sim'),(5064, 1, 25, 365, 11, 'Sim'),(5065, 1, 25, 365, 7, 'Sim'),(5066, 1, 25, 365, 9, 'Sim'),(5067, 1, 25, 365, 5, 'Não'),(5068, 1, 25, 365, 12, 'Sim'),(5069, 1, 25, 365, 10, 'Sim'),(5070, 1, 25, 365, 1, 'Sim'),(5071, 1, 25, 366, 2, 'Sim'),(5072, 1, 25, 366, 6, 'Sim'),(5073, 1, 25, 366, 13, 'Sim'),(5074, 1, 25, 366, 3, 'Sim'),(5075, 1, 25, 366, 4, 'Sim'),(5076, 1, 25, 366, 8, 'Sim'),(5077, 1, 25, 366, 11, 'Sim'),(5078, 1, 25, 366, 7, 'Sim'),(5079, 1, 25, 366, 9, 'Sim'),(5080, 1, 25, 366, 5, 'Não'),(5081, 1, 25, 366, 12, 'Sim'),(5082, 1, 25, 366, 10, 'Sim'),(5083, 1, 25, 366, 1, 'Sim'),(5084, 1, 25, 367, 2, 'Sim'),(5085, 1, 25, 367, 6, 'Sim'),(5086, 1, 25, 367, 13, 'Sim'),(5087, 1, 25, 367, 3, 'Sim'),(5088, 1, 25, 367, 4, 'Sim'),(5089, 1, 25, 367, 8, 'Sim'),(5090, 1, 25, 367, 11, 'Sim'),(5091, 1, 25, 367, 7, 'Sim'),(5092, 1, 25, 367, 9, 'Sim'),(5093, 1, 25, 367, 5, 'Não'),(5094, 1, 25, 367, 12, 'Sim'),(5095, 1, 25, 367, 10, 'Sim'),(5096, 1, 25, 367, 1, 'Sim'),(5097, 1, 25, 368, 2, 'Sim'),(5098, 1, 25, 368, 6, 'Sim'),(5099, 1, 25, 368, 13, 'Sim'),(5100, 1, 25, 368, 3, 'Sim'),(5101, 1, 25, 368, 4, 'Sim'),(5102, 1, 25, 368, 8, 'Sim'),(5103, 1, 25, 368, 11, 'Sim'),(5104, 1, 25, 368, 7, 'Sim'),(5105, 1, 25, 368, 9, 'Sim'),(5106, 1, 25, 368, 5, 'Não'),(5107, 1, 25, 368, 12, 'Sim'),(5108, 1, 25, 368, 10, 'Sim'),(5109, 1, 25, 368, 1, 'Sim'),(5110, 1, 25, 369, 2, 'Sim'),(5111, 1, 25, 369, 6, 'Sim'),(5112, 1, 25, 369, 13, 'Sim'),(5113, 1, 25, 369, 3, 'Sim'),(5114, 1, 25, 369, 4, 'Sim'),(5115, 1, 25, 369, 8, 'Sim'),(5116, 1, 25, 369, 11, 'Sim'),(5117, 1, 25, 369, 7, 'Sim'),(5118, 1, 25, 369, 9, 'Sim'),(5119, 1, 25, 369, 5, 'Não'),(5120, 1, 25, 369, 12, 'Sim'),(5121, 1, 25, 369, 10, 'Sim'),(5122, 1, 25, 369, 1, 'Sim'),(5123, 1, 25, 370, 2, 'Sim'),(5124, 1, 25, 370, 6, 'Sim'),(5125, 1, 25, 370, 13, 'Sim'),(5126, 1, 25, 370, 3, 'Sim'),(5127, 1, 25, 370, 4, 'Sim'),(5128, 1, 25, 370, 8, 'Sim'),(5129, 1, 25, 370, 11, 'Sim'),(5130, 1, 25, 370, 7, 'Sim'),(5131, 1, 25, 370, 9, 'Sim'),(5132, 1, 25, 370, 5, 'Não'),(5133, 1, 25, 370, 12, 'Sim'),(5134, 1, 25, 370, 10, 'Sim'),(5135, 1, 25, 370, 1, 'Sim'),(5136, 1, 25, 371, 2, 'Sim'),(5137, 1, 25, 371, 6, 'Sim'),(5138, 1, 25, 371, 13, 'Sim'),(5139, 1, 25, 371, 3, 'Sim'),(5140, 1, 25, 371, 4, 'Sim'),(5141, 1, 25, 371, 8, 'Sim'),(5142, 1, 25, 371, 11, 'Sim'),(5143, 1, 25, 371, 7, 'Sim'),(5144, 1, 25, 371, 9, 'Sim'),(5145, 1, 25, 371, 5, 'Não'),(5146, 1, 25, 371, 12, 'Sim'),(5147, 1, 25, 371, 10, 'Sim'),(5148, 1, 25, 371, 1, 'Sim'),(5149, 1, 25, 372, 2, 'Sim'),(5150, 1, 25, 372, 6, 'Sim'),(5151, 1, 25, 372, 13, 'Sim'),(5152, 1, 25, 372, 3, 'Sim'),(5153, 1, 25, 372, 4, 'Sim'),(5154, 1, 25, 372, 8, 'Sim'),(5155, 1, 25, 372, 11, 'Sim'),(5156, 1, 25, 372, 7, 'Sim'),(5157, 1, 25, 372, 9, 'Sim'),(5158, 1, 25, 372, 5, 'Não'),(5159, 1, 25, 372, 12, 'Sim'),(5160, 1, 25, 372, 10, 'Sim'),(5161, 1, 25, 372, 1, 'Sim'),(5162, 1, 25, 373, 2, 'Sim'),(5163, 1, 25, 373, 6, 'Sim'),(5164, 1, 25, 373, 13, 'Sim'),(5165, 1, 25, 373, 3, 'Sim'),(5166, 1, 25, 373, 4, 'Sim'),(5167, 1, 25, 373, 8, 'Sim'),(5168, 1, 25, 373, 11, 'Sim'),(5169, 1, 25, 373, 7, 'Sim'),(5170, 1, 25, 373, 9, 'Sim'),(5171, 1, 25, 373, 5, 'Não'),(5172, 1, 25, 373, 12, 'Sim'),(5173, 1, 25, 373, 10, 'Sim'),(5174, 1, 25, 373, 1, 'Sim'),(5175, 1, 25, 374, 2, 'Sim'),(5176, 1, 25, 374, 6, 'Sim'),(5177, 1, 25, 374, 13, 'Sim'),(5178, 1, 25, 374, 3, 'Sim'),(5179, 1, 25, 374, 4, 'Sim'),(5180, 1, 25, 374, 8, 'Sim'),(5181, 1, 25, 374, 11, 'Sim'),(5182, 1, 25, 374, 7, 'Sim'),(5183, 1, 25, 374, 9, 'Sim'),(5184, 1, 25, 374, 5, 'Não'),(5185, 1, 25, 374, 12, 'Sim'),(5186, 1, 25, 374, 10, 'Sim'),(5187, 1, 25, 374, 1, 'Sim'),(5188, 1, 25, 375, 2, 'Sim'),(5189, 1, 25, 375, 6, 'Sim'),(5190, 1, 25, 375, 13, 'Sim'),(5191, 1, 25, 375, 3, 'Sim'),(5192, 1, 25, 375, 4, 'Sim'),(5193, 1, 25, 375, 8, 'Sim'),(5194, 1, 25, 375, 11, 'Sim'),(5195, 1, 25, 375, 7, 'Sim'),(5196, 1, 25, 375, 9, 'Sim'),(5197, 1, 25, 375, 5, 'Não'),(5198, 1, 25, 375, 12, 'Sim'),(5199, 1, 25, 375, 10, 'Sim'),(5200, 1, 25, 375, 1, 'Sim'),(5201, 1, 25, 376, 2, 'Sim'),(5202, 1, 25, 376, 6, 'Sim'),(5203, 1, 25, 376, 13, 'Sim'),(5204, 1, 25, 376, 3, 'Sim'),(5205, 1, 25, 376, 4, 'Sim'),(5206, 1, 25, 376, 8, 'Sim'),(5207, 1, 25, 376, 11, 'Sim'),(5208, 1, 25, 376, 7, 'Sim'),(5209, 1, 25, 376, 9, 'Sim'),(5210, 1, 25, 376, 5, 'Não'),(5211, 1, 25, 376, 12, 'Sim'),(5212, 1, 25, 376, 10, 'Sim'),(5213, 1, 25, 376, 1, 'Sim'),(5214, 1, 25, 377, 2, 'Sim'),(5215, 1, 25, 377, 6, 'Sim'),(5216, 1, 25, 377, 13, 'Sim'),(5217, 1, 25, 377, 3, 'Sim'),(5218, 1, 25, 377, 4, 'Sim'),(5219, 1, 25, 377, 8, 'Sim'),(5220, 1, 25, 377, 11, 'Sim'),(5221, 1, 25, 377, 7, 'Sim'),(5222, 1, 25, 377, 9, 'Sim'),(5223, 1, 25, 377, 5, 'Não'),(5224, 1, 25, 377, 12, 'Sim'),(5225, 1, 25, 377, 10, 'Sim'),(5226, 1, 25, 377, 1, 'Sim'),(5227, 1, 26, 0, 2, 'Sim'),(5228, 1, 26, 0, 6, 'Sim'),(5229, 1, 26, 0, 13, 'Sim'),(5230, 1, 26, 0, 3, 'Sim'),(5231, 1, 26, 0, 4, 'Sim'),(5232, 1, 26, 0, 8, 'Sim'),(5233, 1, 26, 0, 11, 'Sim'),(5234, 1, 26, 0, 7, 'Sim'),(5235, 1, 26, 0, 9, 'Sim'),(5236, 1, 26, 0, 5, 'Não'),(5237, 1, 26, 0, 12, 'Sim'),(5238, 1, 26, 0, 10, 'Sim'),(5239, 1, 26, 0, 1, 'Sim'),(5240, 1, 26, 378, 2, 'Sim'),(5241, 1, 26, 378, 6, 'Sim'),(5242, 1, 26, 378, 13, 'Sim'),(5243, 1, 26, 378, 3, 'Sim'),(5244, 1, 26, 378, 4, 'Sim'),(5245, 1, 26, 378, 8, 'Sim'),(5246, 1, 26, 378, 11, 'Sim'),(5247, 1, 26, 378, 7, 'Sim'),(5248, 1, 26, 378, 9, 'Sim'),(5249, 1, 26, 378, 5, 'Não'),(5250, 1, 26, 378, 12, 'Sim'),(5251, 1, 26, 378, 10, 'Sim'),(5252, 1, 26, 378, 1, 'Sim'),(5253, 1, 26, 379, 2, 'Sim'),(5254, 1, 26, 379, 6, 'Sim'),(5255, 1, 26, 379, 13, 'Sim'),(5256, 1, 26, 379, 3, 'Sim'),(5257, 1, 26, 379, 4, 'Sim'),(5258, 1, 26, 379, 8, 'Sim'),(5259, 1, 26, 379, 11, 'Sim'),(5260, 1, 26, 379, 7, 'Sim'),(5261, 1, 26, 379, 9, 'Sim'),(5262, 1, 26, 379, 5, 'Não'),(5263, 1, 26, 379, 12, 'Sim'),(5264, 1, 26, 379, 10, 'Sim'),(5265, 1, 26, 379, 1, 'Sim'),(5266, 1, 26, 380, 2, 'Sim'),(5267, 1, 26, 380, 6, 'Sim'),(5268, 1, 26, 380, 13, 'Sim'),(5269, 1, 26, 380, 3, 'Sim'),(5270, 1, 26, 380, 4, 'Sim'),(5271, 1, 26, 380, 8, 'Sim'),(5272, 1, 26, 380, 11, 'Sim'),(5273, 1, 26, 380, 7, 'Sim'),(5274, 1, 26, 380, 9, 'Sim'),(5275, 1, 26, 380, 5, 'Não'),(5276, 1, 26, 380, 12, 'Sim'),(5277, 1, 26, 380, 10, 'Sim'),(5278, 1, 26, 380, 1, 'Sim'),(5279, 1, 26, 381, 2, 'Sim'),(5280, 1, 26, 381, 6, 'Sim'),(5281, 1, 26, 381, 13, 'Sim'),(5282, 1, 26, 381, 3, 'Sim'),(5283, 1, 26, 381, 4, 'Sim'),(5284, 1, 26, 381, 8, 'Sim'),(5285, 1, 26, 381, 11, 'Sim'),(5286, 1, 26, 381, 7, 'Sim'),(5287, 1, 26, 381, 9, 'Sim'),(5288, 1, 26, 381, 5, 'Não'),(5289, 1, 26, 381, 12, 'Sim'),(5290, 1, 26, 381, 10, 'Sim'),(5291, 1, 26, 381, 1, 'Sim'),(5292, 1, 26, 382, 2, 'Sim'),(5293, 1, 26, 382, 6, 'Sim'),(5294, 1, 26, 382, 13, 'Sim'),(5295, 1, 26, 382, 3, 'Sim'),(5296, 1, 26, 382, 4, 'Sim'),(5297, 1, 26, 382, 8, 'Sim'),(5298, 1, 26, 382, 11, 'Sim'),(5299, 1, 26, 382, 7, 'Sim'),(5300, 1, 26, 382, 9, 'Sim'),(5301, 1, 26, 382, 5, 'Não'),(5302, 1, 26, 382, 12, 'Sim'),(5303, 1, 26, 382, 10, 'Sim'),(5304, 1, 26, 382, 1, 'Sim'),(5305, 1, 26, 383, 2, 'Sim'),(5306, 1, 26, 383, 6, 'Sim'),(5307, 1, 26, 383, 13, 'Sim'),(5308, 1, 26, 383, 3, 'Sim'),(5309, 1, 26, 383, 4, 'Sim'),(5310, 1, 26, 383, 8, 'Sim'),(5311, 1, 26, 383, 11, 'Sim'),(5312, 1, 26, 383, 7, 'Sim'),(5313, 1, 26, 383, 9, 'Sim'),(5314, 1, 26, 383, 5, 'Não'),(5315, 1, 26, 383, 12, 'Sim'),(5316, 1, 26, 383, 10, 'Sim'),(5317, 1, 26, 383, 1, 'Sim'),(5318, 1, 26, 384, 2, 'Sim'),(5319, 1, 26, 384, 6, 'Sim'),(5320, 1, 26, 384, 13, 'Sim'),(5321, 1, 26, 384, 3, 'Sim'),(5322, 1, 26, 384, 4, 'Sim'),(5323, 1, 26, 384, 8, 'Sim'),(5324, 1, 26, 384, 11, 'Sim'),(5325, 1, 26, 384, 7, 'Sim'),(5326, 1, 26, 384, 9, 'Sim'),(5327, 1, 26, 384, 5, 'Não'),(5328, 1, 26, 384, 12, 'Sim'),(5329, 1, 26, 384, 10, 'Sim'),(5330, 1, 26, 384, 1, 'Sim'),(5331, 1, 26, 385, 2, 'Sim'),(5332, 1, 26, 385, 6, 'Sim'),(5333, 1, 26, 385, 13, 'Sim'),(5334, 1, 26, 385, 3, 'Sim'),(5335, 1, 26, 385, 4, 'Sim'),(5336, 1, 26, 385, 8, 'Sim'),(5337, 1, 26, 385, 11, 'Sim'),(5338, 1, 26, 385, 7, 'Sim'),(5339, 1, 26, 385, 9, 'Sim'),(5340, 1, 26, 385, 5, 'Não'),(5341, 1, 26, 385, 12, 'Sim'),(5342, 1, 26, 385, 10, 'Sim'),(5343, 1, 26, 385, 1, 'Sim'),(5344, 1, 26, 386, 2, 'Sim'),(5345, 1, 26, 386, 6, 'Sim'),(5346, 1, 26, 386, 13, 'Sim'),(5347, 1, 26, 386, 3, 'Sim'),(5348, 1, 26, 386, 4, 'Sim'),(5349, 1, 26, 386, 8, 'Sim'),(5350, 1, 26, 386, 11, 'Sim'),(5351, 1, 26, 386, 7, 'Sim'),(5352, 1, 26, 386, 9, 'Sim'),(5353, 1, 26, 386, 5, 'Não'),(5354, 1, 26, 386, 12, 'Sim'),(5355, 1, 26, 386, 10, 'Sim'),(5356, 1, 26, 386, 1, 'Sim'),(5357, 1, 26, 387, 2, 'Sim'),(5358, 1, 26, 387, 6, 'Sim'),(5359, 1, 26, 387, 13, 'Sim'),(5360, 1, 26, 387, 3, 'Sim'),(5361, 1, 26, 387, 4, 'Sim'),(5362, 1, 26, 387, 8, 'Sim'),(5363, 1, 26, 387, 11, 'Sim'),(5364, 1, 26, 387, 7, 'Sim'),(5365, 1, 26, 387, 9, 'Sim'),(5366, 1, 26, 387, 5, 'Não'),(5367, 1, 26, 387, 12, 'Sim'),(5368, 1, 26, 387, 10, 'Sim'),(5369, 1, 26, 387, 1, 'Sim'),(5370, 1, 26, 388, 2, 'Sim'),(5371, 1, 26, 388, 6, 'Sim'),(5372, 1, 26, 388, 13, 'Sim'),(5373, 1, 26, 388, 3, 'Sim'),(5374, 1, 26, 388, 4, 'Sim'),(5375, 1, 26, 388, 8, 'Sim'),(5376, 1, 26, 388, 11, 'Sim'),(5377, 1, 26, 388, 7, 'Sim'),(5378, 1, 26, 388, 9, 'Sim'),(5379, 1, 26, 388, 5, 'Não'),(5380, 1, 26, 388, 12, 'Sim'),(5381, 1, 26, 388, 10, 'Sim'),(5382, 1, 26, 388, 1, 'Sim'),(5383, 1, 26, 389, 2, 'Sim'),(5384, 1, 26, 389, 6, 'Sim'),(5385, 1, 26, 389, 13, 'Sim'),(5386, 1, 26, 389, 3, 'Sim'),(5387, 1, 26, 389, 4, 'Sim'),(5388, 1, 26, 389, 8, 'Sim'),(5389, 1, 26, 389, 11, 'Sim'),(5390, 1, 26, 389, 7, 'Sim'),(5391, 1, 26, 389, 9, 'Sim'),(5392, 1, 26, 389, 5, 'Não'),(5393, 1, 26, 389, 12, 'Sim'),(5394, 1, 26, 389, 10, 'Sim'),(5395, 1, 26, 389, 1, 'Sim'),(5396, 1, 26, 390, 2, 'Sim'),(5397, 1, 26, 390, 6, 'Sim'),(5398, 1, 26, 390, 13, 'Sim'),(5399, 1, 26, 390, 3, 'Sim'),(5400, 1, 26, 390, 4, 'Sim'),(5401, 1, 26, 390, 8, 'Sim'),(5402, 1, 26, 390, 11, 'Sim'),(5403, 1, 26, 390, 7, 'Sim'),(5404, 1, 26, 390, 9, 'Sim'),(5405, 1, 26, 390, 5, 'Não'),(5406, 1, 26, 390, 12, 'Sim'),(5407, 1, 26, 390, 10, 'Sim'),(5408, 1, 26, 390, 1, 'Sim'),(5409, 1, 26, 391, 2, 'Sim'),(5410, 1, 26, 391, 6, 'Sim'),(5411, 1, 26, 391, 13, 'Sim'),(5412, 1, 26, 391, 3, 'Sim'),(5413, 1, 26, 391, 4, 'Sim'),(5414, 1, 26, 391, 8, 'Sim'),(5415, 1, 26, 391, 11, 'Sim'),(5416, 1, 26, 391, 7, 'Sim'),(5417, 1, 26, 391, 9, 'Sim'),(5418, 1, 26, 391, 5, 'Não'),(5419, 1, 26, 391, 12, 'Sim'),(5420, 1, 26, 391, 10, 'Sim'),(5421, 1, 26, 391, 1, 'Sim'),(5422, 1, 26, 392, 2, 'Sim'),(5423, 1, 26, 392, 6, 'Sim'),(5424, 1, 26, 392, 13, 'Sim'),(5425, 1, 26, 392, 3, 'Sim'),(5426, 1, 26, 392, 4, 'Sim'),(5427, 1, 26, 392, 8, 'Sim'),(5428, 1, 26, 392, 11, 'Sim'),(5429, 1, 26, 392, 7, 'Sim'),(5430, 1, 26, 392, 9, 'Sim'),(5431, 1, 26, 392, 5, 'Não'),(5432, 1, 26, 392, 12, 'Sim'),(5433, 1, 26, 392, 10, 'Sim'),(5434, 1, 26, 392, 1, 'Sim'),(5435, 1, 26, 393, 2, 'Sim'),(5436, 1, 26, 393, 6, 'Sim'),(5437, 1, 26, 393, 13, 'Sim'),(5438, 1, 26, 393, 3, 'Sim'),(5439, 1, 26, 393, 4, 'Sim'),(5440, 1, 26, 393, 8, 'Sim'),(5441, 1, 26, 393, 11, 'Sim'),(5442, 1, 26, 393, 7, 'Sim'),(5443, 1, 26, 393, 9, 'Sim'),(5444, 1, 26, 393, 5, 'Não'),(5445, 1, 26, 393, 12, 'Sim'),(5446, 1, 26, 393, 10, 'Sim'),(5447, 1, 26, 393, 1, 'Sim'),(5448, 1, 26, 394, 2, 'Sim'),(5449, 1, 26, 394, 6, 'Sim'),(5450, 1, 26, 394, 13, 'Sim'),(5451, 1, 26, 394, 3, 'Sim'),(5452, 1, 26, 394, 4, 'Sim'),(5453, 1, 26, 394, 8, 'Sim'),(5454, 1, 26, 394, 11, 'Sim'),(5455, 1, 26, 394, 7, 'Sim'),(5456, 1, 26, 394, 9, 'Sim'),(5457, 1, 26, 394, 5, 'Não'),(5458, 1, 26, 394, 12, 'Sim'),(5459, 1, 26, 394, 10, 'Sim'),(5460, 1, 26, 394, 1, 'Sim'),(5461, 1, 26, 395, 2, 'Sim'),(5462, 1, 26, 395, 6, 'Sim'),(5463, 1, 26, 395, 13, 'Sim'),(5464, 1, 26, 395, 3, 'Sim'),(5465, 1, 26, 395, 4, 'Sim'),(5466, 1, 26, 395, 8, 'Sim'),(5467, 1, 26, 395, 11, 'Sim'),(5468, 1, 26, 395, 7, 'Sim'),(5469, 1, 26, 395, 9, 'Sim'),(5470, 1, 26, 395, 5, 'Não'),(5471, 1, 26, 395, 12, 'Sim'),(5472, 1, 26, 395, 10, 'Sim'),(5473, 1, 26, 395, 1, 'Sim'),(5474, 1, 26, 396, 2, 'Sim'),(5475, 1, 26, 396, 6, 'Sim'),(5476, 1, 26, 396, 13, 'Sim'),(5477, 1, 26, 396, 3, 'Sim'),(5478, 1, 26, 396, 4, 'Sim'),(5479, 1, 26, 396, 8, 'Sim'),(5480, 1, 26, 396, 11, 'Sim'),(5481, 1, 26, 396, 7, 'Sim'),(5482, 1, 26, 396, 9, 'Sim'),(5483, 1, 26, 396, 5, 'Não'),(5484, 1, 26, 396, 12, 'Sim'),(5485, 1, 26, 396, 10, 'Sim'),(5486, 1, 26, 396, 1, 'Sim'),(5487, 1, 26, 397, 2, 'Sim'),(5488, 1, 26, 397, 6, 'Sim'),(5489, 1, 26, 397, 13, 'Sim'),(5490, 1, 26, 397, 3, 'Sim'),(5491, 1, 26, 397, 4, 'Sim'),(5492, 1, 26, 397, 8, 'Sim'),(5493, 1, 26, 397, 11, 'Sim'),(5494, 1, 26, 397, 7, 'Sim'),(5495, 1, 26, 397, 9, 'Sim'),(5496, 1, 26, 397, 5, 'Não'),(5497, 1, 26, 397, 12, 'Sim'),(5498, 1, 26, 397, 10, 'Sim'),(5499, 1, 26, 397, 1, 'Sim'),(5500, 1, 27, 0, 2, 'Sim'),(5501, 1, 27, 0, 6, 'Sim'),(5502, 1, 27, 0, 13, 'Sim'),(5503, 1, 27, 0, 3, 'Sim'),(5504, 1, 27, 0, 4, 'Sim'),(5505, 1, 27, 0, 8, 'Sim'),(5506, 1, 27, 0, 11, 'Sim'),(5507, 1, 27, 0, 7, 'Sim'),(5508, 1, 27, 0, 9, 'Sim'),(5509, 1, 27, 0, 5, 'Não'),(5510, 1, 27, 0, 12, 'Sim'),(5511, 1, 27, 0, 10, 'Sim'),(5512, 1, 27, 0, 1, 'Sim'),(5513, 1, 27, 398, 2, 'Sim'),(5514, 1, 27, 398, 6, 'Sim'),(5515, 1, 27, 398, 13, 'Sim'),(5516, 1, 27, 398, 3, 'Sim'),(5517, 1, 27, 398, 4, 'Sim'),(5518, 1, 27, 398, 8, 'Sim'),(5519, 1, 27, 398, 11, 'Sim'),(5520, 1, 27, 398, 7, 'Sim'),(5521, 1, 27, 398, 9, 'Sim'),(5522, 1, 27, 398, 5, 'Não'),(5523, 1, 27, 398, 12, 'Sim'),(5524, 1, 27, 398, 10, 'Sim'),(5525, 1, 27, 398, 1, 'Sim'),(5526, 1, 27, 399, 2, 'Sim'),(5527, 1, 27, 399, 6, 'Sim'),(5528, 1, 27, 399, 13, 'Sim'),(5529, 1, 27, 399, 3, 'Sim'),(5530, 1, 27, 399, 4, 'Sim'),(5531, 1, 27, 399, 8, 'Sim'),(5532, 1, 27, 399, 11, 'Sim'),(5533, 1, 27, 399, 7, 'Sim'),(5534, 1, 27, 399, 9, 'Sim'),(5535, 1, 27, 399, 5, 'Não'),(5536, 1, 27, 399, 12, 'Sim'),(5537, 1, 27, 399, 10, 'Sim'),(5538, 1, 27, 399, 1, 'Sim'),(5539, 1, 27, 400, 2, 'Sim'),(5540, 1, 27, 400, 6, 'Sim'),(5541, 1, 27, 400, 13, 'Sim'),(5542, 1, 27, 400, 3, 'Sim'),(5543, 1, 27, 400, 4, 'Sim'),(5544, 1, 27, 400, 8, 'Sim'),(5545, 1, 27, 400, 11, 'Sim'),(5546, 1, 27, 400, 7, 'Sim'),(5547, 1, 27, 400, 9, 'Sim'),(5548, 1, 27, 400, 5, 'Não'),(5549, 1, 27, 400, 12, 'Sim'),(5550, 1, 27, 400, 10, 'Sim'),(5551, 1, 27, 400, 1, 'Sim'),(5552, 1, 27, 401, 2, 'Sim'),(5553, 1, 27, 401, 6, 'Sim'),(5554, 1, 27, 401, 13, 'Sim'),(5555, 1, 27, 401, 3, 'Sim'),(5556, 1, 27, 401, 4, 'Sim'),(5557, 1, 27, 401, 8, 'Sim'),(5558, 1, 27, 401, 11, 'Sim'),(5559, 1, 27, 401, 7, 'Sim'),(5560, 1, 27, 401, 9, 'Sim'),(5561, 1, 27, 401, 5, 'Não'),(5562, 1, 27, 401, 12, 'Sim'),(5563, 1, 27, 401, 10, 'Sim'),(5564, 1, 27, 401, 1, 'Sim'),(5565, 1, 27, 402, 2, 'Sim'),(5566, 1, 27, 402, 6, 'Sim'),(5567, 1, 27, 402, 13, 'Sim'),(5568, 1, 27, 402, 3, 'Sim'),(5569, 1, 27, 402, 4, 'Sim'),(5570, 1, 27, 402, 8, 'Sim'),(5571, 1, 27, 402, 11, 'Sim'),(5572, 1, 27, 402, 7, 'Sim'),(5573, 1, 27, 402, 9, 'Sim'),(5574, 1, 27, 402, 5, 'Não'),(5575, 1, 27, 402, 12, 'Sim'),(5576, 1, 27, 402, 10, 'Sim'),(5577, 1, 27, 402, 1, 'Sim'),(5578, 1, 27, 403, 2, 'Sim'),(5579, 1, 27, 403, 6, 'Sim'),(5580, 1, 27, 403, 13, 'Sim'),(5581, 1, 27, 403, 3, 'Sim'),(5582, 1, 27, 403, 4, 'Sim'),(5583, 1, 27, 403, 8, 'Sim'),(5584, 1, 27, 403, 11, 'Sim'),(5585, 1, 27, 403, 7, 'Sim'),(5586, 1, 27, 403, 9, 'Sim'),(5587, 1, 27, 403, 5, 'Não'),(5588, 1, 27, 403, 12, 'Sim'),(5589, 1, 27, 403, 10, 'Sim'),(5590, 1, 27, 403, 1, 'Sim'),(5591, 1, 27, 404, 2, 'Sim'),(5592, 1, 27, 404, 6, 'Sim'),(5593, 1, 27, 404, 13, 'Sim'),(5594, 1, 27, 404, 3, 'Sim'),(5595, 1, 27, 404, 4, 'Sim'),(5596, 1, 27, 404, 8, 'Sim'),(5597, 1, 27, 404, 11, 'Sim'),(5598, 1, 27, 404, 7, 'Sim'),(5599, 1, 27, 404, 9, 'Sim'),(5600, 1, 27, 404, 5, 'Não'),(5601, 1, 27, 404, 12, 'Sim'),(5602, 1, 27, 404, 10, 'Sim'),(5603, 1, 27, 404, 1, 'Sim'),(5604, 1, 27, 405, 2, 'Sim'),(5605, 1, 27, 405, 6, 'Sim'),(5606, 1, 27, 405, 13, 'Sim'),(5607, 1, 27, 405, 3, 'Sim'),(5608, 1, 27, 405, 4, 'Sim'),(5609, 1, 27, 405, 8, 'Sim'),(5610, 1, 27, 405, 11, 'Sim'),(5611, 1, 27, 405, 7, 'Sim'),(5612, 1, 27, 405, 9, 'Sim'),(5613, 1, 27, 405, 5, 'Não'),(5614, 1, 27, 405, 12, 'Sim'),(5615, 1, 27, 405, 10, 'Sim'),(5616, 1, 27, 405, 1, 'Sim'),(5617, 1, 27, 406, 2, 'Sim'),(5618, 1, 27, 406, 6, 'Sim'),(5619, 1, 27, 406, 13, 'Sim'),(5620, 1, 27, 406, 3, 'Sim'),(5621, 1, 27, 406, 4, 'Sim'),(5622, 1, 27, 406, 8, 'Sim'),(5623, 1, 27, 406, 11, 'Sim'),(5624, 1, 27, 406, 7, 'Sim'),(5625, 1, 27, 406, 9, 'Sim'),(5626, 1, 27, 406, 5, 'Não'),(5627, 1, 27, 406, 12, 'Sim'),(5628, 1, 27, 406, 10, 'Sim'),(5629, 1, 27, 406, 1, 'Sim'),(5630, 1, 27, 407, 2, 'Sim'),(5631, 1, 27, 407, 6, 'Sim'),(5632, 1, 27, 407, 13, 'Sim'),(5633, 1, 27, 407, 3, 'Sim'),(5634, 1, 27, 407, 4, 'Sim'),(5635, 1, 27, 407, 8, 'Sim'),(5636, 1, 27, 407, 11, 'Sim'),(5637, 1, 27, 407, 7, 'Sim'),(5638, 1, 27, 407, 9, 'Sim'),(5639, 1, 27, 407, 5, 'Não'),(5640, 1, 27, 407, 12, 'Sim'),(5641, 1, 27, 407, 10, 'Sim'),(5642, 1, 27, 407, 1, 'Sim'),(5643, 1, 27, 408, 2, 'Sim'),(5644, 1, 27, 408, 6, 'Sim'),(5645, 1, 27, 408, 13, 'Sim'),(5646, 1, 27, 408, 3, 'Sim'),(5647, 1, 27, 408, 4, 'Sim'),(5648, 1, 27, 408, 8, 'Sim'),(5649, 1, 27, 408, 11, 'Sim'),(5650, 1, 27, 408, 7, 'Sim'),(5651, 1, 27, 408, 9, 'Sim'),(5652, 1, 27, 408, 5, 'Não'),(5653, 1, 27, 408, 12, 'Sim'),(5654, 1, 27, 408, 10, 'Sim'),(5655, 1, 27, 408, 1, 'Sim'),(5656, 1, 27, 409, 2, 'Sim'),(5657, 1, 27, 409, 6, 'Sim'),(5658, 1, 27, 409, 13, 'Sim'),(5659, 1, 27, 409, 3, 'Sim'),(5660, 1, 27, 409, 4, 'Sim'),(5661, 1, 27, 409, 8, 'Sim'),(5662, 1, 27, 409, 11, 'Sim'),(5663, 1, 27, 409, 7, 'Sim'),(5664, 1, 27, 409, 9, 'Sim'),(5665, 1, 27, 409, 5, 'Não'),(5666, 1, 27, 409, 12, 'Sim'),(5667, 1, 27, 409, 10, 'Sim'),(5668, 1, 27, 409, 1, 'Sim'),(5669, 1, 27, 410, 2, 'Sim'),(5670, 1, 27, 410, 6, 'Sim'),(5671, 1, 27, 410, 13, 'Sim'),(5672, 1, 27, 410, 3, 'Sim'),(5673, 1, 27, 410, 4, 'Sim'),(5674, 1, 27, 410, 8, 'Sim'),(5675, 1, 27, 410, 11, 'Sim'),(5676, 1, 27, 410, 7, 'Sim'),(5677, 1, 27, 410, 9, 'Sim'),(5678, 1, 27, 410, 5, 'Não'),(5679, 1, 27, 410, 12, 'Sim'),(5680, 1, 27, 410, 10, 'Sim'),(5681, 1, 27, 410, 1, 'Sim'),(5682, 1, 27, 411, 2, 'Sim'),(5683, 1, 27, 411, 6, 'Sim'),(5684, 1, 27, 411, 13, 'Sim'),(5685, 1, 27, 411, 3, 'Sim'),(5686, 1, 27, 411, 4, 'Sim'),(5687, 1, 27, 411, 8, 'Sim'),(5688, 1, 27, 411, 11, 'Sim'),(5689, 1, 27, 411, 7, 'Sim'),(5690, 1, 27, 411, 9, 'Sim'),(5691, 1, 27, 411, 5, 'Não'),(5692, 1, 27, 411, 12, 'Sim'),(5693, 1, 27, 411, 10, 'Sim'),(5694, 1, 27, 411, 1, 'Sim'),(5695, 1, 27, 412, 2, 'Sim'),(5696, 1, 27, 412, 6, 'Sim'),(5697, 1, 27, 412, 13, 'Sim'),(5698, 1, 27, 412, 3, 'Sim'),(5699, 1, 27, 412, 4, 'Sim'),(5700, 1, 27, 412, 8, 'Sim'),(5701, 1, 27, 412, 11, 'Sim'),(5702, 1, 27, 412, 7, 'Sim'),(5703, 1, 27, 412, 9, 'Sim'),(5704, 1, 27, 412, 5, 'Não'),(5705, 1, 27, 412, 12, 'Sim'),(5706, 1, 27, 412, 10, 'Sim'),(5707, 1, 27, 412, 1, 'Sim'),(5708, 1, 27, 413, 2, 'Sim'),(5709, 1, 27, 413, 6, 'Sim'),(5710, 1, 27, 413, 13, 'Sim'),(5711, 1, 27, 413, 3, 'Sim'),(5712, 1, 27, 413, 4, 'Sim'),(5713, 1, 27, 413, 8, 'Sim'),(5714, 1, 27, 413, 11, 'Sim'),(5715, 1, 27, 413, 7, 'Sim'),(5716, 1, 27, 413, 9, 'Sim'),(5717, 1, 27, 413, 5, 'Não'),(5718, 1, 27, 413, 12, 'Sim'),(5719, 1, 27, 413, 10, 'Sim'),(5720, 1, 27, 413, 1, 'Sim'),(5721, 1, 27, 414, 2, 'Sim'),(5722, 1, 27, 414, 6, 'Sim'),(5723, 1, 27, 414, 13, 'Sim'),(5724, 1, 27, 414, 3, 'Sim'),(5725, 1, 27, 414, 4, 'Sim'),(5726, 1, 27, 414, 8, 'Sim'),(5727, 1, 27, 414, 11, 'Sim'),(5728, 1, 27, 414, 7, 'Sim'),(5729, 1, 27, 414, 9, 'Sim'),(5730, 1, 27, 414, 5, 'Não'),(5731, 1, 27, 414, 12, 'Sim'),(5732, 1, 27, 414, 10, 'Sim'),(5733, 1, 27, 414, 1, 'Sim'),(5734, 1, 27, 415, 2, 'Sim'),(5735, 1, 27, 415, 6, 'Sim'),(5736, 1, 27, 415, 13, 'Sim'),(5737, 1, 27, 415, 3, 'Sim'),(5738, 1, 27, 415, 4, 'Sim'),(5739, 1, 27, 415, 8, 'Sim'),(5740, 1, 27, 415, 11, 'Sim'),(5741, 1, 27, 415, 7, 'Sim'),(5742, 1, 27, 415, 9, 'Sim'),(5743, 1, 27, 415, 5, 'Não'),(5744, 1, 27, 415, 12, 'Sim'),(5745, 1, 27, 415, 10, 'Sim'),(5746, 1, 27, 415, 1, 'Sim'),(5747, 1, 27, 416, 2, 'Sim'),(5748, 1, 27, 416, 6, 'Sim'),(5749, 1, 27, 416, 13, 'Sim'),(5750, 1, 27, 416, 3, 'Sim'),(5751, 1, 27, 416, 4, 'Sim'),(5752, 1, 27, 416, 8, 'Sim'),(5753, 1, 27, 416, 11, 'Sim'),(5754, 1, 27, 416, 7, 'Sim'),(5755, 1, 27, 416, 9, 'Sim'),(5756, 1, 27, 416, 5, 'Não'),(5757, 1, 27, 416, 12, 'Sim'),(5758, 1, 27, 416, 10, 'Sim'),(5759, 1, 27, 416, 1, 'Sim'),(5760, 1, 27, 417, 2, 'Sim'),(5761, 1, 27, 417, 6, 'Sim'),(5762, 1, 27, 417, 13, 'Sim'),(5763, 1, 27, 417, 3, 'Sim'),(5764, 1, 27, 417, 4, 'Sim'),(5765, 1, 27, 417, 8, 'Sim'),(5766, 1, 27, 417, 11, 'Sim'),(5767, 1, 27, 417, 7, 'Sim'),(5768, 1, 27, 417, 9, 'Sim'),(5769, 1, 27, 417, 5, 'Não'),(5770, 1, 27, 417, 12, 'Sim'),(5771, 1, 27, 417, 10, 'Sim'),(5772, 1, 27, 417, 1, 'Sim'),(5773, 1, 27, 418, 2, 'Sim'),(5774, 1, 27, 418, 6, 'Sim'),(5775, 1, 27, 418, 13, 'Sim'),(5776, 1, 27, 418, 3, 'Sim'),(5777, 1, 27, 418, 4, 'Sim'),(5778, 1, 27, 418, 8, 'Sim'),(5779, 1, 27, 418, 11, 'Sim'),(5780, 1, 27, 418, 7, 'Sim'),(5781, 1, 27, 418, 9, 'Sim'),(5782, 1, 27, 418, 5, 'Não'),(5783, 1, 27, 418, 12, 'Sim'),(5784, 1, 27, 418, 10, 'Sim'),(5785, 1, 27, 418, 1, 'Sim'),(5786, 1, 27, 419, 2, 'Sim'),(5787, 1, 27, 419, 6, 'Sim'),(5788, 1, 27, 419, 13, 'Sim'),(5789, 1, 27, 419, 3, 'Sim'),(5790, 1, 27, 419, 4, 'Sim'),(5791, 1, 27, 419, 8, 'Sim'),(5792, 1, 27, 419, 11, 'Sim'),(5793, 1, 27, 419, 7, 'Sim'),(5794, 1, 27, 419, 9, 'Sim'),(5795, 1, 27, 419, 5, 'Não'),(5796, 1, 27, 419, 12, 'Sim'),(5797, 1, 27, 419, 10, 'Sim'),(5798, 1, 27, 419, 1, 'Sim'),(5799, 1, 27, 420, 2, 'Sim'),(5800, 1, 27, 420, 6, 'Sim'),(5801, 1, 27, 420, 13, 'Sim'),(5802, 1, 27, 420, 3, 'Sim'),(5803, 1, 27, 420, 4, 'Sim'),(5804, 1, 27, 420, 8, 'Sim'),(5805, 1, 27, 420, 11, 'Sim'),(5806, 1, 27, 420, 7, 'Sim'),(5807, 1, 27, 420, 9, 'Sim'),(5808, 1, 27, 420, 5, 'Não'),(5809, 1, 27, 420, 12, 'Sim'),(5810, 1, 27, 420, 10, 'Sim'),(5811, 1, 27, 420, 1, 'Sim'),(5812, 1, 27, 421, 2, 'Sim'),(5813, 1, 27, 421, 6, 'Sim'),(5814, 1, 27, 421, 13, 'Sim'),(5815, 1, 27, 421, 3, 'Sim'),(5816, 1, 27, 421, 4, 'Sim'),(5817, 1, 27, 421, 8, 'Sim'),(5818, 1, 27, 421, 11, 'Sim'),(5819, 1, 27, 421, 7, 'Sim'),(5820, 1, 27, 421, 9, 'Sim'),(5821, 1, 27, 421, 5, 'Não'),(5822, 1, 27, 421, 12, 'Sim'),(5823, 1, 27, 421, 10, 'Sim'),(5824, 1, 27, 421, 1, 'Sim'),(5825, 1, 27, 422, 2, 'Sim'),(5826, 1, 27, 422, 6, 'Sim'),(5827, 1, 27, 422, 13, 'Sim'),(5828, 1, 27, 422, 3, 'Sim'),(5829, 1, 27, 422, 4, 'Sim'),(5830, 1, 27, 422, 8, 'Sim'),(5831, 1, 27, 422, 11, 'Sim'),(5832, 1, 27, 422, 7, 'Sim'),(5833, 1, 27, 422, 9, 'Sim'),(5834, 1, 27, 422, 5, 'Não'),(5835, 1, 27, 422, 12, 'Sim'),(5836, 1, 27, 422, 10, 'Sim'),(5837, 1, 27, 422, 1, 'Sim'),(5838, 1, 27, 423, 2, 'Sim'),(5839, 1, 27, 423, 6, 'Sim'),(5840, 1, 27, 423, 13, 'Sim'),(5841, 1, 27, 423, 3, 'Sim'),(5842, 1, 27, 423, 4, 'Sim'),(5843, 1, 27, 423, 8, 'Sim'),(5844, 1, 27, 423, 11, 'Sim'),(5845, 1, 27, 423, 7, 'Sim'),(5846, 1, 27, 423, 9, 'Sim'),(5847, 1, 27, 423, 5, 'Não'),(5848, 1, 27, 423, 12, 'Sim'),(5849, 1, 27, 423, 10, 'Sim'),(5850, 1, 27, 423, 1, 'Sim'),(5851, 1, 27, 424, 2, 'Sim'),(5852, 1, 27, 424, 6, 'Sim'),(5853, 1, 27, 424, 13, 'Sim'),(5854, 1, 27, 424, 3, 'Sim'),(5855, 1, 27, 424, 4, 'Sim'),(5856, 1, 27, 424, 8, 'Sim'),(5857, 1, 27, 424, 11, 'Sim'),(5858, 1, 27, 424, 7, 'Sim'),(5859, 1, 27, 424, 9, 'Sim'),(5860, 1, 27, 424, 5, 'Não'),(5861, 1, 27, 424, 12, 'Sim'),(5862, 1, 27, 424, 10, 'Sim'),(5863, 1, 27, 424, 1, 'Sim'),(5864, 1, 27, 425, 2, 'Sim'),(5865, 1, 27, 425, 6, 'Sim'),(5866, 1, 27, 425, 13, 'Sim'),(5867, 1, 27, 425, 3, 'Sim'),(5868, 1, 27, 425, 4, 'Sim'),(5869, 1, 27, 425, 8, 'Sim'),(5870, 1, 27, 425, 11, 'Sim'),(5871, 1, 27, 425, 7, 'Sim'),(5872, 1, 27, 425, 9, 'Sim'),(5873, 1, 27, 425, 5, 'Não'),(5874, 1, 27, 425, 12, 'Sim'),(5875, 1, 27, 425, 10, 'Sim'),(5876, 1, 27, 425, 1, 'Sim'),(5877, 1, 27, 426, 2, 'Sim'),(5878, 1, 27, 426, 6, 'Sim'),(5879, 1, 27, 426, 13, 'Sim'),(5880, 1, 27, 426, 3, 'Sim'),(5881, 1, 27, 426, 4, 'Sim'),(5882, 1, 27, 426, 8, 'Sim'),(5883, 1, 27, 426, 11, 'Sim'),(5884, 1, 27, 426, 7, 'Sim'),(5885, 1, 27, 426, 9, 'Sim'),(5886, 1, 27, 426, 5, 'Não'),(5887, 1, 27, 426, 12, 'Sim'),(5888, 1, 27, 426, 10, 'Sim'),(5889, 1, 27, 426, 1, 'Sim'),(5890, 1, 27, 427, 2, 'Sim'),(5891, 1, 27, 427, 6, 'Sim'),(5892, 1, 27, 427, 13, 'Sim'),(5893, 1, 27, 427, 3, 'Sim'),(5894, 1, 27, 427, 4, 'Sim'),(5895, 1, 27, 427, 8, 'Sim'),(5896, 1, 27, 427, 11, 'Sim'),(5897, 1, 27, 427, 7, 'Sim'),(5898, 1, 27, 427, 9, 'Sim'),(5899, 1, 27, 427, 5, 'Não'),(5900, 1, 27, 427, 12, 'Sim'),(5901, 1, 27, 427, 10, 'Sim'),(5902, 1, 27, 427, 1, 'Sim'),(5903, 1, 27, 428, 2, 'Sim'),(5904, 1, 27, 428, 6, 'Sim'),(5905, 1, 27, 428, 13, 'Sim'),(5906, 1, 27, 428, 3, 'Sim'),(5907, 1, 27, 428, 4, 'Sim'),(5908, 1, 27, 428, 8, 'Sim'),(5909, 1, 27, 428, 11, 'Sim'),(5910, 1, 27, 428, 7, 'Sim'),(5911, 1, 27, 428, 9, 'Sim'),(5912, 1, 27, 428, 5, 'Não'),(5913, 1, 27, 428, 12, 'Sim'),(5914, 1, 27, 428, 10, 'Sim'),(5915, 1, 27, 428, 1, 'Sim'),(5916, 1, 27, 429, 2, 'Sim'),(5917, 1, 27, 429, 6, 'Sim'),(5918, 1, 27, 429, 13, 'Sim'),(5919, 1, 27, 429, 3, 'Sim'),(5920, 1, 27, 429, 4, 'Sim'),(5921, 1, 27, 429, 8, 'Sim'),(5922, 1, 27, 429, 11, 'Sim'),(5923, 1, 27, 429, 7, 'Sim'),(5924, 1, 27, 429, 9, 'Sim'),(5925, 1, 27, 429, 5, 'Não'),(5926, 1, 27, 429, 12, 'Sim'),(5927, 1, 27, 429, 10, 'Sim'),(5928, 1, 27, 429, 1, 'Sim'),(5929, 1, 27, 430, 2, 'Sim'),(5930, 1, 27, 430, 6, 'Sim'),(5931, 1, 27, 430, 13, 'Sim'),(5932, 1, 27, 430, 3, 'Sim'),(5933, 1, 27, 430, 4, 'Sim'),(5934, 1, 27, 430, 8, 'Sim'),(5935, 1, 27, 430, 11, 'Sim'),(5936, 1, 27, 430, 7, 'Sim'),(5937, 1, 27, 430, 9, 'Sim'),(5938, 1, 27, 430, 5, 'Não'),(5939, 1, 27, 430, 12, 'Sim'),(5940, 1, 27, 430, 10, 'Sim'),(5941, 1, 27, 430, 1, 'Sim'),(5942, 1, 27, 431, 2, 'Sim'),(5943, 1, 27, 431, 6, 'Sim'),(5944, 1, 27, 431, 13, 'Sim'),(5945, 1, 27, 431, 3, 'Sim'),(5946, 1, 27, 431, 4, 'Sim'),(5947, 1, 27, 431, 8, 'Sim'),(5948, 1, 27, 431, 11, 'Sim'),(5949, 1, 27, 431, 7, 'Sim'),(5950, 1, 27, 431, 9, 'Sim'),(5951, 1, 27, 431, 5, 'Não'),(5952, 1, 27, 431, 12, 'Sim'),(5953, 1, 27, 431, 10, 'Sim'),(5954, 1, 27, 431, 1, 'Sim'),(5955, 1, 27, 432, 2, 'Sim'),(5956, 1, 27, 432, 6, 'Sim'),(5957, 1, 27, 432, 13, 'Sim'),(5958, 1, 27, 432, 3, 'Sim'),(5959, 1, 27, 432, 4, 'Sim'),(5960, 1, 27, 432, 8, 'Sim'),(5961, 1, 27, 432, 11, 'Sim'),(5962, 1, 27, 432, 7, 'Sim'),(5963, 1, 27, 432, 9, 'Sim'),(5964, 1, 27, 432, 5, 'Não'),(5965, 1, 27, 432, 12, 'Sim'),(5966, 1, 27, 432, 10, 'Sim'),(5967, 1, 27, 432, 1, 'Sim'),(5968, 1, 27, 433, 2, 'Sim'),(5969, 1, 27, 433, 6, 'Sim'),(5970, 1, 27, 433, 13, 'Sim'),(5971, 1, 27, 433, 3, 'Sim'),(5972, 1, 27, 433, 4, 'Sim'),(5973, 1, 27, 433, 8, 'Sim'),(5974, 1, 27, 433, 11, 'Sim'),(5975, 1, 27, 433, 7, 'Sim'),(5976, 1, 27, 433, 9, 'Sim'),(5977, 1, 27, 433, 5, 'Não'),(5978, 1, 27, 433, 12, 'Sim'),(5979, 1, 27, 433, 10, 'Sim'),(5980, 1, 27, 433, 1, 'Sim'),(5981, 1, 27, 434, 2, 'Sim'),(5982, 1, 27, 434, 6, 'Sim'),(5983, 1, 27, 434, 13, 'Sim'),(5984, 1, 27, 434, 3, 'Sim'),(5985, 1, 27, 434, 4, 'Sim'),(5986, 1, 27, 434, 8, 'Sim'),(5987, 1, 27, 434, 11, 'Sim'),(5988, 1, 27, 434, 7, 'Sim'),(5989, 1, 27, 434, 9, 'Sim'),(5990, 1, 27, 434, 5, 'Não'),(5991, 1, 27, 434, 12, 'Sim'),(5992, 1, 27, 434, 10, 'Sim'),(5993, 1, 27, 434, 1, 'Sim'),(5994, 1, 27, 435, 2, 'Sim'),(5995, 1, 27, 435, 6, 'Sim'),(5996, 1, 27, 435, 13, 'Sim'),(5997, 1, 27, 435, 3, 'Sim'),(5998, 1, 27, 435, 4, 'Sim'),(5999, 1, 27, 435, 8, 'Sim'),(6000, 1, 27, 435, 11, 'Sim'),(6001, 1, 27, 435, 7, 'Sim'),(6002, 1, 27, 435, 9, 'Sim'),(6003, 1, 27, 435, 5, 'Não'),(6004, 1, 27, 435, 12, 'Sim'),(6005, 1, 27, 435, 10, 'Sim'),(6006, 1, 27, 435, 1, 'Sim'),(6007, 1, 27, 436, 2, 'Sim'),(6008, 1, 27, 436, 6, 'Sim'),(6009, 1, 27, 436, 13, 'Sim'),(6010, 1, 27, 436, 3, 'Sim'),(6011, 1, 27, 436, 4, 'Sim'),(6012, 1, 27, 436, 8, 'Sim'),(6013, 1, 27, 436, 11, 'Sim'),(6014, 1, 27, 436, 7, 'Sim'),(6015, 1, 27, 436, 9, 'Sim'),(6016, 1, 27, 436, 5, 'Não'),(6017, 1, 27, 436, 12, 'Sim'),(6018, 1, 27, 436, 10, 'Sim'),(6019, 1, 27, 436, 1, 'Sim'),(6020, 1, 27, 437, 2, 'Sim'),(6021, 1, 27, 437, 6, 'Sim'),(6022, 1, 27, 437, 13, 'Sim'),(6023, 1, 27, 437, 3, 'Sim'),(6024, 1, 27, 437, 4, 'Sim'),(6025, 1, 27, 437, 8, 'Sim'),(6026, 1, 27, 437, 11, 'Sim'),(6027, 1, 27, 437, 7, 'Sim'),(6028, 1, 27, 437, 9, 'Sim'),(6029, 1, 27, 437, 5, 'Não'),(6030, 1, 27, 437, 12, 'Sim'),(6031, 1, 27, 437, 10, 'Sim'),(6032, 1, 27, 437, 1, 'Sim'),(6033, 1, 27, 438, 2, 'Sim'),(6034, 1, 27, 438, 6, 'Sim'),(6035, 1, 27, 438, 13, 'Sim'),(6036, 1, 27, 438, 3, 'Sim'),(6037, 1, 27, 438, 4, 'Sim'),(6038, 1, 27, 438, 8, 'Sim'),(6039, 1, 27, 438, 11, 'Sim'),(6040, 1, 27, 438, 7, 'Sim'),(6041, 1, 27, 438, 9, 'Sim'),(6042, 1, 27, 438, 5, 'Não'),(6043, 1, 27, 438, 12, 'Sim'),(6044, 1, 27, 438, 10, 'Sim'),(6045, 1, 27, 438, 1, 'Sim'),(6046, 1, 27, 439, 2, 'Sim'),(6047, 1, 27, 439, 6, 'Sim'),(6048, 1, 27, 439, 13, 'Sim'),(6049, 1, 27, 439, 3, 'Sim'),(6050, 1, 27, 439, 4, 'Sim'),(6051, 1, 27, 439, 8, 'Sim'),(6052, 1, 27, 439, 11, 'Sim'),(6053, 1, 27, 439, 7, 'Sim'),(6054, 1, 27, 439, 9, 'Sim'),(6055, 1, 27, 439, 5, 'Não'),(6056, 1, 27, 439, 12, 'Sim'),(6057, 1, 27, 439, 10, 'Sim'),(6058, 1, 27, 439, 1, 'Sim'),(6059, 1, 27, 440, 2, 'Sim'),(6060, 1, 27, 440, 6, 'Sim'),(6061, 1, 27, 440, 13, 'Sim'),(6062, 1, 27, 440, 3, 'Sim'),(6063, 1, 27, 440, 4, 'Sim'),(6064, 1, 27, 440, 8, 'Sim'),(6065, 1, 27, 440, 11, 'Sim'),(6066, 1, 27, 440, 7, 'Sim'),(6067, 1, 27, 440, 9, 'Sim'),(6068, 1, 27, 440, 5, 'Não'),(6069, 1, 27, 440, 12, 'Sim'),(6070, 1, 27, 440, 10, 'Sim'),(6071, 1, 27, 440, 1, 'Sim'),(6072, 1, 27, 441, 2, 'Sim'),(6073, 1, 27, 441, 6, 'Sim'),(6074, 1, 27, 441, 13, 'Sim'),(6075, 1, 27, 441, 3, 'Sim'),(6076, 1, 27, 441, 4, 'Sim'),(6077, 1, 27, 441, 8, 'Sim'),(6078, 1, 27, 441, 11, 'Sim'),(6079, 1, 27, 441, 7, 'Sim'),(6080, 1, 27, 441, 9, 'Sim'),(6081, 1, 27, 441, 5, 'Não'),(6082, 1, 27, 441, 12, 'Sim'),(6083, 1, 27, 441, 10, 'Sim'),(6084, 1, 27, 441, 1, 'Sim'),(6085, 1, 27, 442, 2, 'Sim'),(6086, 1, 27, 442, 6, 'Sim'),(6087, 1, 27, 442, 13, 'Sim'),(6088, 1, 27, 442, 3, 'Sim'),(6089, 1, 27, 442, 4, 'Sim'),(6090, 1, 27, 442, 8, 'Sim'),(6091, 1, 27, 442, 11, 'Sim'),(6092, 1, 27, 442, 7, 'Sim'),(6093, 1, 27, 442, 9, 'Sim'),(6094, 1, 27, 442, 5, 'Não'),(6095, 1, 27, 442, 12, 'Sim'),(6096, 1, 27, 442, 10, 'Sim'),(6097, 1, 27, 442, 1, 'Sim'),(6098, 1, 27, 443, 2, 'Sim'),(6099, 1, 27, 443, 6, 'Sim'),(6100, 1, 27, 443, 13, 'Sim'),(6101, 1, 27, 443, 3, 'Sim'),(6102, 1, 27, 443, 4, 'Sim'),(6103, 1, 27, 443, 8, 'Sim'),(6104, 1, 27, 443, 11, 'Sim'),(6105, 1, 27, 443, 7, 'Sim'),(6106, 1, 27, 443, 9, 'Sim'),(6107, 1, 27, 443, 5, 'Não'),(6108, 1, 27, 443, 12, 'Sim'),(6109, 1, 27, 443, 10, 'Sim'),(6110, 1, 27, 443, 1, 'Sim'),(6111, 1, 27, 444, 2, 'Sim'),(6112, 1, 27, 444, 6, 'Sim'),(6113, 1, 27, 444, 13, 'Sim'),(6114, 1, 27, 444, 3, 'Sim'),(6115, 1, 27, 444, 4, 'Sim'),(6116, 1, 27, 444, 8, 'Sim'),(6117, 1, 27, 444, 11, 'Sim'),(6118, 1, 27, 444, 7, 'Sim'),(6119, 1, 27, 444, 9, 'Sim'),(6120, 1, 27, 444, 5, 'Não'),(6121, 1, 27, 444, 12, 'Sim'),(6122, 1, 27, 444, 10, 'Sim'),(6123, 1, 27, 444, 1, 'Sim'),(6124, 1, 27, 445, 2, 'Sim'),(6125, 1, 27, 445, 6, 'Sim'),(6126, 1, 27, 445, 13, 'Sim'),(6127, 1, 27, 445, 3, 'Sim'),(6128, 1, 27, 445, 4, 'Sim'),(6129, 1, 27, 445, 8, 'Sim'),(6130, 1, 27, 445, 11, 'Sim'),(6131, 1, 27, 445, 7, 'Sim'),(6132, 1, 27, 445, 9, 'Sim'),(6133, 1, 27, 445, 5, 'Não'),(6134, 1, 27, 445, 12, 'Sim'),(6135, 1, 27, 445, 10, 'Sim'),(6136, 1, 27, 445, 1, 'Sim'),(6137, 1, 27, 446, 2, 'Sim'),(6138, 1, 27, 446, 6, 'Sim'),(6139, 1, 27, 446, 13, 'Sim'),(6140, 1, 27, 446, 3, 'Sim'),(6141, 1, 27, 446, 4, 'Sim'),(6142, 1, 27, 446, 8, 'Sim'),(6143, 1, 27, 446, 11, 'Sim'),(6144, 1, 27, 446, 7, 'Sim'),(6145, 1, 27, 446, 9, 'Sim'),(6146, 1, 27, 446, 5, 'Não'),(6147, 1, 27, 446, 12, 'Sim'),(6148, 1, 27, 446, 10, 'Sim'),(6149, 1, 27, 446, 1, 'Sim'),(6150, 1, 27, 447, 2, 'Sim'),(6151, 1, 27, 447, 6, 'Sim'),(6152, 1, 27, 447, 13, 'Sim'),(6153, 1, 27, 447, 3, 'Sim'),(6154, 1, 27, 447, 4, 'Sim'),(6155, 1, 27, 447, 8, 'Sim'),(6156, 1, 27, 447, 11, 'Sim'),(6157, 1, 27, 447, 7, 'Sim'),(6158, 1, 27, 447, 9, 'Sim'),(6159, 1, 27, 447, 5, 'Não'),(6160, 1, 27, 447, 12, 'Sim'),(6161, 1, 27, 447, 10, 'Sim'),(6162, 1, 27, 447, 1, 'Sim'),(6163, 1, 27, 448, 2, 'Sim'),(6164, 1, 27, 448, 6, 'Sim'),(6165, 1, 27, 448, 13, 'Sim'),(6166, 1, 27, 448, 3, 'Sim'),(6167, 1, 27, 448, 4, 'Sim'),(6168, 1, 27, 448, 8, 'Sim'),(6169, 1, 27, 448, 11, 'Sim'),(6170, 1, 27, 448, 7, 'Sim'),(6171, 1, 27, 448, 9, 'Sim'),(6172, 1, 27, 448, 5, 'Não'),(6173, 1, 27, 448, 12, 'Sim'),(6174, 1, 27, 448, 10, 'Sim'),(6175, 1, 27, 448, 1, 'Sim'),(6176, 1, 27, 449, 2, 'Sim'),(6177, 1, 27, 449, 6, 'Sim'),(6178, 1, 27, 449, 13, 'Sim'),(6179, 1, 27, 449, 3, 'Sim'),(6180, 1, 27, 449, 4, 'Sim'),(6181, 1, 27, 449, 8, 'Sim'),(6182, 1, 27, 449, 11, 'Sim'),(6183, 1, 27, 449, 7, 'Sim'),(6184, 1, 27, 449, 9, 'Sim'),(6185, 1, 27, 449, 5, 'Não'),(6186, 1, 27, 449, 12, 'Sim'),(6187, 1, 27, 449, 10, 'Sim'),(6188, 1, 27, 449, 1, 'Sim'),(6189, 1, 27, 450, 2, 'Sim'),(6190, 1, 27, 450, 6, 'Sim'),(6191, 1, 27, 450, 13, 'Sim'),(6192, 1, 27, 450, 3, 'Sim'),(6193, 1, 27, 450, 4, 'Sim'),(6194, 1, 27, 450, 8, 'Sim'),(6195, 1, 27, 450, 11, 'Sim'),(6196, 1, 27, 450, 7, 'Sim'),(6197, 1, 27, 450, 9, 'Sim'),(6198, 1, 27, 450, 5, 'Não'),(6199, 1, 27, 450, 12, 'Sim'),(6200, 1, 27, 450, 10, 'Sim'),(6201, 1, 27, 450, 1, 'Sim'),(6202, 1, 27, 451, 2, 'Sim'),(6203, 1, 27, 451, 6, 'Sim'),(6204, 1, 27, 451, 13, 'Sim'),(6205, 1, 27, 451, 3, 'Sim'),(6206, 1, 27, 451, 4, 'Sim'),(6207, 1, 27, 451, 8, 'Sim'),(6208, 1, 27, 451, 11, 'Sim'),(6209, 1, 27, 451, 7, 'Sim'),(6210, 1, 27, 451, 9, 'Sim'),(6211, 1, 27, 451, 5, 'Não'),(6212, 1, 27, 451, 12, 'Sim'),(6213, 1, 27, 451, 10, 'Sim'),(6214, 1, 27, 451, 1, 'Sim'),(6215, 1, 27, 452, 2, 'Sim'),(6216, 1, 27, 452, 6, 'Sim'),(6217, 1, 27, 452, 13, 'Sim'),(6218, 1, 27, 452, 3, 'Sim'),(6219, 1, 27, 452, 4, 'Sim'),(6220, 1, 27, 452, 8, 'Sim'),(6221, 1, 27, 452, 11, 'Sim'),(6222, 1, 27, 452, 7, 'Sim'),(6223, 1, 27, 452, 9, 'Sim'),(6224, 1, 27, 452, 5, 'Não'),(6225, 1, 27, 452, 12, 'Sim'),(6226, 1, 27, 452, 10, 'Sim'),(6227, 1, 27, 452, 1, 'Sim'),(6228, 1, 27, 453, 2, 'Sim'),(6229, 1, 27, 453, 6, 'Sim'),(6230, 1, 27, 453, 13, 'Sim'),(6231, 1, 27, 453, 3, 'Sim'),(6232, 1, 27, 453, 4, 'Sim'),(6233, 1, 27, 453, 8, 'Sim'),(6234, 1, 27, 453, 11, 'Sim'),(6235, 1, 27, 453, 7, 'Sim'),(6236, 1, 27, 453, 9, 'Sim'),(6237, 1, 27, 453, 5, 'Não'),(6238, 1, 27, 453, 12, 'Sim'),(6239, 1, 27, 453, 10, 'Sim'),(6240, 1, 27, 453, 1, 'Sim'),(6241, 1, 27, 454, 2, 'Sim'),(6242, 1, 27, 454, 6, 'Sim'),(6243, 1, 27, 454, 13, 'Sim'),(6244, 1, 27, 454, 3, 'Sim'),(6245, 1, 27, 454, 4, 'Sim'),(6246, 1, 27, 454, 8, 'Sim'),(6247, 1, 27, 454, 11, 'Sim'),(6248, 1, 27, 454, 7, 'Sim'),(6249, 1, 27, 454, 9, 'Sim'),(6250, 1, 27, 454, 5, 'Não'),(6251, 1, 27, 454, 12, 'Sim'),(6252, 1, 27, 454, 10, 'Sim'),(6253, 1, 27, 454, 1, 'Sim'),(6254, 1, 27, 455, 2, 'Sim'),(6255, 1, 27, 455, 6, 'Sim'),(6256, 1, 27, 455, 13, 'Sim'),(6257, 1, 27, 455, 3, 'Sim'),(6258, 1, 27, 455, 4, 'Sim'),(6259, 1, 27, 455, 8, 'Sim'),(6260, 1, 27, 455, 11, 'Sim'),(6261, 1, 27, 455, 7, 'Sim'),(6262, 1, 27, 455, 9, 'Sim'),(6263, 1, 27, 455, 5, 'Não'),(6264, 1, 27, 455, 12, 'Sim'),(6265, 1, 27, 455, 10, 'Sim'),(6266, 1, 27, 455, 1, 'Sim'),(6267, 1, 27, 456, 2, 'Sim'),(6268, 1, 27, 456, 6, 'Sim'),(6269, 1, 27, 456, 13, 'Sim'),(6270, 1, 27, 456, 3, 'Sim'),(6271, 1, 27, 456, 4, 'Sim'),(6272, 1, 27, 456, 8, 'Sim'),(6273, 1, 27, 456, 11, 'Sim'),(6274, 1, 27, 456, 7, 'Sim'),(6275, 1, 27, 456, 9, 'Sim'),(6276, 1, 27, 456, 5, 'Não'),(6277, 1, 27, 456, 12, 'Sim'),(6278, 1, 27, 456, 10, 'Sim'),(6279, 1, 27, 456, 1, 'Sim'),(6280, 1, 27, 457, 2, 'Sim'),(6281, 1, 27, 457, 6, 'Sim'),(6282, 1, 27, 457, 13, 'Sim'),(6283, 1, 27, 457, 3, 'Sim'),(6284, 1, 27, 457, 4, 'Sim'),(6285, 1, 27, 457, 8, 'Sim'),(6286, 1, 27, 457, 11, 'Sim'),(6287, 1, 27, 457, 7, 'Sim'),(6288, 1, 27, 457, 9, 'Sim'),(6289, 1, 27, 457, 5, 'Não'),(6290, 1, 27, 457, 12, 'Sim'),(6291, 1, 27, 457, 10, 'Sim'),(6292, 1, 27, 457, 1, 'Sim'),(6293, 1, 27, 458, 2, 'Sim'),(6294, 1, 27, 458, 6, 'Sim'),(6295, 1, 27, 458, 13, 'Sim'),(6296, 1, 27, 458, 3, 'Sim'),(6297, 1, 27, 458, 4, 'Sim'),(6298, 1, 27, 458, 8, 'Sim'),(6299, 1, 27, 458, 11, 'Sim'),(6300, 1, 27, 458, 7, 'Sim'),(6301, 1, 27, 458, 9, 'Sim'),(6302, 1, 27, 458, 5, 'Não'),(6303, 1, 27, 458, 12, 'Sim'),(6304, 1, 27, 458, 10, 'Sim'),(6305, 1, 27, 458, 1, 'Sim'),(6306, 1, 27, 459, 2, 'Sim'),(6307, 1, 27, 459, 6, 'Sim'),(6308, 1, 27, 459, 13, 'Sim'),(6309, 1, 27, 459, 3, 'Sim'),(6310, 1, 27, 459, 4, 'Sim'),(6311, 1, 27, 459, 8, 'Sim'),(6312, 1, 27, 459, 11, 'Sim'),(6313, 1, 27, 459, 7, 'Sim'),(6314, 1, 27, 459, 9, 'Sim'),(6315, 1, 27, 459, 5, 'Não'),(6316, 1, 27, 459, 12, 'Sim'),(6317, 1, 27, 459, 10, 'Sim'),(6318, 1, 27, 459, 1, 'Sim'),(6319, 1, 27, 460, 2, 'Sim'),(6320, 1, 27, 460, 6, 'Sim'),(6321, 1, 27, 460, 13, 'Sim'),(6322, 1, 27, 460, 3, 'Sim'),(6323, 1, 27, 460, 4, 'Sim'),(6324, 1, 27, 460, 8, 'Sim'),(6325, 1, 27, 460, 11, 'Sim'),(6326, 1, 27, 460, 7, 'Sim'),(6327, 1, 27, 460, 9, 'Sim'),(6328, 1, 27, 460, 5, 'Não'),(6329, 1, 27, 460, 12, 'Sim'),(6330, 1, 27, 460, 10, 'Sim'),(6331, 1, 27, 460, 1, 'Sim'),(6332, 1, 27, 461, 2, 'Sim'),(6333, 1, 27, 461, 6, 'Sim'),(6334, 1, 27, 461, 13, 'Sim'),(6335, 1, 27, 461, 3, 'Sim'),(6336, 1, 27, 461, 4, 'Sim'),(6337, 1, 27, 461, 8, 'Sim'),(6338, 1, 27, 461, 11, 'Sim'),(6339, 1, 27, 461, 7, 'Sim'),(6340, 1, 27, 461, 9, 'Sim'),(6341, 1, 27, 461, 5, 'Não'),(6342, 1, 27, 461, 12, 'Sim'),(6343, 1, 27, 461, 10, 'Sim'),(6344, 1, 27, 461, 1, 'Sim'),(6345, 1, 27, 462, 2, 'Sim'),(6346, 1, 27, 462, 6, 'Sim'),(6347, 1, 27, 462, 13, 'Sim'),(6348, 1, 27, 462, 3, 'Sim'),(6349, 1, 27, 462, 4, 'Sim'),(6350, 1, 27, 462, 8, 'Sim'),(6351, 1, 27, 462, 11, 'Sim'),(6352, 1, 27, 462, 7, 'Sim'),(6353, 1, 27, 462, 9, 'Sim'),(6354, 1, 27, 462, 5, 'Não'),(6355, 1, 27, 462, 12, 'Sim'),(6356, 1, 27, 462, 10, 'Sim'),(6357, 1, 27, 462, 1, 'Sim'),(6358, 1, 27, 463, 2, 'Sim'),(6359, 1, 27, 463, 6, 'Sim'),(6360, 1, 27, 463, 13, 'Sim'),(6361, 1, 27, 463, 3, 'Sim'),(6362, 1, 27, 463, 4, 'Sim'),(6363, 1, 27, 463, 8, 'Sim'),(6364, 1, 27, 463, 11, 'Sim'),(6365, 1, 27, 463, 7, 'Sim'),(6366, 1, 27, 463, 9, 'Sim'),(6367, 1, 27, 463, 5, 'Não'),(6368, 1, 27, 463, 12, 'Sim'),(6369, 1, 27, 463, 10, 'Sim'),(6370, 1, 27, 463, 1, 'Sim'),(6371, 1, 27, 464, 2, 'Sim'),(6372, 1, 27, 464, 6, 'Sim'),(6373, 1, 27, 464, 13, 'Sim'),(6374, 1, 27, 464, 3, 'Sim'),(6375, 1, 27, 464, 4, 'Sim'),(6376, 1, 27, 464, 8, 'Sim'),(6377, 1, 27, 464, 11, 'Sim'),(6378, 1, 27, 464, 7, 'Sim'),(6379, 1, 27, 464, 9, 'Sim'),(6380, 1, 27, 464, 5, 'Não'),(6381, 1, 27, 464, 12, 'Sim'),(6382, 1, 27, 464, 10, 'Sim'),(6383, 1, 27, 464, 1, 'Sim'),(6384, 1, 27, 465, 2, 'Sim'),(6385, 1, 27, 465, 6, 'Sim'),(6386, 1, 27, 465, 13, 'Sim'),(6387, 1, 27, 465, 3, 'Sim'),(6388, 1, 27, 465, 4, 'Sim'),(6389, 1, 27, 465, 8, 'Sim'),(6390, 1, 27, 465, 11, 'Sim'),(6391, 1, 27, 465, 7, 'Sim'),(6392, 1, 27, 465, 9, 'Sim'),(6393, 1, 27, 465, 5, 'Não'),(6394, 1, 27, 465, 12, 'Sim'),(6395, 1, 27, 465, 10, 'Sim'),(6396, 1, 27, 465, 1, 'Sim'),(6397, 1, 27, 466, 2, 'Sim'),(6398, 1, 27, 466, 6, 'Sim'),(6399, 1, 27, 466, 13, 'Sim'),(6400, 1, 27, 466, 3, 'Sim'),(6401, 1, 27, 466, 4, 'Sim'),(6402, 1, 27, 466, 8, 'Sim'),(6403, 1, 27, 466, 11, 'Sim'),(6404, 1, 27, 466, 7, 'Sim'),(6405, 1, 27, 466, 9, 'Sim'),(6406, 1, 27, 466, 5, 'Não'),(6407, 1, 27, 466, 12, 'Sim'),(6408, 1, 27, 466, 10, 'Sim'),(6409, 1, 27, 466, 1, 'Sim'),(6410, 1, 27, 467, 2, 'Sim'),(6411, 1, 27, 467, 6, 'Sim'),(6412, 1, 27, 467, 13, 'Sim'),(6413, 1, 27, 467, 3, 'Sim'),(6414, 1, 27, 467, 4, 'Sim'),(6415, 1, 27, 467, 8, 'Sim'),(6416, 1, 27, 467, 11, 'Sim'),(6417, 1, 27, 467, 7, 'Sim'),(6418, 1, 27, 467, 9, 'Sim'),(6419, 1, 27, 467, 5, 'Não'),(6420, 1, 27, 467, 12, 'Sim'),(6421, 1, 27, 467, 10, 'Sim'),(6422, 1, 27, 467, 1, 'Sim'),(6423, 1, 27, 468, 2, 'Sim'),(6424, 1, 27, 468, 6, 'Sim'),(6425, 1, 27, 468, 13, 'Sim'),(6426, 1, 27, 468, 3, 'Sim'),(6427, 1, 27, 468, 4, 'Sim'),(6428, 1, 27, 468, 8, 'Sim'),(6429, 1, 27, 468, 11, 'Sim'),(6430, 1, 27, 468, 7, 'Sim'),(6431, 1, 27, 468, 9, 'Sim'),(6432, 1, 27, 468, 5, 'Não'),(6433, 1, 27, 468, 12, 'Sim'),(6434, 1, 27, 468, 10, 'Sim'),(6435, 1, 27, 468, 1, 'Sim'),(6436, 1, 27, 469, 2, 'Sim'),(6437, 1, 27, 469, 6, 'Sim'),(6438, 1, 27, 469, 13, 'Sim'),(6439, 1, 27, 469, 3, 'Sim'),(6440, 1, 27, 469, 4, 'Sim'),(6441, 1, 27, 469, 8, 'Sim'),(6442, 1, 27, 469, 11, 'Sim'),(6443, 1, 27, 469, 7, 'Sim'),(6444, 1, 27, 469, 9, 'Sim'),(6445, 1, 27, 469, 5, 'Não'),(6446, 1, 27, 469, 12, 'Sim'),(6447, 1, 27, 469, 10, 'Sim'),(6448, 1, 27, 469, 1, 'Sim'),(6449, 1, 27, 470, 2, 'Sim'),(6450, 1, 27, 470, 6, 'Sim'),(6451, 1, 27, 470, 13, 'Sim'),(6452, 1, 27, 470, 3, 'Sim'),(6453, 1, 27, 470, 4, 'Sim'),(6454, 1, 27, 470, 8, 'Sim'),(6455, 1, 27, 470, 11, 'Sim'),(6456, 1, 27, 470, 7, 'Sim'),(6457, 1, 27, 470, 9, 'Sim'),(6458, 1, 27, 470, 5, 'Não'),(6459, 1, 27, 470, 12, 'Sim'),(6460, 1, 27, 470, 10, 'Sim'),(6461, 1, 27, 470, 1, 'Sim'),(6462, 1, 27, 471, 2, 'Sim'),(6463, 1, 27, 471, 6, 'Sim'),(6464, 1, 27, 471, 13, 'Sim'),(6465, 1, 27, 471, 3, 'Sim'),(6466, 1, 27, 471, 4, 'Sim'),(6467, 1, 27, 471, 8, 'Sim'),(6468, 1, 27, 471, 11, 'Sim'),(6469, 1, 27, 471, 7, 'Sim'),(6470, 1, 27, 471, 9, 'Sim'),(6471, 1, 27, 471, 5, 'Não'),(6472, 1, 27, 471, 12, 'Sim'),(6473, 1, 27, 471, 10, 'Sim'),(6474, 1, 27, 471, 1, 'Sim'),(6475, 1, 27, 472, 2, 'Sim'),(6476, 1, 27, 472, 6, 'Sim'),(6477, 1, 27, 472, 13, 'Sim'),(6478, 1, 27, 472, 3, 'Sim'),(6479, 1, 27, 472, 4, 'Sim'),(6480, 1, 27, 472, 8, 'Sim'),(6481, 1, 27, 472, 11, 'Sim'),(6482, 1, 27, 472, 7, 'Sim'),(6483, 1, 27, 472, 9, 'Sim'),(6484, 1, 27, 472, 5, 'Não'),(6485, 1, 27, 472, 12, 'Sim'),(6486, 1, 27, 472, 10, 'Sim'),(6487, 1, 27, 472, 1, 'Sim'),(6488, 1, 27, 473, 2, 'Sim'),(6489, 1, 27, 473, 6, 'Sim'),(6490, 1, 27, 473, 13, 'Sim'),(6491, 1, 27, 473, 3, 'Sim'),(6492, 1, 27, 473, 4, 'Sim'),(6493, 1, 27, 473, 8, 'Sim'),(6494, 1, 27, 473, 11, 'Sim'),(6495, 1, 27, 473, 7, 'Sim'),(6496, 1, 27, 473, 9, 'Sim'),(6497, 1, 27, 473, 5, 'Não'),(6498, 1, 27, 473, 12, 'Sim'),(6499, 1, 27, 473, 10, 'Sim'),(6500, 1, 27, 473, 1, 'Sim'),(6501, 1, 27, 474, 2, 'Sim'),(6502, 1, 27, 474, 6, 'Sim'),(6503, 1, 27, 474, 13, 'Sim'),(6504, 1, 27, 474, 3, 'Sim'),(6505, 1, 27, 474, 4, 'Sim'),(6506, 1, 27, 474, 8, 'Sim'),(6507, 1, 27, 474, 11, 'Sim'),(6508, 1, 27, 474, 7, 'Sim'),(6509, 1, 27, 474, 9, 'Sim'),(6510, 1, 27, 474, 5, 'Não'),(6511, 1, 27, 474, 12, 'Sim'),(6512, 1, 27, 474, 10, 'Sim'),(6513, 1, 27, 474, 1, 'Sim'),(6514, 1, 28, 0, 2, 'Sim'),(6515, 1, 28, 0, 6, 'Sim'),(6516, 1, 28, 0, 13, 'Sim'),(6517, 1, 28, 0, 3, 'Sim'),(6518, 1, 28, 0, 4, 'Sim'),(6519, 1, 28, 0, 8, 'Sim'),(6520, 1, 28, 0, 11, 'Sim'),(6521, 1, 28, 0, 7, 'Sim'),(6522, 1, 28, 0, 9, 'Sim'),(6523, 1, 28, 0, 5, 'Não'),(6524, 1, 28, 0, 12, 'Sim'),(6525, 1, 28, 0, 10, 'Sim'),(6526, 1, 28, 0, 1, 'Sim'),(6527, 1, 28, 475, 2, 'Sim'),(6528, 1, 28, 475, 6, 'Sim'),(6529, 1, 28, 475, 13, 'Sim'),(6530, 1, 28, 475, 3, 'Sim'),(6531, 1, 28, 475, 4, 'Sim'),(6532, 1, 28, 475, 8, 'Sim'),(6533, 1, 28, 475, 11, 'Sim'),(6534, 1, 28, 475, 7, 'Sim'),(6535, 1, 28, 475, 9, 'Sim'),(6536, 1, 28, 475, 5, 'Não'),(6537, 1, 28, 475, 12, 'Sim'),(6538, 1, 28, 475, 10, 'Sim'),(6539, 1, 28, 475, 1, 'Sim'),(6540, 1, 28, 476, 2, 'Sim'),(6541, 1, 28, 476, 6, 'Sim'),(6542, 1, 28, 476, 13, 'Sim'),(6543, 1, 28, 476, 3, 'Sim'),(6544, 1, 28, 476, 4, 'Sim'),(6545, 1, 28, 476, 8, 'Sim'),(6546, 1, 28, 476, 11, 'Sim'),(6547, 1, 28, 476, 7, 'Sim'),(6548, 1, 28, 476, 9, 'Sim'),(6549, 1, 28, 476, 5, 'Não'),(6550, 1, 28, 476, 12, 'Sim'),(6551, 1, 28, 476, 10, 'Sim'),(6552, 1, 28, 476, 1, 'Sim'),(6553, 1, 28, 477, 2, 'Sim'),(6554, 1, 28, 477, 6, 'Sim'),(6555, 1, 28, 477, 13, 'Sim'),(6556, 1, 28, 477, 3, 'Sim'),(6557, 1, 28, 477, 4, 'Sim'),(6558, 1, 28, 477, 8, 'Sim'),(6559, 1, 28, 477, 11, 'Sim'),(6560, 1, 28, 477, 7, 'Sim'),(6561, 1, 28, 477, 9, 'Sim'),(6562, 1, 28, 477, 5, 'Não'),(6563, 1, 28, 477, 12, 'Sim'),(6564, 1, 28, 477, 10, 'Sim'),(6565, 1, 28, 477, 1, 'Sim'),(6566, 1, 29, 0, 2, 'Sim'),(6567, 1, 29, 0, 6, 'Sim'),(6568, 1, 29, 0, 13, 'Sim'),(6569, 1, 29, 0, 3, 'Sim'),(6570, 1, 29, 0, 4, 'Sim'),(6571, 1, 29, 0, 8, 'Sim'),(6572, 1, 29, 0, 11, 'Sim'),(6573, 1, 29, 0, 7, 'Sim'),(6574, 1, 29, 0, 9, 'Sim'),(6575, 1, 29, 0, 5, 'Não'),(6576, 1, 29, 0, 12, 'Sim'),(6577, 1, 29, 0, 10, 'Sim'),(6578, 1, 29, 0, 1, 'Sim'),(6579, 1, 29, 478, 2, 'Sim'),(6580, 1, 29, 478, 6, 'Sim'),(6581, 1, 29, 478, 13, 'Sim'),(6582, 1, 29, 478, 3, 'Sim'),(6583, 1, 29, 478, 4, 'Sim'),(6584, 1, 29, 478, 8, 'Sim'),(6585, 1, 29, 478, 11, 'Sim'),(6586, 1, 29, 478, 7, 'Sim'),(6587, 1, 29, 478, 9, 'Sim'),(6588, 1, 29, 478, 5, 'Não'),(6589, 1, 29, 478, 12, 'Sim'),(6590, 1, 29, 478, 10, 'Sim'),(6591, 1, 29, 478, 1, 'Sim'),(6592, 1, 29, 479, 2, 'Sim'),(6593, 1, 29, 479, 6, 'Sim'),(6594, 1, 29, 479, 13, 'Sim'),(6595, 1, 29, 479, 3, 'Sim'),(6596, 1, 29, 479, 4, 'Sim'),(6597, 1, 29, 479, 8, 'Sim'),(6598, 1, 29, 479, 11, 'Sim'),(6599, 1, 29, 479, 7, 'Sim'),(6600, 1, 29, 479, 9, 'Sim'),(6601, 1, 29, 479, 5, 'Não'),(6602, 1, 29, 479, 12, 'Sim'),(6603, 1, 29, 479, 10, 'Sim'),(6604, 1, 29, 479, 1, 'Sim'),(6605, 1, 29, 480, 2, 'Sim'),(6606, 1, 29, 480, 6, 'Sim'),(6607, 1, 29, 480, 13, 'Sim'),(6608, 1, 29, 480, 3, 'Sim'),(6609, 1, 29, 480, 4, 'Sim'),(6610, 1, 29, 480, 8, 'Sim'),(6611, 1, 29, 480, 11, 'Sim'),(6612, 1, 29, 480, 7, 'Sim'),(6613, 1, 29, 480, 9, 'Sim'),(6614, 1, 29, 480, 5, 'Não'),(6615, 1, 29, 480, 12, 'Sim'),(6616, 1, 29, 480, 10, 'Sim'),(6617, 1, 29, 480, 1, 'Sim'),(6618, 1, 30, 0, 2, 'Sim'),(6619, 1, 30, 0, 6, 'Sim'),(6620, 1, 30, 0, 13, 'Sim'),(6621, 1, 30, 0, 3, 'Sim'),(6622, 1, 30, 0, 4, 'Sim'),(6623, 1, 30, 0, 8, 'Sim'),(6624, 1, 30, 0, 11, 'Sim'),(6625, 1, 30, 0, 7, 'Sim'),(6626, 1, 30, 0, 9, 'Sim'),(6627, 1, 30, 0, 5, 'Não'),(6628, 1, 30, 0, 12, 'Sim'),(6629, 1, 30, 0, 10, 'Sim'),(6630, 1, 30, 0, 1, 'Sim'),(6631, 1, 30, 481, 2, 'Sim'),(6632, 1, 30, 481, 6, 'Sim'),(6633, 1, 30, 481, 13, 'Sim'),(6634, 1, 30, 481, 3, 'Sim'),(6635, 1, 30, 481, 4, 'Sim'),(6636, 1, 30, 481, 8, 'Sim'),(6637, 1, 30, 481, 11, 'Sim'),(6638, 1, 30, 481, 7, 'Sim'),(6639, 1, 30, 481, 9, 'Sim'),(6640, 1, 30, 481, 5, 'Não'),(6641, 1, 30, 481, 12, 'Sim'),(6642, 1, 30, 481, 10, 'Sim'),(6643, 1, 30, 481, 1, 'Sim'),(6644, 1, 30, 482, 2, 'Sim'),(6645, 1, 30, 482, 6, 'Sim'),(6646, 1, 30, 482, 13, 'Sim'),(6647, 1, 30, 482, 3, 'Sim'),(6648, 1, 30, 482, 4, 'Sim'),(6649, 1, 30, 482, 8, 'Sim'),(6650, 1, 30, 482, 11, 'Sim'),(6651, 1, 30, 482, 7, 'Sim'),(6652, 1, 30, 482, 9, 'Sim'),(6653, 1, 30, 482, 5, 'Não'),(6654, 1, 30, 482, 12, 'Sim'),(6655, 1, 30, 482, 10, 'Sim'),(6656, 1, 30, 482, 1, 'Sim'),(6657, 1, 30, 483, 2, 'Sim'),(6658, 1, 30, 483, 6, 'Sim'),(6659, 1, 30, 483, 13, 'Sim'),(6660, 1, 30, 483, 3, 'Sim'),(6661, 1, 30, 483, 4, 'Sim'),(6662, 1, 30, 483, 8, 'Sim'),(6663, 1, 30, 483, 11, 'Sim'),(6664, 1, 30, 483, 7, 'Sim'),(6665, 1, 30, 483, 9, 'Sim'),(6666, 1, 30, 483, 5, 'Não'),(6667, 1, 30, 483, 12, 'Sim'),(6668, 1, 30, 483, 10, 'Sim'),(6669, 1, 30, 483, 1, 'Sim'),(6670, 1, 31, 0, 2, 'Sim'),(6671, 1, 31, 0, 6, 'Sim'),(6672, 1, 31, 0, 13, 'Sim'),(6673, 1, 31, 0, 3, 'Sim'),(6674, 1, 31, 0, 4, 'Sim'),(6675, 1, 31, 0, 8, 'Sim'),(6676, 1, 31, 0, 11, 'Sim'),(6677, 1, 31, 0, 7, 'Sim'),(6678, 1, 31, 0, 9, 'Sim'),(6679, 1, 31, 0, 5, 'Não'),(6680, 1, 31, 0, 12, 'Sim'),(6681, 1, 31, 0, 10, 'Sim'),(6682, 1, 31, 0, 1, 'Sim'),(6683, 1, 31, 484, 2, 'Sim'),(6684, 1, 31, 484, 6, 'Sim'),(6685, 1, 31, 484, 13, 'Sim'),(6686, 1, 31, 484, 3, 'Sim'),(6687, 1, 31, 484, 4, 'Sim'),(6688, 1, 31, 484, 8, 'Sim'),(6689, 1, 31, 484, 11, 'Sim'),(6690, 1, 31, 484, 7, 'Sim'),(6691, 1, 31, 484, 9, 'Sim'),(6692, 1, 31, 484, 5, 'Não'),(6693, 1, 31, 484, 12, 'Sim'),(6694, 1, 31, 484, 10, 'Sim'),(6695, 1, 31, 484, 1, 'Sim'),(6696, 1, 31, 485, 2, 'Sim'),(6697, 1, 31, 485, 6, 'Sim'),(6698, 1, 31, 485, 13, 'Sim'),(6699, 1, 31, 485, 3, 'Sim'),(6700, 1, 31, 485, 4, 'Sim'),(6701, 1, 31, 485, 8, 'Sim'),(6702, 1, 31, 485, 11, 'Sim'),(6703, 1, 31, 485, 7, 'Sim'),(6704, 1, 31, 485, 9, 'Sim'),(6705, 1, 31, 485, 5, 'Não'),(6706, 1, 31, 485, 12, 'Sim'),(6707, 1, 31, 485, 10, 'Sim'),(6708, 1, 31, 485, 1, 'Sim'),(6709, 1, 31, 486, 2, 'Sim'),(6710, 1, 31, 486, 6, 'Sim'),(6711, 1, 31, 486, 13, 'Sim'),(6712, 1, 31, 486, 3, 'Sim'),(6713, 1, 31, 486, 4, 'Sim'),(6714, 1, 31, 486, 8, 'Sim'),(6715, 1, 31, 486, 11, 'Sim'),(6716, 1, 31, 486, 7, 'Sim'),(6717, 1, 31, 486, 9, 'Sim'),(6718, 1, 31, 486, 5, 'Não'),(6719, 1, 31, 486, 12, 'Sim'),(6720, 1, 31, 486, 10, 'Sim'),(6721, 1, 31, 486, 1, 'Sim'),(6722, 1, 32, 0, 2, 'Sim'),(6723, 1, 32, 0, 6, 'Sim'),(6724, 1, 32, 0, 13, 'Sim'),(6725, 1, 32, 0, 3, 'Sim'),(6726, 1, 32, 0, 4, 'Sim'),(6727, 1, 32, 0, 8, 'Sim'),(6728, 1, 32, 0, 11, 'Sim'),(6729, 1, 32, 0, 7, 'Sim'),(6730, 1, 32, 0, 9, 'Sim'),(6731, 1, 32, 0, 5, 'Não'),(6732, 1, 32, 0, 12, 'Sim'),(6733, 1, 32, 0, 10, 'Sim'),(6734, 1, 32, 0, 1, 'Sim'),(6735, 1, 32, 487, 2, 'Sim'),(6736, 1, 32, 487, 6, 'Sim'),(6737, 1, 32, 487, 13, 'Sim'),(6738, 1, 32, 487, 3, 'Sim'),(6739, 1, 32, 487, 4, 'Sim'),(6740, 1, 32, 487, 8, 'Sim'),(6741, 1, 32, 487, 11, 'Sim'),(6742, 1, 32, 487, 7, 'Sim'),(6743, 1, 32, 487, 9, 'Sim'),(6744, 1, 32, 487, 5, 'Não'),(6745, 1, 32, 487, 12, 'Sim'),(6746, 1, 32, 487, 10, 'Sim'),(6747, 1, 32, 487, 1, 'Sim'),(6748, 1, 32, 488, 2, 'Sim'),(6749, 1, 32, 488, 6, 'Sim'),(6750, 1, 32, 488, 13, 'Sim'),(6751, 1, 32, 488, 3, 'Sim'),(6752, 1, 32, 488, 4, 'Sim'),(6753, 1, 32, 488, 8, 'Sim'),(6754, 1, 32, 488, 11, 'Sim'),(6755, 1, 32, 488, 7, 'Sim'),(6756, 1, 32, 488, 9, 'Sim'),(6757, 1, 32, 488, 5, 'Não'),(6758, 1, 32, 488, 12, 'Sim'),(6759, 1, 32, 488, 10, 'Sim'),(6760, 1, 32, 488, 1, 'Sim'),(6761, 1, 32, 489, 2, 'Sim'),(6762, 1, 32, 489, 6, 'Sim'),(6763, 1, 32, 489, 13, 'Sim'),(6764, 1, 32, 489, 3, 'Sim'),(6765, 1, 32, 489, 4, 'Sim'),(6766, 1, 32, 489, 8, 'Sim'),(6767, 1, 32, 489, 11, 'Sim'),(6768, 1, 32, 489, 7, 'Sim'),(6769, 1, 32, 489, 9, 'Sim'),(6770, 1, 32, 489, 5, 'Não'),(6771, 1, 32, 489, 12, 'Sim'),(6772, 1, 32, 489, 10, 'Sim'),(6773, 1, 32, 489, 1, 'Sim'),(6774, 1, 33, 0, 2, 'Sim'),(6775, 1, 33, 0, 6, 'Sim'),(6776, 1, 33, 0, 13, 'Sim'),(6777, 1, 33, 0, 3, 'Sim'),(6778, 1, 33, 0, 4, 'Sim'),(6779, 1, 33, 0, 8, 'Sim'),(6780, 1, 33, 0, 11, 'Sim'),(6781, 1, 33, 0, 7, 'Sim'),(6782, 1, 33, 0, 9, 'Sim'),(6783, 1, 33, 0, 5, 'Não'),(6784, 1, 33, 0, 12, 'Sim'),(6785, 1, 33, 0, 10, 'Sim'),(6786, 1, 33, 0, 1, 'Sim'),(6787, 1, 33, 490, 2, 'Sim'),(6788, 1, 33, 490, 6, 'Sim'),(6789, 1, 33, 490, 13, 'Sim'),(6790, 1, 33, 490, 3, 'Sim'),(6791, 1, 33, 490, 4, 'Sim'),(6792, 1, 33, 490, 8, 'Sim'),(6793, 1, 33, 490, 11, 'Sim'),(6794, 1, 33, 490, 7, 'Sim'),(6795, 1, 33, 490, 9, 'Sim'),(6796, 1, 33, 490, 5, 'Não'),(6797, 1, 33, 490, 12, 'Sim'),(6798, 1, 33, 490, 10, 'Sim'),(6799, 1, 33, 490, 1, 'Sim'),(6800, 1, 33, 491, 2, 'Sim'),(6801, 1, 33, 491, 6, 'Sim'),(6802, 1, 33, 491, 13, 'Sim'),(6803, 1, 33, 491, 3, 'Sim'),(6804, 1, 33, 491, 4, 'Sim'),(6805, 1, 33, 491, 8, 'Sim'),(6806, 1, 33, 491, 11, 'Sim'),(6807, 1, 33, 491, 7, 'Sim'),(6808, 1, 33, 491, 9, 'Sim'),(6809, 1, 33, 491, 5, 'Não'),(6810, 1, 33, 491, 12, 'Sim'),(6811, 1, 33, 491, 10, 'Sim'),(6812, 1, 33, 491, 1, 'Sim'),(6813, 1, 33, 492, 2, 'Sim'),(6814, 1, 33, 492, 6, 'Sim'),(6815, 1, 33, 492, 13, 'Sim'),(6816, 1, 33, 492, 3, 'Sim'),(6817, 1, 33, 492, 4, 'Sim'),(6818, 1, 33, 492, 8, 'Sim'),(6819, 1, 33, 492, 11, 'Sim'),(6820, 1, 33, 492, 7, 'Sim'),(6821, 1, 33, 492, 9, 'Sim'),(6822, 1, 33, 492, 5, 'Não'),(6823, 1, 33, 492, 12, 'Sim'),(6824, 1, 33, 492, 10, 'Sim'),(6825, 1, 33, 492, 1, 'Sim'),(6826, 1, 34, 0, 2, 'Sim'),(6827, 1, 34, 0, 6, 'Sim'),(6828, 1, 34, 0, 13, 'Sim'),(6829, 1, 34, 0, 3, 'Sim'),(6830, 1, 34, 0, 4, 'Sim'),(6831, 1, 34, 0, 8, 'Sim'),(6832, 1, 34, 0, 11, 'Sim'),(6833, 1, 34, 0, 7, 'Sim'),(6834, 1, 34, 0, 9, 'Sim'),(6835, 1, 34, 0, 5, 'Não'),(6836, 1, 34, 0, 12, 'Sim'),(6837, 1, 34, 0, 10, 'Sim'),(6838, 1, 34, 0, 1, 'Sim'),(6839, 1, 34, 493, 2, 'Sim'),(6840, 1, 34, 493, 6, 'Sim'),(6841, 1, 34, 493, 13, 'Sim'),(6842, 1, 34, 493, 3, 'Sim'),(6843, 1, 34, 493, 4, 'Sim'),(6844, 1, 34, 493, 8, 'Sim'),(6845, 1, 34, 493, 11, 'Sim'),(6846, 1, 34, 493, 7, 'Sim'),(6847, 1, 34, 493, 9, 'Sim'),(6848, 1, 34, 493, 5, 'Não'),(6849, 1, 34, 493, 12, 'Sim'),(6850, 1, 34, 493, 10, 'Sim'),(6851, 1, 34, 493, 1, 'Sim'),(6852, 1, 34, 494, 2, 'Sim'),(6853, 1, 34, 494, 6, 'Sim'),(6854, 1, 34, 494, 13, 'Sim'),(6855, 1, 34, 494, 3, 'Sim'),(6856, 1, 34, 494, 4, 'Sim'),(6857, 1, 34, 494, 8, 'Sim'),(6858, 1, 34, 494, 11, 'Sim'),(6859, 1, 34, 494, 7, 'Sim'),(6860, 1, 34, 494, 9, 'Sim'),(6861, 1, 34, 494, 5, 'Não'),(6862, 1, 34, 494, 12, 'Sim'),(6863, 1, 34, 494, 10, 'Sim'),(6864, 1, 34, 494, 1, 'Sim'),(6865, 1, 34, 495, 2, 'Sim'),(6866, 1, 34, 495, 6, 'Sim'),(6867, 1, 34, 495, 13, 'Sim'),(6868, 1, 34, 495, 3, 'Sim'),(6869, 1, 34, 495, 4, 'Sim'),(6870, 1, 34, 495, 8, 'Sim'),(6871, 1, 34, 495, 11, 'Sim'),(6872, 1, 34, 495, 7, 'Sim'),(6873, 1, 34, 495, 9, 'Sim'),(6874, 1, 34, 495, 5, 'Não'),(6875, 1, 34, 495, 12, 'Sim'),(6876, 1, 34, 495, 10, 'Sim'),(6877, 1, 34, 495, 1, 'Sim'),(6878, 1, 35, 0, 2, 'Sim'),(6879, 1, 35, 0, 6, 'Sim'),(6880, 1, 35, 0, 13, 'Sim'),(6881, 1, 35, 0, 3, 'Sim'),(6882, 1, 35, 0, 4, 'Sim'),(6883, 1, 35, 0, 8, 'Sim'),(6884, 1, 35, 0, 11, 'Sim'),(6885, 1, 35, 0, 7, 'Sim'),(6886, 1, 35, 0, 9, 'Sim'),(6887, 1, 35, 0, 5, 'Não'),(6888, 1, 35, 0, 12, 'Sim'),(6889, 1, 35, 0, 10, 'Sim'),(6890, 1, 35, 0, 1, 'Sim'),(6891, 1, 35, 496, 2, 'Sim'),(6892, 1, 35, 496, 6, 'Sim'),(6893, 1, 35, 496, 13, 'Sim'),(6894, 1, 35, 496, 3, 'Sim'),(6895, 1, 35, 496, 4, 'Sim'),(6896, 1, 35, 496, 8, 'Sim'),(6897, 1, 35, 496, 11, 'Sim'),(6898, 1, 35, 496, 7, 'Sim'),(6899, 1, 35, 496, 9, 'Sim'),(6900, 1, 35, 496, 5, 'Não'),(6901, 1, 35, 496, 12, 'Sim'),(6902, 1, 35, 496, 10, 'Sim'),(6903, 1, 35, 496, 1, 'Sim'),(6904, 1, 35, 497, 2, 'Sim'),(6905, 1, 35, 497, 6, 'Sim'),(6906, 1, 35, 497, 13, 'Sim'),(6907, 1, 35, 497, 3, 'Sim'),(6908, 1, 35, 497, 4, 'Sim'),(6909, 1, 35, 497, 8, 'Sim'),(6910, 1, 35, 497, 11, 'Sim'),(6911, 1, 35, 497, 7, 'Sim'),(6912, 1, 35, 497, 9, 'Sim'),(6913, 1, 35, 497, 5, 'Não'),(6914, 1, 35, 497, 12, 'Sim'),(6915, 1, 35, 497, 10, 'Sim'),(6916, 1, 35, 497, 1, 'Sim'),(6917, 1, 35, 498, 2, 'Sim'),(6918, 1, 35, 498, 6, 'Sim'),(6919, 1, 35, 498, 13, 'Sim'),(6920, 1, 35, 498, 3, 'Sim'),(6921, 1, 35, 498, 4, 'Sim'),(6922, 1, 35, 498, 8, 'Sim'),(6923, 1, 35, 498, 11, 'Sim'),(6924, 1, 35, 498, 7, 'Sim'),(6925, 1, 35, 498, 9, 'Sim'),(6926, 1, 35, 498, 5, 'Não'),(6927, 1, 35, 498, 12, 'Sim'),(6928, 1, 35, 498, 10, 'Sim'),(6929, 1, 35, 498, 1, 'Sim'),(6930, 1, 36, 0, 2, 'Sim'),(6931, 1, 36, 0, 6, 'Sim'),(6932, 1, 36, 0, 13, 'Sim'),(6933, 1, 36, 0, 3, 'Sim'),(6934, 1, 36, 0, 4, 'Sim'),(6935, 1, 36, 0, 8, 'Sim'),(6936, 1, 36, 0, 11, 'Sim'),(6937, 1, 36, 0, 7, 'Sim'),(6938, 1, 36, 0, 9, 'Sim'),(6939, 1, 36, 0, 5, 'Não'),(6940, 1, 36, 0, 12, 'Sim'),(6941, 1, 36, 0, 10, 'Sim'),(6942, 1, 36, 0, 1, 'Sim'),(6943, 1, 36, 499, 2, 'Sim'),(6944, 1, 36, 499, 6, 'Sim'),(6945, 1, 36, 499, 13, 'Sim'),(6946, 1, 36, 499, 3, 'Sim'),(6947, 1, 36, 499, 4, 'Sim'),(6948, 1, 36, 499, 8, 'Sim'),(6949, 1, 36, 499, 11, 'Sim'),(6950, 1, 36, 499, 7, 'Sim'),(6951, 1, 36, 499, 9, 'Sim'),(6952, 1, 36, 499, 5, 'Não'),(6953, 1, 36, 499, 12, 'Sim'),(6954, 1, 36, 499, 10, 'Sim'),(6955, 1, 36, 499, 1, 'Sim'),(6956, 1, 36, 500, 2, 'Sim'),(6957, 1, 36, 500, 6, 'Sim'),(6958, 1, 36, 500, 13, 'Sim'),(6959, 1, 36, 500, 3, 'Sim'),(6960, 1, 36, 500, 4, 'Sim'),(6961, 1, 36, 500, 8, 'Sim'),(6962, 1, 36, 500, 11, 'Sim'),(6963, 1, 36, 500, 7, 'Sim'),(6964, 1, 36, 500, 9, 'Sim'),(6965, 1, 36, 500, 5, 'Não'),(6966, 1, 36, 500, 12, 'Sim'),(6967, 1, 36, 500, 10, 'Sim'),(6968, 1, 36, 500, 1, 'Sim'),(6969, 1, 36, 501, 2, 'Sim'),(6970, 1, 36, 501, 6, 'Sim'),(6971, 1, 36, 501, 13, 'Sim'),(6972, 1, 36, 501, 3, 'Sim'),(6973, 1, 36, 501, 4, 'Sim'),(6974, 1, 36, 501, 8, 'Sim'),(6975, 1, 36, 501, 11, 'Sim'),(6976, 1, 36, 501, 7, 'Sim'),(6977, 1, 36, 501, 9, 'Sim'),(6978, 1, 36, 501, 5, 'Não'),(6979, 1, 36, 501, 12, 'Sim'),(6980, 1, 36, 501, 10, 'Sim'),(6981, 1, 36, 501, 1, 'Sim'),(6982, 1, 37, 0, 2, 'Sim'),(6983, 1, 37, 0, 6, 'Sim'),(6984, 1, 37, 0, 13, 'Sim'),(6985, 1, 37, 0, 3, 'Sim'),(6986, 1, 37, 0, 4, 'Sim'),(6987, 1, 37, 0, 8, 'Sim'),(6988, 1, 37, 0, 11, 'Sim'),(6989, 1, 37, 0, 7, 'Sim'),(6990, 1, 37, 0, 9, 'Sim'),(6991, 1, 37, 0, 5, 'Não'),(6992, 1, 37, 0, 12, 'Sim'),(6993, 1, 37, 0, 10, 'Sim'),(6994, 1, 37, 0, 1, 'Sim'),(6995, 1, 37, 502, 2, 'Sim'),(6996, 1, 37, 502, 6, 'Sim'),(6997, 1, 37, 502, 13, 'Sim'),(6998, 1, 37, 502, 3, 'Sim'),(6999, 1, 37, 502, 4, 'Sim'),(7000, 1, 37, 502, 8, 'Sim'),(7001, 1, 37, 502, 11, 'Sim'),(7002, 1, 37, 502, 7, 'Sim'),(7003, 1, 37, 502, 9, 'Sim'),(7004, 1, 37, 502, 5, 'Não'),(7005, 1, 37, 502, 12, 'Sim'),(7006, 1, 37, 502, 10, 'Sim'),(7007, 1, 37, 502, 1, 'Sim'),(7008, 1, 37, 503, 2, 'Sim'),(7009, 1, 37, 503, 6, 'Sim'),(7010, 1, 37, 503, 13, 'Sim'),(7011, 1, 37, 503, 3, 'Sim'),(7012, 1, 37, 503, 4, 'Sim'),(7013, 1, 37, 503, 8, 'Sim'),(7014, 1, 37, 503, 11, 'Sim'),(7015, 1, 37, 503, 7, 'Sim'),(7016, 1, 37, 503, 9, 'Sim'),(7017, 1, 37, 503, 5, 'Não'),(7018, 1, 37, 503, 12, 'Sim'),(7019, 1, 37, 503, 10, 'Sim'),(7020, 1, 37, 503, 1, 'Sim'),(7021, 1, 37, 504, 2, 'Sim'),(7022, 1, 37, 504, 6, 'Sim'),(7023, 1, 37, 504, 13, 'Sim'),(7024, 1, 37, 504, 3, 'Sim'),(7025, 1, 37, 504, 4, 'Sim'),(7026, 1, 37, 504, 8, 'Sim'),(7027, 1, 37, 504, 11, 'Sim'),(7028, 1, 37, 504, 7, 'Sim'),(7029, 1, 37, 504, 9, 'Sim'),(7030, 1, 37, 504, 5, 'Não'),(7031, 1, 37, 504, 12, 'Sim'),(7032, 1, 37, 504, 10, 'Sim'),(7033, 1, 37, 504, 1, 'Sim'),(7034, 1, 38, 0, 2, 'Sim'),(7035, 1, 38, 0, 6, 'Sim'),(7036, 1, 38, 0, 13, 'Sim'),(7037, 1, 38, 0, 3, 'Sim'),(7038, 1, 38, 0, 4, 'Sim'),(7039, 1, 38, 0, 8, 'Sim'),(7040, 1, 38, 0, 11, 'Sim'),(7041, 1, 38, 0, 7, 'Sim'),(7042, 1, 38, 0, 9, 'Sim'),(7043, 1, 38, 0, 5, 'Não'),(7044, 1, 38, 0, 12, 'Sim'),(7045, 1, 38, 0, 10, 'Sim'),(7046, 1, 38, 0, 1, 'Sim'),(7047, 1, 38, 505, 2, 'Sim'),(7048, 1, 38, 505, 6, 'Sim'),(7049, 1, 38, 505, 13, 'Sim'),(7050, 1, 38, 505, 3, 'Sim'),(7051, 1, 38, 505, 4, 'Sim'),(7052, 1, 38, 505, 8, 'Sim'),(7053, 1, 38, 505, 11, 'Sim'),(7054, 1, 38, 505, 7, 'Sim'),(7055, 1, 38, 505, 9, 'Sim'),(7056, 1, 38, 505, 5, 'Não'),(7057, 1, 38, 505, 12, 'Sim'),(7058, 1, 38, 505, 10, 'Sim'),(7059, 1, 38, 505, 1, 'Sim'),(7060, 1, 38, 506, 2, 'Sim'),(7061, 1, 38, 506, 6, 'Sim'),(7062, 1, 38, 506, 13, 'Sim'),(7063, 1, 38, 506, 3, 'Sim'),(7064, 1, 38, 506, 4, 'Sim'),(7065, 1, 38, 506, 8, 'Sim'),(7066, 1, 38, 506, 11, 'Sim'),(7067, 1, 38, 506, 7, 'Sim'),(7068, 1, 38, 506, 9, 'Sim'),(7069, 1, 38, 506, 5, 'Não'),(7070, 1, 38, 506, 12, 'Sim'),(7071, 1, 38, 506, 10, 'Sim'),(7072, 1, 38, 506, 1, 'Sim'),(7073, 1, 38, 507, 2, 'Sim'),(7074, 1, 38, 507, 6, 'Sim'),(7075, 1, 38, 507, 13, 'Sim'),(7076, 1, 38, 507, 3, 'Sim'),(7077, 1, 38, 507, 4, 'Sim'),(7078, 1, 38, 507, 8, 'Sim'),(7079, 1, 38, 507, 11, 'Sim'),(7080, 1, 38, 507, 7, 'Sim'),(7081, 1, 38, 507, 9, 'Sim'),(7082, 1, 38, 507, 5, 'Não'),(7083, 1, 38, 507, 12, 'Sim'),(7084, 1, 38, 507, 10, 'Sim'),(7085, 1, 38, 507, 1, 'Sim'),(7086, 1, 38, 508, 2, 'Sim'),(7087, 1, 38, 508, 6, 'Sim'),(7088, 1, 38, 508, 13, 'Sim'),(7089, 1, 38, 508, 3, 'Sim'),(7090, 1, 38, 508, 4, 'Sim'),(7091, 1, 38, 508, 8, 'Sim'),(7092, 1, 38, 508, 11, 'Sim'),(7093, 1, 38, 508, 7, 'Sim'),(7094, 1, 38, 508, 9, 'Sim'),(7095, 1, 38, 508, 5, 'Não'),(7096, 1, 38, 508, 12, 'Sim'),(7097, 1, 38, 508, 10, 'Sim'),(7098, 1, 38, 508, 1, 'Sim'),(7099, 1, 38, 509, 2, 'Sim'),(7100, 1, 38, 509, 6, 'Sim'),(7101, 1, 38, 509, 13, 'Sim'),(7102, 1, 38, 509, 3, 'Sim'),(7103, 1, 38, 509, 4, 'Sim'),(7104, 1, 38, 509, 8, 'Sim'),(7105, 1, 38, 509, 11, 'Sim'),(7106, 1, 38, 509, 7, 'Sim'),(7107, 1, 38, 509, 9, 'Sim'),(7108, 1, 38, 509, 5, 'Não'),(7109, 1, 38, 509, 12, 'Sim'),(7110, 1, 38, 509, 10, 'Sim'),(7111, 1, 38, 509, 1, 'Sim'),(7112, 1, 38, 510, 2, 'Sim'),(7113, 1, 38, 510, 6, 'Sim'),(7114, 1, 38, 510, 13, 'Sim'),(7115, 1, 38, 510, 3, 'Sim'),(7116, 1, 38, 510, 4, 'Sim'),(7117, 1, 38, 510, 8, 'Sim'),(7118, 1, 38, 510, 11, 'Sim'),(7119, 1, 38, 510, 7, 'Sim'),(7120, 1, 38, 510, 9, 'Sim'),(7121, 1, 38, 510, 5, 'Não'),(7122, 1, 38, 510, 12, 'Sim'),(7123, 1, 38, 510, 10, 'Sim'),(7124, 1, 38, 510, 1, 'Sim'),(7125, 1, 38, 511, 2, 'Sim'),(7126, 1, 38, 511, 6, 'Sim'),(7127, 1, 38, 511, 13, 'Sim'),(7128, 1, 38, 511, 3, 'Sim'),(7129, 1, 38, 511, 4, 'Sim'),(7130, 1, 38, 511, 8, 'Sim'),(7131, 1, 38, 511, 11, 'Sim'),(7132, 1, 38, 511, 7, 'Sim'),(7133, 1, 38, 511, 9, 'Sim'),(7134, 1, 38, 511, 5, 'Não'),(7135, 1, 38, 511, 12, 'Sim'),(7136, 1, 38, 511, 10, 'Sim'),(7137, 1, 38, 511, 1, 'Sim'),(7138, 1, 38, 512, 2, 'Sim'),(7139, 1, 38, 512, 6, 'Sim'),(7140, 1, 38, 512, 13, 'Sim'),(7141, 1, 38, 512, 3, 'Sim'),(7142, 1, 38, 512, 4, 'Sim'),(7143, 1, 38, 512, 8, 'Sim'),(7144, 1, 38, 512, 11, 'Sim'),(7145, 1, 38, 512, 7, 'Sim'),(7146, 1, 38, 512, 9, 'Sim'),(7147, 1, 38, 512, 5, 'Não'),(7148, 1, 38, 512, 12, 'Sim'),(7149, 1, 38, 512, 10, 'Sim'),(7150, 1, 38, 512, 1, 'Sim'),(7151, 1, 38, 513, 2, 'Sim'),(7152, 1, 38, 513, 6, 'Sim'),(7153, 1, 38, 513, 13, 'Sim'),(7154, 1, 38, 513, 3, 'Sim'),(7155, 1, 38, 513, 4, 'Sim'),(7156, 1, 38, 513, 8, 'Sim'),(7157, 1, 38, 513, 11, 'Sim'),(7158, 1, 38, 513, 7, 'Sim'),(7159, 1, 38, 513, 9, 'Sim'),(7160, 1, 38, 513, 5, 'Não'),(7161, 1, 38, 513, 12, 'Sim'),(7162, 1, 38, 513, 10, 'Sim'),(7163, 1, 38, 513, 1, 'Sim'),(7164, 1, 38, 514, 2, 'Sim'),(7165, 1, 38, 514, 6, 'Sim'),(7166, 1, 38, 514, 13, 'Sim'),(7167, 1, 38, 514, 3, 'Sim'),(7168, 1, 38, 514, 4, 'Sim'),(7169, 1, 38, 514, 8, 'Sim'),(7170, 1, 38, 514, 11, 'Sim'),(7171, 1, 38, 514, 7, 'Sim'),(7172, 1, 38, 514, 9, 'Sim'),(7173, 1, 38, 514, 5, 'Não'),(7174, 1, 38, 514, 12, 'Sim'),(7175, 1, 38, 514, 10, 'Sim'),(7176, 1, 38, 514, 1, 'Sim'),(7177, 1, 38, 515, 2, 'Sim'),(7178, 1, 38, 515, 6, 'Sim'),(7179, 1, 38, 515, 13, 'Sim'),(7180, 1, 38, 515, 3, 'Sim'),(7181, 1, 38, 515, 4, 'Sim'),(7182, 1, 38, 515, 8, 'Sim'),(7183, 1, 38, 515, 11, 'Sim'),(7184, 1, 38, 515, 7, 'Sim'),(7185, 1, 38, 515, 9, 'Sim'),(7186, 1, 38, 515, 5, 'Não'),(7187, 1, 38, 515, 12, 'Sim'),(7188, 1, 38, 515, 10, 'Sim'),(7189, 1, 38, 515, 1, 'Sim'),(7190, 1, 38, 516, 2, 'Sim'),(7191, 1, 38, 516, 6, 'Sim'),(7192, 1, 38, 516, 13, 'Sim'),(7193, 1, 38, 516, 3, 'Sim'),(7194, 1, 38, 516, 4, 'Sim'),(7195, 1, 38, 516, 8, 'Sim'),(7196, 1, 38, 516, 11, 'Sim'),(7197, 1, 38, 516, 7, 'Sim'),(7198, 1, 38, 516, 9, 'Sim'),(7199, 1, 38, 516, 5, 'Não'),(7200, 1, 38, 516, 12, 'Sim'),(7201, 1, 38, 516, 10, 'Sim'),(7202, 1, 38, 516, 1, 'Sim'),(7203, 1, 38, 517, 2, 'Sim'),(7204, 1, 38, 517, 6, 'Sim'),(7205, 1, 38, 517, 13, 'Sim'),(7206, 1, 38, 517, 3, 'Sim'),(7207, 1, 38, 517, 4, 'Sim'),(7208, 1, 38, 517, 8, 'Sim'),(7209, 1, 38, 517, 11, 'Sim'),(7210, 1, 38, 517, 7, 'Sim'),(7211, 1, 38, 517, 9, 'Sim'),(7212, 1, 38, 517, 5, 'Não'),(7213, 1, 38, 517, 12, 'Sim'),(7214, 1, 38, 517, 10, 'Sim'),(7215, 1, 38, 517, 1, 'Sim'),(7216, 1, 38, 518, 2, 'Sim'),(7217, 1, 38, 518, 6, 'Sim'),(7218, 1, 38, 518, 13, 'Sim'),(7219, 1, 38, 518, 3, 'Sim'),(7220, 1, 38, 518, 4, 'Sim'),(7221, 1, 38, 518, 8, 'Sim'),(7222, 1, 38, 518, 11, 'Sim'),(7223, 1, 38, 518, 7, 'Sim'),(7224, 1, 38, 518, 9, 'Sim'),(7225, 1, 38, 518, 5, 'Não'),(7226, 1, 38, 518, 12, 'Sim'),(7227, 1, 38, 518, 10, 'Sim'),(7228, 1, 38, 518, 1, 'Sim'),(7229, 1, 38, 519, 2, 'Sim'),(7230, 1, 38, 519, 6, 'Sim'),(7231, 1, 38, 519, 13, 'Sim'),(7232, 1, 38, 519, 3, 'Sim'),(7233, 1, 38, 519, 4, 'Sim'),(7234, 1, 38, 519, 8, 'Sim'),(7235, 1, 38, 519, 11, 'Sim'),(7236, 1, 38, 519, 7, 'Sim'),(7237, 1, 38, 519, 9, 'Sim'),(7238, 1, 38, 519, 5, 'Não'),(7239, 1, 38, 519, 12, 'Sim'),(7240, 1, 38, 519, 10, 'Sim'),(7241, 1, 38, 519, 1, 'Sim'),(7242, 1, 38, 520, 2, 'Sim'),(7243, 1, 38, 520, 6, 'Sim'),(7244, 1, 38, 520, 13, 'Sim'),(7245, 1, 38, 520, 3, 'Sim'),(7246, 1, 38, 520, 4, 'Sim'),(7247, 1, 38, 520, 8, 'Sim'),(7248, 1, 38, 520, 11, 'Sim'),(7249, 1, 38, 520, 7, 'Sim'),(7250, 1, 38, 520, 9, 'Sim'),(7251, 1, 38, 520, 5, 'Não'),(7252, 1, 38, 520, 12, 'Sim'),(7253, 1, 38, 520, 10, 'Sim'),(7254, 1, 38, 520, 1, 'Sim'),(7255, 1, 38, 521, 2, 'Sim'),(7256, 1, 38, 521, 6, 'Sim'),(7257, 1, 38, 521, 13, 'Sim'),(7258, 1, 38, 521, 3, 'Sim'),(7259, 1, 38, 521, 4, 'Sim'),(7260, 1, 38, 521, 8, 'Sim'),(7261, 1, 38, 521, 11, 'Sim'),(7262, 1, 38, 521, 7, 'Sim'),(7263, 1, 38, 521, 9, 'Sim'),(7264, 1, 38, 521, 5, 'Não'),(7265, 1, 38, 521, 12, 'Sim'),(7266, 1, 38, 521, 10, 'Sim'),(7267, 1, 38, 521, 1, 'Sim'),(7268, 1, 38, 522, 2, 'Sim'),(7269, 1, 38, 522, 6, 'Sim'),(7270, 1, 38, 522, 13, 'Sim'),(7271, 1, 38, 522, 3, 'Sim'),(7272, 1, 38, 522, 4, 'Sim'),(7273, 1, 38, 522, 8, 'Sim'),(7274, 1, 38, 522, 11, 'Sim'),(7275, 1, 38, 522, 7, 'Sim'),(7276, 1, 38, 522, 9, 'Sim'),(7277, 1, 38, 522, 5, 'Não'),(7278, 1, 38, 522, 12, 'Sim'),(7279, 1, 38, 522, 10, 'Sim'),(7280, 1, 38, 522, 1, 'Sim'),(7281, 1, 38, 523, 2, 'Sim'),(7282, 1, 38, 523, 6, 'Sim'),(7283, 1, 38, 523, 13, 'Sim'),(7284, 1, 38, 523, 3, 'Sim'),(7285, 1, 38, 523, 4, 'Sim'),(7286, 1, 38, 523, 8, 'Sim'),(7287, 1, 38, 523, 11, 'Sim'),(7288, 1, 38, 523, 7, 'Sim'),(7289, 1, 38, 523, 9, 'Sim'),(7290, 1, 38, 523, 5, 'Não'),(7291, 1, 38, 523, 12, 'Sim'),(7292, 1, 38, 523, 10, 'Sim'),(7293, 1, 38, 523, 1, 'Sim'),(7294, 1, 38, 524, 2, 'Sim'),(7295, 1, 38, 524, 6, 'Sim'),(7296, 1, 38, 524, 13, 'Sim'),(7297, 1, 38, 524, 3, 'Sim'),(7298, 1, 38, 524, 4, 'Sim'),(7299, 1, 38, 524, 8, 'Sim'),(7300, 1, 38, 524, 11, 'Sim'),(7301, 1, 38, 524, 7, 'Sim'),(7302, 1, 38, 524, 9, 'Sim'),(7303, 1, 38, 524, 5, 'Não'),(7304, 1, 38, 524, 12, 'Sim'),(7305, 1, 38, 524, 10, 'Sim'),(7306, 1, 38, 524, 1, 'Sim'),(7307, 1, 39, 0, 2, 'Sim'),(7308, 1, 39, 0, 6, 'Sim'),(7309, 1, 39, 0, 13, 'Sim'),(7310, 1, 39, 0, 3, 'Sim'),(7311, 1, 39, 0, 4, 'Sim'),(7312, 1, 39, 0, 8, 'Sim'),(7313, 1, 39, 0, 11, 'Sim'),(7314, 1, 39, 0, 7, 'Sim'),(7315, 1, 39, 0, 9, 'Sim'),(7316, 1, 39, 0, 5, 'Não'),(7317, 1, 39, 0, 12, 'Sim'),(7318, 1, 39, 0, 10, 'Sim'),(7319, 1, 39, 0, 1, 'Sim'),(7320, 1, 39, 525, 2, 'Sim'),(7321, 1, 39, 525, 6, 'Sim'),(7322, 1, 39, 525, 13, 'Sim'),(7323, 1, 39, 525, 3, 'Sim'),(7324, 1, 39, 525, 4, 'Sim'),(7325, 1, 39, 525, 8, 'Sim'),(7326, 1, 39, 525, 11, 'Sim'),(7327, 1, 39, 525, 7, 'Sim'),(7328, 1, 39, 525, 9, 'Sim'),(7329, 1, 39, 525, 5, 'Não'),(7330, 1, 39, 525, 12, 'Sim'),(7331, 1, 39, 525, 10, 'Sim'),(7332, 1, 39, 525, 1, 'Sim'),(7333, 1, 39, 526, 2, 'Sim'),(7334, 1, 39, 526, 6, 'Sim'),(7335, 1, 39, 526, 13, 'Sim'),(7336, 1, 39, 526, 3, 'Sim'),(7337, 1, 39, 526, 4, 'Sim'),(7338, 1, 39, 526, 8, 'Sim'),(7339, 1, 39, 526, 11, 'Sim'),(7340, 1, 39, 526, 7, 'Sim'),(7341, 1, 39, 526, 9, 'Sim'),(7342, 1, 39, 526, 5, 'Não'),(7343, 1, 39, 526, 12, 'Sim'),(7344, 1, 39, 526, 10, 'Sim'),(7345, 1, 39, 526, 1, 'Sim'),(7346, 1, 39, 527, 2, 'Sim'),(7347, 1, 39, 527, 6, 'Sim'),(7348, 1, 39, 527, 13, 'Sim'),(7349, 1, 39, 527, 3, 'Sim'),(7350, 1, 39, 527, 4, 'Sim'),(7351, 1, 39, 527, 8, 'Sim'),(7352, 1, 39, 527, 11, 'Sim'),(7353, 1, 39, 527, 7, 'Sim'),(7354, 1, 39, 527, 9, 'Sim'),(7355, 1, 39, 527, 5, 'Não'),(7356, 1, 39, 527, 12, 'Sim'),(7357, 1, 39, 527, 10, 'Sim'),(7358, 1, 39, 527, 1, 'Sim'),(7359, 1, 39, 528, 2, 'Sim'),(7360, 1, 39, 528, 6, 'Sim'),(7361, 1, 39, 528, 13, 'Sim'),(7362, 1, 39, 528, 3, 'Sim'),(7363, 1, 39, 528, 4, 'Sim'),(7364, 1, 39, 528, 8, 'Sim'),(7365, 1, 39, 528, 11, 'Sim'),(7366, 1, 39, 528, 7, 'Sim'),(7367, 1, 39, 528, 9, 'Sim'),(7368, 1, 39, 528, 5, 'Não'),(7369, 1, 39, 528, 12, 'Sim'),(7370, 1, 39, 528, 10, 'Sim'),(7371, 1, 39, 528, 1, 'Sim'),(7372, 1, 39, 529, 2, 'Sim'),(7373, 1, 39, 529, 6, 'Sim'),(7374, 1, 39, 529, 13, 'Sim'),(7375, 1, 39, 529, 3, 'Sim'),(7376, 1, 39, 529, 4, 'Sim'),(7377, 1, 39, 529, 8, 'Sim'),(7378, 1, 39, 529, 11, 'Sim'),(7379, 1, 39, 529, 7, 'Sim'),(7380, 1, 39, 529, 9, 'Sim'),(7381, 1, 39, 529, 5, 'Não'),(7382, 1, 39, 529, 12, 'Sim'),(7383, 1, 39, 529, 10, 'Sim'),(7384, 1, 39, 529, 1, 'Sim'),(7385, 1, 39, 530, 2, 'Sim'),(7386, 1, 39, 530, 6, 'Sim'),(7387, 1, 39, 530, 13, 'Sim'),(7388, 1, 39, 530, 3, 'Sim'),(7389, 1, 39, 530, 4, 'Sim'),(7390, 1, 39, 530, 8, 'Sim'),(7391, 1, 39, 530, 11, 'Sim'),(7392, 1, 39, 530, 7, 'Sim'),(7393, 1, 39, 530, 9, 'Sim'),(7394, 1, 39, 530, 5, 'Não'),(7395, 1, 39, 530, 12, 'Sim'),(7396, 1, 39, 530, 10, 'Sim'),(7397, 1, 39, 530, 1, 'Sim'),(7398, 1, 39, 531, 2, 'Sim'),(7399, 1, 39, 531, 6, 'Sim'),(7400, 1, 39, 531, 13, 'Sim'),(7401, 1, 39, 531, 3, 'Sim'),(7402, 1, 39, 531, 4, 'Sim'),(7403, 1, 39, 531, 8, 'Sim'),(7404, 1, 39, 531, 11, 'Sim'),(7405, 1, 39, 531, 7, 'Sim'),(7406, 1, 39, 531, 9, 'Sim'),(7407, 1, 39, 531, 5, 'Não'),(7408, 1, 39, 531, 12, 'Sim'),(7409, 1, 39, 531, 10, 'Sim'),(7410, 1, 39, 531, 1, 'Sim'),(7411, 1, 39, 532, 2, 'Sim'),(7412, 1, 39, 532, 6, 'Sim'),(7413, 1, 39, 532, 13, 'Sim'),(7414, 1, 39, 532, 3, 'Sim'),(7415, 1, 39, 532, 4, 'Sim'),(7416, 1, 39, 532, 8, 'Sim'),(7417, 1, 39, 532, 11, 'Sim'),(7418, 1, 39, 532, 7, 'Sim'),(7419, 1, 39, 532, 9, 'Sim'),(7420, 1, 39, 532, 5, 'Não'),(7421, 1, 39, 532, 12, 'Sim'),(7422, 1, 39, 532, 10, 'Sim'),(7423, 1, 39, 532, 1, 'Sim'),(7424, 1, 39, 533, 2, 'Sim'),(7425, 1, 39, 533, 6, 'Sim'),(7426, 1, 39, 533, 13, 'Sim'),(7427, 1, 39, 533, 3, 'Sim'),(7428, 1, 39, 533, 4, 'Sim'),(7429, 1, 39, 533, 8, 'Sim'),(7430, 1, 39, 533, 11, 'Sim'),(7431, 1, 39, 533, 7, 'Sim'),(7432, 1, 39, 533, 9, 'Sim'),(7433, 1, 39, 533, 5, 'Não'),(7434, 1, 39, 533, 12, 'Sim'),(7435, 1, 39, 533, 10, 'Sim'),(7436, 1, 39, 533, 1, 'Sim'),(7437, 1, 39, 534, 2, 'Sim'),(7438, 1, 39, 534, 6, 'Sim'),(7439, 1, 39, 534, 13, 'Sim'),(7440, 1, 39, 534, 3, 'Sim'),(7441, 1, 39, 534, 4, 'Sim'),(7442, 1, 39, 534, 8, 'Sim'),(7443, 1, 39, 534, 11, 'Sim'),(7444, 1, 39, 534, 7, 'Sim'),(7445, 1, 39, 534, 9, 'Sim'),(7446, 1, 39, 534, 5, 'Não'),(7447, 1, 39, 534, 12, 'Sim'),(7448, 1, 39, 534, 10, 'Sim'),(7449, 1, 39, 534, 1, 'Sim'),(7450, 1, 39, 535, 2, 'Sim'),(7451, 1, 39, 535, 6, 'Sim'),(7452, 1, 39, 535, 13, 'Sim'),(7453, 1, 39, 535, 3, 'Sim'),(7454, 1, 39, 535, 4, 'Sim'),(7455, 1, 39, 535, 8, 'Sim'),(7456, 1, 39, 535, 11, 'Sim'),(7457, 1, 39, 535, 7, 'Sim'),(7458, 1, 39, 535, 9, 'Sim'),(7459, 1, 39, 535, 5, 'Não'),(7460, 1, 39, 535, 12, 'Sim'),(7461, 1, 39, 535, 10, 'Sim'),(7462, 1, 39, 535, 1, 'Sim'),(7463, 1, 39, 536, 2, 'Sim'),(7464, 1, 39, 536, 6, 'Sim'),(7465, 1, 39, 536, 13, 'Sim'),(7466, 1, 39, 536, 3, 'Sim'),(7467, 1, 39, 536, 4, 'Sim'),(7468, 1, 39, 536, 8, 'Sim'),(7469, 1, 39, 536, 11, 'Sim'),(7470, 1, 39, 536, 7, 'Sim'),(7471, 1, 39, 536, 9, 'Sim'),(7472, 1, 39, 536, 5, 'Não'),(7473, 1, 39, 536, 12, 'Sim'),(7474, 1, 39, 536, 10, 'Sim'),(7475, 1, 39, 536, 1, 'Sim'),(7476, 1, 39, 537, 2, 'Sim'),(7477, 1, 39, 537, 6, 'Sim'),(7478, 1, 39, 537, 13, 'Sim'),(7479, 1, 39, 537, 3, 'Sim'),(7480, 1, 39, 537, 4, 'Sim'),(7481, 1, 39, 537, 8, 'Sim'),(7482, 1, 39, 537, 11, 'Sim'),(7483, 1, 39, 537, 7, 'Sim'),(7484, 1, 39, 537, 9, 'Sim'),(7485, 1, 39, 537, 5, 'Não'),(7486, 1, 39, 537, 12, 'Sim'),(7487, 1, 39, 537, 10, 'Sim'),(7488, 1, 39, 537, 1, 'Sim'),(7489, 1, 39, 538, 2, 'Sim'),(7490, 1, 39, 538, 6, 'Sim'),(7491, 1, 39, 538, 13, 'Sim'),(7492, 1, 39, 538, 3, 'Sim'),(7493, 1, 39, 538, 4, 'Sim'),(7494, 1, 39, 538, 8, 'Sim'),(7495, 1, 39, 538, 11, 'Sim'),(7496, 1, 39, 538, 7, 'Sim'),(7497, 1, 39, 538, 9, 'Sim'),(7498, 1, 39, 538, 5, 'Não'),(7499, 1, 39, 538, 12, 'Sim'),(7500, 1, 39, 538, 10, 'Sim'),(7501, 1, 39, 538, 1, 'Sim'),(7502, 1, 39, 539, 2, 'Sim'),(7503, 1, 39, 539, 6, 'Sim'),(7504, 1, 39, 539, 13, 'Sim'),(7505, 1, 39, 539, 3, 'Sim'),(7506, 1, 39, 539, 4, 'Sim'),(7507, 1, 39, 539, 8, 'Sim'),(7508, 1, 39, 539, 11, 'Sim'),(7509, 1, 39, 539, 7, 'Sim'),(7510, 1, 39, 539, 9, 'Sim'),(7511, 1, 39, 539, 5, 'Não'),(7512, 1, 39, 539, 12, 'Sim'),(7513, 1, 39, 539, 10, 'Sim'),(7514, 1, 39, 539, 1, 'Sim'),(7515, 1, 39, 540, 2, 'Sim'),(7516, 1, 39, 540, 6, 'Sim'),(7517, 1, 39, 540, 13, 'Sim'),(7518, 1, 39, 540, 3, 'Sim'),(7519, 1, 39, 540, 4, 'Sim'),(7520, 1, 39, 540, 8, 'Sim'),(7521, 1, 39, 540, 11, 'Sim'),(7522, 1, 39, 540, 7, 'Sim'),(7523, 1, 39, 540, 9, 'Sim'),(7524, 1, 39, 540, 5, 'Não'),(7525, 1, 39, 540, 12, 'Sim'),(7526, 1, 39, 540, 10, 'Sim'),(7527, 1, 39, 540, 1, 'Sim'),(7528, 1, 39, 541, 2, 'Sim'),(7529, 1, 39, 541, 6, 'Sim'),(7530, 1, 39, 541, 13, 'Sim'),(7531, 1, 39, 541, 3, 'Sim'),(7532, 1, 39, 541, 4, 'Sim'),(7533, 1, 39, 541, 8, 'Sim'),(7534, 1, 39, 541, 11, 'Sim'),(7535, 1, 39, 541, 7, 'Sim'),(7536, 1, 39, 541, 9, 'Sim'),(7537, 1, 39, 541, 5, 'Não'),(7538, 1, 39, 541, 12, 'Sim'),(7539, 1, 39, 541, 10, 'Sim'),(7540, 1, 39, 541, 1, 'Sim'),(7541, 1, 40, 0, 2, 'Sim'),(7542, 1, 40, 0, 6, 'Sim'),(7543, 1, 40, 0, 13, 'Sim'),(7544, 1, 40, 0, 3, 'Sim'),(7545, 1, 40, 0, 4, 'Sim'),(7546, 1, 40, 0, 8, 'Sim'),(7547, 1, 40, 0, 11, 'Sim'),(7548, 1, 40, 0, 7, 'Sim'),(7549, 1, 40, 0, 9, 'Sim'),(7550, 1, 40, 0, 5, 'Não'),(7551, 1, 40, 0, 12, 'Sim'),(7552, 1, 40, 0, 10, 'Sim'),(7553, 1, 40, 0, 1, 'Sim'),(7554, 1, 40, 542, 2, 'Sim'),(7555, 1, 40, 542, 6, 'Sim'),(7556, 1, 40, 542, 13, 'Sim'),(7557, 1, 40, 542, 3, 'Sim'),(7558, 1, 40, 542, 4, 'Sim'),(7559, 1, 40, 542, 8, 'Sim'),(7560, 1, 40, 542, 11, 'Sim'),(7561, 1, 40, 542, 7, 'Sim'),(7562, 1, 40, 542, 9, 'Sim'),(7563, 1, 40, 542, 5, 'Não'),(7564, 1, 40, 542, 12, 'Sim'),(7565, 1, 40, 542, 10, 'Sim'),(7566, 1, 40, 542, 1, 'Sim'),(7567, 1, 40, 543, 2, 'Sim'),(7568, 1, 40, 543, 6, 'Sim'),(7569, 1, 40, 543, 13, 'Sim'),(7570, 1, 40, 543, 3, 'Sim'),(7571, 1, 40, 543, 4, 'Sim'),(7572, 1, 40, 543, 8, 'Sim'),(7573, 1, 40, 543, 11, 'Sim'),(7574, 1, 40, 543, 7, 'Sim'),(7575, 1, 40, 543, 9, 'Sim'),(7576, 1, 40, 543, 5, 'Não'),(7577, 1, 40, 543, 12, 'Sim'),(7578, 1, 40, 543, 10, 'Sim'),(7579, 1, 40, 543, 1, 'Sim'),(7580, 1, 40, 544, 2, 'Sim'),(7581, 1, 40, 544, 6, 'Sim'),(7582, 1, 40, 544, 13, 'Sim'),(7583, 1, 40, 544, 3, 'Sim'),(7584, 1, 40, 544, 4, 'Sim'),(7585, 1, 40, 544, 8, 'Sim'),(7586, 1, 40, 544, 11, 'Sim'),(7587, 1, 40, 544, 7, 'Sim'),(7588, 1, 40, 544, 9, 'Sim'),(7589, 1, 40, 544, 5, 'Não'),(7590, 1, 40, 544, 12, 'Sim'),(7591, 1, 40, 544, 10, 'Sim'),(7592, 1, 40, 544, 1, 'Sim'),(7593, 1, 40, 545, 2, 'Sim'),(7594, 1, 40, 545, 6, 'Sim'),(7595, 1, 40, 545, 13, 'Sim'),(7596, 1, 40, 545, 3, 'Sim'),(7597, 1, 40, 545, 4, 'Sim'),(7598, 1, 40, 545, 8, 'Sim'),(7599, 1, 40, 545, 11, 'Sim'),(7600, 1, 40, 545, 7, 'Sim'),(7601, 1, 40, 545, 9, 'Sim'),(7602, 1, 40, 545, 5, 'Não'),(7603, 1, 40, 545, 12, 'Sim'),(7604, 1, 40, 545, 10, 'Sim'),(7605, 1, 40, 545, 1, 'Sim'),(7606, 1, 41, 0, 2, 'Sim'),(7607, 1, 41, 0, 6, 'Sim'),(7608, 1, 41, 0, 13, 'Sim'),(7609, 1, 41, 0, 3, 'Sim'),(7610, 1, 41, 0, 4, 'Sim'),(7611, 1, 41, 0, 8, 'Sim'),(7612, 1, 41, 0, 11, 'Sim'),(7613, 1, 41, 0, 7, 'Sim'),(7614, 1, 41, 0, 9, 'Sim'),(7615, 1, 41, 0, 5, 'Não'),(7616, 1, 41, 0, 12, 'Sim'),(7617, 1, 41, 0, 10, 'Sim'),(7618, 1, 41, 0, 1, 'Sim'),(7619, 1, 41, 546, 2, 'Sim'),(7620, 1, 41, 546, 6, 'Sim'),(7621, 1, 41, 546, 13, 'Sim'),(7622, 1, 41, 546, 3, 'Sim'),(7623, 1, 41, 546, 4, 'Sim'),(7624, 1, 41, 546, 8, 'Sim'),(7625, 1, 41, 546, 11, 'Sim'),(7626, 1, 41, 546, 7, 'Sim'),(7627, 1, 41, 546, 9, 'Sim'),(7628, 1, 41, 546, 5, 'Não'),(7629, 1, 41, 546, 12, 'Sim'),(7630, 1, 41, 546, 10, 'Sim'),(7631, 1, 41, 546, 1, 'Sim'),(7632, 1, 41, 547, 2, 'Sim'),(7633, 1, 41, 547, 6, 'Sim'),(7634, 1, 41, 547, 13, 'Sim'),(7635, 1, 41, 547, 3, 'Sim'),(7636, 1, 41, 547, 4, 'Sim'),(7637, 1, 41, 547, 8, 'Sim'),(7638, 1, 41, 547, 11, 'Sim'),(7639, 1, 41, 547, 7, 'Sim'),(7640, 1, 41, 547, 9, 'Sim'),(7641, 1, 41, 547, 5, 'Não'),(7642, 1, 41, 547, 12, 'Sim'),(7643, 1, 41, 547, 10, 'Sim'),(7644, 1, 41, 547, 1, 'Sim'),(7645, 1, 42, 0, 2, 'Sim'),(7646, 1, 42, 0, 6, 'Sim'),(7647, 1, 42, 0, 13, 'Sim'),(7648, 1, 42, 0, 3, 'Sim'),(7649, 1, 42, 0, 4, 'Sim'),(7650, 1, 42, 0, 8, 'Sim'),(7651, 1, 42, 0, 11, 'Sim'),(7652, 1, 42, 0, 7, 'Sim'),(7653, 1, 42, 0, 9, 'Sim'),(7654, 1, 42, 0, 5, 'Não'),(7655, 1, 42, 0, 12, 'Sim'),(7656, 1, 42, 0, 10, 'Sim'),(7657, 1, 42, 0, 1, 'Sim'),(7658, 1, 42, 548, 2, 'Sim'),(7659, 1, 42, 548, 6, 'Sim'),(7660, 1, 42, 548, 13, 'Sim'),(7661, 1, 42, 548, 3, 'Sim'),(7662, 1, 42, 548, 4, 'Sim'),(7663, 1, 42, 548, 8, 'Sim'),(7664, 1, 42, 548, 11, 'Sim'),(7665, 1, 42, 548, 7, 'Sim'),(7666, 1, 42, 548, 9, 'Sim'),(7667, 1, 42, 548, 5, 'Não'),(7668, 1, 42, 548, 12, 'Sim'),(7669, 1, 42, 548, 10, 'Sim'),(7670, 1, 42, 548, 1, 'Sim'),(7671, 1, 42, 549, 2, 'Sim'),(7672, 1, 42, 549, 6, 'Sim'),(7673, 1, 42, 549, 13, 'Sim'),(7674, 1, 42, 549, 3, 'Sim'),(7675, 1, 42, 549, 4, 'Sim'),(7676, 1, 42, 549, 8, 'Sim'),(7677, 1, 42, 549, 11, 'Sim'),(7678, 1, 42, 549, 7, 'Sim'),(7679, 1, 42, 549, 9, 'Sim'),(7680, 1, 42, 549, 5, 'Não'),(7681, 1, 42, 549, 12, 'Sim'),(7682, 1, 42, 549, 10, 'Sim'),(7683, 1, 42, 549, 1, 'Sim'),(7684, 1, 43, 0, 2, 'Sim'),(7685, 1, 43, 0, 6, 'Sim'),(7686, 1, 43, 0, 13, 'Sim'),(7687, 1, 43, 0, 3, 'Sim'),(7688, 1, 43, 0, 4, 'Sim'),(7689, 1, 43, 0, 8, 'Sim'),(7690, 1, 43, 0, 11, 'Sim'),(7691, 1, 43, 0, 7, 'Sim'),(7692, 1, 43, 0, 9, 'Sim'),(7693, 1, 43, 0, 5, 'Não'),(7694, 1, 43, 0, 12, 'Sim'),(7695, 1, 43, 0, 10, 'Sim'),(7696, 1, 43, 0, 1, 'Sim'),(7697, 1, 43, 550, 2, 'Sim'),(7698, 1, 43, 550, 6, 'Sim'),(7699, 1, 43, 550, 13, 'Sim'),(7700, 1, 43, 550, 3, 'Sim'),(7701, 1, 43, 550, 4, 'Sim'),(7702, 1, 43, 550, 8, 'Sim'),(7703, 1, 43, 550, 11, 'Sim'),(7704, 1, 43, 550, 7, 'Sim'),(7705, 1, 43, 550, 9, 'Sim'),(7706, 1, 43, 550, 5, 'Não'),(7707, 1, 43, 550, 12, 'Sim'),(7708, 1, 43, 550, 10, 'Sim'),(7709, 1, 43, 550, 1, 'Sim'),(7710, 1, 43, 551, 2, 'Sim'),(7711, 1, 43, 551, 6, 'Sim'),(7712, 1, 43, 551, 13, 'Sim'),(7713, 1, 43, 551, 3, 'Sim'),(7714, 1, 43, 551, 4, 'Sim'),(7715, 1, 43, 551, 8, 'Sim'),(7716, 1, 43, 551, 11, 'Sim'),(7717, 1, 43, 551, 7, 'Sim'),(7718, 1, 43, 551, 9, 'Sim'),(7719, 1, 43, 551, 5, 'Não'),(7720, 1, 43, 551, 12, 'Sim'),(7721, 1, 43, 551, 10, 'Sim'),(7722, 1, 43, 551, 1, 'Sim'),(7723, 1, 44, 0, 2, 'Sim'),(7724, 1, 44, 0, 6, 'Sim'),(7725, 1, 44, 0, 13, 'Sim'),(7726, 1, 44, 0, 3, 'Sim'),(7727, 1, 44, 0, 4, 'Sim'),(7728, 1, 44, 0, 8, 'Sim'),(7729, 1, 44, 0, 11, 'Sim'),(7730, 1, 44, 0, 7, 'Sim'),(7731, 1, 44, 0, 9, 'Sim'),(7732, 1, 44, 0, 5, 'Não'),(7733, 1, 44, 0, 12, 'Sim'),(7734, 1, 44, 0, 10, 'Sim'),(7735, 1, 44, 0, 1, 'Sim'),(7736, 1, 44, 552, 2, 'Sim'),(7737, 1, 44, 552, 6, 'Sim'),(7738, 1, 44, 552, 13, 'Sim'),(7739, 1, 44, 552, 3, 'Sim'),(7740, 1, 44, 552, 4, 'Sim'),(7741, 1, 44, 552, 8, 'Sim'),(7742, 1, 44, 552, 11, 'Sim'),(7743, 1, 44, 552, 7, 'Sim'),(7744, 1, 44, 552, 9, 'Sim'),(7745, 1, 44, 552, 5, 'Não'),(7746, 1, 44, 552, 12, 'Sim'),(7747, 1, 44, 552, 10, 'Sim'),(7748, 1, 44, 552, 1, 'Sim'),(7749, 1, 44, 553, 2, 'Sim'),(7750, 1, 44, 553, 6, 'Sim'),(7751, 1, 44, 553, 13, 'Sim'),(7752, 1, 44, 553, 3, 'Sim'),(7753, 1, 44, 553, 4, 'Sim'),(7754, 1, 44, 553, 8, 'Sim'),(7755, 1, 44, 553, 11, 'Sim'),(7756, 1, 44, 553, 7, 'Sim'),(7757, 1, 44, 553, 9, 'Sim'),(7758, 1, 44, 553, 5, 'Não'),(7759, 1, 44, 553, 12, 'Sim'),(7760, 1, 44, 553, 10, 'Sim'),(7761, 1, 44, 553, 1, 'Sim'),(7762, 1, 45, 0, 2, 'Sim'),(7763, 1, 45, 0, 6, 'Sim'),(7764, 1, 45, 0, 13, 'Sim'),(7765, 1, 45, 0, 3, 'Sim'),(7766, 1, 45, 0, 4, 'Sim'),(7767, 1, 45, 0, 8, 'Sim'),(7768, 1, 45, 0, 11, 'Sim'),(7769, 1, 45, 0, 7, 'Sim'),(7770, 1, 45, 0, 9, 'Sim'),(7771, 1, 45, 0, 5, 'Não'),(7772, 1, 45, 0, 12, 'Sim'),(7773, 1, 45, 0, 10, 'Sim'),(7774, 1, 45, 0, 1, 'Sim'),(7775, 1, 45, 554, 2, 'Sim'),(7776, 1, 45, 554, 6, 'Sim'),(7777, 1, 45, 554, 13, 'Sim'),(7778, 1, 45, 554, 3, 'Sim'),(7779, 1, 45, 554, 4, 'Sim'),(7780, 1, 45, 554, 8, 'Sim'),(7781, 1, 45, 554, 11, 'Sim'),(7782, 1, 45, 554, 7, 'Sim'),(7783, 1, 45, 554, 9, 'Sim'),(7784, 1, 45, 554, 5, 'Não'),(7785, 1, 45, 554, 12, 'Sim'),(7786, 1, 45, 554, 10, 'Sim'),(7787, 1, 45, 554, 1, 'Sim'),(7788, 1, 45, 555, 2, 'Sim'),(7789, 1, 45, 555, 6, 'Sim'),(7790, 1, 45, 555, 13, 'Sim'),(7791, 1, 45, 555, 3, 'Sim'),(7792, 1, 45, 555, 4, 'Sim'),(7793, 1, 45, 555, 8, 'Sim'),(7794, 1, 45, 555, 11, 'Sim'),(7795, 1, 45, 555, 7, 'Sim'),(7796, 1, 45, 555, 9, 'Sim'),(7797, 1, 45, 555, 5, 'Não'),(7798, 1, 45, 555, 12, 'Sim'),(7799, 1, 45, 555, 10, 'Sim'),(7800, 1, 45, 555, 1, 'Sim'),(7801, 1, 45, 556, 2, 'Sim'),(7802, 1, 45, 556, 6, 'Sim'),(7803, 1, 45, 556, 13, 'Sim'),(7804, 1, 45, 556, 3, 'Sim'),(7805, 1, 45, 556, 4, 'Sim'),(7806, 1, 45, 556, 8, 'Sim'),(7807, 1, 45, 556, 11, 'Sim'),(7808, 1, 45, 556, 7, 'Sim'),(7809, 1, 45, 556, 9, 'Sim'),(7810, 1, 45, 556, 5, 'Não'),(7811, 1, 45, 556, 12, 'Sim'),(7812, 1, 45, 556, 10, 'Sim'),(7813, 1, 45, 556, 1, 'Sim'),(7814, 1, 45, 557, 2, 'Sim'),(7815, 1, 45, 557, 6, 'Sim'),(7816, 1, 45, 557, 13, 'Sim'),(7817, 1, 45, 557, 3, 'Sim'),(7818, 1, 45, 557, 4, 'Sim'),(7819, 1, 45, 557, 8, 'Sim'),(7820, 1, 45, 557, 11, 'Sim'),(7821, 1, 45, 557, 7, 'Sim'),(7822, 1, 45, 557, 9, 'Sim'),(7823, 1, 45, 557, 5, 'Não'),(7824, 1, 45, 557, 12, 'Sim'),(7825, 1, 45, 557, 10, 'Sim'),(7826, 1, 45, 557, 1, 'Sim'),(7827, 1, 45, 558, 2, 'Sim'),(7828, 1, 45, 558, 6, 'Sim'),(7829, 1, 45, 558, 13, 'Sim'),(7830, 1, 45, 558, 3, 'Sim'),(7831, 1, 45, 558, 4, 'Sim'),(7832, 1, 45, 558, 8, 'Sim'),(7833, 1, 45, 558, 11, 'Sim'),(7834, 1, 45, 558, 7, 'Sim'),(7835, 1, 45, 558, 9, 'Sim'),(7836, 1, 45, 558, 5, 'Não'),(7837, 1, 45, 558, 12, 'Sim'),(7838, 1, 45, 558, 10, 'Sim'),(7839, 1, 45, 558, 1, 'Sim'),(7840, 1, 45, 559, 2, 'Sim'),(7841, 1, 45, 559, 6, 'Sim'),(7842, 1, 45, 559, 13, 'Sim'),(7843, 1, 45, 559, 3, 'Sim'),(7844, 1, 45, 559, 4, 'Sim'),(7845, 1, 45, 559, 8, 'Sim'),(7846, 1, 45, 559, 11, 'Sim'),(7847, 1, 45, 559, 7, 'Sim'),(7848, 1, 45, 559, 9, 'Sim'),(7849, 1, 45, 559, 5, 'Não'),(7850, 1, 45, 559, 12, 'Sim'),(7851, 1, 45, 559, 10, 'Sim'),(7852, 1, 45, 559, 1, 'Sim'),(7853, 1, 45, 560, 2, 'Sim'),(7854, 1, 45, 560, 6, 'Sim'),(7855, 1, 45, 560, 13, 'Sim'),(7856, 1, 45, 560, 3, 'Sim'),(7857, 1, 45, 560, 4, 'Sim'),(7858, 1, 45, 560, 8, 'Sim'),(7859, 1, 45, 560, 11, 'Sim'),(7860, 1, 45, 560, 7, 'Sim'),(7861, 1, 45, 560, 9, 'Sim'),(7862, 1, 45, 560, 5, 'Não'),(7863, 1, 45, 560, 12, 'Sim'),(7864, 1, 45, 560, 10, 'Sim'),(7865, 1, 45, 560, 1, 'Sim'),(7866, 1, 45, 561, 2, 'Sim'),(7867, 1, 45, 561, 6, 'Sim'),(7868, 1, 45, 561, 13, 'Sim'),(7869, 1, 45, 561, 3, 'Sim'),(7870, 1, 45, 561, 4, 'Sim'),(7871, 1, 45, 561, 8, 'Sim'),(7872, 1, 45, 561, 11, 'Sim'),(7873, 1, 45, 561, 7, 'Sim'),(7874, 1, 45, 561, 9, 'Sim'),(7875, 1, 45, 561, 5, 'Não'),(7876, 1, 45, 561, 12, 'Sim'),(7877, 1, 45, 561, 10, 'Sim'),(7878, 1, 45, 561, 1, 'Sim'),(7879, 1, 45, 562, 2, 'Sim'),(7880, 1, 45, 562, 6, 'Sim'),(7881, 1, 45, 562, 13, 'Sim'),(7882, 1, 45, 562, 3, 'Sim'),(7883, 1, 45, 562, 4, 'Sim'),(7884, 1, 45, 562, 8, 'Sim'),(7885, 1, 45, 562, 11, 'Sim'),(7886, 1, 45, 562, 7, 'Sim'),(7887, 1, 45, 562, 9, 'Sim'),(7888, 1, 45, 562, 5, 'Não'),(7889, 1, 45, 562, 12, 'Sim'),(7890, 1, 45, 562, 10, 'Sim'),(7891, 1, 45, 562, 1, 'Sim'),(7892, 1, 45, 563, 2, 'Sim'),(7893, 1, 45, 563, 6, 'Sim'),(7894, 1, 45, 563, 13, 'Sim'),(7895, 1, 45, 563, 3, 'Sim'),(7896, 1, 45, 563, 4, 'Sim'),(7897, 1, 45, 563, 8, 'Sim'),(7898, 1, 45, 563, 11, 'Sim'),(7899, 1, 45, 563, 7, 'Sim'),(7900, 1, 45, 563, 9, 'Sim'),(7901, 1, 45, 563, 5, 'Não'),(7902, 1, 45, 563, 12, 'Sim'),(7903, 1, 45, 563, 10, 'Sim'),(7904, 1, 45, 563, 1, 'Sim');

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

