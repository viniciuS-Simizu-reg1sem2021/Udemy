<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Illuminate\Database\Capsule\Manager as Capsule;

require 'vendor/autoload.php';

$app = new \Slim\App([
	'settings' => ['displayErrorDetails' => true]
]);

$container = $app->getContainer();
$container['db'] = function () {
	$capsule = new Capsule;

	$capsule->addConnection([
		'driver' => 'mysql',
		'host' => 'localhost',
		'database' => 'slim',
		'username' => 'root',
		'password' => '',
		'charset' => 'utf8',
		'collation' => 'utf8_unicode_ci',
		'prefix' => '',
	]);

	$capsule->setAsGlobal();
	$capsule->bootEloquent();

	return $capsule;
};

$app->get('/usuarios', function (Request $request, Response $response) # use ($servico) 
{
	$db = $this->get('db');
	/* CREATE TABLE
	$db->schema()->dropIfExists('usuarios');
	$db->schema()->create('usuarios', function($table) {

		$table->increments('id');
		$table->string('nome');
		$table->string('email')->unique();
		$table->timestamps();
	});
	*/

	/* INSERT
	$db->table('usuarios')->insert([
		'nome' => 'Cold',
		'email' => 'cold@00nation.com'
	]);
	*/

	/* UPDATE 
	$db->table('usuarios')
		->where('id', 1)
		->update([
		'nome' => 'veio de awp'
	]);
	*/

	/* DELETE 
	$db->table('usuarios')
		->where('id', 2)
		->delete();
	*/

	/* SELECT */
	$usuarios = $db->table('usuarios')->get();
	foreach ($usuarios as $i => $usuario) {
		echo $usuario->nome . '<br />';
	}
});

$app->run();


/*
$app->get('/header', function (Request $request, Response $response) # use ($servico) 
{
	$response->write('Esse é um retorno header');
	return $response->withHeader('allow', 'PUT')
	->withAddedHeader('Content-Length', 10);
});

$app->get('/json', function (Request $request, Response $response) # use ($servico) 
{
	return $response->withJson([
		"nome" => "Fallen",
		"idade" => 32
	]);
});

$app->get('/xml', function (Request $request, Response $response) # use ($servico) 
{
	$xml = file_get_contents('arquivo');
	$response->write($xml);

	return $response->withHeader('Content-Type', 'application/xml');
});
*/


/* Middleware

$app->add( function($request, $response, $next) {
	$response->write(' inicio camada 1 + ');

	$response = $next($request, $response);
	$response->write('fim camada 1 + ');
	return $response;
});

$app->add( function($request, $response, $next) {
	$response->write(' inicio camada 2 + ');
	// return $next($request, $response);
	$response = $next($request, $response);
	$response->write('fim camada 2 + ');
	return $response;
});
*/

/*
$app->get('/usuarios', function (Request $request, Response $response) # use ($servico) 
{
	$response->write(' usuarios ');
});

$app->get('/postagens', function (Request $request, Response $response) # use ($servico) 
{
	$response->write(' postagens ');
});
*/


/*
class Servico
{

}
$servico = new Servico;

$container = $app->getContainer();
$container['Home'] = function() {
	return new MyApp\Controllers\Home( new MyApp\View );
};

$app->get('/servico', function (Request $request, Response $response) # use ($servico) 
{
	$servico = $this->get('servico');
	var_dump($servico);

});

$app->get('/usuario', 'Home:index');
*/


/*
$app->delete('/usuarios/remove/{id}', function (Request $request, Response $response) {
	$id = $request->getAttribute('id');

	return $response->getBody()->write('Delete success in ID=' . $id);

	// echo 'Lista de postagens';
});

$app->put('/usuarios/atualiza', function (Request $request, Response $response) {
	$post = $request->getParsedBody();
	list('id'=>$id, 'nome'=>$nome, 'email'=>$email) = $post;

	return $response->getBody()->write('Update SUCCESS in ID=' . $id);

	// echo 'Lista de postagens';
});

$app->post('/usuarios/adiciona', function (Request $request, Response $response) {
	$post = $request->getParsedBody();
	list('nome'=>$nome, 'email'=>$email) = $post;
	
	return $response->getBody()->write($nome . ' - ' . $email);
	
	// echo 'Lista de postagens';
});

*/

/*
$app->get('/postagens', function (Request $request, Response $response) {
	$response->getBody()->write("Listagem de postagens");

	return $response;

	// echo 'Lista de postagens';
});

$app->get('/lista/postagens2', function() {
	echo 'Lista de postagens';
});

$app->get('/lista/usuarios[/{id}]', function($request, $response) {
	$id = $request->getAttribute('id');
	echo 'Lista de usuarios: ' . $id;
});

$app->get('/postagens[/{mes}[/{ano}]]', function($request, $response) {
	$ano = $request->getAttribute('ano');
	$mes = $request->getAttribute('mes');
	echo 'Lista de postagens Ano: ' . $ano . 'mes: ' . $mes;
});

$app->get('/lista/{itens:.*}', function($request, $response) {
	$itens = $request->getAttribute('itens');
	
	var_dump(explode('/', $itens));
});

$app->get('/blog/postagens/{id}', function($request, $response) {
	echo 'Listar postagem para um ID: ';
})->setName('blog');
$app->get('/meusite', function($request, $response) {
	$retorno = $this->get('router')->pathFor('blog', ['id' => '5'] );
	echo $retorno;
});


$app->group('/v1', function() {
	$this->get('/usuarios', function() {
		echo 'Lista de usuarios';
	});

	$this->get('/tema', function() {
		echo 'Lista de usuarios';
	});
});

*/
?>