<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'db_funeraria' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'T,Lc{>4bt;NFxq9U]WH|X(O[ejSZEsP/<r7Z~sYFY[08OR$p|hmX]JQm>JcZe9Ps' );
define( 'SECURE_AUTH_KEY',  '){}M^zh`U%d!hUvnJMC)QR{mD1kinh! [/FQAY}>6-[{jFn2MuGdc.U#xLU^LCiu' );
define( 'LOGGED_IN_KEY',    'F0I<Ao~6^+.E||lX>5<5KF^o:weAv3e #} ?6+aQ>WeR3UBHu6pzVL^DE_U<mcfE' );
define( 'NONCE_KEY',        'Yx?r:5?CQX!F`K=_x3$QPHuj~TDMHxmz^nm_Ix&sj;|~DUqGeGH_[!V&UQ]D{QR4' );
define( 'AUTH_SALT',        'CE]ynfXMS8-/p&%Bdy{$2+.@*I&XPEZuohL%tD!4h_]&xz#]*<p4$O2%AV.0+wy{' );
define( 'SECURE_AUTH_SALT', 'eHm<;dL6+dY~!^Q2Q120M;P9:yX[Tul}zvuOrm;XlfR?(tUoDk;(=,7LAtl$md{!' );
define( 'LOGGED_IN_SALT',   '=,~jm-Ds5lu?7H3cZkALE<Qt0kwc30|r.$UiMZg/wx.2H0n y0qL;P5DqjZ?u@sh' );
define( 'NONCE_SALT',       'at)Mn9Sbrdfg6<C;_R(_I(I)1yVI!XU4$CzMsP`:k9?s6&-I }6Ro7iA)Cv*.+e[' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
